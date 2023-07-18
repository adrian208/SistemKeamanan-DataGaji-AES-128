<?= $this->extend('templates/navadm'); ?>
<!-- End of Topbar -->
<?= $this->Section('content-adm'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-dark text-center">USER LIST</h1>
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fede">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success</b>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>
    <a href="<?= base_url('/admin/tuser'); ?>" class="btn btn-info mr-5 ml-5  mb-3 ">Tambah User</a>
    <div class="row table-responsive">
        <div class="mr-5 ml-5 justify-content-center">
            <table class="table  table-striped">
                <thead>
                    <tr class="table-danger">
                        <th scope="col" style=" color: black;">No</th>
                        <th scope="col" style=" color: black;">Username</th>
                        <th scope="col" style=" color: black;">phone</th>
                        <th scope="col" style=" color: black;">Role</th>
                        <th class="text-center" style=" color: black;" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr class="table-info">
                            <th scope="row" style=" color: black;"><?= $i++; ?></th>
                            <td style=" color: black;"><?= $user->username; ?></td>
                            <td style=" color: black;"><?= $user->phone; ?></td>
                            <td style=" color: black;"><?= $user->job_title; ?></td>
                            <td>
                                <a href="<?= base_url('admin/edit/' . $user->username); ?>" class="btn btn-info ">Edit</a>
                            </td>

                            <td>
                                <?php if (session()->username != $user->username) : ?>
                                    <form action="<?= base_url('/admin/delser' .  $user->username); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-info " onclick="return confirm('apakah anda yakin');">Delete</button>
                                    </form>
                                <?php endif ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>