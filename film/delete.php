<?php
require "../auth/auth.php";
require "../config/db.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM film WHERE film_id = ?");
$stmt->execute([$id]);

header("Location: index.php");
