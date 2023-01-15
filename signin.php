<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('127.0.0.1:3306','root','','library') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM user WHERE email='" . $_POST["email"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["first_name"] = $row['first_name'];
        $_SESSION["last_name"] = $row['last_name'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["departement"] = $row['departement'];
        $_SESSION["role"] = $row['role'];
		$_SESSION["image"] = $row['image'];
		$_SESSION["verified"] = $row['verified'];
		if( $_SESSION["verified"]=="verified" ) {
			header("Location:dashboard.php");
		}
		else if($_SESSION["verified"]!="verified")
			 {
				echo "<script type='text/javascript'>alert('Unverified account !');</script>";
			//echo 'Unverified account !';	 
		}
        } else {
			echo "<script type='text/javascript'>alert('Invalid Email or Password !');</script>";
        }
    }
?>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="email" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password">
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
					<div   class="form-group">
						<a href="home.php" class="btn float-right login_btn">Last</a>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="signup.php">Sign Up</a>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
@import url('https://fonts.googleapis.com/css?family=Numans');
html,body{
background-image: url('images/bg3.png');
background-size: contain;
background-repeat: no-repeat;
position: relative;
height: 1000px;
width: 1519px;
font-family: 'Numans', sans-serif;
}
.container{
height: 85%;
align-content: center;
}
.card{
height: 370px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}
.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}
.social_icon span:hover{
color: white;
cursor: pointer;
}
.card-header h3{
color: white;
}
.social_icon{
position: absolute;
right: 20px;
top: -45px;
}
.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}
input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;
}
.remember{
color: white;
}
.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}
.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}
.login_btn:hover{
color: black;
background-color: white;
}
.links{
color: white;
}
.links a{
margin-left: 4px;
}
</style>
</body>
</html>