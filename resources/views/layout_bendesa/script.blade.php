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
 <script>
     $(function() {
         $("#example1").DataTable({
             "responsive": true,
             "autoWidth": false,
         });
         $('#example2').DataTable({
             "paging": true,
             "lengthChange": false,
             "searching": false,
             "ordering": true,
             "info": true,
             "autoWidth": false,
             "responsive": true,
         });
     });
 </script>
 <script>
     //-------------
     //- BAR CHART -
     //-------------
     var barChartCanvas = $('#barChart').get(0).getContext('2d')
     var barChartData = jQuery.extend(true, {}, areaChartData)
     var temp0 = areaChartData.datasets[0]
     var temp1 = areaChartData.datasets[1]
     barChartData.datasets[0] = temp1
     barChartData.datasets[1] = temp0

     var barChartOptions = {
         responsive: true,
         maintainAspectRatio: false,
         datasetFill: false
     }

     var barChart = new Chart(barChartCanvas, {
         type: 'bar',
         data: barChartData,
         options: barChartOptions
     })
 </script>
