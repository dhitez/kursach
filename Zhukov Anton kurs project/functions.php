<?php
session_start();

function is_logged_in() {
    return isset($_SESSION['user_id']) || isset($_SESSION['admin_id']);
}

function is_admin() {
    return isset($_SESSION['admin_id']);
}
?>