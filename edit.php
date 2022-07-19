<?php
include 'common/db_connect.php';
$catid=$_GET['id'];

$sql="SELECT * FROM `categories` WHERE `categori_id`=$catid";
$result=mysqli_query($conn, $sql);

while($row=mysqli_fetch_assoc($result)) {
    $catName=$row['categori_name'];
    $catDesc=$row['categori_description'];
  
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
  <div class="container w-25">
  <form action="update.php" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <input type="hidden" name="hidden" value='<?php echo $catid;?>'>
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" value="<?php echo $catName;?>" class="form-control" id="name" name="title" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
        <div class="form-floating">
        <textarea class="form-control" value='' placeholder="Leave a comment here" id="description" name="description"></textarea>
        <label for="floatingTextarea"><?php echo substr($catDesc,0,45) ; ?></label>
        </div>
  </div>
  <div class="mb-3">
    <input type="file" name="updatefile" id="file">
   
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

