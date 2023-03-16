
<div class="form-group">
    {!! Form::label('name', 'Nombre', ['for' => 'name'] ) !!}
    {!! Form::text('name', null , ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Escribe el nombre del formato...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripcion', ['for' => 'description'] ) !!}
    {!! Form::text('description', null , ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Escribe el nombre del formato...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('file', 'Plantilla', ['for' => 'file'] ) !!}
    <input type="file" class="form-control"  id='file'  name='file' required >
</div>
@if (isset($item->id))
    <input type="hidden" id="id" name="id" value="{{$item->id}}">
    @endif
<div class="table-responsive">  
    <table class="table table-bordered" id="dynamic_field">  
    @if (isset($items))
    @foreach($items  as $key => $item)
    @if ($key == 0)
        <tr>  
            <td>
                <label for="name_[]">Nombre</label>
                <input type="text" name="name_[]" placeholder="Ingrese nombre" class="form-control name_list" value="{{$item->name}}" /></td> 
            <td>
            <label for="description_[]">Descripción</label>
                <input type="text" name="description_[]" placeholder="Ingrese descripción" class="form-control name_list" value="{{$item->description}}" /></td>  
            <td>
                <label for="type_[]">Tipo</label>
                    <select id="type_[]" name="type_[]" class="form-control name_list">
                        <option value="Texto" {{isset($item->type) && $item->type == 'Texto' ? 'selected' : '' }}>Texto</option>
                        <option value="Selector" {{isset($item->type) && $item->type == 'Selector' ? 'selected' : '' }}>Selector</option>
                    </select></td>
            <td>
            <label for="options_[]">Opciones</label>
                <textarea name="options_[]" id="options_[]" cols="25" rows="3"  >{{isset($item->options) ? implode(',', $item->options) : ""}}</textarea>
            </td>
            <td><button type="button" name="add" id="add" class="btn btn-success">Agregar</button></td>  
        </tr>  
        @else
        <tr  id="row{{$key}}" >  
            <td>
                <label for="name_[]">Nombre</label>
                <input type="text" name="name_[]" placeholder="Ingrese nombre" class="form-control name_list" value="{{$item->name}}" /></td> 
            <td>
            <label for="description_[]">Descripción</label>
                <input type="text" name="description_[]" placeholder="Ingrese descripción" class="form-control name_list" value="{{$item->description}}" /></td>  
            <td>
                <label for="type_[]">Tipo</label>
                    <select id="type_[]" name="type_[]" class="form-control name_list">
                        <option value="Texto" {{isset($item->type) && $item->type == 'Texto' ? 'selected' : '' }}>Texto</option>
                        <option value="Selector" {{isset($item->type) && $item->type == 'Selector' ? 'selected' : '' }}>Selector</option>
                    </select></td>
            <td>
            <label for="options_[]">Opciones</label>
                <textarea name="options_[]" id="options_[]" cols="25" rows="3"  >{{isset($item->options) ? implode(',', $item->options) : ""}}</textarea>
            </td>
            <td><button type="button" name="remove" id="{{$key}}" class="btn btn-danger btn_remove">X</button></td>  
        </tr> 
        @endif
        @endforeach
        @else
        <tr>  
            <td>
                <label for="name_[]">Nombre</label>
                <input type="text" name="name_[]" placeholder="Ingrese nombre" class="form-control name_list" value="" /></td> 
            <td>
            <label for="description_[]">Descripción</label>
                <input type="text" name="description_[]" placeholder="Ingrese descripción" class="form-control name_list" value="" /></td>  
            <td>
                <label for="type_[]">Tipo</label>
                    <select id="type_[]" name="type_[]" class="form-control name_list">
                        <option value="Texto" {{isset($item->type) && $item->type == 'Texto' ? 'selected' : '' }}>Texto</option>
                        <option value="Selector" {{isset($item->type) && $item->type == 'Selector' ? 'selected' : '' }}>Selector</option>
                    </select></td>
            <td>
            <label for="options_[]">Opciones</label>
                <textarea name="options_[]" id="options_[]" cols="25" rows="3"  ></textarea>
            </td>
            <td><button type="button" name="add" id="add" class="btn btn-success">Agregar</button></td>  
        </tr>  
        @endif
    </table>  
</div>

<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  
        

      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name_[]" placeholder="Nombre de variable" class="form-control name_list" /></td><td><input type="text" name="description_[]" placeholder="Descripción de variable" class="form-control name_list" /></td><td><select name="type_[]" id="type_[]" class="form-control name_list"><option value="Texto" selected>Texto</option><option value="Selector" >Selector</option></select></td><td><textarea name="options_[]" id="options_[]" cols="25" rows="3" ></textarea></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  

      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
       
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
           $('#type_[]').on('change',function(){  
            console.log(this.name)
            if(this.value == "Selector");{
                $('#options_[]').css('display', 'inline-block');
            }
        });
      });  

      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none'); 
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
</script>
