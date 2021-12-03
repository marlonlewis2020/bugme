<?php
require_once 'dbconnect.php';

?>
<?php
// $_SESSION['page']="add_user.php";
?>

<head>
  <link rel="stylesheet" href="bugme2.css"> 
</head>

    <div class="" id="container">
        <div class="header">
        
        <div class="" id="main">


<br>

  <h2>New User</h2>


  <div id="id02" class="modal"> 
    
    <form action="add_user_action.php" method="POST" id="add-user-form" name="add-user-form" class="adduse" >
         <div class="container">
          <div class="form-fields">
              <label for="firstname"><b>Firstname</b></label><br>
              <input id="firstname" type="text" placeholder="" name="firstname" required><br>

              <label for="lastname"><b>Lastname</b></label><br>
              <input id="lastname" type="text" placeholder=" " name="lastname" required><br>

              <label for="psw"><b>Password</b></label><br>
              <!-- Minimum eight characters, at least one letter and one number -->
              <input id="psw" type="password" placeholder="" name="psw" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" required><br>

              <label for="email"><b>Email</b></label><br>
              <input id="email" type="email" placeholder="user@email.com" name="email" required><br>
              
          </div><br>
          
        <button id="submit-btn" type="submit">Submit</button>
         <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label> 
      </div>

    </form>
  </div>
   


<?php 
//  if(!isset($_SESSION['submit-btn'])){

//  }
//  else{
//  echo "<p>Welcome ".$_SESSION['firstname']." 'add_user.php'</p>";
//  echo "<p>User Added!</p></div>";
//  include $_SESSION['page'];

?>