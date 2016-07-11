@extends('layout')
@section('contenido')
    {!! Form::open(array('url'=>'upload-archivo','method' => 'post','enctype'=>'multipart/form-data') ) !!}

    {!! Form::file('archivo') !!}
    {!! Form::submit('subir') !!}

    {!! Form::close()!!}
@stop