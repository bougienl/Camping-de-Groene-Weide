<?php

require '../config/db.php';

$sql = "SELECT * FROM contact_form_db.contact_form;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = [];
}


$conn->close();
?>