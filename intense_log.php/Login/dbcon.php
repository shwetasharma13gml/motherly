<?php 
$con =mysqli_connect('localhost','root','');
if(!$con)
{
	echo 'not connected to server';
}
if(!mysqli_select_db($con,'db1'))
{
	echo 'database not selected';
}
?>