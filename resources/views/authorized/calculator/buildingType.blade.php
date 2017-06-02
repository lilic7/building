@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="col-sm-12">
                Building type
            </h1>
            <div class="col-sm-12">
                <form>
                    <p>Residential</p>
                    <input type="radio" name="residential" id="residential_1" value="1"> <label for="residential_1"> Estate house, 3 floors</label>
                    <br>
                    <input type="radio" name="residential" id="residential_2" value="2"> <label for="residential_2"> Detached (2-3 bedrooms)</label>
                    <br>
                    <input type="radio" name="residential" id="residential_3" value="3"> <label for="residential_3">Terraced house</label>
                    <br>
                    <input type="radio" name="residential" id="residential_4" value="4"> <label for="residential_4"> Estate house, 3 floors</label>
                </form>
            </div>
        </div>
    </div>
@endsection