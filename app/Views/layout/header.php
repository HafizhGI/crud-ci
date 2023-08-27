<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->

    <?php if (session()->get('access') == 'Administrasi') { ?>
      <nav class=" navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li>
            <div class="navbar-header">
              <a href="javascript:void(0);" class="h-bars"></a>
              <a class="navbar-brand" href="<?= base_url('/dashboard') ?>"><img src="<?= base_url() ?>template/dist/img/gambar.png" width="200"><span class="m-l-10"></span></a>
            </div>
          </li>
        </ul>
      </nav>
      <nav class="navbar navbar-expand navbar-white navbar-light" style="background-color: #ff007f;">
        <ul class="navbar-nav">
          <li class="nav-item">
            <div class="container" style="display:grid; padding-top:5px;">
              <a href="<?= base_url('/dashboard') ?>" class="nav-link h5" style="font-family: 'Helvetica Neue', Arial, sans-serif; color:white;">Dashboard</a>
            </div>
          </li>
          <li class="nav-item">
            <div class="container" style="display:grid;  padding-top:5px;">
              <a href="<?= base_url('/inventroy') ?>" class="nav-link h5" style="font-family: 'Helvetica Neue', Arial, sans-serif;color:white;">
                Inventory</a>
            </div>
          </li>
          <li class="nav-item">
            <div class="container" style="display:grid; padding-top:5px;">
              <a href="<?= base_url('/InventoryController/Add') ?>" class="nav-link h5" style="font-family: 'Helvetica Neue', Arial, sans-serif;color:white;">
                Tambah Inventory</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link  " style="color:white;display:grid; padding-top:5px;" href="<?= base_url('AuthController/logout') ?>">
              <p style="font-size: 22px; padding-top:5px;">Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
    <?php } ?>
    <?php if (session()->get('access') == 'user') { ?>
      <nav class=" navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
          <li>
            <div class="navbar-header">
              <a href="javascript:void(0);" class="h-bars"></a>
              <a class="navbar-brand" href="<?= base_url('/dashboarduser') ?>"><img src="<?= base_url() ?>template/dist/img/gambar.png" width="200"><span class="m-l-10"></span></a>
            </div>
          </li>
        </ul>
      </nav>
      <nav class="navbar navbar-expand navbar-white navbar-light" style="background-color: #ff007f;">
        <ul class="navbar-nav">
          <li class="nav-item">
            <div class="container" style="display:grid; padding-top:5px;">
              <a href="<?= base_url('/InventoryController/dashboarduser') ?>" class="nav-link h5" style="font-family: 'Helvetica Neue', Arial, sans-serif;color:white;"></a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link  " style="color:white;display:grid; padding-top:5px;" href="<?= base_url('AuthController/logout') ?>">
              <p style="font-size: 22px; padding-top:5px;">Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
    <?php } ?>