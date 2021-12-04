<?php 
require_once 'includes/dbconnect.php';

if(isset($_SESSION['id'])){ 
  $_SESSION['page']="../add_user.php";
  ?>

<h2>New User</h2>
  
  <form id="user-form" name="user-form" role="new_user_form">
    <div class="imgcontainer">
      <img src="images/female_avatar_icon.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
        <div class="form-fields">
            <label for="firstname"><b>Firstname</b></label>
            <p class="arias" id="fn">Enter the new user's first name</p>
            <input id="firstname" type="text" placeholder="John" name="firstname" aria-describedby="fn" required>

            <label for="lastname"><b>Lastname</b></label>
            <p class="arias" id="ln">Enter user's last name</p>
            <input id="lastname" type="text" placeholder="Doe" name="lastname" aria-describedby="ln" required>

            <label for="new_psw"><b>Password</b></label>
            <p class="arias" id="pwd">Password must contain at least 1 lower case letter, at least 1 upper case letter, at least 1 number, and have at least 8 characters. </p>
            <input id="new_psw" type="password" placeholder="********" name="new_psw" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" aria-describedby="pwd" required>
            
            <label for="new_email"><b>Email</b></label>
            <p class="arias" id="email">Enter a valid Email address</p>
            <input id="new_email" type="email" placeholder="user@email.com" name="new_email" aria-describedby="email" required>
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