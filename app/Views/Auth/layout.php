<!DOCTYPE html>
<html lang="en">
<head>
	<?= view('_partials/header') ?>
</head>

<body class="hold-transition login-page">

    <div class="login-box">
        <?= $this->renderSection('main') ?>
    </div>

    <?= view('_partials/script') ?>

</body>
</html>
