<?php
include("index3.php");
if ( empty(session_id()) ) session_start();
$id=$_SESSION["id"];
require_once("user.php");
$user = new user ();
require_once("document.php");
$document = new document ();
$documents0=$document->getAll();
$nbr0=count($documents0);
$documents=$document->getByU($id);
$nbr1=count($documents);
require_once("favorite.php");
$favorite = new favorite ();
$favorites=$favorite->getByU($id);
$nbr2=count($favorites);
require_once("download.php");
$download = new download ();
$downloads=$download->getByU($id);
$nbr3=count($downloads);
?>

<body>
<?php

    echo "
  <div id='right-panel' class='right-panel'>
        
        <!-- Content -->
        <div class='content'>
            <!-- Animated -->
            <div class='animated fadeIn'>
                <!-- Widgets  -->
                
                 
                 <div class='row'>
                    <div class='col-lg-3 col-md-6'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='stat-widget-five'>
                                    <div class='stat-icon dib flat-color-1'>
                                        <i class='pe-7s-photo-gallery'></i>
                                    </div>
                                    <div class='stat-content'>
                                        <div class='text-left dib'>
                                            <div class='stat-text'><span class='count'>$nbr0</span></div>
                                            <div class='stat-heading'>Courses</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='col-lg-3 col-md-6'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='stat-widget-five'>
                                    <div class='stat-icon dib flat-color-2'>
                                        <i class='pe-7s-file'></i>
                                    </div>
                                    <div class='stat-content'>
                                        <div class='text-left dib'>
                                            <div class='stat-text'><span class='count'>$nbr1</span></div>
                                            <div class='stat-heading'>Uploads</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='col-lg-3 col-md-6'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='stat-widget-five'>
                                    <div class='stat-icon dib flat-color-4'>
                                        <i class='pe-7s-like'></i>
                                    </div>
                                    <div class='stat-content'>
                                        <div class='text-left dib'>
                                            <div class='stat-text'><span class='count'>$nbr2</span></div>
                                            <div class='stat-heading'>Favorite</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='col-lg-3 col-md-6'>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='stat-widget-five'>
                                    <div class='stat-icon dib flat-color-3'>
                                        <i class='pe-7s-download'></i>
                                    </div>
                                    <div class='stat-content'>
                                        <div class='text-left dib'>
                                            <div class='stat-text'><span class='count'>$nbr3</span></div>
                                            <div class='stat-heading'>Download</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 

                <!-- /Widgets -->
                 
               
            </div>
            <!-- .animated -->

        </div>
        
        ";
  ?>
  
    

