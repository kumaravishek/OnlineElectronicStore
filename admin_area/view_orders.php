<?php
	if(!isset($_SESSION['user_email']))
	{
		echo "<script>window.open('login.php?not_admin=You are not an admin!','_self')</script>";
	}
	else
	{
		
?>
<table width="795" align="center" bgcolor="pink">
	<tr align="center">
		<td colspan="6"><h2>View All Orders</h2></td>
	</tr>
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Txn Status</th>
		<th>Txn Id</th>
		<th>Txn Customer</th>
		<th>Txn Email</th>
		<th>Txn Product</th>
		<th>Txn Amount</th>
	</tr>
	<?php
		include("includes/db.php");
		$get_c="select * from ordertransaction";
		$run_c=mysqli_query($con,$get_c);
		$i=0;
		while($row_c=mysqli_fetch_array($run_c))
		{
			$txn_no=$row_c['txn_no'];
			$txn_status=$row_c['txn_status'];
			$txn_id=$row_c['txn_id'];
			$txn_customer=$row_c['txn_customer'];	
			$txn_email=$row_c['txn_email'];
			$txn_product=$row_c['txn_product'];	
			$txn_amount=$row_c['txn_amount'];
			$i++;
	?>
	<tr align="center">
		<td><?php echo $txn_no;?></td>
		<td><?php echo $txn_status;?></td>
		<td><?php echo $txn_id;?></td>
		<td><?php echo $txn_customer;?></td>
		<td><?php echo $txn_email;?></td>
		<td><?php echo $txn_product;?></td>
		<td><?php echo $txn_amount;?></td>
	</tr>
		<?php } ?>
</table>
	<?php } ?>