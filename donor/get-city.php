<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['pgasoid']==0)) {
  header('location:logout.php');
  } else{

 if(isset($_POST['sateid'])){
 $sid=$_POST['sateid'];

  $query=mysqli_query($con,"select * from tblcity join tblstate on tblstate.id=tblcity.StateID where StateName='$sid'");
    while($rw=mysqli_fetch_array($query))
    {
     ?>      
 <option value="<?php echo $rw['City'];?>"><?php echo $rw['City'];?></option>
                  

<?php }}} ?>