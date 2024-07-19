<html>
<head>
<title>Search Alumini</title>
<?php
include_once "connect_database.php";
?>
<link rel="stylesheet" type="text/css" href="s/alhome.css">
<center><h1 style="padding-left:100px">Member Information  </h1></center>
<br>
<table id="alumni" align="center">
<tr>
</tr>
<?php
$name=$_REQUEST['pid'];
$regis=$_REQUEST['aid'];
if($name!=''){
$sqlshowAWA="SELECT alumnimember.pi_register,alumniinfo.pi_name,alumniinfo.pi_branch,alumniinfo.pi_session,alumniinfo.pi_email,alumniinfo.pi_gender,alumniinfo.pi_mobile FROM alumnimember,alumniinfo WHERE alumnimember.pi_register=alumniinfo.pi_register AND alumniinfo.pi_name='$name'";
}
if($regis!=''){
$sqlshowAWA="SELECT alumnimember.pi_register,alumniinfo.pi_name,alumniinfo.pi_branch,alumniinfo.pi_session,alumniinfo.pi_email,alumniinfo.pi_gender,alumniinfo.pi_mobile FROM alumnimember,alumniinfo WHERE alumnimember.pi_register=alumniinfo.pi_register AND alumniinfo.pi_register='$regis'";
}
$resultAWA=mysql_query($sqlshowAWA);
$no=1;
while($row=mysql_fetch_assoc($resultAWA)){
echo "<tr>";
echo "<th>Name : </th>";
echo "<td>".$row["pi_name"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Registration Number : </th>";
echo "<td>".$row["pi_register"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Gender : </th>";
echo "<td>".$row["pi_gender"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Mobile Number : </th>";
echo "<td>".$row["pi_mobile"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Email : </th>";
echo "<td>".$row["pi_email"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Session : </th>";
echo "<td>".$row["pi_session"]."</td>";
echo "</tr>";
echo "<tr>";
echo "<th>Branch : </th>";
echo "<td>".$row["pi_branch"]."</td>";
echo "</tr>";
echo "<tr>";
}
?>
</table>
<center><width="450" style="border:hidden;font-size:20px;color:black">
<a href="search_alumni.php">Back To Search Page</a></center>
<br><br><br>
</body>
</html>
