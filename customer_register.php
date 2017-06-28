<!DOCTYPE html>
<?php
	session_start();
	include("functions/functions.php");
	include("includes/db.php");
?>
<html>
	<head>
		<title>My online Shop</title>
		<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
	<body>
		<div class="main_wrapper">
			<header>
				<a href="index.php"><img id="logo" src="images/logo.jpg" height="100" width="auto"/></a>
				<img id="banner" src="images/banner.png"  height="100" width="695"/>
			</header>
			<nav>
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<?php
						if(!isset($_SESSION['customer_email']))
						{
							
						}
						else
						{
							echo "<li><a href='customer/my_account.php'>My Account</a></li>";
						}
					?>
					<?php
						if(isset($_SESSION['customer_email']))
						{
							echo "<li><a href='logout.php'>Logout</a></li>";
						}
						else
						{
							echo "<li><a href='index.php?customer_register'>Sign Up</a></li>";
						}
					?>
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search a Product"/>
						<input type="submit" name="search" value="search"/>
					</form>
				</div>
			</nav>
			<section>
				<aside>
					<div id="sidebar_title">Categories</div>
					<ul id="cats">
						<?php getCats(); ?>
					</ul>
					<div id="sidebar_title">Brands</div>
					<ul id="cats">
						<?php getBrands(); ?>
						
					</ul>
				</aside>
				<div id="section_area">
					<?php cart();?>
					<div id="shopping_cart">
						<span style="float:right;font-size:18px;padding:5px;line-height:40px;">
							Welcome Guest! <b style="color:yellow;">Shopping Cart- </b> Total items:<?php total_items();?>  Total price: <?php total_price();?> <a href="cart.php" style="color:yellow">Go to Cart</a>
						</span>
					</div>
					<form action="customer_register.php" method="post" enctype="multipart/form-data">
						<table align="center" width="750">
							<tr align="center">
								<td colspan="5"><h2>Create an Account</h2></td>
							</tr>
							<tr>
								<td align="right">Customer Name:</td>
								<td><input type="text" name="c_name" required /></td>
							</tr>
							<tr>
								<td align="right">Customer Email:</td>
								<td><input type="email" name="c_email" required /></td>
							</tr>
							<tr>
								<td align="right">Customer Password:</td>
								<td><input type="password" name="c_pass"required /></td>
							</tr>
							<tr>
								<td align="right">Customer Image:</td>
								<td><input type="file" name="c_image" required /></td>
							</tr>
							<tr>
								<td align="right">Coustomer Country:</td>
								<td>
									<select name="c_country" required>
										<option>Select a Country</option>
										<option>India</option>
									</select>
								</td>
							</tr>
							<tr>
								<td align="right">Customer City:</td>
								<td><input type="text" name="c_city" required /></td>
							</tr>
							<tr>
								<td align="right">Customer Contact:</td>
								<td><input type="text" name="c_conc" required /></td>
							</tr>
							<tr>
								<td align="right">Customer Address:</td>
								<td><textarea name="c_add" rows="5" cols="20" required ></textarea></td>
							</tr>
							<tr align="center">
								<td colspan="5"><input type="submit" name="register" value="Create Account"/></td>
							</tr>
						</table>
					</form>
					<h2 style="float:right;padding:15px; padding-right:50px;"><a href="customer_register.php?customer_login" style="text-decoration:none">Already Register...Login</a></h2>
				</div>
			</section>
			<footer>
				<h2 style="text-align:center;padding-top:10px">&copy;2017 by www.ecommerce.com</h2>
			</footer>
		</div>	
	</body>
</html>
<?php
	if(isset($_POST['register']))
	{
		$ip=getIp();
		$c_name=$_POST['c_name'];
		$c_email=$_POST['c_email'];
		$c_pass=$_POST['c_pass'];
		$c_country=$_POST['c_country'];
		$c_city=$_POST['c_city'];
		$c_conc=$_POST['c_conc'];
		$c_add=$_POST['c_add'];
		$c_image=$_FILES['c_image']['name'];
		$c_image_tmp=$_FILES['c_image']['tmp_name'];
		move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
		
		$insert_c="insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_image,customer_address) values ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_conc','$c_image','$c_add')";
		$run_c=mysqli_query($con,$insert_c);

		$sel_cart="select * from cart where ip_add='$ip'";
		$run_cart=mysqli_query($con, $sel_cart);
		$check_cart=mysql_num_rows($run_cart);
		if($check_cart==0)
		{
			
			$_SESSION['customer_email']=$c_email;
			echo "<script>alert('Registration Success, thanks!')</script>";
			echo "<script>window.open('customer/my_account.php','_self')</script>";
		}
		else
		{
			$_SESSION['customer_email']=$c_email;
			echo "<script>alert('Registration Success, thanks!')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";
		}
		
	}
?>
