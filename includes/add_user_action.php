<?php 

require_once 'dbconnect.php';




$email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST,"psw",FILTER_SANITIZE_STRING);
$firstname=filter_input(INPUT_POST, "firstname",FILTER_SANITIZE_STRING);
$lastname=filter_input(INPUT_POST, "lastname",FILTER_SANITIZE_STRING);
$date = date('Y-m-d H:i:s');

// $pattern="/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
//  if(!preg_match($pattern, $password)){
//         echo "incorrect password Format";
//         break;
//  }
$hashedPwd = password_hash($password, PASSWORD_DEFAULT);

// $statement->execute([
// 	':name' => $name)]

    // $val = trim($password->data[':password']);

    // if(empty($val)){
    //   $password->addError('Password', 'Password cannot be empty');
    // } else {
    //   if){
    //     $password->addError('Password','Password must be alphanumeric');
    //   }
    // }

    
$sql = "INSERT INTO `users` (`firstname`, `lastname`, `password`,`email`,`date_joined`) VALUES(:firstname,:lastname, :hashedPwd, :email ,:date)";
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare($sql);
$stmt->execute ([':firstname'=> $firstname, ':lastname'=>$lastname, ':hashedPwd'=>$hashedPwd, ':email'=>$email, ':date'=> $date]);

$results = $stmt->fetch(PDO::FETCH_ASSOC);
$_SESSION['page']="add_user.php";
echo "New one Added";

// if($results && password_verify($password,$results['password'])){
//     $_SESSION['firstname'] = $results['firstname'];
//     $_SESSION['lastname'] = $results['lastname'];
//     $_SESSION['email'] = $results['email'];
//     $_SESSION['page']="add_user.php";
// }
// else{
//     echo "<p id='error'><i id='warn' class='material-icons'>warning</i> verification failed!</p>";
//     $_SESSION['firstname'] = null;
//     $_SESSION['lastname'] = null;
//     $_SESSION['email'] = null;
?>