<?php
include('connect.php');
error_reporting(0);


if(isset($_REQUEST['eid']))
	{
		$eid=$_GET['eid'];
		$status=2;
		
		$sql = "UPDATE booking SET status=$status WHERE  book_id=$eid";
		$res=mysqli_query($con,$sql);
  echo "<script>alert('Booking Successfully Cancelled');</script>";
  echo "<script type='text/javascript'> document.location = 'canceled-bookings.php'; </script>";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=$_GET['aeid'];
$status=1;

$sql = "UPDATE booking SET status=$status WHERE  book_id=$aeid";
$res=mysqli_query($con,$sql);
echo "<script>alert('Booking Successfully Confirmed');</script>";
echo "<script type='text/javascript'> document.location = 'confirmed-bookings.php'; </script>";
}


 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Car Rental Portal | New Bookings   </title>

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

						<h2 class="page-title">Booking Details</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Bookings Info</div>
							<div class="panel-body">


<div id="print">
								<table border="1"  class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%"  >
				
									<tbody>

									<?php 
$bid=$_GET['bid'];
$sql = "SELECT book_id,booking.car_id as cid ,car_name,cname,cemail,cphone,caddress,ccity,booking_number,pickup_date,drop_date,pickup_Location,dropoff_location,car_rent_price,status,postingDate,DATEDIFF(drop_date,pickup_date) as totalnodays,lastUpdateDate FROM booking,car,customer WHERE booking.useremail = customer.cemail and booking.car_id= car.car_id and book_id=$bid; ";
									$res=mysqli_query($con,$sql);
										$cnt=1;
									if(mysqli_num_rows($res)>0){
										$row = $res->fetch_assoc(); {				?>	
	<h3 style="text-align:center; color:red">#<?php echo $row['booking_number'];?> Booking Details </h3>

		<tr>
											<th colspan="4" style="text-align:center;color:blue">User Details</th>
										</tr>
										<tr>
											<th>Booking No.</th>
											<td>#<?php echo $row['booking_number'];?></td>
											<th>Name</th>
											<td><?php echo $row['cname'];;?></td>
										</tr>
										<tr>											
											<th>Email Id</th>
											<td><?php echo $row['cemail'];?></td>
											<th>Contact No</th>
											<td><?php echo $row['cphone']; ?></td>
										</tr>
											<tr>											
											<th>Address</th>
											<td><?php echo $row['caddress'];?></td>
											<th>City</th>
											<td><?php echo $row['ccity'];?></td>
										</tr>
								
										<tr>
											<th colspan="4" style="text-align:center;color:blue">Booking Details</th>
										</tr>
											<tr>											
											<th>Vehicle Name</th>
											<td><a href="edit-vehicle.php?id=<?php echo $row['cid'];?>"><?php echo $row['car_name'];?></td>
											<th>Booking Date</th>
											<td><?php echo $row['postingDate'];?></td>
										</tr>
										<tr>
											<th>From Date</th>
											<td><?php echo $row['pickup_date'];?></td>
											<th>To Date</th>
											<td><?php echo$row['drop_date'];?></td>
										</tr>
<tr>
	<th>Total Days</th>
	<td><?php echo $row['totalnodays'];?></td>
	<th>Rent Per Days</th>
	<td><?php echo$row['car_rent_price'];?></td>
</tr>
<tr>
	<th colspan="3" style="text-align:center">Grand Total</th>
	<td><?php echo $row['totalnodays']*$row['car_rent_price'];?></td>
</tr>
<tr>
<th>Booking Status</th>
<td><?php 
if($row['status']==0)
{
echo htmlentities('Not Confirmed yet');
} else if ($row['status']==1) {
echo htmlentities('Confirmed');
}
 else{
 	echo htmlentities('Cancelled');
 }
										?></td>
										<th>Last Udation Date</th>
										<td><?php echo $row['lastUpdateDate']?></td>
									</tr>

									<?php if($row['status']==0){ ?>
										<tr>	
										<td style="text-align:center" colspan="4">
				<a href="bookig-details.php?aeid=<?php echo $row['book_id'];?>" onclick="return confirm('Do you really want to Confirm this booking')" class="btn btn-primary"> Confirm Booking</a> 

<a href="bookig-details.php?eid=<?php echo $row['book_id'];?>" onclick="return confirm('Do you really want to Cancel this Booking')" class="btn btn-danger"> Cancel Booking</a>
</td>
</tr>
<?php } ?>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>
								<form method="post">
	   <input name="Submit2" type="submit" class="txtbox4" value="Print" onClick="return f3();" style="cursor: pointer;"  />
	</form>

							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script language="javascript" type="text/javascript">
function f3()
{
window.print(); 
}
</script>
</body>
</html>

