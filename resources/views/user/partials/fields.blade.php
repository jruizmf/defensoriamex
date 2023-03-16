

<div class="form-group">
    {!! Form::label('name', 'Nombre', ['for' => 'name'] ) !!}
    {!! Form::text('name', null , ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Escribe el nombre de usuario...' ]  ) !!}
</div>
@if (isset($item->id))
    <input type="hidden" id="id" name="id" value="{{$item->id}}">
    @endif
<div class="form-group">
    {!! Form::label('email', 'Usuario', ['for' => 'applicant1'] ) !!}
    {!! Form::text('email', null , ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Escribe el email...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'Contraseña', ['for' => 'applicant1'] ) !!}
    <input type="password" id="password" name="password" value="" class="form-control">    
</div>
<div class="form-group">
    {!! Form::label('role', 'Rol', ['for' => 'role'] ) !!}
    <select name="role" id="role" class="form-control">
        <option value="1" {{isset($item) && $item->role == 1 ? 'selected': ''}}>Administrador</option>
        <option value="2" {{!isset($item)  ?? $item->role == 2 ? 'selected': ''}}>Capturista</option>
    </select>
</div>


