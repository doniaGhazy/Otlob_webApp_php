<?php
  require('dbconn.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
    
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
                      <a class="navbar-brand" href="index.php"><span class="flaticon-pizza-1 mr-1"></span>Delicous<br><small>Delicous</small></a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span> Home
                      </button>
                  <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                      <!-- <li class="nav-item"><a href="Menu.html" class="nav-link">Menu</a></li> -->
                      <li class="nav-item"><a href="Restaurents.php" class="nav-link">Restaurants</a></li>
                      <li class="nav-item"><a href="Order.php" class="nav-link">Order </a></li>
                      <li class="nav-item"><a href="Login.php" class="nav-link">Login</a></li>
                      <li class="nav-item active"><a href="Register.php" class="nav-link">Register</a></li>
                    </ul>
                  </div>
                  </div>
              </nav>

            <div class="signup-form">
                <form action="signup_.php" method="post">
                    <h2>Register</h2>
                    <p class="hint-text">Create your account. It's free and only takes a minute.</p>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div> 
                            <div class="col-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
                        </div>        	
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Username" required="required">        	
                    </div>
                    <div class= "text">
                    <input type="radio" name="g" value="male" id="fn1" checked="checked"/><label for="fn1" style="color:white;">Male</label>
                    <input type="radio" name="g" id ="fn2" value="female"/><label for="fn2" style="color:white;">Female</label>

                    </div>  
                    <div class="form-group">
                        <input type="date" class="form-control" name="bdate" placeholder="Birthdate" required="required">        	
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
                    </div>
                    <div class="form-group">
                        <label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="index.php"></a>Terms of Use</a> &amp; <a href="index.html">Privacy Policy</a></label>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="signup-submit" class="btn btn-success btn-lg btn-block">Register Now</button>
                    </div>
                </form>
                <div class="text-center">Already have an account? <a href="Login.php">Sign in</a></div>
             </div>
                
    </body>
</html>