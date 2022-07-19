<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
        #ques {
            min-height: 433px;
        }
        .s{
            background: linear-gradient(#e66465, #9198e5);
        }
        .c{
            background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
<?php include 'common/db_connect.php';?>
    <?php include 'common/_header.php';?>
    
    <?php
  $id=$_GET['threadid'];

  $sql="SELECT * FROM `thread` WHERE `thread_id`=$id";
  $result= mysqli_query($conn,$sql);
  while($row= mysqli_fetch_assoc($result)){
      $title=$row['thread_title'];
      $desc=$row['thread_desc'];
      $id=$row['thread_id'];
      $thread_user_id=$row['thread_user_id'];
      $thread_time=$row['timestamp'];
      $sql3="SELECT * FROM `users` WHERE sno='$thread_user_id'";
      $result3=mysqli_query($conn, $sql3);
      $row2= mysqli_fetch_assoc($result3);
      $posted_by=$row2['user_email'];
            
        }
   
    
    
    ?>
    <?php
    $showAlert= false;
    $mehod=$_SERVER['REQUEST_METHOD'];
    // echo $mehod;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $comment=$_POST['comment'];
       if($comment==""){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Cant Comment</strong>Your comment can not be added please write something        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
       }
else{
           
    $comment = str_replace("<","&lt;",$comment);
    $comment = str_replace(">","&gt;",$comment);

    $sno=$_POST['sno'];
    
    // echo "THis is title". $th_title;
    // echo "THis is desc". $th_desc;
  $sql="INSERT INTO `comments`(`comment_content`, `thread_id`, `comment_by`)
         VALUES ('$comment','$id','$sno')";
    $result=mysqli_query($conn, $sql);
 
    $showAlert=true;
  
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Commented</strong>Your comment has been added successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
   
}
    }
    
    
    ?>
    <div class="container my-4 s p-5 border rounded" id="ques">
        <div>
            <h1><i><?php echo $title?></i>
            </h1>
            <p><?php echo $desc?></p>
            <hr>
            <p>No Spam / Advertising / Self-promote in the forums. ... Do not post copyright-infringing
                material. ... Do
                not post “offensive” posts,
                links or images. ... Do not cross post questions. ... Do not PM users asking for help. ...
                Remain
                respectful of other members at all times.</p>
                
                <p>Posted by : <em><b><?php echo $posted_by;?></em></b></p>
                <a class="btn btn-primary" href="">Submit</a>
        </div>
    </div>

    <?php 
    if(isset( $_SESSION['loggedin']) &&   $_SESSION['loggedin']==true){
    echo '<div class="container my-3">
        <h1>Post a Comment</h1>
        <form action="'. $_SERVER["REQUEST_URI"] .'" method="post">

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Comment Your solutions</label>
        <textarea class="form-control w-50" placeholder="Leave a comment here" id="comment" name="comment"></textarea>
        <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
    </div>


    <button type="submit" class="btn c">Post Comment</button>
    </form>
    </div>';
    }
    else{
    echo '<div class="container bg-light">
        <div class="my-5">
            <p>You are not logged in. Please log in to ask a question</p>

        </div>

    </div>';

    }
    ?>

    <div class="container">
        <h1>Discussions</h1>
        <?php
    $id=$_GET['threadid'];

    $sql="SELECT * FROM `comments` WHERE `thread_id`=$id";
    $result= mysqli_query($conn,$sql);
    $noResult=true;
    while($row= mysqli_fetch_assoc($result)){
        $noResult=false;
        $id=$row['comment_id'];
        $content=$row['comment_content'];
        $thread_user_id=$row['comment_by'];
        $sql3="SELECT * FROM `users` WHERE sno='$thread_user_id'";
        $result3=mysqli_query($conn, $sql3);
       $row2= mysqli_fetch_assoc($result3);
        // $row2['user_email'];
        // $id=$row['thread_id'];
        // $thread_time=$row['timestamp'];
       
        
  
        echo  '   <div class="d-flex mb-2 c bg-light w-50 p-5">
        <div><img src="images/download.png" width="54px" alt=" ..." class="mb-2"></div>
        <div class="ms-2">
            '.$content.'

            <p>Answered by: '.$row2['user_email'].'</p>
        </div>
    </div>';

}  
if($noResult) {
     echo '<div class="c my-5 border container rounded w-50">
    <div class="">
    <p class="display-5 text-center ">No Comments Found</p>
    <p class="text-center ">Be the first person to ask a question</p>
    </div>
    </div>';

}  
?>

    </div>

    <?php include 'common/_footer.php';
    ?><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>