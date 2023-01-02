<?php 

if(isset($_POST['name'])){
    $server="localhost";
    $username="root";
    $password="";
  
    $con=mysqli_connect($server,$username,$password);
  
    if(!$con){
      die("Connection to this database failed due to ".
      mysqli_connect_error());
    }
  //   echo "Success connection to db";
  
  $name=$_POST['name'];
  $desc=$_POST['desc'];
  $file=$_POST['file'];
  $startDate=$_POST['startDate'];
  $deadline=$_POST['deadline'];
  $pManager=$_POST['pManager'];
  $developer=$_POST['developer'];
  $status=$_POST['status'];
  $sql="INSERT INTO `Project`.`project` (`name`, `desc`, `file`, `startDate`, `deadline`, `pManager`, `developer`,`status`) 
  VALUES ('$name', '$desc', '$file', '$startDate', '$deadline', '$pManager', '$developer', '$status' );";
  header("location:home.php");
  
  if($con->query($sql)==true){
      echo "Successfully inserted";
  }
  else{
      echo "Error: $sql <br> $con->error";
  }
  $con->close();
}
 
?>







<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Project Management Portal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
    <div class="container">
    <a class="home" href="home.php">Go To Home</a>
        <h1>Add a Project</h1>
        
        <form action="add.php" method="POST">
            <input type="text" name="name" id="name" placeholder="Project Name">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Project Description"></textarea>
            <input type="file" name="file" id="file" accept=".pdf" placeholder="Project Prototype">
            <input type="date" name="startDate" id="gender" placeholder="Project Start Date">
            <input type="date" name="deadline" id="email" placeholder="Project Deadline">
            <label class="font_size" for="managers">Choose a Manager:</label>
            <select id="manager" name="pManager" >
            <option value="" disabled selected>Select your option</option>
            <option value="Ramakrishnan Narayan">Ramakrishnan Narayan</option>
               <option value="Girish Sachdeva">Girish Sachdeva</option>
               <option value="Ramanya Devi">Ramanya Devi</option>
               <option value="Rani Singh">Rani Singh</option>
               <option value="Ram Kumar">Ram Kumar</option>
                <option value="Nivedita Sharma">Nivedita Sharma</option>
            </select>
            <label class="font_size" for="developers">Choose a Developer:</label>
            <select id="developer" name="developer" >
            <option value="" disabled selected>Select your option</option>
            <option value="PK Sindhu">PK Sindhu</option>
               <option value="Ramesh Verma">Ramesh Verma</option>
               <option value="Harish Sharma">Harish Sharma</option>
                <option value="Parakh Agrawal">Parakh Agrawal</option>
                <option value="Seema Singh">Seema Singh</option>
                <option value="Kavita Goyal">Kavita Goyal</option>
            </select>
            <p class="font_size">Project Status:</p>
            <div class="status">
            <input type="radio" id="zero" name="status" value="0">
  <label for="zero">Pending</label><br>
  <input type="radio" id="one" name="status" value="1">
  <label for="one">Completed</label><br>
  <input type="radio" id="two" name="status" value="2">
  <label for="two">Processing</label>
<input type="radio" id="three" name="status" value="3">
  <label for="three">Hold</label>
<input type="radio" id="four" name="status" value="4">
  <label for="four">Terminate</label>

            </div>
  
            <button class="btn"> Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
   
</body>
</html>

