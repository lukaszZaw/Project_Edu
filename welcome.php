<?php
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        .sign{margin-right: ;}
        textarea{ width: 600px; height: 200px}
        .title{width: 200px; height: 30px}
    </style>
</head>
<body>
    <div class="page-header">
        <p class="sign"><a href="index.php" class="btn btn-danger">Sign Out</a></p>
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Welcome to our site.</h1>
        </br></br>
        <h2>Add new post</h2>
        <form action="new_script.php" method="post"></br>
            <input class="title" type="text" name="title" placeholder="Post Title" required/></br> </br>
            <textarea name="post" placeholder="Write your post." required></textarea> </br>
            <input style="margin-top:4px; width: 10%; height:25px" type="submit" value="ADD"/>   </br>
        </form> 

        <center>
            </br></br>
            <h2>Table</h2>         
            <form  action="chenge.php" method="post"></br>

                <table width="700" border="1" cellpadding="1px" cellspacing="1px">
                    <tr>
                        <th>Id post </th>
                        <th>Title </th>
                        <th>Text post </th>
                        <th>CheckBox </th>
                    </tr>
                   <?php 
                    require_once 'config.php'; 
                    $query = "SELECT * FROM blog_posts";
                    $run = mysqli_query($link, $query);
                    while($row=$run->fetch_assoc()){
                        ?>
                        <tr>
                            <th><?php echo $row['id']?></th>
                            <th><?php echo $row['title']?></th>
                            <th><?php echo $row['post']?></th>
                            <th><input type="checkbox" name="<?php echo $row['id'] ?>" <?php $check=$row['checkbox']; if($check==1) echo "checked"; ?> value=1></th>
                        </tr>
                    <?php
                    }
                    ?>

                </table>

            

            
            <input style="margin-top:4px; width: 10%; height:25px" type="submit" value="Change"/>
        </form>

        </br></br>           
        <h2>Add new picture</h2>
        <form action="add_picture.php" method="post" enctype="multipart/form-data"></br>
            
  	            <input type="file" name="image"></br>
  	               
            
            <input style="margin-top:4px; width: 10%; height:25px" type="submit" value="ADD" name="submit"/>   </br>
        </form> 


        </br></br>           
        <h2>Table picture </h2></br>
        <form  action="changep.php" method="post"></br>
            <table border='1' >
                <tr>
                    <th>Picture </th>
                    <th>CheckBox </th>
                </tr>
            <?php
                require_once 'config.php';
                $result= mysqli_query($link,"SELECT * FROM images");
            ?>

                <?php
                while($row = $result->fetch_assoc() )
                {
                ?>

                <tr>
                    <th><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" width="150" height="150"/>'; ?> </th>
                    <th ><input type="checkbox" name="<?php echo $row['id'] ?>" <?php $check=$row['checkbox']; if($check==1) echo "checked"; ?> value=1></th>
                </tr>

                <?php } ?>
            </table> 

            <input style="margin-top:4px; width: 10%; height:25px" type="submit" value="Change"/>

        </form>


        </center>                  
                    
    </div>
  
</body>
</html>
