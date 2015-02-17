<?php

function sql($dbname, $create, $sql){

	$path = $_SERVER['DOCUMENT_ROOT'];

	include "$path/../credentials.php";

	$link = mysqli_connect($servername, $username, $password);
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}

	$db_selected = mysqli_select_db($link, $dbname);
	if (!$db_selected) {
		if( $create = 1 ){
			$result = mysqli_query($link, "create database if not exists " . $dbname);
			if( $result === FALSE ) {
			    echo "Error: " . $sql . "<br>" . mysql_error();
			}
			$db_selected = mysqli_select_db($link, $dbname);
		}
		if (!$db_selected) {
		    die ('Can\'t use database : ' . mysqli_error());
		}
	}

	$result = mysqli_query($link, $sql);

	if( $result === FALSE ) {
	    die( "Error: " . $sql . "<br>" . mysqli_error() );
	}
	else if( $result === TRUE ){
		mysqli_close($link);
		return;
	}

	$ret = array();

    while($row = mysqli_fetch_assoc($result)) {
        $temp = array();
        foreach($row as $value){
        	$temp[] = $value;
        }
        $ret[] = $temp;
	}

	mysqli_close($link);

	return $ret;

}

?>
