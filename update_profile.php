<?php
session_start();
if (!isset($_SESSION['id'])){
	header("location:login.html");
}
else
{
	$userid=$_SESSION['id'];
	$alusername=$_SESSION['alname'];
}
?>
<html>
<head>
<title>Update Profile</title>
<link rel="stylesheet" type="text/css" href="s/alhome.css">
</head>
<body>
<?php 
include_once "connect_database.php";
?>
<div>
<br /><br />
<h2>Update Profile</h2>
<br />
<form method="post" name="profile" enctype="multipart/form-data">
<table class="updatetable1" cellspacing="20px" align="center">
  <tr>
    <th>Mobile Number:</th>
    <td class="updatetd1"><input type="text" name="contact" id="mobile" size="38" maxlength="10" pattern="[0-9]{10}" required></td>
  </tr>
  <tr>
    <th>Email:</th>
	<td class="updatetd1"><input type="email" name="email" size="38" /></td>
  </tr>
  <tr>
    <th>Session:</th>
	<td><select class="select" name="batch">							
<option>2011-2014</option>
<option>2012-2015</option>
<option>2013-2016</option>
<option>2014-2017</option>
<option>2015-2018</option>
<option>2016-2019</option>
<option>2017-2020</option>
<option>2018-2021</option>
<option>2019-2022</option>
<option>2020-2023</option>
<option>2021-2024</option>
</select></td>
  </tr>
  <tr>
    <th>Branch:</th>
    <td><select class="select" name="prog" >						
<option>BA</option>
<option>Bcom F&T</option>
<option>Bsc Maths</option>
<option>Bcom CA</option>
<option>BSW</option>
<option>BCA</option>
			</select></td>
  </tr>
  <tr>
    <td class="updatetd1" colspan="2" align="right">
	<button class="updatebt" type="submit" name="update" onclick="return check()">Update</button></td>
  </tr>
</table>
</form>
</div>
<br /><br /><br /><br /><br /><br />
<?php
if(isset($_POST['update']))
{
	$contact=$_REQUEST['contact'];
	$email=$_REQUEST['email'];
	$batch=$_REQUEST['batch'];
	$prog=$_REQUEST['prog'];
	if($contact=="" && $email=="" && $batch=="" && $prog=="")
	{
		echo "<script>alert('Empty field. No update made.')</script>";		
	}
	else
	{
		if($contact!="")
		{
			$sql3 = "UPDATE alumniinfo SET pi_mobile='".$contact."' WHERE pi_register='$userid'";
			$result3 = mysql_query($sql3); 
		}
		if($email!="")
		{
			$sql4 = "UPDATE alumniinfo SET pi_email='".$email."' WHERE pi_register='$userid'";
			$result4 = mysql_query($sql4); 
		}
		if($batch!="")
		{
			$sql5 = "UPDATE alumniinfo SET pi_session='".$batch."' WHERE pi_register='$userid'";
			$result5 = mysql_query($sql5); 
		}
		if($prog!="")
		{
			$sql6 = "UPDATE alumniinfo SET pi_branch='".$prog."' WHERE pi_register='$userid'";
			$result6 = mysql_query($sql6);
		}
		if($result3==true || $result4==true || $result5==true || 
		$result6==true || $result7==true)
		{
			echo "<script>alert('Update Success.')</script>";
		}
		else
		{
			echo "Fail";	
		}
	}
}
?>
<a href="alumni_home.php">Back 2 Home</a>
</body>
<script>
	function check(){
	var phoneno=/^\d{10}$/;
	var my=document.getElementById('mobile')
	if(my.value.match(phoneno))
	{
		return true;
	}
	else
	{
		alert ("ENTER VALID MOBILE NUMBER");
		return false;
	}
	}
</script>
</html>
