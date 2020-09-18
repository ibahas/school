
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('image/logo.jpg')}}">
    <link rel="icon" type="image/png" href="{{ asset('/assets/img/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1')}}" />
    <title>لوحة التحكم | مدرسة الإتقان</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
    <!-- Markazi Text font include just for persian demo purpose, don't include it in your project -->
    <link href="https://fonts.googleapis.com/css?family=Cairo&amp;subset=arabic" rel="stylesheet">
    <!-- CSS Files -->
    <script src="{{ asset('js/jquery.js')}}"></script>

    <link href="{{ asset('/assets/css/material-dashboard.min.css?v=2.1.2')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('/assets/demo/demo.css')}}" rel="stylesheet" />
   
    <link href="{{ asset('css/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <script>
      $(document).ready(function () {
        $('.photo').click(function (e) { 
          e.preventDefault();
          $('#photo').click();
          
        });
      });
    </script>