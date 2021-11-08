<?php
  require_once('./functions/function.php');
  get_header();
  get_sidebar();
?>
        <div class="col-md-10 main-content-area">
          <div class="row">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb py-3">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="main-content">
              <form action="#" method="post">
                <div class="card text-center">
                    <div class="card-header d-flex justify-content-between">
                        <h5 class="card-title"><i class="fab fa-gg-circle"></i> EDIT FORM DESIGN</h5>
                        <a href="#" class="btn btn-dark btn-sm"><i class="fas fa-th"></i> TABLE</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-2 col-form-label">Name:</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control w-75 text-muted" id="name" value="Md Ziaus Samad">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label for="email" class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-10">
                              <input type="email" class="form-control w-75 text-muted" id="email" value="dev.ziaus@gmail.com" disabled readonly>
                            </div>
                          </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
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