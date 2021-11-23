<?php 

require_once 'dbconnect.php';

$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST,"psw",FILTER_SANITIZE_STRING);
$firstname=filter_input(INPUT_POST, "firstname",FILTER_SANITIZE_STRING);
$lastname=filter_input(INPUT_POST, "lastname",FILTER_SANITIZE_STRING);
// var_dump($email,$password);

$sql = "INSERT INTO `users` VALUES($firstname,$lastname, $password, $email )";
$stmt = $conn->query($sql);
$results = $stmt->fetch(PDO::FETCH_ASSOC);

if($results && password_verify($password,$results['password'])){
    $_SESSION['firstname'] = $results['firstname'];
    $_SESSION['lastname'] = $results['lastname'];
    $_SESSION['email'] = $results['email'];
    $_SESSION['page']="add_user.php";
}
else{
    echo "<p id='error'><i id='warn' class='material-icons'>warning</i> verification failed!</p>";
    $_SESSION['firstname'] = null;
    $_SESSION['lastname'] = null;
    $_SESSION['email'] = null;
}

include 'add_user.php';

?>