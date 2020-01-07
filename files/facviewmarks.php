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
	
	<h1>Student Marks: </h1>
	
	<?php
	
	$servername = "localhost";
	$username = "tempuser";
	$password = "Temppass@1";
	$databasename = "tempDB";

	$con = mysqli_connect($servername,$username,$password,$databasename);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

	//$sql = "SELECT Stundent_Details.Name,Stundent_Marks.Roll_No, FROM Student_Details";
	$sql = "SELECT * FROM Student_Marks";
	
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
				echo "<tr><th>Roll_No</th><th>Subject 1</th><th>Subject 2</th></tr>";		
				$flag=1;
			}
			echo "<tr><td>".$row["Roll_No"]."</td><td>".$row["Subject_1"]."</td><td>".$row["Subject_2"]."</td></tr>";
			
		}
		
	}

	
	?>
	
<script>

</script>
       
<!--</font-->
</body>
</html>

