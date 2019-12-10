<?php
include "config.php";
$uname = mysqli_real_escape_string($con,$_POST['user']);
$password = mysqli_real_escape_string($con,$_POST['password']);


if ($uname != "" && $password != ""){
    $sql = " 
          SELECT type FROM users WHERE (email='$uname' And password='$password' ) ";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_row($result);
    $type= $row[0];
    
    $sql = " 
          SELECT count(*) FROM users WHERE (email='$uname' And password='$password' ) ";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_row($result);
    $count = $row[0];
    if($count > 0 &&$type==0){
        $_SESSION['uname'] = $uname;
        $_SESSION['type'] = "user";
        echo 1;
    }
     if($count > 0 &&$type==1){
        $_SESSION['uname'] = $uname;
        $_SESSION['type'] = "admin";
        echo 2;
    }


}
?>