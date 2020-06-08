<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::text('description',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('image', 'Imagen') !!}
    {!! Form::file('image') !!}
</div>
<div class="form-group">
    {!! Form::label('url', 'Documento') !!}
    {!! Form::file('url') !!}
</div>