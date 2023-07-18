<?= $this->extend('templates/navadm'); ?>
<!-- End of Topbar -->
<?= $this->Section('content-adm'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-10  ml-4 justify-content-center">
            <h1 class="h3 my-3 text-gray-800 text-center">Enkripsi</h1>
            <?php $validation = \Config\Services::validation(); ?>
            <form action="/admin/savefile" method="POST" autocomplete="off" enctype="multipart/form-data">
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible show fede">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                            <b>Success</b>
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?= csrf_field(); ?>
                <input type="hidden" class="form-control " id="username" name="username" value="<?= session()->username; ?>">
                <div class="row mb-3">
                    <label for="noLap" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <td><input type="readonly" class="form-control" id="tgl_upload" name="tgl_upload" value="<?= date("Y-m-d"); ?>" readonly>
                    </div>
                </div>

                <div class="row ">
                    <label for="gambarLap" class="col-sm-2 col-form-label">file</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= $validation->hasError('fileup') ? 'is-invalid' : null ?>" id="fileup" name="fileup">
                            <!-- <label class="input-group-text" for="fileup">Upload</label> -->
                            <div class="input-group mt-1"><label class="" style=" color: #F08080;">File .doc .pdf .xls</label></div>
                            <div class="invalid-feedback">
                                <?= $validation->getError('fileup') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Key</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?= $validation->hasError('kunci') ? 'is-invalid' : null ?>" id="kunci" name="kunci">
                        <div class="input-group mt-1"><label class="" style=" color: #F08080;">Key berjumlah 16 karakter boleh angka,huruf atau keduanya</label></div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kunci') ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : null ?>" id="keterangan" name="keterangan">
                        <div class="invalid-feedback">
                            <?= $validation->getError('keterangan') ?>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2  mx-auto col-8">
                    <button type="submit" class="btn btn-primary col-sm-3">Save</button>
                </div>
            </form>
        </div>
    </div>


</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>