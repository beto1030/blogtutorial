<?php
if(isset($_POST['submitttt'])){
   include_once("./subscribers_db.php"); 
   $name = $_POST['name'];  
   $email = $_POST['email'];  

   $conn = OpenCon();

   $sql = "INSERT INTO subscribers (name, email) VALUES ('$name','$email')";

   if(mysqli_query($conn, $sql)){
       echo "$name, added successfully.";
   } else {
       echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
   }

   CloseCon($conn);
   echo "<br><a href='../index.php'>Home</a>";
}
