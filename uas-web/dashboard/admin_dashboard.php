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

// Proses tambah artikel
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'] ?? null;
    $content = $_POST['content'] ?? null;
    $author = $_POST['author'] ?? null;
    $category_id = $_POST['category_id'] ?? null;
    $image_url = $_POST['image_url'] ?? null;

    if ($title && $content && $author && $category_id) {
        try {
            $stmt = $pdo->prepare("INSERT INTO posts (title, content, author, category_id, image_url, created_at, views) VALUES (?, ?, ?, ?, ?, NOW(), 0)");
            $stmt->execute([$title, $content, $author, $category_id, $image_url]);
            echo "<p class='success'>Artikel berhasil ditambahkan!</p>";
        } catch (PDOException $e) {
            echo "<p class='error'>Gagal menambahkan artikel: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p class='error'>Mohon lengkapi semua data artikel.</p>";
    }
}

// Ambil data artikel untuk ditampilkan dalam tabel
$articles = $pdo->query("SELECT posts.id, posts.title, posts.author, posts.created_at, categories.name AS category FROM posts JOIN categories ON posts.category_id = categories.id ORDER BY posts.created_at DESC");
$totalArticles = $pdo->query("SELECT COUNT(*) FROM posts")->fetchColumn();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Tambah Artikel Baru</title>
    <link rel="stylesheet" href="dashboad.css">
</head>
<body>
    <div class="dashboard">
        <header>
            <h1>🖋️ Admin Dashboard</h1>
            <p>Total Artikel: <span class="total-articles"><?= $totalArticles ?></span></p>
        </header>

        <section class="form-section">
            <h2>Tambah Artikel Baru</h2>
            <form action="admin_dashboard.php" method="POST" class="form">
                <div class="form-group">
                    <label for="title">Judul Artikel:</label>
                    <input type="text" id="title" name="title" placeholder="Masukkan judul artikel" required>
                </div>

                <div class="form-group">
                    <label for="content">Isi Artikel:</label>
                    <textarea id="content" name="content" placeholder="Tulis isi artikel di sini..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="author">Penulis:</label>
                    <input type="text" id="author" name="author" placeholder="Nama penulis" required>
                </div>

                <div class="form-group">
                    <label for="category_id">Kategori:</label>
                    <select id="category_id" name="category_id" required>
                        <?php
                        $categories = $pdo->query("SELECT * FROM categories");
                        foreach ($categories as $category) {
                            echo "<option value='" . $category['id'] . "'>" . $category['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="image_url">URL Gambar:</label>
                    <input type="text" id="image_url" name="image_url" placeholder="URL gambar (opsional)">
                </div>

                <button type="submit" class="submit-button">Tambah Artikel</button>
            </form>
        </section>

        <section class="table-section">
            <h2>Daftar Artikel</h2>
            <table class="article-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Tanggal Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?= htmlspecialchars($article['id']) ?></td>
                            <td><?= htmlspecialchars($article['title']) ?></td>
                            <td><?= htmlspecialchars($article['author']) ?></td>
                            <td><?= htmlspecialchars($article['category']) ?></td>
                            <td><?= htmlspecialchars(date('Y-m-d', strtotime($article['created_at']))) ?></td>
                            <td>
                                <form action="delete_article.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                                    <button type="submit" class="delete-button">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>

