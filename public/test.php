<?php
require_once '../config/db.php';

try {
    echo "Verbinding succesvol!";
} catch (Exception $e) {
    echo "Er is een probleem met de verbinding: " . $e->getMessage();
}
?>
