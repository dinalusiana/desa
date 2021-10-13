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
        <h2 class="page_title">Update penduduk</h2>
    </header>

    <div class="content-inner">
        <div class="form-wrapper">
            <!-- <form action="<?= base_url('admin/penduduk/edit'); ?>" class="form-horizontal" method="post"> -->
            <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id='id' value="<?= $penduduk['id']; ?>">
                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">NIK</label>
                    <div class="col-sm-4">
                        <input type="text" name="nik" class="form-control" id="nik" value="<?= $penduduk['nik']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $penduduk['nama']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="gender" class="col-sm-2 control-label">Jenis kelamin</label>
                    <!-- <div class="col-sm-10">
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="gender" value="Pria" checked> Laki-Laki
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="gender" value="Wanita"> Perempuan
                        </label>
                    </div> -->


                    <div class="col-sm-8">
                        <input type="text" name="gender" class="form-control" id="gender" value="<?= $penduduk['gender']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Usia</label>
                    <div class="col-sm-4">
                        <input type="text" name="usia" class="form-control" id="usia" value="<?= $penduduk['usia']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">TTL</label>
                    <div class="col-sm-4">
                        <input type="text" name="ttl" class="form-control" id="ttl" value="<?= $penduduk['ttl']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-4">
                        <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $penduduk['alamat']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">RT</label>
                    <div class="col-sm-5">
                        <!-- <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?= $penduduk['rt']; ?>"> -->
                        <select class="form-control" name="rt" id="rt">
                            <option value="<?= $penduduk['id_rt']; ?>">-- Pilih RT--</option>
                            
                            <?php
							foreach ($rt->result() as $rt) {
									
								echo "<option value=".$rt->id_rt.">".$rt->rt."</option>";
							}
							?>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Dusun</label>
                    <div class="col-sm-5">
                        <!-- <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?= $penduduk['pekerjaan']; ?>"> -->
                        <select class="form-control" name="dusun" id="dusun">
                            <option value="<?= $penduduk['id_dusun']; ?>">-- Pilih Dusun--</option>
                            
                            <?php
							foreach ($dusun->result() as $dusun) {
									
								echo "<option value=".$dusun->id_dusun.">".$dusun->dusun."</option>";
							}
							?>
                        </select>
                    </div>
                </div>

                

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Pendidikan</label>
                    <div class="col-sm-5">
                        <!-- <input type="text" name="pendidikan" class="form-control" id="pendidikan" value="<?= $penduduk['pendidikan']; ?>"> -->
                        <select class="form-control" name="pendidikan" id="pendidikan">
                            <option value="<?= $penduduk['id_pendidikan']; ?>" >-- Pilih Pendidikan--</option>
                            
                            <?php
							foreach ($pendidikan->result() as $pendidikan) {
									
								echo "<option value=".$pendidikan->id_pendidikan.">".$pendidikan->tingkat_pendidikan."</option>";
							}
							?>


                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Pekerjaan</label>
                    <div class="col-sm-5">
                        <!-- <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?= $penduduk['pekerjaan']; ?>"> -->
                        <select class="form-control" name="pekerjaan" id="pekerjaan">
                            <option value="<?= $penduduk['id_pekerjaan']; ?>">-- Pilih Pekerjaan--</option>
                            
                            <?php
							foreach ($pekerjaan->result() as $pekerjaan) {
									
								echo "<option value=".$pekerjaan->id_pekerjaan.">".$pekerjaan->jenis_pekerjaan."</option>";
							}
							?>


                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-sm-2 control-label">Agama</label>
                    <div class="col-sm-5">
                        <!-- <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" value="<?= $penduduk['agama']; ?>"> -->
                        <select class="form-control" name="agama" id="agama">
                            <option value="<?= $penduduk['id_agama']; ?>">-- Pilih Agama--</option>
                            
                            <?php
							foreach ($agama->result() as $agama) {
									
								echo "<option value=".$agama->id_agama.">".$agama->agama."</option>";
							}
							?>
                        </select>
                    </div>
                </div>

                <div class="clearfix">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>