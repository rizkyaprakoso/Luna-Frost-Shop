<?= $this->extend('auth/template'); ?>

<?= $this->Section('content'); ?>

<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Create Account</h3>
                    </div>
                    <div class="card-body">
                        <!-- alert message -->
                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= url_to('register') ?>" method="post">
                        <?= csrf_field() ?>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="inputFirstName" type="email" 
                                            name="email" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>" />
                                        <label for="inputFirstName"><?=lang('Auth.email')?></label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="inputLastName" type="text" 
                                            name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>" />
                                        <label for="inputLastName"><?=lang('Auth.username')?></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="inputPassword" type="password" 
                                            name="password" placeholder="<?=lang('Auth.password')?>" autocomplete="off" />
                                        <label for="inputPassword"><?=lang('Auth.password')?></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" id="inputPasswordConfirm" type="password" 
                                        name="pass_confirm" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off"/>
                                        <label for="inputPasswordConfirm"><?=lang('Auth.repeatPassword')?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small">
                            <a href="<?= base_url('login'); ?>">Have an account? Go to login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection('content'); ?>
