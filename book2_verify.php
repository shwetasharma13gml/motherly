<?php

require('book_db.php');
session_start();
//db connection
$conn = mysqli_connect($host, $username, $password, $dbname);

require('rpay/razorpay-php/Razorpay.php');
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
    $email = $_SESSION['email'];
	$phone = $_SESSION['phone'] ;
	$address = $_SESSION['address'] ;
    $date = $_SESSION['date'];
	$slot = $_SESSION['slot'];
	$speciality = $_SESSION['speciality'] ;
    $price = "500";
	$sql = "INSERT INTO `bookings`( `name`, `age`, `gender`, `email`, `phone`, `address`, `date`, `slot`, `speciality`, `order_id`, `razorpay_payment_id`, `status`, `price`) VALUES ('$name', '$age', '$gender', '$email', '$phone','$address', '$date', '$slot', '$speciality','$razorpay_order_id','$razorpay_payment_id', 'success', '$price')"; 

    if(mysqli_query($conn, $sql)){
        echo "Thank You";
    
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
              
             $to = $email;
             $subject = "MOTHERLY HOSPITAL";
             
             $message = "Booking has been accepted with payment_id .{$_POST['razorpay_payment_id']}.\n Your appoinment is  {$_POST['razorpay_order_id']} .\n Thank you for choosing us.";
       
             
             $header = "From:shwetasharma.gml@gmail.com\r\n";
             
             
             $retval = mail($to,$subject,$message,$header);
			 
$fields = array(
    "message" => "new booking with id{$_POST['razorpay_order_id']} ",
    "language" => "english",
    "route" => "q",
    "numbers" => "9211306853",
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($fields),
  CURLOPT_HTTPHEADER => array(
    "authorization: krUO0ERy6nmv9QozKL5xgIZ3SAM1J4wehFBNtbsuCcjXiDPaG7MpzZ8blicP1WADCKEd3woL64VXG2hI",
    "accept: */*",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}

}
}
?>