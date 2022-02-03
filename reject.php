<?php
include 'dbConn.php';
$member_email=$_GET['uid'];
$records1=mysqli_query($conn,"select * from member where member_email='$member_email'");
$records=mysqli_query($conn,"DELETE FROM `member` WHERE member_email='$member_email'");
header("location:newmember.php");
?>