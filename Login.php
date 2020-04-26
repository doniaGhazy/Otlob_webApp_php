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
                      <a class="navbar-brand" href="index.php"><span class="flaticon-pizza-1 mr-1"></span>Delicous<br><small>Delicous</small></a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span> Home
                      </button>
                  <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                      <li class="nav-item"><a href="Restaurents.php" class="nav-link">Restaurants</a></li>
                      <li class="nav-item"><a href="Login.php" class="nav-link">Order</a></li>
                      <li class="nav-item active"><a href="Login.php" class="nav-link">Login</a></li>
                      <li class="nav-item"><a href="Register.php" class="nav-link">Register</a></li>
                    </ul>
                  </div>
                  </div>
              </nav>
          <form action="lin.php" method="post">
            <div class="signup-form">
                <form class = bg-dark>
                    <h2> Login </h2>
                    <div class="form-group">
                        <div class="row">
                            <div class="col"><input type="text" class="form-control" name="User" placeholder="Username" required="required"></div> 
                        </div>        	
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="Login-submit" class="btn btn-success btn-lg btn-block">Login</button>
                    </div>
                </form>
                <div class="text-center">Forget Password? <a href="resetpassword.php">reset password</a></div>
             </div>
            </form>  
    </body>
</html>