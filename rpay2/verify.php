<?php

require('config.php');
session_start();
//db connection
$conn = mysqli_connect($host, $username, $password, $dbname);

require('razorpay-php/Razorpay.php');
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
	$customername = $_SESSION['name'];
    $email = $_SESSION['email'];
    $price = "500";
    $sql = "INSERT INTO `orders` (`order_id`,`name`, `razorpay_payment_id`, `status`, `email`, `price`) VALUES ('$razorpay_order_id','$customername', '$razorpay_payment_id', 'success', '$email', '$price')";
    if(mysqli_query($conn, $sql)){
        echo "Thank You";
    }

    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
              
             $to = $email;
             $subject = "MOTHERLY HOSPITAL";
             
             $message = "Booking has been accepted with payment_id .{$_POST['razorpay_payment_id']}.\n Your appoinment is  {$_POST['razorpay_order_id']}			 Thank you for choosing us.";
       
             
             $header = "From:shwetasharma.gml@gmail.com\r\n";
             
             
             $retval = mail($to,$subject,$message,$header);

    
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
?>