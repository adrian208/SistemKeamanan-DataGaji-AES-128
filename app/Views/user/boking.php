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

<div class="row bg-light center">
    <div class="col-md-12 col-lg-12">
        <h1 class=" text-center fw-bolder mb-3">Jadwal lapangan di boking,<?= "Y-m-d"; ?></h1>
        <table class="  table table table-striped" data-toggle="data-table" cellspacing=" 0" width="100%">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Lapangan</th>
                    <th scope="col">Jam mulai</th>
                    <th scope="col">Jam Selesai</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>

                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= @$jadwalbo->tglBooking ?></td>
                    <td><?= @$jadwalbo->noLap ?></td>
                    <td><?= @$jadwalbo->jamMulaiBooking ?></td>
                    <td><?= @$jadwalbo->jamSelesaiBooking ?></td>
                    <td><?= @$jadwalbo->kdStatus ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<section class="py-5 " id="scroll-target">
    <div class="container px-5 my-5">
        <h1 class="text-center fw-bolder mb-3">Lapangan</h1>
        <?php foreach ($lapangan as $lap) : ?>
            <div class="row gx-5 align-items-center my-5">

                <br>
                <div class="col-lg-6 my-10"><img class="img-fluid rounded mb-5 mb-lg-0" src="<?= base_url(); ?>/img/<?= @$lap->gambarLap; ?>" alt="..." /></div>
                <div class="col-lg-6">
                    <h2 class="fw-bolder"><?= "lapangan" . @$lap->noLap; ?></h2>
                    <p class="lead fw-normal text-muted mb-0"><?= @$lap->deskripsi; ?></p>
                    <a class="btn btn-primary btn-lg px-4 mt-4 me-sm-3" href="<?= base_url("user/tboking/$lap->kdLap"); ?>">Boking Sekarang</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?= $this->endSection(); ?>