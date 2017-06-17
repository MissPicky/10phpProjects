<?php include 'includes/header.php';?>
<?php
  //Create Database Object
  $db = new Database();

  // Create Query for Categories
  $query = "SELECT * FROM categories";
  // Run Query for Categories
  $categories = $db->select($query);
?>
<?php
  if (isset($_POST['submit'])){
    // Assign vars
    $title = mysqli_real_escape_string($db->link,$_POST['title']);
    $body = mysqli_real_escape_string($db->link,$_POST['body']);
    $category = mysqli_real_escape_string($db->link,$_POST['category']);
    $author = mysqli_real_escape_string($db->link,$_POST['author']);
    $tags = mysqli_real_escape_string($db->link,$_POST['tags']);
    // Simple validation
    //Simple Validation
  		if($title == '' || $body == '' || $category == '' || $author == ''){
  			//Set Error
  			$error = 'Please fill out all required fields';
  		} else {
  			$query = "INSERT INTO posts
  					  (title, body, category, author, tags)
  				VALUES('$title', '$body', $category, '$author', '$tags')";

  			$insert_row = $db->insert($query);
  		}
  }
?>


<form role="form" method="post" action="add_post.php">
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title" required>
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea name="body" class="form-control" placeholder="Enter Post Body" required></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category" class="form-control" required>
      <?php while($row = $categories->fetch_assoc()):?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['name'] ?></option>
    <?php endwhile; ?>
	</select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input name="author" type="text" class="form-control" placeholder="Enter Author Name" required>
  </div>
  <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags">
  </div>
  <div>
	<input name="submit" type="submit" class="btn btn-primary" value="Submit" />
	<a href="index.php" class="btn btn-primary">Cancel</a>
  </div>
  <br>
</form>

<?php include 'includes/footer.php'; ?>
