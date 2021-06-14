<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile - Codeigniter 4</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>

	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>">
</head>
<body>
    <?= view('_partials/navbar'); ?>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 mb-2">
                <div class="card">
                    <div class="card-header">
                        User Information
                    </div>
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
        </div>
    </div>

<!-- Bootstrap JS -->
<script src="<?= base_url('js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>
