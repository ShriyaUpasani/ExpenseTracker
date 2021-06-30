<?php
session_start();
include('includes/dbconnection.php');

    $email=$_POST['userid'];
    $password=md5($_POST['pswrd']);
    $sql = "SELECT `ID` FROM `tbluser` WHERE Email='$email' && Password='$password'";
     $result = mysqli_query($con, $sql);
    $ret=mysqli_fetch_array($result);
    if($ret>0){
      $_SESSION['detsuid']=$ret['ID'];
      $str = $_SESSION['detsuid'];
      // echo "something: $str";
      header('Refresh: 2; URL= dashboard.php');
    }
    else{
    $msg="Invalid Details.";
    echo "$msg";
    header('Refresh: 5; URL= index.php');
    }
?>
