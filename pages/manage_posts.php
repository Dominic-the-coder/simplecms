<?php

// check if whoever that viewing this page is logged in.
// if not logged in, you want to redirect back to login page
checkIfuserIsNotLoggedIn();

// 1. connect to the database
$database = connectToDB();

// 2. get all the users
// 2.1
$sql = "SELECT * FROM posts";
$sql2 = "SELECT * FROM `posts` WHERE `user_id` = '3'";
// 2.2
$query = $database->prepare( $sql );
$query2 = $database->prepare( $sql2 );
// 2.3
$query->execute();
$query2->execute();
// 2.4
$posts = $query->fetchAll();
$posts2 = $query2->fetchAll();

   require 'parts/header.php';
?>

<?php if ( $_SESSION['user']['role'] == 'admin' || $_SESSION['user']['role'] == 'editor' ) : ?>
  
    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Manage Posts</h1>
        <div class="text-end">
          <a href="/manage-posts-add" class="btn btn-primary btn-sm"
            >Add New Post</a
          >
        </div>
      </div>
      <div class="card mb-2 p-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col" style="width: 40%;">Title</th>
              <th scope="col">Status</th>
              <th scope="col" class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- 3. use foreach to display all the posts -->
            <?php foreach ($posts as $index => $posts) :?>
             <tr>
              <th scope="row"><?= $posts['id']?></th>
              <td><?= $posts['title']?></td>
              <td>
                <?php if ( $posts['status'] == 'publish' ) : ?>
                  <span class="badge bg-success">Publish</span>
                <?php endif; ?>
                <?php if ( $posts['status'] == 'pending' ) : ?>
                  <span class="badge bg-warning">Pending Review</span>
                <?php endif; ?>
              </td>
              <td class="text-end">
                <div class="buttons">
                  <a href="/post.php?id=<?= $posts['id']; ?>" class="btn btn-primary btn-sm me-2"><i class="bi bi-eye"></i></a>
                  <a href="/manage-posts-edit?id=<?= $posts['id']; ?>" class="btn btn-success btn-sm me-2"><i class="bi bi-pencil"></i></a>

                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-post-<?= $posts['id']; ?>">
                    <i class="bi bi-trash"></i>
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="delete-post-<?= $posts['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabdel">Delete User: <?= $posts['title']; ?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                          This action cannot be reversed.
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <form method="POST" action="/post/delete">
                            <input type="hidden" name="id" value="<?= $posts['id']; ?>" />
                            <button class="btn btn-danger"> <i class="bi bi-trash"></i> Delete Now</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
             </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
<?php else : ?>

  <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Manage Posts</h1>
        <div class="text-end">
          <a href="/manage-posts-add" class="btn btn-primary btn-sm"
            >Add New Post</a
          >
        </div>
      </div>
      <div class="card mb-2 p-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col" style="width: 40%;">Title</th>
              <th scope="col">Status</th>
              <th scope="col" class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- 3. use foreach to display all the posts -->
            <?php foreach ($posts2 as $index => $posts) :?>
             <tr>
              <th scope="row"><?= $index+1?></th>
              <td><?= $posts['title']?></td>
              <td>
                <?php if ( $posts['status'] == 'publish' ) : ?>
                  <span class="badge bg-success">Publish</span>
                <?php endif; ?>
                <?php if ( $posts['status'] == 'pending' ) : ?>
                  <span class="badge bg-warning">Pending Review</span>
                <?php endif; ?>
              </td>
              <td class="text-end">
                <div class="buttons">
                  <a href="/post.php?id=<?= $posts['id']; ?>" class="btn btn-primary btn-sm me-2"><i class="bi bi-eye"></i></a>
                  <a href="/manage-posts-edit?id=<?= $posts['id']; ?>" class="btn btn-success btn-sm me-2"><i class="bi bi-pencil"></i></a>

                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-post-<?= $posts['id']; ?>">
                    <i class="bi bi-trash"></i>
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="delete-post-<?= $posts['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabdel">Delete User: <?= $posts['title']; ?></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                          This action cannot be reversed.
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <form method="POST" action="/post/delete">
                            <input type="hidden" name="id" value="<?= $posts['id']; ?>" />
                            <button class="btn btn-danger"> <i class="bi bi-trash"></i> Delete Now</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
             </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

<?php endif; ?>

      <div class="text-center">
        <a href="/dashboard" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Dashboard</a
        >
      </div>
    </div>

    <?php
       require 'parts/footer.php';
    ?>