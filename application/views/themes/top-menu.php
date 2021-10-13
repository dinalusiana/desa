<header>
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="span6">
                    <p class="topcontact"><i class="icon-google-plus"></i>sejomulyomaju@gmail.com</p>
                </div>
                <div class="span6">

                    <ul class="social-network">
                        <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-white"></i></a>
                        </li>
                        <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-white"></i></a></li>
                        <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-white"></i></a>
                        </li>
                        <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest  icon-white"></i></a>
                        </li>
                        <li><a href="#" data-placement="bottom" title="Google +"><i class="icon-google-plus icon-white"></i></a>
                        </li>
                        <li><a href="#" data-placement="bottom" title="Dribbble"><i class="icon-dribbble icon-white"></i></a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    <div class="container">


        <div class="row nomargin">
            <div class="span4">
                <div class="logo">
                    <a href="<?= base_url(); ?>"><img src="<?php echo base_url('public/'); ?>img/logo sejomulyo.jpg" alt="" /></a>
                </div>
            </div>
            <br>
            <div class="span8">
                <div class="navbar navbar-static-top">
                    <div class="navigation">
                        <nav>
                            <ul class="nav topnav">
                                <li class="active">
                                    <a href="<?= base_url(); ?>"><i class="icon-home"></i> Home </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Profil <i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown"><a href="#">Profil Desa<i class="icon-angle-right"></i></a>
                                            <ul class="dropdown-menu sub-menu-level1">
                                                <li><a href="<?php echo base_url('profil/desa'); ?>">Gambaran Umum Desa</a></li>
                                                <li><a href="<?php echo base_url('profil/sejarah'); ?>">Sejarah Desa</a></li>
                                                <li><a href="<?php echo base_url('profil/visimisi'); ?>">Visi dan Misi</a></li>
                                                <li><a href="<?php echo base_url('profil/potensi'); ?>">Potensi Desa</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?php echo base_url('profil/pemdes'); ?>">Pemerintah Desa</a></li>
                                        <li><a href="<?= base_url('profil/bpd'); ?>">BPD</a></li>
                                        <li><a href="https://kampungkb.bkkbn.go.id/profile/4621">Kampung KB </a></li>
                                        <!-- <li><a href="<?= base_url('penduduk'); ?>">Data Penduduk </a></li> -->
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#">Lembaga Desa <i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('profil/karangtaruna'); ?>">Karang Taruna</a></li>
                                        <li><a href="<?php echo base_url('profil/pkk'); ?>">PKK</a></li>
                                        <li><a href="<?php echo base_url('profil/lpmd'); ?>">LPMD</a></li>
                                        <li><a href="<?php echo base_url('profil/kpmd'); ?>">KPMD</a></li>
                                    </ul>
                                </li>



                                <li><a href="<?= base_url('artikel'); ?>">Artikel Desa</a></li>


                                <!-- <li class="dropdown">
                                    <a href="#">Berita <i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= base_url('artikel'); ?>">Artikel Desa</a></li>
                                        <li><a href="<?php echo base_url('kabardesa'); ?>">Kabar Desa</a></li>
                                        <li><a href="<?php echo base_url('Opini'); ?>">Opini</a></li>
                                    </ul>
                                </li> -->

                                <li class="dropdown">
                                    <a href="#">Fasilitas<i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= base_url('foto'); ?>">Foto</a></li>
                                        <li><a href="<?= base_url('download'); ?>">Download </a></li>
                                        <li><a href="<?php echo base_url('profil/ktp'); ?>">KK-KTP-Akta Kelahiran</a></li>
                                        <li><a href="<?= base_url('profil/infosurat'); ?>">Pelayanan Surat</a></li>
                                        <li><a href="<?= base_url('permohonan_surat'); ?>">Permohonan Surat Keterangan</a></li>
                                    </ul>
                                </li>

                                <!-- <li><a href="https://kampungkb.bkkbn.go.id/profile/4621">Kampung KB </a></li>
                                <li><a href="http://localhost:8080/desa/auth">Login </a></li> -->

                                <li><a href="<?= base_url('demografi'); ?>">Demografi Penduduk</a></li>
                                
                            
                                
                                <?php
                                $q=$this->db->query("SELECT * FROM halaman_web WHERE level='top' ORDER BY id ASC");
                                foreach($q->result() as $xrow) {
                                    $xq=$this->db->query("SELECT * FROM halaman_web WHERE level='$xrow->id' ORDER BY id ASC");
                                    if($xq->num_rows()>0) {  ?>
                                <li class="dropdown"><a href="#"><?php echo $xrow->judul_halaman; ?><i class="icon-angle-down"></i></a>
                                    <ul class="dropdown-menu">
                                <?php
                                    foreach($xq->result() as $row) {
                                        $querydropdown3 = $this->db->query("SELECT * FROM halaman_web WHERE level='$row->id' ORDER BY id ASC");
                                        if($querydropdown3->num_rows()>0) { ?>
                                        <li class="dropdown"><a href="#"><?php echo $row->judul_halaman; ?> <i class="icon-angle-right"></i></a>
                                            <ul class="dropdown-menu sub-menu-level1">
                                                <?php foreach($querydropdown3->result() as $droprow) { ?>
                                                      <li><a href="<?php echo base_url().'page/'.$droprow->slug; ?>"><?php echo $droprow->judul_halaman; ?></a></li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <?php } else { ?>
                                            <li><a href="<?php echo base_url().'page/'.$row->slug; ?>"><?php echo $row->judul_halaman; ?></a></li>
                                        <?php }
                                ?>
                                <?php } ?>
                                    </ul>
                                </li>
                                <?php } else { ?>
                                        <li class=""><a href="<?php echo base_url().'page/'.$xrow->slug; ?>"><?php echo $xrow->judul_halaman; ?></a></li>
                                <?php } ?>
                            <?php } ?>

                                <!-- <li><a href="<?= base_url('kontak'); ?>">Peta Desa</a></li>
                                <li><a href="https://kampungkb.bkkbn.go.id/profile/4621">Kampung KB </a></li>
                                <li><a href="http://localhost:8080/desa/auth">Login </a></li> -->
                                
                            </ul>
                        </nav>
                    </div>
                    <!-- end navigation -->
                </div>
            </div>
        </div>
    </div>
</header>