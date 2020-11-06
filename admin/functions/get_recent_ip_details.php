<?php
include_once ('classes/ip.class.php');
$ip = new ip();
$ips = $ip->getRecentIps(5);

?>





   
    <div class="box-body">
        <?php foreach ($ips as $oneip){
            $ipDetails = $ip->getIpDetails($oneip["ip"]);
            
            ?>
            <div class="row">
                <div class="col-sm-12">
                    
                   
                    <b>IP :</b> <?php echo $ipDetails->ip; ?>
                   

                </div>
                <div class="col-sm-12">
                     <b>Country :</b> <?php echo $ipDetails->country_name.', '.$ipDetails->city; ?>
                </div>
                 
            </div>



            <hr class="mar_tb_5">


        <?php } ?>
    </div>
    <!-- /.box-body -->

