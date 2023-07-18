<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>
<div class="container-fluid">
    <br>
    <hr>
    <figure class="text-center">
        <blockquote class="blockquote">

            <h3><strong>Transaksi Anda</strong></h3>
        </blockquote>
    </figure>
    <hr>

    <div class="row">
        <div class="col-lg-6">
            <table>

                <tbody>
                    <tr>
                        <td>
                            <h4>CENTRO FUTSAL YOGYAKARTA</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Jl. Damai, Ngaglik, Sleman
                        </td>
                    </tr>
                    <tr>
                        <td>Phone: 0274-761090</td>
                    </tr>
                    <tr>
                        <td>Wa: 087748377883</td>
                    </tr>
                    <tr>
                        <td>centrofutsal.com</td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Transaksi</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>BCA (78889991) - Mandiri (788928292)-BRI (082928938) </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <table class='table table-bordered '>
                <tbody>

                    <tr>
                        <td>Nomor Invoice</td>
                        <td><?= $boking->noInvoice; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Status Bayar </td>
                        <td>
                            <?php if ($boking->kdStatus == "Sudah_Membayar") {
                                echo "<label class='label  btn-success'> Lunas </label>";
                            } else {
                                echo "<label class='label btn-danger'>Belum Lunas</label>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Invoice </td>
                        <td> <?= $boking->tglInvoice; ?></td>
                    </tr>
                    <tr>
                        <td>Username Boking </td>
                        <td><?= user()->username; ?> </td>
                    </tr>
                    <tr>
                        <td>Atas Nama </td>
                        <td><?= $boking->atasNama; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat :</td>
                        <td><?= $boking->alamat; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Kontak :</td>
                        <td><?= $boking->kontak; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Harga </td>
                        <td><?= $boking->totalBayar; ?></td>
                    </tr>
                    <!-- <tr>
                            <td>Cetak Invoice</td>
                            <td>
                                <form method='post' action='' target=''>
                                    <input type='hidden' name='id' value='_BLANK'>
                                    <button type='submit' class='btn btn-success'><i class='icon-print'></i>&nbsp; Cetak</button>
                                </form>
                            </td>
                        </tr> -->
                </tbody>
            </table>
            <div class='row-fluid'>
                <div class=''>
                    <table class='table table-bordered '>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nomor lapangan</th>
                                <th>Tgl.Boking</th>
                                <th>Jam mulai </th>
                                <th>Jam selesai</th>
                                <th>Harga</th>
                                <th>Subtotal</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $boking->noLap; ?></td>
                                <td><?= $boking->tglInvoice; ?></td>
                                <td><?= $boking->jamMulaiBooking; ?></td>
                                <td><?= $boking->jamSelesaiBooking; ?></td>
                                <td><?= $boking->harga; ?></td>
                                <td><?= $boking->totalBayar; ?></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="<?= base_url('/home/boking'); ?>" class="btn btn-primary me-md-2">Selesai</a>
                <a href="<?= base_url('/user/ts/' . $boking->kdBoking); ?>" class="btn btn-primary me-md-2">Cetak</a>
            </div>

            </form>
            <br>
        </div>
        <hr>
    </div>

</div>

<?= $this->endSection(); ?>