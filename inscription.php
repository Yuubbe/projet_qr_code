<?php
include 'connexion_bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $unique_id = bin2hex(random_bytes(16)); // ID unique

    $query = $pdo->prepare("INSERT INTO users (username, password, unique_id) VALUES (?, ?, ?)");
    $query->execute([$username, $password, $unique_id]);

    echo "Compte créé avec succès, votre QR code a été généré.";

    // Générer le QR code automatiquement après inscription
    include('phpqrcode/qrlib.php');
    $lien = "https://tonsite.com/connexion.php?id=" . $unique_id;
    QRcode::png($lien, 'image-qrcode.png');
    echo "<img src='image-qrcode.png' alt='QR Code'>";
}
?>

<!-- Formulaire HTML -->
<form action="inscription.php" method="POST">
    Nom d'utilisateur : <input type="text" name="username" required><br>
    Mot de passe : <input type="password" name="password" required><br>
    <button type="submit">S'inscrire</button>
</form>