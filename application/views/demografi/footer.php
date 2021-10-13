<footer>
    <div class="container">
        <div class="row">
        <div class="span4">
                <div class="logo">
                    <a href="<?= base_url(); ?>"><img src="<?php echo base_url('public/'); ?>img/footer.png" alt="" /></a>
                </div>
                <br>

                <address>
                    Layanan Integrasi Data Sistem Informasi Desa Sejomulyo Kecamatan Juwana, Kabupaten Pati, Jawa Tengah<br>                        
                    </address>
            </div>

            <div class="span4">
                <div class="widget">
                <h5 class="widgetheading">Profil Desa</h5>
                <address>
                Sejomulyo adalah desa di kecamatan Juwana, Pati, Jawa Tengah, Indonesia. terdiri dari 3 dukuh yaitu dukuh Nggadungan, babatan, dan Garuwan.
                </address>
                <address>
                Provinsi Jawa Tengah, Kabupaten Pati, Kecamatan Juwana, Kode Kemendagri 33.18.08.2001
                </address>
                
                </div>
            </div>
            <div class="span4">
                <div class="widget">
                    <h5 class="widgetheading">Kontak Kami</h5>
                    <address>
                        <strong>Kantor Desa Sejomulyo</strong><br>
                        Desa Sejomulyo, Kecamatan Juwana,<br>
                        Kabupaten Pati. Kode Pos 59185. Indonesia
                    </address>

                    <strong>Jika ada kritik & saran atau pertanyaan silahkan menghubungi kami pada kontak dibawah ini. </strong><br>

                        <address>
                    
                        No. Telp/WA : 081393048412<br>
                        Gmail       : sejomulyomaju@gmail.com<br>
                        Instagram   :sejomulyo_maju<br>
                        Youtube     : Sejomulyo maju
                    </address>

                    </p>
                </div>
            </div>
            
        </div>
    </div>
    <div id="sub-footer">
        <div class="container">
            <div class="row">
                <div class="span6">
                    <div class="copyright">
                        <p><span>&copy; Copyright <?= date('Y'); ?>. Desa Sejomulyo</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bglight icon-2x active"></i></a>

<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url('public/'); ?>js/jquery.js"></script>
<script src="<?php echo base_url('public/'); ?>js/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url('public/'); ?>js/bootstrap.js"></script>

<script src="<?php echo base_url('public/'); ?>js/modernizr.custom.js"></script>
<script src="<?php echo base_url('public/'); ?>js/toucheffects.js"></script>
<script src="<?php echo base_url('public/'); ?>js/google-code-prettify/prettify.js"></script>
<script src="<?php echo base_url('public/'); ?>js/jquery.bxslider.min.js"></script>
<script src="<?php echo base_url('public/'); ?>js/camera/camera.js"></script>
<script src="<?php echo base_url('public/'); ?>js/camera/setting.js"></script>

<script src="<?php echo base_url('public/'); ?>js/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url('public/'); ?>js/portfolio/jquery.quicksand.js"></script>
<script src="<?php echo base_url('public/'); ?>js/portfolio/setting.js"></script>

<script src="<?php echo base_url('public/'); ?>js/jquery.flexslider.js"></script>
<script src="<?php echo base_url('public/'); ?>js/animate.js"></script>
<script src="<?php echo base_url('public/'); ?>js/inview.js"></script>

<!-- Template Custom JavaScript File -->
<script src="<?php echo base_url('public/'); ?>js/custom.js"></script>

<!-- Chart js -->
<script src="<?php echo base_url() . 'assets/vendor/chartjs/Chart.min.js' ?>"></script>
<script type="text/javascript">
    var pendidikan = [];
    var penduduk = [];
    var pekerjaan = [];
    var agama = [];


    var ctx = document.getElementById('chartPenduduk').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            datasets: [{
                label: 'Laki - Laki',
                data: <?php echo json_encode($pendudukpria_jumlah) ?>,
                backgroundColor: [
                    'blue',
                    'blue',
                    'blue',
                    'blue'


                ],
                borderColor: [
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                ],
                borderWidth: 1
            }, {
                label: 'Perempuan',
                data: <?php echo json_encode($pendudukwanita_jumlah) ?>,


                // Changes this dataset to become a line
                type: 'bar',
                backgroundColor: [
                    'green',
                    'green',
                    'green',
                    'green'


                ],
                borderColor: [
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                ],
                borderWidth: 1
            }],
            labels: ['Balita', 'Anak - Anak', 'Remaja', 'Dewasa']
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
    
<?php
    //Inisialisasi nilai variabel awal
    $religionLabel = [];
    $religionData = [];
    foreach ($hasil2 as $religion) {
        $religionLabel[] = $religion->agama;
        $religionData[] = $religion->total;
    }
?>

<script type="text/javascript">
    var ctx = document.getElementById('ChartAgama').getContext('2d');
    var chart = new Chart(ctx, {
        label: 'Grafik Agama',
        type: 'doughnut',
        data: {
            labels: <?= json_encode($religionLabel) ?>,
            datasets: [{
                label: 'Grafik Agama',
                data: <?= json_encode($religionData) ?>,

                backgroundColor: [
                    'purple',
                    'green',
                    'yellow',
                    'orange',
                    'black',
                    'grey',
                    'red',
                    'blue',
                    'purple',
                    'green',
                    'yellow',
                    'orange',
                    'black',
                    'grey',
                    'red',
                    'blue'
                ],
                borderColor: [
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
    
<?php
    //Inisialisasi nilai variabel awal
    $eduLabel = [];
    $eduData = [];
    foreach ($hasil as $edu) {
        $eduLabel[] = $edu->tingkat_pendidikan;
        $eduData[] = $edu->total;
    }
?>

<script type="text/javascript">
    var ctx = document.getElementById('chartPendidikan').getContext('2d');
    var chart = new Chart(ctx, {
        label: 'Grafik Pendidikan',
        type: 'pie',
        data: {
            labels: <?= json_encode($eduLabel) ?>,
            datasets: [{
                label: 'Grafik Pendidikan',
                data: <?= json_encode($eduData) ?>,

                backgroundColor: [
                    'green',
                    'yellow',
                    'orange',
                    'black',
                    'grey',
                    'red',
                    'blue',
                    'purple',
                    'green',
                    'yellow',
                    'orange',
                    'black',
                    'grey',
                    'red',
                    'blue',
                    'purple'
                ],
                borderColor: [
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
    
<?php
    //Inisialisasi nilai variabel awal
    $profLabel = [];
    $profData = [];
    foreach ($hasil1 as $prof) {
        $profLabel[] = $prof->jenis_pekerjaan;
        $profData[] = $prof->total;
    }
?>

<script type="text/javascript">
    var ctx = document.getElementById('ChartPekerjaan').getContext('2d');
    var chart = new Chart(ctx, {
        label: 'Grafik Pekerjaan',
        type: 'bar',
        data: {
            labels: <?= json_encode($profLabel) ?>,
            datasets: [{
                label: '',
                data: <?= json_encode($profData) ?>,

                backgroundColor: [
                    'orange',
                    'red',
                    'blue',
                    'purple',
                    'green',
                    'orange',
                    'black',
                    'grey',
                    'red',
                    'blue',
                    'purple',
                    'green',
                    'black',
                    'grey',
                ],
                borderColor: [
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF',
                    '#FFFFFF'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false
            }
        }
    });
</script>

</body>

</html>