<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bugme';
session_start();
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$request = filter_input(INPUT_GET,'auth',FILTER_SANITIZE_STRING);

$_SESSION['page']="../home.php";
if($request=="logout"){
    $_SESSION['firstname'] = null;
    $_SESSION['id'] = null;
    $_SESSION['email'] = null;
    $_SESSION['page']="../home.php";
}
else 
if($request=="login"){
if(isset($_SESSION['id'])){?>
<?= "True"; ?>
<?php } else {?>
    <?= "False"; ?>
<?php }}?>
