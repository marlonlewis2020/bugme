<?php

require_once 'includes/dbconnect.php';

$bugme = $conn->query("SELECT * FROM users;");
$results = $bugme->fetchAll(PDO::FETCH_ASSOC);

//sanitizing data and initialising status to open

try {
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    // echo "title".$title."\n";
    $description = filter_input(INPUT_POST,"description", FILTER_SANITIZE_STRING);
    // echo "description".$description."\n";
    $type = filter_input(INPUT_POST,"type", FILTER_SANITIZE_STRING);
    // echo "type".$type."\n";
    $priority = filter_input(INPUT_POST,"priority",FILTER_SANITIZE_STRING);
    // echo "priority".$priority."\n";
    $assigned_to = filter_input(INPUT_POST,"assigned_to", FILTER_SANITIZE_STRING);
    // echo "assigned_to".$assigned_to."\n";
    $created_by = filter_input(INPUT_POST,"id",FILTER_SANITIZE_STRING);
    // echo "created_by".$created_by."\n";
    date_default_timezone_set("America/Jamaica");
    $status = "open";
    $date = date("Y-m-d H:i:s"); //date("Y-m-d H:i:s");
    //  `id`,`title`,`description`,`type`,`priority`,`status`,`assigned_to`,`created_by`,`created`,`updated`

    $bugme = $conn->prepare("INSERT INTO `issues`(`title`, `description`, `type`, `priority`, `status`, `assigned_to`, `created_by`, `created`, `updated`) VALUES". 
    "(?,?,?,?,?,?,?,?,?)");
    if($bugme->execute([
        $title,
        $description,
        $type,
        $priority,
        $status,
        (int)$assigned_to,
        (int)$created_by,
        $date,
        $date
    ])){
        echo "Successfully Submitted!";
    }
    else{
        echo "Your issue could not be sumitted at this time.";
    }
    

} catch(PDOException $pe) {
    echo "Your issue could not be sumitted at this time. Please, try again later or contact your system admin.";
}




?>


