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
    //$user_email=$_SESSION['user_email'];
    if(isset($_GET['u_id'])){
        $user_id=$_GET['u_id'];
    }
    $get_user="select * from users where user_id='$user_id'";
    $run=mysqli_query($con,$get_user);
    $row=mysqli_fetch_array($run);
   // $user_id=$row['user_id'];
    $user_name=$row['user_name'];
    $u_cover=$row['user_cover'];
    $profile_img=$row['user_image'];
    $user_name=$row['user_name'];
                    $first_name=$row['f_name'];
                    $last_name=$row['l_name'];
                    $describe_user=$row['describe_user'];
                    $relationship_status=$row['relationship'];
                    $user_pass=$row['user_password'];
                    $user_country=$row['user_country'];
                    $user_gender=$row['user_gender'];
                    $user_birthday=$row['user_birthday'];
                    $user_image=$row['user_image'];
                    $user_cover=$row['user_cover'];
                    $recovery_account=$row['recovery_account'];
                    $register_date=$row['user_reg_date'];
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
    <div class='row' style='margin-top:56px; margin-bottom:30px'>
        <div class='col-sm-2'></div>
        <div class='col-sm-8'>
        
            <img class='img-fluid' style='height:450px; width:100%;margin-right:0;'  src='$user_cover' id='coverimage'>
            
        <img  src='$user_image' id='profileimg' class='img-fluid'>
       
     </div>
        
        

    </div>";
    ?>
    <?php 
    
    echo "<div class='row'>
        <div class='col-md-2'></div>
        <div class='col-md-2' id='info' >
            <center><h4><strong><span class='cursive'>$first_name $last_name</span></strong></h4></center>
            <p style='margin-top:20px'><strong><i style='color:grey; '>$describe_user</i></strong></p>
            <p><strong>Relationship Status:</strong>$relationship_status</p>
            <p><strong>Lives In:</strong>$user_country</p>
            <p><strong>Extragraminan Since:</strong>$register_date</p>
            <p><strong>Gender</strong>$user_gender</p>
            <p><strong>Date of Birth</strong>$user_birthday</p>
            
        </div>
        <div class='col-md-8' style='padding-left:0px;'>
        ";get_user_profile(); echo "
        </div>
    </div>";

    
?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    
</body>
</html>