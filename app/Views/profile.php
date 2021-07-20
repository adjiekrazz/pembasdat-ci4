<!DOCTYPE html>
<html lang="en">
<head>
<?= view('_partials/header') ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <?= view('_partials/preloader') ?>
    <?= view('_partials/navbar'); ?>
    <?= view('_partials/sidebar'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" readonly value="<?= $user->email ?>">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" readonly value="<?= $user->username ?>">
                        </div>
                        <div class="mb-3">
                            <label for="registration_date" class="form-label">Registration Date</label>
                            <input type="text" class="form-control" id="registration_date" readonly value="<?= $user->created_at ?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?= view('_partials/footer') ?>
    <?= view('_partials/script') ?>
</body>
</html>
