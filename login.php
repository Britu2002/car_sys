<?php 
session_start();

include('connect.php');
if($con){
 if(isset($_POST['cemail'])&& $_POST['cpass']){
    $email=  $_POST['cemail'];
    $pass =  $_POST['cpass'];
    $query ="Select cemail,cpassword,cname from customer where cemail='$email' and cpassword='$pass'";
    $res=mysqli_query($con,$query);
  if(mysqli_num_rows($res)>0){
   $row = $res->fetch_assoc();
  echo 'true';
  $_SESSION['email']=$email;
  $_SESSION['user_name']=$row['cname'];

  }else{
 echo 'false';
  
  }
 }
 

 if(isset($_POST['ac_email'])){
    $email =$_POST['ac_email'];
    $query ="Select cemail from customer where cemail='$email'";
    $res=mysqli_query($con,$query);
    if(mysqli_num_rows($res)>0){
echo"true";
}else{
    echo"false";
}
}


if(isset($_POST['c_email'])){
    $name=  $_POST['cname'];
    $email=  $_POST['c_email'];
    $phone =$_POST['cphone'];
    $address =$_POST['caddress'];
    $city =$_POST['ccity'];
        $pass =  $_POST['c_pass'];
 
   $ins = "insert into customer(cname,cemail,cphone,caddress, ccity, cpassword) VALUES ('$name','$email','$phone','$address','$city','$pass')";
    
   $sql= mysqli_query($con,$ins);
        if($sql){
            echo"inserted";
        }else{
            echo"error   ";
        }
}

   
}else{
    echo"error";
}
?>

