<?php
	session_start();
	include("functions/functions.php");
	include("includes/db.php");
	
  $status      = $_POST["status"];
  $firstname   = $_POST["firstname"];
  $amount      = $_POST["amount"];
  $txnid       = $_POST["txnid"];
  $posted_hash = $_POST["hash"];
  $key         = $_POST["key"];
  $productinfo = $_POST["productinfo"];
  $email       = $_POST["email"];
  $salt        = "eCwWELxi"; // Your salt

  If(isset($_POST["additionalCharges"])) {

    $additionalCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;      
  } else {	  
    $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  }

  $hash = hash("sha512", $retHashSeq);

  if ($hash != $posted_hash) {
    echo "Invalid Transaction. Please try again";

  } else {
    echo "<h3>Your order status is ". $status .".</h3>";
    echo "<h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";
  }
	$insert_order="INSERT INTO ordertransaction (txn_status, txn_id, txn_customer, txn_email, txn_product, txn_amount) VALUES ('$status', '$txnid', '$firstname', '$email', '$productinfo', '$amount')";
	$run_c=mysqli_query($con,$insert_order);
	echo "for going to homepage <a href='index.php'>Click here</a>";
?>