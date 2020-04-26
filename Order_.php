<?php

session_start();

if(isset($_POST['order_search']))
{
    require ('dbconn.php');
    
    
    if($_POST['cus'] == "no")
    {
        $cu = NULL;
    }
    else
    {
        $cu = $_POST['cus'];
    }

    $area_mod = $_POST['area_mod'];

    // var_dump($rname);
    // var_dump($area_mod);
    // var_dump($cu);

   
        if($cu != NULL)
        {
            $sql ="SELECT * FROM restaurant R WHERE R.rCuisine ='$cu' ";
            $query = mysqli_query($conn,$sql);
            $posts = mysqli_fetch_all($query,MYSQLI_ASSOC);
            if(mysqli_num_rows($query) > 0 && empty($posts))
            {
                header("Location: Order.php?error=Wrng_rest/cuis");
                exit();
                
            }
            else 
            {
                $res_id = $posts['0']['restId'];
                $sql2 = "SELECT * FROM restaurant_branch rb WHERE rb.restId ='$res_id'";
                $query2 = mysqli_query($conn,$sql2);
                $posts2 = mysqli_fetch_all($query2,MYSQLI_ASSOC);
                // var_dump($posts2);

                $_SESSION['results_nocu'] = $posts2;
                header("Location: Order.php?Suc");
            }
        
        }
        else if ($cu == NULL)
        {
            $sql ="SELECT * FROM restaurant_branch R WHERE R.area_name  LIKE '$area_mod' ";
            $query = mysqli_query($conn,$sql);
            $posts = mysqli_fetch_all($query,MYSQLI_ASSOC);
            // var_dump($posts);

            if(mysqli_num_rows($query) > 0 && empty($posts))
            {
                header("Location: Order.php?error=Wrng_rest/cuis");
                exit();
                
            }
            else 
            {
                $_SESSION['results_nocu'] = $posts;
                $_SESSION['Area_ID_REZ'] = $posts['area_ID'];
                header("Location: Order.php?Suc");
            }
        }

}
else if (isset($_POST['Search_menu'])) // show menus 
{
    require ('dbconn.php');
    $reznames = $_POST['restnamez'];

    $sql ="SELECT * FROM restaurant R WHERE R.rest_name ='$reznames' ";
    $query = mysqli_query($conn,$sql);
    $posts = mysqli_fetch_all($query,MYSQLI_ASSOC);
    if(mysqli_num_rows($query) <= 0)
    {
        header("Location: Order.php?error=no_menu");
        exit();
        
    }
    else 
    {
        // var_dump($posts);
        $res_id = $posts['0']['restId'];
        $time = time();
        $timezz = date("H:i A",$time);

        // $sql2 = "SELECT * FROM menu M WHERE M.restId ='$res_id' AND M.start_hrs <= '$timezz' AND M.close_hrs >='$timezz'";
        $sql2 = "SELECT * FROM menu M WHERE M.restId ='$res_id' AND '$timezz' BETWEEN M.start_hrs AND M.close_hrs";
        // var_dump($sql2);
        $query2 = mysqli_query($conn,$sql2);
        $posts2 = mysqli_fetch_all($query2,MYSQLI_ASSOC);
        // var_dump($posts2);

        // var_dump($timezz);

        // $sql44 ="SELECT * FROM menu M WHERE";
        $_SESSION['view_menuz'] = $posts2;
        header("Location: Order.php?done");
    }


}
else if (isset($_POST['view_item']))
{
    require ('dbconn.php');
    $men = $_SESSION['view_menuz'];
    if ($men != NULL)
    {
        $rezID = $men ['0']["restId"];
        $menuID = $men['0']["menuId"];
        // var_dump($menuID);
        // var_dump($rezID);
        // var_dump($men);

        $sql22 = "SELECT * FROM item I WHERE I.restId ='$rezID' AND I.menuId = '$menuID'";
        $query22 = mysqli_query($conn,$sql22);
        $posts22 = mysqli_fetch_all($query22,MYSQLI_ASSOC);

        // var_dump($posts22);
        $_SESSION['view_items_inmenu'] = $posts22;
        header("Location: Order.php?done");

        
    }
    else 
    {

        header("Location: Order.php?error=noactive_menu");
    }


}
else 
{
header("Location: Order.php?error=wrngbtn");
}
