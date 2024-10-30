<?php
include 'koneksi.php';

$articlesPerPage = 5; // Jumlah artikel per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Ambil nilai page dari URL
$offset = ($page - 1) * $articlesPerPage; // Hitung offset

// Query untuk mengambil artikel dengan pagination
$recentQuery = "SELECT posts.id, posts.title, posts.content, posts.author, posts.image_url, posts.created_at, posts.views, categories.name AS category 
                FROM posts 
                JOIN categories ON posts.category_id = categories.id 
                WHERE categories.name = 'technology'
                ORDER BY posts.created_at DESC 
                LIMIT $articlesPerPage OFFSET $offset";
$recentStmt = $pdo->query($recentQuery);

// Tampilkan artikel
foreach ($recentStmt as $row) {
    echo '<div class="col-md-12 item">';
    echo '    <div class="card">';
    echo '        <div class="card-header p-0 position-relative">';
    echo '            <a href="article_detail.php?id=' . $row['id'] . '">';
    echo '            <a href="article_detail.php?id=' . $row['id'] . '" class="blog-desc">' . htmlspecialchars($row['title']) . '</a>';
    echo '                <img class="card-img-bottom d-block radius-image" src="' . htmlspecialchars($row['image_url']) . '" alt="Card image cap">';
    echo '            </a>';
    echo '        </div>';
    echo '        <div class="card-body p-0 blog-details">';
    
    echo '            <div class="author align-items-center mt-3 mb-1">';
    echo '                <a href="#author">' . htmlspecialchars($row['author']) . '</a> in <a href="#url">' . htmlspecialchars($row['category']) . '</a>';
    echo '            </div>';
    echo '            <ul class="blog-meta">';
    echo '                <li class="meta-item blog-lesson"><span class="meta-value">' . date('F d, Y', strtotime($row['created_at'])) . '</span></li>';
    echo '                <li class="meta-item blog-students"><span class="meta-value">' . htmlspecialchars($row['views']) . ' reads</span></li>';
    echo '            </ul>';
    echo '        </div>';
    echo '    </div>';
    echo '</div>';
}

// Menghitung jumlah halaman
$totalQuery = "SELECT COUNT(*) as total FROM posts WHERE category_id = (SELECT id FROM categories WHERE name = 'technology')";
$totalResult = $pdo->query($totalQuery)->fetch();
$totalPages = ceil($totalResult['total'] / $articlesPerPage);
?>

<div class="pagination-wrapper mt-5">
    <ul class="page-pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li><a class="page-numbers <?= $i == $page ? 'current' : '' ?>" href="?page=<?= $i ?>"><?= $i ?></a></li>
        <?php endfor; ?>
    </ul>
</div>
