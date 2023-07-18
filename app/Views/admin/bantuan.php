<?= $this->extend('templates/navadm'); ?>
<!-- End of Topbar -->
<?= $this->Section('content-adm'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-dark">Bantuan</h1>

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
        <div class="text-dark card-header">
            Bantuan
        </div>
        <div class="card-body">
            <div>
                <h5 class="text-danger card-title">Syarat</h5>
                <p class="text-dark card-text">File yang dienkripsi berukuran 3024kb.</p>
            </div>
            <div class="mt-4">
                <h5 class="text-primary card-title">Penggunaan sistem</h5>
                <p class="text-dark card-text">Mengamankan file, klik menu enkripsi setelah itu isi from enkripsi.</p>
                <p class="text-dark card-text">Mengembalikan file seperti semula, klik menu dekripsi pilih file dan isi password yang di buat pada saat enkripsi.</p>
            </div>
            <div class="mt-4">
                <h5 class="text-danger card-title">Penting!</h5>
                <p class="text-dark card-text">Password untuk enkripsi dan dekripsi sama selain itu, karakter password berjumlah 16.</p>
            </div>
        </div>
    </div>



</div>

<?= $this->endSection(); ?>