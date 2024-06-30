<?php
error_reporting(0);
include('header.php');
include('connect.php');
?>

<?php

if(isset($_GET['submit_feedback'])){
    if(isset($_SESSION['email'])==NULL){
        echo "<script>alert('there is no email')</script>"; 
    }else{
        $email =$_SESSION['email'];
        $rating = mysqli_real_escape_string($con, $_GET["rating"]);
        $comment = mysqli_real_escape_string($con, $_GET["comment"]);
    
        // Inserting data into database
        $sql = "INSERT INTO feedback (cemail,rating, comment) VALUES ('$email','$rating', '$comment')";
       
        if (mysqli_query($con, $sql)) {
            echo"<script>
            Swal.fire({
              title: 'feedback succesfully',
              text: 'feedback successfull!',
              icon: 'success'
            }).then(function(){
              window. location.href='feedback.php';
            })
          </script>;";
           
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        } 
    }
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
         
        }
        .nav1 {
            
            width: 90%;
            margin: 50px auto;
            background: rgba(14, 14, 14, 0.8);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.8);
            color: #fff;
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .rating {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .rating input {
            display: none;
        }
        .rating label {
            display: inline-block;
            cursor: pointer;
            font-size: 40px;
            color: #f8ecec;
            margin: 0 5px;
        }
        .rating input:checked ~ label {
            color: #ffcc00;
        }
        .comment {
            width: 100%;
            height: 100px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: none;
        }
        .submit-btn {
            padding: 10px 20px;
            background-color: #e0000b;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto 0;
            transition: background-color 0.3s;
        }
        .submit-btn:hover {
            background-color: #004084;
        }
    </style>
</head>
<body>
    <div class="">
<div class=" nav1" style="background-image: url('admin/imgs/vechileimage/swift.jpg');
            background-attachment: fixed;
            background-size: cover;">
    <h2>Feedback Form</h2>
    <form  method="Get">
    <div class="rating">
    <input type="radio" name="rating" value="5" id="rating5">
    <label for="rating5">★</label>
    <input type="radio" name="rating" value="4" id="rating4">
    <label for="rating4">★</label>
    <input type="radio" name="rating" value="3" id="rating3">
    <label for="rating3">★</label>
    <input type="radio" name="rating" value="2" id="rating2">
    <label for="rating2">★</label>
    <input type="radio" name="rating" value="1" id="rating1">
    <label for="rating1">★</label>
</div>

        <textarea class="comment" name="comment" placeholder="Enter your feedback here" required></textarea><br>
        <!-- <button type="submit" class="submit-btn" name="submit_feedback">Submit Feedback</button> -->
        <?php if(isset($_SESSION['email'])==NULL)
{
?>
      <button type="button" class="submit-btn" onclick="login()">Submit Feedback</button>
<?php
}else{
?>
 <button type="submit" class="submit-btn" name="submit_feedback">Submit Feedback</button>
   
<?php
}
?>
    </form>
</div>
</div>
<?php

include('footer.php');?>


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
</script>
</html>