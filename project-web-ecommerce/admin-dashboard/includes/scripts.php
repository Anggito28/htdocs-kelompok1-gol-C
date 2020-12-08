<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="js/custom-script.js"></script>

<!-- sidebar aktif indikator -->
<script>
    $(document).ready(function() {
        let sidebar = "<?= $sidebarActive; ?>";
        $("#" + sidebar).addClass("active");

        <?php if (isset($itemActive)) : ?>
            let collapseItem = "<?= $itemActive; ?>";
            $("#" + collapseItem).addClass("active text-success");
            $("#" + sidebar + " a:first").removeClass("collapsed");
            $("#" + sidebar + " div.collapse").addClass("show");
        <?php endif; ?>
    });
</script>