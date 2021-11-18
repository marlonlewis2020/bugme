<?php
require './includes/dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'includes/header.php'; ?>
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
                <?php include "includes/login.php"; ?>
                <?php include "includes/add_user.php"; ?>
            </div>

        </div>

    </div>
    
</body>
<footer>
    <div class="" id="footer">

    </div>
</footer>
</html>