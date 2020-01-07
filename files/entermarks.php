<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head><title>Student Page</title>
<script>
</script>
	
</head>

<body class="body">
   
<!--<font size="5"-->
	<!-- -->
	
	<h1>Entering marks.</h1>
	
	<?php
	
	$s1 = $_POST["sub1"];
	$s2 = $_POST["sub2"];
	//$roll = $_POST["textarea2"];
	//$roll = $_POST["rolll"];
	$roll = $_SESSION["globalroll"];
	//echo "SESSION['globalroll']: ".$_SESSION["globalroll"];
	
	$servername = "localhost";
	$username = "tempuser";
	$password = "Temppass@1";
	$databasename = "tempDB";

	$con = mysqli_connect($servername,$username,$password,$databasename);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

	$sql = "INSERT INTO Student_Marks VALUES(".$roll.",".$s1.",".$s2.")";
	
	//echo "<BR> Query when inserting marks: ".$sql;
	
	mysqli_query($con, $sql);
	
	
	/*$sqlthree = "INSERT INTO Student_Pass VALUES ('".$email."', '".$pass."')";
		mysqli_query($con,$sqlthree);*/
		
	
	
?>
	
<!--</font-->
</body>
</html>

