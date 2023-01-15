<?php
    require_once("document.php");
    $document = new document ();
    $id=$_REQUEST['dd'];
    $r=$document->modif($id);
    if($r)
    {
        header("location:listCourseToVerif.php");
    }
   
    else
    {
        echo "erreur de modification";
    } 
        
   
?>