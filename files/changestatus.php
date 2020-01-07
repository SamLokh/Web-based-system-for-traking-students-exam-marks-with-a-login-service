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
	
$changedroll = $_POST["ver"];
	
	
if (mysqli_num_rows($result) > 0) 
{
	echo"<table width='200' border='1'>";
	
    while($row = mysqli_fetch_assoc($result)) 
	{
		if($row["Verification"]=="Not Verified")
		{
			if($row["Roll_No"]==$changedroll)
			{
				$sqlupdate = "UPDATE Student_Details set Verification='Verified' where Roll_No=".$changedroll.";";
				echo "<br>sqlupdate statement : ".$sqlupdate;
				
				mysqli_query($con, $sqlupdate);
				
				header("Location: /files/verifystudents.php");
			}
		}
	}
}
