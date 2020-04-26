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
                      <li class="nav-item"><a href="Order.php" class="nav-link">Order	</a></li>
                      <li class="nav-item active"><a href="Profile_add.php" class="nav-link">Profile</a></li>
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
        
<div class="col-md-5 contact-info ftco-animate ">
	<form action="add_admin.php" class="contact-form" method="post">
		<!-- <div class="row"> -->
			<div class="col-md-10">
				<h2 class="h3">Admin Options </h2>
					<p class="h6"><span>Add Admin or Staff </span> </p> 
						<div class="form-group">
							<select name = "sel_add" style="width:150px;">
							<option value="" disabled selected hidden>Please Choose...</option>
								<option value="Admin" name = "admin2">Admin</option>
								<option value="Staff" name = "staff2">Staff</option>
							</select>
						</div>
							<div class="form-group">
								<input type="text" class="form-control" name="susername" placeholder="Enter Username" required="required">
							</div>
								<div class="form-group pb-4" style="justify-content: center;">
									<button type="submit"  name="admin-b"  class="btn btn-primary py-3 px-5"> Submit </button>
								</div>
		
			</div>
		<!-- </div>						 -->
	</form>
</div>

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

<div class="col-md-5 contact-info ftco-animate ">
	<form action="change_pass.php" class="contact-form" method="post">
		<!-- <div class="row"> -->
			<div class="col-md-10">
				<h2 class ="h5">Change Password for Admin or staff</h2> 
					<div class="form-group">
						<select name = "sel_chg"  style="width:150px;">
						<option value="" disabled selected hidden>Please Choose...</option>
							<option value="Admin" name = "admin2">Admin</option>
							<option value="Staff" name = "staff2">Staff</option>
						</select>
					</div>
						<div class="form-group">
							<input type="text" class="form-control" name="Cusername" placeholder="Enter Username" required="required">
						</div>
							<div class="form-group">
								<input type="password" class="form-control" name="Cpassword" placeholder="Enter password" required="required">
							</div>
								<div class="form-group" style="justify-content: center;">
									<button type="submit"  name="change_btn"  class="btn btn-primary py-3 px-5"> Submit </button>
								</div>
			</div>
		<!-- </div> -->
			
								</form>
</div>


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


<div class="col-md-5 contact-info ftco-animate ">
	<form action="ad_st_delete.php" class="contact-form" method="post">
		<!-- <div class="row"> -->
			<div class="col-md-10">
				<p><span>Delete Admin or Staff</span> </p> 
					<div class="form-group">
						<select name = "sel_del" style="width:150px;">
						<option value="" disabled selected hidden>Please Choose...</option>
							<option value="Admin" name = "admin">Admin</option>
							<option value="Staff" name = "staff">Staff</option>
						</select>
					</div>
						<div class="form-group">
							<input type="text" class="form-control" name="admin/staff" placeholder="Enter Username" required="required">
						</div>  
							<div class="form-group" style="justify-content: center;">
								<button type="submit"  name="ad_st"  class="btn btn-primary py-3 px-5"> Submit </button>
							</div>
			</div>
		<!-- </div> -->
							
	</form>
</div>

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

<div class="col-md-5 contact-info ftco-animate ">
	<form action="added_code.php" class="contact-form" method="post">
		<!-- <div class="row"> -->
			<div class="col-md-10">
				<h2 class ="h5">Add a discount code </h2> 
						<div class="form-group">
							<input type="text" class="form-control" name="dcode" placeholder="Enter code" required="required">
						</div>
							<div class="form-group">
								<input type="text" class="form-control" name="valu" placeholder="Enter Value" required="required">
							</div>
							<div class="form-group">
								<input type="date" class="form-control" name="date_lim" placeholder="Date Limit" >
							</div>
								<div class="form-group" style="justify-content: center;">
									<button type="submit"  name="code_btn"  class="btn btn-primary py-3 px-5"> Submit </button>
								</div>
			</div>
			
		</form>
</div>

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

<div class="col-md-5 contact-info ftco-animate ">
	<form action="mod_code.php" class="contact-form" method="post">
		<!-- <div class="row"> -->
			<div class="col-md-10">
				<h2 class ="h5">Modify discount code </h2> 
						<div class="form-group">
							<input type="text" class="form-control" name="dcode_2" placeholder="Enter code" required="required">
						</div>
							<div class="form-group">
								<input type="text" class="form-control" name="value" placeholder="Enter Value" required="required">
							</div>
							<div class="form-group">
								<input type="date" class="form-control" name="date_lim2" placeholder="Date Limit">
							</div>
								<div class="form-group" style="justify-content: center;">
									<button type="submit"  name="mod_code_btn"  class="btn btn-primary py-3 px-5"> Submit </button>
								</div>
			</div>
			
		</form>
</div>

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
<div class="col-md-5 contact-info ftco-animate " style="padding-top: 25px;">
	<form action="del_code.php" class="contact-form" method="post">
		<!-- <div class="row"> -->
			<div class="col-md-10">
				<h2 class ="h5">Delete discount code </h2> 
						<div class="form-group">
							<input type="text" class="form-control" name="dcode_del" placeholder="Enter code" required="required">
						</div>
								<div class="form-group" style="justify-content: center;">
									<button type="submit"  name="del_code"  class="btn btn-primary py-3 px-5"> Submit </button>
								</div>
			</div>
			
		</form>
</div>
<!--  -->


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
<!--  -->


<!-- // -->

								<!-- <div class="signup-form"> -->
                <!-- <form action="signup_.php" method="post">
                    <h2 class="text-md-center">Register</h2>
                    <p class="hint-text">Create your account. It's free and only takes a minute.</p>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div> 
                            <div class="col-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
                        </div>        	
                    </div>
									</form> -->
								<!-- </div> -->
</div>
</div>
</section>
<section class="ftco-section contact-section">
				<div class="container mt-5">
					<form action="rest_add.php" method="post">
						<h2 class="text-md-center">Restaurants Options</h2>
						<h3 class="text-md-center">Add restaurants.</h3>
						<div class="form-group">
								<div class="row" style="padding-top:25px;">
									<div class="col-6"><input type="text" class="form-control" name="Restaurant_Name" placeholder="Restaurant Name" required="required"></div>
									<div class="col-6"><input type="text" class="form-control" name="Restaurant_ID" placeholder="Restaurant ID " required="required"></div> 
								</div> 
								<div class="row" style="padding-top:25px;">       	
										<div class="col-6"><input type="text" class="form-control" name="cuisine" placeholder="Cuisine" required="required"></div>
										<div class="col-6"><input type="text" class="form-control" name="lmt_dis" placeholder="Limited Discount " required="required"></div>
									</div>
							</div>
							<div class="row" style="padding-top: 25px; justify-content: center;">
                  <button type="submit"  name="Rbutton"  class="btn btn-primary py-3 px-5"> Submit </button>
                 </div>
						</form>
				<form action="rest_b.php" method="post">
					<h3 class="text-md-center" style="padding-top:35px;">Add Branch.</h3>
                    <div class="form-group">
												<!-- <div class="h4" style="padding-top: 25px;">Restaurant Name:</div> -->
												<div class="row" style="padding-top:25px;">  
														<div class="col-6"><input type="text" class="form-control" name="Restaurant_ID" placeholder="Restaurant ID " required="required"></div>      	
														<div class="col-6"><input type="text" class="form-control" name="Bname" placeholder="Branch name" required="required"></div>
													</div>
													<div class="row" style="padding-top:25px;">       	
															<div class="col-6"><input type="text" class="form-control" name="baddress" placeholder="Branch Address" required="required"></div>
															<div class="col-4"><input type="text" class="form-control" name="Areaname" placeholder="Area name" required="required"></div>
															<div class="col-2"><input type="text" class="form-control" name="AreaId" placeholder="Area ID" required="required"></div>
														</div>
														<div class="row" style="padding-top: 25px;">
															<div class="h4" style="padding-top: 25px;"> Opening Hours   :</div>
															<div class="col-4"><input type="time" class="form-control" name="opnhrs" placeholder="Opening hours" required="required"></div>
														</div>
														<div class="row" style="padding-top: 25px;">
															<div class="h4" style="padding-top: 25px;"> Closing Hours   :</div>
															<div class="col-4"><input type="time" class="form-control" name="clshrs" placeholder="Closing hours" required="required"></div>
														</div>
												<div class="row" style="padding-top: 25px; justify-content: center;">
                            <button type="submit"  name="B_button"  class="btn btn-primary py-3 px-5"> Submit </button>
                        </div>
											</div>
				</form>
								</div>


						<form action="Change_rest_info.php" method ="post">
							<h3 class="text-md-center" style="padding-top:35px;">Modify Restaurant/Branch</h3>	

							<div class="container mt-3">
								<div style="padding-top: 50px;">
										<select name="opt_mod" style="width:200px;">
												<option value="" disabled selected hidden>Please Choose... </option>
												<option value="b_address">Address</option>
												<option value="rCuisine">Cuisine</option>
												<option value="area_ID">Area ID</option>
												<option value="limited_dis"> Limited Discount</option>
											</select>

											<div class="row" style="padding-top:25px;">  
												<div class="col-4"><input type="text" class="form-control" name="r_ID" placeholder="Restaurant ID" required="required"></div>	
												<div class="col-4"><input type="text" class="form-control" name="br_ID" placeholder="Branch ID" required="required"></div>								
											</div>
											<div class="row" style="padding-top:25px;">  
													<div class="col-6"><input type="text" class="form-control" name="infotbh" placeholder="Info " required="required"></div>      	
											</div>

											<div class="row" style="padding-top: 25px; justify-content: left;">
                            <button type="submit"  name="infoch_button"  class="btn btn-primary py-3 px-5"> Submit </button>
												</div>
									</div>			
								</div>
							</form>
						<form action="hrs_updated.php" method ="post">
						<h3 class="text-md-center" style="padding-top:35px;">Modify Working Hours</h3>	
							<div class="container mt-3">
										<div  style="padding-top: 50px;">
											<select name="hrs_mod" style="width:200px;">
											<option value="" disabled selected hidden>Please Choose... </option>
												<option value="opening_hrs">Opening Hours</option>
												<option value="closing_hrs">Closing Hours</option>
											</select>
											<div class="row" style="padding-top:25px;">  
												<div class="col-4"><input type="text" class="form-control" name="re_ID" placeholder="Restaurant ID" required="required"></div>	
												<div class="col-4"><input type="text" class="form-control" name="bra_ID" placeholder="Branch ID" required="required"></div>								
											</div>

											<div class="row" style="padding-top:25px;">  
													<div class="col-6"><input type="time" class="form-control" name="timez" placeholder="timech" required="required"></div>      	
											</div>
											<div class="row" style="padding-top: 25px; justify-content: left;">
                            <button type="submit"  name="Cht_button"  class="btn btn-primary py-3 px-5"> Submit </button>
                        </div>
											</div>
									</div>
							</form>

							<form action="Charge_ch.php" method ="post">
							<h3 class="text-md-center" style="padding-top:35px;">Change Charge </h3>	
							<div class="container mt-3">
									
											<div class="row" style="padding-top:25px;">  
												<div class="col-4"><input type="text" class="form-control" name="area_Id" placeholder="Area ID" required="required"></div>	
												<div class="col-4"><input type="text" class="form-control" name="area_name" placeholder="Area name" required="required"></div>								
											</div>

											<div class="row" style="padding-top:25px;">  
													<div class="col-6"><input type="text" class="form-control" name="charge" placeholder="New Charge" required="required"></div>      	
											</div>
											<div class="row" style="padding-top: 25px; justify-content: left;">
                            <button type="submit"  name="Charge_button"  class="btn btn-primary py-3 px-5"> Submit </button>
                        </div>
											</div>
									</div>
							</form>
							
							<form action="del_rest.php" method ="post">
							<h3 class="text-md-center" style="padding-top:35px;">Delete Restaurant</h3>	
							<div class="container mt-3">
									
											<div class="row" style="padding-top:25px;">  
												<div class="col-4"><input type="text" class="form-control" name="rd_id" placeholder="Restaurant ID " required="required"></div>							
											</div>

											<div class="row" style="padding-top: 25px; justify-content: left;">
                            <button type="submit"  name="rest_del_button"  class="btn btn-primary py-3 px-5"> Submit </button>
                        </div>
											</div>
									</div>
							</form>

							<form action="del_branch.php" method ="post">
							<h3 class="text-md-center" style="padding-top:35px;">Delete Restaurant</h3>	
							<div class="container mt-3">
									
											<div class="row" style="padding-top:25px;">  
												<div class="col-4"><input type="text" class="form-control" name="rst_id" placeholder="Restaurant ID " required="required"></div>							
												<div class="col-4"><input type="text" class="form-control" name="br_id" placeholder="Branch ID" required="required"></div>							
											</div>

											<div class="row" style="padding-top: 25px; justify-content: left;">
                            <button type="submit"  name="branch_del_button"  class="btn btn-primary py-3 px-5"> Submit </button>
                        </div>
											</div>
									</div>
							</form>
</section>


<section class="ftco-section contact-section">
	<div class="container mt-5">
			<form action="Menu_.php" method ="post">
							<h3 class="text-md-center" style="padding-top:35px;">Adding Menus</h3>	
							<div class="container mt-3">
											<div class="row">  
												<div class="col-4"><input type="text" class="form-control" name="Rid_t" placeholder="Restaurant ID " required="required"></div>							
												<div class="col-4"><input type="text" class="form-control" name="menuId" placeholder="Menu ID " required="required"></div>
												<!-- <span> Menu Type </span> -->
											<div class ="col-3" >
												<select name="hrs_mod" style="width:200px; position: relative; top:20px;">
														<option value="" disabled selected hidden>Please Choose... </option>
														<option value="Regular">Regular</option>
														<option value="breakfast">Breakfast</option>
													</select>
												</div>
											</div>

											<div class="row" style="padding-top: 25px;">  
											<h6 style="padding-top:20px;"> Starting hours: </h6> <div class="col-4"><input type="time" class="form-control" name="start_hrs" placeholder="" required="required"></div>							
											<h6 style="padding-top:20px;"> Closing hours: </h6><div class="col-4"><input type="time" class="form-control" name="close_hrs" placeholder="" required="required"></div>
												</div>

											<div class="row" style="padding-top: 35px; justify-content: center;">
                            <button type="submit"  name="Add_menu_button"  class="btn btn-primary py-3 px-5"> Submit </button>
                        </div>
											</div>
									</div>
							</form>

	</div>

	<!--  -->

	<div class="container mt-5">
			<form action="Menu_.php" method ="post">
							<h3 class="text-md-center" style="padding-top:35px;">Modify Menu</h3>	
							<div class="container mt-3">
											<div class="row">  
												<div class="col-4"><input type="text" class="form-control" name="Rid_t" placeholder="Restaurant ID " required="required"></div>							
												<div class="col-4"><input type="text" class="form-control" name="menuId" placeholder="Menu ID " required="required"></div>
												<!-- <span> Menu Type </span> -->
											<div class ="col-3" >
												<select name="hrs_mod" style="width:200px; position: relative; top:20px;">
														<option value="" disabled selected hidden>Please Choose... </option>
														<option value="Regular">Regular</option>
														<option value="breakfast">Breakfast</option>
													</select>
												</div>
											</div>

											<div class="row" style="padding-top: 25px;">  
											<h6 style="padding-top:20px;"> Starting hours: </h6> <div class="col-4"><input type="time" class="form-control" name="start_hrs" placeholder="" required="required"></div>							
											<h6 style="padding-top:20px;"> Closing hours: </h6><div class="col-4"><input type="time" class="form-control" name="close_hrs" placeholder="" required="required"></div>
												</div>

											<div class="row" style="padding-top: 35px; justify-content: center;">
                            <button type="submit"  name="mod_menu_button"  class="btn btn-primary py-3 px-5"> Submit </button>
                        </div>
											</div>
									</div>
							</form>

	</div>


	<!--  -->
	<div class="container mt-5">
			<form action="Menu_.php" method ="post">
							<h3 class="text-md-center" style="padding-top:35px;">Delete Menu</h3>	
							<div class="container mt-3">
											<div class="row">  
												<div class="col-6"><input type="text" class="form-control" name="Rid_t" placeholder="Restaurant ID " required="required"></div>							
												<div class="col-6"><input type="text" class="form-control" name="menuId" placeholder="Menu ID " required="required"></div>
												<!-- <span> Menu Type </span> -->
												</div>

											<div class="row" style="padding-top: 35px; justify-content: center;">
                            <button type="submit"  name="del_menu_button"  class="btn btn-primary py-3 px-5"> Submit </button>
                        </div>
											</div>
									</div>
							</form>

	</div>

	<!--  -->
</section>
						<!-- Start of items -->
<section class="ftco-section contact-section">
	<div class="container mt-5">
			<form action="item_.php" method ="post">
							<h3 class="text-md-center" style="padding-top:35px;">Add Items to Menu</h3>	
							<div class="container mt-3">
											<div class="row">  
												<div class="col-4"><input type="text" class="form-control" name="restId" placeholder="Restaurant ID " required="required"></div>							
												<div class="col-4"><input type="text" class="form-control" name="menuId" placeholder="Menu ID " required="required"></div>
												<div class="col-4"><input type="text" class="form-control" name="itemId" placeholder="Item ID" required="required"></div>
											</div>
											
											<div class="row" style="padding-top: 25px;">  
												<div class="col-4"><input type="text" class="form-control" name="item_name" placeholder="Item Name" required="required"></div>							
														<div class ="col-4" >
															<select name="opt_it" style="width:200px; position: relative; top:25px;">
																	<option value="" disabled selected hidden>Please Choose... </option>
																	<option value="Sandwich">Sandwich</option>
																	<option value="Regular meal">Regular Meal</option>
																	<option value="Large meal">Large Meal</option>
																</select>
															</div>
															<div class="col-4"><input type="number" step="0.01" class="form-control" name="item_price" placeholder="Price in EGP" required="required"></div>
												</div>

											<div class="row" style="padding-top: 35px; justify-content: center;">
                            <button type="submit"  name="Add_item_button"  class="btn btn-primary py-3 px-5"> Submit </button>
                        </div>
											</div>
									</div>
							</form>

	</div>

	<!--  -->

	<section class="ftco-section contact-section">
	<div class="container mt-5">
			<form action="item_.php" method ="post">
							<h3 class="text-md-center" style="padding-top:0px;">Modify Items to Menu</h3>	
							<div class="container mt-3">
											<div class="row">  
												<div class="col-4"><input type="text" class="form-control" name="restId" placeholder="Restaurant ID " required="required"></div>							
												<div class="col-4"><input type="text" class="form-control" name="menuId" placeholder="Menu ID " required="required"></div>
												<div class="col-4"><input type="text" class="form-control" name="itemId" placeholder="Item ID" required="required"></div>
											</div>
											
											<div class="row" style="padding-top: 25px;">  
												<div class="col-4"><input type="text" class="form-control" name="item_name" placeholder="Item Name" required="required"></div>							
														<div class ="col-4" >
															<select name="opt_it" style="width:200px; position: relative; top:25px;">
																	<option value="" disabled selected hidden>Please Choose... </option>
																	<option value="Sandwich">Sandwich</option>
																	<option value="Regular meal">Regular Meal</option>
																	<option value="Large meal">Large Meal</option>
																</select>
															</div>
															<div class="col-4"><input type="number" step="0.01" class="form-control" name="item_price" placeholder="Price in EGP" required="required"></div>
												</div>

											<div class="row" style="padding-top: 35px; justify-content: center;">
                            <button type="submit"  name="mod_item_button"  class="btn btn-primary py-3 px-5"> Submit </button>
                        </div>
											</div>
									</div>
							</form>

	</div>


	<!--  -->
	<div class="container mt-5">
			<form action="item_.php" method ="post">
							<h3 class="text-md-center" style="padding-top:35px;">Delete Item</h3>	
							<div class="container mt-3">
											<div class="row">  
												<div class="col-4"><input type="text" class="form-control" name="restId" placeholder="Restaurant ID " required="required"></div>							
												<div class="col-4"><input type="text" class="form-control" name="menuId" placeholder="Menu ID " required="required"></div>
												<div class="col-4"><input type="text" class="form-control" name="itemId" placeholder="Item ID" required="required"></div>
											</div>

											<div class="row" style="padding-top: 35px; justify-content: center;">
                          <button type="submit"  name="del_item_button"  class="btn btn-primary py-3 px-5"> Submit </button>
                        </div>
											</div>
									</div>
							</form>

	</div>

	<!--  -->
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