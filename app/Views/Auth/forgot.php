<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="row justify-content-center align-items-center w-100">
    <div class="col-sm-8 col-md-6">

        <div class="card">
            <div class="card-header"><?=lang('Auth.forgotPassword')?></div>
            <div class="card-body">

                <?= view('Myth\Auth\Views\_message_block') ?>

                <p><?=lang('Auth.enterEmailForInstructions')?></p>

                <form action="<?= route_to('forgot') ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="email" class="form-label"><?=lang('Auth.emailAddress')?></label>
                        <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>">
                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>

                    <br>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary"><?=lang('Auth.sendInstructions')?></button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
