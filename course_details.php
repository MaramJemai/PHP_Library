<?php

include("index3.php");

$id = $_REQUEST['dd'];

require_once("document.php");
 $document = new document ();
 $thisDocument=$document->getBy($id);

 require_once("user.php");
 $user = new user ();
 $thisUser=$user->getBy($thisDocument[1]);

 require_once("department.php");
 $department = new department ();
 $thisdepartment=$department->getBy($thisDocument[7]);

 require_once("subject.php");
 $subject = new subject ();
 $thissubject=$subject->getBy($thisDocument[8]);


 ?>
  <main id="main" data-aos="fade-in">
  <section id='courses' class='courses'>
    <div class='container' data-aos='fade-up'>
<div class='row' data-aos='zoom-in' data-aos-delay='100' style='padding-left:190px;padding-top:40px'>   
    <?php
          //<a href='delDoc.php?dd=$id[0]'><i class='fa fa-trash' style='font-size:30px;color:red'></i></a>

      echo "
    <section id='course-details' class='course-details'>

      <div class='container' data-aos='fade-up'>
      <div style='float: right;'>
      <button onclick='myFunction()'><i class='fa fa-trash' style='font-size:30px;color:red'></i></button>
    </div>
        <div class='row'>
          <div class='col-lg-8'>
            <img src='assets/img/course-details.jpg' class='img-fluid' alt=''>
            <h3>DESCRIPTION</h3>
          </div>
          <div class='col-lg-4'>

            <div class='course-info d-flex justify-content-between align-items-center'>
              <h5>Title</h5>
              <p><a href='#'>$thisDocument[2]</a></p>
            </div>

            <div class='course-info d-flex justify-content-between align-items-center'>
              <h5>Owner</h5>
              <p>$thisUser[1] $thisUser[2]</p>
            </div>

            <div class='course-info d-flex justify-content-between align-items-center'>
              <h5>Department</h5>
              <p>$thisdepartment[1]</p>
            </div>

            <div class='course-info d-flex justify-content-between align-items-center'>
              <h5>Subject</h5>
              <p>$thissubject[1]</p>
            </div>

            <div class='course-info d-flex justify-content-between align-items-center'>
              <h5>Level</h5>
              <p>$thisDocument[9]</p>
            </div>

            <div class='course-info d-flex justify-content-between align-items-center'>
              <h5>Date</h5>
              <p>$thisDocument[4]</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id='cource-details-tabs' class='cource-details-tabs'>
      <div class='container' data-aos='fade-up'>
          <div class='col-lg-9 mt-4 mt-lg-0'>
            <div class='tab-content'>
              <p class='fst-italic'>$thisDocument[3]</p>
            </div>
          </div>
        </div>

      </div>";    ?>
        </div>
    </section>
  </main>
  
  <div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<?php echo"
<script>
function myFunction() {
  var id = $id;
  if (confirm('Are your sure to delete this document')) {
    window.location.href = 'delDoc.php?dd='+id;
  } else {
    window.location.href = '#';
  }
}
</script>";
?>
<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>