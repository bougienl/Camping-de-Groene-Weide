<?php
require_once '../config/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$phone = $_POST['phone'];

if (empty($name) || empty($email) || empty($message) || empty($phone)) {
    die("Alle velden zijn verplicht.");
}

$sql = "INSERT INTO contact_form (name, email, message, phone) VALUES (:name, :email, :message, :phone)";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    'name' => $name,
    'email' => $email,
    'message' => $message,
    'phone' => $phone
]);


header("Refresh: 1; url=contact.html");
echo "<script>alert('Bedankt voor het bericht! We zullen ons best doen het z.s.m. te beantwoorden.');</script>";

exit();
?>