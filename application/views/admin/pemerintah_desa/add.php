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
        <h2 class="page_title">Tambah Pemerintah Desa</h2>
    </header>

    <div class="content-inner">
        <div class="form-wrapper">
            

        <form action="<?= base_url("admin/pemerintah_desa/tambah"); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id='id' value="<?= $penduduk->id ?>">

            <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">NIP</label>
                    <div class="col-sm-8">
                        <input type="text" name="nip" class="form-control" id="nip" placeholder="nip..." value="<?= set_value('nip'); ?>">
                        <?= form_error('nip', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">No SK Angkat</label>
                    <div class="col-sm-8">
                        <input type="text" name="no_sk_angkat" class="form-control" id="no_sk_angkat" placeholder="no_sk_angkat..." value="<?= set_value('no_sk_angkat'); ?>">
                        <?= form_error('no_sk_angkat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

            <!-- <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-8">
                        <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="jabatan..." value="<?= set_value('jabatan'); ?>">
                        <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div> -->

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Jabatan</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="jabatan">
                            <option>-- Pilih Jabatan--</option>
                            
                            <?php
							foreach ($jabatan->result() as $jabatan) {
									
								echo "<option value=".$jabatan->id_jabatan.">".$jabatan->jabatan."</option>";
							}
							?>


                        </select>
                        <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
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