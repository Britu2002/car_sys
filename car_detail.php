
<?php
include('header.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<?php
include('connect.php');
$car_id=$_GET['car_id'];
$sql="select * from car where car_id=$car_id";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
    $row=$res->fetch_assoc();
    ?>
<h1 class=" mb-5" style="text-align: center;font-size: 70px;
font-family: 'Abril Fatface', serif;font-weight: 400;font-style: normal;"><?php echo$row['car_brand']."," .$row['car_name']; ?></h1>

<div class="d-flex justify-content-center"><img src="admin/imgs/vechileimage/<?php echo $row['car_img1'];?>" alt="" style="width:450px;height:300px;">
<img src="admin/imgs/vechileimage/<?php echo $row['car_img2'];?>" alt="" style="width:450px;height:300px;">
<img src="admin/imgs/vechileimage/<?php echo $row['car_img3'];?>" alt="" style="width:450px;height:300px;">
</div>

<div class="mr-5" style=" text-align:right; font-size: 40px; color: red;"><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $row['car_rent_price'];?></div>

<h3 class="mr-5" style="text-align:right;">per day</h3><br>
<!-- <button style="float: right; margin:20px;" class="btn btn-outline-danger btn-lg">Book Now</button> -->
<a href="booking.php?car_id=<?php echo $_GET['car_id'];?>" style="float: right; margin:20px;" class="btn btn-outline-danger btn-lg  ">BOOK NOW </a>

<div class="d-flex justify-content-center m-2  align-item-center">

<div style="width:120px; height:120px;" class=" p-3 text-center border border-black ">
<i class="fa-regular fa-calendar h1"></i>
<pre><?php echo $row['car_model'];?>
<p class="text-danger fs-6 ">model</p>
</pre>
</div>      

<div style="width:120px; height:120px;" class=" p-3 text-center border border-black ">
<i class="fa-solid fa-gas-pump h1"></i>
<pre><?php echo $row['car_fuel'];?>
<p class="text-danger fs-6 ">fuel type</p>
</pre>
</div>      


<div style="width:120px; height:120px;" class=" text-center border border-black p-3">
<i class="fa-solid fa-person h1"></i>
 <pre><?php echo $row['car_seat_capacity']; ?>
 <p class="text-danger fs-6 ">seats</p>
</pre>
</div>


<!-- <div style="width:120px; height:120px;" class=" text-center border border-black p-3">
<i class="fas fa-suitcase-rolling h1"></i>
<pre><?php //echo $row['luggages'];?>
<p class="text-danger fs-6 ">luggage</p>
</pre>
</div> -->


</div><br>
<div class="container  mb-5">
<h4 class="text-primary h1"><b>Description</b></h4>
    <p class=""><?php echo $row['car_desp'];?></p>
</div>



    <?php



}


?>

    <?php
include('footer.php');
?>
</body>
</html>

  
 

