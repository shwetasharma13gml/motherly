<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


$con =mysqli_connect('localhost','root','');
if(!$con)
{
	echo 'not connected to server';
}

if(!mysqli_select_db($con,'db1'))
{
	echo 'database not selected';
}
									
else{

//$sql = "INSERT INTO query(name,email,phone,message) VALUES('$name','$email','$phone','$message')";
$sql = "INSERT INTO `query`( `name`, `email`, `phone`, `message`) VALUES ('$name','$email','$phone','$message')";
}
if(!mysqli_query($con,$sql))
{
	echo 'DATA IS NOT SUBMITTED -PLEASE CHECK YOUR DATA';
	header("refresh:2;  url=index.html");
	
}
else
{
	echo "<script type='text/javascript'> alert('Query has been submitted .We will assist you shortly..')</script>";
														
}
header("refresh:2;  url=index.php");
?>

