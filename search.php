
<?php 
include('connect.php');?>

<!DOCTYPE HTML>
<html lang="en">
<head>

<title>Car Rental Portal | Search </title>
<!--Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
  integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
   

</head>
<body>

 

<!--Header--> 
<?php include('header.php');?>
<!-- /Header --> 

<!--Page Header-->

<section class="page-header profile_page py-5" style="background-image: linear-gradient(rgb(0,0,0,0.8), rgb(0,0,0,0.8)), url('imgs/search.jpg');">
  <div class="container">
    <div class=" text-center text-white">
      <div class=" ">
        <h1>Search result of keyword "<?php echo $_GET['search'];?>" </h1>
      </div>
      <p><a  href="home.php" class="text-white">HOME</a>< car listing</p>
    </div>
  </div>
 
</section>


<!-- /Page Header--> 

<!--Listing-->


<div class="container py-2 w-75">
        

<?php 
$search_inp=$_GET['search'];

$sql = "SELECT * FROM car WHERE concat(car_name,car_brand,car_fuel,car_model) LIKE '%$search_inp%'; " ;
$res=  mysqli_query($con,$sql);
        
if(mysqli_num_rows($res)>0){
  while($row = $res->fetch_assoc()) {


   ?>
        <div class="product-listing-m gray-bg d-flex bg-light border m-3">
          <div class="product-listing-img"><img src="admin/imgs/vechileimage/<?php echo $row['car_img1'];?>" class="img-responsive" alt="Image" style="width:300px;height:200px">  
          </div>
          <div class="product-listing-content py-2">
            <h5 class="ml-4"><a href="vehical-details.php?vhid=1 text-dark "><?php echo $row['car_brand']." ". $row['car_name']?></a></h5>
            <p class="list-price text-secondary ml-4 "><i class="fa-solid fa-indian-rupee-sign"></i> <?php echo $row['car_rent_price']?> Per Day</p>
            <ul class="nav text-secondary mb-4">
              <li class="nav-item px-4"><i class="fa fa-user" aria-hidden="true"></i><?php echo $row['car_seat_capacity'] ?> seats</li>
              <li class="nav-item px-4"><i class="fa fa-calendar" aria-hidden="true"></i><?php echo $row['car_model'] ?>model</li>
              <li class="nav-item px-4"><i class="fa fa-car" aria-hidden="true"></i><?php echo $row['car_fuel']?> </li>
            </ul>
            <a href="car_detail.php?car_id=<?php echo $row['car_id'];?>" class="btn btn-lg btn-success ml-5">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
          </div>
        </div>
        <?php }}else{
          ?>
          <div class="container">
            <h1>No lisitng found</h1>
          </div>
          <?php
        } ?>
         </div>
      
      
      

        
              
    </div>

<!-- /Listing--> 

<!--Footer -->
<?php include('footer.php');?>
<!-- /Footer--> 





<!-- Scripts --> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
   function myfun(){
	   var ch=$('#checkSession').html();
     if(ch==""){
		   Swal.fire({
			   icon: 'warning',
			   title: 'LOGIN....',
			   showCloseButton: true,
			   showConfirmButton: false,
			   footer: '<a href="login.html">first you login</a>'
			 })
		   return false;
	   }else{
		   return true;
	   }
	   
	 
	 
	 
	   
   }
   </script>
</body>
</html>
