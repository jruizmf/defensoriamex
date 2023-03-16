@extends('layouts.app')

@section('content')


<div class="wrapper">

<div class="row ">
    @include('partials.sidebar')
        <!-- We'll fill this with dummy content -->
        <div class="container">
            <div class="row justify-content-center py-5">
                <div class="col-md-11">
                    <div class="d-flex flex-row-reverse">
                        <form action="home">
                            <div class="row">
                                <div class="col-md-4 col-offset-3">
                                    <input type="text" value="{{$filter}}"class="form-control" name="filtro" id="filter" placeholder="Filtrar registros">
                                </div>
                                <div class="col-md-4 col-offset-3">    
                                    <select class="form-control" name="tipo" id="type">
                                        <option value="1" {{ ($type == 1 ? "selected":"") }}>Corresponsal</option>
                                        <option value="2" {{ ($type == 2 ? "selected":"") }}>Cotizaciones</option>
                                        <option value="3" {{ ($type == 3 ? "selected":"") }}>Juicio</option>
                                    </select>
                                </div>
                                <div class="col-md-4 col-offset-3">
                                    <button class="btn btn-success">Filtrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-11">

                @if($type == '1')         
                    @include('correspondent.partials.table')
                @elseif($type == '2')         
                    @include('quotes.partials.table')       
                @elseif($type == '3')         
                    @include('judgment.partials.table')
                @else
                    <td>{{ $user->status }}</td>        
              
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('Aqui podemos poner algo o no se si vayamos a ver una seccion en especifico') }}
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

</div>       
<script>
    var select = document.getElementById('type');
    select.addEventListener('change', function(){
        this.form.submit();
    }, false);
    var input = document.getElementById('name');
    input.addEventListener('change', function(){
        this.form.submit();
    }, false);
</script>
@endsection
