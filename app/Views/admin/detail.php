<?= $this->extend('templates/navadm'); ?>

<?= $this->Section('content-adm'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-10  ml-4 justify-content-center">
            <h1 class="h3 my-3 text-gray-800 text-center">Form Edit User</h1>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible show fede">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>Success</b>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php
            if (session()->getFlashData('error')) {
            ?>
                <div class="alert alert-danger alert-dismissible show fede">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>Error</b>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                </div>
            <?php
            }
            ?>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= site_url('/admin/updateuser/' . $users->username) ?>" method="POST" autocomplete="off">

                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : null ?>" id="username" name="username" value="<?= $users->username; ?>" readonly>
                        <div class="invalid-feedback">
                            <?= $validation->getError('username') ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('phone') ? 'is-invalid' : null ?>" id="phone" name="phone" value="<?= $users->phone; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('phone') ?>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="form-control " id="passwordhid" name="passwordhid" value="<?= $users->password; ?>">

                <div class="row mb-3">
                    <label for="job_title" class="col-sm-2 col-form-label">Jabatan</label>
                    <div class="col-sm-10">
                        <div class="col">
                            <select name='job_title' class="form-select">
                                <option name='job_title1' value="admin">admin</option>
                                <option name='job_title2' value="user">user</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2  mx-auto col-8">
                    <button type="submit" class="btn btn-primary col-sm-3 ">Ubah data</button>
                </div>
            </form>
            <br>


            <h1 class="h3 my-3 text-gray-800 text-center">Form Edit Password</h1>
            <form action="<?= site_url('/admin/updatepwd/' . $users->username) ?>" method="POST" autocomplete="off">

                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">


                <input type="hidden" class="form-control " id="passwordhid" name="passwordhid" value="<?= $users->password; ?>">

                <div class="row mb-3">
                    <label for="oldpassword" class="col-sm-2 col-form-label">Password saat ini</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?= $validation->hasError('oldpassword') ? 'is-invalid' : null ?>" id="oldpassword" placeholder="Password saat ini" name="oldpassword">
                        <div class="invalid-feedback">
                            <?= $validation->getError('oldpassword') ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="brpassword" class="col-sm-2 col-form-label">Password baru</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?= $validation->hasError('brpassword') ? 'is-invalid' : null ?>" id="brpassword" placeholder="Masukan password baru" name="brpassword">
                        <div class="invalid-feedback">
                            <?= $validation->getError('brpassword') ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="cmpassword" class="col-sm-2 col-form-label">Konfirmasi password baru</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?= $validation->hasError('cmpassword') ? 'is-invalid' : null ?>" id="cmpassword" placeholder="Konfirmasi password baru" name="cmpassword">
                        <div class="invalid-feedback">
                            <?= $validation->getError('cmpassword') ?>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-2  mx-auto col-8">
                    <button type="submit" class="btn btn-primary col-sm-3 ">Ubah Password</button>
                </div>
            </form>


        </div>
    </div>


</div>
<br>
<?= $this->endSection(); ?>