<?php
session_start();
$vid_doc = $_REQUEST['dd'];
$vid_user = $_SESSION['id'];

require_once("favorite.php");
$favori = new favorite();
$conn=mysqli_connect("127.0.0.1", "root", "", "library");
$select = mysqli_query($conn, "SELECT * FROM favorite WHERE id_doc = $vid_doc and id_user = $vid_user ");

    if(mysqli_num_rows($select))
    {
        $retour=$favori->delete($vid_user,$vid_doc);
    }
    else 
    {
        $favori->setid_user($vid_user);
        $favori->setid_doc($vid_doc);
        $retour=$favori->add();
        
    }
    header("location:listFav.php");

?>