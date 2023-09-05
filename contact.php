<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);

if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $message=$_POST['message'];
     
    $query=mysqli_query($con, "insert into tblcontact(FirstName,LastName,Phone,Email,Message) value('$fname','$lname','$phone','$email','$message')");
    if ($query) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Food Waste Management System| Contact Us</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
<!--webfont-->
<!--js-->
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
		</script>
<!---- start-smoth-scrolling---->
</head>
<body>
<?php include_once("includes/header.php");?>
<!-- banner -->
<div class="banner page-head">	
</div>
<!-- //banner -->
<!-- about-page -->
<div class="contact">
	<div class="container">
		<div class="contact-header">
			<h3>CONTACT</h3>
		</div>
		<div class="contact-gds">
			<div class="col-md-6 contact-top">
				<h3>Want to work with us?</h3>
				<form action="#" method="post">
					<div class="con-text">
						<span>First Name </span>		
						<input type="text" class="form-control" placeholder="First Name" required="" name="fname">						
					</div>
					<div class="con-text">
						<span>Last Name </span>		
						<input type="text" class="form-control" placeholder="Last Name" required="" name="lname">						
					</div>
					<div class="con-text">
						<span>Phone </span>		
						<input type="text" class="form-control" placeholder="Phone" required="" name="phone" pattern="[0-9]+" maxlength="10">						
					</div>
					<div class="con-text">
					  <span>Your Email </span>		
					  <input type="email" class="form-control" placeholder="Email" required="" name="email">						
					</div>
					
					<div class="con-text">
					  <span>Your Message</span>		
					  <textarea class="form-control" rows="3" placeholder="Message.." required="" name="message"></textarea>	
					</div>
					<button type="submit" class="btn btn-success" type="submit" name="submit">Send</button>
			</div></form>
			<div class="col-md-6 contact-top">
				<?php

$ret=mysqli_query($con,"select * from tblpages where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
				<h3 class="info"> <?php  echo $row['PageTitle'];?></h3>
					<h4 class="mb-lg-3 mb-2">Address </h4>
                     <p><?php  echo $row['PageDescription'];?></p>	
                    
					
			</div><?php } ?>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!-- //about-page -->
<?php include_once("includes/footer.php");?>
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

</body>
</html>