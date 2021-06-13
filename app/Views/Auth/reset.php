<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="row justify-content-center align-items-center w-100">
    <div class="col-sm-8 col-md-6">

        <div class="card">
            <h2 class="card-header"><?=lang('Auth.resetYourPassword')?></h2>
            <div class="card-body">

                <?= view('Auth'. DIRECTORY_SEPARATOR .'_message_block') ?>

                <p><?=lang('Auth.enterCodeEmailPassword')?></p>

                <form action="<?= route_to('reset-password') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="token" class="form-label"><?=lang('Auth.token')?></label>
                        <input type="text" class="form-control <?php if(session('errors.token')) : ?>is-invalid<?php endif ?>"
                                name="token" placeholder="<?=lang('Auth.token')?>" value="<?= old('token', $token ?? '') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.token') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label"><?=lang('Auth.email')?></label>
                        <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>

                    <br>

                    <div class="mb-3">
                        <label for="password" class="form-label"><?=lang('Auth.newPassword')?></label>
                        <input type="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>"
                                name="password">
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="pass_confirm" class="form-label"><?=lang('Auth.newPasswordRepeat')?></label>
                        <input type="password" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                name="pass_confirm">
                        <div class="invalid-feedback">
                            <?= session('errors.pass_confirm') ?>
                        </div>
                    </div>

                    <br>
                        
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary"><?=lang('Auth.resetPassword')?></button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
