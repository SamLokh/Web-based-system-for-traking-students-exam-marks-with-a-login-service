
<?php

echo "Hello from PHP!"; ?>

<?php

echo "Database name from HTML form: ".$_POST["dbname"];

$servername="localhost";
$username="tempuser";
$password="Temppass@1";

$con = mysqli_connect($servername,$username,$password);

echo "After mysqli.";

if(!$con)
{
	die("Connection failed: ".mysqli_error());
}

$name=$_POST["dbname"];

echo "This is the database name: ".$name;

$sql="CREATE Database ".$_POST["dbname"];

$retval=mysqli_query($con,$sql);

if(!$retval)
{
	echo "Database creation unsuccessful.".mysqli_error();
}
else
{
	echo "Database successfully created!";
}
?>
