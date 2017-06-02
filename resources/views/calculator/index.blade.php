@extends('layouts.app')

@section('content')
    @if(session('message'))
    <div class="container">
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    </div>
    @endif
    <div class="container project_select">
        <div class="row">
            <div class="col-sm-6">
                <div class="col-sm-12">
                    <div class="project_head location">
                        <p>
                            <a href="/ilc">
                                1. Input location & currency
                            </a>
                        </p>
                        <div>
                            To localize your construction project,
                            simply select your location and currency
                            within the project tool.
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="project_head building_type">
                        <p>
                            <a href="/sbt">
                                2. Select building type
                            </a>
                        </p>
                        <div>
                            CBA provides up-to-date cost data and indices for a wide range of building types and industries.
                            This allows you to select exactly which type of building you plan to build.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="col-sm-12">
                    <div class="project_head project_parameters">
                        <p>
                            <a href="/dpr">
                                3. Define project parameters
                            </a>
                        </p>
                        <div>
                            Each construction project has a unique set of parameters, such as the level of quality or the
                            total area. These can be defined easily in our CBA.
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="project_head calculate">
                        <p>
                            <a href="/cpc">
                                4. Calculate project cost
                            </a>
                        </p>
                        <div>
                            Each construction project has a unique set of parameters, such as the level of quality or the
                            total area. These can be defined easily in our CBA.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection