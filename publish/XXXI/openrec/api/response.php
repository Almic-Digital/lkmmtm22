<?php
 ob_start();
session_start();
if (!isset($_SESSION['nrp']) || $_SESSION['nrp'] == "") {
    echo json_encode('false');
} else {
    echo json_encode('true');
}

ob_end_flush();