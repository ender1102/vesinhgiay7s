<!-- jQuery -->
<script src="{{asset('public/backend/js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('public/backend/js/bootstrap.bundle.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/backend/js/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('public/backend/js/nprogress.js')}}"></script>
<!-- jQuery Smart Wizard -->
<script src="{{asset('public/backend/js/jquery.smartWizard.js')}}"></script>
<!-- Chart.js -->
<script src="{{asset('public/backend/js/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{asset('public/backend/js/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{asset('public/backend/js/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('public/backend/js/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{asset('public/backend/js/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{asset('public/backend/js/jquery.flot.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.pie.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.time.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.stack.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{asset('public/backend/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('public/backend/js/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{asset('public/backend/js/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/backend/js/jquery.vmap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.vmap.world.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('public/backend/js/moment.min.js')}}"></script>
<script src="{{asset('public/backend/js/daterangepicker.js')}}"></script>

<!-- Datatables -->
{{-- <script src="{{asset('public/backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/backend/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('public/backend/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('public/backend/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('public/backend/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('public/backend/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('public/backend/js/buttons.print.min.js')}}"></script>
<script src="{{asset('public/backend/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('public/backend/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('public/backend/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('public/backend/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('public/backend/js/jszip.min.js')}}"></script>
<script src="{{asset('public/backend/js/pdfmake.min.js')}}"></script>
<script src="{{asset('public/backend/js/vfs_fonts.js')}}"></script> --}}


<!-- Skycons -->
<script src="{{asset('public/backend/js/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{asset('public/backend/js/jquery.flot.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.pie.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.time.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.stack.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{asset('public/backend/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('public/backend/js/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{asset('public/backend/js/date.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{asset('public/backend/js/moment.min.js')}}"></script>
<script src="{{asset('public/backend/js/daterangepicker.js')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{asset('public/backend/js/custom.min.js')}}"></script>

@stack('script')
<script>
$(document).ready(function () {
    $('.quantity').on('keyup change click', function(){ //b???t s??? ki???n keyup khi ng?????i d??ng g?? t??? kh??a tim ki???m
        var id = $(this).attr("data-id");
        var value= $(this).val();
        var price= $(this).attr("data-price");
        document.getElementById('subtotal'+id).innerHTML=price*value+' $';
        $.ajax({
            url:"{{ route('soluong') }}", // ???????ng d???n khi g???i d??? li???u ??i 'search' l?? t??n route m??nh ?????t b???n m??? route l??n xem l?? hi???u n?? l?? c??i j.
            type: "get", // ph????ng th???c g???i d??? li???u.
            dataType: "JSON",
            data:{id:id,value:value},
            success:function(response){ //d??? li???u nh???n v???
                location.reload();//nh???n d??? li???u d???ng html v?? g??n v??o c???p th??? c?? id l?? countryList
            }
        });

        $.ajax({
            url:"{{ route('tonggiatien') }}", // ???????ng d???n khi g???i d??? li???u ??i 'search' l?? t??n route m??nh ?????t b???n m??? route l??n xem l?? hi???u n?? l?? c??i j.
            type: "get", // ph????ng th???c g???i d??? li???u.
            dataType: "JSON",
            // data:{id:id,value:value},
            success:function(response){ //d??? li???u nh???n v???
            // alert(response);
                document.getElementById('total_price').innerHTML=response.TongGiaTien+' $';//nh???n d??? li???u d???ng html v?? g??n v??o c???p th??? c?? id l?? countryList
                //document.getElementById('sau_giam').innerHTML=response.SauGiam+' $';//nh???n d??? li???u d???ng html v?? g??n v??o c???p th??? c?? id l?? countryList
            }
        });
    });
});
</script>
