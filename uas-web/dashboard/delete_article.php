<?php
// Koneksi ke database
$host = 'localhost';
$dbname = 'blog_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Proses hapus artikel
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $article_id = $_POST['article_id'] ?? null;

    if ($article_id) {
        try {
            // Hapus artikel berdasarkan ID
            $stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
            $stmt->execute([$article_id]);
            echo "<p class='success'>Artikel berhasil dihapus!</p>";
        } catch (PDOException $e) {
            echo "<p class='error'>Gagal menghapus artikel: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p class='error'>ID artikel tidak valid.</p>";
    }
}

// Redirect kembali ke dashboard setelah menghapus
header("Location: admin_dashboard.php");
exit();
?>
