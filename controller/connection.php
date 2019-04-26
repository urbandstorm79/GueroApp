<?php
$serverName = "localhost";
$username= "root";
$pass= "";
$bd = "gueroapp";
try{
	$conn= new PDO("mysql:host=$serverName;dbname=$bd;",$username, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
	//echo 'Todo bien';
} catch (PDOException $exception){
	die('Connection failed'. $exception->getMessage());
}