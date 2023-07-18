<?= $this->extend('templates/navadm'); ?>
<!-- End of Topbar -->
<?= $this->Section('content-adm'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center">Dekripsi</h1>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible show fede">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">x</button>
                <b>Success</b>
                <?= session()->getFlashdata('success') ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="card">
        <div class="card-header">

            <h5 class="card-title">Dekripsi file</h5>

        </div>

        <div class="card-body table-responsive">
            <table class="table   table-striped w-auto text-center">

                <thead>
                    <tr class="table-danger">
                        <th style=" color: black;">No</th>
                        <th style="color: black;">Nama File Awal</th>
                        <th style="color:black;">Nama Dokumen Enkripsi</th>
                        <th style="color: black;">Status</th>
                        <th style="color: black;">Action</th>
                        <?php if (session()->job_title == 'admin') : ?>
                            <th style="color: black;">Action</th>
                        <?php endif ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data->getResult() as $key => $dataf) {


                    ?>

                        <tr class="table-info">
                            <td style=" color: black;"><?= $no++; ?>.</td>
                            <td style=" color: black;"><?= ucfirst($dataf->nama_file_awal) ?></td>
                            <td style=" color: black;"><?= ucfirst($dataf->nama_file_akhir) ?></td>
                            <td><?php
                                if ($dataf->status == "E") {
                                    echo "<b><p style= 'color: red;'>TERENKRIPSI</p></b>";
                                } elseif ($dataf->status == "D") {
                                    echo "<b><p style= 'color: green;' >TERDEKRIPSI</p></b>";
                                } else {
                                    echo "Status Tidak Diketahui";
                                }
                                ?></td>
                            <td><?php
                                if ($dataf->status == "E") {

                                    echo  '<a href="' . site_url('deskripsi/show/' . $dataf->id_file) . '" class="btn btn-success">DEKRIPSI</a>';
                                } elseif ($dataf->status == "D") {

                                    echo  '<a href="' . site_url('deskripsi/show/' . $dataf->id_file) . '" class="btn btn-success disabled">DEKRIPSI</a>';
                                } else {

                                    echo '<a href="#" class="btn btn-danger disabled">NONE</a>';
                                }
                                ?></td>
                            <?php if (session()->job_title == 'admin') : ?>
                                <td>
                                    <form action="<?= base_url('/admin/dekrip' .  $dataf->id_file); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-info " onclick="return confirm('apakah anda yakin');">Delete</button>
                                    </form>
                                </td>
                            <?php endif ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            </>
        </div>

    </div>

    <?= $this->endSection(); ?>