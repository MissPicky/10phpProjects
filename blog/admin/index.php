<?php include 'includes/header.php';?>
<?php
  //Create Database Object
  $db = new Database();

  // Create Query for Posts
  $query = "SELECT posts.*,categories.name FROM posts
            INNER JOIN categories
            ON posts.category = categories.id
            ORDER BY posts.date DESC";
  // Run Query for Posts
  $posts = $db->select($query);

  // Create Query for Categories
  $query = "SELECT * FROM categories
            ORDER BY name";
  // Run Query for Categories
  $categories = $db->select($query);
?>
<h2>Posts</h2>
<table class="table table-striped">
  <tr>
    <th>Post ID#</th>
    <th>Post Title</th>
    <th>Category</th>
    <th>Author</th>
    <th>Date</th>
  </tr>

    <?php if ($posts) : ?>
    <?php while($row = $posts->fetch_assoc()) : ?>
      <tr>
    <td><?php echo $row['id']; ?></td>
    <td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['author']; ?></td>
    <td><?php echo formatDate($row['date']); ?></td>
    </tr>
  <?php endwhile; ?>

  <?php else : ?>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <?php endif; ?>

</table>
<h2>Categories</h2>
<table class="table table-striped">
  <tr>
    <th>Category ID#</th>
    <th>Category Name</th>
  </tr>
  <?php if ($categories) : ?>
  <?php while($row = $categories->fetch_assoc()) : ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
  </tr>
<?php endwhile; ?>
<?php else : ?>
  <tr>
    <td></td>
    <td></td>
  </tr>
  <?php endif; ?>
</table>

<?php include 'includes/footer.php'; ?>
