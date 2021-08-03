<?php

require('book_db.php');
session_start();
//db connection
$conn = mysqli_connect($host, $username, $password, $dbname);

require('rpay2/razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
    $razorpay_order_id = $_SESSION['razorpay_order_id'];
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
	$name = $_SESSION['name'];
	$age = $_SESSION['age'] ;
	$gender = $_SESSION['gender'];
	$parentname=$_SESSION['parentname'];
    $email = $_SESSION['email'];
	$phone = $_SESSION['phone'] ;
	$address = $_SESSION['address'] ;
    $date = $_SESSION['date'];
	$uploads= $_SESSION['uploads'];
    $charges = "500";
	$sql = "INSERT INTO `vbooking`(`name`, `age`, `gender`, `parentname`, `phone`, `email`, `address`, `date`, `uploads`, `charges`, `razorpay_payment_id`, `status`)
	VALUES ('$name','$age','$gender','$parentname','$phone','$email','$address','$date','$uploads','$charges','$razorpay_payment_id','success')"; 

    if(mysqli_query($conn, $sql)){
        echo "Thank You !!!! Please check your mail.";
    
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
              
             $to = $email;
             $subject = "MOTHERLY HOSPITAL";
             
             $message = "Booking has been accepted with payment_id .{$_POST['razorpay_payment_id']}.\n Your appoinment is  {$_POST['razorpay_order_id']} .\n Thank you for choosing us.";
       
             
             $header = "From:shwetasharma.gml@gmail.com\r\n";
             
             
             $retval = mail($to,$subject,$message,$header);
			 

}}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}


?>
        
