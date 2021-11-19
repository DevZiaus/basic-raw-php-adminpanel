<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="css/vendor/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Admin Panel</title>

    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>
<body>
    <header class="container-fluid bg-dark py-2">
      <div class="container d-flex justify-content-end">
        <div class="btn-group">
          <button type="button" class="btn my-btn rounded-circle dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <?php if($_SESSION['image'] != '') { ?>
              <img src="./uploads/<?= $_SESSION['image']; ?>" class="rounded-circle" alt="Profile Picture" height="40">
            <?php }else{ ?>
              <img src="./img/avatar.png"  class="rounded-circle" alt="Profile Picture" height="40">
            <?php } ?>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php">Dashboard</a></li>
            <li><a class="dropdown-item" href="view-user.php?v=<?= $_SESSION['id']; ?>">View Profile</a></li>
            <li><a class="dropdown-item" href="edit-user.php?e=<?= $_SESSION['id']; ?>">Edit Profile</a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </div>

      </div>
    </header>