<?php
session_start();
if(!isset($SESSION['id']))
{
header("login:login.html");
}
else
{
$userid=$_SESSION['id'];
$username1=$_SESSION['adname'];
}
?>
<html>
<head>
<title>EVENTS</title>
<?php
include_once "connect_database.php";
?>
<link rel="stylesheet" type="text/css" href="s/alhome.css">
</head>
<body>
<div align="center">
<br><br><br>
<?php
$sql="SELECT * FROM event ";
$result=mysql_query($sql);
$sql2="SELECT e_name FROM event";
$result2=mysql_query($sql2);
$rowcount=mysql_num_rows($result2);
$r=0;
echo "<table class=tb1 cellspacing=10>";
echo "<th class=th1>Events</th>";
while($row=mysql_fetch_assoc($result)){
echo "<tr>";
echo "<td class=td1><span class=sp3>".$row["e_name"]."</span>";
echo "<br> <span class=sp2>".$row["e_desc"]."</span>";
echo "<br><br><span class=sp1>Event Date :".$row["e_date"]." |Event Time : ".$row["e_time"]."</span>";
echo "<br><br><span class=sp1>Event Venue: ".$row["e_venue"]."</span>";
echo "<br><br><span class=sp1>Person in charge : ".$row["e_pic"]."</span>";
echo "<hr class=line>";
echo "</td></tr>";
}
echo "</table><br><br>";
?>
<br><br><br>
<a href="alumni_home.php">Back 2 Home</a>
</body>
</html>
