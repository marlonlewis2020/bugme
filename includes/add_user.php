<?php
require_once 'dbconnect.php';
if(!isset($_SESSION['id'])){
?>
<?php
$_SESSION['page']="add_user.php";
?>

<head>
     <!--?php include 'header.php'; ?> 
  <link rel="stylesheet" href="/bugme2.css"> 
</head>

    <div class="" id="container">
        <div class="header">
        <header>
            <?php include 'banner.php'; ?>

        </header>
        <div class="" id="main">

<div class="" id="nav-bar">
    <?php include 'navbar.php'; ?>
</div>
  <h2>New User</h2>

  <!--<button id="login" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Submit</button>

  <div id="id01" class="modal"> -->
    
    <form action="add_user_action.php" method="POST" id="add-user-form" name="add-user-form" class="modal-content animate" >
         <div class="container">
          <div class="form-fields">
              <label for="firstname"><b>Firstname</b></label><br>
              <input id="firstname" type="text" placeholder="" name="firstname" required><br>

              <label for="lastname"><b>Lastname</b></label><br>
              <input id="lastname" type="text" placeholder=" " name="lastname" required><br>

              <label for="psw"><b>Password</b></label><br>
              <input id="psw" type="password" placeholder="" name="psw" required><br>

              <label for="email"><b>Email</b></label><br>
              <input id="email" type="email" placeholder="user@email.com" name="email" required><br>
              
          </div><br>
          
        <button id="submit-btn" type="submit">Submit</button>
        <!-- <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label> -->
      </div>

    </form>
  </div>
   


<?php }
else{
  echo "<p>Welcome ".$_SESSION['firstname']." 'add_user.php'</p>";
  echo "<p>User Added!</p></div>";
  // include $_SESSION['page'];
}
?>