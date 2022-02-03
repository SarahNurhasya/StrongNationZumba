<?php
include 'dbConn.php';
$member_email=$_GET['uid'];
$records1=mysqli_query($conn,"select * from member where member_email='$member_email'");
	$records=mysqli_query($conn,"UPDATE `member` SET `status`='APPROVED' WHERE member_email='$member_email'");
header("location:newmember.php");
?>