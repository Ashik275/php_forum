<?php
session_start();
// include 'common/_header.php';
include 'common/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'common/db_connect.php';
  $title=$_POST['title'];
  $desc=$_POST['description'];
  $file =$_FILES['file'];
//   print_r($file);
    $fileName=$file['name'];
    $filePath=$file['tmp_name'];
    $fileError=$file['error'];
    if($fileError==0){
     $destFile="upload/".$fileName;
     move_uploaded_file($filePath,$destFile);
     $inertsql="INSERT INTO `categories`(`categori_name`,`categori_description`,`pic`) 
                VALUES ('$title','$desc','$destFile')";
    $result=mysqli_query($conn,$inertsql);
    if($result){
      header('Location:admin.php?cp=false');
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Successfully added your new course.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    else{
        echo "Error: " . $inertsql . "<br>" . mysqli_error($conn);
    }
    // header('location:index.php');

    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/78aab7e836.js" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
    <script>
    $(document).ready(function() {
        $('#myTable2').DataTable();
    });
    </script>
   
  </head>
  <body>
  <h3 class="bg-dark text-white p-3 text-center">Admin Panel</h3>
    
<?php
if($_GET['cp']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Successfull!</strong> Your Password changed successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
?>
    
 <?php
 if(isset($_SESSION['adminlogin']) && $_SESSION['adminlogin']=true){
 ?>
<!-- Button trigger modal -->
<div class="d-flex">
<div class="w-25 bg-dark  h-100 p-3  my-3 py-5  d-flex  flex-column border rounded">

<i class="fa fa-user text-light text-center"></i>

<button type="button" class="btn btn-outline-light  my-2 ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Course
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title  fw-bold " id="exampleModalLabel">Add New Courses</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container ">
 <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Course Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
        <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description"></textarea>
        <label for="floatingTextarea">Description</label>
        </div>
  </div>
  <div class="mb-3">
    <input type="file" name="file" id="file">
   
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
 
</form>
 </div>
      </div>
    
    </div>
  </div>
</div>
<a href="adminLogout.php" class="btn btn-outline-light my-2 mx-2">
  Log Out
  </a>
  <!-- change password modal -->
  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="changeModal" tabindex="-1" aria-labelledby="changeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changeModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="change.php" method="post">
 
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Old Password</label>
    <input type="password" class="form-control" id="oldpass" name="oldpass">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Old Password</label>
    <input type="password" class="form-control" id="coldpass" name="coldpass">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">New Password</label>
    <input type="password" class="form-control" id="newpass" name="newpass">
  </div>
  <button type="button" class="btn btn-success">Change Password</button>
      </div>
      
    </div>
  </div>
</div>
<a href="" class="btn btn-outline-light my-2 mx-2" data-bs-toggle="modal" data-bs-target="#changeModal" >
  Change Password
  </a>
</div>
<!-- change password modal -->
<!-- Button trigger modal -->

 <?php
 }
 else{
   header('Location:adminlogin.php');
 }
 ?>
 <div class="container mt-3">
   <h4 class="bg-dark text-white p-3 text-center">Courses</h4>
  
   <table class="table" id="myTable">
  <thead class="bg-dark">
    <tr>
      <th scope="col" class="text-light fw-bold">Sno</th>
      <th scope="col" class="text-light fw-bold">Course Name</th>
      <th scope="col" class="text-light fw-bold">Description</th>
      <th scope="col" class="text-light fw-bold">Action</th>
    </tr>
  </thead>
  <?php
   $sql="SELECT * FROM `categories`";
   $result= mysqli_query($conn,$sql);
   $sno=0;
   while($row= mysqli_fetch_assoc($result)){
       // echo $row['categori_id'];
       $sno=$sno+1;
       $id= $row['categori_id'];
       $cat= $row['categori_name'];
       $pic=$row['pic'];
       // $pic= $row['pic'];
       $description= $row['categori_description'];
  
  ?>
  <tbody class="w-25 border-start">
    <tr class="border-start">
      <th class="border-start border-end" scope="row"><?php echo $sno;?></th>
      <td class="border-start border-end"><?php echo $cat;?></td>
      <td class="border-start border-end"><?php echo substr($description,0,90);?></</td>
      <td class="border-start border-end">
      <a href='edit.php?id=<?php echo $id ;?>' class="btn btn-sm btn-success">Edit</a>
      <a href='delete.php?id=<?php echo $id ;?>' class="btn btn-sm btn-danger">Delete</a>
      
      </td> 
    </tr>
  </tbody>
  <?php
   }
  ?>
</table>
<div class="container mt-5">
<h4 class="bg-dark text-white p-3 text-center">Users</h4>

<table class="table shadow-lg" id="myTable2">
  <thead class="bg-dark">

    <tr>
      <th class="text-light fw-bold"  scope="col">sno</th>
      <th class="text-light fw-bold" scope="col">User Name</th>
      <th class="text-light fw-bold" scope="col">Status</th>
    </tr>
  </thead>
  <?php
   $sql="SELECT * FROM `users`";
   $result= mysqli_query($conn,$sql);
   $sno=0;
   while($row= mysqli_fetch_assoc($result)){
       // echo $row['categori_id'];
       $sno=$sno+1;
       $id= $row['sno'];
       $username= $row['user_email'];
       $status= $row['status'];
  
  ?>
  <tbody >
    <tr>
      <th  class="border-start border-end" scope="row"><?php echo $sno;?></th>
      <td  class="border-start border-end"><?php echo $username;?></td>
      <td  class="border-start border-end">
<?php
if($status==0){
?>
<a href="status.php?user_id=<?php echo  $id; ?>&status=1" class="btn btn-success">Block</a>
<?php
}
else{
?>
<a href="status.php?user_id=<?php echo  $id; ?>&status=0" class="btn btn-danger">Unblock</a>
<?php }?>
      </td>
      
    </tr>
  </tbody>
  <?php 
   }
  ?>
</table>
</div>
 </div>

</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>