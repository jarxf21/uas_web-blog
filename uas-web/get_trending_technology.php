<?php
// koneksi.php
$servername = "localhost";  // atau "127.0.0.1"
$username = "root";         // Username XAMPP default
$password = "";             // Password default biasanya kosong
$dbname = "blog_db";        // Nama database sesuai dengan yang Anda buat

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query untuk memilih artikel trending berdasarkan kategori Lifestyle dan jumlah views tertinggi
$query = "SELECT posts.id, posts.title, posts.author, posts.created_at, posts.views 
          FROM posts 
          JOIN categories ON posts.category_id = categories.id 
          WHERE categories.name = 'technology'
          ORDER BY posts.views DESC 
          LIMIT 5";

$result = mysqli_query($conn, $query);
$trendingRank = 1;
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="grids5-info">';
        echo '    <h4>' . sprintf("%02d", $trendingRank++) . '.</h4>';
        echo '    <div class="blog-info">';
        echo '       <a href="article_detail.php?id=' . $row['id'] . '" class="blog-desc mt-0">' . htmlspecialchars($row['title']) . '</a>';
        echo '        <div class="author align-items-center mt-2 mb-1">';
        echo '            <a href="#author">' . htmlspecialchars($row['author']) . '</a> in <a href="#url">Design</a>';
        echo '        </div>';
        echo '        <ul class="blog-meta">';
        echo '            <li class="meta-item blog-lesson">';
        echo '                <span class="meta-value">' . date('F d, Y', strtotime($row['created_at'])) . '</span>';
        echo '            </li>';
        echo '            <li class="meta-item blog-students">';
        echo '                <span class="meta-value">' . $row['views'] . ' reads</span>';
        echo '            </li>';
        echo '        </ul>';
        echo '    </div>';
        echo '</div>';;
    }
} else {
    echo "<p>No trending posts available.</p>";
}
?>
