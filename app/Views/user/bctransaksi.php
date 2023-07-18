<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>
<header class="py-5">
    <div class="container px-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xxl-6">
                <div class="text-center my-5">
                    <h1 class="fw-bolder mb-3">Cara boking centro futsal.</h1>
                    <p class="lead fw-normal text-muted mb-4">Langkah pertama untuk melakukan proses pemesanan/boking lapangan, Anda harus daftar akun terlebih dahulu. Kemudian Anda akan diarahkan pada halaman login, setelah melakukan pendaftaran. Masuk ke halaman boking dan klik bombol boking. Pilih jadwal yang diinginkan jika tersedia, dan lalukan proses pemesanan hingga selesai. Tunjukan bukti boking ke penjaga centro futsal.</p>
                    <!--<a class="btn btn-primary btn-lg" href="#scroll-target">Read our story</a>-->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- About section one-->

<section class="py-5 bg-light" id="scroll-target">
    <div class="container px-5 my-3">
        <h1 class="text-center"> Daftar Jadwal Lapangan Centro Futsal Yogyakarta </h1>
        <br>
        <div class='row'>
            <div class=''>
                <table class='table table-bordered '>
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">lapangan</th>
                            <th scope="col">jam</th>
                            <th scope="col">harga</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($jadwal as $jdl) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><?= $jdl->tglJadwal; ?></td>
                                <td><?= $jdl->kdLap; ?></td>
                                <td><?= $jdl->jamBo; ?></td>
                                <td><?= "Rp" . number_format($jdl->harga, 2, ',', '.');  ?></td>
                                <td><?php if ($jdl->statusBoking == "B") {
                                        echo "<label class='  btn-danger'> Terpakai </label>";
                                    } elseif ($jdl->statusBoking == "R") {
                                        echo "
												<label class='label btn-success'>Tersedia</label>";
                                    }
                                    ?></td>
                                <td>
                                    <?php if ($jdl->statusBoking == "R") : ?>
                                        <a href="<?= base_url('user/transaksi/' . $jdl->kdJadwal); ?>" class="btn btn-info">Boking</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
</section>
<!-- About section two-->

<?= $this->endSection(); ?>