<?php
	include("includes/db.php");
	if(!isset($_SESSION['user_email']))
	{
		echo "<script>window.open('login.php?not_admin=You are not an admin!','_self')</script>";
	}
	else
	{
		
	if(isset($_GET['delete_cat']))
	{
		$delete_id=$_GET['delete_cat'];
		$delete_cat="delete from categories where cat_id='$delete_id'";
		$run_delete=mysqli_query($con,$delete_cat);
		if($run_delete)
		{
			echo "<script>alert('A category has been deleted!')</script>";
			echo "<script>window.open('index.php?view_cats','_self')</script>";
		}
	}
?>
	<?php } ?>