        <!-- plugin dependencies -->
        <script type="text/javascript" src="{{asset('/vendors/jquery/dist/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/moment/moment.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/metismenu/dist/metisMenu.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/bootstrap4-toggle/js/bootstrap4-toggle.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/jquery-circle-progress/dist/circle-progress.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/toastr/build/toastr.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/jquery.fancytree/dist/jquery.fancytree-all-deps.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/apexcharts/dist/apexcharts.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/bootstrap-table/dist/bootstrap-table.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/vendors/slick-carousel/slick/slick.min.js')}}"></script>
        <!-- custome.js -->
        <script type="text/javascript" src="{{asset('vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/charts/apex-charts.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/circle-progress.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/demo.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/scrollbar.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/toastr.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/treeview.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/form-components/toggle-switch.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/tables.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/carousel-slider.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('Auth/js/Application.js')}}"></script>
        @if (Route::is(['profile']))
            <script type="text/javascript" src="{{asset('tabulator/js/tabulator.min.js')}}"></script>
            <script type="text/javascript" src="{{asset('tabulator/js/profile.js')}}"></script>
        @endif
        <script type="text/javascript" src="{{asset('Auth/js/sweetalert2.all.min.js')}}"></script>
    </body>
</html>
