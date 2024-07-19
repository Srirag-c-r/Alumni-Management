<?php
session_start();
if(!isset($_SESSION['id'])){
header("location:login.html");
}else{
$userid=$_SESSION['id'];
$username1=$_SESSION['adname'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage-Approve</title>
<?php
include_once "setting/adminpage_navigation.php";
include_once "connect_database.php";
?>
<link rel="stylesheet" type="text/css" href="s/alhome.css">
</head>
<body>
<?php
if(isset($_POST['approve'])){
$alid=$_REQUEST['aluid'];
if($alid==''){
echo "<br><h3>***Please Insert Alumini Registration Number for membership.***</h3>";
}else{
$sql="UPDATE alumnimember SET al_status='Approve' WHERE pi_register='$alid' ";
if(mysql_query($sql,$conn)){
echo "<br>***Approval Successfull.*****";
echo "<a href=manage_alumni.php>View Alumni Membership</a><br>";
}else{
echo "Error : ".$sql."<br>".mysql_error($conn);
}
}
}
?>
<br><br><br>
<form action="approve.php" method="POST">
<table align="center">
<caption><h1>Insert Alumini Registration Number For Approval : </h1></caption>
<tr>
<th align="left" width="250" style="border:hidden;font-size:20px">Alumini Registration Number : </th>
<td width="150" style="border:hidden"><input size="45" type="text" value="" name="aluid"></td>
</tr>
</tr>
<td colspan=3 align="right" style="border:hidden"><button type="submit" name="approve">Approve</button></td>
</tr>
</table>
</form>
<br><br><br><br>
<table align="center">
<caption>Alumni Without Approval</caption>
<tr>
<th>NO</th>
<th>Alumni Registration Number </th>
<th>Alumni Name</th>
<th>Approval Status</th>
</tr>
<?php
$sqlshowAWA="SELECT alumnimember.pi_register,alumniinfo.pi_name,alumnimember.al_status FROM alumnimember,alumniinfo WHERE alumnimember.pi_register=alumniinfo.pi_register AND alumnimember.al_status='NOT APPROVE' ";
$resultAWA=mysql_query($sqlshowAWA,$conn);
$no=1;
while($row=mysql_fetch_array($resultAWA))
{
echo "<tr>";
echo "<td>".$no."</td>";
echo "<td>".$row['pi_register']."</td>";
echo "<td>".$row['pi_name']."</td>";
echo "<td>".$row['al_status']."</td>";
$no++;
}
?>
</table>
<br><br><br><br><br>
</body>
</html>
