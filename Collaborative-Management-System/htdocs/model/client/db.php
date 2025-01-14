<?php

	$dbuser = 'root';
	$dbpass = '';
	$host 	= 'localhost';
	$dbname	= 'collaborative_management_system';

	$conn = mysqli_connect('localhost','root','','task') or die('connection failed');


	function getConnection()
	{

		global $dbname, $dbpass, $dbuser, $host;
		$conn = mysqli_connect($host, $dbuser, $dbpass, $dbname);
		return $conn;

	}

?>