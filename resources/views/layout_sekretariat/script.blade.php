 <!-- jQuery -->
 <script src="{{ asset('') }}template/adminlte/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="{{ asset('') }}template/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- AdminLTE App -->
 <script src="{{ asset('') }}template/adminlte/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{ asset('') }}template/adminlte/dist/js/demo.js"></script>
 <!-- DataTables -->
 <script src="{{ asset('') }}template/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="{{ asset('') }}template/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="{{ asset('') }}template/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js">
 </script>
 <script src="{{ asset('') }}template/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
 </script>


 <script src="{{ asset('') }}template/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
 <script src="{{ asset('') }}template/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <script src="{{ asset('') }}template/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js">
 </script>
 <script src="{{ asset('') }}template/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js">
 </script>
 <script src="{{ asset('') }}template/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
 <script src="{{ asset('') }}template/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
 <script src="{{ asset('') }}template/adminlte/plugins/jszip/jszip.min.js"></script>
 <script src="{{ asset('') }}template/adminlte/plugins/pdfmake/pdfmake.min.js"></script>
 <script src="{{ asset('') }}template/adminlte/plugins/pdfmake/vfs_fonts.js"></script>
 <script src="{{ asset('') }}template/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
 <script src="{{ asset('') }}template/adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
 <script src="{{ asset('') }}template/adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
 <!-- ChartJS -->
 <script src="{{ asset('') }}template/adminlte/plugins/chart.js/Chart.min.js"></script>

 <script>
     $(function() {
         $(function() {
             $("#example1").DataTable({
                 "responsive": true,
                 "lengthChange": true,
                 "autoWidth": false,
                 "pageLength": 5,
                 "paging": true,
                 "buttons": ["excel", "pdf"]
             }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
         });
     });
 </script>
