@extends('layouts.app')

@section('content')
<div class="container">
    <div class="box-slider">
        <div class="flexslider">
            <ul class="slides">
                <li> <img alt="" src="{{ url('images/slide1.jpg') }}"></li>
                <li> <img alt="" src="{{ url('images/slide2.jpg') }}"></li>
                <li> <img alt="" src="{{ url('images/slide3.jpg') }}"></li>
                <li> <img alt="" src="{{ url('images/slide4.jpg') }}"></li>
                <li> <img alt="" src="{{ url('images/slide5.jpg') }}"></li>
            </ul>
        </div>
    </div>
    <div class="intro">
        <h1>BINE AȚI VENIT LA ”LUXURY BUILDING”</h1>
        <p>
            We can make complete villa renovations or small improvements.
            We have a vast experience in the building industry and take pride in our work.
            We cover the Costa Blanca area from Alicante to Murcia.
            Examples of the work we carry out are : villas, swimming pools, balustrades, gardens, tiling, electrics,
            plumbing, metal work, door grills and gates, aluminium work, glazing, shower doors, sun boiler,
            air conditioning, alarms,...etc.
            Our excellent reputation and long list of satisfied clients attest to our superior
            craftsmanship, attention to detail, clear communication, honesty and integrity.
            Just ask for our client reference list.
        </p>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.flexslider').flexslider({
                animation: "fade",
                slideshow: true,
                slideshowSpeed: 7000,
                animationDuration: 600,
                prevText: "",
                nextText: "",
                controlNav: false
            })
        });
    </script>
@endsection