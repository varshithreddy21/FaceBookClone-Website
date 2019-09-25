<?php
$user_id=$_GET['u_id'];
    echo "<script>alert('21');</script>";
    session_start();
    include('include/connect.php');
    $user_email=$_SESSION['user_email'];
    $run=mysqli_query($con,"select * from users where user_email=$user_email");
    $row=mysqli_fetch_array($run);
    $user_id=$row['user_id'];
    $user_name=$row['user_name'];
    $user_image=$row['user_image'];
    $post_id='liketable'.$_POST['post'];
    $run2=mysqli_query($con,"insert into $post_id values('$user_id','$user_email','$user_image')");

?>