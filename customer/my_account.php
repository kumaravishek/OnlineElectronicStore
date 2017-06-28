<!DOCTYPE html>
<?php
	session_start();
	include("functions/functions.php");
?>
<html>
	<head>
		<title>My online Shop</title>
		<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
	<body>
		<div class="main_wrapper">
			<header>
				<a href="../index.php"><img id="logo" src="images/logo.jpg" height="100" width="auto"/></a>
				<img id="banner" src="images/banner.png"  height="100" width="695"/>
			</header>
			<nav>
				<ul id="menu">
					<li><a href="../index.php">Home</a></li>
<?php
						if(!isset($_SESSION['customer_email']))
						{
							
						}
						else
						{
							echo "<li><a href='../my_account.php'>My Account</a></li>";
						}
					?>
					<?php
						if(isset($_SESSION['customer_email']))
						{
							echo "<li><a href='../logout.php'>Logout</a></li>";
						}
						else
						{
							echo "<li><a href='index.php?customer_register'>Sign Up</a></li>";
						}
					?>
					<li><a href="../cart.php">Shopping Cart</a></li>
					<li><a href="#">Contact Us</a></li>
				</ul>
				<div id="form">
					<form method="get" action="../results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Search a Product"/>
						<input type="submit" name="search" value="search"/>
					</form>
				</div>
			</nav>
			<section>
				<aside>
					<div id="sidebar_title">My Account</div>
					<ul id="cats">
						<?php
							$user=$_SESSION['customer_email'];
							$get_img="select *from customers where  customer_email='$user'";
							$run_img=mysqli_query($con,$get_img);
							$row_img=mysqli_fetch_array($run_img);
							$c_image=$row_img['customer_image'];
							$c_name=$row_img['customer_name'];
							echo "<p style='text-align:center;'><img src='customer_images/$c_image' width='150' height='150px'/></p>";
						?>
						<li><a href="my_account.php?my_orders">My Orders</a></li>
						<li><a href="my_account.php?edit_account">Edit Account</a></li>
						<li><a href="my_account.php?change_password">Change Password</a></li>
						<li><a href="my_account.php?delete_account">Delete Account</a></li>
						<li><a href="../logout.php">Log Out</a></li>
					</ul>
				</aside>
				<div id="section_area">
					<?php cart();?>
					<div id="shopping_cart">
						<span style="float:right;font-size:15px;padding:5px;line-height:40px;">
							<?php
								if(isset($_SESSION['customer_email']))
								{
									echo "<b>Welcome:</b>".$_SESSION['customer_email']."<b style='color:yellow;'>Your</b>";
								}
								
							?>
							<?php
								if(!isset($_SESSION['customer_email']))
								{
									echo "<a href='../checkout.php'>Login</a>";
								}
								else
								{
									echo "<a href='../logout.php' style='color:orange;'>Logout</a>";
								}
							?>
						</span>
					</div>
					<div id="products_box">
						<br/>
						<?php
							if(!isset($_GET['my_orders']))
							{
								if(!isset($_GET['edit_account']))
								{
									if(!isset($_GET['change_password']))
									{
										if(!isset($_GET['delete_account']))
										{
											echo "<h2 style='padding:20px;'>Welcome: $c_name </h2>";
											echo "<b> You can see your orders progress by clicking this <a href='my_account.php?my_orders'>Link</a>.";
										}
									}
								}
							}
						?>
						<?php
							if(isset($_GET['edit_account']))
							{
								include("edit_account.php");
							}
							if(isset($_GET['change_password']))
							{
								include("change_password.php");
							}
							if(isset($_GET['delete_account']))
							{
								include("delete_account.php");
							}
							if(isset($_GET['my_orders']))
							{
								include("my_orders.php");
							}
						?>
					</div>
				</div>
			</section>
			<footer>
				<h2 style="text-align:center;padding-top:30px">&copy;2017 by www.ecommerce.com</h2>
			</footer>
		</div>	
	</body>
</html>