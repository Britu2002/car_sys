<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental System</title>

  
  <!-- <link rel="stylesheet" href="styles.css">  -->
 <style>
  .images_hover:hover{
    transform: scale(1.3);
  }
 </style>
</head>
<body>

  <!-- Navbar -->
 <?php include('header.php');?>
 
  <div id="carouselExampleSlidesOnly " class="carousel slide" data-ride="carousel" data-interval="2000">
    <div class="carousel-inner  p-4">
      <div class="carousel-item active   border  " style="background-image:url('imgs/back5.jpeg');background-size:100% 90%; background-repeat: no-repeat; min-height:500px" >
 
      </div>

     
      <div class="carousel-item"style="background-image:url('imgs/back3.jpg');background-repeat: no-repeat;background-size:100% 90%; min-height:500px">
      
      </div>
      <div class="carousel-item "style="background-image:url('imgs/back8.jpeg');background-repeat: no-repeat;background-size:100% 90%;min-height:500px">
    
      </div>

    </div>
  </div>
 <!-- Car Cards -->
 <div class="container pb-4 d-flex flex-column my-5 " >
    <div class="section-header text-center">
      <h2 class="pb-3">Find the Best <span>CarForYou</span></h2>
      <p class="pb-5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
    </div>
       
    <div class="row  justify-content-center   ">

    <?php 
          $sql="select * from car  order by car_id desc limit 3";
        $res=  mysqli_query($con,$sql);
       
          if(mysqli_num_rows($res)>0){
            while($row = $res->fetch_assoc()) {
           ?>
           <div class="col-md-4 bg-light p-4 ">
           <form action="Booking.php" method="post" >
               <div class="card mb-4 bg-light  ">
        <h5 class="text-center"><?php echo $row['car_name']?></h5>  
        <div class="images_hover" 
        style="background-image:url('admin/imgs/vechileimage/<?php echo $row['car_img1'];?>');background-size:100% 100%; background-repeat: no-repeat; min-height:300px;" >
 
 </div>
 

             <div class="card-header bg-light"> 
                 <div class="card-body  bg-light">

             
           
                   <div class="d-flex justify-content-between align-items-center">
                     <div class="btn-group ">
                  
            <a href="car_detail.php?car_id=<?php echo $row['car_id'];?>" class="btn btn-sm btn-success ml-5">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
                  
                     </div>

                   </div>
                 </div>
                 </div> 
               </div>
               </form>
             </div>

           <?php
            }
          }else{
        echo"error";
          
          }
          ?>
  

           
     
     
     
        <button class="btn btn-light mt-3 icon-btn"><a style="text-decoration: none" href="car.php">View all</a></button>
    
    </div>
   
    
  </div>

     <!-- footer -->

  

  
</body>
</html>
<?php include('footer.php');?>
