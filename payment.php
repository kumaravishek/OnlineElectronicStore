<?php
	$merchant_key  = "gtKFFx";
	$salt          = "eCwWELxi";
	$payu_base_url = "https://test.payu.in"; // For Test environment
	$action        = '';
	$currentDir	   = 'http://localhost/ecommerce/';
	$posted = array();
	if(!empty($_POST)) {
	  foreach($_POST as $key => $value) {    
	    $posted[$key] = $value; 
	  }
	}

	$formError = 0;
	if(empty($posted['txnid'])) {
	  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
	} else {
	  $txnid = $posted['txnid'];
	}

	$hash         = '';
	$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

	if(empty($posted['hash']) && sizeof($posted) > 0) {
	  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
	  ){
	    $formError = 1;

	  } else {
	   	$hashVarsSeq = explode('|', $hashSequence);
	    $hash_string = '';	
		foreach($hashVarsSeq as $hash_var) {
	      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
	      $hash_string .= '|';
	    }
	    $hash_string .= $salt;
	    $hash = strtolower(hash('sha512', $hash_string));
	    $action = $payu_base_url . '/_payment';
	  }
	} elseif(!empty($posted['hash'])) {
	  $hash = $posted['hash'];
	  $action = $payu_base_url . '/_payment';
	}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <?php
	include("includes/db.php");
	//getting product id
	$ip=getIp();
	$sql_cart="select *from cart where ip_add='$ip'";
	$result_cart=mysqli_query($con,$sql_cart);
	while($row_cart = mysqli_fetch_array($result_cart)) {
        $p_id=$row_cart['p_id'];
    }
	//getting customer detail
	$user=$_SESSION['customer_email'];
	$sql_customers="select *from customers where customer_email='$user'";
	$result_customers=mysqli_query($con,$sql_customers);
	while($row_customers= mysqli_fetch_array($result_customers)) {
        $customer_name=$row_customers['customer_name'];
		$customer_email=$row_customers['customer_email'];
		$customer_contact=$row_customers['customer_contact'];
     }
	 //getting product amount
	$sql_product="select *from products where product_id='$p_id'";
	$result_product=mysqli_query($con,$sql_product);
	while($row_product = mysqli_fetch_array($result_product)) {
        $product_id=$row_product['product_id'];
		$product_title=$row_product['product_title'];
		$product_price=$row_product['product_price'];
    }
  ?>
  <body onload="submitPayuForm()">
	
	<h3>Pay With</h3>
	<img src="images/PayUMoney_logo.png" />
    <br/>
    <?php if($formError) { ?>
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $merchant_key ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table>
        <tr>
          <td><b>Checkout informatiom</b></td>
        </tr>
        <tr>
          <td>Amount <span class="mand">*</span>: </td>
          <td><input name="amount" type="number" value="<?php echo $product_price; ?>" /></td>
          <td>Name <span class="mand">*</span>: </td>
          <td><input type="text" name="firstname" id="firstname" value="<?php echo $customer_name; ?>" /></td>
        </tr>
        <tr>
          <td>Email <span class="mand">*</span>: </td>
          <td><input type="email" name="email" id="email" value="<?php echo $customer_email; ?>" /></td>
          <td>Phone <span class="mand">*</span>: </td>
          <td><input type="text" name="phone" value="<?php echo $customer_contact; ?>" /></td>
        </tr>
        <tr>
          <td ><textarea name="productinfo" hidden><?php echo $product_id; ?></textarea></td>
        </tr>
        <tr>
          <td colspan="3"><input type="text" name="surl" value="<?php echo (empty($posted['surl'])) ? $currentDir.'paymentsuccessstatus.php' : $posted['surl'] ?>" size="64" hidden /></td>
        </tr>
        <tr>
          <td colspan="3"><input type="text" name="furl" value="<?php echo (empty($posted['furl'])) ? $currentDir.'paymentfailurestatus.php' : $posted['furl'] ?>" size="64" hidden /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="" size="64" /></td>
        </tr>

        <tr>
          <?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Submit" /></td>
          <?php } ?>
        </tr>
      </table>
    </form>
	<br/><br/>
	<p><b>Note:</b>Your order will be shipped on the address given during registration.<br/>If you want to change the address then first change it in your account book.</p>
  </body>
</html>