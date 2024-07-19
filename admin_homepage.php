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
<?php
include_once "connect_database.php";
?>
<link rel="stylesheet" type="text/css" href="s/adhome.css">
<title>Admin Homepage</title>
</head>
<body>
<?php
include 'setting/adminpage_navigation.php';
?>
<table align="center">
<h3>
<center>List Of Admin</center></h3>
<tr>
	<th> Serial NO </th>
	<th> Admin ID </th>
	<th> Alumni Name</th>
</tr>
<?php
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
