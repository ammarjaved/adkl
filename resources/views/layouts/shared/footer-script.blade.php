<!-- bundle -->
<!-- Vendor js -->
<script src="{{asset('assets/js/vendor.min.js')}}"></script>
<script> $(document).ready(function(){
    $('.alert button.close').on('click', function() {
$(this).parent().alert('close');
});
})</script>
@yield('script')
<!-- App js -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
@yield('script-bottom')

