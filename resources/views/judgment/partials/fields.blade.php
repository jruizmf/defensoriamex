<div class="form-group">
    {!! Form::label('status', 'Tipo de Juicio', ['for' => 'judgment_type'] ) !!}
      
        <select name="judgment_type" id="judgment_type"  class="form-control" >
            <option value="" selected>Favor de seleccionar</option>
           
        <?php $__currentLoopData = $judgment_types; $__env->addLoop($__currentLoopData); 
            foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="{{$type->id}}"  {{ isset($item) && $item->judgment_type == $type->id ? 'selected' : ''}}><?php echo e($type->name); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>
        <input type="hidden" name="id" id="id" value="{{isset($item) && $item->id ? $item->id : ''}}">
        <input type="hidden" name="judgment_type_" id="judgment_type_" value="{{isset($item) && $item->judgment_type ? $item->judgment_type : ''}}">
        <input type="hidden" name="status" id="status" value="{{isset($item) && $item->status ? $item->status : '1'}}">
</div>
<div id="div-subtype" class="form-group">
    {!! Form::label('status', 'Tipo de formato', ['for' => 'judgment_type'] ) !!}
    <select name="v" id="judgment_subtype"  class="form-control" >
        <option value="">Favor de seleccionar</option>
    </select>
    <input type="hidden" name="judgment_subtype_" id="judgment_subtype_" value="{{isset($item) && $item->judgment_subtype ? $item->judgment_subtype : ''}}">
</div>
<div class="form-group">
    {!! Form::label('intern_id', 'Control Interno', ['for' => 'intern_id'] ) !!}
    {!! Form::text('intern_id', null , ['class' => 'form-control', 'id' => 'intern_id', 'placeholder' => 'Escribe la clave de control interno...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('applicant1', 'Actor', ['for' => 'applicant1'] ) !!}
    {!! Form::text('applicant1', null , ['class' => 'form-control', 'id' => 'applicant1', 'placeholder' => 'Escribe el nombre del actor...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('expedient', 'Expediente', ['for' => 'applicant1'] ) !!}
    {!! Form::text('expedient', null , ['class' => 'form-control', 'id' => 'expedient', 'placeholder' => 'Escribe el numero de expediente...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('applicant2', 'Actor 2', ['for' => 'applicant2'] ) !!}
    {!! Form::text('applicant2', null , ['class' => 'form-control', 'id' => 'applicant2', 'placeholder' => 'Escribe el nombre del Corresponsal...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('defendant', 'Demandado', ['for' => 'defendant'] ) !!}
    {!! Form::text('defendant', null , ['class' => 'form-control', 'id' => 'defendant', 'placeholder' => 'Escribe el nombre del demandado...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('lawyer', 'Abogado', ['for' => 'lawyer'] ) !!}
    {!! Form::text('lawyer', null , ['class' => 'form-control', 'id' => 'lawyer', 'placeholder' => 'Escribe el nombre del abogado...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('license', 'Cedula Profesional', ['for' => 'license'] ) !!}
    {!! Form::text('license', null , ['class' => 'form-control', 'id' => 'license', 'placeholder' => 'Escribe el Numero de Cedula Profesional...' ]  ) !!}
</div>

<div class="form-group">
    {!! Form::label('address', 'Domicilio', ['for' => 'address'] ) !!}
    {!! Form::text('address', null , ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Escribe el domicilio de la diligencia...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('state', 'Estado', ['for' => 'state'] ) !!}
    {!! Form::text('state', null , ['class' => 'form-control', 'id' => 'state', 'placeholder' => 'Escribe el Estado...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('city', 'Ciudad', ['for' => 'nombre'] ) !!}
    {!! Form::text('city', null , ['class' => 'form-control', 'id' => 'city', 'placeholder' => 'Escribe el nombre de la Ciudad...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('district', 'Distrito Judicial', ['for' => 'district'] ) !!}
    {!! Form::text('district', null , ['class' => 'form-control', 'id' => 'district', 'placeholder' => 'Escribe el Distrito Judicial...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('court', 'Juzgado', ['for' => 'court'] ) !!}
    {!! Form::text('court', null , ['class' => 'form-control', 'id' => 'court', 'placeholder' => 'Escribe la dirección para notificaciones...' ]  ) !!}
</div>

<div class="form-group">
    {!! Form::label('expedient', 'Expediente', ['for' => 'expedient'] ) !!}
    {!! Form::text('expedient', null , ['class' => 'form-control', 'id' => 'expedient', 'placeholder' => 'Escribe el numero de expediente...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('correspondent_id', 'Corresponsal', ['for' => 'correspondent_id'] ) !!}
    <select name="correspondent_id" class="form-control" >
    <?php $__currentLoopData = $correspondents; $__env->addLoop($__currentLoopData); 
        foreach($__currentLoopData as $correspondent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <option value="<?php echo e($correspondent->id); ?>"><?php echo e($correspondent->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </select>
</div>
@if (isset($items))
    @foreach($items  as $key => $item)
    <div id="variables-content">
        <div class="form-group">
            <label for="">{{$item->name}} </label>
            <input id="value[]"  name="value[]" class="form-control" value="{{$item->value}}"/> 
            <input id="title[]"  name="title[]" type="hidden" value="{{$item->name}}"/>
        </div>
    </div>
        
    @endforeach
@else
    <div id="variables-content"></div>
@endif
<script  type="application/javascript">
    jQuery(document).ready(function(){
    
    @if(isset($item) )
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':"{{ csrf_token() }}"
            }
        });
        $.ajax({
            url: "/unis/jugment-subtype/bytype/"+$('#judgment_type_').val(),
            method: 'get',
            data:{},
            success: function(res){
              
                $("#judgment_subtype").attr('disabled', false);
                
                var $select = $('#judgment_subtype');
                var subtype = $select .val();
                $select.find('option').remove();
                
                $.each(res.data,function(key, value){
                    $select.append(`<option value='${value.id }' ${subtype == value.id ? "selected":""}>${value.description} </option>`); // return empty
                });
                $('#variables-content').remove('label');
                $('#variables-content').remove('input');
                $.ajax({
                    url: "/unis/jugment-subtype/"+res.data[0].id,
                    method: 'get',
                    data:{},
                    success: function(result){
                        var $div = $('#variables-content');
                       
                        if(typeof result.data.data != 'undefined'){
                            $div.remove();
                            $.each(JSON.parse(result.data.data),function(key, value){
                                $div.append(`<div class="form-group">
                                                <label for="value[]">${value.name + ' - ' + value.description}</label>
                                                <input id="value[]"  name="value[]" class="form-control" value=""/>
                                                <input id="title[]"  name="title[]" type="hidden" value="${value.name}"/>
                                            </div>`);
                            });
                        }
                    },error: function(result){
                        console.log(result);
                    }
                });
            },error: function(result){
                console.log(result);
            }
        
        });
    @endif
    jQuery('#judgment_subtype').change(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':"{{ csrf_token() }}"
            }
        });
            
         $('#variables-content').remove('label');
                $('#variables-content').remove('input');
        $.ajax({
            url: "/unis/jugment-subtype/"+e.target.value,
            method: 'get',
            data:{},
            success: function(result){
                var $div = $('#variables-content');
                
                if(typeof result.data.data != 'undefined'){
                    $.each(JSON.parse(result.data.data),function(key, value){
                        $div.append(`<div class="form-group">
                                                <label for="value[]">${value.name + ' - ' + value.description}</label>
                                                <input id="value[]"  name="value[]" class="form-control" value=""/>
                                                <input id="title[]"  name="title[]" type="hidden" value="${value.name}"/>
                                            </div>`);    
                    });
                }
            },error: function(result){
                console.log(result);
            }
        });
    });
    jQuery('#judgment_type').change(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':"{{ csrf_token() }}"
            }
        });
        $.ajax({
            url: "/unis/jugment-subtype/bytype/"+e.target.value,
            method: 'get',
            data:{},
            success: function(result){
                $("#div-subtype").attr('hidden', false);
                $("#judgment_subtype").attr('disabled', false);
                
                var $select = $('#judgment_subtype');
    
                $select.find('option').remove();
                $.each(result.data,function(key, value){
                    $select.append('<option value=' + value.id + '>' + value.description + '</option>'); // return empty
                });
                $('#variables-content').remove('label');
                $('#variables-content').remove('input');
                $.ajax({
                    url: "/unis/jugment-subtype/"+result.data[0].id,
                    method: 'get',
                    data:{},
                    success: function(result){
                        var $div = $('#variables-content');
                        if(typeof result.data.data != 'undefined'){
                            $.each(JSON.parse(result.data.data),function(key, value){
                                    $div.append('<div class="form-group"><label for="">' + value.name + ' - ' + value.description + '</label><input id="title"  name="title" class="form-control" value=""/></div>'); // 
                            });
                        }
                    },error: function(result){
                        console.log(result);
                    }
                });
            },error: function(result){
                console.log(result);
            }
        });
    });
    });
   
</script>