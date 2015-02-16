<?php

class variables {

	public static $pathToVizual = "/stegerbizzell/vendor/vizual";

	public static function vars(){
		return array(

			'host' => 'localhost',
			'username' => "root",
			'password' => "root",
			'database' => "stegerbizzell",

		);
	}
	
	public static $statesArray = array('Select', 'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming');


	public static function date(){
		date_default_timezone_set('America/Chicago');
		return date("Y-m-d H:i:s");
	}

	public static function unprice($string){
		for($i=0;$i<strlen($price);$i++){
			if( $price[$i] >= '0' && $price[$i] <= '9' ){
				$amount = $amount . $price[$i];
			}
		}
	}

	public static function price($string){

		$string = explode('.',$string)[0];
		$string = DonationsController::reverse($string);
		$temp = "";
		for($i=0;$i<strlen($string);$i++){
			if( $i != 0 && $i % 3 == 0 ){
				$temp = $temp . ",";
			}
			$temp = $temp . $string[$i];
		}
		return DonationsController::reverse($temp . "$");
	}

	public static function reverse($string){ 
		for($i=0;$i<strlen($string)/2;$i++){
			$temp=$string[$i];
			$string[$i]=$string[strlen($string)-1-$i];
			$string[strlen($string)-1-$i]=$temp;
		}
		return $string;
	}

	public static function date_format($date){

		$s1 = explode('-',$date);
		$year = $s1[0];
		$month = $s1[1];
		
		$s2 = explode(' ',$s1[2]);

		$day = $s2[0];
		$time = $s2[1];

		$s3 = explode(':',$time);

		$hours = $s3[0];
		$minutes = $s3[1];
		$seconds = $s3[2];
		$ampm = "am";

		$hours_int = intval($hours);

		if( $hours_int == 0 ){
			$hours = "12";
		}
		else if( $hours_int > 12 ){
			$hours_int -= 12;
			$hours = "$hours_int";
			if( strlen($hours < 2) ){
				$hours = "0".$hours;
			}
			$ampm = "pm";
		}
		else if( $hours_int == 12 ){
			$ampm = "pm";
		}

		$ret = "$month/$day/$year at $hours:$minutes:$seconds$ampm CST";

		return $ret;

	}

}

?>