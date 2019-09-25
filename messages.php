<!DOCTYPE html>
<?php
session_start();
include("include/connect.php");
include("include/header.php");
?>

<?php

if(isset($_GET['u_id'])){
    $uid=htmlentities($_GET['u_id']);
    $get_users="select * from users where user_id='$uid'";
    $run=mysqli_query($con,$get_users);
    $row1=mysqli_fetch_array($run);
    $user_to_msg=$row1['user_id'];
    //echo "<script>alert('$uid')</script>";
    $user_to_name=$row1['user_name'];
    $user_to_image=$row1['user_image'];
}
$user=$_SESSION['user_email'];
$get_user="select * from users where user_email='$user'";
$run_user=mysqli_query($con,$get_user);
$row=mysqli_fetch_array($run_user);

$user_from_msg=$row['user_id'];
$user_from_name=$row['user_name'];





?>
<?php
if(isset($_POST['send_msg'])){
    $msg=htmlentities($_POST['msg_box']);
    if($msg == ""){
        echo "<h4 style='color:red;text-align:center;'>Message was unable to send!</h4>";

    }else{
        $insert="insert into user_messages(user_to,user_from,msg_body,date,msg_seen) values($user_to_msg,$user_from_msg,'$msg',NOW(),'no')";
    }
    $run=mysqli_query($con,$insert);

}


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
        <style>
        #blue{
            float:left;
            color:black;
            background-color:#F8F9FA;
            border-radius:10px;
            padding:5px;
        }
        #green{
            float:right;
            color:black;
            background-color:grey;
            
            border-radius:10px;
            padding:5px;
        }
        </style>
        <link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
      </head>
<body>

<div class='row' style='margin-top:56px'>
<div class='col-md-3'>


<?php
$get_user="select * from users ";
$run_user=mysqli_query($con,$get_user);
while($row=mysqli_fetch_array($run_user)){
  

    $user_id=$row['user_id'];
    $user_name=$row['user_name'];
    $user_image=$row['user_image'];
   echo "<center>
   <a style='text-decoration:none;cursor:pointer; color:black' href='messages.php?u_id=$user_id' >
    <div class='row card ' style='padding:10px; padding-left:20px'>
        <div class='col-md-12 '><img src='$user_image' style='height:33px;width:33px'  class='rounded-circle float-left' alt='...'> <span style='text-align:left;'>$user_name</span></div>
    </div>
   </a>
    
</center>";
 }

?>

</div>
<div class='col-md-6'>
<div class='load_msg' id='scroll_messages'>
<?php
/*if(isset($_GET['u_id'])){
    $uid=$_GET['u_id'];
    $get_user="select * from users where user_id='$uid'";
    $run_user=mysqli_query($con,$get_user);
    $row=mysqli_fetch_array($run_user);
    
    $user_name=$row['user_name'];
    $user_image=$row['user_image'];*/
 echo"  <div class='row card ' style='padding:10px; padding-left:10px'>
        <div class='col-md-12 '><img src='$user_to_image' style='height:33px;width:33px;margin-right:10px'  class='rounded-circle float-left' alt='...'><div style='margin-left:10px'></div> <strong>  <span style='text-align:left;'>$user_to_name</span></strong></div>
    </div>";

?>
<?php

   
$sel_msg="select * from user_messages where (user_to='$user_to_msg' and user_from='$user_from_msg') or 
(user_to='$user_from_msg' and user_from='$user_to_msg') ORDER BY 1 ASC";
$run_msg=mysqli_query($con,$sel_msg);
$user_to='';
    $user_from='';
    $msg_body='';
    $msg_date='';
while($row_msg=mysqli_fetch_array($run_msg)){
    $user_to=$row_msg['user_to'];
    $user_from=$row_msg['user_from'];
    $msg_body=$row_msg['msg_body'];
    $msg_date=$row_msg['date'];

echo '
<div>
<p>';

if($user_to === $user_to_msg AND $user_from == $user_from_msg){
    echo "<div class='message' id='blue' data-toggle='tooltip' title='$msg_date'>$msg_body</div><br>";
}else if($user_from == $user_to_msg AND $user_to == $user_from_msg){
    echo "<div class='message' id='green' data-toggle='tooltip' title='$msg_date'>$msg_body</div><br>";
}


echo '
</p>

</div>';

}

?>
</div>
<?php
if(isset($_GET['u_id'])){
    $uid=$_GET['u_id'];
    if($uid=='new'){
        echo "<center><h3>Select someone to start conversation</h3></center>
        <form>
        
        <textarea disabled class='form-control' placeholder='Enter your message'>
        </textarea>
        <input type='submit' class='btn btn-deafult' disabled value='send'>
        </form><br><br>";
    }else{
        echo "<form action='messages.php?u_id=$uid' method='POST'>
        
        <textarea  class='form-control' name='msg_box' placeholder='Enter your message'>
        </textarea>
        <input type='submit' name='send_msg' class='btn btn-primary' value='send'>
        </form><br><br>";
    }
}



?>
</div>

</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.7/js/tether.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    
</body>
</html>