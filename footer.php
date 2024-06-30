<?php 
if(isset($_POST['sendmessage'])){
  $name=$_POST['gname'];
  $gmail=$_POST['gemail'];
  $message=$_POST['gmessage'];
  include('connect.php');
  $contact_query ="INSERT INTO `contact_us`(`gmail`, `gname`, `message`) VALUES ('$gmail','$name','$message')";
  
   mysqli_query($con,$contact_query);
  echo "<script>alert('send');

  </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         /* Custom CSS for Contact Us Footer */
    footer.footer {
      background-color: #333;
      color: #fff;
      padding: 40px 0;
    }
    .footer .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      
    }
    .footer .contact-info {
      text-align: center;
    }
    .footer .contact-info h3 {
      margin-bottom: 20px;
    }
    .footer .contact-info p {
      font-size: 16px;
      margin-bottom: 0;
    }
    .footer .contact-form {
      max-width: 400px;
    }
    .footer .form-group {
      margin-bottom: 20px;
    }
    .footer .form-group input,
    .footer .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #fff;
      border-radius: 5px;
      background-color: rgba(255, 255, 255, 0.1);
      color: #fff;
      transition: background-color 0.3s;
    }
    .footer .form-group input:focus,
    .footer .form-group textarea:focus {
      background-color: rgba(255, 255, 255, 0.3);
    }
    .footer .form-group textarea {
      resize: none;
      height: 150px;
    }
    .footer .btn {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #fff;
      color: #333;
      cursor: pointer;
      transition: background-color 0.3s, color 0.3s;
    }
    .footer .btn:hover {
      background-color: #555;
      color: #fff;
    }

    .nav-div
    {
      display: flex;
      justify-content: space-between;
      width: 100%;
      align-items: center;
    }
    .list{
      margin-left: 30px;
      display: flex;
      gap: 20px;
      align-items: center;
    }

    
    </style>
</head>
<body>

<footer class="footer" id="contact">

    <div class="container">
   
      <div class="contact-info">
      
        <h3>Contact Us</h3>
        
        <p>Feel free to get in touch with us for any questions or inquiries.</p>
        <p>Email: info@example.com</p>
        <p>Phone: +989 456 277</p>
       <a href="admin/admin-login.php" class="text-white">admin_login</a>
      </div>

     
      
      <div class="contact-form">
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Your Name" required name="gname">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Your Email" required name="gemail">
          </div>
          <div class="form-group">
            <textarea class="form-control" placeholder="Your Message" required name="gmessage" ></textarea>
          </div>
          <button type="submit" class="btn btn-primary" name="sendmessage">Send Message</button>
        </form>
      </div>
    </div>
    
  </footer>
  <script>
document.addEventListener("DOMContentLoaded", function() {
  // Smooth scrolling to footer when clicking on Contact link
  document.querySelector('a[href="#contact"]').addEventListener('click', function(e) {
    e.preventDefault();
    document.querySelector('#contact').scrollIntoView({ behavior: 'smooth' });
  });
});
</script>
</body>
</html>