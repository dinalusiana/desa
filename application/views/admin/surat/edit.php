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
        <h2 class="page_title">Update surat</h2>
    </header>

    <div class="content-inner">
        <div class="form-wrapper">
            <form action="<?= base_url('admin/surat/edit'); ?>" class="form-horizontal" method="post">
                <input type="hidden" name="nomor" value="<?= $surat['nomor']; ?>">
                <input type="hidden" name="id_surat_permohonan" value="<?= $surat['id_permohonan_surat']; ?>">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Kode Surat</label>
                    <div class="col-sm-4">
                        <input type="text" name="nomor" class="form-control" id="nomor" value="<?= $surat['nomor']; ?>" disabled>
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Nama Kades</label>
                    <div class="col-sm-8">
                        <input type="text" readonly="true" name="nama_kades" class="form-control" id="nama_kades" value="<?= $surat['nama_kades']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Jabatan Kades</label>
                    <div class="col-sm-8">
                        <input type="text" readonly="true" name="jabatan_kades" class="form-control" id="jabatan_kades" value="<?= $surat['jabatan_kades']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Alamat Kades</label>
                    <div class="col-sm-8">
                        <input type="text" readonly="true" name="alamat_kades" class="form-control" id="alamat_kades" value="<?= $surat['alamat_kades']; ?>">
                    </div>
                </div> -->

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Nama Kades</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_kades" class="form-control" id="nama_kades" value="<?= $surat['nama_kades']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Jabatan Kades</label>
                    <div class="col-sm-8">
                        <input type="text" name="jabatan_kades" class="form-control" id="jabatan_kades" value="<?= $surat['jabatan_kades']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Alamat Kades</label>
                    <div class="col-sm-8">
                        <input type="text" name="alamat_kades" class="form-control" id="alamat_kades" value="<?= $surat['alamat_kades']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Nama Pemohon</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama_pemohon" class="form-control" id="nama_pemohon" value="<?= $surat['nama_pemohon']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">TTL Pemohon</label>
                    <div class="col-sm-4">
                        <input type="text" name="ttl_pemohon" class="form-control" id="ttl_pemohon" value="<?= $surat['ttl_pemohon']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Kewarganegaraan Pemohon</label>
                    <div class="col-sm-4">
                        <input type="text" name="kewarganegaraan_pemohon" class="form-control" id="kewarganegaraan_pemohon" value="<?= $surat['kewarganegaraan_pemohon']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Agama Pemohon</label>
                    <div class="col-sm-4">
                        <input type="text" name="agama_pemohon" class="form-control" id="agama_pemohon" value="<?= $surat['agama_pemohon']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Pekerjaan Pemohon</label>
                    <div class="col-sm-4">
                        <input type="text" name="pekerjaan_pemohon" class="form-control" id="pekerjaan_pemohon" value="<?= $surat['pekerjaan_pemohon']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Alamat Pemohon</label>
                    <div class="col-sm-4">
                        <input type="text" name="alamat_pemohon" class="form-control" id="alamat_pemohon" value="<?= $surat['alamat_pemohon']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">NIK Pemohon</label>
                    <div class="col-sm-4">
                        <input type="number" name="nik_pemohon" class="form-control" id="nik_pemohon" value="<?= $surat['nik_pemohon']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Keperluan</label>
                    <div class="col-sm-4">
                        <input type="text" name="keperluan" class="form-control" id="keperluan" value="<?= $surat['keperluan']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Berlaku</label>
                    <div class="col-sm-4">
                        <input type="date" name="berlaku" class="form-control" id="berlaku" value="<?= $surat['berlaku']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-4">
                        <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $surat['keterangan']; ?>">
                    </div>
                </div>
                
                
                <!-- <div class="form-group">
                    <label for="file_upload" class="col-sm-2 control-label"><a id="file_upload_edit" href="../../../upload_file/permohonan_surat/<?= $surat['file_upload']; ?>" target="_blank">Lihat File Pemohon</a></label>

                </div> -->

                
                <div class="clearfix">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>