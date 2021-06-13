<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="row justify-content-center align-items-center w-100">
    <div class="col-sm-8 col-md-6">

        <div class="card">
            <div class="card-header"><?=lang('Auth.register')?></div>
            <div class="card-body">

                <?= view('Auth'. DIRECTORY_SEPARATOR .'_message_block') ?>
                
                <form action="<?= route_to('register') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="email" class="form-label"><?=lang('Auth.email')?></label>
                        <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                        <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label"><?=lang('Auth.username')?></label>
                        <input type="text" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label"><?=lang('Auth.password')?></label>
                        <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                    </div>

                    <div class="mb-3">
                        <label for="pass_confirm" class="form-label"><?=lang('Auth.repeatPassword')?></label>
                        <input type="password" name="pass_confirm" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                    </div>

                    <br>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.register')?></button>
                    </div>
                </form>


                <hr>

                <p><?=lang('Auth.alreadyRegistered')?> <a href="<?= route_to('login') ?>"><?=lang('Auth.signIn')?></a></p>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
