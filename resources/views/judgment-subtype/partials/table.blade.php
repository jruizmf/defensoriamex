<h2 class="section-title">Listado de Formatos</h2>

<table class="table table-bordered" id="MyTable">
  <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Tipo de Juicio</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">Descripción</th>
        <th class="text-center">Creado</th>
        <th class="text-center">Modificado</th>
        <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($list as $judmentSubType)
        <tr>
            <td class="text-center">{{ $judmentSubType->id }}</td>
            <td class="text-center">{{ $judmentSubType->type_name }}</td>
            <td class="text-center">{{ $judmentSubType->name }}</td>
            <td class="text-center">{{ $judmentSubType->description }}</td>
            <td class="text-center">{{ $judmentSubType->created_at }}</td>
            <td class="text-center">{{ $judmentSubType->updated_at }}</td>
    
            <td class="text-center">
            <button onclick="$('#demoModal').modal('show')" type="button" class="btn btn-secondary btn-xs"  data-toggle="tooltip" data-toggle="modal" data-target="#demoModal" data-placement="top" title="Imprimir Cotización">
                        <img src="{{asset('public/img/icons/print-icon.svg')}}" width="16" heigth="21" alt="Print">
                    </button>
                <a href="{{ url('/juicios-subtipo/editar/'.$judmentSubType->id.'') }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Modificar Cotización" >
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"><img src="{{asset('public/img/icons/edit-icon.svg')}}" width="14" heigth="14" alt="Edit"></span>
                </a>
                <form method="POST" action="{{ route('judgment-subtype/destroy', [ 'id'=> $judmentSubType->id ]) }}">
                {{Form::hidden('_method','DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar Cotización" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"><img src="{{asset('public/img/icons/trash.svg')}}" width="14" heigth="14" alt="Delete"></span>
                </button>
                {!! Form::close() !!}
                  <!-- Modal Example Start-->
            <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="demoModalLabel">Variables</h5>
								<button type="button" class="close" data-dismiss="modal" aria- 
                                label="Close" onclick=" $('#demoModal').modal('hide')">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>
                     
						<div class="modal-body">
                       
                            {{ $judmentSubType->data }}
						</div>
						<div class="modal-footer">
							<button onclick=" $('#demoModal').modal('hide')" type="button" class="btn btn-secondary" data- 
                            dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary">Guardar 
                                </button>
						</div>

					</div>
				</div>
			</div>
            </td>
          

        </tr>
    @endforeach
  </tbody>

</table>
