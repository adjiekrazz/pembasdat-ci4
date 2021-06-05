<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Krazz Codeigniter 4</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
</head>
<body>
    <?= view('_partials/navbar'); ?>

    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                Welcome to main page.
            </div>
        </div>
    </div>

<!-- Bootstrap JS -->
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
