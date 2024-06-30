<?php 
 include('connect.php');
 error_reporting(0);
if(isset($_POST['submit'])){
     $file_name1 =$_FILES['img1']['name'];
  
 $file_name2 =$_FILES['img2']['name'];

 $file_name3=$_FILES['img3']['name'];

 $car_name=$_POST['car_name'];
 $car_brand=$_POST['brand'];
 $car_desp =$_POST['car_desp'];
 $car_fuel=$_POST['car_fuel'];
 $car_model =$_POST['car_model'];
 $car_seat_capacity=$_POST['car_seat_capacity'];
 $car_price =$_POST['car_price'];
 $file_tmp1 =$_FILES['img1']['tmp_name'];
 move_uploaded_file($file_tmp1,"imgs/vechileimage/".$file_name1);
 $file_tmp2 =$_FILES['img2']['tmp_name'];
 move_uploaded_file($file_tmp2,"imgs/vechileimage/".$file_name2);
 $file_tmp3 =$_FILES['img3']['tmp_name'];
 move_uploaded_file($file_tmp3,"imgs/vechileimage/".$file_name3);
 $sql ="INSERT INTO `car`( `car_img1`, `car_img2`, `car_img3`, `car_name`, `car_brand`, `car_desp`, `car_fuel`, `car_model`, `car_seat_capacity`, `car_rent_price`) VALUES ('$file_name1','$file_name2','$file_name3','$car_name','$car_brand','$car_desp','$car_fuel',$car_model,$car_seat_capacity,$car_price)";
echo $sql;
 $res=mysqli_query($con,$sql);
 if($res)
 {
 $msg="car posted successfully";
 }
 else 
 {
 $error="Something went wrong. Please try again";
 }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     
    <!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
    
    <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>
<body>
<?php include('includes/header.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">
            <div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Post A Car</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<div class="panel-body">

    <form  method="post" class="form-horizontal"enctype="multipart/form-data" >
    <div class="form-group">  
        <label for="" class="col-sm-2 control-label">Car name<span style="color:red">*</span></label>
        <div class="col-sm-4">
        <input type="text" required name="car_name" class="form-control">
        </div>

<label for="" class="col-sm-2 control-label" >Brand <span style="color:red">*</span></label>
<div class="col-sm-4">    
<input type="text" required  name="brand" class="form-control">
</div>
</div>


 <div class="hr-dashed"></div>
<div class="form-group">
<label for="" class="col-sm-2 control-label">Car description<span style="color:red">*</span></label>
<div class="col-sm-10">
<textarea class="form-control" name="car_desp"  rows="3" required></textarea>
</div>
</div>

<!-- <label for="">car price per day</label>
        <input type="text" required name="car_price"><br> -->

<div class="form-group">
<label for="" class="col-sm-2 control-label">Price Per Day(in Rupees)<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="car_price" class="form-control" required>
</div>
 <label for="" class="col-sm-2 control-label">Select fuel type<span style="color:red">*</span></label>
 <div class="col-sm-4">
    
<select class="selectpicker" name="car_fuel" required>            
<option value="" >--- Select--- </option>
<option value="petrol" >petrol</option>
<option value="Disal"> Diesel</option>
<option value="CNG">CNG</option>
</select>

</div>
</div>


<div class="form-group">
<label for="" class="col-sm-2 control-label">Car model<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" required name="car_model"  class="form-control">
</div>
<label for=""  class="col-sm-2 control-label">Seating capactiy<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="number" required name="car_seat_capacity"  class="form-control">
</div>
</div>


<div class="hr-dashed"></div>

<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Images</b></h4>
</div>
</div>

<div class="form-group">
<div class="col-sm-4">
Image 1 <span style="color:red">*</span>
<input type="file" name="img1" id="img1" required>
</div>
<div class="col-sm-4">
Image 2<span style="color:red">*</span><input type="file" name="img2" id="img2" required>
</div>
<div class="col-sm-4">
Image 3<span style="color:red">*</span><input type="file" name="img3" id="img3" required>
</div>
</div>

                </div>
                </div>
               

<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>


</form>

</div>
   </div>
	</div>
						
					

	</div>
	</div>
				
			

	</div>
    </div>
	</div>
</div>
<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
</body>
</html>