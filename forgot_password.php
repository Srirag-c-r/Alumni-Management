<html>
<head>
<title>Forgot Password</title>
<?php
include_once "connect_database.php";
?>
<link rel="stylesheet" type="text/css" href="s/stylebody.css">
</head>
<body>
<div class="forgot_wrapper">
<div class="forgot_container">
<h1>Retrieve Password</h1>
<form class="forgot_form" method="POST">
<input type="text" placeholder="Registration Number" name="forgot_userid">
<input type="text" placeholder="Email" name="forgot_password">
<button type="submit" name="retrieve">Retrieve Password</button>
<br><br><a href="index.php">Home</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="login.html">Login</a>
</form>
</div>
</body>
<?php
if(isset($_POST['retrieve']))
{
$id=$_POST['forgot_userid'];
$email=$_POST['forgot_password'];
$sql="SELECT pi_register FROM alumniinfo WHERE pi_register='$id' AND pi_email='$email' ";
$result=mysql_query($sql);
if(mysql_num_rows($result)>0)
{
while($row=mysql_fetch_assoc($result))
{
$temp=$row['pi_register'];
$sql2="SELECT al_password FROM alumnimember WHERE pi_register='$temp' ";
$result2=mysql_query($sql2);
while($row2=mysql_fetch_assoc($result2))
{
echo "<script> alert('Your Password is : ".$row2["al_password"]." ')</script>";
}
}
}
else
{
echo "<script>alert('Error : Please Contact Srirag The Creator To retrieve the password (you kinda sus)')</script>";
}
}
?>
</html>
