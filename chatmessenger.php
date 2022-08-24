<?php
session_start();
error_reporting(0);
include("databaseconnection.php");
date_default_timezone_set('Asia/Kolkata');
$dttim = date("Y-m-d H:i:s");
if($_POST['senderid'] != 0 )
{
	$_SESSION['senderid'] = $_POST['senderid'];
}
if($_POST['receiverid'] != 0 )
{
	$_SESSION['receiverid'] = $_POST['receiverid'];
}
if($_POST['productid'] != 0 )
{
	$_SESSION['productid'] = $_POST['productid'];
}
if($_POST['message'] != "")
{
	$sql ="INSERT INTO message(sender_id,receiver_id,message_date_time,product_id,message,status) values('$_SESSION[senderid]','$_SESSION[receiverid]','$dttim','$_SESSION[productid]','$_POST[message]','Seller')";
	$qsql= mysqli_query($con,$sql);
	echo mysqli_error($con);
}
?>
<?php
$sqlmessage ="SELECT * FROM message LEFT JOIN customer as sender ON sender.customer_id=message.sender_id LEFT JOIN customer as receiver ON receiver.customer_id=message.receiver_id WHERE message.sender_id='$_SESSION[senderid]' AND  message.product_id='$_SESSION[productid]' AND message.receiver_id='$_SESSION[receiverid]'";
$qsqlmessage = mysqli_query($con,$sqlmessage);
while($rsmessage = mysqli_fetch_array($qsqlmessage))
{
	if($rsmessage[6] == "Customer")
	{
		$sendername = $rsmessage[8];
	}
	else
	{
		$sendername = $rsmessage[20];
	}
?>
<div class="direct-chat-messages" style="padding-left:10px;" >
	<div class="direct-chat-msg doted-border">
	  <div class="direct-chat-text">
	  <b><?php echo $sendername; ?></b> | <?php echo date("d-M-Y h:i A",strtotime($rsmessage['message_date_time'])); ?><br><b><?php echo $rsmessage['message']; ?></b>
	  </div>
	</div>
</div>
<?php
}
?>