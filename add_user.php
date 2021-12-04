<?php 
require_once 'includes/dbconnect.php';

if(isset($_SESSION['id'])){ 
  $_SESSION['page']="../add_user.php";
  ?>

<h2>New User</h2>
  
  <form id="user-form" name="user-form">
    <div class="imgcontainer">
      <img src="images/female_avatar_icon.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <div class="form-fields">
            <label for="firstname"><b>Firstname</b></label>
            <input id="firstname" type="text" placeholder="John" name="firstname" required>

            <label for="lastname"><b>Lastname</b></label>
            <input id="lastname" type="text" placeholder="Doe" name="lastname" required>

            <label for="new_psw"><b>Password</b></label>
            <input id="new_psw" type="password" placeholder="********" name="new_psw" required>

            <label for="conf_psw"><b>Confirm Password</b></label>
            <input id="conf_psw" type="password" placeholder="********" name="conf_psw" required>

            <label for="new_email"><b>Email</b></label>
            <input id="new_email" type="email" placeholder="user@email.com" name="new_email" required>
        </div>
        
      <button id="new_user-btn" type="submit">Submit</button>
    </div>
    <p id="error"></p>

    </div>
  </form>
</div>
<?php }
else {
    include "includes/login.php";
} ?>