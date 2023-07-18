<?= $this->extend('templates/navadm'); ?>
<!-- End of Topbar -->
<?= $this->Section('content-adm'); ?>


<div class="container-fluid">

    <h1 class="fw-bold text-dark-emphasis text-center">Dekripsi File</h1>

    <div class="card">
        <div class="card-header">

            <h5 class="card-title">Dekripsi File</h5>

        </div>

        <div class="card-body table-responsive">

            <form class="form-horizontal" method="POST" action="/dekripsi/decrypt_file" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <table class="table striped">
                    <?php $no = 1;
                    foreach ($data as $key => $dataf) {
                    ?>
                        <tr>
                            <td>Nama File Awal</td>
                            <td></td>
                            <td><?= ucfirst($dataf->nama_file_awal) ?></td>
                        </tr>
                        <tr>
                            <td>Nama Dokumen Enkripsi</td>
                            <td></td>
                            <td><?= ucfirst($dataf->nama_file_akhir) ?></td>
                        </tr>
                        <tr>
                            <td>Ukuran File</td>
                            <td></td>
                            <td><?= ucfirst($dataf->file_size) ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Enkripsi</td>
                            <td></td>
                            <td><?= ucfirst($dataf->tgl_upload) ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td></td>
                            <td><?= ucfirst($dataf->keterangan) ?></td>
                        </tr>
                        <tr>
                            <td>Masukan kunci Untuk Mendeskripsi</td>
                            <td></td>
                            <td>
                                <div class="col-md-6">
                                    <input type="hidden" name="idfile" value="<?= $dataf->id_file; ?>">
                                    <input class="form-control" type="password" placeholder="Kunci" name="kunci" required><br>
                                    <!-- <input class="btn btn-primary" type="submit" value="Dekripsi Dokumen" onClick="window.location.reload();"> -->
                                    <button type="submit" class="btn btn-primary" onClick="window.location.reload();">Dekripsi Dokumen</button>
                                </div>
                            </td>
                        <?php
                    }
                        ?>
                        </tr>
                </table>
            </form>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>