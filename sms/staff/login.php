<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $mobnum=$_POST['mobnum'];
    $designation=$_POST['designation'];
    $password=$_POST['password'];
    $sql ="SELECT ID,Designation,Password FROM tblstaff WHERE MobileNumber=:mobnum and Password=:password and Designation=:designation";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':mobnum', $mobnum, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':designation', $designation, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['smsuid']=$result->ID;
$_SESSION['smsfuid']=$result->Password;
$_SESSION['smsbuid']=$result->Designation;
}

$_SESSION['login']=$_POST['mobnum'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!doctype html>
<html lang="en">

<head>
<title>Society Mentainence System || Login</title>

<!-- VENDOR CSS -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/vendor/animate-css/animate.min.css">
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">



</head>

<body class="theme-blue">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="mobile-logo"><a href="dashboard.php"><img src="../assets/images/logo-icon.svg" alt="Mplify"></a></div>
                    <div class="auth-left">
                        <div class="left-top">
                           
                                <span>Society Mgmt System</span>
                         
                        </div>
                        <div class="left-slider">
                            <img src="../assets/images/login/1.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                    <div class="auth-right">
                        
                        <div class="card">
                            <div class="header">
                                <p class="lead">Sign in to start your session</p>
                            </div>
                            <div class="body">
                                <form class="form-auth-small" action="" method="post">
                                    <div class="form-group">
                                        <label for="signin-email" class="control-label sr-only">Mobile Number</label>
                                        <input type="text" class="form-control" placeholder="Mobile Number" required="true" name="mobnum">
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-email" class="control-label sr-only">Designation</label>
                                        <input type="text" class="form-control" placeholder="Designation" required="true" name="designation">
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-email" class="control-label sr-only">Password</label>
                                        <input type="text" class="form-control" placeholder="Password" required="true" name="password">
                                    </div>
                                   
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">LOGIN</button>
                                   <div class="bottom">
                                       <span class="helper-text m-b-10"><i class="fa fa-home"></i> <a href="../index.php">Back Home</a></span>
                                       
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
