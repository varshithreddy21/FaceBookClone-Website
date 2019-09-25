<?php
include("include/connect.php");

    if(isset($_POST['submit'])){
        $first_name=htmlentities(mysqli_real_escape_string($con,$_POST['firstname']));
        $last_name=htmlentities(mysqli_real_escape_string($con,$_POST['lastname']));
        $password=htmlentities(mysqli_real_escape_string($con,$_POST['password']));
        $email=htmlentities(mysqli_real_escape_string($con,$_POST['email']));
        $country=htmlentities(mysqli_real_escape_string($con,$_POST['country']));
        $gender=htmlentities(mysqli_real_escape_string($con,$_POST['gender']));
        $birthday=htmlentities(mysqli_real_escape_string($con,$_POST['birthday']));
        $status="verfied";
        $posts="no";
        $newgid=sprintf('%05d',rand(0,9999999));
        $username=strtolower($first_name."_".$last_name."_".$newgid);
        $check_username="select user_name from users where users_email='$email'";
        $run_username=mysqli_query($con,$check_username);
        if(strlen($password)<9){
            echo "<script>
            alert('password must be more than 9 characters');

            </script>";
            exit();
        }
        $check_email="select * from users where user_email='$email'";
        $run_email=mysqli_query($con,$check_email);
        $check=mysqli_num_rows($run_email);
        if($check==1){
            echo "<script>alert('Email already exists')</script>";
            echo "<script>window.open('signup.php',' _self')</script>";
            exit();
        }
        $profile_pic="assets/profile.png";
        $insert="insert into users(f_name,l_name,user_name,describe_user,relationship,user_password,user_email
        ,user_country,user_gender,user_birthday,user_image,user_cover,user_reg_date,status,posts,recovery_account)
        values('$first_name','$last_name','$username','hello guys im using Extragram !','...'
        ,'$password','$email','$country','$gender','$birthday','$profile_pic',
        'images/head_img.jpg',NOW(),'$status','$posts','codersdontquit')";
        $query=mysqli_query($con,$insert);
        if($query){
            echo "<script> setTimeout(function(){alert('Welldone $first_name , You Succesfully created account');},1000) </script>";
            echo "<script>window.open('index.php','_self');
exit;</script>";

            
        }else{
            echo "<script>alert('Registration failed')</script>";
            echo "<script>window.open('signup.php',' _self');exit;</script>";
            
        }
    }
?>