@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h1 class="text-center">Project costs</h1>
                <p class="text-center"><a href="/delete">Delete project</a></p>
            </div>
        </div>

        <div class="clc-table">
            <div class="row">
                <div class="col-sm-12">

                    <div class="row title-row">
                        <div class="col-sm-3 clc-tab">
                            Category of construction
                        </div>
                        <div class="col-sm-7 clc-tab center">
                            Type
                        </div>
                        <div class="col-sm-2 clc-tab">
                            Price
                        </div>
                    </div>

                    <div class="row odd-row">
                        <div class="col-sm-3 clc-tab with-padding">
                            {{ ucfirst($buildingCategory) }}
                        </div>
                        <div class="col-sm-7 clc-tab center">
                            {{ $buildingType }}
                        </div>
                        <div class="col-sm-2 clc-tab text-center">
                            {{ $buildingPrice }}  {{ $currency['name'] }}
                        </div>
                    </div>
                </div>
            </div>

            @if($project['with_works'])
                <div class="row title-row bordered-top-row">
                    <div class="col-sm-3 clc-tab">
                        Work on
                    </div>
                    <div class="col-sm-7 clc-tab center">
                        Class
                    </div>
                    <div class="col-sm-2 clc-tab">
                    </div>
                </div>
                @foreach($works as $work)
                <div class="row {{ $loop->iteration % 2 == 1 ? "odd-row" : "1" }}">
                    <div class="col-sm-3 clc-tab with-padding ">
                        <span>{{  $work->category->category }}</span>
                    </div>
                    <div class="col-sm-7 clc-tab center">
                        <span>
                            @if($work->class)
                                <strong>Class {{ $work->class }}</strong> -
                            @endif
                            {{ $work->title }}
                        </span>
                    </div>
                    <div class="col-sm-2 clc-tab text-center">
                        <span>{{ $work->price * $ratio}}  {{ $currency->name }}</span>
                    </div>
                </div>
                @endforeach

                @if ($project['windows'] || $project['doors'])
                <div class="row  bordered-top-row double-height">
                    <div class="col-sm-3 clc-tab   with-padding">
                        @if ($project['windows'])
                        <div class="row">
                            <div class="col-sm-4">
                                <strong>Windows:</strong>
                            </div>
                            <div class="col-sm-8">
                                {{ $project['windows'] }}*{{ $windowPrice . " ". $currency['name'] }}
                            </div>
                        </div>
                        @endif
                        @if ($project['doors'])
                        <div class="row">
                            <div class="col-sm-4">
                                <strong> Doors: </strong>
                            </div>
                            <div class="col-sm-8">
                                {{ $project['doors'] }}*{{ $doorPrice . " " . $currency['name'] }}
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-7 clc-tab center">
                        <div class="row text-center {{ $project['windows'] && $project['doors'] ? "double-height" : "" }} ">
                            <div class="col-sm-6">
                                <strong>Color: </strong> {{ $color }} ({{ $colorPrice }}  {{ $currency['name'] }})
                            </div>
                            <div class="col-sm-6">
                                <strong>Material: </strong> {{ $material }} ({{ $materialPrice }} {{ $currency['name'] }})
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2 clc-tab text-center">
                        @if ($project['windows'])
                        <div class="row">
                            <div class="col-sm-12">
                                {{ ($windowPrice + $colorPrice + $materialPrice)  * $project['windows'] }}  {{ $currency['name'] }}
                            </div>
                        </div>
                        @endif
                        @if ($project['doors'])
                        <div class="row">
                            <div class="col-sm-12">
                                {{ ($doorPrice + $colorPrice + $materialPrice) * $project['doors'] }}  {{ $currency['name'] }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            @endif
        </div>

        <h1 class="text-center">TOTAL: <span class="brand-color">{{ $total }} {{ $currency->name }}</span></h1>
    </div>

@endsection