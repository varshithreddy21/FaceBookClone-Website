<!DOCTYPE html>
<?php
session_start();
include("include/header.php");
if(!isset($_SESSION['user_email']))
header("location:main.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php 
    $user_email=$_SESSION['user_email'];
    $get_user="select * from users where user_email='$user_email'";
    $run=mysqli_query($con,$get_user);
    $row=mysqli_fetch_array($run);
    $user_id=$row['user_id'];
    $user_name=$row['user_name'];
    $u_cover=$row['user_cover'];
    $profile_img=$row['user_image']
    ?>
    <title><?php
        echo "$user_name";
        ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="profile_style.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
        <style>
            #select_profile{

                opacity:0.3;
            }
            #select_profile:hover{

opacity:0.8;
}
            #profileimg{
            border-radius:80px;
            height:185px;
            width:180px;
            position:absolute;
            top:220px;
            left:40px;
            }
            #coverimage{
                object-fit:cover;
                width:100%;
            }
         </style>   
</head>
<body>
<?php
echo "
    <div class='row' style='margin-top:56px'>
        <div class='col-sm-2'></div>
        <div class='col-sm-8'>
        
            <img class='img-fluid' style='height:450px; width:100%;margin-right:0;'  src='$user_cover' id='coverimage'>
            <form method='POST' action='profile.php?u_id=$user_id' enctype='multipart/form-data'>
            <ul style='position:absolute; top:6px;left:2px;' type='none'>
               
                <li class='dropdown'>
                    <button class='dropdown-toggle btn btn-light' data-toggle='dropdown' data-target='#drop'>Change Cover</button>
                    <div class='dropdown-menu' aria-labelledby='drop' style='height: inherit'>
                       <label class='btn btn-info'>
                           Select Cover<input type='file' name='u_cover' size='60'>
                       </label><br>
                       <button type='submit' name='submit_u' class='btn btn-info'>
                        Update Cover
                       </button>
                    </div>
                </li> 
            </ul>
        </form>
        <img  src='$user_image' id='profileimg' class='img-fluid'>
        <form action='profile.php?u_id=$user_id' method='post' enctype='multipart/form-data'>
        <label class='btn btn-light' id='select_profile' style='position:absolute;top:71% ;width:100px;font-size:0.7em;left:7.5%;'>
        Select Image<input type='file' name='u_profile' size='60'>
    </label><br>
    <button type='submit' name='submit_p' class='btn btn-info'style='font-size:0.7em;position:absolute;top:87% ;width:100px; left:8%;'>
     Update Profile
    </button>
        </form>
     </div>
        
        

    </div>";
    ?>
    <?php 
    
    echo "<div class='row'>
        <div class='col-md-2'></div>
        <div class='col-md-2' id='info' >
            <center><h2><strong><span class='cursive'>$first_name $last_name</span></strong></h2></center>
            <p style='margin-top:20px'><strong><i style='color:grey; '>$describe_user</i></strong></p>
            <p><strong>Relationship Status:</strong>$relationship_status</p>
            <p><strong>Lives In:</strong>$user_country</p>
            <p><strong>Extragraminan Since:</strong>$register_date</p>
            <p><strong>Gender</strong>$user_gender</p>
            <p><strong>Date of Birth</strong>$user_birthday</p>
            
        </div>
        
        <div class='col-md-8' style='padding-left:0px;'>
        ";get_pro(); echo "
        </div>
        </div>
    ";

    
?>
<?php
if(isset($_POST['submit_u'])){
    $u_cover=$_FILES['u_cover']['name'];
    $img_temp=$_FILES['u_cover']['tmp_name'];
    $random=rand(1,1000);
    $target_dir = "images/";
$target_file = $target_dir . basename($_FILES["u_cover"]["name"]);
    if($u_cover=''){
        echo "<script> alert('Please select the image')</script>";
        echo "<script> window.open('profile.php?u_id=$user_id','_self')</script>";
        exit;
    }else{
        move_uploaded_file($img_temp,$target_file);
        $update="update users set user_cover='$target_file' where user_id='$user_id'";
        $run=mysqli_query($con,$update);
        echo "<script> window.open('profile.php?u_id=$user_id','_self')</script>";

    }
}
if(isset($_POST['submit_p'])){
    $u_cover=$_FILES['u_profile']['name'];
    $img_temp=$_FILES['u_profile']['tmp_name'];
    $random=rand(1,1000);
    $target_dir = "users/";
$target_file = $target_dir . basename($_FILES["u_profile"]["name"]);
    if($u_cover=''){
        echo "<script> alert('Please select the image')</script>";
        echo "<script> window.open('profile.php?u_id=$user_id','_self')</script>";
        exit;
    }else{
        move_uploaded_file($img_temp,$target_file);
        $update="update users set user_image='$target_file' where user_id='$user_id'";
        $run=mysqli_query($con,$update);
        echo "<script> alert('updated'); window.open('profile.php?u_id=$user_id','_self')</script>";

    }
}




?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    
</body>
</html>