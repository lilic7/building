@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center brand-color">
                AT "LUXURY BUILDING", WE ARE FOCUSED ON PROVIDING HIGH-QUALITY SERVICES WITH THE HIGHEST LEVELS OF CUSTOMER SATISFACTION & WE WILL DO EVERYTHING WE CAN TO MEET YOUR EXPECTATIONS. WITH A VARIETY OF OFFERINGS TO CHOOSE FROM, WE'RE SURE YOU'LL BE HAPPY WORKING WITH US. LOOK AROUND OUR WEBSITE AND IF YOU HAVE ANY COMMENTS OR QUESTIONS, PLEASE FEEL FREE TO CONTACT US. WE HOPE TO SEE YOU AGAIN!

                <h5 class="bold-text">THERE'S MUCH MORE TO COME!</h5>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
                <div class="gallery-item">
                    <img src="{{ asset('images/glazing-3.png') }}" alt="Outside view">
                    <p>OUTSIDE VIEW(GLAZING GLASS CURTAINS)</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="gallery-item">
                    <img src="{{ asset('images/general-2.png') }}" alt="Glazing (view inside)">
                    <p>GLAZING (VIEW INSIDE)</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="gallery-item">
                    <img src="{{ asset('images/general-3.png') }}" alt="Finished garage">
                    <p>FINISHED GARAGE</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="gallery-item">
                    <img src="{{ asset('images/general-4.png') }}" alt="Stone fence & natural grass">
                    <p>STONE FENCE & NATURAL GRASS</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="gallery-item">
                    <img src="{{ asset('images/general-5.png') }}" alt="Before of garage construction">
                    <p>BEFORE OF GARAGE CONSTRUCTION</p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="gallery-item">
                    <img src="{{ asset('images/general-6.png') }}" alt="Vestibule">
                    <p>VESTIBULE</p>
                </div>
            </div>
        </div>
    </div>
@endsection