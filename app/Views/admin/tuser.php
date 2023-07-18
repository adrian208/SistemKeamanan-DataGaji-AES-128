<?= $this->extend('templates/navadm'); ?>
<!-- End of Topbar -->
<?= $this->Section('content-adm'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-10  ml-4 justify-content-center">
            <h1 class="h3 my-3 text-gray-800 text-center">Form Tambah User</h1>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible show fede">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>Success</b>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="/admin/saveuser" method="POST" autocomplete="off">

                <?= csrf_field(); ?>

                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : null ?>" id="username" name="username" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('username') ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-sm-2 col-form-label">No Hp</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control <?= $validation->hasError('phone') ? 'is-invalid' : null ?>" id="phone" name="phone">
                        <div class="invalid-feedback">
                            <?= $validation->getError('phone') ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : null ?>" id="password" name="password">
                        <div class="invalid-feedback">
                            <?= $validation->getError('password') ?>
                        </div>
                    </div>
                </div>
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
                    <button type="submit" class="btn btn-primary  col-sm-3">Tambah</button>
                </div>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>