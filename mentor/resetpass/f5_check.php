<?php
	
	$host="localhost";
    $user="root";
    $password="";
    $db="oms1";

    session_start();
    session_regenerate_id();

    $new=$_POST['pass'];

    $otp2=$_SESSION['otp'];

    $conn=mysqli_connect($host,$user,$password,$db);

    $sql="UPDATE mentorlist SET password='$new' WHERE otp=$otp2";

    $result=mysqli_query($conn,$sql);

    if ($result) {
        $sql2="UPDATE mentorlist SET otp='0' WHERE otp=$otp2";
        $result2=mysqli_query($conn,$sql2);
    	echo "<script>alert('Password Changed.');window.location.href='../mentor_log.php';</script>";
    }

?>