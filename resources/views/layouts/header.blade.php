<title>لوحة التحكم | مدرسة الإتقان</title>


    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="#">
    <link rel="icon" type="image/png" href="#">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1')}}" />

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,100,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Markazi Text font include just for persian demo purpose, don't include it in your project -->
    <link href="https://fonts.googleapis.com/css?family=Cairo&amp;subset=arabic" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/material-dashboard.min.css?v=2.1.2')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('css/w3.css')}}" rel="stylesheet">
    <style>
    .ps--active-x>.ps__rail-x, .ps--active-y>.ps__rail-y,.ps-scrollbar-x,.ps-scrollbar-x-rail,.ps-scrollbar-y-rail{
      display: none !important;
    }
    .modal-backdrop.show{
      /* z-index: 0 !important; */
      display : none;
    }
    .btn-sm{
      max-width: 10% !important;
      padding-left: 6px !important;
    }
    .btn-sm>.material-icons{
      right: -1rem;
    }
  </style>
<script src="{{ asset('js/jquery.js')}}"></script>
    <script>
      $(document).ready(function () {
        $('.photo').click(function (e) { 
          e.preventDefault();
          $('#photo').click();
          
        });
      });
    </script>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{csrf_token()}}">
<script>
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
</script>

    <script>
        $(document).ready(function () {
              $(".sweet-overlay").fadeTo(2000, 100).slideUp(100, function () {
                  $(".sweet-overlay").slideUp(500);
              });
              $(".sweet-alert").fadeTo(2000, 500).slideUp(500, function () {
                  $(".sweet-alert").slideUp(500);
              });
            
          });

    </script>

    
<!-- Scripts -->
<script src="{{ asset('js/app.js')}}"></script>