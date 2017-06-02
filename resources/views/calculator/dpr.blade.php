@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/dpr" method="post">
        {{ csrf_field() }}
        <h2 class="text-center">Types of work</h2>
        @foreach($categories as $category)
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="{{ $category->short_name }}">{{ ucfirst($category->category) }}</label>
                        </div>
                        <div class="col-sm-8">
                            <select name="{{ $category->short_name }}" class="form-control" id="{{ $category->short_name }}">
                                <option value="0">--- Select ---</option>
                                @foreach($category->works as $work)
                                    <option value="{{ $work->id }}" {{ isset($works) && in_array($work->id, $works) ? 'selected' : '' }}>{{ $work->class ? "Class ".$work->class." - " : "" }}{{$work->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row form-group">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="form-group">
                    <div class="col-sm-3">
                        <label for="windows">Windows</label>
                        <input type="number" id='windows' name="windows_number" min=0 class="form-control" value="{{ isset($project) ? $project['windows'] : 0}}">
                    </div>
                    <div class="col-sm-3">
                        <label for="doors">Doors</label>
                        <input type="number" id='doors' name="doors_number" min=0 class="form-control" value="{{ isset($project) ? $project['doors'] : 0 }}">
                    </div>
                    <div class="col-sm-3">
                        <label for="color">Color</label>
                        <select name="color" id="color" class="form-control">
                            @foreach($colors as $color)
                                <option value="{{ $color->id }}" {{ isset($project) && $project['color_id'] == $color->id ? 'selected' : '' }}>{{ $color->color }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="material">Material</label>
                        <select name="material" id="material" class="form-control">
                            @foreach($materials as $material)
                                <option value="{{ $material->id }}" {{ isset($project) && $project['material_id'] == $material->id ? 'selected' : '' }}>{{ $material->material }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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