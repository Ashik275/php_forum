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

    <?php $catid=$_GET['catid'];

    $sql="SELECT * FROM `categories` WHERE `categori_id`=$catid";
    $result=mysqli_query($conn, $sql);

    while($row=mysqli_fetch_assoc($result)) {
        $catName=$row['categori_name'];
        $catDesc=$row['categori_description'];
        
    }

    ?>
    <?php
    $showAlert= false;
    $mehod=$_SERVER['REQUEST_METHOD'];
    // echo $mehod;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $th_title=$_POST['title'];
        $th_desc=$_POST['desc'];
      if($th_title=="" and $th_desc==""){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Cant Post </strong>Your post can not be added please write something        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }
      else{
        $th_title = str_replace("<","&lt;",$th_title);
        $th_title = str_replace(">","&gt;",$th_title);

        $th_desc = str_replace("<","&lt;",$th_desc);
        $th_desc = str_replace(">","&gt;",$th_desc);

        $sno=$_POST['sno'];
        // echo "THis is title". $th_title;
        // echo "THis is desc". $th_desc;
      $sql="INSERT INTO `thread`(`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) 
            VALUES ('$th_title','$th_desc','$catid','$sno')";
        $result=mysqli_query($conn, $sql);
        $showAlert=true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Qustion added</strong>Your question has been added successfully please wait for some one to answer.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
      }

     
    
     
    }
    
    
    ?>
    <div class="container my-4 s p-5 border rounded" id="ques">
        <div>
            <h1>Welcome To <b><i>
                        <?php echo $catName?>
                    </i></b></h1>
            <p>
                <?php echo $catDesc?>
            </p>
            <hr>
            <p>No Spam / Advertising / Self-promote in the forums. ... Do not post copyright-infringing material.
                ... Do
                not post “offensive” posts,
                links or images. ... Do not cross post questions. ... Do not PM users asking for help. ... Remain
                respectful of other members at all times.</p>
        </div>
    </div>
    <?php

    if(isset( $_SESSION['loggedin']) &&   $_SESSION['loggedin']==true){
    echo ' <div class="container my-3">
        <h1>Ask a question</h1>
        <form action="'. $_SERVER["REQUEST_URI"] .'" method="post">
    <div class=" mb-3">
        <label for="exampleInputEmail1" class="form-label">Problem Title</label>
        <input type="text" class="form-control w-50" id="title" name="title">

    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Elaborate your Problem</label>
        <textarea class="form-control w-50" placeholder="Leave a comment here" id="desc" name="desc"></textarea>
    </div>
    <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">

    <button type="submit" class="btn btn-success">Submit</button>
    </form>
    </div>';

    }
    else{
    echo '<div class="container p-5 bg-light">
         <div class="my-5">
        <h3 class="text-bold text-center">You are not logged in. Please log in to ask a question</h3>
         
         </div>
    
    </div>';
    }
    ?>
    <div class="container my-2">
        <h1 class="text-bold text-center">Browse Questions</h1>
        <?php $id=$_GET['catid'];

    $sql="SELECT * FROM `thread` WHERE `thread_cat_id`=$id";
    $result=mysqli_query($conn, $sql);
    $noResult=true;
    // delete thread 
    // $sql4="SELECT * FROM `thread`";
    // $result4=mysqli_query($conn, $sql4);
    // $row4=mysqli_fetch_assoc($result4);

    while($row=mysqli_fetch_assoc($result)) {
        $noResult=false;
        $title=$row['thread_title'];
        $desc=$row['thread_desc'];
        $id=$row['thread_id'];
        $thread_user_id=$row['thread_user_id'];
        $thread_time=$row['timestamp'];
        $sql3="SELECT * FROM `users` WHERE sno='$thread_user_id'";
        $result3=mysqli_query($conn, $sql3);
       $row2= mysqli_fetch_assoc($result3);
    //     $row2['user_email'];
    echo '   <div class="d-flex c  border rounded mb-2">
    <div class="d-flex">
    <img src="images/download.png"width="54px"alt=" ..."class="border rounded-circle mx-2 my-2">
    </div>
    <div class="ms-2">
    <p class="my-0 fw-bold">'.$row2['user_email'].'</p> asked at '.$thread_time.'
    <a class="text-decoration-none text-dark"href="thread.php?threadid='.$id.'">
    <h5 class="my-0">'.$title . '</h5></a>
    '.$desc.'
    
    </div>';
    if(isset($_SESSION['loggedin']) &&  $_SESSION['loggedin']==true){
   echo' <div  class="container ms-5 d-flex align-items-center p-5">
    <button type="submit" class="btn btn-danger delete  " id="'.$row['thread_id'].'">Delete</button>
    </div>
    </div>';
    }

    }

    if($noResult) {
        echo '<div class="c my-5 border container rounded w-50">
                <div class="">
                <p class="display-5 text-center ">No Results Found</p>
                <p class="text-center ">Be the first person to ask a question</p>
                </div>
                </div>';

    }

    ?>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>
    <script>
        delets = document.getElementsByClassName('delete');
        Array.from(delets).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("delete", e);
                thread_id = e.target.id;
                // catId=e.target.catId;
                // console.log("cat",e.target.catId);
                // console.log(e.target.id);
                if (confirm("Press a button!")) {
                    window.location = `common/_handleDelete.php?delete=${thread_id}`;
                } else {

                }

            });
        });

    </script>
  <?php include 'common/_footer.php';
    ?>
</body>

</html>