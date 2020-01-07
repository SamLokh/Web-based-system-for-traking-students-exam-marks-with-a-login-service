<?php
session_start();
	
$level = format($_POST["level"]);
$uname = format($_POST["username"]);

$pass=trim($_POST["password"]);



function format($data)
	{
		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

$servername = "localhost";
$username = "tempuser";
$password = "Temppass@1";
$databasename = "tempDB";

$con = mysqli_connect($servername,$username,$password,$databasename);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if($level=="student")
{
	$sql = "SELECT Student_Details.Email, Student_Details.Verification, Student_Pass.Password FROM Student_Details INNER JOIN Student_Pass ON Student_Details.Email=Student_Pass.Email";
}
if($level=="faculty")
{
	$sql = "SELECT Faculty_Details.Email, Faculty_Details.Verification, Faculty_Pass.Password FROM Faculty_Details INNER JOIN Faculty_Pass ON Faculty_Details.Email=Faculty_Pass.Email";
}

$result = mysqli_query($con, $sql);


if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		/*
		if($level=="student")
		{
			if($row["Email"]==$uname && $row["Verification"]=="Not Verified")
			{
				echo "<br> Your account has not been verified yet. Please try again in sometime, and if the issue persists, check with the supervisor.<br>";
			}
			elseif($row["Email"]==$uname && $row["Verification"]=="Verified")
			{
				if($row["Password"]==$pass)
				{
 					header("studentpage.html");
 					exit();
				}
				else
				{
					echo "<br> Incorrect password, retry.";
				}
			}
			else
			{
				echo "\n User not present, please signup.";
			}
		}
		
		if($level=="faculty")
		{
			
		}
		*/
		
			/*
			echo $row["Email"]."<br>";
			echo $row["Verification"]."<br>";
			echo $row["Password"]."<br>";
			echo "<br>";
			*/
		
			//echo "<br>".$level;
		
			if($row["Email"]==$uname and $row["Verification"]=="Not Verified")
			{
				echo "<br> Your account has not been verified yet. Please try again in sometime, and if the issue persists, check with the supervisor.<br>";
			}
			elseif($row["Email"]==$uname and $row["Verification"]=="Verified")
			{
				if($row["Password"]==$pass)
				{
					if($level=="student")
					{	
						echo "<br> Login successful! (Student)";
						$_SESSION["stumail"] = $uname;
						header("Location: /studentpage.html");
						exit();
					}
					if($level=="faculty")
					{
						echo "<br> Login successful! (Faculty)";
						$_SESSION["facmail"] = $uname;
						header("Location: /facultypage.html");
						exit();
					}
 		
 					//exit();
				}
				else
				{
					echo "<br> Incorrect password, retry.";
				}
			}
			else
			{
				echo "<br> User not present, please signup. (Inside nested if-else).";
			}
		}
	}
else
{
	echo "\n User not present, please signup.";
}

?>
