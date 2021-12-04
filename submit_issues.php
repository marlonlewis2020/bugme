<?php

require_once 'includes/dbconnect.php';

$bugme = $conn->query("SELECT * FROM users;");
$results = $bugme->fetchAll(PDO::FETCH_ASSOC);

//sanitizing data and initialising status to open

try {
    $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST,"description", FILTER_SANITIZE_STRING);
    $type = filter_input(INPUT_POST,"Type", FILTER_SANITIZE_STRING);
    $priority = filter_input(INPUT_POST,"Priority",FILTER_SANITIZE_STRING);
    $assigned_to = filter_input(INPUT_POST,"Assigned To", FILTER_SANITIZE_STRING);
    $created_by = filter_input(INPUT_POST,"id",FILTER_SANITIZE_STRING);
    date_default_timezone_set("America/Jamaica");
    $status = "open";
    $date = date("Y-m-d H:i:s");
    //  `id`,`title`,`description`,`type`,`priority`,`status`,`assigned_to`,`created_by`,`created`,`updated`

    $bugme = $conn->prepare("INSERT INTO Issues (title, description, type, priority, status, assigned_to, created_by, date) 
    VALUES (:title,:description,:type,:priority,:status,:assigned_to,:created_by,:date)");
    $bugme->bindParam(':title',$title);
    $bugme->bindParam(':description',$description);
    $bugme->bindParam(':type',$type);
    $bugme->bindParam(':priority',$priority);
    $bugme->bindParam(':status',$status);
    $bugme->bindParam(':assigned_to',$assigned_to);
    $bugme->bindParam(':created_by',$created_by);
    $bugme->bindParam(':date',$date);
    $bugme->execute();

    echo '
    <script>
        swal.fire(
            "Successfully Submitted!",
            "'.$created_by.', your issue has been successfully submitted for review!",
            "success"
        )
    </script>
    ';

} catch(PDOException $pe) {
    echo '
    <script>
        swal.fire(
            "Something went wrong!",
            "Your issue could not be sumitted at this time. Please, try again later or contact your system admin.",
            "warning"
        )
    </script>
    ';
}




?>


