
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright, 2020 <a href="#">Mama kitchen.</a>
                                 Developed by <a href="https://github.com/Mustafaabdelfatah"  target="_blank">Mustafa Salama</a>
                                 Theme by <a href="http://themewagon.com/"  target="_blank">Develpe </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


        <script src="{{asset('frontend/')}}/js/bootstrap.min.js"></script>
        <script src="{{asset('frontend/')}}/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="{{asset('frontend/')}}/js/jquery.mixitup.min.js" ></script>
        <script src="{{asset('frontend/')}}/js/wow.min.js"></script>
        <script src="{{asset('frontend/')}}/js/jquery.validate.js"></script>
        <script type="text/javascript" src="{{asset('frontend/')}}/js/jquery.hoverdir.js"></script>
        <script type="text/javascript" src="{{asset('frontend/')}}/js/jQuery.scrollSpeed.js"></script>
        <script src="{{asset('frontend/')}}/js/script.js"></script>
        <script src="{{asset('frontend/')}}/js/bootstrap-datetimepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    format: "dd MM yyyy - HH:11 P",
                    showMeridian: true,
                    autoclose: true,
                    todayBtn: true
                });
            })
        </script>
        {!! Toastr::message() !!}
    </body>
</html>
