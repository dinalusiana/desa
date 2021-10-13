<section id="content">
    <div class="container">
        <div class="row">
            <div class="span8">
                <h1>Form Permohonan Surat</h1>

                <div id="sendmessage">Terimakasih, pesan Anda telah dikirim!</div>
                <div id="errormessage"></div>
                <form action="" method="post" id="form" role="form" class="contactForm">
                    <div class="row">
                        <div class="span4 form-group">
                            <input type="number" style="width: 96% !important;" required name="nik" id="nik" placeholder="   NIK" data-rule="nik" data-msg="Please enter a valid nik" />
                            <div class="validation"></div>
                        </div>

                        <div class="span4 form-group">
                            <input type="text" required name="keperluan" id="keperluan" placeholder="Keperluan" data-rule="keperluan" data-msg="Please enter a valid keperluan" />
                            <div class="validation"></div>
                        </div>

                        <div class="span8 form-group">
                            <textarea name="keterangan" required rows="5" id="keterangan" data-rule="required" data-msg="Please write something for us" placeholder="Keterangan"></textarea>
                            <div class="validation"></div>
                            <div class="text-center">
                                <button class="btn btn-theme btn-medium margintop10" id="btn_submit">Submit</button>
                            </div>
                        </div>

                    </div>
                    <input name="nomer" id="nomer" style="display: none;"></input>
                    <input name="bulan" id="bulan" style="display: none;"></input>
                    <input name="tahun" id="tahun" style="display: none;"></input>
                </form>
            </div>
            <div class="span4">
                <div class="clearfix"></div>
                <aside class="right-sidebar">

                    <div class="widget">
                        <h5 class="widgetheading">Informasi Kontak<span></span></h5>

                        <ul class="contact-info">
                            <li><label>Alamat :</label>Desa Sejomulyo, Kecamatan Juwana, Kabupaten Pati<br /></li>
                            <li><label>Phone :</label>+6281393048412</li>
                            <li><label>Email : </label> sejomulyomaju@gmail.com</li>
                        </ul>

                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>