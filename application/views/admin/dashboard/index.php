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
        <h2 class="page_title pull-left">Dashboard</h2>

    </header>

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

            <div class="col-md-6">
                <div class="chartnya">
                    <label class="judulchart">Agama</label>
                    
                    <canvas id="ChartAgama"></canvas>
                </div>
            </div>

        </div>
        <br><br>
        <div class="row">
            <div class="col-md-6">
                <div class="chartnya">
                    <label class="judulchart">Pendidikan</label>
                    
                    <canvas id="chartPendidikan"></canvas>
                </div>
            </div>



            <div class="col-md-6">
                <div class="chartnya">

                    <label class="judulchart">Pekerjaan</label>

                    <canvas id="ChartPekerjaan"></canvas>
                </div>
            </div>

        </div>





        <!-- <div class="chartPendidikan">
            <canvas id="ChartAgama"></canvas>
        </div> -->
    </div>
</div>