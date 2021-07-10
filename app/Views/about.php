<!DOCTYPE html>
<html lang="en">
<head>
    <?= view('_partials/header') ?>
</head>
<body>
    <?= view('_partials/navbar'); ?>
    <?= view('_partials/sidebar'); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>About</h1>
                </div>
                </div>
            </div>
        </section>

        <section class="content">

        <div class="card card-solid">
            <div class="card-body text-center">
                Made with <br/>
                CodeIgniter 4 <br/>
                Arif Purnomo Aji - 1811012
            </div>
        </div>

        </section>
    </div>

    <?= view('_partials/footer') ?>
    <?= view('_partials/script') ?>
</body>
</html>
