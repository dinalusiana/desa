<div class="row">
    <footer class="clearfix" id="admin-footer">
        <div class="pull-left"><b>Copyright </b>&copy; <?= date('Y'); ?></div>
        <div class="pull-right">Desa Sejomulyo</div>
    </footer>
</div>
</div>
</div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- <script src="<?= base_url('assets/'); ?>vendor/vendor/chartjs/Chart.min.js"></script> -->


<!-- Bootstrap js -->
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- My Style js -->
<script src="<?php echo base_url('assets/'); ?>js/style.js ?>"></script>

<!-- Chosen js -->
<script src="<?php echo base_url('assets/'); ?>vendor/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript">
    var config = {
        '.chosen-select': {},
        '.chosen-select-deselect': {
            allow_single_deselect: true
        },
        '.chosen-select-no-single': {
            disable_search_threshold: 10
        },
        '.chosen-select-no-result': {
            no_result_text: 'Oops, nothing found!'
        },
        '.chosen-select-width': {
            width: "95%"
        }
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }
</script>

<!-- Summernote js -->
<script src="<?php echo base_url('assets/'); ?>vendor/summernote/summernote.min.js"></script>
<script type="text/javascript">
    $('.summernote').summernote({
        height: 200
    });
</script>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>

<!-- DataTable js -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();


    });

    $("#navshow").hide()

    $("#navshow").click(function(e) {

        $("#navshow").hide()
        $("#navhide").show()

        $("#side-menu").addClass("display-table-cell");
        $("#side-menu").removeClass("hidenavbar")
    });

    $("#navhide").click(function(e) {
        $("#side-menu").removeClass("display-table-cell")
        $("#navshow").show()
        $("#navhide").hide()
        $("#side-menu").addClass("hidenavbar")
    });
</script>










<!-- Alert js -->
<script type="text/javascript">
    $('.alert').fadeIn().delay(3000).fadeOut('slow');
</script>

</body>

</html>