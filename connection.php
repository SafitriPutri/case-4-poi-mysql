<?php
$db;
$dsn = "mysql:host=localhost;dbname=case4_db";
try {
    $db = new PDO($dsn, "root", "annidarn");
} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
}