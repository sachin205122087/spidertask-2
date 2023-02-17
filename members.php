<?php   
 include 'config.php';
 session_start();
 if (!isset($_SESSION['username'])) {
     header("Location: index.php");
 }
 $groupname=$_GET['pro'];
 $query="select * from gm where groupname='$groupname' UNION select * from gm where groupname='$groupname'";
 $connect=mysqli_query($conn,$query);  
 $num=mysqli_num_rows($connect);
 ?>

 <html>
    <head>
        <link rel="stylesheet" href="members.css">
</head>
 <body class="membersidebar">  
 <div class="container">
 <?php echo "<h1>$groupname members</h1>"; ?>
      <table>          
           <?php   
                if ($num>0) {  
                     while($data=mysqli_fetch_assoc($connect)){  
                         echo "<tr>"; 
                         echo "  
                               <td><h2>".$data['username']."</h2></td>
                          ";
                          echo "</tr>";  
                     }  
                }  
           ?>  
      </table>  
 </div>  
 </body>  
 </html> 
