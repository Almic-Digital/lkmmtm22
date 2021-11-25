<?php
 ob_start();
session_start();
setcookie(session_name(), '', 100);
session_unset();
session_destroy();
$_SESSION = array();
header('Location: ../login.html');
ob_end_flush();