<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Apellido(s)') !!}
    {!! Form::text('last_name',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email') !!}
    {!! Form::text('email',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('ci', 'CI') !!}
    {!! Form::text('ci',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('expedido', 'Expedido') !!}
    {!! Form::text('expedido',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('carrera', 'Carrera') !!}
    {!! Form::text('carrera',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('avatar', 'Avatar') !!}
    {!! Form::file('avatar') !!}
</div>