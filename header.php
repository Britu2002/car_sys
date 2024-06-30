<?php
session_start();
include ('connect.php'); ?>
<!-- top nav -->
<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    /* Custom CSS styles */
    .jumbotron {
      background-image: url('car-rental-bg.jpg');
      background-size: cover;
      color: white;
    }

    .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    .card {
      transition: transform 0.2s;
    }


    .nav-div {
      display: flex;
      justify-content: space-between;
      width: 100%;
      align-items: center;
    }

    .list {
      margin-left: 30px;
      display: flex;
      gap: 20px;
      align-items: center;
    }
    .logo{

      font-size: 28px;
     font-family: "Abril Fatface", serif;
     font-weight: 400;
     font-style: normal;
}

.navbar-nav{
  font-size: 22px;
  font-weight: 600;
  gap: 20px;
  padding: 10px;

}    

.search-input{
  width: 350px !important;
  
  
}

  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary bg-info text-white">
    <div class="container-fluid ">
      <a class="navbar-brand text-white logo " href="#">Car Rental System</a>
      <?php if (isset($_SESSION['user_name'])) {
         $email = $_SESSION['user_name'];
         echo "<span>welcome to " . $email;
         
        } else {
          echo " <a class='btn btn-light' href='login.html'>Register/Login</a>";

        }

        ?>
      <?php 
      // if (isset($_SESSION['user_name'])) {
      //   $email = $_SESSION['user_name'];
      //   echo "<span>welcome to " . $email;
      // }
      ?>
    </div>
  </nav>


  <!-- nav -->
  <nav class="navbar navbar-expand-lg navbar-light ">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about_us.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="car.php">Cars</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="feedback.php">Feedback</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>
      </ul>
   
        <?php  if (isset($_SESSION['user_name'])) {?>
      <div class="dropdown mr-2">
  <button class=" dropdown-toggle border bg-light rounded p-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <i class="fa-solid fa-user"></i>  <?php echo $_SESSION['user_name'];?>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="myprofile.php">Profile Setting</a>
    <a class="dropdown-item" href="mybooking.php">My booking</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  </div>
</div>
<?php }?>
<form class="form-inline my-2 my-lg-0 "  action="search.php" >
  <span class="border rounded" >
  <input class="form-control mr-2 search-input border-0 shadow-none " name="search" type="search" placeholder="Search" aria-label="Search" required>
   <i class="fa fa-search mr-2" type="submit"></i>
  </span>
     
      </form>
    </div>
  </nav>

  <body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/0553cd5159.js" crossorigin="anonymous"></script>
<script>
 
</script>
</html>