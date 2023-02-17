
<?php
$conn=new PDO('mysql:host=localhost; dbname=spider', 'root', '') or die(mysql_error());
// include 'config.php';
// error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
$groupname=$_GET['pro'];
// echo "<h1 style='text-align:center;''>Welcome " . $_SESSION['username'] . " to " .$groupname. " Study Group</h1>";
$username = $_SESSION['username'];
$conn->query("replace into gm(groupname,username)values('$groupname','$username')");
if(isset($_POST['submit'])!=""){
  $name=$_FILES['file']['name'];
  $size=$_FILES['file']['size'];
  $type=$_FILES['file']['type'];
  $temp=$_FILES['file']['tmp_name'];
 
  $fname = date("YmdHis").'_'.$name;
  $chk = $conn->query("SELECT * FROM  upload where name = '$name' ")->rowCount();
  if($chk){
    $i = 1;
    $c = 0;
	while($c == 0){
    	$i++;
    	$reversedParts = explode('.', strrev($name), 2);
    	$tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
    // var_dump($tname);exit;
    	$chk2 = $conn->query("SELECT * FROM  upload where name = '$tname' ")->rowCount();
    	if($chk2 == 0){
    		$c = 1;
    		$name = $tname;
    	}
    }
}
 $move =  move_uploaded_file($temp,"upload/".$fname);
 if($move){
 	$query=$conn->query("insert into upload(name,fname,groupname)values('$name','$fname','$groupname')");
	if($query){
	header("location:upload.php");
	}
	else{
	die(mysql_error());
	}
 }
}
?>
<html>
<head>
<title>Upload and Download Files</title>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
        <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
</head>
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<link rel="stylesheet" href="upload.css">
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<style>
</style>
<body>
	    <div class="row-fluid">
	        <div class="span12">
	            <div class="container">
		<br />
		<?php
		echo "<h1 style='text-align:center;''>Welcome " . $_SESSION['username'] . " to " .$groupname. " Study Group</h1>";
		?>
		<h1 style='text-align:center;'><p>Upload  And  Download Files</p></h1>	
		<br />
		<br />
			<form enctype="multipart/form-data" action="" name="form" method="post">
				Select File
					<input type="file" name="file" id="file" /></td>
					<input type="submit" name="submit" id="submit" value="Submit" />
			</form>

		<br />
		<br />
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center">Files</th>
					<th align="center">Action</th>	
				</tr>
			</thead>
			<?php
			$query=$conn->query("select * from upload where groupname='$groupname'");
			while($row=$query->fetch()){
				$name=$row['name'];
			?>
			<tr>
			
				<td>
					&nbsp;<?php echo $name ;?>
				</td>
				<td>
					<button class="alert-success"><a href="download.php?filename=<?php echo $name;?>&f=<?php echo $row['fname'] ?>">Download</a></button>
				</td>
			</tr>
			<?php }?>
		</table>
	</div>
	</div>
	</div>
	<div class="second">
		<?php
				echo "<a href='members.php?pro=$groupname'class='btn'>Group-members</a>";
		?>
		<?php
		echo "<a href='group-details.php?pro=$groupname'class='btn'>Group-details</a>";
		?>
		<br><br>
		<h3>Group join link</h3>
	<?php  
  
  $url =  isset($_SERVER['HTTPS']) &&
  $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";  
   
  $url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];    
   
  print_r($url);
   
  ?>
	</div>

</body>
</html>
