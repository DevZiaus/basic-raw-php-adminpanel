<?php
  require_once('./functions/function.php');
  get_header();
  get_sidebar();

  $id = $_GET['v'];

  $sel = "SELECT * FROM rw_users WHERE user_id = '$id'";
  $q = mysqli_query($conn, $sel);
  $data = mysqli_fetch_assoc($q);
?>
          <div class="row">
            <div class="main-content">
              <form action="#" method="post">
                <div class="card text-center">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title"><i class="fab fa-gg-circle"></i> VIEW USER INFO</h5>
                        <a href="all-users.php" class="btn btn-dark btn-sm"><i class="fas fa-th"></i> ALL USERS</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                              <tbody>
                                <tr>
                                  <td class="text-end">Name</td>
                                  <td>:</td>
                                  <td class="text-start"><?= $data['user_name']; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-end">Email</td>
                                    <td>:</td>
                                    <td class="text-start"><?= $data['user_email']; ?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-end">Phone</td>
                                    <td>:</td>
                                    <td class="text-start"><?= $data['user_phone']; ?></td>
                                  </tr>
                                  <tr>
                                    <td class="text-end">Username</td>
                                    <td>:</td>
                                    <td class="text-start"><?= $data['user_username']; ?></td>
                                  </tr>
                                
                              </tbody>
                          </table>
                    </div>
                    <div class="card-footer text-center py-4">
                      <button type="submit" class="btn btn-sm btn-primary">Edit</button>
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