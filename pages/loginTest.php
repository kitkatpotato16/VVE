<?php
    session_start();
    if(!isset($_SESSION["ingelogd"]) || $_SESSION["ingelogd"] !== true) {
        header("Location: index.html");
        exit;
    }
?>



<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: index.html")
?>