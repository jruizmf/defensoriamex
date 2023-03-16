<div class="form-group">
    {!! Form::label('name', 'Nombre', ['for' => 'nombre'] ) !!}
    {!! Form::text('name', null , ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Escribe el nombre del Corresponsal...', 'required' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripcion', ['for' => 'description'] ) !!}
    {!! Form::text('description', null , ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Datos extras sobre la plantilla...', 'required' ]  ) !!}
</div>

<div class="form-group">
    {!! Form::label('file', 'Plantilla', ['for' => 'file'] ) !!}
    <input type="file" class="form-control"  id='file'  name='file' required >
</div>
@if (isset($id))
    <input type="hidden" id="id" name="id" value="{{$id}}">
@endif
<input type="hidden" id="type" name="type" value="1">
<div class="form-group">
    {!! Form::label('status', 'Tipo de Juicio', ['for' => 'judgment_type'] ) !!}
    <select name="judgment_type" id="judgment_type"  class="form-control" required>
        @if (!isset($item))
            <option value="" selected>Seleccionar Juicio</option>
        @endif
        @foreach($judgment_types as $type)
            <option value="{{$type->id}}" {{isset($item) && $item->judgment_type == $type->id  ? 'selected' : ''}}>{{$type->name}}</option>
        @endforeach
        
    </select>
    <input type="hidden" name="id" id="id" value="{{isset($item) && $item->id ? $item->id : ''}}">
    <input type="hidden" name="status" id="status" value="{{isset($item) && $item->status ? $item->status : '1'}}">
</div>
<div id="div-subtype" class="form-group">
    {!! Form::label('status', 'Tipo de formato', ['for' => 'judgment_type'] ) !!}
    <select name="judgment_subtype" id="judgment_subtype"  class="form-control" required>
        <option value="">Favor de seleccionar</option>
    </select>
</div>
<script  type="application/javascript">
    $(document).ready(function(){
        jQuery('#judgment_type').change(function(e){
            e.preventDefault();
            loadSubtypes(e.target.value);
        });
    })
    function loadSubtypes(value){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN':"{{ csrf_token() }}"
            }
        });
        var subtypeId = 0;
        @if (isset($item->judgment_subtype))
            subtypeId ={{$item->judgment_subtype}}
        @endif
        
        $.ajax({
            url: "/jugment-subtype/bytype/"+value,
            method: 'get',
            data:{},
            success: function(result){
                $("#div-subtype").attr('hidden', false);
                $("#judgment_subtype").attr('disabled', false);
                var $select = $('#judgment_subtype');
    
                $select.find('option').remove();
                $.each(result.data,function(key, value){  
                    $select.append(`<option value='${value.id}' ${value.id == subtypeId ? 'selected': ''}>${value.description}</option>`); // return empty
                });
                if(subtypeId ==0){
                     loadvariables(result.data[0].id);
                }
            },error: function(result){
                console.log(result);
            }
        });
    }
</script>
