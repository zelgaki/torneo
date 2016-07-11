@extends('layout');
@section('titulo') Listade torneos @endsection
@section('ubicacion') <h1>Torneos <i>Listar</i></h1> @endsection
@section('javascript')
    <script src="/appjs/torneos/reporte.js"></script>
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
            {!! Form::select('tournament_type', array(''=>'Todos','single elimination' => 'Eliminacion simple', 'double elimination' => 'Eliminacion doble','round robin'=>'round robin','swiss'=>'Pareo suizo'), 'default',['class'=>"form-control"]) !!}
            <div class="form-group">
                {!! Form::label("url","Url:") !!}
                {!! Form::text('url', @$name, ['class'=>'form-control', 'placeholder'=>'Url del torneo']) !!}
            </div>
        </div>

        {!! Form::submit("Buscar",['class'=>'btn green btn-default']) !!}
        <input type="hidden" name="_token" id="_token" value="{!! csrf_token() !!}">

        <div class="mensajes">

        </div>
        {!! Form::close() !!}
    </div>
    <div class="col-md-12">
        <div class="">
            <div class="streaming-table">
                <div class="progress progress-striped active">
                    <div id="record_count" class="progress-bar progress-bar-success pink large-progress"
                         style="width: 0%">0
                    </div>
                </div>
                <span id="found" class="label label-info"></span>
                <table id="stream_table" class='table table-striped table-bordered'>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody id="cuerpo-torneos">
                    </tbody>
                </table>
                <div id="summary">
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection