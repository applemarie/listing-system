<?php

    include('config.php');
    
if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}
?>