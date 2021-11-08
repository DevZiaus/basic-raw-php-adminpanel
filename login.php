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
                    <form action="#" method="post">
                        <div class="form-floating mb-3"> <!-- Email Input -->
                            <input type="email" name="log-email" class="form-control d-flex align-items-center" id="log-email" placeholder="name@example.com" required autofocus>
                            <label for="log-email">Email</label>
                        </div>
                        <div class="form-floating"> <!-- Password Input -->
                            <input type="password" name="log-pass" class="form-control d-flex align-items-center" id="log-pass" placeholder="Password" required>
                            <label for="log-pass">Password</label>
                        </div>
                        <button type="submit" class="btn btn-lg btn-primary w-100 mt-3">Submit</button>
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
          <a class="devziaus" href="https://www.devziaus.ga">DevZiaus</a> | All rights reserved.
        </p>
      </footer>
    <script src="./js/vendor/jquery-3.6.0.min.js"></script>
    <script src="./js/vendor/bootstrap.bundle.min.js"></script>
    <script src="./js/vendor/all.min.js"></script>
    <script src="./js/app.js"></script>
</body>
</html>