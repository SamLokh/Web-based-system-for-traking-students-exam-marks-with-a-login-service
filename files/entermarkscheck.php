<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head><title>Student Page</title>
<script>
</script>
	
</head>

<body class="body" onload="hide3()">
   
<!--<font size="5"-->
	<!-- -->
	
	<form id='f5' name='EnterMarksForm' action='./entermarks.php' method='post'>
	<br>
		<br>Subject_1: <input type='text' name='sub1'>
		<br>Subject_2: <input type='text' name='sub2'>
		<!--<br>Roll_No.: <input type='text' name='rolll'>-->
		<br>
		<input type='submit' value='Submit'>
		
		<textarea name="textarea2"></textarea>
		
	</form>
	
	<script>
	
	function hide3()
	{
			var ta2=document.EnterMarksForm.textarea2;
			ta2.style.display="none";
	}

	</script>
	
	<?php
	
	$roll = $_POST["roll"];
	
	$_SESSION["globalroll"] = $roll;
	//echo "SESSION['globalroll']: ".$_SESSION["globalroll"];
	
	$servername = "localhost";
	$username = "tempuser";
	$password = "Temppass@1";
	$databasename = "tempDB";

	$con = mysqli_connect($servername,$username,$password,$databasename);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

	$sql = "SELECT * FROM Student_Details";
	$sql2 = "SELECT * FROM Student_Marks";
	
	$result = mysqli_query($con, $sql);
	$result2 = mysqli_query($con, $sql2);
	
	//echo "<script type=text/javascript>alert('So, javascript works in the php tag!');</script>";
	
$flagexist=0;
$flagverified=0;
$flagnopreventry=0;
	
$rno=0;
	
	
	
if (mysqli_num_rows($result) > 0) 
{	
    while($row = mysqli_fetch_assoc($result)) 
	{
		if($row["Roll_No"]==$roll)
		{
			$flagexist=1;
			if($row["Verification"]=="Verified")
			{
				$flagverified=1;
			}
			else
			{
				echo "<br> Student exists but has not been verified yet.";
				header("Location: /facultypage.html");
				//exit();
			}		
		}
	}
}

if (mysqli_num_rows($result2) > 0) 
{	
    while($row2 = mysqli_fetch_assoc($result2)) 
	{
		if($row2["Roll_No"]!=$roll)
		{
			$flagnopreventry=1;
		}
		else
		{
			echo "Marks for this roll number has already been entered.";
			$flagnopreventry=0;
			header("Location: /facultypage.html");
			//exit();
		}
	}
}
	
	if($flagexist==1 and $flagverified==1 and $flagnopreventry==1)
	{	
		/*
		echo "<br>Enter the marks: <br>"
		echo "<br>Subject_1: <input type='text' name='sub1'><br>Subject_2: <input type='text' name='sub2'><br>";
		header("./entermarks.php");	
		*/
		
		//echo "<script type=text/javascript>var ta2=document.EnterMarksForm.textarea2;ta2.value='';ta2.value=$roll;alert('ta2.value: '+ta2.value);</script>"
		
	}
	else
	{
		exit();
	}

	?>
	
<!--</font-->
</body>
</html>

