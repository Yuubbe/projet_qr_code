<?php
include 'connexion_bd.php';

if (isset($_GET['id'])) {
    $unique_id = $_GET['id'];

    $query = $pdo->prepare("SELECT * FROM users WHERE unique_id = ?");
    $query->execute([$unique_id]);

    if ($query->rowCount() > 0) {
        session_start();
        $_SESSION['user'] = $unique_id;
        echo "Connexion réussie !";
    } else {
        echo "ID invalide.";
    }
} else {
    echo "Aucun ID fourni.";
}
?>
