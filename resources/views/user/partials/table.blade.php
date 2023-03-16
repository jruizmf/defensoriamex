<h2 class="section-title">Listado de Usuarios</h2>

<table class="table table-bordered" id="MyTable">
  <thead>
    <tr>
        <th class="text-center">ID</th>
        <th class="text-center">Nombre</th>
        <th class="text-center">E-mail</th>
        <th class="text-center">Permisos</th>
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
            <td class="text-center">{{ $item->email }}</td>
            <td class="text-center">{{ $item->role == 1 ? 'Administrador' : 'Capturista' }}</td>

            <td class="text-center">{{ $item->created_at }}</td>
            <td class="text-center">{{ $item->updated_at }}</td>
    
            <td class="text-center">
            <button onclick="abrir({{ $item->id }})" type="button" class="btn btn-secondary btn-xs"  data-toggle="tooltip" data-toggle="modal" data-target="#print-modal-{{ $item->id }}" data-placement="top" title="Imprimir Juicio">
                        <img src="{{asset('public/img/icons/print-icon.svg')}}" width="16" heigth="21" alt="Print">
                    </button>
                <a href="{{ url('/juicios/editar/'.$item->id.'') }}" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="Modificar Juicio" >
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"><img src="{{asset('public/img/icons/edit-icon.svg')}}" width="14" heigth="14" alt="Edit"></span>
                </a>
                <form method="POST" action="{{ route('judgment/destroy', [ 'id'=> $item->id ]) }}">
                {{Form::hidden('_method','DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Eliminar Juicio" >
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"><img src="{{asset('public/img/icons/trash.svg')}}" width="14" heigth="14" alt="Delete"></span>
                </button>
                {!! Form::close() !!}
            </td>
            <!-- Modal Example Start-->
            
        </tr>
    @endforeach
  </tbody>

</table>
<script>
    function abrir(id){
        $('#print-modal-'+id).modal('show')
    }
    function cerrar(id){
        $('#print-modal-'+id).modal('hide')
        $("#events").hide();
        $('#variables-content').empty();
    }
    function print(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                  url: "/print/generate",
                  method: 'POST',
                  data:{
                    id:$("#id").val(),
                    template:$("#template").val(),
                    event:$("#event").val()
                },
                success: function(result){
                    var blob = new Blob([result]);
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = "Sample.docx";
                link.click();
                 },error: function(result){
                   console.log(result);
                }
                
            });
    }
    $(document).ready(function() {
     
    //set initial state.
        $("#events").hide();
        $('#isEvent').on('change', function() {
            if(document.getElementById("isEvent").checked == true) {
               $("#events").show();
            }else{
                $("#events").hide();
            }   
              document.getElementById("isEvent").checked = !document.getElementById("isEvent").checked
        });
        jQuery('#event').change(function(e){
           e.preventDefault();
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN':"{{ csrf_token() }}"
                }
            });
            console.log(e.target.value)
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