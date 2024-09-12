<?php

// check if whoever that viewing this page is logged in.
// if not logged in, you want to redirect back to login page
checkIfuserIsNotLoggedIn();

 require "parts/header.php"; 
 ?>

<div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Add New Post</h1>
      </div>
      <div class="card mb-2 p-4">
         <!--
        1. form method and action
        2. field's name
        3. display error message
        -->
        <?php require "parts/error_message.php"?>
        <form action="/post/add" method="POST">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" />
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea
              class="form-control"
              id="content"
              rows="10"
              name="content"
            ></textarea>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="/manage-posts" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Posts</a
        >
      </div>
    </div>

    <?php
       require 'parts/footer.php';
    ?>