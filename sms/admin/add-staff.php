<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

    if(isset($_POST['submit']))
  {

$smsaid=$_SESSION['smsaid'];

$name=$_POST['name'];
$contnum=$_POST['contnum'];
$email=$_POST['email'];
$designation=$_POST['designation'];
$username=$_POST['username'];
$password=$_POST['password'];


$sql="insert into tblstaff(StaffName,MobileNumber,Email,Designation,UserName,Password)values(:name,:contnum,:email,:designation,:username,:password)";
$query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':contnum',$contnum,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':designation',$designation,PDO::PARAM_STR);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);


 $query->execute();

   
    echo '<script>alert("Allotment detail has been added.")</script>';
echo "<script>window.location.href ='add-allotment.php'</script>";
  }
 

?>
<!doctype html>
<html lang="en">

<head>
<title>Society Mentainence System || Allotment Detail</title>

<!-- VENDOR CSS -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/vendor/animate-css/animate.min.css">
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="../assets/vendor/parsleyjs/css/parsley.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/color_skins.css">
<script>
function getblock(val) {
  $.ajax({
type:"POST",
url:"get-block.php",
data:'blockname='+val,
success:function(data){
$("#flatnum").html(data);
}

  });


}</script>
</head>
<body class="theme-blue">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="../assets/images/thumbnail.png" width="48" height="48" alt="Mplify"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay" style="display: none;"></div>

<div id="wrapper">

   <?php include_once('includes/header.php');?>

  <?php include_once('includes/sidebar.php');?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2>Allotment Detail</h2>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="icon-home"></i></a></li> 
                            <li class="breadcrumb-item active">Allotment Detail</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Allotment Detail</h2>
                        </div>
                        <div class="body">
                           
                            <form id="basic-form" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required="true"></div>
                                
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" name="contnum" id="contnum" class="form-control" required="true" maxlength="10" pattern="[0-9]+">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required="true">

                                </div>
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input type="text" name="designation" id="designation" class="form-control" required="true" >
                                </div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="username" id="username" class="form-control" required="true" >
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="password" id="password" class="form-control" required="true" >
                                </div>

                               
                               
                                <br>
                                <button type="submit" class="btn btn-primary" name="submit" id="submit">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
    
</div>

<!-- Javascript -->
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>

<script src="../assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="../assets/vendor/parsleyjs/js/parsley.min.js"></script>
    
<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/bundles/morrisscripts.bundle.js"></script>
<script>
    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
    </script>
</body>
</html>
