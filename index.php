<?php
require './includes/dbconnect.php';

$_SESSION['id']=null;
$_SESSION['email']=null;
$_SESSION['firstname']=null;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php include 'header.php'; ?>
</head>
<body>
    <div class="" id="container">
        <div class="header">
        <header>
            <?php include './includes/banner.php'; ?>

        </header>
        </div>
        <div class="" id="main">

            <div class="" id="nav-bar">
                <?php include './includes/navbar.php'; ?>
            </div>

            <div class="" id="content">
                <?php if (!isset($_SESSION['id'])):
                    include './includes/login.php';
                    // $pwd = password_hash("password123",PASSWORD_DEFAULT);
                    // echo "password: ".$pwd;
                else:
                    include './includes/home.php';
                endif;
                ?>
            </div>

        </div>

    </div>
    
</body>
<footer>
    <div class="" id="footer">

    </div>
</footer>
</html>