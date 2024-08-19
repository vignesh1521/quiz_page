<?php
$host='localhost';
$dbusername='root';
$dbpassword='';
$dbname='quiz';

$con=new mysqli($host,$dbusername,$dbpassword,$dbname);

if(!$con){
	die(mysqli_error($con));
}

?>