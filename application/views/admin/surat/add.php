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
        <h2 class="page_title">Tambah Surat</h2>
    </header>

    <div class="content-inner">
        <div class="form-wrapper">
            <form action="<?= base_url('admin/surat/tambah'); ?>" class="form-horizontal" method="post" id="form">



                <div class="form-group">
                    <label for="id_surat_permohonan" class="col-sm-2 control-label">Daftar Permohonan</label>
                    <div class="col-sm-4">
                        <select name="id_surat_permohonan" class="form-control " id="id_surat_permohonan">
                            <option value="<?= set_value('id_surat_permohonan'); ?>"></option>
                        </select>
                        <?= form_error('id_surat_permohonan', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <!-- <div class="col-sm-4">
                        <input type="text" name="nomor" class="form-control" id="nomor" placeholder="nomor..." value="<?= set_value('nomor'); ?>" autofocus>

                    </div> -->
                </div>


                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Kode Surat</label>
                    <div class="col-sm-4">
                        <input type="text" readonly="true" name="nomor" class="form-control" id="nomor" placeholder="nomor..." value="<?= set_value('nomor'); ?>" autofocus>
                        <?= form_error('nomor', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Nama Kades</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_kades" readonly="true" class="form-control" id="nama_kades" placeholder="nama_kades..." value="Hardi">
                        <?= form_error('nama_kades', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->

                <!-- <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Jabatan Kades</label>
                    <div class="col-sm-8">
                        <input type="text" name="jabatan_kades" readonly="true" class="form-control" id="jabatan_kades" placeholder="jabatan_kades..." value="Kepala Desa Sejomulyo">
                        <?= form_error('jabatan_kades', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->

                <!-- <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Alamat Kades</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat_kades" readonly="true" class="form-control" id="alamat_kades" placeholder="alamat_kades..." value="Ds. Sejomulyo RT. 06/RW. 01 Kec. Juwana, Kab. Pati">
                        <?= form_error('alamat_kades', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Nama Kades</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_kades" class="form-control" id="nama_kades" placeholder="nama_kades..." value="<?= set_value('nama_kades'); ?>">
                        <?= form_error('nama_kades', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Jabatan Kades</label>
                    <div class="col-sm-8">
                        <input type="text" name="jabatan_kades" class="form-control" id="jabatan_kades" placeholder="jabatan_kades..." value="<?= set_value('jabatan_kades'); ?>">
                        <?= form_error('jabatan_kades', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Alamat Kades</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat_kades" class="form-control" id="alamat_kades" placeholder="alamat_kades..." value="<?= set_value('alamat_kades'); ?>">
                        <?= form_error('alamat_kades', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Nama Pemohon</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_pemohon" class="form-control" id="nama_pemohon" placeholder="nama_pemohon..." value="<?= set_value('nama_pemohon'); ?>">
                        <?= form_error('nama_pemohon', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">TTL Pemohon</label>
                    <div class="col-sm-8">
                        <input type="text" name="ttl_pemohon" class="form-control" id="ttl_pemohon" placeholder="ttl_pemohon..." value="<?= set_value('ttl_pemohon'); ?>">
                        <?= form_error('ttl_pemohon', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Kewarganegaraan</label>
                    <div class="col-sm-8">
                        <input type="text" name="kewarganegaraan_pemohon" class="form-control" id="kewarganegaraan_pemohon" placeholder="kewarganegaraan_pemohon..." value="<?= set_value('kewarganegaraan_pemohon'); ?>">
                        <?= form_error('kewarganegaraan_pemohon', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Agama</label>
                    <div class="col-sm-8">
                        <input type="text" name="agama_pemohon" class="form-control" id="agama_pemohon" placeholder="agama_pemohon..." value="<?= set_value('agama_pemohon'); ?>">
                        <?= form_error('agama_pemohon', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Pekerjaan</label>
                    <div class="col-sm-8">
                        <input type="text" name="pekerjaan_pemohon" class="form-control" id="pekerjaan_pemohon" placeholder="pekerjaan_pemohon..." value="<?= set_value('pekerjaan_pemohon'); ?>">
                        <?= form_error('pekerjaan_pemohon', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat_pemohon" class="form-control" id="alamat_pemohon" placeholder="alamat_pemohon..." value="<?= set_value('alamat_pemohon'); ?>">
                        <?= form_error('alamat_pemohon', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">NIK</label>
                    <div class="col-sm-8">
                        <input type="number" name="nik_pemohon" class="form-control" id="nik_pemohon" placeholder="nik_pemohon..." value="<?= set_value('nik_pemohon'); ?>">
                        <?= form_error('nik_pemohon', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Keperluan</label>
                    <div class="col-sm-8">
                        <input type="text" name="keperluan" class="form-control" id="keperluan" placeholder="keperluan..." value="<?= set_value('keperluan'); ?>">
                        <?= form_error('keperluan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>



                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-8">
                        <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="keterangan..." value="<?= set_value('keterangan'); ?>">
                        <?= form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Berlaku</label>
                    <div class="col-sm-8">
                        <input type="date" name="berlaku" class="form-control" id="berlaku" placeholder="berlaku..." value="<?= set_value('berlaku'); ?>">
                        <?= form_error('berlaku', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="file_upload" class="col-sm-2 control-label"><a id="file_upload" target="_blank">Lihat File Pemohon</a></label>

                </div> -->

                <div class="clearfix">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <input type="reset" value="Reset" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>