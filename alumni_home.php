<?php
session_start();
if(!isset($_SESSION['id']))
{
header("location:login.html");
}
else
{
$userid=$_SESSION['id'];
//$username1=$_SESSION['pi_name'];
}
?>
<html>
<head>
<title>Alumni Homepage</title>
<?php
include_once"connect_database.php";
include_once"setting/alumnihome_navigation.php";
?>
<link rel="stylesheet" type="text/css" href="s/alhome.css">
</head>
<body>
<br>
<h2>My Profile</h2>
<br>
<table align="center" cellspacing="15px">
<?php
$sql="SELECT pi_register,pi_name,pi_gender,pi_email,pi_session,pi_branch,pi_mobile FROM alumniinfo WHERE pi_register='$userid'";
$result=mysql_query($sql);
while($row=mysql_fetch_assoc($result))
{
echo "<tr>";
echo "<th>Name : </th>";
echo "<td class=alumnihometd1>".$row["pi_name"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Registration Number : </th>";
echo "<td class=alumnihometd1>".$row["pi_register"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Gender : </th>";
echo "<td class=alumnihometd1>".$row["pi_gender"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Mobile Number : </th>";
echo "<td class=alumnihometd1>".$row["pi_mobile"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Email : </th>";
echo "<td class=alumnihometd1>".$row["pi_email"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Session : </th>";
echo "<td class=alumnihometd1>".$row["pi_session"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Branch : </th>";
echo "<td class=alumnihometd1>".$row["pi_branch"]."</td>";
echo "</tr>";
echo "<tr>";
}
?>
</table>
<br><br><br>
</body>
</html>
