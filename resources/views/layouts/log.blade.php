

<!DOCTYPE html>
<html lang="en">
<head>
<link href="{!! asset('css/sweetalert/sweetalert.css') !!}" rel="stylesheet" type="text/css">
<meta charset="utf-8" />
<title>صفحة تسجيل الدخول  - مدرسة الإتقان</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="{{asset('log/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('log/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('log/Site.css')}}" rel="stylesheet" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
   html {
  --scrollbarBG: #682c12;
  --thumbBG: #cc8c2a;
}
body::-webkit-scrollbar {
  width: 11px;
}
body {
  scrollbar-width: thin ;
  scrollbar-color: var(--thumbBG) var(--scrollbarBG);
}
body::-webkit-scrollbar-track {
  background: var(--scrollbarBG);
}
body::-webkit-scrollbar-thumb {
  background-color: var(--thumbBG) ;
  border-radius: 6px;
  border: 3px solid var(--scrollbarBG);
}

        @font-face {
            font-family: "FrutigerLTArabic";
            src: url({{ asset ('log/FrutigerLTArabic.ttf')}}) format("truetype");
        }

        *:not(.fa):not(.glyphicon):not(i):not(.m-accordion__item-mode):not(.toast-close-button):not(.close):not(.select2-selection__arrow) {
            font-family: "FrutigerLTArabic" !important;
        }


        .table-responsive .table {
            max-width: none;
            font-weight: bold;
        }input,label{
            font-weight: bold;
            color: #cc8c2a !important;
            background-color: #dee0df !important;
        }img {
        border-radius: 50%;
        }::placeholder{
            color: #cc8c2a !important;
            font-family: "FrutigerLTArabic" !important;
            font-weight: bold !important;
        }
        .content {
        /* this is needed or the background will be offset by a few pixels at the top */
        overflow: auto;
        position: relative;
        }

        .content:before {
        content: "";
        position: fixed;
        left: 0;
        right: 0;
        z-index: -1;

        display: block;
        background-image: url({{asset('image/cover.png')}});
        background-size:cover;
        width: 100%;
        height: 100%;

        -webkit-filter: blur(30px);
        -moz-filter: blur(30px);
        -o-filter: blur(30px);
        -ms-filter: blur(30px);
        filter: blur(30px);
        }.btn-focus{
         color:#682c12 !important;
         background-color:#cc8c2a !important;
         border-color:#af8573 !important;
        }.btn-focus:hover{
         color:#cc8c2a !important;
         background-color:#cc8c2a !important;
         text-shadow: 2px 2px 4px #ffffff !important;
         box-shadow: -1px 4px 40px #ffffff !important;
        }.btn-outline-focus.m-btn--air, .btn-focus.m-btn--air, .m-btn--gradient-from-focus.m-btn--air{
            box-shadow: 0 5px 10px 2px rgba(255, 255, 255, 0)!important;
            transition: all 0.3s ease-in-out;

        }.btn-outline-focus.m-btn--air:hover, .btn-focus.m-btn--air:hover, .m-btn--gradient-from-focus.m-btn--air:hover{
            box-shadow: 0 25px 25px -18px rgba(0, 0, 0, 0.353)!important;
            transition: opacity 0.3s ease-in-out;

        }.che{
            color: black !important; background-color: #cc8c2a !important; 
        }
      

    </style>
</head>


<body class="content m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<div class="m-grid m-grid--hor m-grid--root m-page " >
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-3" id="m_login" >
<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
<div class="m-login__container" >
<div class="m-login__logo">
<a href="#">
<img src="{{asset('image/logo.jpg')}}" alt="logo" style="width: 180px; margin-top: -20px; box-shadow: -1px 4px 40px #ffffff !important;"  />
</a>
</div>
<div class="m-login__signin">
<div class="m-login__head">
<h3 class="m-login__title" style="color:white;font-weight: bold;">مدرسة الإتقان -  لتحفيظ القرآن الكريم</h3>
<h3 class="m-login__title" style="color:white;font-weight: bold;">مسجد بئر السبع</h3>
</div>

@yield('contentLog')

</div>
</div>
</div>
</div>
</div>
<script>
  $(document).ready(function () {
      $(".swal2-container").fadeTo(2000, 500).slideUp(500, function () {
          $(".swal2-container").slideUp(500);
      });
      $(".swal2-header").fadeTo(2000, 500).slideUp(500, function () {
          $(".swal2-header").slideUp(500);
      });
  });
</script>
<script src="{{asset('vendors.bundle.js')}}" type="a65adff1ddaab7220ff91169-text/javascript"></script>
<script src="{{asset('scripts.bundle.js')}}" type="a65adff1ddaab7220ff91169-text/javascript"></script>
</html>
