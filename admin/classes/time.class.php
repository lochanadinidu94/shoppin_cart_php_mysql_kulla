<?php

class Times{


	function  getFullTime(){
		date_default_timezone_set( "Asia/Colombo");
		return date("Y-m-d H:i:s");
	}

	function getDate(){
		date_default_timezone_set( "Asia/Colombo");
		return date("Y-m-d");
	}

	function checkDateInrange($startDate, $endDate,  $checkDate){
		$start = strtotime($startDate);
		$end = strtotime($endDate);
		$check = strtotime($checkDate);

		return ( ($check >= $start) && ($end >= $check) );
	}


}
