@extends('layouts/app')

@section('content')
    <div class="container">
        <h1>CONTACT US</h1>
        <div class="row">
            <div class="col-sm-6">
                <h3 class="brand-color">LUXURY BUILDING</h3>
                <p>
                    BUILDING COSTA BLANCA | ALICANTE | MURCIA | ELCHE | TORREVIEJA
                </p>
                <p>MOBILE: 671-251-856, 622-133-300</p>
                <p>E-MAIL: info@buildingcostablanca.com</p>
            </div>
            <a title="Click to view on Google Maps" target="_blank" href="https://www.google.com/maps/place/%D0%A2%D0%BE%D1%80%D1%80%D0%B5%D0%B2%D1%8C%D0%B5%D1%85%D0%B0,+%D0%90%D0%BB%D0%B8%D0%BA%D0%B0%D0%BD%D1%82%D0%B5,+%D0%98%D1%81%D0%BF%D0%B0%D0%BD%D0%B8%D1%8F/@37.9947244,-0.7746548,12z/data=!3m1!4b1!4m5!3m4!1s0xd630757a8945797:0x6e8ae3f6ad2c3bf5!8m2!3d37.9975875!4d-0.6962853">
                <img src="{{ url('images/map.png') }}" alt="Map Location" class="col-sm-6">
            </a>
        </div>

        <div class="row contact-form">
            <h3 class="col-sm-12">CONTACT FORM</h3>
            <form class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name">

                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" name="phone" id="phone">

                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="col-sm-6">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control" id="message"></textarea>
                    </div>
                </div>
                <div class="row buttons">
                    <div class="col-sm-12 text-center">
                        <input type="button" class="btn btn-default" value="RESET">
                        <input type="button" class="btn btn-default" value="SEND">
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection