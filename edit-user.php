<?php
  require_once('functions/function.php');
  get_header();
  get_sidebar();

  $eid = $_GET['e'];
  $sel = "SELECT * FROM rw_users WHERE user_id='$eid'";
  $q = mysqli_query($conn, $sel);
  $data = mysqli_fetch_assoc($q);

  if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $role = $_POST['role'];
    $prpic = $_FILES['prpic'];
    $imagename = '';

    if($prpic['name'] != ''){
      $imagename='user-profile-'.time().'-'.rand(100000,10000000).'.'.pathinfo($prpic['name'],PATHINFO_EXTENSION);
    }
    


    if(!empty($name)){
        if(!empty($email)){
            if(!empty($role)){
                $update="UPDATE rw_users SET user_name = '$name', user_email = '$email', user_phone = '$phone', role_id = '$role' WHERE user_id = '$eid'";


              if(mysqli_query($conn, $update)) {
                if($prpic['name'] != ''){
                    $imgupdate = "UPDATE rw_users SET user_prpic = '$imagename' WHERE user_id = $eid";
                    mysqli_query($conn, $imgupdate);
                    move_uploaded_file($prpic['tmp_name'],'uploads/'.$imagename);
                    header('Location: view-user.php?v='.$eid);
                }
                
                header('Location: view-user.php?v='.$eid);
                }else {
                  echo "Oops! Something went wrong!! Please try again!!!";
                }
              }else {
                echo "Please select user role!";
              }
        }else {
          echo "Please Enter your email!";
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
                        <h5 class="card-title"><i class="fab fa-gg-circle"></i> UPDATE USER INFO</h5>
                        <a href="all-users.php" class="btn btn-dark btn-sm"><i class="fas fa-th"></i> ALL USERS</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label text-end">Name<span class="req-star">*</span>:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control w-75 text-muted" id="name" value="<?= $data['user_name']; ?>" placeholder="Your Name" name="name">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label text-end">Email<span class="req-star">*</span>:</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control w-75 text-muted" id="email" value="<?= $data['user_email']; ?>" placeholder="Your Email" name="email">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="username" class="col-sm-2 col-form-label text-end">Username<span class="req-star">*</span>:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control w-75 text-muted" id="usename" value="<?= $data['user_username']; ?>" placeholder="Your Username" name="username" disabled>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="phone" class="col-sm-2 col-form-label text-end">Phone:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control w-75 text-muted" id="phone" value="<?= $data['user_phone']; ?>" placeholder="Your Phone Number" name="phone">
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
                                    <option value="<?= $ur['role_id']; ?>" <?php if($ur['role_id'] == $data['role_id']) {echo 'selected';} ?>><?= $ur['role_name']; ?></option>
                                  <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="prpic" class="col-sm-2 col-form-label text-end">Profile Picture:</label>
                            <div class="col-sm-4">
                              <input type="file" class="form-control w-75 " id="prpic" value="" name="prpic">
                            </div>
                            <div class="col-sm-2">
                            <?php if($data['user_prpic'] != '') { ?>
                                <img src="uploads/<?= $data['user_prpic']; ?>" alt="Profile Picture" height="80">
                                <?php }else{ ?>
                                    <img src="img/avatar.png" alt="Profile Picture" height="80">
                                <?php } ?>
                            </div>
                          </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-sm btn-primary">UPDATE</button>
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