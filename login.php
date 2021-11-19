<?php
    require_once('functions/function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="./css/vendor/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Admin Panel</title>

    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>
<body>

    <header class="container-fluid py-5">
        <div class="logo text-center">
            <h4>DASHBOARD</h4>
        </div>
    </header>
    <main class="container d-flex justify-content-center">
        <div class="col-md-4 col-sm-6">
            <div class="card border-info pb-4 rounded-3">
                <div class="card-header w-100 d-flex justify-content-center">
                    <h5 class="card-title">Sign In to Continue</h5>
                </div>
                <div class="card-body">
                    <?php
                        if(!empty($_POST)){
                            $username = $_POST['username'];
                            $password = md5($_POST['password']);

                            if(!empty($username)){
                                if(!empty($password)){
                                    $vrfy = "SELECT * FROM rw_users WHERE user_username='$username' AND user_passw='$password'";
                                    $qry = mysqli_query($conn, $vrfy);
                                    $usr = mysqli_fetch_assoc($qry);

                                    if($usr){
                                        $_SESSION['id'] = $usr['user_id'];
                                        $_SESSION['name'] = $usr['user_name'];
                                        $_SESSION['username'] = $usr['user_username'];
                                        $_SESSION['email'] = $usr['user_email'];
                                        $_SESSION['phone'] = $usr['user_phone'];
                                        $_SESSION['image'] = $usr['user_prpic'];
                                        $_SESSION['role'] = $usr['role_id'];
                                        header('Location: index.php');
                                    }else {
                                        echo "Username or Password Didn't Match";
                                    }
                                }else{
                                    echo "Please enter your password!";
                                }    
                            }else {
                                echo "Please enter your username!";
                            }
                        }
                    ?>
                    <form method="post" action="">
                        <div class="form-floating mb-3"> <!-- Username Input -->
                            <input type="text" name="username" class="form-control d-flex align-items-center" id="username" placeholder="Username" autofocus>
                            <label for="username">Username</label>
                        </div>
                        <div class="form-floating"> <!-- Password Input -->
                            <input type="password" name="password" class="form-control d-flex align-items-center" id="password" placeholder="Password">
                            <label for="password">Password</label>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary w-100 mt-3">Sign In</button>
                        <div class="login-extras d-flex justify-content-between mt-2">
                            <div class="logged-in">
                                <input type="checkbox" id="check-rem" value="remember-me">
                                <label for="check-rem">Keep me signed in</label>
                            </div>
                            <a href="#" class="forgot-pass">Forgot password?</a>
                        </div>
                    </form>
                </div>
                
                </div>
        </div>
    </main>
    
    <footer class="container-fluid bg-dark text-light d-flex justify-content-center align-items-center pt-2 fixed-bottom">
        <p> 
          &copy; Copyright 
          <script type="text/JavaScript">document.write(new Date().getFullYear());
          </script>
          <a class="devziaus" href="https://www.devziaus.ga" target="_blank">DevZiaus</a> | All rights reserved.
        </p>
      </footer>
    <script src="./js/vendor/jquery-3.6.0.min.js"></script>
    <script src="./js/vendor/bootstrap.bundle.min.js"></script>
    <script src="./js/vendor/all.min.js"></script>
    <script src="./js/app.js"></script>
</body>
</html>