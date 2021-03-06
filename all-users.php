<?php
  require_once('functions/function.php');
  needLogged();
  if($_SESSION['role']=='1' || $_SESSION['role']=='2') {
  get_header();
  get_sidebar();
?>
          <div class="row">
            <div class="main-content">
              <form action="#" method="post">
                <div class="card text-center">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title"><i class="fas fa-users"></i> ALL USERS</h5>
                        <?php if($_SESSION['role']=='1'){ ?>
                          <a href="add-user.php" class="btn btn-dark btn-sm"><i class="fas fa-th"></i> ADD USER</a>
                        <?php } ?>
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
                                  $i = 1;
                                  $sel = "SELECT * FROM rw_users NATURAL JOIN user_role ORDER BY user_id DESC";
                                  $q = mysqli_query($conn, $sel);
                                  while($data = mysqli_fetch_assoc($q)){
                                ?>
                                <tr>
                                  <td scope="row"><?= $i++; ?></td>
                                  <td><?= $data['user_name']; ?></td>
                                  <td><?= $data['user_email']; ?></td>
                                  <td><?= $data['user_phone']; ?></td>
                                  <td><?= $data['user_username']; ?></td>
                                  <td><?= $data['role_name']; ?></td>
                                  <td>
                                    <?php if($data['user_prpic'] != '') { ?>
                                      <img src="uploads/<?= $data['user_prpic']; ?>" alt="Profile Picture" height="40">
                                    <?php }else{ ?>
                                      <img src="img/avatar.png" alt="Profile Picture" height="40">
                                    <?php } ?>
                                  </td>
                                  <td>
                                    <a href="view-user.php?v=<?= $data['user_id']; ?>"><i class="far fa-eye"></i></a>
                                    <?php if($_SESSION['role']=='1'){ ?>
                                      <a href="edit-user.php?e=<?= $data['user_id']; ?>"><i class="far fa-edit"></i></a>
                                      <a href="delete-user.php?d=<?= $data['user_id']; ?>"><i class="far fa-trash-alt"></i></a>
                                    <?php } ?>
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
  }else {
    echo "Access Denied!";
  }
?>