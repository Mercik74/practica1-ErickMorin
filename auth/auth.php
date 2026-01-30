<?php
session_start();

if (!isset($_SESSION['staff_id'])) {
    header("Location: /practical-ErickMorin/auth/login.php");
    exit;
}