</div><!-- /.blog-main -->

<div class="col-sm-3 offset-sm-1 blog-sidebar">
<div class="sidebar-module sidebar-module-inset">
  <h4>About</h4>
  <p><?php echo $about; ?></p>
</div>
<div class="sidebar-module">
  <h4>Categories</h4>
  <?php if($categories):?>
  <ol class="list-unstyled">
    <?php while($row = $categories->fetch_assoc()) : ?>
    <li><a href="posts.php?category=<?php echo urlencode($row['id']); ?>"><?php echo $row['name']; ?></a></li>
  <?php endwhile; ?>
  </ol>
  <?php endif; ?>
</div>
<div class="sidebar-module">
  <h4>Elsewhere</h4>
  <ol class="list-unstyled">
    <li><a href="https://github.com/MissPicky">GitHub</a></li>
    <li><a href="https://twitter.com/erdbeerfleisch">Twitter</a></li>
    <li><a href="https://www.facebook.com/erdbeerfleisch">Facebook</a></li>
  </ol>
</div>
</div><!-- /.blog-sidebar -->

</div><!-- /.row -->

</div><!-- /.container -->

<footer class="blog-footer">
<p>Created by <a href="http://erdbeerfleisch.de">Erdbeerfleisch Web-Development</a>. © 2017</p>
<p>
<a href="#">Back to top</a>
</p>
</footer>


<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</body>
</html>
