<?php
  require_once('functions/function.php');
  get_header();
  get_sidebar();

  if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $pw=md5($_POST['pw']);
    $rpw=md5($_POST['rpw']);
    $role = $_POST['role'];
    $prpic = $_FILES['prpic'];
    $imagename = '';

    if($prpic['name'] != ''){
      $imagename='user-profile-'.time().'-'.rand(100000,10000000).'.'.pathinfo($prpic['name'],PATHINFO_EXTENSION);
    }
    


    if(!empty($name)){
      if($pw === $rpw){
        if(!empty($email)){
          if(!empty($username)){
            if(!empty($role)){
              $insert="INSERT INTO rw_users(user_name, user_email, user_username, user_phone, user_passw, role_id, user_prpic)
              VALUES('$name', '$email', '$username', '$phone', '$pw', '$role', '$imagename')";


              if(mysqli_query($conn, $insert)) {
                move_uploaded_file($prpic['tmp_name'],'uploads/'.$imagename);
                echo "User registration successfull!";
                }else {
                  echo "Oops! Something went wrong!! Please try again!!!";
                }
              }else {
                echo "Please select user role!";
              }
          }else {
            echo "Please Enter your username!";
          }
        }else {
          echo "Please Enter your email!";
        }
      }else {
        echo "Password didn't match!";
      }
    }else {
      echo "Please Enter your name!";
    }
  }
?>
          <div class="row">
            <div class="main-content">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card text-center">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title"><i class="fab fa-gg-circle"></i> ADD USER</h5>
                        <a href="all-users.php" class="btn btn-dark btn-sm"><i class="fas fa-th"></i> ALL USERS</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label text-end">Name<span class="req-star">*</span>:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control w-75 text-muted" id="name" value="" placeholder="Your Name" name="name">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label text-end">Email<span class="req-star">*</span>:</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control w-75 text-muted" id="email" value="" placeholder="Your Email" name="email">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label text-end">Username<span class="req-star">*</span>:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control w-75 text-muted" id="usename" value="" placeholder="Your Username" name="username">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="phone" class="col-sm-2 col-form-label text-end">Phone:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control w-75 text-muted" id="phone" value="" placeholder="Your Phone Number" name="phone">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="passw" class="col-sm-2 col-form-label text-end">Password<span class="req-star">*</span>:</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control w-75 text-muted" id="passw" value="" placeholder="Your Password" name="pw">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="repassw" class="col-sm-2 col-form-label text-end">Confirm Password<span class="req-star">*</span>:</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control w-75 text-muted" id="repassw" value="" placeholder="Retype your password" name="rpw">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="role" class="col-sm-2 col-form-label text-end">User Role<span class="req-star">*</span>:</label>
                            <div class="col-sm-10">
                              <select id="role" class="form-control w-75" name="role">
                                <option value="">-----------</option>
                                <?php
                                  $sr="SELECT * FROM user_role ORDER BY role_id ASC";
                                  $qr=mysqli_query($conn,$sr);
                                  while($ur=mysqli_fetch_assoc($qr)){
                                  ?>
                                    <option value="<?= $ur['role_id']; ?>"><?= $ur['role_name']; ?></option>
                                  <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="prpic" class="col-sm-2 col-form-label text-end">Profile Picture:</label>
                            <div class="col-sm-10">
                              <input type="file" class="form-control w-75 " id="prpic" value="" placeholder="Upload your profile picture" name="prpic">
                            </div>
                          </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-sm btn-primary">REGISTER</button>
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