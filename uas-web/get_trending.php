<?php
// get_trending.php
$trendingQuery = "SELECT posts.id, posts.title, posts.author, posts.created_at, categories.name AS category, posts.views 
                  FROM posts 
                  JOIN categories ON posts.category_id = categories.id 
                  ORDER BY posts.views DESC 
                  LIMIT 5";
$trendingStmt = $pdo->query($trendingQuery);

$trendingRank = 1;
foreach ($trendingStmt as $row) {
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
    echo '</div>';
}
?>
