<?php
$sName="localhost";
$uName="root";
$pass="";
$db_name="todolist";


    $conn=new PDO("mysql:host=$sName;db_name=$db_name",$uName,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   // echo "connected";

?>