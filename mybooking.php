<?php
// session_start();
include('connect.php');


?><!DOCTYPE HTML>
<html lang="en">
<head>

<title>Car Rental Portal - My Booking</title>

<style>
    .header{
  
  background-image: url('imgs/bg4.jpeg');
background-size: cover;
background-position: center;
height:40vh;




width: 100%;
}
.my_vehicles_list ul.vehicle_listing li {
	list-style:none;
	border-bottom:#e6e6e6 solid 1px;
	padding:14px 0 22px;
	overflow:hidden;
	position:relative;
}
table,tr,td,th{
  border:1px solid grey;
}
th,tr,td{
font-size:20px;
padding:20px
}
</style> 
</head>
<body>


        
<!--Header-->
<?php include('header.php');?>
<!--Page Header-->
<!-- /Header --> 

<!--Page Header-->
<div class=" py-5 text-center header text-white" >
      <h1 class="display-3" style="font-weight:700">My booking</h1>
      <p><a  href="home.php" class="text-white">HOME</a>< MY BOOKING</p>
    </div>
  </div>

<!-- /Page Header--> 
<?php 
//  $email=$_SESSION['email'];
 
// $sql = "SELECT * from customer where cemail='$email'";
// $res=  mysqli_query($con,$sql);
       
// if(mysqli_num_rows($res)>0){
//   while($row = $res->fetch_assoc()) {
?>

<section class="user_profile inner_pages">

  <div class="container w-75">
  <!-- <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> <img src="imgs/dealer-logo.jpg" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php// echo $row['cname'];?></h5>
        <p><?php //echo $row['caddress'];?><br>
          <?php //echo $row['ccity'];}}?></p>
      </div>
    </div> -->
    <div class="row">
      <div class="col">
      
   
      <div class="">
        <div class="profile_wrap">
          <h5 class="text-center display-4">My Bookings </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">

<?php 
$email=$_SESSION['email'];
  $sql = "SELECT book_id,booking.car_id as cid ,car_brand,car_img1,car_name,booking_number,pickup_date,drop_date,pickup_location,dropoff_location,car_rent_price,booking.status as st,postingDate,DATEDIFF(drop_date,pickup_date) as totalnodays,lastUpdateDate FROM booking,car WHERE booking.car_id= car.car_id and useremail='$email' order by book_id desc";
  $res=  mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
  while($row = $res->fetch_assoc()) {  ?>

<li class="my-5 p-2">
    <h4 style="color:red">Booking No #<?php echo $row['booking_number'];?></h4>
    <div class="d-flex justify-content-between  ">
               
    <div class="d-flex "> <a href="car_detail.php?car_id=<?php echo $row['cid'];?>"><img style="width:150px;height:150px" src="admin/imgs/vechileimage/<?php echo $row['car_img1']?>" alt="image"></a> 
    <div class="ml-3">

<h4><a href="car_detail.php?car_id=<?php echo $row['cid'];?>">   <?php echo $row['car_name'];?></a></h4>
<p><b>From </b> <?php echo $row['pickup_date'];?> <b>To </b> <?php echo $row['drop_date'];?></p>

<p><b>pickup </b> <?php echo $row['pickup_location'];?> <b>dropoff </b> <?php echo $row['dropoff_location'];?></p>

</div>
  </div>
                
               
                <?php 
                if($row['st']==0)
                {
                ?>
                <div class=""> <a href="#" class="btn btn-outline-warning btn-sm">Not Confirm yet</a>
            <div class="clearfix"></div>
        </div>
                <?php
                } else if ($row['st']==1) {
               ?>
               <div class=""> <a href="#" class="btn btn-outline-success btn-sm active-btn">Confirmed</a>
                           <div class="clearfix"></div>
        </div>
               <?php
                }
                 else{
                  ?>
                  <div class=""> <a href="#" class="btn btn-outline-danger btn-sm">Cancelled </a>
            <div class="clearfix"></div>
        </div>
             
                  <?php
                 }
                ?>
               </div>
       
              </li>

<h5 style="color:blue">Invoice</h5>
<table>
  <tr>
    <th>Car Name</th>
    <th>From Date</th>
    <th>To Date</th>
    <th>Total Days</th>
    <th>Rent / Day</th>
  </tr>
  <tr>
    <td><?php echo $row['car_name'];?>, <?php echo $row['car_brand'];?></td>
     <td><?php  echo $row['pickup_date'];?></td>
      <td> <?php echo $row['drop_date'];?></td>
       <td><?php echo $row['totalnodays'];?></td>
        <td> <?php echo $row['car_rent_price'];?></td>
  </tr>
  <tr>
    <th colspan="4" style="text-align:center;"> Grand Total</th>
    <th><?php echo $row['totalnodays']*$row['car_rent_price'];?></th>
  </tr>
</table>
<hr />
              <?php }}  else { ?>
                <div class="container border">
                <h5 class="text-center text-danger py-3">No booking yet</h5></div>
              <?php } ?>
             
         
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--/my-vehicles--> 
<?php include('footer.php');?>

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