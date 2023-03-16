<h2 class="section-title">Listado de Juicios</h2>

<table class="table table-bordered" id="MyTable">
  <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Descripción</th>
        <th class="text-center">Creado</th>
        <th class="text-center">Modificado</th>
        <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($list as $judmentType)
        <tr>
            <td class="text-center">{{ $judmentType->id }}</td>
            <td class="text-center">{{ $judmentType->name }}</td>
            <td class="text-center">{{ $judmentType->description }}</td>
            <td class="text-center">{{ $judmentType->created_at }}</td>
            <td class="text-center">{{ $judmentType->updated_at }}</td>
    
            <td class="text-center">
            <a href="{{ url('/juicios-subtipo/'.$judmentType->id.'') }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Mostrar Sub Tipo de Juicio" >
                    <img src="{{asset('public/img/icons/print-icon.svg')}}" width="16" heigth="21" alt="Print">
                </a>
                <a href="{{ url('/juicios-tipo/editar/'.$judmentType->id.'') }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Modificar Tipo de Juicio" >
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"><img src="{{asset('public/img/icons/edit-icon.svg')}}" width="14" heigth="14" alt="Edit"></span>
                </a>
                <form method="POST" action="{{ route('judgment-type/destroy', [ 'id'=> $judmentType->id ]) }}">
                {{Form::hidden('_method','DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar Cotización" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"><img src="{{asset('public/img/icons/trash.svg')}}" width="14" heigth="14" alt="Delete"></span>
                </button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
  </tbody>

</table>
