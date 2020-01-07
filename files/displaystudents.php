<!DOCTYPE html>
<html>
<head><title>Student Page</title>
<script>
</script>
	
</head>

<body class="body">
   
<!--<font size="5"-->
	<!-- -->
	
	<h1>Students: </h1>
	
	<?php
	
	$servername = "localhost";
	$username = "tempuser";
	$password = "Temppass@1";
	$databasename = "tempDB";

	$con = mysqli_connect($servername,$username,$password,$databasename);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

	$sql = "SELECT * FROM Student_Details";
	
	$result = mysqli_query($con, $sql);
	//$result2 = $result;
	
	//echo "<script type=text/javascript>alert('So, javascript works in the php tag!');</script>";
	
$flag=0;

$rno=0;
	
	
	
if (mysqli_num_rows($result) > 0) 
{
	echo"<table width='200' border='1'>";
	
    while($row = mysqli_fetch_assoc($result)) 
	{
			if($flag==0)
			{
				echo "<tr><th>Name</th><th>Roll_No</th><th>Seat_No</th><th>Year</th><th>Email</th><th>Contact_No</th><th>Verification</th></tr>";		
				$flag=1;
			}
			echo "<tr><td>".$row["Name"]."</td><td>".$row["Roll_No"]."</td><td>".$row["Seat_No"]."</td><td>".$row["Year"]."</td><td>".$row["Email"]."</td><td>".$row["Contact_No"]."</td><td>".$row["Verification"]."</td></tr>";
			
		}
		
	}
	
	/*
	<form id='f4' name='StudentsDispForm' action='./addmarks.php' method='post'>
	<br>Enter the roll number of the student to view or add his/her marks: 
		<br><input type='text' name='rollmarks'><br>
		<input type='submit' value='Submit'>
	</form>
	*/
	
	?>
	
<script>

</script>
       
<!--</font-->
</body>
</html>

