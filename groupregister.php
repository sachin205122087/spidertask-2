<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['groupname'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$groupname = $_POST['groupname'];
	$subjectt = $_POST['subjectt'];
	$leader = $_POST['leader'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
		$sql = "SELECT * FROM groups WHERE groupname='$groupname'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO groups (groupname, subjectt, leader, startdate, enddate)
					VALUES ('$groupname', '$subjectt', '$leader', '$startdate', '$enddate')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Group Created join.')</script>";
				header("Location: crj.php");
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} 	
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="style.css">

	<title></title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Create a group</p>
			<div class="input-group">
				<input type="text" placeholder="groupname" name="groupname" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="subject" name="subjectt" value="<?php echo $subjectt; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="group-leader" name="leader" value="<?php echo $leader; ?>" required>
            </div>
            <div class="input-group">
				<input type="date" placeholder="start-date" name="startdate" value="<?php echo $startdate; ?>" required>
			</div>
            <div class="input-group">
				<input type="date" placeholder="end-date" name="enddate" value="<?php echo $enddate; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Create</button>
			</div>
			<p class="login-register-text">join a group ? <a href="index.php">click Here</a>.</p>
		</form>
	</div>
</body>
</html>