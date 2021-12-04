<?php
if (strpos($_SERVER['SCRIPT_NAME'], "/includes/")!==false) {
    require_once 'dbconnect.php';
} else {
    require_once 'includes/dbconnect.php';
}

$error_msg = "";

do {
    if (!isset($_SESSION['id'])) {
        $error_msg = "NOT-LOGGED-IN::";
        if (str_contains($_SERVER['SCRIPT_NAME'], "/includes/")) {
            include 'login.php';
        } else {
            include 'includes/login.php';
        }
        break;
    }

    $_SESSION['page']="../home.php";
    $viewmode = filter_input(INPUT_GET, 'viewmode', FILTER_SANITIZE_STRING);
    if (empty($viewmode)) {
        $viewmode = "all";
    }
    $viewmode = htmlspecialchars($viewmode);

    if (!$conn) {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        if (!$conn) {
            $error_msg = "Critical Error:: Unable to access Database ...";
            break;
        }
    }
    $sql = "SELECT * FROM issues join " .
            "(select id as cid, email, firstname as cfn, lastname as cln FROM users) AS cby on " .
            "cby.cid=issues.created_by";
    switch ($viewmode) {
        default :
        case "all":
            break;
        case "open":
            $sql .= " WHERE issues.status='Open'";
            break;
        case "ticket":
            $sql .= " WHERE cby.email='" . $_SESSION['email'] . "';";
            break;
    }

    $stmt = $conn->query($sql);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} while (false);
$_SESSION['page']="../home.php";
?>

<?php if ($error_msg !== "NOT-LOGGED-IN::"): ?>
    <?php if (!empty($error_msg)): ?>
        <div class="queryerror"><?= $error_msg ?></div>
    <?php endif; ?>
    <div class="container-k">
        <h1 class="issuename issuename-2">Issues</h1>

        <!--Catch the '#createissue' click event-->
        <a href="#" id="createissue" class="row-1">
            <div class="selected newissue">Create New Issue</div>
        </a>
        <div class="filtermenu">
            <h4 class="filtertitle btnmenu">Filter by:</h4>
            <div>
                <a href="#" data-viewmode="all"><h4 id="allmenu" class="btnmenu selected">ALL</h4></a>
            </div>
            <div>
                <a href="#" data-viewmode="open"><h4 id="openmenu"class="btnmenu">OPEN</h4></a>
            </div>
            <div>
                <a href="#" data-viewmode="ticket"><h4 id="ticketmenu" class="btnmenu">MY TICKETS</h4></a>
            </div>
        </div>
    </div>
    <div class="container-k bugmetab header-tab">
        <div class="tab-title"><h4>Title</h4></div>
        <div class="tab-type"><h4>Type</h4></div>
        <div class="status tab-status"><h4>Status</h4></div>
        <div class="tab-assigned"><h4>Assigned To</h4></div>
        <div class="tab-created"><h4>Created</h4></div>
    </div>
    <?php foreach ($results as $row): ?>
        <div class="container-k bugmetab row-tab">
            <div class="tab-title">
                <h4><b>#<?= $row['id']; ?>&nbsp;</b>
                    <a href="#" class="querydetail" data-issueid="<?= $row['id']; ?>">
                        <?= $row['title']; ?>
                    </a>
                </h4>
            </div>
            <div class="tab-type"><h4><?= $row['type']; ?></h4></div>
            <div class="status tab-status">
                <h4 class="<?= str_replace(" ", "", strtolower($row['status'])); ?>">
                    <?= strtoupper($row['status']); ?>
                </h4>
            </div>
            <div class="tab-assigned">
                <h4>
                    <?= ucfirst($row['cfn']) ?>&nbsp;<?= ucfirst($row['cln']) ?>
                </h4>
            </div>
            <div class="tab-created">
                <h4>
                    <?= !empty($row['status']) ? strftime("%B %e, %Y", strtotime($row['created'])) : "" ?>
                </h4>
            </div>
        </div>
    <?php endforeach; ?>

<?php endif; ?>
