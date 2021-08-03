<?php
$apikey = "rzp_test_60kAv2uiyTZK3O";
?>

<form action="" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apikey; ?>" //Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="50000" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"   // You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account

    data-buttontext="Pay with Razorpay"
    data-name="MOTHERLY HOSPITAL"
    data-description="MATERNITY & CHILD CARE"
    data-image="assets/img/img2.jpg"
    data-prefill.name="<?php echo $_POST['name'];?>"
    data-prefill.email="<?php echo $_POST['email'];?>"
	data-prefill.contact="<?php echo $_POST['contact'];?>"
    data-theme.color="##ff6666"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>

