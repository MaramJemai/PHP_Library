<?php
session_start();
$idU =  $_SESSION["id"];
require_once("favorite.php");
$favorite=new favorite();
$idDoc=$_REQUEST['dd'];
$r=$favorite->delete($idU,$idDoc);
if($r)
    header("location:listFav.php");
else
    echo "Delete Error";
?>