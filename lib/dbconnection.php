<?php
require_once("config.php");

class DB{
	public static function connectDB(){
		$host = Config::$host;
		$uname = Config::$db_uname;
		$pass = Config::$db_pass;
		$db = Config::$dbname;

		$dbobj = new mysqli($host,$uname,$pass,$db);

		if($dbobj->connect_errno){
			echo("DB Connection error <br>");
			echo("Error Text : ".$dbobj->connect_error);
			exit;
		}
		return $dbobj;
	}
}
?>