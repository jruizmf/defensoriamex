<div class="form-group">
    {!! Form::label('name', 'Nombre del Cliente', ['for' => 'nombre'] ) !!}
    {!! Form::text('name', null , ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Escribe el nombre del Cliente...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('deal', 'Asunto', ['for' => 'deal'] ) !!}
    {!! Form::text('deal', null , ['class' => 'form-control', 'id' => 'deal', 'placeholder' => 'Escribe el nombre del Asunto...' ]  ) !!}
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
    {!! Form::label('city', 'Ciudad', ['for' => 'city'] ) !!}
    {!! Form::text('city', null , ['class' => 'form-control', 'id' => 'city', 'placeholder' => 'Escribe el nombre de la Ciudad...' ]  ) !!}
</div>

<div class="form-group">
    {!! Form::label('district', 'Distrito Judicial', ['for' => 'district'] ) !!}
    {!! Form::text('district', null , ['class' => 'form-control', 'id' => 'district', 'placeholder' => 'Escribe el Distrito Judicial...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('matter', 'Causa', ['for' => 'matter'] ) !!}
    {!! Form::text('matter', null , ['class' => 'form-control', 'id' => 'matter', 'placeholder' => 'Escribe la materia del Juicio...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('judgment', 'Juicio', ['for' => 'judgment'] ) !!}
    {!! Form::text('judgment', null , ['class' => 'form-control', 'id' => 'judgment', 'placeholder' => 'Escribe el tipo de Juicio...' ]  ) !!}
</div>
<div class="form-group">
    {!! Form::label('amount', 'Precio', ['for' => 'amount'] ) !!}
    {!! Form::text('amount', null , ['class' => 'form-control', 'id' => 'amount', 'placeholder' => 'Escribe el precio de la cotizacion...' ]  ) !!}
    {!! Form::hidden('id', null , ['class' => 'form-control', 'id' => 'id' ]  ) !!}
</div>