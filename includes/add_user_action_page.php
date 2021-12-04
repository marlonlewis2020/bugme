<?php 

require_once 'dbconnect.php';

$email = strtolower(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL));
$password = password_hash(filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING),PASSWORD_DEFAULT);
$firstname = strtolower(filter_input(INPUT_POST,"firstname",FILTER_SANITIZE_STRING));
$lastname = strtolower(filter_input(INPUT_POST,"lastname",FILTER_SANITIZE_STRING));
$my_date = date("Y-m-d h:i:sa");
$sql = "INSERT INTO `users` (`firstname`, `lastname`, `password`, `email`, `date_joined`) ".
"VALUES ('{$firstname}', '{$lastname}', '{$password}', '{$email}', '{$my_date}')";

$check = $conn->query("SELECT count(email) FROM `users` WHERE email='".$email."'");
$chk = $check->fetchColumn();
if($chk<1){
    try{
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        if($conn->exec($sql)){
            echo "New User '{$firstname}' successfully created!";
        };
        // echo "New User '{$firstname}'";
    }
    catch(PDOException $e){
        echo 
        "Failed to add '".$firstname."' as a new User";
    }
}
else {
    echo 
    "User already exists with email '".$email."' ";
}

?>