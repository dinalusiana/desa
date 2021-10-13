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

    .chartnya {
        border: solid 2px #c2c0bc !important;
    }

    .chartnya {
        margin: auto;
        text-align: center;
    }
</style>
<section id="content">
    <div class="container">
        <div class="row">

            <div class="span8">
                <div class="content-inner" id="content_inner">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="chartnya">
                                <label class="judulchart">Penduduk</label>
                                <br>
                                Keterangan :
                                <br>
                                <canvas id="chartPenduduk"></canvas>
                            </div>
                        </div>
                        <br/>
                        <div class="col-md-6">
                            <div class="chartnya">
                                <label class="judulchart">Agama</label>
                                <canvas id="ChartAgama"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="chartnya">
                                <label class="judulchart">Pendidikan</label>
                                <canvas id="chartPendidikan"></canvas>
                            </div>
                        </div>
                        <br/>
                        <div class="col-md-6">
                            <div class="chartnya">
                                <label class="judulchart">Pekerjaan</label>
                                <canvas id="ChartPekerjaan"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>