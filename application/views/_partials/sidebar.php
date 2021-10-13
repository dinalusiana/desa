<div class="col-md-2 col-sm-1 hidden-xs display-table-cell valign-top" id="side-menu">
    <ul>
        <center><a class="logo"><b>SEJO<span>MULYO</span></b></a></center>

        <center>
            <p class="centered"><a href="../admin/dashboard"><img src="<?php echo base_url('public/'); ?>img/patiem.JPG" class="img-circle" width="100"></a></p>
        </center>
               <?php
                    $q=$this->db->query("SELECT * FROM menu WHERE is_active=1 ORDER BY id ASC");
                    foreach($q->result_array() as $xrow) {
                        $xq=$this->db->query("SELECT * FROM menu WHERE is_active='$xrow[id]' ORDER BY id ASC");
                        if($xq->num_rows()>0) {  ?>
                    <li class="link">
                        <a href="#collapse-<?php echo $xrow['id']; ?>" data-toggle="collapse" aria-controls="collapse-<?php echo $xrow['id']; ?>">
                            <span class="<?php echo $xrow['icon']; ?>" aria-hidden="true"></span>
                            <span class="hidden-sm hidden-xs"><?php echo $xrow['title']; ?></span>
                        </a>
                        <ul class="collapse collapseable" id="collapse-<?php echo $xrow['id']; ?>">
                    <?php
                        foreach($xq->result_array() as $row) { ?>
                            <li><a href="<?php echo base_url().$row['url']; ?>"><?php echo $row['title']; ?></a></li>
                    <?php } ?>
                        </ul>
                    </li>
                    <?php
                        } else { ?>
                    <li class="">
                        <a href="<?php echo base_url().$xrow['url']; ?>">
                            <span class="<?php echo $xrow['icon']; ?>"></span>
                            <span class="hidden-sm hidden-xs"><?php echo $xrow['title']; ?></span>
                        </a>
                    </li>
                    <?php } ?>
                <?php } ?>


            <!--<li class="link">-->
            <!--    <a href="#collapse-profil" data-toggle="collapse" aria-controls="collapse-profil">-->
            <!--        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>-->
            <!--        <span class="hidden-sm hidden-xs">Profil</span>-->
            <!--    </a>-->
            <!--    <ul class="collapse collapseable" id="collapse-profil">-->
            <!--        <li><a href="<?= base_url('index.php/admin/profil/desa'); ?>">Profil desa</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/profil/pemdes'); ?>">Profil pemdes</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/profil/bpd'); ?>">Profil BPD</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/profil/sejarah'); ?>">Sejarah Desa</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/profil/visimisi'); ?>">visi misi desa</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/profil/potensi'); ?>">Potensi</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/profil/karangtaruna'); ?>">Karang Taruna</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/profil/pkk'); ?>">PKK</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/profil/lpmd'); ?>">LPMD</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/profil/kpmd'); ?>">KPMD</a></li>-->
            <!--    </ul>-->
            <!--</li>-->
            <!--    <a href="#collapse-galery" data-toggle="collapse" aria-controls="collapse-galery">-->
            <!--        <span class="glyphicon glyphicon-camera" aria-hidden="true"></span>-->
            <!--        <span class="hidden-sm hidden-xs">Fasilitas/Layanan</span>-->
            <!--    </a>-->
            <!--    <ul class="collapse collapseable" id="collapse-galery">-->
            <!--        <li><a href="<?= base_url('index.php/admin/foto'); ?>">Foto</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/profil/ktp'); ?>">KK-KTP-Akta kelahiram</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/profil/infosurat'); ?>">Pelayanan Surat</a></li>-->
            <!--    </ul>-->

            <!--    <a href="#collapse-lembaga" data-toggle="collapse" aria-controls="collapse-lembaga">-->
            <!--        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>-->
            <!--        <span class="hidden-sm hidden-xs">Data Lembaga Desa</span>-->
            <!--    </a>-->
            <!--    <ul class="collapse collapseable" id="collapse-lembaga">-->
            <!--        <li><a href="<?= base_url('index.php/admin/pemerintah_desa'); ?>">Pemerintah Desa</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/bpd'); ?>">BPD</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/pkk'); ?>">PKK</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/lpmd'); ?>">LPMD</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/kpmd'); ?>">KPMD</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/karang_taruna'); ?>">Karang Taruna</a></li>-->
            <!--    </ul>-->

            <!--    <a href="#collapse-kependudukan" data-toggle="collapse" aria-controls="collapse-kependudukan">-->
            <!--        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>-->
            <!--        <span class="hidden-sm hidden-xs">Kependudukan</span>-->
            <!--    </a>-->
            <!--    <ul class="collapse collapseable" id="collapse-kependudukan">-->
            <!--        <li><a href="<?= base_url('index.php/admin/penduduk'); ?>">Data Penduduk</a></li>-->
            <!--    </ul>-->

            <!--    <a href="#collapse-pustaka" data-toggle="collapse" aria-controls="collapse-pustaka">-->
            <!--        <span class="glyphicon glyphicon-list" aria-hidden="true"></span>-->
            <!--        <span class="hidden-sm hidden-xs">Pustaka Kependudukan</span>-->
            <!--    </a>-->
            <!--    <ul class="collapse collapseable" id="collapse-pustaka">-->
            <!--        <li><a href="<?= base_url('index.php/admin/pendidikan'); ?>">Pendidikan</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/pekerjaan'); ?>">Pekerjaan</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/agama'); ?>">Agama</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/golongan_darah'); ?>">Golongan Darah</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/kewarganegaraan'); ?>">Kewarganegaraan</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/kompetensi'); ?>">kompetensi</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/kelas_sosial'); ?>">kelas sosial</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/kawin'); ?>">Status Kawin</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/umur'); ?>">Umur</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/kriminal'); ?>">Kriminal</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/penghasilan'); ?>">Penghasilan</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/potensi_desa'); ?>">Potensi Desa</a></li>-->
            <!--    </ul>-->

            <!--    <a href="#collapse-berita" data-toggle="collapse" aria-controls="collapse-berita">-->
            <!--        <span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>-->
            <!--        <span class="hidden-sm hidden-xs">Berita</span>-->
            <!--    </a>-->
            <!--    <ul class="collapse collapseable" id="collapse-berita">-->
            <!--        <li><a href="<?= base_url('index.php/admin/artikel'); ?>">Artikel</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/kabardesa'); ?>">Kabar Desa</a></li>-->
            <!--    </ul>-->

            <!--    <a href="#collapse-sosial" data-toggle="collapse" aria-controls="collapse-sosial">-->
            <!--        <span class="glyphicon glyphicon-flag" aria-hidden="true"></span>-->
            <!--        <span class="hidden-sm hidden-xs">Sosial Penduduk</span>-->
            <!--    </a>-->
            <!--    <ul class="collapse collapseable" id="collapse-sosial">-->
            <!--        <li><a href="<?= base_url('index.php/admin/bantuan_sosial'); ?>">Penerima Bantuan Sosial</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/kip'); ?>">Penerima KIP (Kartu Indonesia Pintar)</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/keluarga_harapan'); ?>">Program Keluarga Harapan</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/siswa_miskin'); ?>">Bantuan Siswa Miskin</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/raskin'); ?>">Penerima Raskin</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/jamkesmas'); ?>">Penerima Jamkesmas</a></li>-->
            <!--    </ul>-->

            <!--    <a href="#collapse-kesehatan" data-toggle="collapse" aria-controls="collapse-kesehatan">-->
            <!--        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>-->
            <!--        <span class="hidden-sm hidden-xs">Kesehatan Penduduk</span>-->
            <!--    </a>-->
            <!--    <ul class="collapse collapseable" id="collapse-kesehatan">-->
            <!--        <li><a href="<?= base_url('index.php/admin/gizi_buruk'); ?>">Status Gizi Masyarakat</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/ibu_hamil'); ?>">Data Ibu Hamil</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/balita'); ?>">Data Balita</a></li>-->
            <!--    </ul>-->

            <!--    <a href="#collapse-surat" data-toggle="collapse" aria-controls="collapse-surat">-->
            <!--        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>-->
            <!--        <span class="hidden-sm hidden-xs">Surat</span>-->
            <!--    </a>-->
            <!--    <ul class="collapse collapseable" id="collapse-surat">-->
            <!--        <li><a href="<?= base_url('index.php/admin/permohonan_surat'); ?>">Permohonan Surat</a></li>-->
            <!--        <li><a href="<?= base_url('index.php/admin/surat'); ?>">Surat Keterangan</a></li>-->
            <!--    </ul>-->

                <!-- <li class="link settings-btn"> -->
                <!-- <a href="#"> -->
                <!-- <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> -->
                <!-- <span class="hidden-sm hidden-xs">Settings</span> -->
                <!-- </a> -->
                <!-- </li> -->
    </ul>
</div>