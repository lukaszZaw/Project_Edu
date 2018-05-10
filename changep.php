<?php
require_once 'config.php';
$query = "SELECT * FROM images";
$run = mysqli_query($link, $query);
while($row=$run->fetch_assoc()){
    $id=$row['id'];
    if(isset($_POST[$id])){
        echo "TRUE";
    $sql="UPDATE images SET checkbox=1 WHERE id=$id";
    mysqli_query($link,$sql);
    }else{
        echo "FALSE";
        $sql="UPDATE images SET checkbox=0 WHERE id=$id";
        mysqli_query($link,$sql);
    }

}



header("location: welcome.php");
?>