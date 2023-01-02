<?php
if(isset($_GET['sno'])){
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"project");
$sno=$_GET['sno'];
$sql = " SELECT * FROM project WHERE sno='$sno'";
$result = mysqli_query($conn,$sql);

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
   
    <h1>Project Details</h1>
    <?php  while($rows=$result->fetch_assoc()){ ?>
         
        <form action="edit.php" method="POST">
            <input type="text" name="name" id="name" value="<?php echo $rows['name']?>">
            <textarea name="desc" id="desc" cols="30" rows="10"><?php echo $rows['desc']?></textarea>
            <input type="file" name="file" id="file" accept="application/pdf" value="<?php echo $rows['file']?>">
            <input type="date" name="startDate" id="gender" value="<?php echo $rows['startDate']?>">
            <input type="date" name="deadline" id="email" value="<?php echo $rows['deadline']?>">
            <label for="managers" class="font_size">Choose a Manager:</label>
            <select id="manager" name="pManager" value="<?php echo $rows['pManager']?>" >
            <option value="" disabled selected>Select your option</option>
                <option value="Ramakrishnan Narayan">Ramakrishnan Narayan</option>
               <option value="Girish Sachdeva">Girish Sachdeva</option>
               <option value="Ramanya Devi">Ramanya Devi</option>
               <option value="Rani Singh">Rani Singh</option>
               <option value="Ram Kumar">Ram Kumar</option>
                <option value="Nivedita Sharma">Nivedita Sharma</option>
            </select>
            <label for="developers" class="font_size">Choose a Developer:</label>
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
                <input type="hidden" name="sno" value="<?php echo $rows['sno'] ?>">
                 <button class="btn" name="submit"> Submit</button>
            </form>
            
            <!-- <button class="btn">Reset</button> -->
        </form>
        <?php }?>
    </div>
</body>
</html>






   