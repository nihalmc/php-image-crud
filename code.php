<?php

session_start();

$conn= mysqli_connect("localhost","root","","phpcrud");

if(isset($_POST['save_image']))
{
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $image=$_FILES['image'] ['name'];

    $insert_image_query = "INSERT INTO students(name,phone,email,image)
    VALUES('$name','$phone', '$email','$image')";

  $insert_image_query_run = mysqli_query($conn,$insert_image_query );

if($insert_image_query_run)
{
    move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$_FILES['image']['name']);
    $_SESSION['status']="Image stored successfully";
    header('location: index.php');
}else{

    $_SESSION['status']="Image not stored successfully";
    header('location: index.php');
}
}

?>