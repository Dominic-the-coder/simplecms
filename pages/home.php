<?php

require 'parts/header.php';

?>

<?php if ( isset( $_SESSION['user'] ) ) : ?>
<div class="container mx-auto my-5" style="max-width: 500px;">
      <h1 class="h1 mb-4 text-center">My Blog</h1>
      <h4>Welcome Back! <?= $_SESSION['user']['name']; ?></h4>
      <div class="card mb-2">
        <div class="card-body">
          <h5 class="card-title">Post 4</h5>
          <p class="card-text">Here's some content about post 4</p>
          <div class="text-end">
            <a href="/post" class="btn btn-primary btn-sm">Read More</a>
          </div>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-body">
          <h5 class="card-title">Post 3</h5>
          <p class="card-text">This is for post 3</p>
          <div class="text-end">
            <a href="/post" class="btn btn-primary btn-sm">Read More</a>
          </div>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-body">
          <h5 class="card-title">Post 2</h5>
          <p class="card-text">This is about post 2</p>
          <div class="text-end">
            <a href="/post" class="btn btn-primary btn-sm">Read More</a>
          </div>
        </div>
      </div>
      <div class="card mb-2">
        <div class="card-body">
          <h5 class="card-title">Post 1</h5>
          <p class="card-text">This is a post</p>
          <div class="text-end">
            <a href="/post" class="btn btn-primary btn-sm">Read More</a>
          </div>
        </div>
      </div>
    
      <div class="d-flex justify-content-center">
        <a href="/logout">Logout</a>
      </div>
      <?php else: ?>
        <div class="card rounded shadow-sm mx-auto my-4" style="max-width: 500px">
        <div class="card-body">
          <h3 class="card-title mb-3">My Blog</h3>
          <h4>Please Login To Continue</h4>
          <?php if ( isset( $_SESSION['user'] ) ) : ?>
        </div>
        <?php else : ?>
        <a href="/login">Login</a>
        <a href="/signup">Sign Up</a>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    
    <?php
      require 'parts/footer.php';
   ?>   