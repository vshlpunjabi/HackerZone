0oa = unescape('%48%38%6d%40%4d%6c%30%6b%6f%41%35%36%37%4f');
function check (x) 
{
	with(x)
	{
		if (value == 0oa)
		{
			alert("Ahh.. so that's what she means");
			return true;          
		}
		else {
			alert("Nope... try again!");
			return false;
		}
	}	
}