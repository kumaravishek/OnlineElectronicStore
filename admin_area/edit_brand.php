<?php
	if(!isset($_SESSION['user_email']))
	{
		echo "<script>window.open('login.php?not_admin=You are not an admin!','_self')</script>";
	}
	else
	{
		
?>
<?php
	include("includes/db.php");
	if(isset($_GET['edit_brand']))
	{
		$id=$_GET['edit_brand'];
		$get_brand="select * from brands where brand_id='$id'";
		$run_brand=mysqli_query($con,$get_brand);
		$row_brand=mysqli_fetch_array($run_brand);
		$brand_id=$row_brand['brand_id'];
		$brand_title=$row_brand['brand_title'];
	}
?>
<form action="" method="post" style="padding:40px">
	<h2 align="center">Edit/Update Brand</h2>
	<br/>
	<br/>
	<p align="center"><input type="text" name="new_brand" value="<?php echo $brand_title;?>"/>
	<input type="submit" name="update_brand" value="Update Brand"/></p>
</form>
<?php
	
	if(isset($_POST['update_brand'])){
		$new_brand=$_POST['new_brand'];
		$update_id=$id;
		$update_brand="update brands set brand_title='$new_brand' where brand_id='$update_id'";
		$run_brand=mysqli_query($con,$update_brand);
		if($run_brand)
		{
			echo "<script>alert('Brand has been update!')</script>";
			echo "<script>window.open('index.php?view_brands','_self')</script>";
		}
	}
?>
	<?php } ?>