<?php

include_once 'createIssue.php';
$bugme = $conn->query("SELECT * FROM users;");
$results = $bugme->fetchAll(PDO::FETCH_ASSOC);

session_start();

//sanitizing data and initialising status to open

try {
     $title = filter_var($_POST["title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $description = filter_var($_POST["description"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
     $type = $_POST["Type"], FILTER_SANITIZE_FULL_SPECIAL_CHARS;
     $priority = $_POST["Priority"];
     $assigned_to = $_POST["Assigned To"], FILTER_SANITIZE_FULL_SPECIAL_CHARS;
     $created_by = $_SESSION["id"];
     date_default_timezone_set("America/Jamaica");
     $status = "open";
     $date = date("Y-m-d H:i:s");
    
//storing user info into database

       $bugme = "INSERT INTO Issues (title, description, type, priority, status, assigned_to, created_by, date) 
        VALUES ('$title','$description', '$type','$priority','$status',$assigned_to,NOW(),NOW())";
        $conn->execte($bugme);
        echo "New issue submitted"

} catch(PDOException $pe) {
    die("Could not connect to database :" . $pe->getMessage());
}




?>


