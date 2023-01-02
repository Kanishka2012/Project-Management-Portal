<?php
if(isset($_GET['sno'])){

    $user = 'root';
$password = '';
$database = 'Project';
$servername='localhost';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
// SQL query to select data from database
$sql = " SELECT * FROM Project.project";
$result = $mysqli->query($sql);
$mysqli->close();
}


$user = 'root';
$password = '';

$database = 'Project';

$servername='localhost';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
 
// SQL query to select data from database
$sql = " SELECT * FROM Project  ";
$result = $mysqli->query($sql);
$mysqli->close();
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
    <h1 class="heading">Projects</h1>
   
    <?php  while($rows=$result->fetch_assoc()){ ?>
        <div >
      
            <div class="section">
            <p >Project Name : </p>
            <strong><?php echo $rows['name']."<br/>";?></strong>
            </div>
            <div class="section">
            <p >Project Description : </p>
            <strong><?php echo $rows['desc']."<br/>";?></strong>
            </div>
            <div class="section">
            <p>Project Prototype : </p>
            <strong><?php echo $rows['file']."<br/>";?></strong>
            </div>
            <div class="section">
            <p>Project Start Date :</p>
            <strong><?php echo $rows['startDate']."<br/>";?></strong>
            </div>
            <div class="section">
            <p>Project Deadline :</p>
            <strong><?php echo $rows['deadline']."<br/>";?></strong>
            </div>
            <div class="section">
            <p>Project Manager :</p>
            <strong><?php echo $rows['pManager']."<br/>";?></strong>
           
            </div>
            <div class="section">
            <p>Project Developer :</p>
            <strong><?php echo $rows['developer']."<br/>";?></strong>
            </div>
            <div class="section">
            <p>Status :</p>
            <strong><?php echo $rows['status'] ?></strong>
            </div>
       
            <!-- <form action="update.php" method="POST">
            <input type="hidden" name="sno" value="">
            <button class="btn" name="update" value="update">Update</button>
            </form> -->
           <?php $sno=$rows['sno'];?>
           <div class="button">
                <a href="update.php?sno=<?php echo $sno; ?>"><button class="btn">Update</button></a>
                <a href="delete.php?sno=<?php echo $sno ?>"><button class="btn">Delete</button></a>
           </div>
             <br/>
             <hr>
        </div>
        
     
        <?php }?>
    </div>
</body>
</html>