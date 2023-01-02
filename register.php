<?php
include("connection.php");
if(isset($_POST['register'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    if($email=='')  
    {  
        echo"<script>alert('Please enter the email')</script>";  
    exit();  
    }  
    if($password=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
        exit();  
    }  
    $check="select * from users WHERE email='$email'";
    $run_query=mysqli_query($conn,$check);
    if(mysqli_num_rows($run_query)>0){
        echo "<script>alert('Email $email is already exist in our database, Please try another one!')</script>";  
        exit();  
    }
    $hash_password=password_hash($password,PASSWORD_DEFAULT);
    $insert_user="insert into users (password,email) VALUE ('$hash_password','$email')";  
    if(mysqli_query($conn,$insert_user))  
    {  
        header("location:home.php");  
    }  
    else{
        echo "Error ";
    }
  
}

?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="heading">Register here</h1>
        <form action="register.php" method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button class="btn" name="register"> Register </button>
        </form>
        <div><b>Already registered ?</b> <br></b><a href="login.php">Login here</a><!--for centered text-->  </div>
    </div>
</body>
</html>