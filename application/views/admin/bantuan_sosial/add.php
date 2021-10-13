<style type="text/css">
    .charts {
        width: 70%;
        margin: 0px auto;
        display: grid;
        grid-template-columns: 66% auto;
        padding-left: 0px;
        padding: 4em 1em;
        margin: 0;
    }

    .chartPenghasilan {
        width: 40%;
        /* untuk memberikan jarak dengan objek bawahnya */
        height: 300px;
        width: 500px;
        padding-left: 0px;
        display: grid;
        grid-template-columns: 50% auto;
        padding: 4em 1em;
        padding-top: 0px;
        padding-right: 0px;
        margin: 0;
    }

    .chartPendidikan {
        width: 40%;
        height: 300px;
        width: 500px;
        padding-left: 0px;
        display: grid;
        grid-template-columns: 50% auto;
        padding: 4em 1em;
        padding-top: 0px;
        padding-right: 0px;
        margin: 0;
    }

    /* grafik 2 kolom */

    .chartAgama {
        width: 50%;
        height: 200px;
        width: 500px;
        padding-left: 0px;
        display: grid;
        grid-template-columns: 50% auto;
        padding: 4em 1em;
        padding-top: 0px;
        padding-right: 0px;
        margin: 0;
    }

    .chartKriminal {
        width: 50%;
        height: 200px;
        width: 500px;
        padding-left: 0px;
        display: grid;
        grid-template-columns: 50% auto;
        padding: 4em 1em;
        padding-top: 0px;
        padding-right: 0px;
        margin: 0;
    }



    .sidebar-toggle-box {
        float: left;
        padding-right: 15px;
        margin-top: 20px;
    }

    .sidebar-toggle-box .fa-bars {
        cursor: pointer;
        display: inline-block;
        font-size: 20px;
    }

    a.logo {
        font-size: 24px;
        color: #f2f2f2;
        float: left;
        margin-top: 15px;
        text-transform: uppercase;
        

    }

    a.logo b {
        font-weight: 900;
        color: #ffffff;
        font-size: 24px;
        font-family: "time new roman";
        float: center;
        padding: 12px 20px;
    }

    a.logo:hover,
    a.logo:focus {
        text-decoration: none;
        outline: none;

    }

    a.logo span {
        color: #4ECDC4;
        font-size: 24px;
    }

    .container {
        display: grid;
        grid-template-columns: 66% auto;
        padding: 4em 1em;
        margin: 0;
    }

    .col-md-12 {
        display: grid;
        grid-template-columns: 50% auto;
        padding: 4em 1em;
        margin: 0;
        padding-top: 0px;
    }

    .contentDashboardHeader {
        background-color: white !important;
    }

    .chartnya {
        border: solid 2px #c2c0bc !important;
    }

    .chartnya {
        margin: auto;
        text-align: center;
    }
</style>

<div id="content">
    <header>
        <h2 class="page_title">Tambah Data</h2>
    </header>

    <div class="content-inner">
        <div class="form-wrapper">



            <!-- <form action="<?= base_url('admin/bantuan_sosial/tambah'); ?>" class="form-horizontal" method="post"> -->
            <!-- <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_bantuan" id='id_bantuan' value="<?= $bantuan_sosial['id_bantuan']; ?>"> -->


            <form action="<?= base_url("admin/bantuan_sosial/tambah"); ?>" class="form-horizontal" method="post">
        <!-- <form action=<?= site_url("admin/bantuan_sosial/tambah"); ?> class="form-horizontal" method="post" enctype="multipart/form-data"> -->
            <input type="hidden" name="id" id='id' value="<?= $penduduk->id ?>">
            <!-- <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">NIK</label>
                    <div class="col-sm-4">
                        <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK..." value="<?= $penduduk->nik ?>">
                        <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama..." value="<?= $penduduk->nama ?>">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Dusun</label>
                    <div class="col-sm-5">
                        <input type="text" name="dusun" class="form-control" id="dusun" value="<?= $penduduk->dusun ?>">
                    </div>
                </div> -->

                <!-- <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Jenis Bantuan</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="jenis_bantuan">
                            <option>-- Pilih Jenis Bantuan--</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                        <?= form_error('jenis_bantuan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->



                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Jenis Bantuan</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="jenis_bantuan">
                            <option>-- Pilih Bantuan --</option>

                            <?php
							foreach ($bansos->result() as $bansos) {
									
								echo "<option value=".$bansos->id_bansos.">".$bansos->jenis_bantuan."</option>";
							}
							?>


                        </select>
                        <?= form_error('bansos', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>


                
                <div class="clearfix">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>