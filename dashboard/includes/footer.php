<script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/simplebar/simplebar.min.js"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>

    <script src="plugins/apexcharts/apexcharts.js"></script>

    <script src="plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>

    <script src="plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>

    <script src="plugins/daterangepicker/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script>
      jQuery(document).ready(function () {
        jQuery('input[name="dateRange"]').daterangepicker({
          autoUpdateInput: false,
          singleDatePicker: true,
          locale: {
            cancelLabel: "Clear",
          },
        });
        jQuery('input[name="dateRange"]').on(
          "apply.daterangepicker",
          function (ev, picker) {
            jQuery(this).val(picker.startDate.format("MM/DD/YYYY"));
          }
        );
        jQuery('input[name="dateRange"]').on(
          "cancel.daterangepicker",
          function (ev, picker) {
            jQuery(this).val("");
          }
        );
      });
    </script>

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <script src="plugins/toaster/toastr.min.js"></script>

    <script src="js/mono.js"></script>
    <script src="js/chart.js"></script>
    <script src="js/map.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Js bundle stylesheet -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>
