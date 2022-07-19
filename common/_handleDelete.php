<?php
include 'db_connect.php';
// echo $id=$_GET['catid'];

// $sql="SELECT * FROM `categories` WHERE `categori_id`=$id";
// $result=mysqli_query($conn, $sql);

// while($row=mysqli_fetch_assoc($result)) {
//     $catName=$row['categori_name'];
//     $catDesc=$row['categori_description'];
//     // $catId=$row['categori_id'];

// }
$deleted = false;

if(isset($_GET['delete'])){
    $thread_id=$_GET['delete'];
    // $deleted = true;
    // echo $thread_id;
    $sql4="DELETE FROM `thread` WHERE `thread_id`=$thread_id";
    $result4=mysqli_query($conn,$sql4);
    
    header("Location:../index.php?delete=true");
  
}

?>
