<?php include "database.php" ?>
<?php
// Create Select Query
  $query = "SELECT * FROM shoutit ORDER BY id DESC";
  $shouts = mysqli_query($con, $query);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A shoutout box for your webpage">
    <meta name="keywords" content="">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Shout it!</title>
  </head>
  <body>
    <!-- Modal -->
        <div id="myModal" class="modal fade">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Error</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p><?php echo $_GET['error']; ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-modal" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Site -->

    <div class="container" id="shoutbox">
      <div class="row" id="header">
        <h1>Shout it!</h1>
      </div>
      <div class="row" id="box">
        <div id="shouts">
          <ul>
            <?php while($row = mysqli_fetch_assoc($shouts)) : ?>
              <li class="shout"><span><?php echo $row["time"]; ?> - </span><strong><?php echo $row["user"]; ?></strong>: <?php echo $row["message"]; ?></li>
            <?php endwhile; ?>

          </ul>
        </div>
      </div>

      <div class="row" id="form">

        <form class="form-inline" method="post" action="process.php">
          <label class="sr-only" for="inlineFormInput">Name</label>
          <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" name="user" id="inlineFormInput" placeholder="Name">

          <label class="sr-only" for="inlineFormInputGroup">Message</label>
          <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <input type="text" class="form-control" id="inlineFormInputGroup" name="message" placeholder="Message">
          </div>

          <input type="submit" class="btn shout-it" name="submit" value="Shout it">
        </form>
      </div>

    </div>

    <footer>
          <div class="container">
            <div class="social">
              <a target="_blank" href="https://www.facebook.com/erdbeerfleisch" title="facebook"><i class="fa fa-facebook"></i></a>
              <a target="_blank" href="https://twitter.com/erdbeerfleisch" title="Twitter"><i class="fa fa-twitter"></i></a>
              <a target="_blank" href="https://www.xing.com/profile/Julia_Waehnert/" title="Xing"><i class="fa fa-xing"></i></a>
              <a target="_blank" href="https://www.linkedin.com/in/julia-whnert-09078a12b/" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
              <a target="_blank" href="https://github.com/MissPicky" title="Github"><i class="fa fa-github"></i></a>
            </div>
            <p>Created by <a href="http://erdbeerfleisch.de">Erdbeerfleisch Web-Development</a>. © 2017</p>
        </div>
    </footer>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- Toggle Modal -->
    <?php if(isset($_GET['error'])) : ?>
      <script>
        $('#myModal').modal('show');
      </script>
    <?php endif; ?>

</body>
</html>
