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
                        <td>Phone: 087748377883</td>
                    </tr>
                    <tr>
                        <td>centrofutsal.com</td>
                    </tr>
                    <tr>
                        <td>
                            <h4>Silahkan Lakukan Pembayaran</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>Bri : 3121 0101 0949 508 </td>
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
                        <td> <?php if ($transaksi->statusBayar == "L") {
                                    echo "<label class='label  btn-success'> Lunas </label>";
                                } else {
                                    echo "<label class='label btn-danger'>Belum Lunas</label>";
                                }
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanggal Invoice </td>
                        <td><?= $boking->tglInvoice; ?>
                        </td>
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
                        <td>total bayar </td>
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
                </tbody>

            </table>


            <br>
        </div>
        <hr>
    </div>

</div>

<?= $this->endSection(); ?>