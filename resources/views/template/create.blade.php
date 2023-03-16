@extends('layouts.app')

@section('content')
<div class="wrapper">

    <div class="row ">
        @include('partials.sidebar')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4 class="text-center">Agregar Plantilla:</h4>
                    {!! Form::open([ 'route' => 'template/store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @include('template.partials.fields')
                        <button type="submit" class="btn btn-success btn-block">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection