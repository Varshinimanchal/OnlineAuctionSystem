<?php
include("header.php");
?>
<!-- services -->
<div class="services" id="services">
		<div class="container">
<div class="heading">
	<h3 data-aos="zoom-in" >Message Box</h3>
</div>

<form method="post"	action="" onsubmit="return validateform()" enctype="multipart/form-data" >	
<div class="row">
		<div  class="col-md-3" style='padding-left:5px;cursor:pointer; border-color: #afdfa0;  box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);'>
<?php
	$sqlmessagelist ="SELECT * FROM message LEFT JOIN customer as sender on message.sender_id =sender.customer_id LEFT JOIN customer AS receiver on receiver.customer_id=message.receiver_id LEFT JOIN product on message.product_id=product.product_id WHERE message.message_id!='0' ";
	if(isset($_SESSION['customer_id']))
	{
	$sqlmessagelist = $sqlmessagelist . " AND message.receiver_id='$_SESSION[customer_id]' ";
	}
	$sqlmessagelist = $sqlmessagelist . " GROUP BY message.sender_id  ORDER BY message.message_date_time DESC";
	echo mysqli_error($con);
	//echo $sqlmessagelist;
	$qsqlmessagelist = mysqli_query($con,$sqlmessagelist);
	while($rsmessagelist = mysqli_fetch_array($qsqlmessagelist))
	{
		echo "<div class='panel panel-default' style='padding-left:5px;cursor:pointer; border-color: #cfdc00;  box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);' onclick='loadmessage($rsmessagelist[sender_id],$rsmessagelist[receiver_id],$rsmessagelist[product_id])'>";
		echo "<b>" .$rsmessagelist[8] . "</b><br>";
		echo "<i class='fa fa-calendar'></i>" . date("d-M-Y h:i A",strtotime($rsmessagelist['message_date_time'])) . "<br>";
		echo "<i class='fa fa fa-flickr'></i>" .$rsmessagelist['product_name'] ;
		echo "</div>";
	}
?>
		</div>
		<div  class="col-md-9"  style='padding-left:5px;cursor:pointer; border-color: #afdfa0;  box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);'>
<div class="popup-box chat-popup" id="qnimate" >
    		  <div class="popup-head">
				<div class="popup-head-left pull-left"><?php echo $rsproduct['hall_name']; ?></div>
			  </div>
			  
			<div class="popup-messages" id="popup-messages"  style='overflow:auto; height:400px;'>
			<?php
			//include("chatmessenger.php");
			?>
			</div>

			<div class="popup-messages-footer"  id="popup-messages-footer">
				<textarea id="status_message" placeholder="Type a message..." style="width:100%;" name="message"></textarea>
			</div>
	  </div>

		</div>
		
		<div  class="col-md-12">
			<hr>
		</div>
</div>

				<div class="clearfix"> </div>
		</div>






</form>								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
</div>
<!-- //services -->
<?php
include("footer.php");
?>
<script>

$('#status_message').bind('keyup', function(e) {
	var message = $('#status_message').val();
	if(message != "")
	{
		if ( e.keyCode === 13 ) 
		{	// 13 is enter key
	
			$.post("chatmessenger.php",
			{
				'message': message,
				'productid': 0,
				'senderid': 0,
				'receiverid': 0,
				'status':'Hall',
				'btnmessage':'btnmessage'
			},
			function(data, status){
				$('#status_message').val('');
				$('#popup-messages').html(data);
				$('#popup-messages').scrollTop($('#popup-messages')[0].scrollHeight);
			});
	
		}
	}
});

function loadmessage(senderid,receiverid,productid)
{
	var message = "";
			$.post("chatmessenger.php",
			{
				'message': message,
				'productid': productid,
				'senderid': senderid,
				'receiverid': receiverid,
				'status':'Seller',
				'btnmessage':'btnmessage'
			},
			function(data, status){
				//$('#status_message').val('');
				$('#popup-messages').html(data);
				$('#popup-messages').scrollTop($('#popup-messages')[0].scrollHeight);
			});
}
</script>
<script>
setInterval(function(){
    loadmessage(0,0); // this will run after every 5 seconds
}, 5000);
</script>