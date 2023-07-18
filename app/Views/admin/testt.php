<?= $this->extend('templates/navadm'); ?>
<!-- End of Topbar -->
<?= $this->Section('content-adm'); ?>
<!-- Begin Page Content -->
<section class="content-header">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="card bg-info mb-3">
                    <div class="inner">
                        <div class="card-header text-center " style=" color: black;">Total Pengguna <div class="icon">
                                <i class="fa fa-users " style=" color: black;"></i>
                            </div>
                        </div>

                        <h3 class="center text-center m-4" style=" color: black;"><?= $tot; ?></h3>

                    </div>

                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="card bg-danger mb-3">
                    <div class="inner">
                        <div class="card-header text-center " style=" color: black;">Total Enkripsi <div class="icon">
                                <i class="fa fa-lock " style=" color: black;"></i>
                            </div>
                        </div>

                        <h3 class="center text-center m-4" style=" color: black;"><?= $toten; ?></h3>

                    </div>

                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="card bg-success mb-3">
                    <div class="inner">
                        <div class="card-header text-center " style=" color: black;">Total Deskripsi <div class="icon">
                                <i class="fa fa-unlock " style=" color: black;"></i>
                            </div>
                        </div>

                        <h3 class="center text-center m-4" style=" color: black;"><?= $totdek; ?></h3>

                    </div>

                </div>

            </div>
</section>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>