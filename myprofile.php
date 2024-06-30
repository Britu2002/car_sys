<?php

 error_reporting(0);
include('connect.php');



?>
  <!DOCTYPE HTML>
<html lang="en">
<head>

<title>Car Rental Portal | My Profile</title>

<link href="assets/css/font-awesome.min.css" rel="stylesheet">


 <style>
 

    </style>
</head>
<body>


        
<!--Header-->
<?php include('header.php');?>


<?php
if(isset($_POST['updateprofile']))
{
$name=$_POST['fullname'];
$mobileno=$_POST['mobilenumber'];
$password=$_POST['password'];
$adress=$_POST['address'];
$city=$_POST['city'];
$eemail=$_SESSION['email'];
$sql="UPDATE customer SET cname='$name',cphone='$mobileno',caddress='$adress',ccity='$city',cpassword='$password' WHERE cemail='$eemail'";
 mysqli_query($con,$sql);
// echo $sql;

echo"<script> 
alert('Profile Updated Successfully');
window. location.href='myprofile.php'</script>;";
}
?>
<!-- /Header --> 
<!--Page Header-->
<section class="page-header profile_page py-5" style="background-image: linear-gradient(rgb(0,0,0,0.8), rgb(0,0,0,0.8)), url('imgs/profile.jpg');">
  <div class="container">
    <div class=" text-center text-white">
      <div class=" ">
        <h1>Your Profile</h1>
      </div>
      <p><a  href="home.php" class="text-white">HOME</a>< MY profile</p>
    </div>
  </div>
 
</section>
<!-- /Page Header--> 


<?php 
 $email=$_SESSION['email'];
 
 $sql = "SELECT * from customer where cemail='$email'";
 $res=  mysqli_query($con,$sql);
        
 if(mysqli_num_rows($res)>0){
   while($row = $res->fetch_assoc()) {
 ?>
<section class="user_profile inner_pages">
  <div class="container">
    <div class="row bg-warming d-flex justify-content-center">
      <div class="col-md-6 col-sm-8 bg-light my-3">
        <div class="">
         <b> <h5 class="p-2">General Settings</h5></b><hr>
        
          <form  method="post">
          
           
            <div class="form-group">
              <label class="control-label">Full Name</label>
              <input class="form-control white_bg" name="fullname" value="<?php echo $row['cname'];?>" id="fullname" type="text"  required>
            </div>
            <div class="form-group">
              <label class="control-label">Email Address</label>
              <input class="form-control white_bg" value="<?php echo $row['cemail'];?>" name="emailid" id="email" type="email" required readonly>
            </div>
            <div class="form-group">
              <label class="control-label">Phone Number</label>
              <input class="form-control white_bg" name="mobilenumber" value="<?php echo $row['cphone'];?>" id="phone-number" type="text" required>
            </div>
            
            <div class="form-group">
              <label class="control-label">Your Address</label>
              <textarea class="form-control white_bg" name="address" rows="4" ><?php echo $row['caddress'];?></textarea>
            </div>
            
            <div class="form-group">
              <label class="control-label">City</label>
              <input class="form-control white_bg" id="city" name="city" value="<?php echo $row['ccity'];?>" type="text">
            </div>
            <div class="form-group">
              <label class="control-label">Password</label>
              <input class="form-control white_bg" id="password" name="password" value="<?php echo $row['cpassword'];?>" type="text">
            </div>
            <?php }} ?>
           
            <div class="form-group">
              <button type="submit" name="updateprofile" class="btn btn-success btn-lg">Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/Profile-setting--> 

<<!--Footer -->
<?php include('footer.php');?>
<!-- /Footer--> 




<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
