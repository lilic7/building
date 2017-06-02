@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/sbt" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <h2 class="text-center">Category of buildings</h2>
                <div class="row">

                    @foreach($categories as $category)
                        <div class="col-sm-4">
                            <label for="{{ $category->category }}">{{ ucfirst($category->category) }}</label>

                            <select name="{{ $category->category }}" class="form-control" id="{{ $category->category }}">
                                <option value="-1">--Select from {{ $category->category }} category--</option>

                                @foreach($category->buildings as $building)
                                    <option value="{{ $building->id }}"
                                            {{ isset($building_id) && $building_id == $building->id ? "selected" : "" }}>
                                            {{ $building->type }}
                                    </option>
                                @endforeach

                            </select>

                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <input type="submit" class="btn btn-default" value="Submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection


@section('scripts')
    <script type="text/javascript" src="{{ asset('js/unselect.js') }}" ></script>
@endsection