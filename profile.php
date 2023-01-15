    <?php
    include("index3.php");
    $id=$_SESSION["id"];
    $first_name=$_SESSION["first_name"];
    $last_name=$_SESSION["last_name"];
    $departement=$_SESSION["departement"];
    $email=$_SESSION["email"];
    $role=$_SESSION["role"];
    $image=$_SESSION["image"];
    require_once("user.php");
    $user = new user ();
    require_once("department.php");
    $department=new department();
    require_once("document.php");
    $document = new document ();
    require_once("download.php");
    $download = new download ();
    require_once("favorite.php");
    $favorite = new favorite ();
    $u=$user->getBy($id);
    $dep=$department->getBy($departement);

    $documents=$document->getByU($id);
    $nbr1=count($documents);

    $favorites=$favorite->getByU($id);
    $nbr2=count($favorites);

    $downloads=$download->getByU($id);
    $nbr3=count($downloads);
    ?>

    <body>
    <?php


        echo"

        <div id='right-panel' class='right-panel'>
            
            <!-- Content -->
            <div class='content'>
                <!-- Animated -->
                
                <div >
                            <section class='card' >
                                <div class='twt-feed blue-bg' style='background-color:#ffc312'>
                                    <div class='corner-ribon black-ribon' style='background-color:#ffc312'>
                                        <i class='fa fa-color'></i>
                                    </div>
                                    <div class='fa fa-color wtt-mark'style='background-color:#ffc312'></div>

                                    <div class='media'style='background-color:#ffc312'>
                                        <a href='#'>
                                            <img class='align-self-center rounded-circle mr-3' style='width:85px; height:85px;' alt='' src='image/$u[6]'>
                                        </a>
                                        <div class='media-body'style='background-color:#ffc312'>
                                            <h2 class='text-white display-6'>$u[1] $u[2]</h2>
                                            <p class='text-light'></p>
                                        </div>
                                    </div>



                                </div>
                                <div class='weather-category twt-category'>
                                    <ul>
                                        <li class='active'>
                                            <h5>$nbr1</h5>
                                            Couses
                                        </li>
                                        <li>
                                            <h5>$nbr3</h5>
                                            Downloads
                                        </li>
                                        <li>
                                            <h5>$nbr2</h5>
                                            Favorites
                                        </li>
                                    </ul>
                                </div>
                                
                                <ul class='list-group list-group-flush'>
                                        <li class='list-group-item'>
                                        <strong>Email:</strong> &emsp;&emsp;&emsp;&emsp; $u[3]
                                        </li>
                                        <li class='list-group-item'>
                                        <strong>Department: </strong>&emsp; $dep[1]
                                        </li>
                                        
                                    
                                    </ul>

                            </section>
                        </div>         
                </div>
                <!-- .animated -->
            </div>

        ";
    ?>
    </main><!-- End #main -->