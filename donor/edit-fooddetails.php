<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
    $eid=$_GET['editid'];
    $donorid=$_SESSION['pgasoid'];
    $statename=$_POST['state'];
    $cityname=$_POST['city'];
    $description=$_POST['description'];
    $pdate=$_POST['pdate'];
    $padd=$_POST['address'];
    $contactperson=$_POST['contactperson'];
    $cpmobnum=$_POST['cpmobnum'];
     $fitem=$_POST["fitem"]; 
$fitemarray=implode(",",$fitem);
    $query=mysqli_query($con, "update tblfood set FoodItems='$fitemarray',StateName='$statename', CityName='$cityname', Description='$description', PickupDate='$pdate', PickupAddress='$padd',ContactPerson='$contactperson',CPMobNumber='$cpmobnum' where ID='$eid'");
    if ($query) {
  
     echo "<script>alert('Donating food detail has been updated successfully');</script>";
  }
  else
    {
      echo "<script>alert('Something went wrong. Please try again.');</script>";
    }

  }
}
  ?>
<!DOCTYPE html>
<head>
<title>Food Waste Management System  | Food Updation </title>

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
<script>
function getCity(val) { 
  $.ajax({
type:"POST",
url:"get-city.php",
data:'sateid='+val,
success:function(data){
$("#city").html(data);
}});
}
 </script>

<script>
$(document).ready(function(){
var i=1;
$('#add').click(function(){
i++;
$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="fitem[]" placeholder="Enter Food Items" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
});
    
$(document).on('click', '.btn_remove', function(){
var button_id = $(this).attr("id"); 
$('#row'+button_id+'').remove();
});
});
</script>
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
                Update Food Details
            </header>

            <div class="panel-body">
<?php if($msg){ ?>
<div class="alert alert-info" role="alert">
                    <strong>Message !</strong>  
    <?php echo $msg;}  ?>
                </div>

 

     <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblfood where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <form class="form-horizontal bucket-form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Food Item</label>
                        <div class="col-sm-6">
                            <table class="table table-bordered" id="dynamic_field">
<tr>
<td><input type="text" name="fitem[]" value="<?php  echo $row['FoodItems'];?>" class="form-control name_list" /></td>
<td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
</tr>
</table>
                        </div>
                    </div>
                    
                  
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="description" name="description" type="text" required="true" value=""><?php echo $row['Description'];?>
</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Pickup Date</label>
                        <div class="col-sm-6"><?php echo $row['PickupDate'];?>
                            <input class="form-control" id="pdate" name="pdate" type="date" required="true" value=">">
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Choose State</label>
                        <div class="col-lg-6">
                           
                 <select class="form-control m-bot15" name="state" id="state" onChange="getCity(this.value);">
                                <option value="<?php echo $row['StateName'];?>"><?php echo $row['StateName'];?></option>
                                <?php $query1=mysqli_query($con,"select * from tblstate");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['StateName'];?>"><?php echo $row1['StateName'];?></option>
                  <?php } ?> 
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label col-lg-3" for="inputSuccess">Choose City</label>
                        <div class="col-lg-6">
                          <select class="form-control m-bot15" name="city" id="city" required="true">
                 <option value="<?php echo $row['CityName'];?>"><?php echo $row['CityName'];?></option>
                            </select>  


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Pickup Address</label>
                        <div class="col-sm-6">
                            <textarea type="text" class="form-control" name="address" id="address" required="true"><?php echo $row['PickupAddress'];?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" col-sm-3 control-label">Pictures</label>
                        <div class="col-lg-6">
                             <img src="images/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>"><a href="changeimage.php?editid=<?php echo $row['ID'];?>">Edit Image</a>
                        </div>
                    </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Contact Person</label>
                        <div class="col-sm-6">
                            <input class="form-control" id="contactperson" name="contactperson" type="text" required="true" value="<?php echo $row['ContactPerson'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Person Mobile Number</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="cpmobnum" id="cpmobnum" required="true" value="<?php echo $row['CPMobNumber'];?>" maxlength="10" pattern="[0-9]+">
                        </div>
                    </div>

                    <hr />
<div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit" name="submit">Update</button>
                                    </div>
                                </div>

                </form>
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

