<?php
include("include/connect.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">

<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <button class="navbar-toggler" data-toggle="collapse" data-target="#c_target">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="profile.php"><span  style="font-family: 'Pacifico', cursive; cursor:pointer;"><i class="fab fa-instagram"></i> ExtraGram</span></a>
            <div class="collapse navbar-collapse" id="c_target" style="height: inherit">
    
    <ul class="navbar-nav">
        <?php
                    $user_email=$_SESSION['user_email'];
                    $get_user="select * from users where user_email='$user_email'";
                    $run=mysqli_query($con,$get_user);
                    $row=mysqli_fetch_array($run);
                    $user_id=$row['user_id'];
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
                    
                    $user_posts="select * from posts where user_id='$user_id' ";
                    $run_posts=mysqli_query($con,$user_posts);
                    $posts=mysqli_num_rows($run_posts);
                    ?>
        <li class="nav-item">
            <a href="home.php?u_id=<?php echo $user_id?>" class="nav-link">Home</a>
           </li>
        <li class="nav-item">
         <a href="members.php" class="nav-link">Find People</a>
        </li>
        <li class="nav-item">
        <a href="messages.php?u_id=new" class="nav-link">Messages</a>
        </li>
        <?php

        
         echo "<li class='nav-item dropdown'>
            <a href='#' class='nav-link dropdown-toggle' data-toggle='dropdown' data-target='#ide'> <span class='glyphicon-chervron-down'></span></a>
           
            <div class='dropdown-menu' aria-labelledby='ide' style='height: inherit'>
                <a href='my_post.php?u_id=$user_id' class='dropdown-item'>My Posts<span class='badege badge-secondary'>
                    $posts
                </span></a>
                <a class='dropdown-item' href='edit_profile.php?uid=$user_id'>Edit Account</a>
                <div class='dropdown-divider'></div>
                <a class='dropdown-item' href='logout.php'>Logout</a>
                
            </div>
            </li> ";
            ?>
    </ul>
   
    <ul class="navbar-nav ml-auto ">
                <form class="navbar-form "  method="GET" action="members.php" style="margin:0;">
                    <div class="input-group" style="height: inherit; margin:0px; padding:0px;">
                       
                        <input type="text"  class="form-control" name="search" placeholder="Search" style="mar">
                       <span class="input-group-addon"></span>
        
            
                        <input type="submit" class="btn btn-info" name="submit" value="Search">
                    </div>
                    
                </form>
            </ul>  
        
</div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>

</body>
</html>