<?php
include_once "connect_database.php";

if (isset($_POST['login'])) {
    // Grab User submitted information
    $luserid = $_REQUEST["login_userid"];
    $lpassword = $_REQUEST["login_password"];
    $lusertype = $_POST["login_usertype"];

    if ($lusertype == "alumni") {
        $al_result = "SELECT * from alumnimember where 
		pi_register='$luserid' AND al_password='$lpassword'";
        $al_count = mysql_query($al_result);
        $al_result1 = "SELECT alumniinfo.pi_name FROM alumnimember, alumniinfo 
		WHERE  alumniinfo.pi_register='$luserid'";
        $al_count1 = mysql_query($al_result1);
        if (mysql_num_rows($al_count) > 0) {
            while ($al_row = mysql_fetch_assoc($al_count)) {
                $al_status = $al_row['al_status'];
                if ($al_status == "Not Approve") {
                    echo "<br /><br />Login failed. <br /><br />Please contact our administrator to check your registration status.<br /><br />";
                    header("refresh:3;url=index.php");
                } else {
                    if (mysql_num_rows($al_count1) > 0) {
                        while ($al_row1 = mysql_fetch_assoc($al_count1)) {
                            session_start();
                            $_SESSION['id'] = $al_row['pi_register'];
                            $_SESSION['alname'] = $al_row1['pi_name'];
                            header("location:alumni_home.php");
                        }
                    }
                }
            }
        } else {
echo "<script>
alert('Sorry Invalid Password or UserID. Please Try Again.');
window.location='login.html'
</script>";
        }
    } else {
        $sql2 = "SELECT * from adminmember where ad_id='$luserid' AND ad_password='$lpassword'";
        $result2 = mysql_query($sql2);
        if (mysql_num_rows($result2) > 0) {
            while ($row = mysql_fetch_assoc($result2)) {
                session_start();
                $_SESSION['id'] = $row['ad_id'];
                $_SESSION['adname'] = $row['ad_fullname'];
                header("location:admin_homepage.php");
            }
        } else {
echo "<script>
alert('Sorry Invalid Password or UserID. Please Try Again.');
window.location='login.html'
</script>";
        }
    }
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Login Status</title>
</head>
<link rel="stylesheet" href="css/registration_login_status.css" />

<body>

</body>

</html>
