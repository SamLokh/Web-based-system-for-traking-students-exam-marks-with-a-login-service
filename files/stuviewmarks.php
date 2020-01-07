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
	
	<h1>Your Marks: </h1>
	
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
	$sql = "SELECT * FROM Student_Details";
	
	$result = mysqli_query($con, $sql);
	//$result2 = $result;
	
	
	$sql2 = "SELECT * FROM Student_Marks";
	
	$result2 = mysqli_query($con, $sql2);
	
	
	//echo "<script type=text/javascript>alert('So, javascript works in the php tag!');</script>";
	
$flag=0;

$rno=0;
	
	//echo "SESSION['stumail']: ".$_SESSION["stumail"];
	
	if (mysqli_num_rows($result) > 0) 
	{
    	while($row = mysqli_fetch_assoc($result)) 
		{
			if($row["Email"]==$_SESSION["stumail"])
			{
				$rno = $row["Roll_No"];
				//echo "<br>rno: ".$rno;
			}
		}
	}//this block can also be replaced by a single SELECT statement whith a where clause!

	
	$tempflag=0;
	
	if (mysqli_num_rows($result2) > 0) 
	{
    	while($row2 = mysqli_fetch_assoc($result2)) 
		{
			if($row2["Roll_No"]==$rno)
			{
				//echo "<br>row['Roll_No']: ".$row2["Roll_No"]."<br><br>";
				
				echo"<table width='200' border='1'>";			
				echo "<tr><th>Roll_No</th><th>Subject 1</th><th>Subject 2</th></tr>";		
				echo "<tr><td>".$row2["Roll_No"]."</td><td>".$row2["Subject_1"]."</td><td>".$row2["Subject_2"]."</td></tr>";
			
				$tempflag=1;
			}
		}
	}
	
	if($tempflag==0)
	{
		echo "<br>Marks not entered yet.";
	}
	
	?>
	
<script>

</script>
       
<!--</font-->
</body>
</html>

