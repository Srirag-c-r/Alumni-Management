<html>
<head>
<title>Search Alumni</title>
<?php
//include_once "setting/search_navigation.php";
?>
</head>
<?php
include_once "connect_database.php";
?>
<link rel="stylesheet" type="text/css" href="s/searcha.css">
<body>
<form action="search_result2.php" method="POST">
<center><width="450" style="border:hidden;font-size:25px">Search Via Any One Of The Following Method : </center>
<table width="710" align="center" style="border:2px hidden;" cellspacing="20">
<tr>
<th align="left" width="450" style="border:hidden;font-size:18px">Name </th>
<td width="450" style="border:hidden"><input size="45" type="text" value="" name="pid"></td>
</tr>
<tr>
<th align="left" width="450" style="border:hidden;font-size:18px">
</th>
<td width="450" style="border:hidden;font-size:15px">OR</td>
</tr>
<tr>
<th align="left" width="450" style="border:hidden;font-size:18px">Registration Number </th>
<td width="450" style="border:hidden"><input size="45" type="text" value="" name="aid"></td>
</tr>
<tr>
<td colspan="2" align="center" style="border:hidden"><button type="submit" name="addpayment">Submit</button></td>
</tr>
</table>
</form>
<a href="admin_homepage.php">Back 2 Home</a>
</body>
</html>
