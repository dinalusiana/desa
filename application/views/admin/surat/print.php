<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .container {
            padding: 0px 125px;
            /* border: 1px solid black; */
            font-family: 'Times New Roman', Times, serif;
        }

        #hr1 {
            border-top: solid 2px black;
            border-bottom: solid 2px black;
        }

        .kopsurat {
            font-size: 30px;
            letter-spacing: 1px;
            margin-left: 30px;
        }

        #logo {
            margin-left: 30px;
            width: 125px;
            height: 125px;
        }

        .isi {
            font-size: 20px;

        }

        /* #hr2 {
            border: solid 3px black;
        } */
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row text-center">

            <img id="logo" src="<?php echo site_url('public/img/patiem.JPG') ?>" alt="">



            <b class="kopsurat">PEMERINTAH KABUPATEN PATI<br>
                KECAMATAN JUWANA<br>
                DESA SEJOMULYO</b>




        </div>

        <div class="isi">


            <hr id="hr1">
            <!-- <?= $print['nomor']; ?> -->
            <label>
                No Kode Desa Sejomulyo<br>
                3318080001<br><br>
            </label>

            <table width="100%" class="text-center">
                <tr>
                    <td><b><u>SURAT KETERANGAN</u></b></td>
                </tr>
                <tr>
                    <td>Nomer : <?= $print['nomor']; ?><br><br></td>
                </tr>
            </table>

            <label>
                Yang bertanda tangan di bawah ini :<br>
            </label>

            <table width="100%">
                <tr>
                    <td style="width:250px;padding-left:25px;vertical-align:top;">Nama</td>
                    <td> : <?= $print['nama_kades']; ?></td>
                </tr>
                <tr>
                    <td style="width:250px;padding-left:25px;vertical-align:top;">Jabatan</td>
                    <td> : <?= $print['jabatan_kades']; ?></td>
                </tr>
                <tr>
                    <td style="width:250px;padding-left:25px;vertical-align:top;">Alamat</td>
                    <td> : <?= $print['alamat_kades']; ?></td>
                </tr>
            </table>

            <label>
                <br>Dengan ini menerangkan bahwa : <br>
            </label>

            <table width="100%">
                <tr>
                    <td style="width:250px;padding-left:25px;vertical-align:top;">Nama</td>
                    <td> : <?= $print['nama_pemohon']; ?></td>
                </tr>
                <tr>
                    <td style="width:250px;padding-left:25px;vertical-align:top;">Tempat dan Tanggal Lahir</td>
                    <td> : <?= $print['ttl_pemohon']; ?></td>
                </tr>
                <tr>
                    <td style="width:250px;padding-left:25px;vertical-align:top;">Kewarganegaraan / Agama</td>
                    <td> : <?= $print['kewarganegaraan_pemohon']; ?> / <?= $print['agama_pemohon']; ?></td>
                </tr>
                <tr>
                    <td style="width:250px;padding-left:25px;vertical-align:top;">Pekerjaan</td>
                    <td> : <?= $print['pekerjaan_pemohon']; ?></td>
                </tr>
                <tr>
                    <td style="width:250px;padding-left:25px;vertical-align:top;">Tempat Tinggal</td>
                    <td> : <?= $print['alamat_pemohon']; ?></td>
                </tr>
                <tr>
                    <td style="width:250px;padding-left:25px;vertical-align:top;">Surat Bukti Diri / No.NIK</td>
                    <td> : <?= $print['nik_pemohon']; ?> </td>
                </tr>
                <tr>
                    <td style="width:250px;padding-left:25px;vertical-align:top;">Keperluan</td>
                    <td> : <?= $print['keperluan']; ?></td>
                </tr>
                <tr>
                    <td style="width:250px;padding-left:25px;vertical-align:top;">Berlaku Mulai</td>
                    <td> : <?= $print['berlaku']; ?></td>
                </tr>
                <tr>
                    <td style="width:250px;padding-left:25px;vertical-align:top;">Keterangan Lain-lain</td>
                    <td> : <?= $print['keterangan']; ?></td>
                </tr>
            </table>

            <label>
                <br>
                Demikian untuk menjadikan maklum bagi yang berkepentingan. <br>
            </label>



            <br><br>
            <table width="100%">
                <tr>
                    <td style="width:450px;padding-left:25px;vertical-align:top;"></td>
                    <td></td>
                    <td class="text-center">Sejomulyo, <label id="datenya"></label></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-center"><?= $print['jabatan_kades']; ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td class="text-center">
                        <br>
                        <br>
                        <br>
                        <?= $print['nama_kades']; ?>
                    </td>
                </tr>
            </table>
            <br><br>
            <br><br>
            <br><br>
        </div>
    </div>
</body>

</html>



<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    var date = new Date();
    var bulan = "";
    // var nomerSurat = "";
    // var strDate = date.getFullYear() + "-" + (date.getMonth() + 8) + "-" + date.getDate();
    // var id_surat_permohonan = "";
    // var name = "";
    // var ttl = "";
    // var kewarganegaraan = "";
    // var agama = "";
    // var pekerjaan = "";
    // var alamat = "";
    // var nik = "";
    // var keperluan = "";
    // var keterangan = "";

    if ((date.getMonth() + 1) == 1) {
        bulan = "Januari";

    } else if ((date.getMonth() + 1) == 2) {
        bulan = "Februari";

    } else if ((date.getMonth() + 1) == 3) {
        bulan = "Maret";

    } else if ((date.getMonth() + 1) == 4) {
        bulan = "April";

    } else if ((date.getMonth() + 1) == 5) {
        bulan = "Mei";

    } else if ((date.getMonth() + 1) == 6) {
        bulan = "Juni";

    } else if ((date.getMonth() + 1) == 7) {
        bulan = "Juli";

    } else if ((date.getMonth() + 1) == 8) {
        bulan = "Agustus";

    } else if ((date.getMonth() + 1) == 9) {
        bulan = "September";

    } else if ((date.getMonth() + 1) == 10) {
        bulan = "Oktober";

    } else if ((date.getMonth() + 1) == 11) {
        bulan = "November";

    } else {
        bulan = "Desember";

    }
    $("#datenya").text(date.getDate() + " " + bulan + " " + date.getFullYear())
    window.addEventListener("load", window.print());
</script>