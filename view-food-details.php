<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//Code for food request
if(isset($_POST['submit'])){
$foodid=$_GET['foodid'];
$fname=$_POST['name'];
$mnumber=$_POST['contactno'];
$msg=$_POST['message'];
$reqnumber=mt_rand(100000000,999999999);
$query=mysqli_query($con,"insert into tblfoodrequests(foodId,fullName,mobileNumber,message,requestNumber) values('$foodid','$fname','$mnumber','$msg','$reqnumber')");
    echo '<script>alert("Request Successfully Sent. Your request number is  "+"'.$reqnumber.'");</script>';
echo "<script type='text/javascript'> document.location = 'food-available.php'; </script>";

}

?>
<!DOCTYPE html>
<html>
<head>
<title>Food Waste Management System|| Food Available</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

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
<!-- typo-page -->
<!--typography-->
<div class="typrography">
	 <div class="container">
	  <?php
$vid=$_GET['foodid'];   
$ret=mysqli_query($con,"select tblfoodrequests.requestNumber,tblfoodrequests.requestDate,tblfoodrequests.mobileNumber,tblfoodrequests.message,tblfoodrequests.status,tblfoodrequests.donorRemark,tblfoodrequests.requestCompletionDate,tblfoodrequests.fullName,
tblfood.ID,tblfood.foodId,tblfood.ContactPerson,tblfood.CPMobNumber,tblfood.CreationDate,tblfood.FoodItems,tblfood.StateName,tblfood.CityName,tblfood.Description,tblfood.PickupDate,tblfood.PickupAddress,tblfood.Image,tblfood.UpdationDate,tbldonor.FullName,tbldonor.MobileNumber,tbldonor.Email from 
tblfood 
left join tblfoodrequests  on tblfood.ID=tblfoodrequests.foodId
join tbldonor on tblfood.DonorID=tbldonor.ID
 where  tblfood.ID='$vid'");
while ($row=mysqli_fetch_array($ret)) {
?>
		
		  <section id="tables">
          <div class="page-header">
            <h1>Food details of #<?php  echo $row['RequestNumber'];?></h1>
          </div>
          <div class="bs-docs-example">
            <table class="table table-bordered" style="color:#000 !important;">


      <table border="1" class="table table-bordered mg-b-0">

  <tr>
    <th>Register By </th>
    <td><?php  echo $row['FullName'];?></td>
 
    <th>Registred Mobile Number</th>
    <td><?php  echo $row['MobileNumber'];?></td>
  </tr>
<tr>
    <th>Registred Email</th>
    <td><?php  echo $row['Email'];?></td>

    <th>Contact Person</th>
    <td><?php  echo $row['ContactPerson'];?></td>
</tr>
<tr>
    <th>Contact Person Moible Number</th>
    <td><?php  echo $row['CPMobNumber'];?></td>

<th>Pick Up Address</th>
<td>
<?php echo $row['PickupAddress']; ?>
  </td>
  </tr>

<tr>
    <th>State Name</th>
    <td><?php echo $row['StateName']; ?></td>

<th>City Name</th>
<td>
<?php echo $row['CityName']; ?>
  </td>
  </tr>
  <tr>
<th>Description</th>
<td>
<?php echo $row['Description']; ?>
  </td>

<th>Pick Up Date</th>
<td>
<?php echo $row['PickupDate']; ?>
  </td>
  </tr>

  <tr>
<th>Image</th>
<td>
<img src="donor/images/<?php echo $row['Image']; ?>" width="200" height="200">
  </td>

    <th>Status</th>
    <td> <?php  
if($row['status']==""){
echo "Not Confirmed Yet";
}else{echo $row['status'];}
;?></td>
  </tr>
  <?php if($row['status']==""){ ?>
  <tr>
  	<td colspan="4"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Request Food</button></td>
  </tr>
<?php }  ?>
  </table><?php } ?>

            
          </div>
<!--         <div class="col-md-6">
				  <nav>
				  <ul class="pagination pagination-lg">
					<li><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
				  </ul>
				  </nav>
				
			 </div> -->
	</div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Food Request</h4>
      </div>
      <form method="post">
      <div class="modal-body">
        <p><input type="text" class="form-control" name="name" placeholder="Full Name" required></p>
        <p style="margin-top:1%"><input type="text" class="form-control" name="contactno" placeholder="Mobile Number" pattern="[0-9]{10}" title="10 numeric characters only"  required></p>
        <p style="margin-top:1%"><textarea name="message" class="form-control" placeholder="Message if any"></textarea></p>
        <p style="margin-top:2%"> <button type="submit" name="submit" class="btn btn-primary" >Submit</button></p>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- //typo-page -->
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