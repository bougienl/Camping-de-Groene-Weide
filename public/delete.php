<?php include_once '../config/db.php';

$id = $_REQUEST['id'];

$sql = "DELETE FROM contact_form_db.contact_form WHERE id='$id'";


if (mysqli_query($conn, $sql)) {
    header("Refresh: 1; url=insight.php");
    echo "<script>alert('Row succesfully deleted!');</script>";
} 
else {
    echo "Error deleting record: " . mysqli_error($conn);
}

exit();

?>