<h2 class="section-title">Tipos de Ocurso</h2>

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
    @foreach($list as $item)
        <tr>
            <td class="text-center">{{ $item->id }}</td>
            <td class="text-center">{{ $item->name }}</td>
            <td class="text-center">{{ $item->description }}</td>
            <td class="text-center">{{ $item->created_at }}</td>
            <td class="text-center">{{ $item->updated_at }}</td>
    
            <td class="text-center">
            <a href="{{ url('/ocursos/'.$item->id.'') }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Mostrar Ocursos" >
                    <img src="{{asset('public/img/icons/print-icon.svg')}}" width="16" heigth="21" alt="Print">
                </a>
                <a href="{{ url('/ocursos-clasificacion/editar/'.$item->id.'') }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Modificar Tipo de Ocurso" >
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"><img src="{{asset('public/img/icons/edit-icon.svg')}}" width="14" heigth="14" alt="Edit"></span>
                </a>
                <form method="POST" action="{{ route('event-clasification/destroy', [ 'id'=> $item->id ]) }}">
                {{Form::hidden('_method','DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar Tipo de Ocurso" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"><img src="{{asset('public/img/icons/trash.svg')}}" width="14" heigth="14" alt="Delete"></span>
                </button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
  </tbody>

</table>
