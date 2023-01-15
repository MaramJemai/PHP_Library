<?php
include("index.php");
?>

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-content-center align-items-center">
  <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
    <h1>Learning Today,<br>Leading Tomorrow</h1>
    <h2>In our website you can find evrey book you may need to be a leader</h2>
    <a href="courses.html" class="btn-get-started">Get Started</a>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
          <h3>
            The library is accessible to all ISET students and teachers. Anyone with administrative authorization or a student card has the right to all library services.</h3>
          <p class="fst-italic">


            The library has a large reading area available to ISET researchers and readers. We can undertake:
          </p>
          <ul>
            <li><i class="bi bi-check-circle"></i> Consultation of paper or electronic documents.</li>
            <li><i class="bi bi-check-circle"></i> Meetings between students and teachers</li>
            <li><i class="bi bi-check-circle"></i> Modern library that takes the global measure</li>
          </ul>
          <p>
            The library of our ISET is equipped with a rich and varied documentary volume. It provides students with several services
          </p>

        </div>
      </div>

    </div>
  </section><!-- End About Section -->

  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts section-bg">
    <div class="container">

      <div class="row counters">

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="1596" data-purecounter-duration="1" class="purecounter"></span>
          <p>Students</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <?php
          require_once("document.php");
          $document = new document();
          $documents = $document->getAll();
          $nbr = count($documents);
          ?>
          <span data-purecounter-start="0" data-purecounter-end=$nbr data-purecounter-duration="1" class="purecounter"></span>
          <p>Courses</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
          <p>Events</p>
        </div>

        <div class="col-lg-3 col-6 text-center">
          <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
          <p>Trainers</p>
        </div>

      </div>

    </div>
  </section><!-- End Counts Section -->

  <!-- ======= Why Us Section ======= -->
  <section id="why-us" class="why-us">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
          <div class="content">
            <h3>Why choose our library </h3>
            <p>
              it has a rich and varied documentary background through books and professional academic periodicals covering several disciplines.
            </p>
            <div class="text-center">
              <a href="about.html" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-boxes d-flex flex-column justify-content-center">
            <div class="row">
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-receipt"></i>
                  <h4>Business Administration</h4>
                  <p>the economics and management department offers an applied degree in business administration.</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Computer Technologie</h4>
                  <p>Development of Information Systems, Computer Networks and Services, Multimedia and Web Development, Embedded and Mobile Systems</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-images"></i>
                  <h4>Electric</h4>
                  <p> Industrial Electronics,Industrial Electricity,Maintenance of Electrical Systems,Maintenance of Electrical Systems</p>
                </div>
              </div>
              <div class="col-xl-4 d-flex align-items-stretch">
                <div class="icon-box mt-4 mt-xl-0">
                  <i class="bx bx-images"></i>
                  <h4>mechanics</h4>
                  <p>Industrial maintenance,Plastics (PL),Construction and mechanical manifacturing</p>
                </div>
              </div>
            </div>
          </div><!-- End .content-->
        </div>
      </div>

    </div>
  </section><!-- End Why Us Section -->


  <!-- ======= Popular Courses Section ======= -->
  <section id='courses' class='courses'>
    <div class='container' data-aos='fade-up'>

      <div class='row' data-aos='zoom-in' data-aos-delay='100'>
        <?php
        require_once("document.php");
        $document = new document();
        $documents = $document->getAll();
        $nbr = count($documents);

        require_once("department.php");
        $dep = new department();
        require_once("user.php");
        $user = new user();
        require_once("download.php");
        $download = new download();
        require_once("favorite.php");
        $favorite = new favorite();

        foreach ($documents as $row) {
          $depart = $dep->getBy($row[7]);

          $users = $user->getBy($row[1]);

          $downloads = $download->getByD($row[0]);
          $nbr1 = count($downloads);

          $favorites = $favorite->getByD($row[0]);
          $nbr2 = count($favorites);
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