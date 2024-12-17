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

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactformulier</title>
    <link rel="stylesheet" href="../src/styles.css">
</head>

<body>

<div class="form-container">
    <form action="submit.php" method="POST">
        <div class="form-content">
            <div class="inline-group">
                <div class="name">
                    <div class="form-group">
                        <label for="name">Naam</label>
                        <input type="text" id="name" name="name" placeholder="Joe Smith" required>
                    </div>
                </div>
                <div class="email">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" placeholder="voorbeeld@voorbeeld.nl" required>
                    </div>
                </div>
            </div>
            <div>
                <div class="form-group">
                    <label for="phone">Telefoonnummer</label>
                    <input class="phone" type="phone" id="phone" name="phone" placeholder="06 12345678" required>
                </div>
            </div>
            <div class="form-group">
                <label for="message">Bericht</label>
                <textarea class="message" id="message" name="message" rows="5" placeholder="Schrijf hier je bericht" maxlength="200" required ></textarea>
            </div>
            <div class="form-group">
                <a class="privacypolicy" href="">Privacybeleid</a>
            </div>
            <button class="button" type="submit">Versturen ⇒</button>
        </div>
    </form>
</div>

    
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