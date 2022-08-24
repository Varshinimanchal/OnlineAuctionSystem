<?php
include("databaseconnection.php");
date_default_timezone_set('Asia/Kolkata');
$sqlproduct1 = "SELECT * FROM product LEFT JOIN customer ON customer.customer_id = product.customer_id WHERE product.product_id='$_GET[productid]'";
$qsqlproduct1 = mysqli_query($con,$sqlproduct1);
$rsproduct1 = mysqli_fetch_array($qsqlproduct1);
$receiverid=$rsproduct1['customer_id'];
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<!------ Include the above in your HEAD tag ---------->
<div class="container">
	<div class="row">
        <div class="round hollow">
        <a href="#" id="addClass"><span class="glyphicon glyphicon-comment"></span> Chat with seller </a>
        </div>
	</div>
</div>


<div class="popup-box chat-popup" id="qnimate" >
    		  <div class="popup-head">
				<div class="popup-head-left pull-left">
				<?php
				/*<img src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" alt="iamgurdeeposahan"> */ 
				?>
				<?php echo $rsproduct1[16]; ?></div>
					  <div class="popup-head-right pull-right">

<button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-off"></i></button>

<button data-widget="maximize" id="idmaximize" class="chat-header-button pull-right" type="button" ><i class="glyphicon glyphicon-plus" style="" ></i></button>

<button data-widget="hide" id="idminimize" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-minus"></i></button>
                      </div>
			  </div>
			  
			<div class="popup-messages" id="popup-messages" >
				<?php
				include("chatmessage.php");
				?>
			</div>

	<div class="popup-messages-footer"  id="popup-messages-footer">
		<textarea id="status_message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
	</div>

</div>
	  
<script>
	
  $(function(){
$("#addClass").click(function () {
        $("#idmaximize").hide();
          $('#qnimate').addClass('popup-box-on');
            });
            $("#removeClass").click(function () {
          $('#qnimate').removeClass('popup-box-on');
            });	
  })
</script>
<script>
$('#status_message').bind('keyup', function(e) {
	if($('#status_message').val() != "")
	{
		if ( e.keyCode === 13 ) 
		{	// 13 is enter key
			var message = $('#status_message').val();
				$.post("chatmessage.php",
				{
					'message': message,
					'product_id': <?php echo $_GET['productid']; ?>,
					'senderid': <?php echo $_SESSION['customer_id']; ?>,
					'receiverid': <?php echo $receiverid; ?>,
					'btnmessage': "Submit"
				},
				function(data, status){
					$('#status_message').val('');
					$('#popup-messages').html(data);
					$('#popup-messages').scrollTop($('#popup-messages')[0].scrollHeight);
				});
		}
	}
});
</script>
<script>
$(document).ready(function(){	
    $("#idminimize").click(function(){
        $("#popup-messages").hide();
        $("#popup-messages-footer").hide();	
        $("#idminimize").hide();		
        $("#idmaximize").show();		
    });	
    $("#idmaximize").click(function(){
        $("#popup-messages").show();
        $("#popup-messages-footer").show();	
        $("#idminimize").show();		
        $("#idmaximize").hide();	
    });
});
</script>
<script>
function loadmessage(senderid,receiverid,productid)
{
	var message = "";
			$.post("chatmessenger.php",
			{
				'message': message,
				'productid': <?php echo $_GET['productid']; ?>,
				'senderid': <?php echo $_SESSION['customer_id']; ?>,
				'receiverid': <?php echo $receiverid; ?>,
				'status':'Seller',
				'btnmessage':'btnmessage'
			},
			function(data, status){
				//$('#status_message').val('');
				$('#popup-messages').html(data);
				$('#popup-messages').scrollTop($('#popup-messages')[0].scrollHeight);
			});
}
setInterval(function(){
    loadmessage(0,0); // this will run after every 5 seconds
}, 5000);
</script>
	  
<style>
@import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
@import url(https://fonts.googleapis.com/css?family=Open+Sans);

.popup-box {
   background-color: #ffffff;
    border: 1px solid #b0b0b0;
    bottom: 0;
    display: none;
    /*height: 415px;*/
    position: fixed;
    right: 0px;
    width: 300px;
    font-family: 'Open Sans', sans-serif;
	z-index: 1;
}
.round.hollow {
    margin: 0px 0 20px;
}
.round.hollow a {
    border: 2px solid #ff6701;
    border-radius: 35px;
    color: red;
    color: #ff6701;
    font-size: 23px;
    padding: 10px 21px;
    text-decoration: none;
    font-family: 'Open Sans', sans-serif;
}
.round.hollow a:hover {
    border: 2px solid #000;
    border-radius: 35px;
    color: red;
    color: #000;
    font-size: 23px;
    padding: 10px 21px;
    text-decoration: none;
}
.popup-box-on {
    display: block !important;
}
.popup-box .popup-head {
    background-color: #fff;
    clear: both;
    color: #7b7b7b;
    display: inline-table;
    font-size: 21px;
    /*padding: 7px 10px;*/
	padding: 0px 10px;
    width: 100%;
     font-family: Oswald;
}
.bg_none i {
    border: 1px solid #ff6701;
    border-radius: 25px;
    color: #ff6701;
    font-size: 17px;
    height: 33px;
    line-height: 30px;
    width: 33px;
}
.bg_none:hover i {
    border: 1px solid #000;
    border-radius: 25px;
    color: #000;
    font-size: 17px;
    height: 33px;
    line-height: 30px;
    width: 33px;
}
.bg_none {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
}
.popup-box .popup-head .popup-head-right {
    margin: 11px 7px 0;
}
.popup-head-left img {
    border: 1px solid #7b7b7b;
    border-radius: 50%;
    width: 44px;
}
.popup-messages-footer > textarea {
    border-bottom: 1px solid #b2b2b2 !important;
    height: 50px !important;
    margin: 7px;
    padding: 5px !important;
    /* border: medium none;*/
    width: 95% !important;
}
.popup-messages-footer {
    background: #fff none repeat scroll 0 0;
    bottom: 0;
    position: absolute;
    width: 100%;
}
.popup-messages-footer .btn-footer {
    overflow: hidden;
    padding: 2px 5px 10px 6px;
    width: 100%;
}
.simple_round {
    background: #d1d1d1 none repeat scroll 0 0;
    border-radius: 50%;
    color: #4b4b4b !important;
    height: 21px;
    padding: 0 0 0 1px;
    width: 21px;
}
.popup-box .popup-messages {
    background: #3f9684 none repeat scroll 0 0;
    height: 375px;
    overflow: auto;
	padding-bottom: 60px;
}
.direct-chat-messages {
    overflow: auto;
    padding: 10px;
    transform: translate(0px, 0px);
    
}
.popup-messages .chat-box-single-line {
    border-bottom: 1px solid #a4c6b5;
    height: 12px;
    margin: 7px 0 20px;
    position: relative;
    text-align: center;
}
.popup-messages abbr.timestamp {
    background: #3f9684 none repeat scroll 0 0;
    color: #fff;
    padding: 0 11px;
}

.popup-head-right .btn-group {
    display: inline-flex;
	margin: 0 8px 0 0;
	vertical-align: top !important;
}
.chat-header-button {
    background: transparent none repeat scroll 0 0;
    border: 1px solid #636364;
    border-radius: 50%;
    font-size: 14px;
    height: 30px;
    width: 30px;
}
.popup-head-right .btn-group .dropdown-menu {
    border: medium none;
    min-width: 122px;
	padding: 0;
}
.popup-head-right .btn-group .dropdown-menu li a {
    font-size: 12px;
    padding: 3px 10px;
	color: #303030;
}

.popup-messages abbr.timestamp {
    background: #3f9684  none repeat scroll 0 0;
    color: #fff;
    padding: 0 11px;
}
.popup-messages .chat-box-single-line {
    border-bottom: 1px solid #a4c6b5;
    height: 12px;
    margin: 7px 0 20px;
    position: relative;
    text-align: center;
}
.popup-messages .direct-chat-messages {
    height: auto;
}
.popup-messages .direct-chat-text {
    background: #dfece7 none repeat scroll 0 0;
    border: 1px solid #dfece7;
    border-radius: 2px;
    color: #1f2121;
}

.popup-messages .direct-chat-timestamp {
    color: #fff;
    opacity: 0.6;
}

.popup-messages .direct-chat-name {
	font-size: 15px;
	font-weight: 600;
	margin: 0 0 0 49px !important;
	color: #fff;
	opacity: 0.9;
}
.popup-messages .direct-chat-info {
    display: block;
    font-size: 12px;
    margin-bottom: 0;
}
.popup-messages  .big-round {
    margin: -9px 0 0 !important;
}
.popup-messages  .direct-chat-img {
    border: 1px solid #fff;
	background: #3f9684  none repeat scroll 0 0;
    border-radius: 50%;
    float: left;
    height: 40px;
    margin: -21px 0 0;
    width: 40px;
}
.direct-chat-reply-name {
    color: #fff;
    font-size: 15px;
    margin: 0 0 0 10px;
    opacity: 0.9;
}

.direct-chat-img-reply-small
{
    border: 1px solid #fff;
    border-radius: 50%;
    float: left;
    height: 20px;
    margin: 0 8px;
    width: 20px;
	background:#3f9684;
}

.popup-messages .direct-chat-msg {
    margin-bottom: 10px;
    position: relative;
}

.popup-messages .doted-border::after {
	background: transparent none repeat scroll 0 0 !important;
    border-right: 2px dotted #fff !important;
	bottom: 0;
    content: "";
    left: 17px;
    margin: 0;
    position: absolute;
    top: 0;
    width: 2px;
	 display: inline;
	  z-index: -2;
}

.popup-messages .direct-chat-msg::after {
    background: #fff none repeat scroll 0 0;
    border-right: medium none;
    bottom: 0;
    content: "";
    left: 17px;
    margin: 0;
    position: absolute;
    top: 0;
    width: 2px;
	 display: inline;
	  z-index: -2;
}
.direct-chat-text::after, .direct-chat-text::before {
   
    border-color: transparent #dfece7 transparent transparent;
    
}
.direct-chat-text::after, .direct-chat-text::before {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: transparent #d2d6de transparent transparent;
    border-image: none;
    border-style: solid;
    border-width: medium;
    content: " ";
    height: 0;
    pointer-events: none;
    position: absolute;
    right: 100%;
    top: 15px;
    width: 0;
}
.direct-chat-text::after {
    border-width: 5px;
    margin-top: -5px;
}
.popup-messages .direct-chat-text {
    background: #dfece7 none repeat scroll 0 0;
    border: 1px solid #dfece7;
    border-radius: 2px;
    color: #1f2121;
}
.direct-chat-text {
	/*
    background: #d2d6de none repeat scroll 0 0;
    border: 1px solid #d2d6de;
    border-radius: 5px;
    color: #444;
    margin: 5px 0 0 50px;
    padding: 5px 10px;
    position: relative;
	*/
}
</style>