<?php
session_start();
$id=$_SESSION["id"];
include("connexion.php");
require_once("user.php");
$user=new user();
$id=$_REQUEST['dd'];  
$user0=$user->getBy($id);
    
    $first= $_POST['first'];
    $last= $_POST['last'];
    $email= $_POST['email'];
    if($_FILES['image']['name']!="")
    {
        $image= "image/".$_FILES['image']['name'];
        $user->setimage($image);
    }
    else{
        $user->setimage($user0[6]);
    }
    if($_POST['old']!="******"){
        if($_POST['old']==$user0[7])
        {
            $new= $_POST['new'];
            $user->setpasswrd($new);
        }
        else{
            $user->setpasswrd($user0[7]);
        }
    }
    else {
        $user->setpasswrd($user0[7]);
    }
    $user->setfirstname($first);
    $user->setlastname($last);
    $user->setemail($email);
    
    $r=$user->edit($id);
    if($r){
        header("location:profile.php?dd=$id");}
    else{           
        header("location:settings.php?dd=$id&f=1");
    }
?>