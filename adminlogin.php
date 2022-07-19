<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // echo 'Server Method is posted';
    include 'common/db_connect.php';
   
    $username=$_POST['username'];
    $adminpass=$_POST['apass'];
    $sql="SELECT * FROM `admin` WHERE `username`='$username'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
  //  echo $row['username'];
  // echo $row['password'];
   
    $num= mysqli_num_rows($result);
   if($num==1){
     if($adminpass==$row['password']){
   
      session_start();
  $_SESSION['adminlogin']=true;
  $_SESSION['username']="admin";
  header('Location:admin.php?cp=false');
  // echo "useremail is " .$_SESSION['username'] . ".<br>";
  
     }
     else{
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Wrong Password</strong>Give Correcr Password.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
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
  </head>
  <body>
  <div class="container w-25 bg-dark mt-5 d-flex align-items-center justify-content-center p-5 border rounded">
  <form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label text-white">User Name</label>
    <input type="text" class="form-control" name="username" id="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label text-white">Password</label>
    <input type="password" class="form-control" id="apass" name="apass">
  </div>

  <button type="submit" class="btn btn-primary">Login</button>
</form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
