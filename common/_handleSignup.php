<?php
 $showError="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'db_connect.php';
    $user_email=$_POST['signupEmail'];
    $pass=$_POST['signupPassword'];
    $cpass=$_POST['signupCpassword'];

    $userEmail=trim($user_email,' ');
    //check wheather email already exists
    $existSql="SELECT * FROM `users` WHERE `user_email`='$userEmail'";
    $result=mysqli_query($conn,$existSql);
    $numRows=mysqli_num_rows($result);
    // echo  $numRows;
   if($numRows>0){
       $showError="Email Already exists";
   }
    else{
        if($pass==$cpass){
            // $hash=md5($pass);
            $sql="INSERT INTO `users` ( `user_email`, `user_pass`)
             VALUES ( '$userEmail', '$pass')";
             $result=mysqli_query($conn,$sql);
              echo $result;
              if($result){
                  $showAlert=true;
                  header("Location:/forum/index.php?signupsuccess=true");
                  exit();
              } 
            
        }
        else{
            $showError="Password do not match"; 
        }
       
    }
    header("Location:/forum/index.php?signupsuccess=false&error=$showError");

}


?>