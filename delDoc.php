<?php
session_start();
$idDoc=$_REQUEST['dd'];
$idU =  $_SESSION["id"];
require_once("document.php");
$document=new document();
require_once("favorite.php");
$favorite=new favorite();
if(true){
$r=$document->delete($idDoc);
if($r)
header("location:listMy.php");
else
echo "Delete Eroor";
}

?>