<?php
include 'connexion_bd.php';
include('phpqrcode/qrlib.php');

if (isset($_GET['id'])) {
    $id_unique = $_GET['id'];
    $lien = "https://tonsite.com/connexion.php?id=" . $id_unique;
    QRcode::png($lien, 'image-qrcode.png');

    echo "<img src='image-qrcode.png' alt='QR Code'>";
} else {
    echo "Aucun ID fourni.";
}
?>