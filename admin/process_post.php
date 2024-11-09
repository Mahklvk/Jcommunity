<?php
require 'session.php';
require '../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postId = $_POST['post_id'];
    $action = $_POST['action'];

    // Tentukan status berdasarkan aksi
    if ($action === 'approve') {
        $status = 'Approved';
    } elseif ($action === 'reject') {
        $status = 'Rejected';
    } else {
        die("Aksi tidak valid");
    }

    // Update status postingan
    $stmt = $conn->prepare("UPDATE post SET status = ? WHERE post_id = ?");
    $stmt->bind_param("si", $status, $postId);

    if ($stmt->execute()) {
        echo "Status postingan berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui status postingan: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect kembali ke halaman sebelumnya
    header("Location: index.php");
    exit();
}
?>
