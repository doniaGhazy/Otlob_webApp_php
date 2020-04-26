<?php

session_start();

  if(isset($_POST['mod_code_btn']))
{

    require ('dbconn.php');

    $dcode = $_POST['dcode_2'];
    $val = $_POST['value'];
    // $date = '';
    if(empty($_POST['date_lim2']))
    {
        $sql2= "UPDATE `discount_codes` set `val` = '$val', `used` = 'No', `datelimit` = NULL WHERE `dcode` = '$dcode'"; 
    }
    else 
    {
        $date = $_POST['date_lim2'];
        $sql2= "UPDATE `discount_codes` set `val` = '$val', `used` = 'No', `datelimit` = '$date' WHERE `dcode` = '$dcode'"; 
    }
    
    $sql= "SELECT * FROM `discount_codes` WHERE discount_codes.dcode='$dcode'";
    $query = mysqli_query($conn,$sql);
    $posts = mysqli_fetch_all($query,MYSQLI_ASSOC);
    
//     var_dump($sql);
// }
    if(mysqli_num_rows($query) != 1)
    {
        header("Location: Profile_add.php?error=code_notfound");
        exit();

    }
    else
    {
        
        if(!mysqli_query($conn,$sql2))
            {
                printf("Errormessage: %s\n",mysqli_error($conn));

            }
            else
            {
   
                header("Location: Profile_add.php?code_added=success");
                
            }

    }

}
else 
{
header("Location: Profile_add.php?error=wrngbtn");
}