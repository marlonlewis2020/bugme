<?php 
    
    require './includes/dbconnectphp'
    session_start();

$host = "host";
$username = "root";
$password = " ";
$dbname = "bugme";
<?php include '../bugme3.css'; ?>


try {
  $conn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $pe) {
  die "Connection to database $dbname has failed: " . $pe->getMessage();
}


  $sql_db = $conn->query("SELECT * FROM users;");
  $results = $sql_db->fetchAll(PDO::FETCH_ASSOC);

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <---!    <link rel="stylesheet" href="styles-issue.css"> -->
        <script src="bugme-issues.js" type="text/javascript"></script>
    </head>
    <body>
    <div id="container">
			<header>
			     <img src="" id="">
		             <h2>BugMe Issue Tracker</h2>
                        </header>
			

    <div class = "sidebar">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">Add User</a></li>
                        
			<li><a href="#">New Issue</a></li>
			<li><a href="#">Logout</a></li>
		</ul>
	</div>
</div>

<body>
<h1>Create Issue</h1>
<form action="submit_issues.php" id=issue_new method="POST">
    <label for="title">Title</label><br>
    <id="title" input type="text"  name="title"><br>
    
    <div>
    <label for="description">Description</label><br>  
    <textarea type="text" id="descrip" name="description"  rows="10" cols="25"></textarea><br>
    </div>

    <div>
    <label for="assigned">Assigned to</label><br>
    <id="assignd" select name="assigned to"><br>
    <?php foreach ($results as $row): ?>
      
      <option><?php echo $row['firstname']." ".$row['lastname']; ?></option>
      <?php endforeach; ?>
      </select>
    <br><br/>
            
      
            
      <div class = "entr">
      <label for="type">Type</label>
      <select name="type" id="ty_pe">
               <option value="bug">Bug</option>
               <option value="proposal">Proposal</option>
               <option value="task">Task</option>
            </select>
       </div>
      <div class = "entr">
            <label for="priority">Priority</label>
            <select name="priority" id="priori">
                <option value="minor">Minor</option>
                <option value="major">Major</option>
                <option value="critical">Critical</option>
            </select>
            </div>
        <div>
            <input type="submit" name="form_sub" value="Send" id="submit-btn3">Submit</button>
        </div>
    </form>
</body>

</html>