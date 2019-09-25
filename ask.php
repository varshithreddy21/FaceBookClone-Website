<?php
include('include/connect.php');
session_start();
$user_email=$_SESSION['user_email'];

    $get_user="select * from users where user_email='$user_email'";
    $run=mysqli_query($con,$get_user);
    $row=mysqli_fetch_array($run);
    $user_id=$row['user_id'];

    if(isset($_GET['u_id'])){
        $uid=$_GET['u_id'];
    }
   if($uid===$user_id){
      echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
       exit;
   }else{
    echo "<script>window.open('user_profile.php?u_id=$uid','_self')</script>";
    exit;
   }







?>