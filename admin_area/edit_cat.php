<?php
	include("includes/db.php");
	if(!isset($_SESSION['user_email']))
	{
		echo "<script>window.open('login.php?not_admin=You are not an admin!','_self')</script>";
	}
	else
	{
		

	if(isset($_GET['edit_cat']))
	{
		$id=$_GET['edit_cat'];
		$get_cat="select * from categories where cat_id='$id'";
		$run_cat=mysqli_query($con,$get_cat);
		$row_cat=mysqli_fetch_array($run_cat);
		$cat_id=$row_cat['cat_id'];
		$cat_title=$row_cat['cat_title'];
	}
?>
<form action="" method="post" style="padding:40px">
	<h2 align="center">Edit/Update Category</h2>
	<br/>
	<br/>
	<p align="center"><input type="text" name="new_cat" value="<?php echo $cat_title;?>"/>
	<input type="submit" name="update_cat" value="Update Category"/></p>
</form>
<?php
	
	if(isset($_POST['update_cat'])){
		$new_cat=$_POST['new_cat'];
		$update_id=$id;
		$update_cat="update categories set cat_title='$new_cat' where cat_id='$update_id'";
		$run_cat=mysqli_query($con,$update_cat);
		if($run_cat)
		{
			echo "<script>alert('category has been update!')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}
	}
?>
	<?php } ?>