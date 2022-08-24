<?php
include("header.php");
if(isset($_POST["btnlogin"]))
{
	
	$sql= "SELECT * FROM customer WHERE email_id='$_POST[emailid]' AND password='$_POST[password]' AND status='Active'";
	$qresult = mysqli_query($con,$sql);
	if(mysqli_num_rows($qresult) == 1 )
	{
		echo "<script>alert('Logged in successfully...');</script>";
	}
	else
	{
		echo "<script>alert('Failed to login...');</script>";
	}
}
?>
