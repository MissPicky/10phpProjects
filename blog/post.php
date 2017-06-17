<?php include 'includes/header.php';?>
<?php
  $id = $_GET['id'];
  //Create Database Object
  $db = new Database();

  // Create Query for Posts
  $query = "SELECT * FROM posts WHERE id = ".$id;
  // Run Query for Posts
  $post = $db->select($query)->fetch_assoc();

  // Create Query for Categories
  $query = "SELECT * FROM categories";
  // Run Query for Categories
  $categories = $db->select($query);
?>
<?php if ($post) : ?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($post['date']); ?> by <?php echo $post['author']; ?></p>

            <?php echo $post['body']; ?>
          </div><!-- /.blog-post -->

<?php else : ?>
  <p>There are no posts yet.</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
