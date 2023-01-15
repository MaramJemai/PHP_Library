<?php
include("index3.php"); 
$id = $_SESSION['id'];
require_once("user.php");
$user=new user();
$u=$user->getBy($id);
$d=$u[4];
require_once("document.php");
 $document = new document ();
 $documents=$document->getAllByUnVerified($d);
 $nbr=count($documents);

require_once("department.php");
$dep=new department();

require_once("download.php");
$download = new download ();
require_once("favorite.php");
$favorite = new favorite ();
require_once("subject.php");
 $subject = new subject ();
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

echo"

<div class='content' style='padding-top:100px;padding-left:310px'>
            <div class='animated fadeIn'>
                <div class='row'>
                    <div class='col-lg-12'>
                        <div class='card'>
                            <div class='card-header'>
                                <strong class='card-title'>Courses Verif</strong>
                            </div>
                            <div class='table-stats order-table ov-h'>
                                <table class='table '>
                                    <thead>
                                        <tr>
                                            <th class='serial'>Id</th>
                                            <th class='avatar'>Image</th>
                                            <th>Owner</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>File</th>
                                            <th>Department</th>
                                            <th>Subject</th>
                                            <th>Level</th>
                                            <th>Verif</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                                    foreach ($documents as $row) { 
                                        $depart=$dep->getBy($row[7]);
                                        $sub=$subject->getBy($row[8]);
   
                                        $users=$user->getBy($row[1]);
                                        
                                        $downloads=$download->getByD($row[0]);
                                        $nbr1=count($downloads);
                                       
                                        $favorites=$favorite->getByD($row[0]);
                                        $nbr2=count($favorites);
                                    
                                      $NewString=""; 
                                      $StringTab=explode(" ",$row[3]);  
                                      $long=count($StringTab);
                                      if($long<6){
                                        $NewString=$row[3];
                                      }
                                      else{
                                      for($i=1;$i<6;$i++){
                                        $NewString.=" "."$StringTab[$i]";   
                                      }
                                      $NewString.=" ...";   
                                      }
echo"
                                        <tr>
                                            <td class='serial'>$row[0].</td>
                                            <td class='avatar'>
                                                <div class='round-img'>
                                                    <a href='#'><img class='rounded-circle' src='$row[5].png' alt=''></a>
                                                </div>
                                            </td>
                                            <td> $users[1] $users[2]</td>
                                            <td>  <span class='name'>$row[2]</span> </td>
                                            <td> <span class='name'>$NewString</span> </td>
                                            <td><span class='name'>$row[4]</span></td>
                                            <td><span class='name'><a href= $row[6]>$row[6].pdf</a></span></td>
                                            <td><span class='name'>$depart[1]</span></td>
                                            <td><span class='count'>$sub[1]</span></td>
                                            <td><span class='count'>$row[9]</span></td>
                                            <td>
                                            <a href='modif.php?dd=$row[0]'> <span class='badge badge-complete'>Verifier</span> </a>
                                            </td>
                                        </tr>
";
                                    }
                                    echo"    
                                        
                                    </tbody>
                                </table>
                            </div> <!-- /.table-stats -->
                        </div>
                    </div>
        </div>

";

?>