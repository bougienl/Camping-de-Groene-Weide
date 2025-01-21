<link rel="stylesheet" href="../src/styles.css" type="text/css">


<?php
require '../config/db.php';

$sql = "SELECT * FROM contact_form";
$result = $conn->query($sql);

$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}

$conn->close();
?>

    
<div class="data-container">
    <h2>Berichten uit de database</h2>
    <?php if (!empty($messages)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>E-mail</th>
                    <th>Telefoonnummer</th>
                    <th>Bericht</th>
                    <th>Ingediend op</th>
                    <th>Afboeken</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($messages as $message): ?>
                    <tr>
                        <td><?= htmlspecialchars($message['id']); ?></td>
                        <td><?= htmlspecialchars($message['name']); ?></td>
                        <td><?= htmlspecialchars($message['email']); ?></td>                        
                        <td><?= htmlspecialchars($message['phone']); ?></td>
                        <td><?= nl2br(htmlspecialchars($message['message'])); ?></td>
                        <td><?= htmlspecialchars($message['submitted_at']); ?></td>
                        <td>
                        <form action="delete.php" method="POST">
                            <input class="delete" type='submit' value="Delete">
                            <input hidden name="id" value="<?= htmlspecialchars($message['id']); ?>">
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Er zijn nog geen berichten om weer te geven.</p>
    <?php endif; ?>
</div>

</body>

</html>