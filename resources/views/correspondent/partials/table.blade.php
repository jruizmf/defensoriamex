<h2 class="section-title">Listado de Corresponsales</h2>

<table class="table table-bordered" id="MyTable">
  <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">ID Interno</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Asunto</th>
        <th class="text-center">Cedula</th>
        <th class="text-center">Telefono</th>
        <th class="text-center">Email</th>
        <th class="text-center">Ciudad</th>
        <th class="text-center">Estado</th>
        <th class="text-center">Estatus</th>
        <!-- <th class="text-center">Creado</th>
        <th class="text-center">Modificado</th> -->
        <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($list as $correspondent)
        <tr>
            <td class="text-center">{{ $correspondent->id }}</td>
            <td class="text-center">{{ $correspondent->correspondent_id }}</td>
            <td class="text-center">{{ $correspondent->name }}</td>
            <td class="text-center">{{ $correspondent->deal }}</td>
            <td class="text-center">{{ $correspondent->license }}</td>
            <td class="text-center">{{ $correspondent->telephone }}</td>
            <td class="text-center">{{ $correspondent->email }}</td>
            <td class="text-center">{{ $correspondent->city }}</td>
            <td class="text-center">{{ $correspondent->state }}</td>
            <td class="text-center">{{ $correspondent->status == 1 ? 'Activo' : 'Inactivo' }}</td>
            <!-- <td class="text-center">{{ $correspondent->created_at }}</td>
            <td class="text-center">{{ $correspondent->updated_at }}</td> -->
       
        <td class="text-center">
                <a href="{{ url('/corresponsales/editar/'.$correspondent->id.'') }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Modificar corresponsal" >
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"><img src="{{asset('public/img/icons/edit-icon.svg')}}" width="14" heigth="14" alt="Logo"></span>
                </a>
                <form method="POST" action="{{ route('correspondent/destroy', [ 'id'=> $correspondent->id ]) }}">
                {{Form::hidden('_method','DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar corresponsal" >
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
  