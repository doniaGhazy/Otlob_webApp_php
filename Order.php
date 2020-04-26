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

    $sql3 ="SELECT * FROM restaurant WHERE 1";
    $result3 = mysqli_query($conn,$sql3);
    $posts3 = mysqli_fetch_all($result3,MYSQLI_ASSOC);	

    $sql4 = "SELECT * FROM area WHERE 1";
    $result4 = mysqli_query($conn,$sql4);
    $Areas_ft = mysqli_fetch_all($result4,MYSQLI_ASSOC);
    
    if(isset($_POST['clear_s']))
    {
      // clear_s
        $_SESSION['results_nocu'] = '';
        $_SESSION['view_menuz'] = '';
        $_SESSION['view_items_inmenu']='';
        unset($_SESSION['shopping_cart']);
    }
    // if(isset($_POST['clear_menu']))
    // {
    //     $_SESSION['view_menuz'] = '';
    // }
  
  }
  else 
  {
      header("Location: index.php?no_login");
  }
  
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Order Now</title>
    
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
                      <li class="nav-item active"><a href="Order.php" class="nav-link">Order</a></li>
                      <?php
                        if($type == 'Admin')// go to admin page 
                        {
                            echo '<li class="nav-item "><a href="Profile_add.php" class="nav-link">Profile</a></li>';
                        }
                        else if($type == "End") // end user
                        {
                            echo '<li class="nav-item "><a href="Profile_endUser.php" class="nav-link">Profile</a></li>';
                        }
                        else // staff user
                        {
                            echo '<li class="nav-item "><a href="Profile_staff.php" class="nav-link">Profile</a></li>';
                        }
                      ?>
                      <li class="nav-item"><a href="Logout.php" class="nav-link">Logout</a></li>
                    </ul>
                  </div>
                  </div>
              </nav>

<section class="ftco-section ftco-section img">
    <div class="container mt-5">
           <div class="signup-form">
                    <h2>Order Now</h2>
              </div>
        <h3 class="text-md-center" style="padding-top:0px;"> Search for Restaurants </h3>	
                <div class="container mt-5">
                    <form method="post" action="order_.php">
                    <div class ="row" >
                    <div class ="col-6" >
                        <select name="area_mod" style="width:250px; position: relative; top:25px;" required="required">
                                <option value="" disabled selected hidden>Please Choose An area </option>
                                <?php  foreach($Areas_ft as $A_ft): ?>
                                    <option value="<?php echo $A_ft['area_name'];?>"> <?php echo $A_ft['area_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class ="col-6" >
                        <select name = "cus" style="width:275px; position: relative; top:25px;">
                                <option value="" disabled selected hidden>Choose a Cusinie (Optionally).. </option>
                                <option name= "no" value="no" >No </option>
                                <?php  foreach($posts3 as $c_ft): ?>
                                    <option value="<?php echo $c_ft['rCuisine'];?>"> <?php echo $c_ft['rCuisine']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                     </div>
                
                    </div>
                </div>
                <div class="row" style="padding-top: 60px; justify-content: center;">
                    <div class="col-2">
                        <button type="submit" name="order_search" class="btn btn-success btn-lg btn-block">Search</button>
                </div>
            </form>
        </div>
    </div>	

    <?php
    if($_SESSION['results_nocu'] != NULL)
    {
        $rest = $_SESSION['results_nocu'];  
?>
<div class="container m-5">
        <h3 class="text-md-center" style="padding-top:0px;"> Available Restaurants </h3>

        <div class="container mt-5">
            <?php  foreach($rest as $zero): ?>
                <div class ="row" >
                    <div class="col-2"style="Padding-top:50px;">
                        <h2 class="h3"><?= $zero['area_name'] ?></h2>
                    </div>
                    <div class="col-3" style="Padding-top:50px;">  
                    <p style="color:#fff;"><span>Name :</span> <?= $zero['branch_name'];?></p>
                    </div>
                    <div class="col-3" style="Padding-top:50px;">  
                    <p style="color:#fff;"><span>Address :</span> <?= $zero['b_address'];?></p>
                    </div>
                    <div class="col-3" style="Padding-top:50px;">  
                    <p style="color:#fff;"><span>Opening Hour :</span> <?= $zero['opening_hrs'];?></p>
                    </div>
                    <div class="col-3" style="Padding-top:50px;">  
                    <p style="color:#fff;"><span>Closing Hour :</span> <?= $zero['closing_hrs'] ;?></p>
                    </div>
                </div>
                    <?php endforeach; ?>
                </div>
                <!-- <form action="Order.php" method ="post">
                <div class="row" style="padding-top: 60px; justify-content: center;">
                    <div class="col-2">
                                <button type="submit" name="clear_s" class="btn btn-success btn-lg btn-block">Clear</button>
                </div>
                </form> -->
            </div>


  <div class="container mt-5">
          <h3 class="text-md-center" style="padding-top:0px;"> View Active Menus </h3>	
                  <div class="container m-5">
                      <form method="post" action="order_.php">
                      <div class ="row" style ="justify-content: center;">
                      <div class ="col-4" >
                          <select name = "restnamez" style="width:275px; position: relative; top:25px;">
                                  <option value="" disabled selected hidden>Choose a Restaurant.. </option>                                <?php  foreach($posts3 as $c_ft): ?>
                                      <option value="<?php echo $c_ft['rest_name'];?>"> <?php echo $c_ft['rest_name']; ?></option>
                                  <?php endforeach; ?>
                              </select>
                          </div>	
                          <div class="col-2" style="padding-top: 20px; justify-content: center;">
                              <button type="submit" name="Search_menu" class="btn btn-success btn-lg btn-block">Search</button>
                          </div>
                      </div>
                  
                      </div>
                  </div>
              </form>
          </div>
  </div>	

  <?php
    if($_SESSION['view_menuz'] != NULL)
    {
        $resz = $_SESSION['view_menuz'];  
        $rid = $resz['0']["restId"];
        
        $sql35 ="SELECT * FROM restaurant R WHERE R.restId='$rid'";
        $result35 = mysqli_query($conn,$sql35);
        $posts35 = mysqli_fetch_all($result35,MYSQLI_ASSOC);
        

        $test = $posts35['0']['rest_name'];
        // var_dump($rid);
        // var_dump($test);
?>
<div class="container m-5">
        <h3 class="text-md-center" style="padding-top:0px;"> Available Menu(s) for <?= $test ?> </h3>

        <div class="container mt-5">
            <?php  foreach($resz as $one): ?>
                <div class ="row" >
                    <div class="col-2"style="Padding-top:50px;">
                        <h2 class="h3"><?= $one['menutype'] ?></h2>
                    </div>
                    <div class="col-3" style="Padding-top:50px;">

                    <p style="color:#fff;"><span>Start :</span> <?= $one['start_hrs'];?></p>
                    </div>
                    <div class="col-3" style="Padding-top:50px;">  
                    <p style="color:#fff;"><span>Close :</span> <?= $one['close_hrs'];?></p>
                    </div>
                </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <form action="order_.php" method ="post">
                            <div class="row" style="padding-top: 60px; justify-content: center;">
                                <div class="col-2">
                                  <button type="submit" name="view_item" class="btn btn-success btn-lg btn-block">View Menu</button>
                            </div>
              </form>
</div>
    <?php } ?>
<!--  -->
<?php
    if($_SESSION['view_items_inmenu'] != NULL)
    {
        $minx = $_SESSION['view_menuz']; 
        $item_mn = $_SESSION['view_items_inmenu'];  
        $res_id = $item_mn['0']["restId"];
        $type = $minx['0']["menutype"];
        
        $sql23 ="SELECT * FROM restaurant R WHERE R.restId='$res_id'";
        $result23 = mysqli_query($conn,$sql23);
        $posts23 = mysqli_fetch_all($result23,MYSQLI_ASSOC);
        

        $test = $posts23['0']['rest_name'];
        // var_dump($rid);
        // var_dump($test);
        // var_dump($type);
        ?>
<div class="container mt-5">
        <h3 class="text-md-center" style="padding-top:0px;"> <?= $type ?> Menu for <?= $test ?> </h3>

        <div class="container m-5" >
            <?php  foreach($item_mn as $fort): ?>
                <div class ="row" >
                    <div class="col-3"style="Padding-top:50px;">
                        <h2 class="h3" style="font-size:28px;"> Item :<?= $fort['item_name'] ?></h2>
                    </div>
                    <div class="col-3" style="Padding-top:50px;">

                    <p style="font-size:20px; color:#fff;"><span style="font-size:20px;">Type :</span> <?= $fort['item_config'];?></p>
                    </div>
                    <div class="col-3" style="Padding-top:50px;">  
                    <p style="font-size:20px; color:#fff;"><span style="font-size:20px;">Price:</span> <?= $fort['Price'];?> EGP</p>
                    </div>
                </div>
                    <?php endforeach; ?>
                </div>
            </div>

</div>

<!--  -->
<!-- ADD ITEMS TO SESSION TO CART .... -->
<?php 

  $minx = $_SESSION['view_menuz'];  
      // var_dump($minx);
    $rezt_id = $minx['0']["restId"];
    $menuz_ID = $minx['0']["menuId"];
  $sql69 = "SELECT * FROM item Z WHERE Z.restId = '$rezt_id' AND Z.menuId = '$menuz_ID'";
  $result69 = mysqli_query($conn,$sql69);
  $magic = mysqli_fetch_all($result69,MYSQLI_ASSOC);

  // var_dump($magic);


?>
<div class="container mt-5">
        <h3 class="text-md-center" style="padding-top:0px;"> Add to Cart </h3>
        <div class="container mt-5">
                <form method="post" action="Shopping_cart.php">
                  <div class ="row" >

                      <div class ="col-4" >
                      <span span style="font-size:20px;">Choose an Item :</span>
                        <select name="itemz_wt" style="width:150px; position: relative; left:25px;" required="required">
                                <option value="" disabled selected hidden>Options </option>
                                <?php
                                  $temp_array = [];
                                  foreach ($magic as &$v) {
                                      if (!isset($temp_array[$v['item_name']]))
                                      $temp_array[$v['item_name']] =& $v;
                                  }
                                  $magic2 = array_values($temp_array);
                                  foreach($magic2 as $wiz):
                                  ?>
                                    <option value="<?php echo $wiz['item_name'];?>"> <?php echo $wiz['item_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                      <div class ="col-4" >
                      <span span style="font-size:20px;">Configuration :</span>
                        <select name="itemz_conf" style="width:150px; position: relative; left:25px;" required="required">
                                <option value="" disabled selected hidden>Small/large etc. </option>
                                <?php
                                  $temp_array2 = [];
                                  foreach ($magic as &$v2) {
                                      if (!isset($temp_array2[$v2['item_config']]))
                                      $temp_array2[$v2['item_config']] =& $v2;
                                  }
                                  $magic3 = array_values($temp_array2);
                                  foreach($magic3 as $wi2z):
                                  ?>
                                    <option value="<?php echo $wi2z['item_config'];?>"> <?php echo $wi2z['item_config']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-2">
							              <input type="number" class="form-control" name="QTY" placeholder="Qty.." required="required">
					                	</div>

                     </div>
                        
                    </div>
                    
                    <div class = "row" style="padding-top:50px;">        
                      <span span style="font-size:20px;">Add a Comment:</span>
                      <div class="col-8" style="bottom:12px;">
                      <input type="text" class="form-control" name="comment" placeholder="Comment">
                      </div>
                    </div>
                  </div>
                  <div class="row" style="padding-top: 60px; justify-content: center;">
                    <div class="col-2">
                      <button type="submit" name="addtocart" class="btn btn-success btn-lg btn-block">Add to Cart</button>
                  </div>
            </form>
        </div>

</div>
<!--  -->

	<div class="container mt-5">
							<h3 class="text-md-center" style="padding-top:0px;"> ~ Your Cart ~ </h3>	
							<div class="container mt-5">
              <?php 
                  if (isset($_SESSION['shopping_cart'])) 
                  {

                    // 'item_name' => $or_it, // item name 
                    // 'item_type' => $type_conf, // item type 
                    // 'quantity' => $qty, // quantity
                    // 'comment' => $commentz // comment
                  
                    $cart_nw = $_SESSION['shopping_cart'];
                
                ?>
               <div class="row" style="padding-top:25px;">
                  <div class="col-2"> <h2 class="h5">Item Name </h2></div>
                  <div class="col-2"> <h2 class="h5">Meal  </h2></div>
                  <div class="col-2"> <h2 class="h5">Quantity</h2></div>
                  <div class="col-3"> <h2 class="h5">Comment</h2></div>
                  <div class="col-2"> <h2 class="h5">Price </h2></div>

								</div> 
                  <?php  
                      $total = 0;
                      $minx2 = $_SESSION['view_menuz'];  
                      $rezt_id2 = $minx2['0']["restId"];
                      $menuz_ID2 = $minx2['0']["menuId"]; 
                  
                  foreach($cart_nw as $pit): 

                    $nmz = $pit['item_name'];
                    $tpez = $pit['item_type'];
                    
                    $sql144 = "SELECT * FROM item I WHERE I.restId ='$rezt_id2' AND I.menuId ='$menuz_ID2' AND I.item_name='$nmz' 
                    AND I.item_config = '$tpez'";

                    $result144 = mysqli_query($conn,$sql144);
                    $Price = mysqli_fetch_all($result144,MYSQLI_ASSOC);
                    // var_dump($Price['0']['restId']);


                    
                    ?>
          <div class ="row" style="padding-top:25px;">
                <div class="col-2">
                    <p style="font-size:20px; color:#fff;"><span style="font-size:20px;"></span><?= $pit['item_name'] ?></p>
                </div>
                <div class="col-2">
                  <p style="font-size:20px; color:#fff;"><span style="font-size:20px;"></span> <?= $pit['item_type'];?></p>
                </div>
                <div class="col-2">  
                <p style="font-size:20px; color:#fff;"><span style="font-size:20px;"></span> <?= $pit['quantity'];?></p>
                </div>
                <div class="col-3">  
                <p style="font-size:20px; color:#fff;"><span style="font-size:20px;"></span> <?= $pit['comment'];?></p>
                </div>
                <div class="col-2">  
                <p style="font-size:20px; color:#fff;"><span style="font-size:20px;"></span> <?= $Price['0']['Price'];?></p>
              </div>
            </div>
              <div class= "row" style="padding-top: 60px; justify-content: center;">
                     

              
                    <form method ="post"> 
                    <div class="col-2">
                      <button type="submit" name="Modify_cart" class="btn btn-success btn-lg">Modify</button>
                      </div>
                    </form>
                    <a href="Shopping_cart.php?action=delete_item_cart&itemId=<?php echo $pit['itemId']?>" method ="post">
                        <div class="col-3">
                          <button type="submit" name="addtocart" class="btn-danger">Remove</button>
                         </div>
                       </a>
                  </div>

                  <div class="row"  style="padding-top: 50px;">
                  <!--  -->
                  <?php
                        if(isset($_POST['Modify_cart']))
                        {
                           
                           $_SESSION['tb_mod_itemId'] = $pit['itemId'];
            
                          // print_r($pit["itemId"]);
                          // echo ("I AM HERE BICH");
                          ?>
              <div class="container mt-5">
              <form action="Shopping_cart.php" method ="post">
                  <div class ="row" >

                            <div class ="col-4" >
                              <span span style="font-size:20px;">Choose an Item :</span>
                              <select name="itemz_wt" style="width:150px; position: relative; left:25px;" required="required">
                                      <option value="" disabled selected hidden>Options </option>
                                      <?php
                                        $temp_array = [];
                                        foreach ($magic as &$v) {
                                            if (!isset($temp_array[$v['item_name']]))
                                            $temp_array[$v['item_name']] =& $v;
                                        }
                                        $magic2 = array_values($temp_array);
                                        foreach($magic2 as $wiz):
                                        ?>
                                          <option value="<?php echo $wiz['item_name'];?>"> <?php echo $wiz['item_name']; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>

                            <div class ="col-4" >
                              <span span style="font-size:20px;">Configuration :</span>
                              <select name="itemz_conf" style="width:150px; position: relative; left:25px;" required="required">
                                      <option value="" disabled selected hidden>Small/large etc. </option>
                                      <?php
                                        $temp_array2 = [];
                                        foreach ($magic as &$v2) {
                                            if (!isset($temp_array2[$v2['item_config']]))
                                            $temp_array2[$v2['item_config']] =& $v2;
                                        }
                                        $magic3 = array_values($temp_array2);
                                        foreach($magic3 as $wi2z):
                                        ?>
                                          <option value="<?php echo $wi2z['item_config'];?>"> <?php echo $wi2z['item_config']; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                              </div>
                              <div class="col-2">
                                  <input type="number" class="form-control" name="QTY" placeholder="Qty.." required="required">
                                </div>

                     </div>
                        
                    
                    <div class = "row" style="padding-top:50px;">        
                      <span span style="font-size:20px;">Add a Comment:</span>
                      <div class="col-6" style="bottom:12px;">
                      <input type="text" class="form-control" name="comment" placeholder="Comment">
                    </div>
                        <div class="col-2">
                          <button type="submit" name="Mod_ext_item" class="btn btn-success btn-lg btn-block">Modify</button>
                      </div>
                    </div>
                  </div>
             </form>
        </div>
                        
                            
                        <?php
 
                        }
                      
                    ?>
                    </div>
                        <!--  -->
                  <?php $total = $total + ($pit['quantity'] * $Price['0']['Price'] );  ?>
              <?php endforeach; ?>
          <div class="container mt-5">
            <form action="add_order.php" class="contact-form" method="post">
              <div class= "row" style="padding-top:25px;" >
                  <div class="col-4">
                    <p style="font-size:20px; color:#fff;"><span style="font-size:20px;"></span> Please Choose an Address</p>
                    </div>
                    <div class="col-4">    
                    <select name="sel_address_tbs" style="width:200px;" required="required">
                        <option value="" disabled selected hidden>Please Choose Address ... </option>
                        <?php  foreach($posts2 as $key): ?>
                          <option value="<?php echo $key['address'];?>"> <?php echo $key['address']; ?></option>
                            <?php endforeach; ?>
                        </select>
                      
                </div>

                <div class="col-4">
                  <p style=" color:#fff;" ><span style="font-size:20px;" ></span> Sub -Total <?php echo number_format($total,2); ?>  EGP</p>
                  <?php

                  // calculate net total 

                  $userz = $_SESSION['User'];

                  // $addr = $_POST['sel_address_tbs'];
                  // $prix = $_POST['total_price'];
                  $status = 'Pending';
              
                  $itemid_ = $_SESSION['shopping_cart']['0']['itemId'];
                  $itemname_ = $_SESSION['shopping_cart']['0']['item_name'];
                  $area_IOD = $_SESSION['results_nocu']['0']['area_ID'];
              
              
                  // get Rest id 
                  $sql2 = "SELECT * FROM item I WHERE I.item_name = '$itemname_' AND I.itemId='$itemid_'";
                  $result2 = mysqli_query($conn,$sql2); 
                  $wiz2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
              
                  
                  $rid_ = $wiz2['0']['restId'];

                  // get Area charge in wiz3
                  
                  $sql3 = "SELECT * FROM area A WHERE A.area_ID='$area_IOD'";
                  $result3 = mysqli_query($conn,$sql3); 
                  $wiz3 = mysqli_fetch_all($result3,MYSQLI_ASSOC);
              
                  // get the user table
                  $sql44 = "SELECT * FROM users U WHERE U.username='$userz'";
                  $result44 = mysqli_query($conn,$sql44); 
                  $wiz44 = mysqli_fetch_all($result44,MYSQLI_ASSOC);


                  
                  $disc = $wiz44['0']['discount_code'];
                  if($disc == 0 )
                  {
                      $sql38 = "SELECT * FROM restaurant R WHERE R.restId='$rid_'";
                      $result24 = mysqli_query($conn,$sql38); 
                      $Harry = mysqli_fetch_all($result24,MYSQLI_ASSOC);
                      $disc_new = $Harry['0']['limited_dis'];
                      // echo($disc_new);
                      if ($disc_new == 0)
                      {
                          $disc2 = 0;
                      }
                      else 
                      {
                        $discz = $disc_new/100;
                      $disc2 = $discz;
                      }
                  }
                  else 
                  {

                    $discz = $disc/100;
                    $disc2 = $discz;
                  // $disc2 = 1- (1/$disc);
                  // $disc2 = $disc2 * 100;
                  }
                  $area_name = $wiz3['0']['area_name'];
                  $Area_charge = $wiz3['0']['Charge'];
                  
                  // echo($disc2);
                  // var_dump($disc2);
                  
                  $tax = $total *0.14;
                  $total2 = ($tax + $Area_charge + $total);
                  $dns = $total2*$disc2;
                  $nettotal= $total2 - $dns;
                  // echo("                   ");                  
                  // echo($tax);
                  // echo("                    ");
                  // echo($total);
                  // echo("                  ");
                  // echo($total2);
                  // echo("                     ");
                  // echo($nettotal);
                  // echo("                         ");
                  
                  ?>
                
                <p style=" color:#fff;" ><span style="font-size:20px;" ></span> Taxes <?php echo number_format($tax,2); ?>  EGP</p>
                <p style="color:#fff;" ><span style="font-size:20px;" ></span> Area Charge  <?php echo number_format($Area_charge,2); ?>  EGP</p>
                <p style=" color:#fff;" ><span style="font-size:20px;" ></span> Discount  <?php echo number_format($dns,2); ?>  EGP</p>
                 <p style="font-size:20px; color:#fff;" ><span style="font-size:20px;" ></span> Net -Total <?php echo number_format($nettotal,2); ?>  EGP</p>
                  <input type="hidden" name="total_price" value="<?php echo number_format($nettotal,2);?>" />
                </div>
                <div class="container mt-5">
                      <div class="row" style="padding-top: 60px; justify-content: center;">
                          <div class="col-3">
                            <button type="submit" name="check_out" class="btn btn-secondary btn-lg btn-block">Check Out</button>
                            </div>
                      </div>
                </div>
          
              </div>
            </form>
         </div>
                  <?php }?>
</div>

</div>

<!--  -->
    <?php } ?>

    <!--  -->
              <form action="Order.php" method ="post">
                <div class="row" style="padding-top: 60px; justify-content: center;">
                    <div class="col-2">
                      <button type="submit" name="clear_s" class="btn btn-success btn-lg btn-block">Clear</button>
                      </div>
                  </div>
              </form>
              <!-- < ? php ///var_dump($_SESSION['shopping_cart']);?> -->
</div>
    <?php } ?>
</section>
<!--  -->
                
    </body>
</html>