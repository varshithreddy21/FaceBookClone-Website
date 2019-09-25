<?php
include("include/connect.php");
$query="select * from users";
$check=mysqli_query($con,$query);

//while($row=mysqli_fetch_array($check)){
//    echo $row['f_name'];
//}
echo "<script>window.open('index.php','_self');
exit;</script>"
?>