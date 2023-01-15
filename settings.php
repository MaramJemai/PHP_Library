<?php
include("index3.php");
if ( empty(session_id()) ) session_start();
$id=$_SESSION["id"];

require_once("user.php");
$user = new user ();
$u=$user->getBy($id);

$con = mysqli_connect('127.0.0.1:3306','root','','library') or die('Unable To connect');
$dep = "SELECT * FROM department";
$sub = "SELECT * FROM subject";

?>
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
  
<?php

    echo "

    <div class='col-lg-10' style='padding-left:390px;padding-top:40px'>
    <div class='card'>
    <br>
        <div class='card-header'>
            <strong>SETTINGS</strong> 
        </div>
        <div class='card-body card-block'>
            <form action='settingsAction.php?dd=$id' method='post' enctype='multipart/form-data' class='form-horizontal'>

                <div class='row form-group'>
                    <div class='col col-md-3'><label for='title' class=' form-control-label'>First Name</label></div>
                    <div class='col-12 col-md-9'><input type='text' id='first' name='first' value='$u[2]' class='form-control'></div>
                </div>
                <div class='row form-group'>
                    <div class='col col-md-3'><label for='title' class=' form-control-label'>Last Name</label></div>
                    <div class='col-12 col-md-9'><input type='text' id='last' name='last' value='$u[1]' class='form-control'></div>
                </div>
                <div class='row form-group'>
                    <div class='col col-md-3'><label for='title' class=' form-control-label'>Email</label></div>
                    <div class='col-12 col-md-9'><input type='text' id='email' name='email' value='$u[3]' disabled class='form-control'></div>
                </div>

                <div class='row form-group'>
                    <div class='col col-md-3'><label for='image' class=' form-control-label'>Image</label></div>
                    <div class='col-12 col-md-9'><input type='file' id='image' name='image' value='$u[6]' accept='.jpg, .jpeg, .png' class='form-control-file'></div>
                </div>

                <div class='row form-group'>
                    <div class='col col-md-3'><label for='title' class=' form-control-label'>Old Password</label></div>
                    <div class='col-12 col-md-9'><input type='text' id='old' name='old' value='******' class='form-control'></div>";
                   if($_REQUEST['f']==1) {
                    echo "<div class='error'>old password untrue</div>";}

               echo" </div>

                <div class='row form-group'>
                    <div class='col col-md-3'><label for='title' class=' form-control-label'>New Password</label></div>
                    <div class='col-12 col-md-9'><input type='text' id='new' name='new' value='' class='form-control'></div>
                </div>

                
                <div  style='padding-left:220px;padding-top:20px'>
            <button type='submit' class='btn btn-success btn-sm'>UPDATE</button>
            <button type='reset' class='btn btn-danger btn-sm'>RESET</button>
                </div></div>
                    
            </form>
            
        <div class='card-footer'>
            
        </div>
    </div>
    



  
</div>     ";
     

                        if(isset($_REQUEST['retour']))
                        {
                          $res=$_REQUEST['retour'];
                          if($res)
                          echo "<center><b><span style='color:green'>ajout avec succés</span></b></center>";
                          else
                          echo "<center><b><span style='color:red'>erreur d'insertion</span></b></center>";
                        }
     
     ?> 
  
   

  <script>
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>

    <!-- ======= Breadcrumbs ======= -->
    
 
  <style>
.error {
			margin: 10px 0px;
			padding: 0px 0px 0px 250px;
			color: #D8000C;
		}
	  </style>

