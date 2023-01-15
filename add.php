<?php
$result = true;
if (empty($_POST['email']) ||empty($_POST['passwd'])||empty($_POST['cpasswd'])) {
  $result = false;
}
if ($result) {
    $vfirst = $_POST["first"];
    $vlast = $_POST['last'];
    $vdepartement = $_POST['departement'];
    $vemail = $_POST['email'];
    $vpasswd = $_POST['passwd'];
    $vcpasswd = $_POST['cpasswd'];
    $vrole = $_POST['role'];
    $vimg = "image/profil1.png";
    $vverified = "unverified";

    require_once("user.php");
    $user = new user();
    
    $user->setfirst_name($vfirst);
    $user->setlast_name($vlast);
    $user->setdepartement($vdepartement);
    $user->setemail($vemail);
    $user->setimage($vimg);
    $user->setrole($vrole);
    $user->setverified($vverified);

    if($vcpasswd==$vpasswd)
    {   $user->setpasswrd($vpasswd);}

    $retour=$user->ajouter();
    if($retour==1)
    header("Location:signin.php?retour=$retour");
    else{
        echo "<script>
      window.location.href = 'signup.php';
      alert('email dupliqué');
</script>";
    }
}

else {
    echo "<script>
      window.location.href = 'signup.php';
      alert('champ invalid');
</script>";
 }
    
?>