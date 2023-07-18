<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <table class="table table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tgl Invoice</th>
                        <th scope="col">username</th>
                        <th scope="col">atas nama</th>
                        <th scope="col">alamat</th>
                        <th scope="col">kontak</th>
                        <th scope="col">total bayar</th>
                        <th scope="col">status</th>
                        <th scope="colspan=" 2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $boking->tglInvoice; ?></td>
                        <td><?= $boking->username ?></td>
                        <td><?= $boking->atasNama; ?></td>
                        <td><?= $boking->alamat; ?></td>
                        <td><?= $boking->kontak; ?></td>
                        <td><?= $boking->totalBayar; ?></td>

                        <td> <?php if ($boking->statusBayar == "L") {
                                    echo "<label class='label'> Lunas </label>";
                                } else {
                                    echo "<label class='label'>Belum Lunas</label>";
                                }
                                ?>
                        </td>

                        <td>
                            <a href="<?= base_url('admin/dthistory/' . $boking->kdBoking); ?>" class="btn btn-info">Detail</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>