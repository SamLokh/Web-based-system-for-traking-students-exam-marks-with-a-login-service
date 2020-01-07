<?php

//$con = mysqli_connect("localhost",'root','',exampleDB);

$con = mysqli_connect("localhost","tempuser","Temppass@1");

if($con)
{
	echo "Connection successful!";
}
else
{
	echo "Connection unsuccessful.";
}

$sql = "create database testDB";

$retval = mysqli_query($con,$sql);

if($retval)
{
	echo "DB created!";
}
else
{
	echo "DB creation failed.";
}
