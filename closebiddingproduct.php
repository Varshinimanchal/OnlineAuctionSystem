<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM product WHERE product_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('product record deleted successfully...');</script>";
	}
}
?> 
<!-- banner -->
	<div class="banner">
<!-- about -->
		<div class="privacy about">
			<h3>View Closed Biddings</h3>

			<div class="checkout-left">	

				<div class="col-md-12 ">
<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >			
	<thead>
		<tr>
		    <th>Product Image</th>
			<th>Winners List</th>
			<th>Product name</th>
		    <th>Customer</th>
			<th>Starting bid</th>
			<th>Closed bid</th>
			<th>Bidding date</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$sql = "select * from product LEFT JOIN customer ON product.customer_id = customer.customer_id LEFT JOIN category ON product.category_id =category.category_id WHERE  product_id != '' ";
		if(isset($_SESSION["customer_id"]))
		{
			$sql = $sql . " AND customer_id='$_SESSION[customer_id]'";
		}
		$sql = $sql . " AND product.status='Active' AND end_date_time<'$dt $tim'";
		$sql = $sql . " ORDER BY product.product_id DESC";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			
			$sqlbidding = "SELECT MAX(bidding_amount),customer_id FROM bidding  WHERE bidding.product_id='$rs[0]'";
			$qsqlbidding = mysqli_query($con,$sqlbidding);
			$rsbidding = mysqli_fetch_array($qsqlbidding);			
			
			$sqlcustomer = "SELECT * FROM customer  WHERE customer_id='$rsbidding[1]'";
			$qsqlcustomer = mysqli_query($con,$sqlcustomer);
			$rscustomer = mysqli_fetch_array($qsqlcustomer);
			
			echo "<tr>
				<td><img src='imgproduct/$rs[product_image]' width='100px;' ></td>
				<td>$rscustomer[customer_name]<br>
				<b>(won for ₹$rsbidding[0])</b>
				</td>
				<td>$rs[product_name]<br><font color='red'>[Product category-$rs[category_name]]</font></td>
			    <td>$rs[customer_name]</td>
				<td>₹$rs[starting_bid]</td>
				<td>₹$rs[ending_bid]</td>
				<td>". date("d-M-Y h:i A",strtotime($rs['start_date_time'])) . " -<br> ".  date("d-M-Y h:i A",strtotime($rs['end_date_time'])) ; 
			
			echo "</tr>";
		}
		?>
	</tbody>
</table>
				</div>
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
<!-- //about -->
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<script>
function deleteconfirm()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return  true;
	}
	else
	{
		return false;
	}
}
</script>

<?php
include("datatable.php");
include("footer.php");
?>