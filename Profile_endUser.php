<?php
session_start();
require ('dbconn.php');
if ($_SESSION['User'] != NULL)
{
	$user = $_SESSION['User'];

	$sql = "SELECT * FROM users WHERE username ='$user'";
	$result = mysqli_query($conn,$sql);
	$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
	// admin things
	$fn = $posts['0']["fname"];
	$ln = $posts['0']["lname"];
	$bdate = $posts['0']["bdate"];
	$mail = $posts['0']["Email"];
	$discount = $posts['0']["discount_code"];
	$type = $posts['0']["Type_U"];
	// var_dump($posts);
	//addr data 
	$sql2 = "SELECT * FROM user_addr WHERE username ='$user'";
	$result2 = mysqli_query($conn,$sql2);
	$posts2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
	
	$sql3 = "SELECT * FROM orders O WHERE O.username ='$user'";
	$result3 = mysqli_query($conn,$sql3);
	$posts3 = mysqli_fetch_all($result3,MYSQLI_ASSOC);	

}
else 
{
		header("Location: index.php?no_login");
}
// var_dump($posts2);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
        
        
        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">
        
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        
        <link rel="stylesheet" href="css/aos.css">
        
        <link rel="stylesheet" href="css/ionicons.min.css">
        
        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css/jquery.timepicker.css">
        
        
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/icomoon.css">
        <link rel="stylesheet" href="css/style.css">
        
     </head>

     <body>
      
            <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
              <div class="container">
                      <a class="navbar-brand" href="welcome2.php"><span class="flaticon-pizza-1 mr-1"></span>Delicous<br><small>Delicous</small></a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span> Home
                      </button>
                  <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item"><a href="welcome2.php" class="nav-link">Home</a></li>
                      <li class="nav-item"><a href="Restaurents2.php" class="nav-link">Restaurants</a></li>
                      <li class="nav-item"><a href="Order.php" class="nav-link">Order </a></li>
                      <li class="nav-item active"><a href="Profile_endUser.php" class="nav-link">Profile</a></li>
                      <li class="nav-item"><a href="Logout.php" class="nav-link">Logout</a></li>
                    </ul>
                  </div>
                  </div>
              </nav>


    <section class="ftco-section contact-section">
      <div class="container mt-5">
        <div class="row block-9">
					<div class="col-md-4 contact-info ftco-animate">
						<div class="row">
							<div class="col-md-12 mb-4">
	              <h2 class="h3"><?= $user ?>'s Account</h2>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Name :</span> <?= $fn ?>  <?= $ln?> </p>
                </div>
                <div class="col-md-12 mb-3">
                <?php  foreach($posts2 as $key): ?>
                <p><span>Address:</span>   <?php echo $key['address'] ?> </p>
                <?php endforeach; ?>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Date :</span> <?= $bdate ?></a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Email:</span> <?= $mail?> </a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Discount :</span> <?= $discount ?> </a></p>
	            </div>
			            </div>
		            </div>
                    <div class="col-md-1"></div>
              
        <div class="col-md-5 ftco-animate">
            <form action="add_address.php" class="contact-form" method="post"> 
                <div class="col-md-6">
                <h2 class="h2">Add Address</h2>
	                <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Your Address" required="required">
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="city" placeholder="City" required="required">
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="area" placeholder="Area" required="required">
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="addrID" placeholder="Address ID" required="required">
                    </div>
                </div>
                <div class="form-group" style="justify-content: center;">
                    <button type="submit"  name="addr"  class="btn btn-primary py-3 px-5"> Submit </button>
              </div>
            </form>
        </div>

       <br>
        

<!-- // -->

<div class="col-md-6  pt-4 ftco-animate">
	<form action="Change_mypass.php" class="contact-form" method="post">
		<div class="row pt-4">
			<div class="col-ml-8">
            <h2 class="h4">Change Your Password </h2>
						<div class="form-group pt-3">
							<input type="password" class="form-control" name="chngpass" placeholder="Enter password" required="required">
						</div>  
							<div class="form-group pt-4" style="justify-content: center;">
								<button type="submit"  name="chpass"  class="btn btn-primary py-3 px-5"> Submit </button>
							</div>
			</div>
		</div>
							
	</form>
</div>
<!-- // -->



<!-- // -->

<div class="col-md-6  ftco-animate">
	<form action="Change_name.php" class="contact-form" method="post">
		<div class="row">
			<div class="col-md-6">
            <h2 class="h4">Change Name </h2>
						<div class="form-group">
							<input type="text" class="form-control" name="fname" placeholder="First Name " required="required">
                        </div>  
                        <div class="form-group">
							<input type="text" class="form-control" name="lname" placeholder="Last Name" required="required">
						</div>
							<div class="form-group pt-5" style="justify-content: center;">
								<button type="submit"  name="chng_name"  class="btn btn-primary py-3 px-5"> Submit </button>
							</div>
			</div>
		</div>
							
	</form>
</div>
<!-- // -->

<!-- // -->

<div class="col-md-6  pt-4 ftco-animate">
	<form action="change_bd.php" class="contact-form" method="post">
		<div class="row">
			<div class="col-md-6">
            <h2 class="h4">Change Birthdate </h2>
                    <div class="form-group">
                        <input type="date" class="form-control" name="bdate" placeholder="Birthdate" required="required">        	
                    </div>
                        <div class="form-group pt-5">
                            <button type="submit"  name="bchange"  class="btn btn-primary py-3 px-5"> Submit </button>
                        </div>
			</div>
		</div>
							
	</form>
</div>
<!--  -->

<!--  -->
<div class="col-md-5  pt-4 ftco-animate">
	<form action="del_addr.php" class="contact-form" method="post">
		<div class="row">
			<div class="col-md-6">
						<h2 class="h4">Delete Address </h2>
							<select name="sel_address_tbd" style="width:200px;">
							<option value="" disabled selected hidden>Please Choose Address ... </option>
							<?php  foreach($posts2 as $key): ?>
								<option value="<?php echo $key['address'];?>"> <?php echo $key['address']; ?></option>
									<?php endforeach; ?>
							</select>

							<div class="form-group pt-5" style="justify-content: center;">
									<button type="submit"  name="del_addr"  class="btn btn-primary py-3 px-5"> Submit </button>
							</div>
			</div>
		</div>
							
	</form>
</div>

<!--  -->


<!--  -->
<div class="col-md-6  ftco-animate">
	<form action="add_code.php" class="contact-form" method="post">
		<div class="row">
			<div class="col-md-6">
            <h2 class="h4">Redeem  Discount Code</h2>
						<div class="form-group">
							<input type="text" class="form-control" name="disc" placeholder="Discount Code" required="required">
              </div>  
							<div class="form-group pt-5" style="justify-content: center;">
								<button type="submit"  name="disc_code"  class="btn btn-primary py-3 px-5"> Submit </button>
							</div>
			</div>
		</div>
							
	</form>
</div>


<!--  -->
<div class="col-md-6  ftco-animate">
	<form action="Show_status.php" class="contact-form" method="post">
		<div class="row">
			<div class="col-md-6">
            <h2 class="h4">View Order Status</h2>
						<select name="sel_Order" style="width:200px;">
							<option value="" disabled selected hidden>Please Choose An Order ... </option>
							<?php  foreach($posts3 as $key): ?>
								<option value="<?php echo $key['orderId'];?>"> <?php echo $key['orderId']; ?></option>
									<?php endforeach; ?>
							</select> 
							<?php 
							if(isset($_SESSION['Status_view']))
							{
								$arg = $_SESSION['Status_view'];
								?>
								<p style="font-size:20px; color:#fff;" ><span style="font-size:20px;" ></span> Status: <?php echo $arg; ?></p>
								<?php
							}

							?>
							<div class="form-group pt-5" style="justify-content: center;">
								<button type="submit"  name="View_Order"  class="btn btn-primary py-3 px-5"> Submit </button>
							</div>
			</div>
		</div>
							
	</form>
</div>
<!--  -->

<!--  -->
<div class="col-md-5 contact-info ftco-animate " style="padding-top: 25px;">
	<form action="Show_status.php" class="contact-form" method="post">
		<!-- <div class="row"> -->
			<div class="col-md-10">
				<h2 class ="h5">View Order History </h2> 
				<?php 
				if(isset($_SESSION['hist_sta']))
				{
					$argsz = $_SESSION['hist_sta'];

				?>
					<?php  foreach($argsz as $trin): ?>
					<p style="color:#fff;" ><span style="font-size:20px;" ></span> Status: <?php echo $trin['status']; ?></p>
					<p style="color:#fff;" ><span style="font-size:20px;" ></span> Address: <?php echo $trin['Address_d']; ?></p>
					<p style="color:#fff;" ><span style="font-size:20px;" ></span> Price : <?php echo $trin['total_price']; ?></p>
					<p style="color:#fff;" ><span style="font-size:20px;" ></span> _______</p>


									<?php endforeach; ?>

					<?php
				}
					?>
								<div class="form-group" style="justify-content: center;">
									<button type="submit"  name="ord_hist"  class="btn btn-primary py-3 px-5"> Submit </button>
								</div>
			</div>
			
		</form>
</div>
</div>
</div>
</section>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>
    </body>
</html>