<?php
include 'db_connect.php';
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
  <a class="navbar-brand" href="#">iForum</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/forum">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="about.php">About</a>
      </li>



      <li class="nav-item dropdown">
        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categories
        </a>
      
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
        $sql="SELECT categori_name,categori_id FROM `categories`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
       echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$row['categori_id'].'">'.$row['categori_name'].'</a></li>';
        }
       
 echo  ' </ul>
      </li>
    
 <li class="nav-item">
        <a href="contact.php" class="nav-link active">Contact</a>
      </li>
    </ul>';
    if(isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']==true){
     echo  ' <form class="d-flex" role="search" action="search.php" method="get">
      <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success me-2" type="submit">Search</button>
    <small class="text-white my-0 mx-0">  Welcome '.$_SESSION['useremail'].'</small>
  
    <a href="common/_logOut.php" class="btn btn-outline-light me-2">Logout</a>
   
    </form>';
    }
    else{
      echo '<form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success me-2" type="submit">Search</button>
    </form>
     
        <button class="btn btn-outline-success me-2" type="submit"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button class="btn btn-outline-success" type="submit"  data-bs-toggle="modal" data-bs-target="#signupModal">Signup</button>';
    }
    
    
 echo  '</div>
</div>
</nav>';
include 'common/_loginModal.php';
include 'common/_signupModal.php';
// include 'common/_handleDelete.php';

if(isset($_GET['signupsuccess'])&& $_GET['signupsuccess']=="true"){
  echo '<div class="alert my-0 alert-success alert-dismissible fade show" role="alert">
  <strong>Successfully created account!</strong> You can login now.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['signupsuccess'])&& $_GET['signupsuccess']=="false"){
  echo '<div class="alert my-0 alert-danger alert-dismissible fade show" role="alert">
  <strong>Cant create your account!</strong> Give correct password.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if(isset($_GET['delete'])&& $_GET['delete']=="true"){
  echo '<div class="alert my-0 alert-warning alert-dismissible fade show" role="alert">
    <strong>Successfully Deleted Your Comment!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
if(isset($_GET['status'])&& $_GET['status']==1){
  echo '<div class="alert my-0 alert-warning alert-dismissible fade show" role="alert">
    <strong>You Cant Log in!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

// if(isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']==true){
//   echo '<div class="alert my-0 alert-success alert-dismissible fade show" role="alert">
//   <strong>Successfully logged in!</strong>
//   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// </div>';
// }
// if(!isset($_SESSION['loggedin'])){
//   echo '<div class="alert my-0 alert-danger alert-dismissible fade show" role="alert">
//   <strong>Failed to log in! Please give correct email and password</strong>
//   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// </div>';
// }
?>