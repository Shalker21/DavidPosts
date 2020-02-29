<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">  
    <a class="navbar-brand" href="<?= URLROOT; ?>"><?= SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
      <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/posts/index">Home</a>
		    </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/posts/allPosts">All Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/posts/myPosts">My Posts</a>
		    </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/posts/profile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/posts/about">About</a>
        </li>
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/home/index">Home</a>
		    </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URLROOT; ?>/home/about">About</a>
        </li>
      <?php endif; ?>
      </ul>
      <ul class="navbar-nav ml-auto">
          <?php if(isset($_SESSION['user_id'])) : ?>
            <div class="row">
            <img src="http://placehold.it/40x30" class="rounded-circle mr-1"><b class="caret"></b></a>
            <li class="nav-item mr-3">
              <a class="nav-link" href="<?= URLROOT; ?>/posts">Welcome <?php echo $_SESSION['username']; ?></a>
            </li>
            </div>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/users/logout">Logout</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/users/login">Login</a>
            </li>
          <?php endif; ?>
      </ul>

    </div>
  </div>
</nav>