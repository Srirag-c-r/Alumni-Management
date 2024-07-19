<?php
session_start();
if (!isset($_SESSION['id'])){
	header("location:login.html");
}
else
{
	$userid=$_SESSION['id'];
	//$username1=$_SESSION['adname'];
}
?>
<html>
<head>
<title>Manage Alumni</title>
<?php
include_once "setting/adminpage_navigation.php";
include_once "connect_database.php";
?>
<link rel="stylesheet" type="text/css" href="s/alhome.css">
</head>
<body>
<br>
<h1> View Alumni Membership </h1>
<br>
<table id="alumni" align="center">
<tr>
<th> NO</th>
<th> Alumni Registration Number</th>
<th> Alumni Name </th>
<th> Approval Status </th>
</tr>
<?php
$sqlshow1 = "SELECT alumnimember.pi_register, alumniinfo.pi_name, alumnimember.al_status FROM alumnimember, alumniinfo WHERE alumniinfo.pi_register=alumnimember.pi_register";
$result1 = mysql_query($sqlshow1);
$no = 1;
while ($row=mysql_fetch_assoc($result1))
{
	echo "<tr>";
	echo "<td>" . $no++. "</td>";
	echo "<td>" . $row['pi_register']. "</td>";
	echo "<td>" . $row['pi_name']. "</td>";
	echo "<td>" . $row['al_status']. "</td>";
	echo "</tr>";
}
mysql_close($conn);
?>
<tr>
<td><a href="approve.php"> Approve Membership </a> </td>
</tr>
</table>
<br><br><br><br>
</body>
</html>
