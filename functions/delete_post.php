<?php
include('../include/connect.php');
if(isset($_GET['post_id']))
{
    $post_id=$_GET['post_id'];
}
if(isset($_GET['u_id']))
{
    $user_id=$_GET['u_id'];
}
 $query="delete from posts where post_id=$post_id";
 $run=mysqli_query($con,$query);
 if($run){
     echo "<script>alert(' 1 post deleted.. ');
     window.open('../profile.php?u_id=$user_id','_self');
     </script>";

 }else{
     echo "<script>Error occured</script>";
 }

?>