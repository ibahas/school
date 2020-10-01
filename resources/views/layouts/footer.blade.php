<div class="container-fluid">
    <nav class="float-left">
      <ul>
        <li>
          <a href="https://www.creative-tim.com">
            تیم خلاق
          </a>
        </li>
        <li>
          <a href="https://creative-tim.com/presentation">
            درباره ما
          </a>
        </li>
        <li>
          <a href="http://blog.creative-tim.com">
            بلاگ
          </a>
        </li>
        <li>
          <a href="https://www.creative-tim.com/license">
            اجازه نامه
          </a>
        </li>
      </ul>
    </nav>
    <div class="copyright float-right">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>
      <i class="material-icons">favorite</i>
      <a href="#" target="_blank">IbAHas</a>
    </div>
  </div>
  

          <!--   Core JS Files   -->
          <script src="{{ asset('assets/js/core/jquery.min.js')}}" type="text/javascript')}}"></script>
          <script src="https://demos.creative-tim.com/material-dashboard/assets/js/core/popper.min.js"></script>
          <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
          <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
          <!--  Google Maps Plugin    -->
          <!-- Place this tag in your head or just before your close body tag. -->
          <script async defer src="https://buttons.github.io/buttons.js"></script>
          <!-- Chartist JS -->
          <script src="{{ asset('assets/js/plugins/chartist.min.js')}}"></script>
          <!--  Notifications Plugin    -->
          <script src="{{ asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
          <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
          <script src="{{ asset('assets/js/material-dashboard.min.js?v=2.1.2')}}" type="text/javascript"></script>
          <!-- Material Dashboard DEMO methods, don't include it in your project! -->
          <script src="{{ asset('assets/demo/demo.js')}}"></script>




  <!-- Plugin for the momentJs  -->
  <script src="{{ asset('assets/js/plugins/moment.min.js')}}"></script>
  <!-- Forms Validations Plugin -->
  <script src="{{ asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="{{ asset('assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="{{ asset('assets/js/plugins/jasny-bootstrap.min.js')}}"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="{{ asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="{{ asset('assets/js/plugins/jquery-jvectormap.js')}}"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="{{ asset('assets/js/plugins/nouislider.min.js')}}"></script>
  <!-- Library for adding dinamically elements -->
  <script src="{{ asset('assets/js/plugins/arrive.min.js')}}"></script>
  <script src="{{ asset('assets/js/plugins/chartist.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.2')}}" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        
  <!-- Sharrre libray -->
  <script>
    $(document).ready(function () {
      //
      $( window ).scroll(function() {
      $('body').remove('.ps-scrollbar-x-rail');
      $('body').remove('.ps-scrollbar-x-rail');
      });
    });
    function funSearch() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("inputSearch");
        filter = input.value.toUpperCase();
        table = document.getElementById("funSearch");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }
      $(document).ready(function () {
        $('#dateSelected').change(function() {
            var date = $(this).val();
            $('#date1').val(date);
            $('#date2').val(date);
            $('#date3').val(date);
        });
        $('#formDeparture').click(function (e) { 
          e.preventDefault();
          if($('date1').val() == ''){
            alert('ABCW');
          }
          // console.log("AWDAWD");
        });
      });
     
  </script>
  