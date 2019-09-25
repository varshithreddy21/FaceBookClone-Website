<!DOCTYPE html>
<?php
session_start();
include("include/connect.php");
include("include/header.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php
        echo "$user_name";
        ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="profile_style.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
      </head>
<body>
<div style='margin-top:100px'></div>
<?php

if(isset($_GET['search'])){
    $search=htmlentities($_GET['search']);
    $get_users="select * from users where f_name like '%$search%' OR l_name like '%$search%' OR
user_name like '%$search%'";
}else{
    $get_users="select * from users ";
}


$run=mysqli_query($con,$get_users);
while($row=mysqli_fetch_array($run)){
   
    $user_id=$row['user_id'];
    $user_name=$row['user_name'];
    $user_image=$row['user_image'];
   echo "<center> <div class='card' style='width: 18rem; margin-top:20px;''>
    <img src='$user_image' class='card-img-top' alt='...'>
    <div class='card-body'>
      <h5 class='card-title'>$user_name</h5>
      <a href='user_profile.php?u_id=$user_id' class='btn btn-primary'>visit</a>
    </div>
  </div></center>";
}

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    
</body>
</html>