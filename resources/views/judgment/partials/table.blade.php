<h2 class="section-title">Listado de Juicios</h2>

<table class="table table-bordered" id="MyTable">
  <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">ID Interno</th>
        <th class="text-center">Actores</th>
        <th class="text-center">Demandado</th>
        <th class="text-center">Asunto</th>
        <th class="text-center">Abogado</th>
        <th class="text-center">Cedula</th>
        <th class="text-center">Dirección</th>
        <th class="text-center">Ciudad</th>
        <th class="text-center">Estado</th>
        <th class="text-center">Corresponsal</th>
        
        <th class="text-center">Creado</th>
        <th class="text-center">Modificado</th>
        <th class="text-center">Acciones</th>
        <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($list as $diligence)
        <tr>
            <td class="text-center">{{ $diligence->id }}</td>
            <td class="text-center">{{ $diligence->intern_id }}</td>
            <td class="text-center">{{ $diligence->applicant1 }} - {{ $diligence->applicant2 }}</td>
            <td class="text-center">{{ $diligence->defendant }}</td>
            <td class="text-center">{{ $diligence->deal }}</td>
            <td class="text-center">{{ $diligence->lawyer }}</td>
            <td class="text-center">{{ $diligence->license }}</td>
            <td class="text-center">{{ $diligence->address }}</td>
            <td class="text-center">{{ $diligence->city }}</td>
            <td class="text-center">{{ $diligence->state_name }}</td>
            <td class="text-center">{{ $diligence->correspondent_name }}</td>

            <td class="text-center">{{ $diligence->created_at }}</td>
            <td class="text-center">{{ $diligence->updated_at }}</td>
    
            <td class="text-center">
            <button onclick="abrir({{ $diligence->id }})" type="button" class="btn btn-secondary btn-xs"  data-toggle="tooltip" data-toggle="modal" data-target="#print-modal-{{ $diligence->id }}" data-placement="top" title="Imprimir Juicio">
                        <img src="{{asset('public/img/icons/print-icon.svg')}}" width="16" heigth="21" alt="Print">
                    </button>
                <a href="{{ url('/juicios/editar/'.$diligence->id.'') }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Modificar Juicio" >
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"><img src="{{asset('public/img/icons/edit-icon.svg')}}" width="14" heigth="14" alt="Edit"></span>
                </a>
                <form method="POST" action="{{ route('judgment/destroy', [ 'id'=> $diligence->id ]) }}">
                {{Form::hidden('_method','DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar Juicio" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"><img src="{{asset('public/img/icons/trash.svg')}}" width="14" heigth="14" alt="Delete"></span>
                </button>
                {!! Form::close() !!}
            </td>
            <!-- Modal Example Start-->
            <td>
            <div class="modal fade" id="print-modal-{{ $diligence->id }}" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
            
                <div class="modal-dialog" role="document">
                    <form id="form{{$diligence->id}}" action="{{ url('print/generate') }}" method="POST">
                        
					    <div class="modal-content">
						    <div class="modal-header">
							    <h5 class="modal-title" id="demoModalLabel">Imprimir Registro</h5>
								<button type="button" class="close" data-dismiss="modal" aria- 
                                label="Close" onclick="cerrar({{ $diligence->id }})">
									<span aria-hidden="true">&times;</span>
								</button>
						    </div>
                      
						    <div id="body-content  " class="modal-body">
                                <button id="templateText{{$diligence->id}}" onclick="displayTemplates({{$diligence->id}})"  type="button" style="font-size: 18px; border: 1px solid transparent; background-color:transparent">
                                    Haga click para mostrar plantillas
                                </button>
                                <div id="template{{$diligence->id}}" class="form-group">
                                    <?php echo Form::label('template', 'Plantilla', ['for' => 'template'] ); ?>
                                    <input type="hidden" name="type" value="judgment">
                                    <input type="hidden" name="id" value="{{$diligence->id }}">
                                    <select id="template" name="template" class="form-control">
                                        <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($template->id); ?>"><?php echo e($template->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <input type="hidden" name="redirect" value="corresponsales">
                                </div>
                                <button id="eventText{{$diligence->id}}" onclick="displayEvents({{$diligence->id}})"  type="button" style="font-size: 18px; border: 1px solid transparent; background-color:transparent">
                                    Haga click para mostrar Ocursos
                                </button>
                                <div id="events{{$diligence->id}}" class="form-group">
                                    <?php echo Form::label('event', 'Ocursos', ['for' => 'event'] ); ?>
                                    <select id="event" name="event" class="form-control">
                                        <option value="" selected>Seleccionar</option>
                                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($template->id); ?>"><?php echo e($template->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div id="variables-content">

                                </div>
						    </div>
                            <div class="modal-footer">
                                <button onclick="cerrar({{ $diligence->id }})" type="button" class="btn btn-secondary" data- 
                                dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary" >Imprimir </button>
                            </div>
	    				</div>
                        @csrf
                        @method('POST')
                    </form>
				</div>
			</div>
            </td>
        </tr>
    @endforeach
  </tbody>

</table>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
    function abrir(id){
        $('#print-modal-'+id).modal('show')
    }
    function cerrar(id){
        $('#print-modal-'+id).modal('hide')
        $("#events").hide();
        
        $('#variables-content').empty();
        $("#variables-content").hide();
    }
    function displayTemplates(id) {
        $("#template"+id).show();
            $("#events"+id).hide();
            $("#variables-content").hide();
            $("#events"+id).val("");
            $("#eventText"+id).show();
            $("#templateText"+id).hide();
        }
        function displayEvents(id) {
            
            $("#template"+id).hide();
            $("#events"+id).show();
            $("#template"+id).val("");
            $("#eventText"+id).hide();
            $("#templateText"+id).show();
        }
    
    $(document).ready(function() {
     
    //set initial state.
    @foreach($list as $item)
        $("#template"+{{$item->id}}).show();
            $("#events"+{{$item->id}}).hide();
            $("#eventText"+{{$item->id}}).show();
            $("#templateText"+{{$item->id}}).hide();
    @endforeach
      
        jQuery('#event').change(function(e){
           e.preventDefault();
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN':"{{ csrf_token() }}"
                }
            });
            $.ajax({
                  url: "/event/"+e.target.value,
                  method: 'get',
                  data:{
                },
                success: function(result){

                    //alert(response); // show [object, Object]
                  
                    $('#variables-content').empty();
                    var $div = $('#variables-content');
                    if(typeof result.data.data != 'undefined'){
                        $.each(JSON.parse(result.data.data),function(key, value)
                        {
                            console.log(value)
                            $div.append('<div class="form-group"><label for="">' + value.name + ' - ' + value.description + '</label><input id="'+ value.name +'"  name="'+ value.name +'" class="form-control" value=""/></div>'); // return empty
                        });
                        
                    }
                 },error: function(result){
                   console.log(result);
                }
                
            });
        });
        jQuery('#judgment_type').change(function(e){
                   
            e.preventDefault();
            loadSubtypes(e.target.value);
       });
    });
        


 </script>