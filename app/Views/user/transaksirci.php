<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>

<div class="container-fluid">
    <br>
    <hr>
    <figure class="text-center">
        <blockquote class="blockquote">

            <h3><strong>Formulir Boking</strong></h3>
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
                        <td>WhatsApp: 087748377883</td>
                    </tr>
                    <tr>
                        <td>centrofutsal.com</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6">
            <?php
            $validation = \Config\Services::validation(); ?>
            <form action="/user/tamboking" method="POST" autocomplete="off">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT">
                <table class='table table-bordered '>
                    <tbody>

                        <tr>
                            <td>Invoice </td>
                            <td><input type="text" class="form-control" id="noInvoice" name="noInvoice" value="<?= "INV-" . user_id() . "-" . date("Y-m-d-H-i-s"); ?>" readonly>
                            </td>
                        </tr>
                        <tr>

                            <input type="hidden" class="form-control " id="userId" name="userId" value="<?= user_id(); ?>">
                            <input type="hidden" class="form-control " id="tglBooking" name="tglBooking" value="<?= date("Y-m-d"); ?>">
                        <tr>
                            <td>Lapangan </td>
                            <td><input type="readonly" class="form-control " id="kdLapangan" name="kdLapangan" value="<?= $lapangan->kdLap ?>" readonly></td>
                        </tr>
                        </tr>
                        <tr>
                            <td>Tanggal Invoice </td>
                            <td><input type="readonly" class="form-control" id="tglInvoice" name="tglInvoice" value="<?= date("Y-m-d"); ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Username Boking </td>
                            <td><input type="text" class="form-control" value="<?= user()->username; ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Atas Nama </td>
                            <td id="atasNama" name="atasNama"><input type="text" class="form-control <?= $validation->hasError('atasNama') ? 'is-invalid' : null ?>" id="atasNama" name="atasNama" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('atasNama') ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat :</td>
                            <td id="alamat" name="alamat"><input type="text" class="form-control <?= $validation->hasError('alamat') ? 'is-invalid' : null ?>" id="alamat" name="alamat" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('alamat') ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kontak :</td>
                            <td id="kontak" name="kontak"><input type="number" class="form-control <?= $validation->hasError('kontak') ? 'is-invalid' : null ?>" id="kontak" name="kontak" autofocus>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('kontak') ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jam Mulai</td>
                            <td>
                                <input type="time" class="form-control" id="jamMulai" name="jamMulai" min="<?= @$jadwal->JamBuka ?>" max="<?= @$jadwal->JamTutup ?>" onchange="changeTanggal()">
                            </td>
                        </tr>
                        <tr>
                            <td>Jam Selesai</td>
                            <td>
                                <input type="time" class="form-control" id="jamSelesai" name="jamSelesai" min="<?= @$jadwal->JamBuka ?>" max="<?= @$jadwal->JamTutup ?>" onchange="changeTanggal()">
                            </td>
                        </tr>
                        <tr>
                            <td>harga </td>
                            <td><input type="text" class="form-control" id="harga" name="harga" value="<?= $lapangan->harga ?>" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Total Harga </td>
                            <td><input type="text" class="form-control" id="totalharga" name="totalharga" readonly>
                            </td>
                        </tr>
                        <script>
                            function changeTanggal() {
                                let jamMulai = $('#jamMulai').val();
                                let jamSelesai = $('#jamSelesai').val();

                                let jamMulaiAkhir = jamMulai.split(":")[0];
                                let jamSelesaiAkhir = jamSelesai.split(":")[0];
                                if (jamMulai == null || jamSelesai == null || jamMulai == '' || jamSelesai == '') {

                                } else if (jamSelesaiAkhir < jamMulaiAkhir) {
                                    alert('Jam selesai tidak boleh lebih dari jam mulai');
                                    $('#jamMulai').val(null);
                                    $('#jamSelesai').val(null);
                                    $('#totalharga').val(null);
                                }

                                if (jamSelesaiAkhir >= jamMulaiAkhir) {
                                    let jam = jamSelesaiAkhir - jamMulaiAkhir + 1;
                                    $('#totalharga').val(jam * $('#harga').val())
                                }
                            }
                        </script>
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


                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="<?= base_url('/home/boking'); ?>" class="btn btn-primary me-md-2">kembali</a>
                    <button class="btn btn-primary" type="submit" ">Boking</button>
                </div>

            </form>
            <br>
        </div>
        <hr>
    </div>

    
</div>

<?= $this->endSection(); ?>