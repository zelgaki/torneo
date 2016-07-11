@extends('layout')
@section('titulo')Crear torneo @endsection
@section('javascript')
    <script src="/appjs/torneos/crear.js"></script>
@endsection
@section('contenido')
    {!! Form::open() !!}
    <div class="widget-body custom-form">
        <div class="form-group">
            {!! Form::label("name","Nombre:") !!}
            {!! Form::text('name', @$name, ['class'=>'form-control', 'placeholder'=>'Nombre del torneo']) !!}
        </div>
        <div class="form-group">
            {!! Form::label("tournament_type","Tipo:") !!}
            {!! Form::select('tournament_type', array('single elimination' => 'Eliminacion simple', 'double elimination' => 'Eliminacion doble','round robin'=>'round robin','swiss'=>'Pareo suizo'), 'default',['class'=>"form-control"]) !!}
            <div class="form-group">
                {!! Form::label("url","Url:") !!}
                {!! Form::text('url', @$name, ['class'=>'form-control', 'placeholder'=>'Url del torneo']) !!}
            </div>
            <div class="form-group">
                {!! Form::label("description","Descripcion:") !!}
                {!! Form::textarea('description', @$name, ['class'=>'form-control', 'placeholder'=>'Descripcion del torneo']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label("hold_third_place_match","Tercer lugar:") !!}
            {!! Form::select('hold_third_place_match', array('false' => 'No jugar', 'true' => 'Jugar'), 'false',['class'=>"form-control"]) !!}
        </div>
        <div class="form-group">
            {!! Form::label("start_at","Fecha inicio:") !!}
            {!! Form::text('start_at', @$name, ['class'=>'form-control', 'placeholder'=>'Fecha de inicio']) !!}
        </div>


        {!! Form::submit("Guardar",['class'=>'btn green btn-default']) !!}
        <input type="hidden" name="_token" id="_token" value="{!! csrf_token() !!}">
        <div class="mensajes">

        </div>
        {!! Form::close() !!}
    </div>
@endsection