<?php
include("index.php");
//session_start();
$vidu = $_SESSION['id'];
?>

<!-- End Header -->

  <main id="main" data-aos="fade-in">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <h2>Courses</h2>
        <p> This Digital Biblio of ISET
         will give a priority to Find and Download any document </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Courses Section ======= -->
    <section id='courses' class='courses'>
    <div class='container' data-aos='fade-up'>

<div class='row' data-aos='zoom-in' data-aos-delay='100'>
    <?php
require_once("document.php");
 $document = new document ();
 $documents=$document->getAll();

require_once("department.php");
$dep=new department();
require_once("user.php");
$user=new user();
require_once("download.php");
$download = new download ();
require_once("favorite.php");
$favorite = new favorite ();

 foreach ($documents as $row) {  
 $depart=$dep->getBy($row[7]);

 $users=$user->getBy($row[1]);
 
 $downloads=$download->getByD($row[0]);
 $nbr1=count($downloads);

 $favorites=$favorite->getByD($row[0]);
 $nbr2=count($favorites);
    echo "
    <div class='col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0'>
            <div class='course-item'>
              <img src='assets/img/course-1.jpg' class='img-fluid' alt='...'>
              <div class='course-content'>
                <div class='d-flex justify-content-between align-items-center mb-3'>
                  <h4> $depart[1] </h4>
                  <p class='price'>level $row[9]</p>
                </div>

                <h3><a href='course_details.php?dd=$row[0].php'>$row[2]</a></h3>
                <p>$row[3]</p>
                <div class='trainer d-flex justify-content-between align-items-center'>
                  <div class='trainer-profile d-flex align-items-center'>
                    <img src='images/$users[6]' class='img-fluid' alt=''>
                    <span>$users[1] $users[2]</span>
                  </div>
                  <div class='trainer-rank d-flex align-items-center'>
                  <a href= '' class='bouton2'>
                  <i class='bx bx-download'></i>&nbsp;$nbr1 </a>
                    &nbsp;&nbsp;
                    <a href='' class='bouton2'>
                    <i class='bx bx-heart'></i>&nbsp;$nbr2</a>
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

  <?php
include("footer.php");
?>
  