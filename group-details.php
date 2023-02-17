<?php   
 include 'config.php';
 session_start();
 if (!isset($_SESSION['username'])) {
     header("Location: index.php");
 }
 $groupname=$_GET['pro'];
 $sql = "SELECT  groupname, subjectt, leader, startdate, enddate FROM groups WHERE groupname='$groupname'";
 $result = $conn->query($sql);
 
 if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
     echo"<h1>Group name : ". $row["groupname"]." </h1>";
     echo"<h1>Subject : ". $row["subjectt"]." </h1>";
     echo"<h1>leader name : ". $row["leader"]." </h1>";
     echo"<h1>Start date : ". $row["startdate"]." </h1>";
     echo"<h1>End date : ". $row["enddate"]." </h1>";
   }
 }
 ?>  
 <html>
    <head>
        <link rel="stylesheet" href="group-details.css">
    </head>
<body>
</body>
</html>