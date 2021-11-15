<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'bugme';
session_start();
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$request = filter_input(INPUT_GET,'auth',FILTER_SANITIZE_STRING);

if($request=="logout"){
    session_unset();
}
else 
if($request=="login"){
if(isset($_SESSION['id'])){?>
<?= "True"; ?>
<?php } else {?>
    <?= "False"; ?>
<?php }}?>