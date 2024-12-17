<?php
$host = 'localhost';
$dbname = 'contact_form_db';
$user = 'root';
$password = 'Z@nz1b@r';



try {
    $conn = new mysqli($host, $user, $password, $dbname);
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
