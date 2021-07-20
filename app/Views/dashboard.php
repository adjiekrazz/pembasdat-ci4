<!DOCTYPE html>
<html lang="en">
<head>
	  <?= view('_partials/header') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <?= view('_partials/preloader') ?>
    <?= view('_partials/navbar') ?>
    <?= view('_partials/sidebar') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-solid">
                    <div class="card-body">
                          <p>Welcome to Content Management System made with Codeigniter 4!</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?= view('_partials/footer') ?>
    <?= view('_partials/script') ?>
</body>
</html>
