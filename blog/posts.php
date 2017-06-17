<?php include 'includes/header.php';?>
<?php
// Create Database Object
$db = new Database();

// Create Query for Categories
$query = "SELECT * FROM categories";
// Run Query for Categories
$categories = $db->select($query);

  // Check URL for Category
  if (isset($_GET['category'])){
    $category = $_GET['category'];
    // Create Query for Posts in Category
    $query = "SELECT * FROM posts WHERE category = ".$category;
    // Run Query for Posts
    $posts = $db->select($query);
  } else {
    // Create Query for all Posts
    $query = "SELECT * FROM posts
              ORDER BY date DESC";
    // Run Query for Posts
    $posts = $db->select($query);
  }

?>
<?php if ($posts) : ?>
<?php while($row = $posts->fetch_assoc()) : ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by <?php echo $row['author']; ?></p>

            <?php echo shortenText($row['body']); ?>
            <a href="post.php?id=<?php echo urlencode($row['id']); ?>" class="readmore">Read more</a>
          </div><!-- /.blog-post -->
<?php endwhile; ?>

<?php else : ?>
  <p>There are no posts yet.</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
