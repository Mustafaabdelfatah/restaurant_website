<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="shortcut icon" href="images/star.png" type="favicon/ico" /> -->

    <title>Mamma's Kitchen</title>

    <link rel="stylesheet" href="{{asset('frontend/')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/owl.theme.css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/animate.css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/flexslider.css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/pricing.css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/main.css">
    <link rel="stylesheet" href="{{asset('frontend/')}}/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>

         @foreach($sliders as $key => $slider)

            .owl-carousel .owl-wrapper, .owl-carousel .owl-item:nth-child({{ $key + 1 }}) .item
            {
                background: url({{ asset('backend/img/slider/'.$slider->image) }});
                background-size: cover;
            }
        @endforeach

    </style>

    <script src="{{asset('frontend/')}}/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="{{asset('frontend/')}}/js/jquery.flexslider.min.js"></script>
    <script type="text/javascript">
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlsContainer: ".flexslider-container"
            });
        });

    </script>

</head>

<body data-spy="scroll" data-target="#template-navbar">
