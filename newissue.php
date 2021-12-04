<?php
require_once 'includes/dbconnect.php';


$sql_db = $conn->query("SELECT * FROM users;");
$results = $sql_db->fetchAll(PDO::FETCH_ASSOC);


?>
<link rel="stylesheet" href="bugme.css">
<body>
    <p>Create Issue</p>
    <label for="title">Title</label><br></br>
    <input type="text" name="title" id="title"><br></br>
    <label for="descrip">Description</label><br></br>
    <textarea type="text" name="descrip" id="descrip" cols="30" rows="10"></textarea><br></br>
    <label for="assigned">Assigned To</label><br></br>
    <select name = "assigned_to" id ="assigned_to">
        <?php 
        foreach($results as $row)
        {
            echo "<option value='".$row['firstname']."'>".$row['firstname']." ".$row['lastname']."</option>";
        }
        ?>
    </select><br></br>
    <label>Type</label><br></br>
    <select name="descriptype" id="descriptype">
        <option value="Bug">Bug</option>
        <option value="Proposal">Proposal</option>
        <option value="Task">Task</option>
    </select><br></br>
    <label>Priority</label><br></br>
    <select name="prior" id="prior">
        <option value="Major">Major</option>
        <option value="Minor">Minor</option>
        <option value="Critical">Critical</option>
    </select><br></br>
    <input type="submit" class="submit" id="submit-btn" value="submit">  
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="bugme.js"></script>
</body>
