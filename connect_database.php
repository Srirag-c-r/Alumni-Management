<?php
$servername="localhost";
$username="root";
$password="";
$dbname="we_miniproject";
$conn=mysql_connect($servername,$username,$password);
$db=mysql_select_db($dbname,$conn);
if(!$db)
{
die("Connection Failed:" . mysql_error());
}
?>
