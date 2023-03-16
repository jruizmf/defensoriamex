@extends('layouts.app')

@section('content') 
<div class="wrapper">

    <div class="row ">
        @include('partials.sidebar')
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-md-11">
                    <div class="container">
                    <a class="btn btn-success pull-right" href="{{ url('/plantillas/agregar') }}" role="button">Nueva Plantilla</a>
                    @include('template.partials.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection