<?php 
include 'common/db_connect.php';
 
 $id=$_GET['user_id'];
 $status=$_GET['status'];
 $sql="UPDATE `users` SET `status`='$status' WHERE `sno`='$id'";
  $result=mysqli_query($conn,$sql);
 if($result){
    header('location:admin.php?cp=false');

 }

else {
//     echo "Error updating record: " . mysqli_error($conn);
echo 'vag';
   }


 ?>