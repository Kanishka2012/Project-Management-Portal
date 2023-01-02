<?php 

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
        <h1 class="heading">Login here</h1>
        <form action="login.php" method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button class="btn" name="login"> Login </button>
        </form>
       
    </div>
    
</body>
</html>

<?php 
include("connection.php");
session_start();
if(isset($_SESSION["email"])){
    header("location:home.php");
    exit();
}
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $check_user="select * from users WHERE email='$email'AND password='$password'";  
    $run=mysqli_query($conn,$check_user); 
    if(mysqli_num_rows($run)){
        $_SESSION['email']=$email;
        header("location:home.php");
    } 
    else{
        echo "<script>alert('Email or password is incorrect!')</script>";
    }
}

?>