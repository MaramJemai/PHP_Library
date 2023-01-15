<?php
include("index2.php");
if ( empty(session_id()) ) session_start();
$id=$_SESSION["id"];

require_once("user.php");
$user = new user ();
$u=$user->getBy($id);

$con = mysqli_connect('127.0.0.1:3306','root','','library') or die('Unable To connect');
$dep = "SELECT * FROM department";
$sub = "SELECT * FROM subject";
$listDep = mysqli_query($con,$dep);
$listSub = mysqli_query($con,$sub);

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
    include("sidebar.php");

    ?>
  


    <div class='col-lg-10' style='padding-left:390px;padding-top:40px'>
    <div class='card'>
    <br>
        <div class='card-header'>
            <strong>ADD DOCUMENTS</strong> 
        </div>
        <div class='card-body card-block'>
            <form action='addDoc_action.php' method='post' enctype='multipart/form-data' class='form-horizontal'>

                <div class='row form-group'>
                    <div class='col col-md-3'><label for='title' class=' form-control-label'>Title</label></div>
                    <div class='col-12 col-md-9'><input type='text' id='title' name='title' placeholder='' class='form-control' required="required"></div>
                </div>
                
                <div class='row form-group'>
                    <div class='col col-md-3'><label for='description' class=' form-control-label'>Description</label></div>
                    <div class='col-12 col-md-9'><textarea name='description' id='description' rows='9' placeholder='Content...' class='form-control'></textarea></div>
                </div>

                <div class='row form-group'>
                    <div class='col col-md-3'><label for='image' class=' form-control-label'>Image</label></div>
                    <div class='col-12 col-md-9'><input type='file' id='image' name='image' class='form-control-file' accept=".jpg, .jpeg, .png"></div>
                </div>

                <div class='row form-group'>
                    <div class='col col-md-3'><label for='doc' class=' form-control-label'>Document</label></div>
                    <input type="hidden" name="MAX_FILE_SIZE" value="30000" style="display:none;"/>
                    <div class='col-12 col-md-9'><input type='file' id='doc' name='doc' class='form-control-file' accept=".pdf, .doc" required="required"></div>
                </div>

                <div class='row form-group'>
                    <div class='col col-md-3'><label for='department' class=' form-control-label'>Department</label></div>
                    <div class='col-12 col-md-9'>
                        <select name='department' id='department' class='form-control' required="required">
                            <?php 
                                        while ($row = mysqli_fetch_array($listDep)):; ?>
                                            <option value="<?php echo $row[0];?>">
                                             <?php echo $row[1];?>
                                            </option>
                                        <?php endwhile; ?> 
                        </select>
                    </div>
                </div>

                <div class='row form-group'>
                    <div class='col col-md-3'><label for='subject' class=' form-control-label'>Subject</label></div>
                    <div class='col-12 col-md-9'>
                        <select name='subject' id='subject' class='form-control' required="required">
                            <?php 
                                        while ($row = mysqli_fetch_array($listSub)):; ?>
                                            <option value="<?php echo $row[0];?>">
                                             <?php echo $row[1];?>
                                            </option>
                                        <?php endwhile; ?> 
                        </select>
                    </div>
                </div>
                
                
                <div class='row form-group'>
                    <div class='col col-md-3'><label class=' form-control-label'>Level</label></div>
                    <div class='col col-md-9'>
                        <div class='form-check-inline form-check'>
                            <label for='level1' class='form-check-label '>
                                <input type='radio' id='level1' name='level' value='1' class='form-check-input' checked>One
                            </label>
                            <label for='level2' class='form-check-label '>
                                <input type='radio' id='level2' name='level' value='2' class='form-check-input'>Two
                            </label>
                            <label for='level3' class='form-check-label '>
                                <input type='radio' id='level3' name='level' value='3' class='form-check-input'>Three
                            </label>
                        </div>
                    </div>
                </div>
                
                <div  style='padding-left:220px;padding-top:20px'>
            <button type='submit' class='btn btn-success btn-sm'>ADD</button>
            <button type='reset' class='btn btn-danger btn-sm'>RESET</button>
                </div></div>
                    
            </form>
            
        <div class='card-footer'>
            
        </div>
    </div>
    



  
</div>     
     
<?php 
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
    
 
  

