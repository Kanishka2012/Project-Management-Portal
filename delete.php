<?php 
// include("connection_project.php");
$conn=mysqli_connect("localhost","root","");
mysqli_select_db($conn,"Project");
$sno=$_GET['sno'];
$delete_query="delete from project WHERE sno='$sno'";
$run=mysqli_query($conn,$delete_query);
if($run){
    header("location:view.php");
}
?>