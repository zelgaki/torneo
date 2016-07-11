@extends('layout')
@section('titulo')Catalogo usuarios @endsection
@section('javascript')
@stop
@section('contenido')
    <div class="widget-body custom-form">
        {!! Form::open() !!}
        <div class="form-group">
            {!! Form::label('usuario','Usuario') !!}
            {!! Form::text("usuario",@$usuario,["placeholder"=>"Nickname de usuario" ,'class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nombre','Nombre') !!}
            {!! Form::text("nombre",@$nombre,["placeholder"=>"Nombrem de usuario" ,'class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('fc','FC') !!}
            {!! Form::text("fc",@$fc,["placeholder"=>"FC del juego" ,'class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nick','Nombre en el juego') !!}
            {!! Form::text("nick",@$fc,["placeholder"=>"Nombre en el juego" ,'class'=>'form-control']) !!}
        </div>
        {!! Form::submit("Guardar",['class'=>'btn green btn-default']) !!}
        {!! Form::close() !!}
    </div>
@stop