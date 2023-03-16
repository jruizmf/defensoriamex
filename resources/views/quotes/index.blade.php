@extends('layouts.app')

@section('content') 
<div class="wrapper">

    <div class="row ">
        @include('partials.sidebar')
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-md-12">
                    <div class="container">
                    <div class="d-flex flex-row-reverse">
                        <a class="btn plus-button" href="{{ url('/cotizaciones/agregar') }}" data-toggle="tooltip" data-placement="top" title="Agregar Cotización" role="button"><img src="{{asset('public/img/icons/plus-icon.svg')}}" width="20" heigth="20" alt="Plus"></a>
                        </div>
                        @include('quotes.partials.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection