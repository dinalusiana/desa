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
    <header class="clearfix">
        <h2 class="page_title pull-left">Data pendidikan</h2>
        <a href="<?= base_url('admin/pendidikan/tambah'); ?>" class="btn btn-primary btn-xs pull-right"><b>Tambah pendidikan</b></a>
        <a class="btn btn-danger btn-xs pull-right" href=" <?php echo base_url('admin/pendidikan/print'); ?>"><b>Cetak</b></a>
    </header>

    <div class="content-inner">
        <?= $this->session->flashdata('message'); ?>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tingkat Pendidikan</th>
                    <!-- <th>Jumlah</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($pendidikan as $row) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row['tingkat_pendidikan']; ?></td>
                        <!-- <td><?= $row['jumlah']; ?></td> -->
                        <td>
                            <a href="<?= base_url('admin/pendidikan/edit/' . $row['id_pendidikan']); ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-pencil"> </span></a> |
                            <a onclick="return confirm('Anda yakin mau menghapus data pendidikan ini?')" href="<?= base_url('admin/pendidikan/hapus/' . $row['id_pendidikan']); ?>" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"> </span></a>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>