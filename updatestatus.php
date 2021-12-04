<?php
require_once 'includes/dbconnect.php';

do {
    if (!isset($_SESSION['id'])) {
        break;
    }

    $issueid = filter_input(INPUT_GET, 'issueid', FILTER_SANITIZE_STRING);
    $operation = filter_input(INPUT_GET, 'oper', FILTER_SANITIZE_STRING);
    if (empty($issueid) || empty($operation)) {
        break;
    } else {
        $issueid = htmlspecialchars($issueid);
        $operation = htmlspecialchars($operation);
    }

    if (!$conn) {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        if (!$conn) {
            break;
        }
    }

    $newstatus = "";

    if ($operation === "progress") {
        $newstatus = "In Progress";
    } else if ($operation === "closed") {
        $newstatus = "Closed";
    }
    if (!empty($newstatus)) {
        date_default_timezone_set('America/Jamaica');
        $datetime = date("Y-m-d H:i:s");
        $stmt = $conn->query("update issues set status='" .
                $newstatus . "',updated='" . $datetime . "' WHERE id=" . $issueid . ";");
        if (!$stmt) {
            $update_error = "Critical Error::Unable to Update issues data table...";
        }
    }
} while (false);

include 'view_issues.php';
?>   