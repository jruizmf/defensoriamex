@extends('layouts.app')

@section('content')
<div class="wrapper">

    <div class="row ">
        @include('partials.sidebar')
        <div class="container">
            <div class="row justify-content-center py-5 px-5">
                <div class="col-md-10">
                    <h2 class="section-title">Agregar Usuario:</h2>
                    {!! Form::open([ 'route' => 'user/store', 'method' => 'POST']) !!}
                        @include('user.partials.fields')
                        <button type="submit" class="btn btn-success btn-block">Guardar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>        
@endsection