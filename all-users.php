<?php
  require_once('functions/function.php');
  get_header();
  get_sidebar();
?>
          <div class="row">
            <div class="main-content">
              <form action="#" method="post">
                <div class="card text-center">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title"><i class="fas fa-users"></i> ALL USERS</h5>
                        <a href="add-user.php" class="btn btn-dark btn-sm"><i class="fas fa-th"></i> ADD USER</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="bg-dark text-light">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Phone</th>
                                  <th scope="col">Username</th>
                                  <th scope="col">Role</th>
                                  <th scope="col">Profile Picture</th>
                                  <th scope="col">Manage</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $sel = "SELECT * FROM rw_users NATURAL JOIN user_role ORDER BY user_id DESC";
                                  $q = mysqli_query($conn, $sel);
                                  while($data = mysqli_fetch_assoc($q)){
                                ?>
                                <tr>
                                  <th scope="row">
                                  <?php 
                                    $i = 1;
                                    $i++;
                                  ?>
                                  </th>
                                  <td><?= $data['user_name']; ?></td>
                                  <td><?= $data['user_email']; ?></td>
                                  <td><?= $data['user_phone']; ?></td>
                                  <td><?= $data['user_username']; ?></td>
                                  <td><?= $data['role_name']; ?></td>
                                  <td>
                                    <?php if($data['user_prpic'] != '') { ?>
                                      <img src="uploads/<?= $data['user_prpic']; ?>" alt="Prpfile Picture" height="40">
                                    <?php }else{ ?>
                                      <img src="img/avatar.jpg" alt="Prpfile Picture" height="40">
                                    <?php } ?>
                                  </td>
                                  <td>
                                    <a href="view-user.php?v=<?= $data['user_id']; ?>"><i class="far fa-eye"></i></a>
                                    <a href="#"><i class="fas fa-pen-square fa-lg"></i></a>
                                    <a href="#"><i class="fas fa-trash fa-lg"></i></a>
                                  </td>
                                </tr>
                                <?php } ?>
                              </tbody>
                          </table>
                    </div>
                    <div class="card-footer text-center py-4">
                        
                    </div>
                  </div>
              </form>
            </div>
          </div>
        </div>
    </main>
<?php
  get_footer();
?>