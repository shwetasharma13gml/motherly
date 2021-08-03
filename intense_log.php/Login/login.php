<?php
$email = $_POST['email'];
$pass = $_POST['pass'];



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

$sql = "INSERT INTO login(email,pass) VALUES('$email','$pass')";

}

if(!mysqli_query($con,$sql))
{
	echo 'DATA IS NOT SUBMITTED -PLEASE CHECK YOUR DATA';
	header("refresh:2;  url=index.html");
	
}
else
										{
											echo "<script type='text/javascript'> alert('Your Booking application has been accepted .We will notify you shortly')</script>";
											
											
										}
  
								
header("refresh:2;  url=index.html");
?>