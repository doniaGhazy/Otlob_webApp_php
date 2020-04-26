<?php

session_start();

  if(isset($_POST['Login-submit']))
{

    require ('dbconn.php');
    // data from the website
    $username = $_POST['User'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE username LIKE'$username'";
    $result = mysqli_query($conn,$sql);
    $posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // var_dump($posts);

    if(true)
    // if ($posts['0']["username"] == $username )
    {
        if($posts['0']["password"] == $password)
        {
            header("Location: welcome2.php?login=success");

            $_SESSION['User'] = $posts['0']["username"];
            $_SESSION['uType'] = $posts['0']["Type_U"];
            $_SESSION['results_nocu'] = '';
            $_SESSION['view_menuz'] ='';
            $_SESSION['view_items_inmenu']='';
            // $_SESSION['shopping_cart']='';
        }
        else 
        {
            header("Location: Login.php?login=failed");
            exit();
        }  
    }
    else 
        {
            header("Location: Login.php?login=failed");
            exit();
        }  
    // mysqli_free_result($result);
    // mysqli_close($conn);
}
else 
{
header("Location: Login.php?error=nodata");
}