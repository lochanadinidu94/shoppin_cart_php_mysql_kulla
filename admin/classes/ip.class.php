<?php


class ip {

    function getRecentIps($amount) {
        $result = mysql_query("SELECT * FROM `hits_ip` ORDER BY date_visit DESC LIMIT " . $amount);
        $return;

        while ($project = mysql_fetch_assoc($result)) {
            $return[] = $project;
        }
        if (isset($return)) {
            return $return;
        } else {
            return array();
        }
    }

    function getIpDetails($url) {
        $options = array(
            CURLOPT_RETURNTRANSFER => true, // return web page
            CURLOPT_HEADER => false, // don't return headers
            CURLOPT_FOLLOWLOCATION => true, // follow redirects
            CURLOPT_MAXREDIRS => 10, // stop after 10 redirects
            CURLOPT_ENCODING => "", // handle compressed
            CURLOPT_USERAGENT => "test", // name of client
            CURLOPT_AUTOREFERER => true, // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 120, // time-out on connect
            CURLOPT_TIMEOUT => 120, // time-out on response
        );

        $ch = curl_init("http://freegeoip.net/json/" . $url);
        curl_setopt_array($ch, $options);

        $content = curl_exec($ch);

        curl_close($ch);

        $resArr = array();
        $resArr = json_decode($content);
        if (isset($resArr)) {
            return $resArr;
        } else {
            return array();
        }
    }

    function visitorsChart() {


        $res = mysql_query("SELECT * FROM `hits_ip` ORDER BY date_visit ASC");
        $visits = array();




        while ($row = mysql_fetch_assoc($res)) {
            if (count($visits) > 60) {
                break;
            }
            $r_month = strtotime($row['date_visit']);
            if (!array_key_exists(date('Y-m-d', $r_month), $visits)) {
                $visits[date('Y-m-d', $r_month)] = array($row["ip_count"], 1);
            } else {
                $curVisits = $visits[date('Y-m-d', $r_month)][0];
                $curVisitors = $visits[date('Y-m-d', $r_month)][1];
                $visits[date('Y-m-d', $r_month)][0] = $curVisits + $row["ip_count"];
                $visits[date('Y-m-d', $r_month)][1] = $curVisitors + 1;
            }
        }
        return $visits;
    }
  function getTotVisitors(){
    $res = mysql_query("SELECT COUNT(id) AS vCount FROM `hits_ip` ");
    return mysql_fetch_object($res);
  }
  function getTotVisits(){
    $res = mysql_query("SELECT * FROM `hits_ip` ORDER BY date_visit ASC");
    $totalHits=0 ;
    while ($row = mysql_fetch_assoc($res)) {
      $totalHits = $totalHits + $row["ip_count"];
    }
    
    return $totalHits;
  }

    function getAverages() {

        $res = mysql_query("SELECT * FROM `hits_ip` ORDER BY date_visit ASC");
        $totalHits=0 ;
        $totalVisitors=0;
        $returnvisitors=0;
        $dailyVisitorsAverage;
        $dailyHitsAverage;
        $monthlyVisitorsAverage;
        $monthlyHitsAverage;
        $days = array();
        $months = array();

        while ($row = mysql_fetch_assoc($res)) {

            $r_month = strtotime($row['date_visit']);
            if (!array_key_exists(date('Y-m-d', $r_month), $days)) {         // for daily average
                $days[date('Y-m-d', $r_month)] = "useless";                
            }
            if (!array_key_exists(date('Y-m', $r_month), $months)) {         //for monthly average
                $months[date('Y-m', $r_month)] = "useless";                
            }
            if($row["ip_count"]>1){
                $returnvisitors++;
            }
            $totalHits = $totalHits + $row["ip_count"];
            $totalVisitors ++;
        }
         $dailyVisitorsAverage = $totalVisitors/count($days);
         $dailyHitsAverage = $totalHits/count($days);
         
         $monthlyVisitorsAverage = $totalVisitors/count($months);
         $monthlyHitsAverage = $totalHits/count($months);
         $returnAverage = $returnvisitors*100/$totalVisitors;
        return array(
            "dayHit" => $dailyHitsAverage,
            "dayVis" => $dailyVisitorsAverage,
            "monHit" => $monthlyHitsAverage,
            "monVis" => $monthlyVisitorsAverage,
            "return" => $returnAverage
        );
    }

}
