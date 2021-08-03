<?php
$name = $_POST['name'];    
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$date = $_POST['date'];
$slot = $_POST['slot'];
$speciality = $_POST['speciality'];


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

$sql = "INSERT INTO consult(name,age,gender,email,phone,date,slot,speciality) VALUES('$name','$age','$gender','$email','$phone','$date','$slot','$speciality')";
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
header("refresh:2;  url=payment.html");
?>
	