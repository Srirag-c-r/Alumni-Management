<html>
<body>
<?php
//logout
session_start();
session_destroy();
echo "<br><br>Log Out Successfull.Moving back to page in 3 seconds";
header("refresh:3;url=index.php");
?>
</body>
</html>
