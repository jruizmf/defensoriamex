<h1 class="section-title">Listado de Plantillas</h1>

<table class="table table-bordered" id="MyTable">
  <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Descripcion</th>
        <th class="text-center">url</th>
        <th class="text-center">Formato</th>
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
            <td class="text-center">{{ $item->url }}</td>
            <td class="text-center">{{ $item->template_name }}</td>
            <td class="text-center">{{ $item->created_at }}</td>
            <td class="text-center">{{ $item->updated_at }}</td>
       
            <td class="text-center">
           
                <!-- <button type="submit" class="btn btn-danger btn-xs">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true">R</span>
                </button>
                <a href="{{ url('/plantillas/editar/'.$item->id.'') }}" class="btn btn-info btn-xs">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true">E</span>
                </a> -->
                <a href="{{ url('/plantillas/editar/'.$item->id.'') }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Modificar Plantilla" >
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"><img src="{{asset('public/img/icons/edit-icon.svg')}}" width="14" heigth="14" alt="Logo"></span>
                </a>
                <form method="POST" action="{{ route('template/destroy', [ 'id'=> $item->id ]) }}">
                {{Form::hidden('_method','DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar Plantilla" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"><img src="{{asset('public/img/icons/trash.svg')}}" width="14" heigth="14" alt="Logo"></span>
                </button>
                {!! Form::close() !!}
            </td>

        </tr>
    @endforeach
  </tbody>
  <!-- <tfoot>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Sabor</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Acciones</th>
    </tr>
  </tfoot> -->
</table>