<?php 

require_once 'dbconnect.php';

$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST,"psw",FILTER_SANITIZE_STRING);
// var_dump($email,$password);

$sql = "SELECT * FROM `users` WHERE email='".$email."'";
$stmt = $conn->query($sql);
$results = $stmt->fetch(PDO::FETCH_ASSOC);

if($results && password_verify($password,$results['password'])){
    $_SESSION['firstname'] = $results['firstname'];
    $_SESSION['id'] = $results['id'];
    $_SESSION['email'] = $results['email'];
    $_SESSION['page']="../home.php";
}
else{
    echo "<p id='error'><i id='warn' class='material-icons'>warning</i> verification failed!</p>";
    unset($_SESSION['firstname'], $_SESSION['id'], $_SESSION['email']);
    $_SESSION['page']="login.php";
}

include $_SESSION['page'];

?>