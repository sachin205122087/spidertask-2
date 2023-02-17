<?php   
 include 'config.php';
 session_start();
 if (!isset($_SESSION['username'])) {
     header("Location: index.php");
 }
 $query="select * from groups";  
 $connect=mysqli_query($conn,$query);  
 $num=mysqli_num_rows($connect);  
 ?>  
 <!DOCTYPE html>  
 <html>  
 <head>  
      <meta charset="utf-8">  
      <title></title>  
      <style type="text/css">  
           *{  
                padding: 0;  
                margin: 0;  
                box-sizing: border-box;  
           }  
           body{  
                width: 100%;  
                min-height: 100vh;
                background:url(bg3.jpg);
                background-repeat:no-repeat;
                background-size:cover;   
           }  
           .container{  
                max-width: 900px;  
                margin: 100px auto;  
                width: 100%;  
           }  
           table{  
                border-collapse: collapse;  
                width: 100%;
                 
           }  
           table th{  
                background-color: red;  
                color: #fff;  
                padding: 10px;  
           }  
           table td{  
                padding: 12px;  
                color:rgb(244, 85, 5);  
                font-size: 1em;  
                text-align: center;  
           }  
           table tr:nth-child(odd){  
                background-color:rgb(32, 31, 31);;  
           }
           h4{
               font-size: 2rem;
               color:rgb(244, 85, 5);
           }
           .btn {
    font-size: 1.5rem;
    width: 40%;
    margin-right: 1rem;
    margin-top: 2rem;
    text-align: center;
    text-decoration: none;
    color: rgb(239, 234, 234);
    background: linear-gradient(90deg, rgb(244, 85, 5) 0%, rgb(0, 4, 255) 100%);
    border-radius: 2px;
}

.btn:hover {
    cursor: pointer;
    box-shadow: 0 0.4rem 1.4rem 0 rgba(216, 220, 4, 0.6);
    transition: transform 150ms;
    transform: scale(1.03);
}

.btn[disabled]:hover {
    cursor: not-allowed;
    box-shadow: none;
    transform: none;
}
           body{
               background-color:black;
           }
      </style>  
 </head>  
 <body>  
 <div class="container">  
      <table border="1">  
           <tr>  
                <th>Group name</th>
                <th>Click to join</th>   
           </tr>  
           <?php   
                if ($num>0) {  
                     while($data=mysqli_fetch_assoc($connect)){  
                         echo "<tr>"; 
                         echo "  
                               <td><h4>".$data['groupname']."<h4></td>
                          ";
                          $d = $data['groupname'];
                          echo "<td><a class='btn' href='upload.php?pro=$d'>join</a></td>";
                          echo "</tr>";  
                     }  
                }  
           ?>  
      </table>  
 </div>  
 </body>  
 </html> 