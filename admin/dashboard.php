<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasaid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE html>
<head>
<title>Food Waste Management System | dashboard </title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
</head>
<body>
<section id="container">
<!--header start-->

<!--header end-->
<?php include_once('includes/header.php');?>
<!--sidebar start-->

<!--sidebar end-->
<?php include_once('includes/sidebar.php');?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<!-- //market-->
		<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-globe"> </i>
					</div>
					<?php $query1=mysqli_query($con,"Select * from  tblstate");
$statecounts=mysqli_num_rows($query1);
?>
					 <div class="col-md-8 market-update-left">
					 	
					 <h4><a href="manage-state.php" style="color: white">Total State</a></h4>
					<h3><?php echo $statecounts;?></h3>
					
				  </div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-globe" ></i>
					</div>
					<?php $query2=mysqli_query($con,"Select * from  tblcity");
$citycounts=mysqli_num_rows($query2);
?>
					<div class="col-md-8 market-update-left">
					<h4><a href="manage-city.php" style="color: white">Total City</a></h4>
						<h3><?php echo $citycounts;?></h3>
						
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-3">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-user"></i>
					</div>
					<?php $query3=mysqli_query($con,"Select * from  tbldonor");
$donorcounts=mysqli_num_rows($query3);
?>
					<div class="col-md-8 market-update-left">
					<h4><a href="manage-donor-details.php" style="color: white">Total Food Donor</a></h4>
						<h3><?php echo $donorcounts;?></h3>
						
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>
			<div class="market-updates">
			<div class="col-md-3 market-update-gd">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="icon-food"> </i>
					</div>
					<?php 
					$query=mysqli_query($con,"Select tblfood.DonorID,tbldonor.ID from  tblfood join tbldonor on  tbldonor.ID=tblfood.DonorID");
$totallistedfood=mysqli_num_rows($query);
?>
					<div class="col-md-8 market-update-left">
					<h4><a href="all-listed-food.php" style="color: white">Total Listed Food</a></h4>
						<h3><?php echo $totallistedfood;?></h3>
						
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>

		   <div class="clearfix"> </div>
		</div>


	<?php 
					$query=mysqli_query($con,"select tblfoodrequests.id from tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId");
$allrequests=mysqli_num_rows($query);
?>
			<div class="col-md-4 market-update-gd" style="margin-top:1%;">
				<div class="market-update-block clr-block-4">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-file fa-3x" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<a href="all-requests.php"><h4>All Requests </h4></a>
						<h3><?php echo $allrequests;?></h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>	

			<?php 
					$query=mysqli_query($con,"select tblfoodrequests.id from tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where   (tblfoodrequests.status is null || tblfoodrequests.status='')");
$newrequest=mysqli_num_rows($query);
?>
			<div class="col-md-4 market-update-gd" style="margin-top:1%;">
				<div class="market-update-block clr-block-5">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-file fa-3x" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<a href="new-requests.php"><h4>New Requests </h4></a>
						<h3><?php echo $newrequest;?></h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>	

			<?php 
					$query=mysqli_query($con,"select tblfoodrequests.id from tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where  (tblfoodrequests.status='Request Rejected')");
$rejected=mysqli_num_rows($query);
?>
			<div class="col-md-4 market-update-left" style="margin-top:1%;">
				<div class="market-update-block clr-block-2">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-file fa-3x" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<a href="rejected-requests.php"><h4>Rejected Requests </h4></a>
						<h3><?php echo $rejected;?></h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>	


			<?php 
					$query=mysqli_query($con,"select tblfoodrequests.id from tblfoodrequests
 join tblfood  on tblfood.ID=tblfoodrequests.foodId 
 where (tblfoodrequests.status='Food Take Away/ Request Completed')");
$completed=mysqli_num_rows($query);
?>
			<div class="col-md-4 market-update-gd" style="margin-top:1%;">
				<div class="market-update-block clr-block-1">
					<div class="col-md-4 market-update-right">
						<i class="fa fa-file fa-3x" ></i>
					</div>
					<div class="col-md-8 market-update-left">
					<a href="completed-requests.php"><h4>Food Take Away/ Request Completed </h4></a>
						<h3><?php echo $completed;?></h3>
					</div>
				  <div class="clearfix"> </div>
				</div>
			</div>


		<div class="market-updates">
           
		<div class="row">
			<div class="panel-body">
				<div class="col-md-12 w3ls-graph">
					<!--agileinfo-grap-->
						
	<!--//agileinfo-grap-->

				</div>
			</div>
		</div>
		<div class="agil-info-calendar">
		<!-- calendar -->
		<div class="col-md-6 agile-calendar">
			
		</div>
		<!-- //calendar -->
		<div class="col-md-6 w3agile-notifications">
			
			</div>
			<div class="clearfix"> </div>
		</div>
			<!-- tasks -->
			<div class="agile-last-grids">
				<div class="col-md-4 agile-last-left">
					
				</div>
				<div class="col-md-4 agile-last-left agile-last-middle">
					
				</div>
				<div class="col-md-4 agile-last-left agile-last-right">
					
				</div>
				<div class="clearfix"> </div>
			</div>
		<!-- //tasks -->
		<div class="agileits-w3layouts-stats">
					<div class="col-md-4 stats-info widget">
						
					</div>
					<div class="col-md-8 stats-info stats-last widget-shadow">
						
					</div>
					<div class="clearfix"> </div>
				</div>
</section>
 <!-- footer -->
	<?php include_once('includes/footer.php');?>	  
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
<!-- calendar -->
	<script type="text/javascript" src="js/monthly.js"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
</body>
</html>
