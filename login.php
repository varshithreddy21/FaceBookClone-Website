<?php
session_start();
include("include/connect.php");
if(isset($_POST['login'])){
    $email=htmlentities(mysqli_real_escape_string($con,$_POST['email']));
    $password=htmlentities(mysqli_real_escape_string($con,$_POST['password']));
    $query="select * from users where user_email='$email'and user_password='$password' and
    status='verfied'";
    $users=mysqli_query($con,$query);
    $fetch=mysqli_fetch_array($users);
    $user_id=$fetch['user_id'];
    if(mysqli_num_rows($users)>0){
    
        $_SESSION['user_email']=$email;
    echo "<script> window.open('home.php?u_id=$user_id','_self');exit;</script>";
    }else{
        echo "<script> alert('incorect password or email..!');
        window.open('index.php');
        exit;
        </script>";
    }
}

?>