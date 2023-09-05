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
<title>PG Accomodation System  | PG Form </title>
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
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>



</head>
<body>
<section id="container">
<!--header start-->
<?php include_once('includes/header.php');?>
<!--header end-->
<!--sidebar start-->
<?php include_once('includes/sidebar.php');?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
    
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               View Owner PG
            </header>
            <div class="panel-body">
                <p style="font-size:16px; color:red" align="left"> <?php if($msg){
    echo $msg;
  }  ?> </p>

     <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblpg join tblowner on tblowner.ID = tblpg.OwnerID where tblpg.ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <table border="1" class="table table-bordered mg-b-0">
                    <tr>
    <th>PG Owner</th>
    <td><?php  echo $row['FullName'];?></td>
  </tr>
                    
                    <tr>
    <th>PG Owner Email</th>
    <td><?php  echo $row['Email'];?></td>
  </tr>   
                 <tr>
    <th>PG Owner Mobile Number</th>
    <td><?php  echo $row['MobileNumber'];?></td>
  </tr>             
         
                    <tr>
    <th>PG Name</th>
    <td><?php  echo $row['PGTitle'];?></td>
  </tr> 
               <tr>
    <th>State</th>
    <td><?php  echo $row['StateName'];?></td>
  </tr>   
   <tr>
    <th>City</th>
    <td><?php  echo $row['CityName'];?></td>
  </tr>
  <tr>
    <th>Rent Per Month</th>
    <td><?php  echo $row['RPmonth'];?></td>
  </tr>  
   <tr>
    <th>Number of Rooms</th>
    <td><?php  echo $row['norooms'];?></td>
  </tr>                 
<tr>
    <th>Address</th>
    <td><?php  echo $row['Address'];?></td>
  </tr>
  <tr>
    <th>Room Images</th>
    <td><img src="../owner/roomimages/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>"></td>
  </tr>
  
    <table border="1" class="table table-bordered mg-b-0">     
<label class="col-sm-3 control-label col-lg-3" for="inputSuccess" style="color: red">Facilities</label>
      <tr>
    <th>Electricity</th>
    <td><?php  echo $row['Electricity'];?></td>
  </tr> 
  <tr>
    <th>Parking</th>
    <td><?php  echo $row['Parking'];?></td>
  </tr> 
  <tr>
    <th>Refregerator</th>
    <td><?php  echo $row['Refregerator'];?></td>
  </tr> 
  <tr>
    <th>Full Furnished</th>
    <td><?php  echo $row['furnished'];?></td>
  </tr> 
  <tr>
    <th>AC</th>
    <td><?php  echo $row['AC'];?></td>
  </tr> 
  <tr>
    <th>Balcony</th>
    <td><?php  echo $row['Balcony'];?></td>
  </tr> 
  <tr>
    <th>Table/Study Lamp</th>
    <td><?php  echo $row['StudyTable'];?></td>
  </tr> 
  <tr>
    <th>Laundry</th>
    <td><?php  echo $row['Laundry'];?></td>
  </tr>
  <tr>
    <th>Security</th>
    <td><?php  echo $row['Security'];?></td>
  </tr>
  </table>
  <table border="1" class="table table-bordered mg-b-0">
    <label class="col-sm-3 control-label col-lg-3" for="inputSuccess" style="color: red">Meals which offer by PG</label>
  <tr>
    <th>Breakfast</th>
    <td><?php  echo $row['MealsBreakfast'];?></td>
  </tr> 
  <tr>
    <th>Lunch</th>
    <td><?php  echo $row['MealLunch'];?></td>
  </tr>
  <tr>
    <th>Dinner</th>
    <td><?php  echo $row['MealDinner'];?></td>
  </tr>        
                   
   </table>                 
                  

</table>
            </div>
            <?php } ?>
        </section>



        <!-- page end-->
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
</body>
</html>

