

<?php
include("index3.php");


require_once("department.php");
$department=new department();


require_once("user.php");
$user=new user();
$users=$user->getAllDesc();
$nbr=count($users);
 


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
                                <strong class='card-title'>Accounts Verif</strong>
                            </div>
                            <div class='table-stats order-table ov-h'>
                                <table class='table '>
                                    <thead>
                                        <tr>
                                            <th class='serial'>Id</th>
                                            <th class='avatar'>Image</th>
                                            <th>Last Name</th>
                                            <th>First Name</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Role</th>
                                            <th>Verif</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                                    foreach ($users as $row) { 
                                        $dep=$department->getBy($row[4]);
                                     
echo"
                                        <tr>
                                            <td class='serial'>$row[0].</td>
                                            <td class='avatar'>
                                                <div class='round-img'>
                                                   <img class='rounded-circle' src='image/$row[6]' alt=''>
                                                </div>
                                            </td>
                                            <td> $row[1]</td>
                                            <td>  <span class='name'>$row[2]</span> </td>
                                            <td> <span class='name'>$row[3]</span> </td>
                                            <td><span class='name'>$dep[1]</span></td>
                                            <td><span class='name'>$row[5]</span></td>
                                            <td>
  <a href='modifuser.php?dd=$row[0]'> <span class='badge badge-complete'>$row[8]</span> </a>
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


<script>
const button = document.querySelector('input');

button.addEventListener('click', disableButton);

function disableButton() {
  button.disabled = true;
  button.value = 'verified';
  setTimeout(() => {
    button.disabled = false;
    button.value = 'unverified';
  }, 4000);
}


</script>

</body>
