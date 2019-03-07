<?php
$serverName = "localhost";
$username= "root";
$pass= "";
$bd = "gueroapp";
try{
	$conn= new PDO("mysql:host=$serverName;dbname=$bd;",$username, $pass);
	echo 'Todo bien';
} catch (PDOException $exception){
	die('Connection failed'. $exception->getMessage());
}