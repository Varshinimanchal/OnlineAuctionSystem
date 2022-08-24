<?php
session_start();
include("header.php");
?>


<!-- testimonials -->
	<div class="testimonials">
		<div class="container">
			<h3>Chat Window</h3>
				<div class="w3_testimonials_grids">
					<div >
					<div class="container">
	<div class="row">


                 <div class="col-md-4">
				 
<?php
$sqlmessage = "select * from message LEFT JOIN customer ON message.sender_id=customer.customer_id GROUP BY message.sender_id ORDER BY message.message_date_time DESC";
$qsqlmessage = mysqli_query($con,$sqlmessage);
while($rsmessage =mysqli_fetch_array($qsqlmessage))
{
?>
	<a href="" class="chatperson" onclick="return false;">
		<span class="chatimg">
			<img src="http://via.placeholder.com/50x50?text=A" alt="" />
		</span>
		<div class="namechat">
			<div class="pname"><?php echo $rsmessage['customer_name']; ?></div>
			<div class="lastmsg"><?php echo $rsmessage['message']; ?></div>
		</div>
	</a>
<?php
}
?>		
                 </div>
                 <div class="col-md-8">
                  <div class="chatbody" style="height: 440px;width: 100%;overflow: auto; float: left; position: relative;margin-left: -5px;" >
<?php
$sqlmessage = "select * from message LEFT JOIN customer ON message.sender_id=customer.customer_id WHERE  ORDER BY message.message_date_time ASC";
$qsqlmessage = mysqli_query($con,$sqlmessage);
while($rsmessage =mysqli_fetch_array($qsqlmessage))
{
?>
	<a href="" class="chatperson" onclick="return false;">
		<div class="namechat">
			<div class="pname"><?php echo $rsmessage['customer_name']; ?> - <span font-size='font-size:9px;'><?php echo date("d-M-Y h:i A",strtotime($rsmessage['message_date_time'])); ?></span></div>
			<div class="lastmsg"><?php echo $rsmessage['message']; ?></div>
		</div>
	</a>
<?php
}
?>	
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
					  <textarea class="form-control" placeholder="Enter message here..."></textarea>
                    </div>
                  </div>
                 </div>
             </div>
</div>
<Style>
.chatperson{
  display: block;
  border-bottom: 1px solid #eee;
  width: 100%;
  display: flex;
  align-items: center;
  white-space: nowrap;
  overflow: hidden;
  margin-bottom: 15px;
  padding: 4px;
}
.chatperson:hover{
  text-decoration: none;
  border-bottom: 1px solid orange;
}
.namechat {
    display: inline-block;
    vertical-align: middle;
}
.chatperson .chatimg img{
  width: 40px;
  height: 40px;
  background-image: url('http://i.imgur.com/JqEuJ6t.png');
}
.chatperson .pname{
  font-size: 18px;
  padding-left: 5px;
}
.chatperson .lastmsg{
  font-size: 12px;
  padding-left: 5px;
  color: #ccc;
}
</style>

					
									<div class="clearfix"> </div>
					</div>
				</div>
		</div>
	</div>
<!-- //testimonials -->



<?php
include("footer.php");
?>