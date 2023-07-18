<?= $this->extend('auth/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container">

    <!-- Outer Row -->
    <div class="mt-5 row justify-content-center">

        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger alert-dismissible show fede">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">x</button>
                                        <b>Gagal</b>
                                        <?= session()->getFlashdata('error') ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php
                            if (session()->getFlashData('success')) {
                            ?>
                                <div class="alert alert-success alert-dismissible show fede">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">x</button>
                                        <b>Success</b>
                                        <?= session()->getFlashdata('success') ?>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="p-5">

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    <h1 class="h4 text-gray-900 mb-4">P.T. Jasa Guna Cemerlang</h1>
                                </div>

                                <form action="<?= site_url('login/loginproses') ?>" method="POST" autocomplete="off">
                                    <?= csrf_field() ?>


                                    <div class="form-group">
                                        <input id="username" type="text" class="form-control form-control-user" name="username" placeholder="username" required>
                                    </div>

                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control form-control-user " name="password" placeholder="password" required>

                                    </div>

                                    <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                                </form>
                                <hr>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?= $this->endSection(); ?>