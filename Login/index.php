<?php
include('operations.php');
include('connection.php');
if (isset($_POST['submit']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];
  $image_name = $_FILES['images'] ['name']; 
  $tmp_name = $_FILES['images'] ['tmp_name']; 
  $folder= "images/".$image_name;

  $filename_separate=explode('.',$image_name);
  $file_extension=strtolower(end($filename_separate));
  $extension=array('jpeg','jpg','png');
  if(in_array($file_extension,$extension)){

    move_uploaded_file($tmp_name,$folder);
    $sql="insert into `upload` (username,password,image) values ('$username','$password','$folder')";
    $result=mysqli_query($conn ,$sql);
    if($result){
        echo '<script>alert("data inserted")</script>';

    }else{
        die(mysqli_error($conn));
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <hr>

        <form action="index.php" method="post" enctype="multipart/form-data">
          
            <?php inputFields("Username", "username", "", "text")?>
            <?php inputFields("Password", "password", "", "password")?>
            
            <br>
        
            <br>
            <p class="forget">Forget Password?</p>
            <br>
            <p class="image">Choose an Image</p>
            <?php inputFields("", "images", "", "file")?>
           
            <br><br>
<br>
            <button type="submit" name="submit" class="btn">Login</button>
            <br>
            <p class="signup"> Not a member? <a href="#">Signup</a></p>
            <br>

        </form>
    </div>
</body>
</html>