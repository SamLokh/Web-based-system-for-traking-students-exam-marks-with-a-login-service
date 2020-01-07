<!DOCTYPE html>
<html>
<head><title>Student Page</title>
<script>
</script>
	
</head>

<body class="body">
   
<!--<font size="5"-->
	<!-- -->
	
	<h1>Students to be verified: </h1>
	
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
		if($row["Verification"]=="Not Verified")
		{
			if($flag==0)
			{
				echo "<tr><th>Name</th><th>Roll_No</th><th>Seat_No</th><th>Year</th><th>Email</th><th>Contact_No</th><th>Verification</th></tr>";		
				$flag=1;
			}
			echo "<tr><td>".$row["Name"]."</td><td>".$row["Roll_No"]."</td><td>".$row["Seat_No"]."</td><td>".$row["Year"]."</td><td>".$row["Email"]."</td><td>".$row["Contact_No"]."</td><td>".$row["Verification"]."</td></tr>";
			
		}
		
	}
	
}
	$tempvar;
	if($flag==1)
	{
		/*
		echo "<br><br>Enter the roll number of the student who is authentic : ";
		echo "<br><input type='text' name='ver' id='t'><br><input type='button' value='Submit' onclick='changestatus()'><br>";
		//onclick='changestatus()'
		echo "<script>var tb=document.getElementById('t');function changestatus(){alert('The stuff you entered in the textbox:'+tb.value);/*document.getElementById('t').value='Changed value!';*///$tempvar=tb.value;}</script>";*/
		//echo "Echoing value of tempvar later: ".$tempvar;
		/*
		echo "<form id='f3' name='VerifyForm' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'><br><input type='text' name='ver' id='t'><br><input type='submit' value='Submit'></form>"
		*/	
		//$changedroll = $_POST["ver"];
		//echo "<br> The roll number you entered : ".$changedroll;
		
	}
	
	/*
	$changedroll = $_POST["ver"];
	
	if (mysqli_num_rows($result) > 0) 
	{	
    	while($row = mysqli_fetch_assoc($result)) 
		{
			if($row["Roll_No"]==$changedroll)
			{
				$sqlupdate = "UPDATE Student_Details set Verification='Verified' where Roll_No=".$changedroll.";";
				echo "<br>sqlupdate statement : ".$sqlupdate;
				
				mysqli_query($con, $sqlupdate);
				
			}
		}
	}
	*/	
	/*<form id='f3' name='VerifyForm' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>*/
	?>
	<form id='f3' name='VerifyForm' action='./changestatus.php' method='post'>
	<br>Enter the roll number of the student whose detials are correct and you want to verify: 
		<br><input type='text' name='ver' id='t'><br>
		<input type='submit' value='Submit'>
	</form>
	
<script>

</script>
       
<!--</font-->
</body>
</html>

