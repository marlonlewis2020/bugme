<?php
require_once 'dbconnect.php';
if(!isset($_SESSION['id'])){
?>
<?php
$_SESSION['page']="add_user.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="bugme2.css">
</head>
<body>
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
    
    <form id="user-form" name="user-form" class="modal-content animate" >
    <!-- CONNECTS TO LOGINACTIONPAGE action="includes/login_action_page.php" method="POST" -->
      <div class="imgcontainer">
        <span id="x" class="close" onclick="document.getElementById('id01').style.display='none'" title="Close Login">&times;</span>
        <img src="images/female_avatar_icon.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">
          <div class="form-fields">
              <label for="firstname"><b>Firstname</b></label>
              <input id="firstname" type="firstname" placeholder="" name="firstname" required>

              <label for="lastname"><b>Lastname</b></label>
              <input id="lastname" type="lastname" placeholder=" " name="lastname" required>

              <label for="psw"><b>Password</b></label>
              <input id="psw" type="password" placeholder="" name="psw" required>

              <label for="email"><b>Email</b></label>
              <input id="email" type="email" placeholder="user@email.com" name="email" required>
          </div>
          
        <button id="submit-btn" type="submit">Submit</button>
        <!-- <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
        </label> -->
      </div>

      <div class="container" style="background-color:#f1f1f1">
      <!-- <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button> -->
        <!-- <span class="psw"><a href="#">Forgot password?</a></span> -->
      </div>
    </form>
  </div>
   
</body>
<footer>
    <div class="" id="footer">

    </div>
</footer>
</html>
<?php }
else{
  echo "<p>Welcome ".$_SESSION['firstname']." 'login.php'</p>";
  echo "<p>You are signed in.</p></div>";
  // include $_SESSION['page'];
}
?>