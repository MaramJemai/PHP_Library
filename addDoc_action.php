<?php

session_start();
$result = true;
if (empty($_POST['title'])||empty("documents/".$_FILES['doc']['name'])||empty($_POST['department'])||empty($_POST['level'])) {
  $result = false;
}


if ($result) {
    $vidu =  $_SESSION["id"];
    $vtitle =  $_POST["title"];
    $vdescription = $_POST['description'];
    date_default_timezone_set('Africa/Tunis');
    $vdate =date('Y-m-d');
    $vimg = "image/".$_FILES['image']['name'];
    $vdoc = "documents/".$_FILES['doc']['name'];
    $vsubject = $_POST['subject'];
    $vdepartment = $_POST['department'];
    $vlevel = $_POST['level'];
    $vverified = "unverified";
    $vdeleted = "not deleted";

    require_once("document.php");
    $document = new document();
    $document->setidu("$vidu");
    $document->settitle("$vtitle");
    $document->setdescription("$vdescription");
    $document->setdate("$vdate");
    $document->setimage("$vimg");
    $document->setdoc("$vdoc");
    $document->setsubject("$vsubject");
    $document->setdepartment("$vdepartment");
    $document->setlevel("$vlevel");
    $document->setverified($vverified);
    $document->setdeleted($vdeleted);

    $retour = $document->add();

    if ($retour==1){
      header("location:dashboard.php?retour=$retour");  
      echo '<script>alert("Send Courses !!" );
    window.location.href = "listMy.php";</script>';
    }
    else{
      echo "<script>
  window.location.href = 'addDoc.php';
  alert('failed to add this document');
</script>";
      //echo "<script type='text/javascript'>alert('title dupliqué');</script>";
    }
       
}
?>

