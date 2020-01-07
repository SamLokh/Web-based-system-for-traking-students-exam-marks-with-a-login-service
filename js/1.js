function c_validate()
{
	var pass=document.forms["LoginForm"]["password"].value;
	if(pass.length<8)
		alert("Password must be at least 8 characters long. Please enter again.");
	return false;
}