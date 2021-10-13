<script src="<?= base_url('assets/select2/'); ?>js/select2.full.min.js"></script>
<script type="text/javascript">//inisialisasi variabel atau properti
    var date = new Date();
    var romawi = "";
    var nomerSurat = "";
    var strDate = date.getFullYear() + "-" + (date.getMonth() + 8) + "-" + date.getDate();
    var id_surat_permohonan = "";
    // var name = "";
    // var ttl = "";
    // var kewarganegaraan = "";
    // var agama = "";
    // var pekerjaan = "";
    // var alamat = "";
    // var nik = "";
    // var keperluan = "";
    // var keterangan = "";

    if ((date.getMonth() + 1) == 1) {//untuk penomoran surat 
        romawi = "I";
        nomerSurat = "/" + date.getDate() + "/" + romawi + "/" + date.getFullYear()
    } else if ((date.getMonth() + 1) == 2) {
        romawi = "II";
        nomerSurat = "/" + date.getDate() + "/" + romawi + "/" + date.getFullYear()
    } else if ((date.getMonth() + 1) == 3) {
        romawi = "III";
        nomerSurat = "/" + date.getDate() + "/" + romawi + "/" + date.getFullYear()
    } else if ((date.getMonth() + 1) == 4) {
        romawi = "IV";
        nomerSurat = "/" + date.getDate() + "/" + romawi + "/" + date.getFullYear()
    } else if ((date.getMonth() + 1) == 5) {
        romawi = "V";
        nomerSurat = "/" + date.getDate() + "/" + romawi + "/" + date.getFullYear()
    } else if ((date.getMonth() + 1) == 6) {
        romawi = "VI";
        nomerSurat = "/" + date.getDate() + "/" + romawi + "/" + date.getFullYear()
    } else if ((date.getMonth() + 1) == 7) {
        romawi = "VII";
        nomerSurat = "/" + date.getDate() + "/" + romawi + "/" + date.getFullYear()
    } else if ((date.getMonth() + 1) == 8) {
        romawi = "VIII";
        nomerSurat = "/" + date.getDate() + "/" + romawi + "/" + date.getFullYear()
    } else if ((date.getMonth() + 1) == 9) {
        romawi = "IX";
        nomerSurat = "/" + date.getDate() + "/" + romawi + "/" + date.getFullYear()
    } else if ((date.getMonth() + 1) == 10) {
        romawi = "X";
        nomerSurat = "/" + date.getDate() + "/" + romawi + "/" + date.getFullYear()
    } else if ((date.getMonth() + 1) == 11) {
        romawi = "XI";
        nomerSurat = "/" + date.getDate() + "/" + romawi + "/" + date.getFullYear()
    } else {
        romawi = "XII";
        nomerSurat = "/" + date.getDate() + "/" + romawi + "/" + date.getFullYear()
    }

    $('#nomer').val();
    $('#bulan').val(romawi);
    $('#tahun').val(date.getFullYear());

    function get_variabel() {//mendapatkan variabel
        id_surat_permohonan = $('#id_surat_permohonan').val()
    }

    function save_data(url, formData) {//ajax : agar dinamis dan bisa udate tanpa perlu di reload terlebih dahulu
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {
                if (data.resutStatus == 1) {
                    alert(data.msgStatus)
                    $("#form")[0].reset();
                    setTimeout(function() {
                        location.reload();
                    }, 500);
                } else {
                    // swal(data.msgStatus, "", "error");
                    alert(data.msgStatus)
                    setTimeout(function() {
                        $(".swal-button").click();
                    }, 500);
                }
            },
        });
    };

    function get_data() {//mendapatkan data nomor surat
        var formData = new FormData($('#form')[0]);
        var url = "<?php echo site_url('permohonan_surat/ctrl_create_no') ?>";
        $.ajax({
            url: url,
            type: "POST",//maka method POST akan mengirimkan data atau nilai langsung ke action php untuk ditampung, tanpa menampilkan pada URL bar. 
            data: "bulan=" + $('#bulan').val() + "&tahun=" + $('#tahun').val(),
            dataType: 'json',
            success: function(data) {
                $('#nomer').val(data[0].nomer);

            },
        });
    };

    function get_AllPemohonSurat() {//untuk menampilkan data dari pemohon surat ketika admin ingin membuat surat
        $('#id_surat_permohonan').empty();
        $('#id_surat_permohonan').append('<option value="">---- Pemohon ---</option>');
        var formData = new FormData($('#form')[0]);
        var url = "<?php echo site_url('permohonan_surat/ctrl_AllPemohonSurat') ?>";
        $.ajax({
            url: url,
            type: "GET",//Sedangkan method GET akan menampilkan data atau nilai pada URL, kemudian nilai tersebut akan di eksekusi oleh file action php. 
            data: "",
            dataType: 'json',
            success: function(data) {
                for (i = 0; i < data.length; i++) {
                    $('#id_surat_permohonan').append('<option value="' + data[i].id_surat_permohonan + '">' + data[i].nama + ' - ' + data[i].keperluan + '</option>');
                }

            },
        });
    };

    function get_SelectPemohonSurat(id) {//memperoleh data pemohon surat
        var url = "<?php echo site_url('admin/surat/ctrl_SelectPemohonSurat') ?>";
        $.ajax({
            url: url,
            type: "get",
            data: "id=" + id,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {
                console.log(data)
                if (data[0].nomer.length == 1) {
                    data[0].nomer = "000" + data[0].nomer;
                } else if (data[0].nomer.length == 2) {
                    data[0].nomer = "00" + data[0].nomer;
                } else if (data[0].nomer.length == 3) {
                    data[0].nomer = "0" + data[0].nomer
                } else {
                    data[0].nomer = data[0].nomer;
                }

                // console.log(data[0].nomer)
                $('#id_surat_permohonan').val(data[0].id_surat_permohonan);
                $('#nomor').val(data[0].nomer + "/" + date.getDate() + "/" + data[0].bulan + "/" + data[0].tahun);
                $('#ttl_pemohon').val(data[0].ttl);
                $('#kewarganegaraan_pemohon').val(data[0].kewarganegaraan);
                $('#agama_pemohon').val(data[0].agama);
                $('#pekerjaan_pemohon').val(data[0].pekerjaan);
                $('#alamat_pemohon').val(data[0].alamat);
                $('#nama_pemohon').val(data[0].nama);
                $('#nik_pemohon').val(data[0].nik);
                $('#keperluan').val(data[0].keperluan);
                $('#keterangan').val(data[0].keterangan);
                $('#file_upload').show();
                $('#file_upload').attr("href", "../../upload_file/permohonan_surat/" + data[0].file_upload);


            },
        });
    };

    get_data();
    get_AllPemohonSurat()

    function readPDF1(input) {

        var _validFileExtensionsPDF = [".jpg", ".jpeg", ".png", ".JPG", ".JPEG", ".PNG"];

        if (input.files && input.files[0]) {
            var sFileName = input.value;


            if (sFileName.length > 0) {

                var blnValid = false;

                for (var j = 0; j < _validFileExtensionsPDF.length; j++) {
                    var sCurExtension = _validFileExtensionsPDF[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Sorry, this File is invalid file format [jpg, jpeg, png]", "", "error");
                    // alert("Sorry, this File is invalid file format");
                    input.value = "";
                    input.files[0].size = "";
                    return false;
                } else {

                    var iFileSize = input.files[0].size;

                    if (iFileSize > 11240000) {
                        alert("Make sure, this File less than 10 MB", "", "error");
                        // alert("Make sure, this File less than 10 MB");
                        input.value = "";
                        input.files[0].size = "";
                        return false;

                    }
                    // else {


                    //     var reader = new FileReader();
                    //     reader.onload = function(e) {
                    //         $("#previewPDF1").attr("href", e.target.result);
                    //         document.getElementById('previewPDF1').style.visibility = 'visible';
                    //     };

                    //     reader.readAsDataURL(input.files[0]);




                    // } // End Else File Size Less 10 MB


                }


            }

        }
        return true;
    }


    $('#id_surat_permohonan').on('change', function(e) {
        $('#id_surat_permohonan').val(this.value)
        get_variabel()
        if ($('#id_surat_permohonan').val() == '') {
            $('#id_surat_permohonan').val('');
            $('#nomor').val('');
            $('#ttl_pemohon').val('');
            $('#kewarganegaraan_pemohon').val('');
            $('#agama_pemohon').val('');
            $('#pekerjaan_pemohon').val('');
            $('#alamat_pemohon').val('');
            $('#nama_pemohon').val('');
            $('#nik_pemohon').val('');
            $('#keperluan').val('');
            $('#keterangan').val('');
            $('#file_upload').hide();
        }
        get_SelectPemohonSurat(id_surat_permohonan);

    });

    function print(id) {
        window.open("<?php echo site_url('admin/surat/ctrl_print/') ?>" + id, 'popup_window', 'width=1366,height=750,left=100,top=100,resizable=yes,scrollbars=yes');
    }

    $(document).ready(function() {
        get_data();

        $('.select2').select2();
        // $('#file_upload').hide();

        $("#btn_submit").click(function(e) {
            var nik = $("#nik").val();
            var keperluan = $("#keperluan").val();
            var keterangan = $("#keterangan").val();
            // console.log($('#nomer').val())
            // return;
            var url = "<?php echo site_url('permohonan_surat/ctrl_insert') ?>";
            var formData = new FormData($('#form')[0]);
            if (
                nik.length != 0 &&
                keperluan.length != 0 &&
                keterangan.length != 0
            ) {

                e.preventDefault();
                save_data(url, formData);
                // save_data(url, formData);
            }
        });


        // $("#btn_print").click(function(e) {
        //     window.open("<?php echo site_url('admin/surat/ctrl_print/') ?>" + $(this).attr('data'), 'popup_window', 'width=1366,height=750,left=100,top=100,resizable=yes,scrollbars=yes');

        // });


    });
</script>