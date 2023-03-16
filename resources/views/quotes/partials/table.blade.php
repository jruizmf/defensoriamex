<h2 class="section-title">Listado de Cotizaciones</h2>

<table class="table table-bordered" id="MyTable">
  <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nombre Cliente</th>
        <th class="text-center">Asunto</th>
        <th class="text-center">Ciudad</th>
        <th class="text-center">Estado</th>
        <th class="text-center">Distrito</th>
        <th class="text-center">Juicio</th>
        <th class="text-center">Materia</th>
        <th class="text-center">Costo</th>
        <!-- <th class="text-center">Creado</th>
        <th class="text-center">Modificado</th> -->
        <th class="text-center">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach($list as $quote)
        <tr>
            <td class="text-center">{{ $quote->id }}</td>
            <td class="text-center">{{ $quote->name }}</td>
            <td class="text-center">{{ $quote->deal }}</td>
            <td class="text-center">{{ $quote->city }}</td>
            <td class="text-center">{{ $quote->state }}</td>
            <td class="text-center">{{ $quote->district }}</td>
            <td class="text-center">{{ $quote->judgment }}</td>
            <td class="text-center">{{ $quote->matter }}</td>
            <td class="text-center">{{ $quote->amount }}</td>
            <!-- <td class="text-center">{{ $quote->created_at }}</td>
            <td class="text-center">{{ $quote->updated_at }}</td> -->
            <td class="text-center">
            <button onclick="abrir()" type="button" class="btn btn-secondary btn-xs"  data-toggle="tooltip" data-toggle="modal" data-target="#demoModal" data-placement="top" title="Imprimir Cotización">
                        <img src="{{asset('public/img/icons/print-icon.svg')}}" width="16" heigth="21" alt="Print">
                    </button>
                <a href="{{ url('/cotizaciones/editar/'.$quote->id.'') }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Modificar Juicio" >
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"><img src="{{asset('public/img/icons/edit-icon.svg')}}" width="14" heigth="14" alt="Edit"></span>
                </a>
                <form method="POST" action="{{ route('quotes/destroy', [ 'id'=> $quote->id ]) }}">
                {{Form::hidden('_method','DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar Juicio" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"><img src="{{asset('public/img/icons/trash.svg')}}" width="14" heigth="14" alt="Delete"></span>
                </button>
                {!! Form::close() !!}
                 <!-- Modal Example Start-->
            <div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria- 
            labelledby="demoModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="demoModalLabel">Imprimir Registro</h5>
							<button type="button" class="close" data-dismiss="modal" onclick="cerrar()" aria- 
                            label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
                        <?php echo Form::open([ 'route' => 'print/generate', 'method' => 'POST']); ?>

						<div class="modal-body">
                       
                            <div class="form-group">
                                <input type="hidden" name="type" value="quote">
                                <input type="hidden" name="id" value="{{$quote->id }}">
                                <?php echo Form::label('template', 'Plantilla', ['for' => 'template'] ); ?>

                                <select name="template" class="form-control">
                                     <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($template->id); ?>"><?php echo e($template->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden" name="redirect" value="corresponsales">
                            </div>
						</div>
						<div class="modal-footer">
							<button onclick="cerrar()" type="button" class="btn btn-secondary" data- 
                            dismiss="modal">Cerrar</button>
								<button type="submit" class="btn btn-primary">Guardar 
                                </button>
						</div>
                        <?php echo Form::close(); ?>

					</div>
				</div>
			</div>
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

 <script>
    function abrir(){
        $('#demoModal').modal('show')
    }
    function cerrar(){
        $('#demoModal').modal('hide')
    }
    


 </script>