<?php
session_start();
if (!isset($_SESSION['mentor_id'])){
    header("location:student_log.php");
}
else{
    $username = $_SESSION['mentor_id'];
}
// Important part need to be installed in all pages 
?>
<?php
    $host="localhost";
    $user="root";
    $password="";
    $db="oms1";

    $conn=mysqli_connect($host,$user,$password,$db);
    $sql=mysqli_query($conn,"Select * from `mentorlist` where mentor_id='$username'");
    $result=mysqli_fetch_array($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo icon.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="output.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Mentor System</title>
</head>
<body>
<!-- admin navbar page -->
<center>
    <div class="w-full min-h-screen font-sans text-gray-900 bg-gray-50 flex">
        <?php
        @include 'a_nav.php';
        ?>
        <main class="flex-1">
            <!-- head -->
        <?php
        @include 'head.php';
        ?>
        <!-- Mentor form -->

        <div class="col-lg-6">

            <h4><?php echo $result['fullname'];?>'s Profile</h4>

            <div class="flex items-center justify-center p-7 mx-10 rounded-lg shadow-lg bg-white max-w-md">
                <div class="text-centre mt-3">
                    <p class="text-muted mb-2 font-5">Full Name :<?php echo $result['fullname'].'';?><span class="ml-2"></span></p>
                    <p class="text-muted mb-2 font-13">Department : <?php echo $result['department'];?><span class="ml-2"></span></p>
                    <p class="text-muted mb-2 font-13"> Mentor-id :<?php echo $result['mentor_id'];?><span class="ml-2"></span></p>
                    <p class="text-muted mb-2 font-13">Email :<?php echo $result['email'];?> <span class="ml-2"></span></p>
                </div>
            </div>
            <br>
            <a href="./resetpass/forget.php">Reset password</a>
        </div>

    </main>
</div>

</center>
<!-- component -->

</body>
</html>