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
        <h2 class="page_title">Tambah penduduk</h2>
    </header>

    <div class="content-inner">
        <div class="form-wrapper">
            <form action="<?= base_url('admin/penduduk/tambah'); ?>" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">NIK</label>
                    <div class="col-sm-4">
                        <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK..." value="<?= set_value('nik'); ?>">
                        <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama..." value="<?= set_value('nama'); ?>">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="gender" class="col-sm-2 control-label">Jenis kelamin</label>
                    <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="gender" value="Pria" checked> Laki-Laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="gender" value="Wanita"> Perempuan
                            <?= form_error('gender', '<small class="text-danger">', '</small>'); ?>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Tahun lahir</label>
                    <div class="col-sm-4">
                        <input type="text" name="usia" class="form-control" id="usia" placeholder="Tahun lahir..." value="<?= set_value('usia'); ?>">
                        <?= form_error('usia', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">TTL</label>
                    <div class="col-sm-4">
                        <input type="text" name="ttl" class="form-control" id="ttl" placeholder="TTL..." value="<?= set_value('ttl'); ?>">
                        <?= form_error('ttl', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-4">
                        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat..." value="<?= set_value('alamat'); ?>">
                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Dusun</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="dusun">
                            <option>-- Pilih Dusun--</option>

                            <?php
							foreach ($dusun->result() as $dusun) {
									
								echo "<option value=".$dusun->id_dusun.">".$dusun->dusun."</option>";
							}
							?>


                        </select>
                        <?= form_error('dusun', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">RT</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="rt">
                            <option>-- Pilih RT--</option>
                            
                            <?php
							foreach ($rt->result() as $rt) {
									
								echo "<option value=".$rt->id_rt.">".$rt->rt."</option>";
							}
							?>


                        </select>
                        <?= form_error('rt', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>


                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Pendidikan</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="pendidikan">
                            <option>-- Pilih Pendidikan--</option>
                            <!-- <option value="Tidak Lulus SD">Tidak Lulus SD</option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SD">SMA</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option> -->

                            <?php
							foreach ($pendidikan->result() as $pendidikan) {
									
								echo "<option value=".$pendidikan->id_pendidikan.">".$pendidikan->tingkat_pendidikan."</option>";
							}
							?>


                        </select>
                        <?= form_error('pendidikan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>




                <!-- <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Pekerjaan</label>
                    <div class="col-sm-5">
                        <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" placeholder="Pekerjaan..." value="<?= set_value('pekerjaan'); ?>">
                        <?= form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->


                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Pekerjaan</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="pekerjaan">
                            <option>-- Pilih Pekerjaan--</option>
                            
                            <?php
							foreach ($pekerjaan->result() as $pekerjaan) {
									
								echo "<option value=".$pekerjaan->id_pekerjaan.">".$pekerjaan->jenis_pekerjaan."</option>";
							}
							?>


                        </select>
                        <?= form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>


                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Agama</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="agama">
                            <option>-- Pilih Agama--</option>
                            
                            <?php
							foreach ($agama->result() as $agama) {
									
								echo "<option value=".$agama->id_agama.">".$agama->agama."</option>";
							}
							?>


                        </select>
                        <?= form_error('agama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>


                <div class="clearfix">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-info">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>