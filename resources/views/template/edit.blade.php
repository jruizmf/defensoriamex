@extends('layouts.app')
{!! method_field('PATCH') !!}
@section('content')
<div class="wrapper">

    <div class="row ">
        @include('partials.sidebar')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h4 class="text-center">Editar Plantilla: {{ $item->name  }}</h4>
                    {!! Form::model($item, [ 'route' => ['template/update', $item->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                        @include('template.partials.fields')
                        <button type="submit" class="btn btn-success btn-block">Guardar cambios</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection