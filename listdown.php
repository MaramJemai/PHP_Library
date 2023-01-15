<?php
include("index3.php");

if ( empty(session_id()) ) session_start();  
$id = $_SESSION['id'];

require_once("document.php");
 $document = new document ();
 $documents=$document->getByUDown($id);

require_once("department.php");
$dep=new department();
require_once("user.php");
$user=new user();
require_once("download.php");
$download = new download ();
require_once("favorite.php");
$favorite = new favorite ();

 
?>

<!-- End Header -->

  <main id="main" data-aos="fade-in">
  <section id='courses' class='courses'>
    <div class='container' data-aos='fade-up'>

<div class='row' data-aos='zoom-in' data-aos-delay='100' style='padding-left:190px;padding-top:40px'>
<h3>MY DOWNLOADS</h3>

   
    
  <?php

foreach ($documents as $row) {  
    $depart=$dep->getBy($row[7]);
   
    $users=$user->getBy($row[1]);
    
    $downloads=$download->getByD($row[0]);
    $nbr1=count($downloads);
   
    $favorites=$favorite->getByD($row[0]);
    $nbr2=count($favorites);

    $NewString=""; 
    $StringTab=explode(" ",$row[3]);  
    $long=count($StringTab);
    if($long<8){
      $NewString=$row[3];
    }
    else{
    for($i=1;$i<8;$i++){
      $NewString.=" "."$StringTab[$i]";   
    }
    $NewString.=" ...";   
    }
 
    echo"
    <div class='col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0   '>
            <div class='course-item'>
              <img src='assets/img/course-1.jpg' class='img-fluid' alt='...'>
              <div class='course-content'>
                <div class='d-flex justify-content-between align-items-center mb-3'>
                  <h4 style='max-width:100px'> $depart[1] </h4>
                  <p class='price'>level $row[9]</p>
                </div>

                <h3><a href='course_details.php?dd=$row[0].php'>$row[2]</a></h3>
                <p >$NewString</p>
                <div class='trainer d-flex justify-content-between align-items-center'>
                  <div class='trainer-profile d-flex align-items-center'>
                    <img src='images/$users[6]' class='img-fluid' alt=''>
                    <span>$users[1] $users[2]</span>
                  </div>
                  <div class='trainer-rank d-flex align-items-center'>
                  <a href= '' class='bouton2'>
                  <i class='bx bx-download'></i>&nbsp;$nbr1 </a>
                    &nbsp;&nbsp;
                    
                  </div>
                </div>
              </div>
            </div>
            </div>
          <!-- End Course Item-->

        ";
}
?>
</div>
 
</div>
</section>
  </main><!-- End #main -->

  <div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>