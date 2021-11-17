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
    $_SESSION['page']="home.php";
    echo "<p>Welcome ".$_SESSION['firstname']." 'action_page.php'</p>";
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