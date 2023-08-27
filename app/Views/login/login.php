<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD WITH REST API | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url("template/plugins/fontawesome-free/css/all.min.css") ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url("template/plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">
  <!-- Theme style -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url("template/dist/css/adminlte.min.css") ?>">

</head>

<body class="hold-transition">
  <div class="container">
    <div class="container col-md-10">
      <div class="row justify-content-center">
        <h1 style="margin-top: 20px; color:#8080ff"><b>CRUD WITH REST API</b></h1>
      </div>
      <div class="row justify-content-center">
        <h2 style="margin-top: 10px; color:#fb6d04"><b>PT MITRAMAS INFOSYS GLOBAL</b></h2>
      </div>
    </div>
    <div class="card-1">
      <div class="row" style="margin-top: 20px">

        <div class="row justify-content-start">
          <lottie-player src="https://lottie.host/a6793513-1d28-4617-99fd-b4c692149876/EPBOy1Rdzn.json" background="transparent" speed="1" style="width: 500px; height: 500px;" loop autoplay></lottie-player>
        </div>

        <div class=" container col-md-6" style="margin-top:70px">
          <div class="row">
            <div class="container col-md-8">
              <div class="login-wrap ">
              </div>
              <div class="col-md-12" style="margin-top:10px">
                <h3 class="mb-5 text-center" style="color:black; font-family: 'Fjalla One', sans-serif;">Login</h3>
                <!-- <p class="login-box-msg">Register a new membership</p> -->
                <?php $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                  <div class="alert alert-danger" role="alert">
                    <ul>
                      <?php foreach ($errors as $error) : ?>
                        <li><?= esc($error) ?> </li>
                      <?php endforeach ?>
                    </ul>
                  </div>
                <?php } ?>

                <?php
                if (session()->getFlashdata('pesan')) {
                  echo '<div class="alert alert-success" role="alert">';
                  echo session()->getFlashdata('pesan');
                  echo '</div>';
                }
                ?>
                <?php
                if (session()->getFlashdata('pesan2')) {
                  echo '<div class="alert alert-danger" role="alert">';
                  echo session()->getFlashdata('pesan2');
                  echo '</div>';
                }
                ?>

                <?php
                echo form_open('AuthController/cek_login');
                ?>
                <div class="input-group mb-3">
                  <input name="name_user" class="form-control" placeholder="Nama User">
                  <div class="input-group-append">
                  </div>
                </div>

                <div class="input-group mb-3">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                  <div class="input-group-append">
                  </div>
                </div>
                <div class="row">
                  <!-- /.col -->
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                  </div>
                  <!-- /.col -->
                </div>

                <?php form_close(); ?>
                <!-- <a class="link" href="< ?= base_url('AuthController/register') ?>">register..</a> -->
              </div>
            </div>
          </div>
          <!-- /.form-box -->
        </div>
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
    <div class="row justify-content-center">
      <h6 style="margin-top: 10px; color:#000000"> cRUD WITH API &copy; Hafizh Fauzi <?= date('Y'); ?> <a href="https://www.mig.id/">PT MITRAMAS INFOSYS GLOBAL</a></h6>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url("template/plugins/jquery/jquery.min.js") ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url("template/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url("template/dist/js/adminlte.min.js") ?>"></script>
    <script>
      window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
          $(this).remove();
        });
      }, 3000);
    </script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>

</html>