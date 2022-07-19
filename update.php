 <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'common/db_connect.php';
    $title=$_POST['title'];
    $desc=$_POST['description'];
    $catid=$_POST['hidden'];
    $file =$_FILES['updatefile'];
    //   print_r($file);
        $fileName=$file['name'];
        $filePath=$file['tmp_name'];
        $fileError=$file['error'];
        if($fileError==0){
            $newdestFile="upload/".$fileName;
            move_uploaded_file($filePath,$newdestFile);
      
         $inertsql="UPDATE `categories` SET `categori_name`='$title',`categori_description`='$desc', `pic`='$newdestFile'  WHERE `categori_id`='$catid'";
         $result=mysqli_query($conn,$inertsql);
         if($result){
             header('Location:admin.php?cp=false');
         }
         else{
             echo "Error: " . $inertsql . "<br>" . mysqli_error($conn);
         }
        }
     
    }
      
  
      
  
  ?>