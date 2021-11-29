<?php 
    
    require './includes/dbconnectphp'
    session_start();

$host = "localhost";
$username = "root";
$password = " " ";
$dbname = "schema";
<?php include 'viewissue.php'?>

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
        <link rel="stylesheet" href="styles.css">
        <script src=" " type="text/javascript"></script>
    </head>
    <body> 
<div class="container">
            <header>
                
                <h1> BugMe Issue Tracker </h1>
            </header>
            <div class = "navbar">
                <ul>
                    
                                  <li><a href="home.php">Home</a></li>
				  <li><a href="#">Add User</a></li>
				  <li><a href="createIssue.php">New Issue</a></li>
				  <li><a href="#">Logout</a></li>
				</ul>
		    </div>

<!--filter---->
<div class ="issue">
    	<h2>Issues</h1>
    	<type="submit" class="buttn">Create New Issue</button>
</div>

<div id="filt">
    	<h3>Filter by:</h3>
    	<button type="submit" id="all">All</button>
    	<button type="submit" id="open">Open</button>
    	<button type="submit" id="mytickets">My Tickets</button>
</div>

<?php foreach ($results as $row): ?>
<tr>
<div id='table'><table>
 "<th>Title</th>";
 "<th>Type</th>";
 "<th>Status</th>";
 "<th>Assigned to</th>";
 "<th>Created</th>";
</tr>

 
 $table.= "<tr>";
  "<td>"."#".$row['id']." "."<button class='pbttn' value=".$row['id'].">".$row['title']."</button></td>";
  "<td>".$row['type']." ".<a href="#" class="querydetail" data-issueid="ty_issue"></a></td>";
  "<td>".$row['status']."</td>";
  "<td>".$row['name']."</td>";
  "<td>".$row['date']."</td>";
  "</tr>";
}
<!---echo here-->
echo $table;

?>