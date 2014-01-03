<!DOCTYPE html>
<html>


<link type= "text/css" rel ="stylesheet" href = "testcss.css"/>

<body>
<p id = "title"><a href="homepage.htm" style="color: #FFFFFF; text-decoration: none;">Computer Hardware Database</a></p>



<p id = "greeter">Successfully removed from database!</p>


<?php
$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","wtian4_user", "cs411" ,"wtian4_chd");

/* Check connection
if(mysqli_connect_errno($con))
{
	echo "Failed to connect";
}
else
{
	echo "Connected!";
}
*/
	$postVals = $_POST['name'];
	$query = "DELETE FROM powersupply WHERE name = " . "'" . "$postVals" . "'";
	mysqli_query($con, $query);


//$query = "INSERT INTO Motherboard (Price, Name) VALUES ('10', 'MB5')";

//mysqli_query($con, $query);


?>
<br>

<p id = "footer"><a href="hardware.htm" style="color: #FFFFFF; text-decoration: none;">Back to hardware search</a></p>
<p id = "footer"><a href="powersupply.htm" style="color: #FFFFFF; text-decoration: none;">Back to power supply search</a></p>

</body>
</html>
