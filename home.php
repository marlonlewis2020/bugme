<?php
if (strstr($_SERVER['SCRIPT_NAME'], "/includes/")) {
    require_once 'dbconnect.php';
} else {
    require_once 'includes/dbconnect.php';
}


// include $_SESSION['page'];
?>

<div>
    <!-- 
        Home page Content
     -->
</div>

<div id="map" style="width: 100%">
    <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" 
    src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=8%20Davidson%20Avenue%20Kingston%2020,%20Jamaica+(Investment%20Network%20Jamaica)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
    </iframe>
</div>