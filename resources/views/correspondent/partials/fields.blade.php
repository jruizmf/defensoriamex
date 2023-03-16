<div class="form-group">
    {!! Form::label('name', 'Nombre', ['for' => 'nombre'] ) !!}
    {!! Form::text('name', null , ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Escribe el nombre del Corresponsal...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('name', 'ID', ['for' => 'correspondent_id'] ) !!}
    {!! Form::text('correspondent_id', null , ['class' => 'form-control', 'id' => 'correspondent_id', 'placeholder' => 'Escribe el ID del corresponsal...' ]  ) !!}
</div>

<div class="form-group">
    {!! Form::label('deal', 'Asunto', ['for' => 'deal'] ) !!}
    {!! Form::text('deal', null , ['class' => 'form-control', 'id' => 'deal', 'placeholder' => 'Escribe el nombre del Asunto...' ]  ) !!}
</div>

<div class="form-group">
    {!! Form::label('license', 'Cedula Profesional', ['for' => 'license'] ) !!}
    {!! Form::text('license', null , ['class' => 'form-control', 'id' => 'license', 'placeholder' => 'Escribe el Numero de Cedula Profesional...' ]  ) !!}
</div>

<div class="form-group">
    {!! Form::label('telephone', 'Telefono', ['for' => 'telephone'] ) !!}
    {!! Form::text('telephone', null , ['class' => 'form-control', 'id' => 'telephone', 'placeholder' => 'Escribe el numero de Telefono...' ]  ) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email', ['for' => 'email'] ) !!}
    {!! Form::text('email', null , ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Escribe el Email del Corresponsal...' ]  ) !!}
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
    {!! Form::label('status', 'Estado', ['for' => 'status'] ) !!}
    <select name="status" class="form-control" required>
        <option value="1">Activo</option>
        <option value="2">Inactivo</option>
    </select>
    {!! Form::hidden('id', null , ['class' => 'form-control', 'id' => 'id' ]  ) !!}

</div>