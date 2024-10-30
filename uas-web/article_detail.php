<?php
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
// Mendapatkan ID artikel dari URL
$articleId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Menambahkan views
$updateViews = $pdo->prepare("UPDATE posts SET views = views + 1 WHERE id = :id");
$updateViews->execute(['id' => $articleId]);

// Mengambil detail artikel
$articleQuery = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
$articleQuery->execute(['id' => $articleId]);
$article = $articleQuery->fetch();



if ($article) {
    echo "<h1>" . htmlspecialchars($article['title']) . "</h1>";
    echo "<p>" . htmlspecialchars($article['content']) . "</p>";
    
} else {
    echo "Artikel tidak ditemukan.";
}
?>