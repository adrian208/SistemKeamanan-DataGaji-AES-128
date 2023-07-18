<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000000;
            text-align: center;
        }
    </style>
</head>

<body>
    <div style="font-size:64px; color:'#dddddd' "><i>Invoice</i></div>
    <p>
        <i>Cento Futsal</i><br>
        Jl. Damai, Ngaglik, Sleman<br>
        Phone : 0274-761090
        WhatsApp : 087748377883
    </p>
    <hr>
    <hr>
    <p></p>
    <p>
        Pembeli : <?= $boking->username ?><br>
        Alamat : <?= $boking->alamat ?><br>
        No Invoice : <?= $boking->noInvoice ?><br>
        Tanggal : <?= date('Y-m-d', strtotime($boking->tglInvoice)) ?>
    </p>
    <table cellpadding="6">
        <tr>
            <td>Username Boking </td>
            <td><?= $boking->username; ?> </td>
        </tr>
        <tr>
            <td>Atas Nama </td>
            <td><?= $boking->atasNama; ?> </td>
        </tr>
        <tr>
            <td>Alamat :</td>
            <td><?= $boking->alamat; ?> </td>
        </tr>
        <tr>
            <td>Kontak :</td>
            <td><?= $boking->kontak; ?> </td>
        </tr>
        <tr>
            <td>Status Bayar </td>
            <td> <?php if ($boking->kdStatus == "Sudah_Membayar") {
                        echo "<label class='label  btn-success'> Lunas </label>";
                    } else {
                        echo "<label class='label btn-danger'>Belum Lunas</label>";
                    }
                    ?>
            </td>
        </tr>
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
            <br>
        </div>
    </div>
</body>

</html>