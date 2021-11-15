<?php 
require './dbconnect.php';
$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST,"psw",FILTER_SANITIZE_STRING);
// var_dump($email,$password);

$sql = "SELECT id, firstname, lastname, email, password FROM `users` WHERE email='".$email."'";
$stmt = $conn->query($sql);
$results = $stmt->fetch(PDO::FETCH_ASSOC);

if($results && password_verify($password,$results['password'])){
    echo "password verified";
    $_SESSION['firstname'] = $results['firstname'];
    $_SESSION['id'] = $results['id'];
    $_SESSION['email'] = $results['email'];
    include '../includes/banner.php';
}
else{
    echo "verification failed";
    include 'login.php';
}

?>