<?php

$firstname = ucfirst($_POST["firstname"]);
$middlename = ucfirst($_POST["middlename"]);
$lastname = ucfirst($_POST["lastname"]);

$level = format($_POST["textarea"]);
$firstname = format($firstname);
$middlename = format($middlename);
$lastname = format($lastname);
$rollno = format($_POST["rollno"]);
$seatno = format($_POST["seatno"]);
$year = format($_POST["year"]);
$email = format($_POST["email"]);
$contactno = format($_POST["number"]);

$division = (int)rollno[0];


$pass=trim($_POST["pass"]);
$repass=trim($_POST["repass"]);

if($middlename=="")
{
	$name = $firstname." ".$lastname;
}
else
{
	$name = $firstname." ".$middlename." ".$lastname;
}



echo "Details : <br><br>";
echo "<br> Name : ".$name;
echo "<br>".$level;
echo "<br>".$firstname;
echo "<br>".$middlename;
echo "<br>".$lastname;
echo "<br>".$rollno;
echo "<br>".$seatno;
echo "<br>".$year;
echo "<br>".$email;
echo "<br>".$contactno;
echo "<br><br> Division : ".$division;
echo "<br><br>";

echo $rollno[0];
echo $rollno[1];

echo "<br><br>";

function format($data)
	{
		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}




//Validation Part:

	//Student Validation:
	
	
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
	$sql = "SELECT Roll_No, Email, Contact_No, Verification FROM Student_Details";
}
if($level=="faculty")
{
	$sql = "SELECT Email, Contact_No, Verification FROM Faculty_Details";
}

$result = mysqli_query($con, $sql);


if (mysqli_num_rows($result) > 0) 
{
    while($row = mysqli_fetch_assoc($result)) 
	{
		
		/*
		
		This is what I initailly tried, but it does not seem to work for some reason. So using Flags now.
		
		if($level=="student")
		{
			/*
			echo "<br> row[Roll_No] = ".$row["Roll_No"];
			echo "<br> rollno = ".$rollno;
			echo "<br> row[Email] = ".$row["Email"];
			echo "<br> email = ".$email;
			echo "<br> row[Contact_No] = ".$row["Contact_No"];
			echo "<br> contactno = ".$contactno;
			
			echo "<br> row[Email]==email".$row["Email"]==$email;
			
			if($row["Email"]==$email)
			{
				echo "<br> Weird Logic!";
			}
			else
			{
				echo "<br> The Logic is sound.";
			}
			
			*/
			
			/* 
			
			
			if(($row["Roll_No"]==$rollno || $row["Email"]==$email || $row["Contact_No"]==$contactno) && $row["Verification"]=="Verified");
			{
				exit("Please enter the details again as there already exists an entry in our database with either the same Roll Number or Email or Contact Number as the one you have entered. Get lost you imposter!");
			}
			
		}
		if($level=="faculty")
		{
			if(($row["Email"]==$email || $row["Contact_No"]==$contactno) && $row["Verification"]=="Verified");
			{
				exit("Please enter the details again as there already exists an entry in our database with either the same Email or Contact Number as the one you have entered.");
			}
		}
		
		*/
		
		$rollno_f=$email_f=$contactno_f=$verification_f=0;
		$intermediate_f=0;
		
		if($row["Email"]==$email)
			{
				$email_f=1;
			}
		if($row["Roll_No"]==$rollno)
			{
				$rollno_f=1;
			}
		if($row["Contact_No"]==$contactno)
			{
				$contactno_f=1;
			}
		if($email_f==1 || $rollno_f==1 || $contactno_f==1)
			{
				$intermediate_f=1;
			}
		
		
		if($row["Verification"]=="Verified" && $intermediate_f==1)
			{
				exit("Please enter the details again as there already exists an entry in our database with either the same Roll Number or Email or Contact Number as the one you have entered. Get lost you imposter!");
			}
		
		
		
	}
} 

	//add that user
	if($level=="student")
	{
		$sqlthree = "INSERT INTO Student_Pass VALUES ('".$email."', '".$pass."')";
		mysqli_query($con,$sqlthree);
		
		$sqltwo = "INSERT INTO Student_Details VALUES ('".$name."', ".$rollno.", '".$seatno."', '".$year."', '".$email."', ".$contactno.", 'Not Verified')";
		
		echo $sqltwo." <br> This is how the query looks.";

		if (mysqli_query($con, $sqltwo)) 
		{
    		echo "New record created successfully";
		}
		else 
		{
    		echo "Error: " . $sqltwo . "<br>" . mysqli_error($con);
		}
	
	}
	
	if($level=="faculty")
	{
		$sqlthree = "INSERT INTO Faculty_Pass VALUES ('".$email."', '".$pass."')";
		mysqli_query($con,$sqlthree);
		
		$sqltwo = "INSERT INTO Faculty_Details VALUES ('".$name."', '".$email."', ".$contactno.", 'Not Verified')";
		
		echo $sqltwo." <br> This is how the query looks.";

		if (mysqli_query($con, $sqltwo)) 
		{
    		echo "New record created successfully";
		}
		else 
		{
    		echo "Error: " . $sqltwo . "<br>" . mysqli_error($con);
		}
	}


?>
