<?php
    require_once("user.php");
    $user = new user ();
    $id=$_REQUEST['dd'];
    $r=$user->modif($id);
    if($r)
    {
        header("location:listUserToVerif.php");
    }
   
    else
    {
        echo "erreur de modification";
    } 
        
   
?>