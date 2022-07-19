<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <?php include 'common/db_connect.php';?>
    <?php include 'common/_header.php'; ?>
    


    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/python.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/python.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="images/python.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <div class="container">
        <h1 class="text-center bg-dark p-3 text-white my-5">i-discuss Categories</h1>
        <div class="row row-cols-1 row-cols-md-3 ">
            <!-- fetch all Categories  -->
            <?php
            $sql="SELECT * FROM `categories`";
            $result= mysqli_query($conn,$sql);
            while($row= mysqli_fetch_assoc($result)){
                // echo $row['categori_id'];
                $id= $row['categori_id'];
                $cat= $row['categori_name'];
                $pic=$row['pic'];
                // $pic= $row['pic'];
                $description= $row['categori_description'];
                echo ' <div class="col h-75">
                <div class="card h-100 shadow-lg">
                    <img src="'.$pic.'" class="card-img-top mt-2 w-25 h-25 rounded mx-auto d-block" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/forum/threadlist.php?catid='.$id.'">'.$cat.'</a><h5>
                        <p class="card-text">'.substr($description,0,90).'....</p>
                        <a href="/forum/threadlist.php?catid='.$id.'">
                        <button type="button" class="btn btn-info">View Thread</button>
                        </a>
                    </div>
                </div>
            </div>';
            }
            ?>


        </div>
    </div>


    <?php include 'common/_footer.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
<!-- https://source.unsplash.com/500x400/?'.$cat.',coding -->