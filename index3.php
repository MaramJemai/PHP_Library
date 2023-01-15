<?php
include("index2.php");
ini_set('session.gc_maxlifetime', 1000);
ini_set('session.cookie_lifetime', 1000);
//session_set_cookie_params();
session_start();
$name=session_name();
if(isset($_COOKIE[$name])){
    setcookie($name,$_COOKIE[$name],time() + 1000,'/');

    echo "session is created for $name";

    if($_SESSION["id"]!=0){
        $id=$_SESSION["id"];
        if($_SESSION["role"]=="admin")
            include("sidebar_admin.php");
        else if($_SESSION["role"]=="professor")
            include("sidebar_resp.php");
        else
            include("sidebar.php");
        }
        
}
else 
echo "<script>window.location.href = 'signin.php';alert('You Must Connect');</script>";
/*
*/
?>

    
    

