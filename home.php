<!DOCTYPE html>
<?php
session_start();
include("include/header.php");
if(!isset($_SESSION['user_email']))
header("location:main.php");
?>
 <?php
  if(isset($_GET['post'])){
   // echo "<script>alert('21');</script>";
    //session_start();
    include('include/connect.php');
    $user_email=$_SESSION['user_email'];
    $run=mysqli_query($con,"select * from users where user_email='$user_email'");
    $row=mysqli_fetch_array($run);
    $user_id=$row['user_id'];
    $user_name=$row['user_name'];
    $user_image=$row['user_image'];
    $post_id='liketable'.$_GET['post'];
    $run2=mysqli_query($con,"insert into $post_id values('$user_id','$user_email','$user_image')");
exit;
        
}

  if(isset($_GET['lost'])){
   // echo "<script>alert('21');</script>";
    //session_start();
    include('include/connect.php');
    $user_email=$_SESSION['user_email'];
    $run=mysqli_query($con,"select * from users where user_email='$user_email'");
    $row=mysqli_fetch_array($run);
    $user_id=$row['user_id'];
   
    $post_id='liketable'.$_GET['lost'];
    $run2=mysqli_query($con,"delete from $post_id where user_id='$user_id'");
exit;
        
}
  ?>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    .css{
        color:red;


    }
    </style>
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
        <link rel="stylesheet" href="hstyle.css">
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
           #f{
               display:hide;
           }
            #insert_post{
               margin-top:56px;
            }
            #coverimage{
                object-fit:cover;
                width:100%;
            }
         </style>   
</head>
<body>

<div class="row">
    <div id="insert_post" class="col-sm-12">
        <center>
        <form action="home.php?uid=<?php echo '$user_id'?>" method="post" enctype='multipart/form-data'>
            <textarea class="form-control" rows="4" name="content" placeholder="Whats in your mind?"></textarea>
            <br>
        <label class='btn btn-info'
         id="select_img"><input  type='file' name='upload_img' id="f" size='60'>Select Image</label>
            <label id="post" class="btn btn-success"><input style="display:none" type="submit" value="" name="sub">Post</label>
        </form>
        <div class='php'></div>
        <?php

        insertPost();
        ?>
        </center>
    </div>
</div>

<?php
get_post();




?>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    <script>
    //$.noConflict();
$(document).ready(function(){

        
        $(document).on('click','.like',function(e){
           
            var post_id=$(this).children()[0].innerHTML;
        let user_id=$(this).children()[1].innerHTML;
        $(this).toggleClass('far fas');
       $(this).toggleClass('css');
       // $.ajaxSetup({ cache: false });
        $.get( 
                 "home.php?" , { 
                     post: post_id 
                 }, 
                 function(data,status) { 
                     if(status=="success")
                   { $('.php').html(data); 
                     $('.span').toggleClass('like');
                     }
                 });
                
       
		
    $("span").html(result);
  });
  $(document).on('click','.unlike',function(e){
           
           var post_id=$(this).children()[0].innerHTML;
       let user_id=$(this).children()[1].innerHTML;
       $(this).toggleClass('fas far');
       $(this).toggleClass('css');
       //$(this).toggleClass('fas');
      //$(this).addClass('like');
     // $.ajaxSetup({ cache: false });
       $.get( 
        "home.php?", { 
                    lost: post_id 
                }, 
                function(data,status) { 
                     if(status=="success")
                   { $('.php').html(data); 
                     
                    }
                });
     
       $('.span').toggleClass('unlike');
   //$("span").html(result);*/
 });
        
    });
   
  
     </script>
 
 <script>
 
       
 </script>
</body>
</html>