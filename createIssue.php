
<?php 
require_once 'includes/dbconnect.php';

if(isset($_SESSION['id'])){ 
  $_SESSION['page']="../createissue.php";

  $sql_db = $conn->query("SELECT * FROM users;");
  $results = $sql_db->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <h1>Create Issue</h1>
  <form action="submit_issues.php" class="create_form" id=issue_new method="POST">
    <div class="create_issue_field">
      <label for="title" class="create_label" >Title</label>
      <input type="text"  name="title" class="create_field" id="title">
    </div>
    
    <div class="create_issue_field">
      <label for="description" class="create_label" >Description</label> 
      <textarea type="text" class="create_field" id="description" name="description"></textarea>
    </div>

    <div class="create_issue_field">
      <label for="assigned" class="create_label" >Assigned to</label>
      <select name="assigned_to" class="create_field" id="assigned_to" >
        <?php foreach ($results as $row): ?>
          <option value="<?=$row['id'];?>"><?php echo $row['firstname']." ".$row['lastname']; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
            
    <div class = "create_issue_field entr">
      <label for="type" class="create_label" >Type</label>
      <select name="type" class="create_field" id="type">
          <option value="bug" selected>Bug</option>
          <option value="proposal">Proposal</option>
          <option value="task">Task</option>
      </select>
    </div>
    <div class = "create_issue_field entr">
      <label for="priority" class="create_label" >Priority</label>
      <select name="priority" class="create_field" id="priority">
          <option value="minor" selected>Minor</option>
          <option value="major">Major</option>
          <option value="critical">Critical</option>
      </select>
    </div>
    <div class = "newissuebtn">
        <input type="hidden" name="id" value=<?= $_SESSION["id"]; ?> id="created_by">
        <button type="submit" name="form_sub" value="Submit" id="submit-btn3">Submit</button>
    </div>
  </form>
  <?php }
else {
    include "includes/login.php";
} ?>