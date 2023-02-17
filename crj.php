<?php 

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lobby-page</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">
</head>
<body>
    <div class="logo">
    <a href="logout.php" class="btn">Logout</a>
    </div>
    <div class="container">
        <div id="home" class="flex-column flex-center">
            <h1>Welcome to study room</h1>
            <a href="groupregister.php" class="btn">Create Group</a>
            <a href="exp.php"  class="btn" id="highscore-btn">Join Group</a>
        </div>
    </div>
</body>
</html>