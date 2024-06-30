
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Rental Booking Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
   
<!-- header -->
<?php include('header.php'); ?>
<!-- booking -->


  <div class="container border text-center my-5 ">
    <h2 class="py-1 text-info"><i class="fa-solid fa-message"></i> Car Rental Booking Form</h2>

    <form  method="post" class="my-3 " >
      
      <div class="form-group row text-center justify-content-center">
      <label for="pickup_date" class="col-sm-2 col-form-label">Pickup Date:</label>
      <div class="col-xl-4 ">
  <input class="form-control" type="date" id="pickup_date"  name="pickup_date" required oninput="return validateDate()">
      </div>
      </div>
      <div class="form-group row text-center justify-content-center">
      <label for="drop_date" class="col-sm-2 col-form-label">Drop Date:</label>
      <div class="col-xl-4">
       
        <input type="date" id="drop_date" name="drop_date"  class="form-control" required oninput="return validateDate1()">
      </div>
</div>
<div class="form-group row text-center justify-content-center">
      <label for="pickup_location"class="col-sm-2 col-form-label">Pickup Location:</label>
      <div class="col-xl-4">
        
        <input type="text" id="pickup_location" name="pickup_location" class="form-control" required>
      </div>
</div>
<div class="form-group row text-center justify-content-center">
      <label for="dropoff_location" class="col-sm-2 col-form-label">Dropoff Location:</label>
      <div class="col-xl-4">
       
        <input type="text" id="dropoff_location" name="dropoff_location"  class="form-control" required>
      </div>
</div>
<?php if(isset($_SESSION['email'])==NULL)
{
?>
      <button type="button" class="btn btn-lg btn-outline-success " onclick="login()">Login for Book </button>
<?php
}else{
?>
 <button type="submit" name="submit" class="btn btn-lg btn-outline-success">Book Now</button>
   
<?php
}
?>
     
    </form>
  </div>
  <?php include('footer.php');?>
</body>
<script>
  function login(){
    Swal.fire({
			   icon: 'warning',
			   title: 'LOGIN....',
			   showCloseButton: true,
			   showConfirmButton: false,
			   footer: '<a href="login.html">First you login</a>'
			 })
       return false;
  }

 
        function validateDate() {
          var inputDate = document.getElementById('pickup_date').value;
    var currentDate = new Date().toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format
    var selectedDate = new Date(inputDate);

    if (inputDate < currentDate) {
        alert('Please select a date that is today or later.');
        document.getElementById('pickup_date').value = ''; // Clear the input field
        return false;
    }
    return true;
        }
  
        function validateDate1() {
          var inputDate = document.getElementById('drop_date').value;
    var currentDate = new Date().toISOString().split('T')[0]; // Get current date in YYYY-MM-DD format
    var selectedDate = new Date(inputDate);

    if (inputDate < currentDate) {
        alert('Please select a date that is today or later.');
        document.getElementById('drop_date').value = ''; // Clear the input field
        return false;
    }
    return true;
        }
        $(document).ready(function () {
            $("#pickup_location").keydown(function (event) {
                var inputValue = event.which;
                if ((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123 || inputValue == 32 || inputValue == 8)) {
                    return true;
                }
                else {
                    return false;
                }
            });
            $("#dropoff_location").keydown(function (event) {
                var inputValue = event.which;
                if ((inputValue > 64 && inputValue < 91) || (inputValue > 96 && inputValue < 123 || inputValue == 32 || inputValue == 8)) {
                    return true;
                }
                else {
                    return false;
                }
            });

        });
</script>
</html>

<?php
if (isset($_POST['submit'])) {
    // Database credentials
    include('connect.php');
    // Escape user inputs to prevent SQL injection
  $booking_no =  mt_rand(100000000, 999999999);
 $useremail = $_SESSION['email'];
 $carid=$_GET['car_id'];
      $pickup_date = mysqli_real_escape_string($con, $_POST['pickup_date']);
    $drop_date = mysqli_real_escape_string($con, $_POST['drop_date']);
  
    $pickup_location = mysqli_real_escape_string($con, $_POST['pickup_location']);
    $dropoff_location = mysqli_real_escape_string($con, $_POST['dropoff_location']);
    $car_id =$_POST['car_id'];
$status =0;

    // Insert data into database

    $sql = "INSERT INTO `booking`( `booking_number`, `car_id`, `useremail`, `pickup_date`, `drop_date`, `pickup_location`, `dropoff_location`, `status`) VALUES ($booking_no,$carid,'$useremail','$pickup_date','$drop_date','$pickup_location','$dropoff_location',$status)";

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
        echo"<script>
        Swal.fire({
          title: 'booking registration succesfully',
          text: 'booking successfull!',
          icon: 'success'
        }).then(function(){
          window. location.href='mybooking.php';
        })
      </script>;";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    // Close connection
    $con->close();
}

?>
