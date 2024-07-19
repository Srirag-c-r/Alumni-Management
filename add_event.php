<?php
session_start();
if(!isset($_SESSION['id'])){
header("location:login.html");
}
else
{
$userid=$_SESSION['id'];
$username=$_SESSION['adname'];
}
?>
<html>
<head>
<title>Event - ADD Event </title>
<?php
include_once "setting/adminpage_navigation.php";
include_once "connect_database.php";
?>
<link rel="stylesheet" type="text/css" href="s/alhome.css">
</head>
<form action="add_event.php" method="POST">
<table width="850" align="center" style="border:hidden;font-size:25px">
Details Of The Event : </th>
<td></td>
</tr>
<tr>
<th align="left" width="6000" style="border:hidden;font-size:18px">Event ID:</th>
<td width="350" style="border:hiden"><input size="59" type="text" value="" name="eventid"/></td>
</tr>
<tr>
<th align="left" width="300" style="border:hidden;font-size:18px">Event Name : </th>
<td width="350" style="border:hidden"><input type="text" value="" name="eventname" size="59"/></td>
<tr>
<th align="left" width="300" style="border:hidden;font-size:18px">Event Date: </label></th>
<td width="350" style="border:hidden"><input class="i2" type="date" value="" name="eventdate" size="59" min="2020-06-06"required/></td>
<tr>
<tr>
<th align="left" width="300" style="border:hidden;font-size:18px">Event Time:</label></th>
<td width="350" style="border:hidden"><input class="i3" type="time" value="" name="eventtime" size="59" /></td>
<tr><tr>
<th align="left" width="300" style="border:hidden;font-size:18px">Event Description: </label></th>
<td width="350" style="border:hidden"><textarea name="eventdesc" cols="60" rows="6" size="60"></textarea></td>
<tr>
<tr>
<th align="left" width="300" style="border:hidden;font-size:18px">Event Venue:</label></th>
<td width="350" style="border:hidden"><input type="text" value="" name="eventvenue" size="59"/></td>
<tr>
<tr>
<th align="left" width="300" style="border:hidden;font-size:18px">Person In Charge Of The Event : </label></th>
<td width="350" style="border:hidden"><input type="text" value="" name="epic" size="59"/></td>
<tr>
<td colspan=2 align="right" style="border:hidden"><button class="bt1" type="submit" name="addEvent">Add Event</button></td>
</tr>
</table>
</form>
<?php
if(isset($_POST['addEvent']))
{
$EID=$_REQUEST['eventid'];
$ENAME=$_REQUEST['eventname'];
$EDATE=$_REQUEST['eventdate'];
$ETIME=$_REQUEST['eventtime'];
$EDESC=$_REQUEST['eventdesc'];
$EVENUE=$_REQUEST['eventvenue'];
$EPIC=$_REQUEST['epic'];
if($EID==''||$ENAME==''||$EDATE==''||$ETIME==''||$EDESC==''||$EVENUE==''||$EPIC=='')
{
echo "<br><p class=p1>***Incomplete Information.No Event Created.***</p>";
}
else
{
$sql="INSERT INTO event(e_id,e_name,e_date,e_time,e_desc,e_venue,e_pic)VALUES('$EID','$ENAME','$EDATE','$ETIME','$EDESC','$EVENUE','$EPIC')";
if(mysql_query($sql))
{
echo "<br><p class=p1>***Event Successfully Created***</p>";
echo "<br><p class=p2><a href=events.php>Go to Event</a></p>";
}
else
{
echo "Error".$sql."<br>".mysql_error();
}
}
}
?>
</body>
</html>
