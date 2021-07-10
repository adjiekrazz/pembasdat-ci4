<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <?=lang('Auth.register')?>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Register a new membership</p>
        
        <form action="<?= route_to('register') ?>" method="post">
            <?= csrf_field() ?>

            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" 
                    placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="text" name="username" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" 
                    placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                <div class="invalid-feedback">
                    <?= session('errors.username') ?>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" 
                    placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="password" name="pass_confirm" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" 
                    placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <div class="invalid-feedback">
                    <?= session('errors.pass_confirm') ?>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.register')?></button>
                </div>
            </div>
        </form>

        <hr>

        <p><?=lang('Auth.alreadyRegistered')?> <a href="<?= route_to('login') ?>"><?=lang('Auth.signIn')?></a></p>
    </div>
</div>

<?= $this->endSection() ?>
