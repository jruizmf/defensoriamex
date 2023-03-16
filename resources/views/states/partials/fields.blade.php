

<div class="form-group">
    {!! Form::label('description', 'Descripción', ['for' => 'description'] ) !!}
    {!! Form::text('description', null , ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Escribe el nombre del estado...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('code', 'Código', ['for' => 'code'] ) !!}
    {!! Form::text('code', null , ['class' => 'form-control', 'id' => 'code', 'placeholder' => 'Escribe la clave del estado...' ]  ) !!}
    <input type="hidden" id="id_country" name="id_country" value="42">
    <input type="hidden" id="status" name="status" value="1">
    @if (isset($id))
    <input type="hidden" id="id" name="id" value="{{$id}}">
    @endif
</div>
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
            <label for="value_[]">Descripción</label>
                <input type="text" name="value_[]" placeholder="Ingrese Valor" class="form-control name_list" value="{{$item->value}}" /></td>  
        
            <td><button type="button" name="add" id="add" class="btn btn-success">Agregar</button></td>  
        </tr>  
        @else
        <tr  id="row{{$key}}" >  
            <td>
                <label for="name_[]">Nombre</label>
                <input type="text" name="name_[]" placeholder="Ingrese nombre" class="form-control name_list" value="{{$item->name}}" /></td> 
            <td>
            <label for="value_[]">Valor</label>
                <input type="text" name="value_[]" placeholder="Ingrese descripción" class="form-control name_list" value="{{$item->value}}" /></td>  
           
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
            <label for="value_[]">Descripción</label>
                <input type="text" name="value_[]" placeholder="Ingrese Valor" class="form-control name_list" value="" /></td>  
      
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
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="name_[]" placeholder="Nombre de variable" class="form-control name_list" /></td><td><input type="text" name="value_[]" placeholder="Valor" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
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
