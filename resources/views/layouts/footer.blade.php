<script src="{{ asset('js/jquery.js')}}"></script>
<script src="{{ asset('js/global.js')}}" type="1890e8ffd10daf9109f25208-text/javascript"></script>
@if(Request::path() === 'users/show')
<script>
    $(document).ready(function () {
            $('.photo').click(function () {
                $('#photo').click();
            });
        });
</script>
<script>
    $(document).ready(function () {
        $('.photo,.photos').hover(function () {
                //
                $('.photos').css('display','table-row');

            }, function () {
                // out
                $('.photos').css('display','none');

            }
        );
    });
</script>

<script>
    $(document).ready(function () {
        $('*').mouseout(function () {
        $('#password, #confirmPassword').on('keyup', function () {
            if ($('#password').val() == $('#confirmPassword').val()) {
                $('.submit').removeAttr('disabled');
            } else
            $('.submit').attr('disabled','disabled');
         });
         var x = $('#password, #confirmPassword,#oldPassword').val().length;
           if( x < 6)
            {
                $('.submit').attr('disabled','disabled');
            }else{
                $('.submit').removeAttr('disabled');
          }
        });
    });
</script>

@endif
<script src="{!! asset('js/sweetalert/sweetalert.min.js')!!}"></script>
