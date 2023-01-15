<?php
/*
session_start();
if (isset($_SESSION["id"])==false || $_SESSION["id"]==false)
      header("location:home.php");
      
$id=$_SESSION["id"];
$last_name=$_SESSION["last_name"];
$first_name=$_SESSION["first_name"];
$email=$_SESSION["email"];
$department=$_SESSION["department"];
$role=$_SESSION["role"];
*/
/*
include("index.php");
require_once("ressource.php");
require_once("suivis.php");
require_once("favori.php");

$ressource=new ressource();
$les_ressources=$ressource->editAll();
$nbr=count($les_ressources);

$suivis=new suivis();
$les_suivis=$suivis->selectionner_par_u($id);
$nbr1=count($les_suivis);

$favoris=new favori();
$les_favoris=$favoris->selectionner_par_u($id);
$nbr2=count($les_favoris);

$ressourceu=new ressource();
$mes_ressources=$ressourceu->editAllBy($id);
$nbr3=count($mes_ressources);
*/

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tableau de bord</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bootstrap/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bootstrap/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstrap/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        h1 > button {
            padding-top:50px;
            margin-left:800px;
}
     

     .panel-purple > .panel-heading {
    background: #702963; 
    color: white;
    border-color: #702963;
}


.b{
    display : inline-block;
    vertical-align : top; 
    margin-left:50px;
}
        </style>

</head>

<body>


    <div id="page-wrapper">
        
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">role</h1>
                </div>
            </div>
            

            <section class="h-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-image:url('images/bbb.jpg');background-repeat: no-repeat; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
              <img  src="images/user.jpg"
                alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                style="width: 150px; z-index: 1">
                <div class="ms-3" >
                  <h3> <?php echo $last_name.' '.$first_name;?></h3>
                  <a href="parametre.php">
              <button type="button"  class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                style="z-index: 1;margin-top:10px;">
                Edit rolee
              </button></a>
              </div>
            </div>
            
          </div>
          <div class="p-4 text-black" style="background-color: #f8f9fa;">
            <div class="d-flex justify-content-end text-center py-1">
              <div class="b">
                <p class="mb-1 h5"><?php echo $nbr1;?></p>
                <p class="small text-muted mb-0">cours suivi</p>
              </div>
              <div class="b">
                <p class="mb-1 h5"><?php echo $nbr3;?></p>
                <p class="small text-muted mb-0">cours deposée</p>
              </div>
              <div class="b">
                <p class="mb-1 h5"><?php echo $nbr2;?></p>
                <p class="small text-muted mb-0">Favoris</p>
              </div>
            </div>
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <p class="lead fw-normal mb-1" style="margin-top: 20px;">A Propos</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p class="font-italic mb-1"> last_name utilisateur :    <?php echo $last_name;?></p>
                <p class="font-italic mb-1"> Prélast_name:  <?php echo $first_name;?></p>
                <p class="font-italic mb-0">role:    <?php echo $role;?></p>
                <p class="font-italic mb-0">Email : <?php echo $email;?></p>
                <p class="font-italic mb-0">Téléphone <?php echo $department;?></p>

              </div>
            </div>
           
           
          </div>
        </div>
      </div>
    </div>
  </div>
</section>








                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bootstrap/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bootstrap/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bootstrap/vendor/raphael/raphael.min.js"></script>
    <script src="bootstrap/vendor/morrisjs/morris.min.js"></script>
    <script src="bootstrap/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="bootstrap/dist/js/sb-admin-2.js"></script>

</body>

</html>
