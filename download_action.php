<?php
$id=$_REQUEST['id'];  
$iddoc=$_REQUEST['dd']; 
$vdate =date('d-m-y');
include("connexion.php");
require_once("download.php");
$download=new download();
$r=$download->getbyUD($id,$iddoc);
$nb=count($r);
if($nb==0)
{
$download->setid_user($id);
$download->setid_doc($iddoc);
$download->setdate($vdate);
$retour=$download->add();

}


    if(!empty($_GET['file'])){

        $filename = basename($_GET['file']);
        $filepath = 'documents/' . $filename;
        if(!empty($filename) && file_exists($filepath)){
            header("Cache-Control: public");
            header("Content-Description:  File transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/zip");
            header("Content-Transfer-Emcoding: binary");
            readfile($filepath);

            exit;

        }
        else
        {
            echo "N'existe pas !";
        }
    }
?>