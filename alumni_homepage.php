<?php
session_start();
if (!isset($_SESSION['id'])){
	header("location:login.html");
}
else
{
	$userid=$_SESSION['id'];
	$username1=$_SESSION['adname'];
}
?>
<html>
<head>
<title>Admin Homepage</title>
</head>
<?php
include_once "connect_database.php";
include 'setting/alumnihome_navigation.php';
echo "Welcome".$username1;
?>
<body><center>
<h1> List Of Admins </h1></center>
<br>
<table align="center">
<tr>
	<th> Serial NO </th>
	<th> Admin ID </th>
	<th> Alumni Name</th>
</tr>
<?php
mysql_select_db("your_database_name", $conn); // Replace with your actual database name
$sqlshowAWA = "SELECT adminmember.ad_id, adminmember.ad_fullname FROM adminmember";
$resultAWA = mysql_query($sqlshowAWA);
$no = 1;
while ($row = mysql_fetch_assoc($resultAWA))
{
	echo "<tr>";
	echo "<td>" . $no. "</td>";
	echo "<td>" . $row['ad_id']. "</td>";
	echo "<td>" . $row['ad_fullname']. "</td>";
	$no++;
}
?>
</table>
</body>
</html>
