<?php

session_start();

  if(isset($_POST['Add_menu_button'])) // add menu
{

    require ('dbconn.php');

   $rest_id = $_POST['Rid_t'];
   $menuid = $_POST['menuId'];
   $type = $_POST['hrs_mod'];
   $start = $_POST['start_hrs'];
   $end = $_POST['close_hrs'];

        
    $sql= "SELECT * FROM `menu` WHERE menu.restId='$rest_id' AND menu.menuId = '$menuid'";
    $query = mysqli_query($conn,$sql);
    $posts = mysqli_fetch_all($query,MYSQLI_ASSOC);
 
    if(mysqli_num_rows($query) > 0 )
    {
        header("Location: Profile_add.php?error=menu_added");
        exit();

    }
    else
    {
      
        $sql2 = "INSERT INTO `menu`(`restId`, `menuId`, `menutype`, `start_hrs`, `close_hrs`) 
                    VALUES ('".$rest_id."','".$menuid."','".$type."','".$start."','".$end."')";
        if(!mysqli_query($conn,$sql2))
            {
                printf("Errormessage: %s\n",mysqli_error($conn));

            }
            else
            {
               
                header("Location: Profile_add.php?menu_added=success");
                
            }

    }

}
else if (isset($_POST['mod_menu_button'])) // modify menu
{

    require ('dbconn.php');

   $rest_id = $_POST['Rid_t'];
   $menuid = $_POST['menuId'];
   $type = $_POST['hrs_mod'];
   $start = $_POST['start_hrs'];
   $end = $_POST['close_hrs'];

        
    $sql= "SELECT * FROM `menu` WHERE menu.restId='$rest_id' AND menu.menuId = '$menuid'";
    $query = mysqli_query($conn,$sql);
    $posts = mysqli_fetch_all($query,MYSQLI_ASSOC);
 
    if(mysqli_num_rows($query) != 1 )
    {
        header("Location: Profile_add.php?error=menu_notfound");
        exit();

    }
    else
    {
         
        $sql2 = "UPDATE `menu` SET `menutype`= '$type', `start_hrs`='$start', `close_hrs`= '$end'WHERE menu.restId='$rest_id' AND menu.menuId = '$menuid'";
        if(!mysqli_query($conn,$sql2))
            {
                printf("Errormessage: %s\n",mysqli_error($conn));

            }
            else
            {
               
                header("Location: Profile_add.php?menu_mod=success");
                
            }

    }

}
else if (isset($_POST['del_menu_button'])) // del menu
{
    require ('dbconn.php');

   $rest_id = $_POST['Rid_t'];
   $menuid = $_POST['menuId'];
   

        
    $sql= "SELECT * FROM `menu` WHERE menu.restId='$rest_id' AND menu.menuId = '$menuid'";
    $query = mysqli_query($conn,$sql);
    $posts = mysqli_fetch_all($query,MYSQLI_ASSOC);

    if(mysqli_num_rows($query) != 1 )
    {
        header("Location: Profile_add.php?error=menu_notfound");
        exit();

    }
    else
    {
       
        $sql2 = "DELETE FROM `menu` WHERE menu.restId='$rest_id' AND menu.menuId = '$menuid'";
        if(!mysqli_query($conn,$sql2))
            {
                printf("Errormessage: %s\n",mysqli_error($conn));

            }
            else
            {
               
                header("Location: Profile_add.php?menu_del=success");
                
            }

    }
}
else 
{
header("Location: Profile_add.php?error=wrngbtn");
}