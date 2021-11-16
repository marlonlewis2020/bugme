<?php 
require 'dbconnect.php';
$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST,"psw",FILTER_SANITIZE_STRING);
// var_dump($email,$password);

$sql = "SELECT * FROM `users` WHERE email='".$email."'";
$stmt = $conn->query($sql);
$results = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($results);

if($results && password_verify($password,$results['password'])){
    echo "<div>password verified";
    $_SESSION['firstname'] = $results['firstname'];
    $_SESSION['id'] = $results['id'];
    $_SESSION['email'] = $results['email'];
    echo "<p>Welcome ".$_SESSION['firstname']."</p>";
    echo "<p>You are signed in.</p></div>";
}
else{
    echo "verification failed";
    $_SESSION['firstname'] = null;
    $_SESSION['id'] = null;
    $_SESSION['email'] = null;
    include 'login.php';
}

?>