<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $email=$_POST['loginemail'];
    $pass=$_POST['loginpass'];
    $sql2="SELECT * FROM `users` WHERE `user_email`='$email'";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $status=$row2['status'];
    if($status==1){
    //     echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //     <strong>Sorry</strong> You cant log in .
    //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //   </div>';
    header("Location:/forum/index.php?status=$status");
    }
  
   
else{
    $num= mysqli_num_rows($result2);
    if($num==1){
        if($pass == $row2['user_pass']){
              // echo 'logged in'.$email;
              session_start();
              $_SESSION['loggedin']=true;
              $_SESSION['sno']=$row2['sno'];
              $_SESSION['useremail']=$email;
            //   echo "useremail is " .$_SESSION["useremail"] . ".<br>";
            //   echo "useremail is " .$_SESSION["sno"] . ".<br>";
              
        }

        header("Location:/forum/index.php");
    }
}
    // header("Location:/forum/index.php?status=$status");
}
?>