<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
            #container{
                min-height:85vh;
            }
        </style>
</head>

<body>
    <?php include 'common/db_connect.php';?>
    <?php include 'common/_header.php'; ?>

     <!-- Search result  -->
     <div class="container my-4 searchResults" id="container">
         <h1>Search Results for <?php echo $_GET['search']?></h1>
         <?php
                $noResult=true;
                $query=$_GET["search"];
                $sql="SELECT * FROM `thread` WHERE match (thread_title,thread_desc) against('$query')";
                $result= mysqli_query($conn,$sql);
               
                while($row= mysqli_fetch_assoc($result)){
                    $noResult=false;
                    $title=$row['thread_title'];
                    $desc=$row['thread_desc'];
                    $thread_id=$row['thread_id'];
                    $url="thread.php?threadid=".$thread_id;
                    //display search result
                    echo ' <div class="result">
                    <h3>
                        <a class="text-dark"  href="'.$url.'">'.$title.'</a>
                    </h3>
                    <p>'.$desc.'</p>
                    </div>';
           
                 }
                 if($noResult){
                    echo '<div class="bg-light border rounded w-50">
                        <div class="container"><p class="display-5">No Results Found</p>
                        <p>Suggestions:<ul>

                        <li>Make sure that all words are spelled correctly.</li>
                        <li>Try different keywords.</li>
                        <li>Try more general keywords.</p></div></div></li>
                        </ul>
                        ';
                        
                }
        ?>

     </div>


    


    <?php include 'common/_footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>