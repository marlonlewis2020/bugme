<?php
require_once 'dbconnect.php';


if(!isset($_SESSION['id'])){
  $_SESSION['page'] = "../home.php";
?>
  
  <h2>BugMe Issue Tracker Login Form</h2>

  <button id="login" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

  <div id="id01" class="modal">
    
    <form id="login-form" name="login-form" class="modal-content animate" >
      <div class="imgcontainer">
        <span id="x" class="close" onclick="document.getElementById('id01').style.display='none'" title="Close Login">&times;</span>
        <img src="images/female_avatar_icon.png" alt="Avatar" class="avatar">
      </div>

      <div class="container">
          <div class="form-fields">
              <label for="email"><b>Email</b></label>
              <input id="email" type="email" placeholder="user@email.com" name="email" required>

              <label for="psw"><b>Password</b></label>
              <input id="psw" type="password" placeholder="Enter Password" name="psw" required>
          </div>
          
        <button id="login-btn" type="submit">Login</button>
        <label>
          <!-- <input type="checkbox" checked="checked" name="remember"> Remember me -->
        </label>
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <!-- <span class="psw"><a href="#">Forgot password?</a></span> -->
      </div>
    </form>
  </div>
<?php }
else{
  // $_SESSION['page']="../home.php";
  include $_SESSION['page'];
}
?>
