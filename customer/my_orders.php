<table width="700" align="center" bgcolor="pink">
	<tr align="center">
		<td colspan="5"><h2>My Orders</h2></td>
	</tr>
	<tr align="center" bgcolor="skyblue">
		<th>S.N</th>
		<th>Txn Status</th>
		<th>Txn Id</th>
		<th>Txn Product</th>
		<th>Txn Amount</th>
	</tr>
	<?php
		include("includes/db.php");
		$user=$_SESSION['customer_email'];
		$get_c="select * from ordertransaction where txn_email='$user'";
		$run_c=mysqli_query($con,$get_c);
		$i=0;
		while($row_c=mysqli_fetch_array($run_c))
		{
			$txn_status=$row_c['txn_status'];
			$txn_id=$row_c['txn_id'];
			
			$p_id=$row_c['txn_product'];	
			$sql_product="select *from products where product_id='$p_id'";
			$result_product=mysqli_query($con,$sql_product);
			while($row_product = mysqli_fetch_array($result_product)) {
				$product_title=$row_product['product_title'];
			}
			$txn_amount=$row_c['txn_amount'];
			$i++;
	?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $txn_status;?></td>
		<td><?php echo $txn_id;?></td>
		<td><?php echo $product_title;?></td>
		<td><?php echo $txn_amount;?></td>
	</tr>
	<?php } ?>
</table>
	