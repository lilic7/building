@extends('layouts.app')

@section('content')
    <div class="container">
        <form class="form-horizontal" action="/ilc" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3">
                    <label for="country">Select country</label>
                    <select class="form-control" name="country" id="country">
                        @foreach($countries as $country)
                            @if($selections)
                                <option value="{{ $country->id }}" {{ $country->id === $selections['country_id'] ? 'selected' : '' }}>{{ $country->name }}</option>
                            @else
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-3">
                    <label for="currency">Select currency</label>
                    <select class="form-control" name="currency" id="currency">
                        @foreach($currencies as $currency)
                            @if($selections)
                                <option value="{{ $currency->id }}" {{ $currency->id === $selections['currency_id'] ? 'selected' : '' }}>{{ $currency->name }}</option>
                            @else
                                <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 text-center">
                    <input type="submit" value="Submit" class="btn btn-default">

                </div>
            </div>
        </form>
    </div>
@endsection