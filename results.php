<!DOCTYPE html>
<?php
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
					<div id="products_box">
						<?php getResult();?>
					</div>
				</div>
			</section>
			<footer>
				<h2 style="text-align:center;padding-top:10px">&copy;2017 by www.ecommerce.com</h2>
			</footer>
		</div>	
	</body>
</html>