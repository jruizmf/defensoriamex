
<div class="form-group">
    {!! Form::label('name', 'Nombre', ['for' => 'name'] ) !!}
    {!! Form::text('name', null , ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Escribe el nombre del tipo de asunto' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripción', ['for' => 'description'] ) !!}
    {!! Form::text('description', null , ['class' => 'form-control', 'id' => 'description', 'placeholder' => 'Escribe la descripción del tipo de asunto...' ]  ) !!}
</div>
<input type="hidden" name="id" id="id" value="{{isset($item) && $item->id ? $item->id : ''}}">