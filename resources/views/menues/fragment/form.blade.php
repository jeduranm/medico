<div class="form-group">
    {{ Form::label('file', 'Imagen') }}
    {{ Form::file('file') }}
</div>

<div class="form-group">
    {!! Form::label('pos', 'Posición del menu') !!}
    {!! Form::text('pos', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('icologo', 'Icono del menu') !!}
    {!! Form::text('icologo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'Titulo del menu') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('url', 'Url del menu') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>