<?php
include 'common/db_connect.php';
$id=$_GET['id'];
$sql="DELETE FROM `categories` WHERE `categori_id`='$id'";
$result=mysqli_query($conn,$sql);
header('location:admin.php?cp=false');
?>