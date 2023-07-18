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
        <h1 class="text-center"> Riwayat Transaksi </h1>
        <br>
        <div class='row'>
            <?php foreach ($boking as $key => $value) { ?>
                <div class='col-md-4'>
                    <div class="card">
                        <div class="card-header text-center">
                            <b>Lapangan <?= $value->noLap ?></b> <br>
                            Invoice : <?= $value->noInvoice ?>

                        </div>
                        <div class="card-body">
                            <img src="" alt="" style="width: 100%;">
                            <table style="width: 100%;" class="table">
                                <tr>
                                    <th>Atas Nama</td>
                                    <td><?= $value->atasNama ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?= $value->alamat ?></td>
                                </tr>
                                <tr>
                                    <th>Kontak</th>
                                    <td><?= $value->kontak ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?= $value->alamat ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td><?= $value->nama_status ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Booking</th>
                                    <td>
                                        <?= date('d F Y', strtotime($value->jamSelesaiBooking)) ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jam Booking</th>
                                    <td>
                                        <?= $value->jamMulaiBooking  ?>
                                        -
                                        <?= $value->jamSelesaiBooking ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Biaya</th>
                                    <td>
                                        <b>Rp.</b> <?= $value->totalBayar ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-top: 20px;">
                                        <?= $value->deskripsi ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
</section>
<!-- About section two-->

<?= $this->endSection(); ?>