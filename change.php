<?php
$cp="false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include 'common/db_connect.php';
     $oldpass=$_POST['oldpass'];
     $coldpass=$_POST['coldpass'];
     $newpass=$_POST['newpass'];
     $sql="SELECT * FROM `admin`";
     $result=mysqli_query($conn,$sql);
     $row=mysqli_fetch_assoc($result);
     $sno=$row['sno'];
    
    if($oldpass==$row['password'] &&  $oldpass==$coldpass){
        $inertsql="UPDATE `admin` SET `password`='$newpass' WHERE `sno`='$sno'";
        $result=mysqli_query($conn,$inertsql);
        if($result){
            $cp="true";
            header('Location:admin.php?cp='.$cp.'');
            
        }
    }

}

?>