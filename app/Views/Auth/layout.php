<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Codeigniter 4</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
    <style>
    html, body {
        height: 100%;
    }
    </style>
    <?= $this->renderSection('pageStyles') ?>
</head>

<body>

    <div class="container d-flex h-100 justify-content-center">
        <?= $this->renderSection('main') ?>
    </div>

<!-- Bootstrap JS -->
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>

<?= $this->renderSection('pageScripts') ?>
</body>
</html>
