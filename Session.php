<?php
// session
if (!isset($_SESSION)) {
    session_start();
    $_SESSION['Login'] = "Login Page";
}


?>