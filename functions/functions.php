<?php
//$con=mysqli_connect("localhost","root","","socialnetwork");
include("include/connect.php");
function get_pro(){
    global $con;
    
    if(isset($_GET['u_id'])){
        $user_id=$_GET['u_id'];
    }
    $get_posts="select * from posts where user_id=$user_id order by 1 desc LIMIT 5";
    $run=mysqli_query($con,$get_posts);
    while($row=mysqli_fetch_array($run)){
        $post_id=$row['post_id'];
        $user_id=$row['user_id'];
        $content=$row['post_content'];
        $upload_img=$row['upload_image'];
        $post_date=$row['post_date'];

        $user="select * from users where user_id='$user_id' and posts='yes'";
        $run_user=mysqli_query($con,$user);
        $row_user=mysqli_fetch_array($run_user);
        $user_name=$row_user['user_name'];
        $user_image=$row_user['user_image'];

        if($content=="No" && $upload_img!=''){
            echo "
            <div class='container'>
            <div class='row '>
                <div class='col-md-1'></div>
                <div class='col-md-8 card 'style='padding-bottom:10px;'>
                 
                    <div class='row ' style='padding-top:8px;padding-bottom:8px;'>
                          <div class='col-sm-1' >
                          <img src='$user_image' class='rounded-circle' width='40px' height='40px'>                          </div>
                          <div class='col-sm-11' style='margin-top:6px;'>
                          <strong> <a style='text-decoration:none; cursor:pointer;color:#262626; font-weight:600;' href='ask.php?u_id=$user_id'>$user_name</a></strong>
                          
                          </div>
                        
                    </div>
                  
                    <div class='row card'>
                        <div class='col-md-12' style='padding:0;'>
                            <img  id='post-img'src='imagepost/$upload_img' height='500px' width='100%' >

                        </div>
                    </div>
                    <br>
                    <div class='row'>
                    <div class='col-md-8'><small style='color:grey'>Updated post on <strong>$post_date</strong></small></div>
                    <div class='col-md-2'><a href='single.php?post_id=$post_id&u_id=$user_id' style='float:right;' ><button class='btn btn-info'style='min-width:95px;min-height:38px;border-radius:5px'>View</button></a></div>
                    <div class='col-md-2'><a href='functions/delete_post.php?post_id=$post_id&u_id=$user_id' style='float:right'><button class='bt btn-danger' style='min-width:95px;min-height:38px;border-radius:5px'>Delete</button></a>
                    </div>
                    
                </div>
                <div class='col-sm-1'></div>
            </div>
            </div><br><br>
            ";
        }
        else if($content!=''&& $upload_img!=''){
            echo "
            <div class='container'>
            <div class='row '>
                <div class='col-md-1 '></div>
                <div class='col-md-8 card 'style='padding-bottom:10px;'>
                 
                    <div class='row ' style='padding-top:8px;padding-bottom:8px;'>
                          <div class='col-sm-1' >
                          <img src='$user_image' class='rounded-circle' width='40px' height='40px'>                          </div>
                          <div class='col-sm-11' style='margin-top:6px;'>
                          <strong> <a style='text-decoration:none; cursor:pointer;color:#262626; font-weight:600;' href='ask.php?u_id=$user_id'>$user_name</a></strong>
                          
                          </div>
                        
                    </div>
                  
                    <div class='row card'>
                        <div class='col-md-12' style='padding:0;'>
                            <img  id='post-img'src='imagepost/$upload_img' height='500px' width='100%' >

                        </div>
                    </div>
                    <br>
                    <div class='row'>
                    
                    <div class='col-sm-11' style='padding-left:20px'><p><strong style='font-weight:600'>$user_name</strong> $content</p></div>
                    
                    <div class='col-sm-1'></div>
                    </div> 
                    <div class='row'>
                    <div class='col-md-8'><small style='color:grey'>Updated post on <strong>$post_date</strong></small></div>
                    <div class='col-md-2'><a href='single.php?post_id=$post_id&u_id=$user_id' style='float:right;' ><button class='btn btn-info'style='min-width:95px;min-height:38px;border-radius:5px'>View</button></a></div>
                    
                    <div class='col-md-2'><a href='functions/delete_post.php?post_id=$post_id&u_id=$user_id' style='float:right'><button class='bt btn-danger' style='min-width:95px;min-height:38px;border-radius:5px'>Delete</button></a>
                    </div>
                    
                </div>
                <div class='col-sm-1'></div>
            </div>
            </div><br><br>
            ";
        }else if($content!=''&& $upload_img==''){
            
            echo "
            <div class='container'>
            <div class='row '>
                <div class='col-md-1 '></div>
                <div class='col-md-8 card 'style='padding-bottom:10px;'>
                 
                    <div class='row ' style='padding-top:8px;padding-bottom:8px;'>
                          <div class='col-sm-1' >
                          <img src='$user_image' class='rounded-circle' width='40px' height='40px'>                          </div>
                          <div class='col-sm-11' style='margin-top:6px;'>
                          <strong> <a style='text-decoration:none; cursor:pointer;color:#262626; font-weight:600;' href='ask.php?u_id=$user_id'>$user_name</a></strong>
                          
                          </div>
                        
                    </div>
                  
                    <div class='row card' style='padding-top:20px'>
                    
                    <div class='col-sm-11' style='padding-left:20px'><p> $content</p></div>
                    
                    <div class='col-sm-1'></div>
                    </div> 
                    <br>
                    <div class='row'>
                    <div class='col-md-8'><small style='color:grey'>Updated post on <strong>$post_date</strong></small></div>
                    <div class='col-md-2'><a href='single.php?post_id=$post_id&u_id=$user_id' style='float:right;' ><button class='btn btn-info'style='min-width:95px;min-height:38px;border-radius:5px'>View</button></a></div>
                    <div class='col-md-2'><a href='functions/delete_post.php?post_id=$post_id&u_id=$user_id' style='float:right'><button class='bt btn-danger' style='min-width:95px;min-height:38px;border-radius:5px'>Delete</button></a></div>
                    </div>
                    
                </div>
                <div class='col-sm-1'></div>
            </div>
            </div><br><br>
            ";
            
        }
        
    }
    global $con;


            if(isset($_GET['u_id'])){
                $user_id=$_GET['u_id'];
            }
            $get_posts="select user_email from users where user_id=$user_id";
            $run=mysqli_query($con,$get_posts);
            $row=mysqli_fetch_array($run);
            $user_email=$row['user_email'];
            $user=$_SESSION['user_email'];
            $get_user="select * from users where user_email='$user'";
            $run_user=mysqli_query($con,$get_user);
            $row2=mysqli_fetch_array($run_user);
            $user_id=$row2['user_id'];
            $u_email=$row2['user_email'];
            if($u_email!=$user_email){
                echo "<script>window.open('profile.php?u_id=$user_id','_self');</script>";
                exit();
            }else{
                   
            }
    //include('functions/delete_post.php');
} 


function get_user_profile(){
    global $con;
    
    if(isset($_GET['u_id'])){
        $user_id=$_GET['u_id'];
    }
    $get_posts="select * from posts where user_id=$user_id order by 1 desc";
    $run=mysqli_query($con,$get_posts);
    while($row=mysqli_fetch_array($run)){
        $post_id=$row['post_id'];
        $user_id=$row['user_id'];
        $content=$row['post_content'];
        $upload_img=$row['upload_image'];
        $post_date=$row['post_date'];

        $user="select * from users where user_id='$user_id' and posts='yes'";
        $run_user=mysqli_query($con,$user);
        $row_user=mysqli_fetch_array($run_user);
        $user_name=$row_user['user_name'];
        $user_image=$row_user['user_image'];

        if($content=="No" && $upload_img!=''){
            echo "
            <div class='container'>
            <div class='row '>
                <div class='col-md-1'></div>
                <div class='col-md-8 card ' style='padding-bottom:10px;'>
                 
                    <div class='row ' style='padding-top:8px;padding-bottom:8px;'>
                          <div class='col-sm-1' >
                          <img src='$user_image' class='rounded-circle' width='40px' height='40px'>                          </div>
                          <div class='col-sm-11' style='margin-top:6px;'>
                          <strong> <a style='text-decoration:none; cursor:pointer;color:#262626; font-weight:600;' href='ask.php?u_id=$user_id'>$user_name</a></strong>
                          
                          </div>
                        
                    </div>
                  
                    <div class='row card'>
                        <div class='col-md-12' style='padding:0;'>
                            <img  id='post-img'src='imagepost/$upload_img' height='500px' width='100%' >

                        </div>
                    </div>
                    <br>
                    <div class='row'>
                    <div class='col-md-8'><small style='color:grey'>Updated post on <strong>$post_date</strong></small></div>
                    <div class='col-md-2'><a href='single.php?post_id=$post_id&u_id=$user_id' style='float:right;' ><button class='btn btn-info'style='min-width:95px;min-height:38px;border-radius:5px'>View</button></a></div>
                    <div class='col-md-2'><a href='functions/delete_post.php?post_id=$post_id&u_id=$user_id' style='float:right'><button class='bt btn-danger' style='min-width:95px;min-height:38px;border-radius:5px'>Delete</button></a>
                    </div>
                    
                </div>
                <div class='col-sm-1'></div>
            </div>
            </div><br><br>
            ";
        }
        else if($content!=''&& $upload_img!=''){
            echo "
            <div class='container'>
            <div class='row '>
                <div class='col-md-1 '></div>
                <div class='col-md-8 card 'style='padding-bottom:10px;'>
                 
                    <div class='row ' style='padding-top:8px;padding-bottom:8px;'>
                          <div class='col-sm-1' >
                          <img src='$user_image' class='rounded-circle' width='40px' height='40px'>                          </div>
                          <div class='col-sm-11' style='margin-top:6px;'>
                          <strong> <a style='text-decoration:none; cursor:pointer;color:#262626; font-weight:600;' href='ask.php?u_id=$user_id'>$user_name</a></strong>
                          
                          </div>
                        
                    </div>
                  
                    <div class='row card'>
                        <div class='col-md-12' style='padding:0;'>
                            <img  id='post-img'src='imagepost/$upload_img' height='500px' width='100%' >

                        </div>
                    </div>
                    <br>
                    <div class='row'>
                    
                    <div class='col-sm-11' style='padding-left:20px'><p><strong style='font-weight:600'>$user_name</strong> $content</p></div>
                    
                    <div class='col-sm-1'></div>
                    </div> 
                    <div class='row'>
                    <div class='col-md-8'><small style='color:grey'>Updated post on <strong>$post_date</strong></small></div>
                    <div class='col-md-2'><a href='single.php?post_id=$post_id&u_id=$user_id' style='float:right;' ><button class='btn btn-info'style='min-width:95px;min-height:38px;border-radius:5px'>View</button></a></div>
                    
                    <div class='col-md-2'><a href='functions/delete_post.php?post_id=$post_id&u_id=$user_id' style='float:right'><button class='bt btn-danger' style='min-width:95px;min-height:38px;border-radius:5px'>Delete</button></a>
                    </div>
                    
                </div>
                <div class='col-sm-1'></div>
            </div>
            </div><br><br>
            ";
        }else if($content!=''&& $upload_img==''){
            
            echo "
            <div class='container'>
            <div class='row '>
                <div class='col-md-1 '></div>
                <div class='col-md-8 card 'style='padding-bottom:10px;'>
                 
                    <div class='row ' style='padding-top:8px;padding-bottom:8px;'>
                          <div class='col-sm-1' >
                          <img src='$user_image' class='rounded-circle' width='40px' height='40px'>                          </div>
                          <div class='col-sm-11' style='margin-top:6px;'>
                          <strong> <a style='text-decoration:none; cursor:pointer;color:#262626; font-weight:600;' href='ask.php?u_id=$user_id'>$user_name</a></strong>
                          
                          </div>
                        
                    </div>
                  
                    <div class='row card' style='padding-top:20px'>
                    
                    <div class='col-sm-11' style='padding-left:20px'><p> $content</p></div>
                    
                    <div class='col-sm-1'></div>
                    </div> 
                    <br>
                    <div class='row'>
                    <div class='col-md-8'><small style='color:grey'>Updated post on <strong>$post_date</strong></small></div>
                    <div class='col-md-2'><a href='single.php?post_id=$post_id&u_id=$user_id' style='float:right;' ><button class='btn btn-info'style='min-width:95px;min-height:38px;border-radius:5px'>View</button></a></div>
                    <div class='col-md-2'><a href='functions/delete_post.php?post_id=$post_id&u_id=$user_id' style='float:right'><button class='bt btn-danger' style='min-width:95px;min-height:38px;border-radius:5px'>Delete</button></a></div>
                    </div>
                    
                </div>
                <div class='col-sm-1'></div>
            </div>
            </div><br><br>
            ";
            
        }
        
    }
    
    //include('functions/delete_post.php');
   }



   function insertPost(){
    if(isset($_POST['sub'])){
        global $con;
        global $user_id;
        $content=htmlentities($_POST['content']);
        $img_tmp=$_FILES['upload_img']['tmp_name'];
        $upload_img=basename($_FILES['upload_img']['name']);
        $random=rand(0,100);
       // echo $upload_img;
        if((strlen($upload_img)>=1)&&(strlen($content)>=1)){
            move_uploaded_file($img_tmp,'imagepost/'.$upload_img);
            
            $insert="INSERT INTO POSTS(user_id,post_content,upload_image,post_date)
            values('$user_id','$content','$upload_img',NOW())";
            $run=mysqli_query($con,$insert);
         $post_res=mysqli_query($con,"select post_id from posts where user_id='$user_id'and post_content='$content' ORDER BY 1 DESC LIMIT 1");
            $posts=mysqli_fetch_array($post_res);
            $post_id='liketable'.$posts['post_id'];
            
         if($run){
                if(mysqli_num_rows(mysqli_query($con,"SHOW TABLES LIKE '$post_id'"))) {
                    
                  } else {
                      
                  
                    if(mysqli_query($con,"create table $post_id ( user_id int PRIMARY KEY,user_name varchar(210),user_image text)")){
                       echo "<script>alert('Your post is sucessfully updated  $upload_img'</script>";
                   echo "<script>window.open('home.php?u_id=$user_id','_self')</script>";
                       $update="update users set posts='yes' where user_id='$user_id'";
                       $run2=mysqli_query($con,$update);
            
                    }else{
                       echo "<script>alert('ERROR  $upload_img'</script>";
                     echo "<script>window.open('home.php?u_id=$user_id','_self')</script>";
                   }
                }
            exit();
              }
            
        }
        if(($upload_img=='')&&($content=='')){
            echo "<script>alert('Error occured while uploading...')</script>";
            echo "<script>window.open('home.php?u_id=$user_id','_self')</script>";
        }
        if($content==''&& $upload_img!=''){
            move_uploaded_file($img_tmp,"imagepost/".$upload_img);
            $insert="INSERT INTO POSTS(user_id,post_content,upload_image,post_date) values('$user_id','No','$upload_img',NOW())";
            $run=mysqli_query($con,$insert);
            $post_res=mysqli_query($con,"select post_id from posts where user_id='$user_id'and post_content='No' ORDER BY 1 DESC LIMIT 1");
            $posts=mysqli_fetch_array($post_res);
            $post_id='liketable'.$posts['post_id'];
                if($run){
                    if(mysqli_num_rows(mysqli_query($con,"SHOW TABLES LIKE '$post_id'"))) {
                    
                    } else {
                        
                    
                      if(mysqli_query($con,"create table $post_id ( user_id int PRIMARY KEY,user_name varchar(210),user_image text)")){
                         echo "<script>alert('Your post is sucessfully updated  $upload_img'</script>";
                     echo "<script>window.open('home.php?u_id=$user_id','_self')</script>";
                         $update="update users set posts='yes' where user_id='$user_id'";
                         $run2=mysqli_query($con,$update);
              
                      }else{
                         echo "<script>alert('ERROR  $upload_img'</script>";
                       echo "<script>window.open('home.php?u_id=$user_id','_self')</script>";
                     }
                  }
              exit();
                }
                   
        }
        if($content!=''&& $upload_img==''){
            $insert="INSERT INTO POSTS(user_id,post_content,post_date) values('$user_id','$content',NOW())";
            $run=mysqli_query($con,$insert);
            $post_res=mysqli_query($con,"select post_id from posts where user_id='$user_id'and post_content='$content' ORDER BY 1 DESC LIMIT 1");
            $posts=mysqli_fetch_array($post_res);
            $post_id='liketable'.$posts['post_id'];
            if($run){
              if(mysqli_num_rows(mysqli_query($con,"SHOW TABLES LIKE '$post_id'"))) {
                //exit();
             
                } else {
                        if(mysqli_query($con,"create table $post_id ( user_id int PRIMARY KEY,user_name varchar(210),user_image text)")){
                      echo "<script>alert('Your post is sucessfully updated  $upload_img'</script>";
                    echo "<script>window.open('home.php?u_id=$user_id','_self')</script>";
                    $update="update users set posts='yes' where user_id='$user_id'";
                    $run2=mysqli_query($con,$update);
         
                 }else{
                    echo "<script>alert('ERROR  $upload_img'</script>";
                  echo "<script>window.open('home.php?u_id=$user_id','_self')</script>";
                }
            }
          
        //like($post_id);
    
        exit();
        }
         }
     }
}
     

function get_post(){
    global $con;
    $per_page=4;
    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $start_from=($page-1)*$per_page;
   
    $get_posts="select * from posts  ORDER by 1 DESC LIMIT $start_from,$per_page";
    
    
    
    $run=mysqli_query($con,$get_posts);
    while($row=mysqli_fetch_array($run)){
        $post_id=$row['post_id'];
        $user_id=$row['user_id'];
        $content=$row['post_content'];
        $upload_img=$row['upload_image'];
        $post_date=$row['post_date'];

        $user="select * from users where user_id='$user_id' and posts='yes'";
        $run_user=mysqli_query($con,$user);
        $row_user=mysqli_fetch_array($run_user);
        $user_name=$row_user['user_name'];
        $user_image=$row_user['user_image'];
        $table='liketable'.$post_id;
        $user2="select * from $table where user_id='$user_id' ";
        $run_user2=mysqli_query($con,$user2);
        $like='';
           $heart='';
           $css='';
        if(mysqli_num_rows($run_user2)>0){
           $like='unlike';
           $heart='fas';
           $css='css';
        }else{
            $like='like';
            $heart='far';
        }
       // like_it($post_id,$user_id,$user_name,$user_image);
        if($content=="No" && $upload_img!=''){
            echo "
            <div class='container'>
            <div class='row '>
                <div class='col-md-3 '></div>
                <div class='col-md-8 card 'style='padding-bottom:10px;'>
                 
                    <div class='row ' style='padding-top:8px;padding-bottom:8px;'>
                          <div class='col-sm-1' >
                          <img src='$user_image' class='rounded-circle' width='40px' height='40px'>                          </div>
                          <div class='col-sm-11' style='margin-top:6px;'>
                          <strong> <a style='text-decoration:none; cursor:pointer;color:#262626; font-weight:600;' href='ask.php?u_id=$user_id'>$user_name</a></strong>
                          
                          </div>
                        
                    </div>
                  
                    <div class='row card'>
                        <div class='col-md-12' style='padding:0;'>
                            <img  id='post-img'src='imagepost/$upload_img' height='500px' width='100%' >

                        </div>
                    </div>
                    
                    <div class='row ' style='padding:10px;'>
                    <div class='col-sm-2 '>
                    
                    <span  style='color:#A4B0BD; padding-right:8px;' class='align-middle span'><i class='$heart fa-heart fa-2x $like $css' ><span style='display:none' class='post_id'>$post_id</span><span style='display:none' class='user_id'>$user_id</span></i></span>
                    <span style='color:#A4B0BD;' class='align-middle span'><a href='single.php?post_id=$post_id' style='text-decoration:none;color:#A4B0BD;'><i class='far fa-comment fa-2x comment'></i></a></span>
                    
                    </div>
                    <div class='col-sm-1'>
                   
                    </div>
                    </div>
                    <div class='row'>
                    <div class='col-md-5'><small style='color:grey'>Updated post on <strong>$post_date</strong></small></div>
                    <div class='col-md-7'><a href='single.php?post_id=$post_id' style='float:right;' ><button class='btn btn-info'>Comment</button></a></div>
                    </div>
                    
                </div>
                <div class='col-sm-1'></div>
            </div>
            </div><br><br>
            ";

           
        }
        else if($content!=''&& $upload_img!=''){
            echo "
            <div class='container'>
            <div class='row '>
                <div class='col-md-3 '></div>
                <div class='col-md-8 card 'style='padding-bottom:10px;'>
                 
                    <div class='row ' style='padding-top:8px;padding-bottom:8px;'>
                          <div class='col-sm-1' >
                          <img src='$user_image' class='rounded-circle' width='40px' height='40px'>                          </div>
                          <div class='col-sm-11' style='margin-top:6px;'>
                          <strong> <a style='text-decoration:none; cursor:pointer;color:#262626; font-weight:600;' href='ask.php?u_id=$user_id'>$user_name</a></strong>
                          
                          </div>
                        
                    </div>
                  
                    <div class='row card'>
                        <div class='col-md-12' style='padding:0;'>
                            <img  id='post-img'src='imagepost/$upload_img' height='500px' width='100%' >

                        </div>
                    </div>
                    <div class='row ' style='padding:10px;'>
                    <div class='col-sm-2 '>
                    <span  style='color:#A4B0BD; padding-right:8px;' class='align-middle span'><i class='far fa-heart fa-2x like' ><span style='display:none' class='post_id'>$post_id</span><span style='display:none' class='user_id'>$user_id</span></i></span>
                    <span style='color:#A4B0BD;' class='align-middle span'><a href='single.php?post_id=$post_id' style='text-decoration:none;color:#A4B0BD;'><i class='far fa-comment fa-2x comment'></i></a></span>
                    </div>
                    <div class='col-sm-1'>
                   
                    </div>
                    </div>
                    <div class='row'>
                    
                    <div class='col-sm-11' style='padding-left:20px'><p><strong style='font-weight:600'>$user_name</strong> $content</p></div>
                    
                    <div class='col-sm-1'></div>
                    </div> 
                    <div class='row'>
                    <div class='col-md-5'><small style='color:grey'>Updated post on <strong>$post_date</strong></small></div>
                    <div class='col-md-7'><a href='single.php?post_id=$post_id' style='float:right;' ><button class='btn btn-info'>Comment</button></a></div>
                    </div>
                    
                </div>
                <div class='col-sm-1'></div>
            </div>
            </div><br><br>
            ";
        }else if($content!=''&& $upload_img==''){
            
            echo "
            <div class='container'>
            <div class='row '>
                <div class='col-md-3 '></div>
                <div class='col-md-8 card 'style='padding-bottom:10px;'>
                 
                    <div class='row ' style='padding-top:8px;padding-bottom:8px;'>
                          <div class='col-sm-1' >
                          <img src='$user_image' class='rounded-circle' width='40px' height='40px'>                          </div>
                          <div class='col-sm-11' style='margin-top:6px;'>
                          <strong> <a style='text-decoration:none; cursor:pointer;color:#262626; font-weight:600;' href='ask.php?u_id=$user_id'>$user_name</a></strong>
                          
                          </div>
                        
                    </div>
                  
                    <div class='row card' style='padding-top:20px'>
                    
                    <div class='col-sm-11' style='padding-left:20px'><p> $content</p></div>
                    
                    <div class='col-sm-1'></div>
                    </div> 
                    <div class='row ' style='padding:10px;'>
                    <div class='col-sm-2 '>
                    <span  style='color:#A4B0BD; padding-right:8px;' class='align-middle span'><i class='far fa-heart fa-2x like' ><span style='display:none' class='post_id'>$post_id</span><span style='display:none' class='user_id'>$user_id</span></i></span>
                    <span style='color:#A4B0BD;' class='align-middle span'><a href='single.php?post_id=$post_id' style='text-decoration:none;color:#A4B0BD;'><i class='far fa-comment fa-2x comment'></i></a></span>
                    </div>
                    <div class='col-sm-1'>
                   
                    </div>
                    </div>
                    <div class='row'>
                    <div class='col-md-5'><small style='color:grey'>Updated post on <strong>$post_date</strong></small></div>
                    <div class='col-md-7'><a href='single.php?post_id=$post_id' style='float:right;' ><button class='btn btn-info'>Comment</button></a></div>
                    </div>
                    
                </div>
                <div class='col-sm-1'></div>
            </div>
            </div><br><br>
            ";
        }
        
    }
   // include('like.php');
    include('pagination.php');
  
}
function like_it($post_id,$user_id,$user_name,$user_image){
 global $con;
 $query="insert into $post_id values('$user_id','$user_name','$user_image')";
 $run=mysqli_query($con,$query);
 if(mysqli_num_rows($run)){
echo "<script>alert('hii');</script>";
 }else{
    echo "<script>alert('hii j');</script>";
 }


}

?>