<?php
if(isset($_POST['submit'])){
    $conn=mysqli_connect("localhost","root","");
     mysqli_select_db($conn,"project");
    // SQL query to select data from database
    $sno=$_POST['sno'];
    $name=$_POST['name'];
    $desc=$_POST['desc'];
    $file=$_POST['file'];
    $startDate=$_POST['startDate'];
    $deadline=$_POST['deadline'];
    $pManager=$_POST['pManager'];
    $developer=$_POST['developer'];
    $status=$_POST['status'];
   
    try{
   $update_query = "UPDATE project 
   SET `name`='$name',
       `desc`='$desc',
       `file`='$file',
       `startDate`='$startDate',
       `deadline`='$deadline',
       `pManager`='$pManager',
       `developer`='$developer',
       `status`='$status'  
       WHERE sno='$sno'";
        $run=mysqli_query($conn,$update_query);
    }
    catch (mysqli_sql_exception $e) { 
        var_dump($e);
        exit; 
     } 
    if($run){
        header("location:view.php");
    }
}
?>