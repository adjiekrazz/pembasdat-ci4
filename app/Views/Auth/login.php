<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="row justify-content-center align-items-center w-100">
    <div class="col-sm-8 col-md-6">

        <div class="card">
            <div class="card-header"><?=lang('Auth.loginTitle')?></div>
            <div class="card-body">

                <?= view('Auth'. DIRECTORY_SEPARATOR .'_message_block') ?>

                <form action="<?= route_to('login') ?>" method="post">
                    <?= csrf_field() ?>

                    <?php if ($config->validFields === ['email']): ?>
                    <div class="mb-3">
                        <label for="login" class="form-label"><?=lang('Auth.email')?></label>
                        <input type="email" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                name="login" placeholder="<?=lang('Auth.email')?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="mb-3">
                        <label for="login" class="form-label"><?=lang('Auth.emailOrUsername')?></label>
                        <input type="text" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
                        <div class="invalid-feedback">
                            <?= session('errors.login') ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="password" class="form-label"><?=lang('Auth.password')?></label>
                        <input type="password" name="password" class="form-control  <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>
                    </div>

                    <?php if ($config->allowRemembering): ?>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="remember" class="form-check-input" <?php if(old('remember')) : ?> checked <?php endif ?>>
                            <?=lang('Auth.rememberMe')?>
                        </label>
                    </div>
                    <?php endif; ?>

                    <br>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary"><?=lang('Auth.loginAction')?></button>
                    </div>
                </form>

                <hr>

                <?php if ($config->allowRegistration) : ?>
                <p><a href="<?= route_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
                <?php endif; ?>
                <?php if ($config->activeResetter): ?>
                <p><a href="<?= route_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
