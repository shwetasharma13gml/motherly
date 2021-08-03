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
	 /*$to = $_POST['email'];
         $subject = "MOTHERLY HOSPITAL";
         
         $message = "Booking has been accepted. Thank you for choosing us";
   
		 
         $header = "From:shwetasharma.gml@gmail.com\r\n";
         //$header .= "Cc:afgh@somedomain.com \r\n";
           //$header .= "MIME-Version: 1.0\r\n";
         //$header .= "Content-type: text/html\r\n";
         
         $retval = mail($to,$subject,$message,$header);
         
        /* if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }*/
	echo "<script type='text/javascript'> alert('PLEASE SUBMIT THE PAYMENT')</script>";
	header("refresh:2;  url=book_pay.php");
														
}
?>
	