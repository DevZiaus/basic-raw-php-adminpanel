<main class="container-fluid">
      <div class="row">
        <aside class="col-md-2 bg-dark text-light sidebar">
          <div class="user-info">
            <div class="user-image rounded-circle py-2 d-flex justify-content-center">
              <?php if($_SESSION['image'] != '') { ?>
                <img src="./uploads/<?= $_SESSION['image']; ?>" class="rounded-circle" alt="Profile Picture" height="75">
              <?php }else{ ?>
                <img src="./img/avatar.png"  class="rounded-circle" alt="Profile Picture" height="75">
              <?php } ?>
            </div>
            <h5 class="text-center"><?= $_SESSION['name']; ?></h5>
            <p class="text-center"><span class="small"><i class="fas fa-circle"></i> Online</span></p>
          </div>
          <div class="sidebar-menu">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="index.php"><i class="fas fa-home"></i> Dashboard</a>
              </li>
              <?php if($_SESSION['role']=='1'){ ?>
                <li class="nav-item">
                  <a class="nav-link" href="add-user.php"><i class="fas fa-user-plus"></i> Add User</a>
                </li>
              <?php 
                }
                if($_SESSION['role']=='1' || $_SESSION['role']=='2'){
              
              ?>
                <li class="nav-item">
                  <a class="nav-link" href="all-users.php"><i class="fas fa-users"></i> All User</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><i class="fab fa-bandcamp"></i> Banner</a>
                </li>
              <?php } ?>
              <li class="nav-item">
                <a class="nav-link" href="logout.php"><i class="fas fa-power-off"></i> Logout</a>
              </li>
            </ul>
          </div>
        </aside>
        <div class="col-md-10 main-content-area">
          <div class="row">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb py-3">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </nav>
          </div>