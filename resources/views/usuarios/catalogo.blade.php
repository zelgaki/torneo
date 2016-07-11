@extends('layout')
@section('titulo')Catalogo usuarios @endsection
@section('javascript')
    <script src="/appjs/usuarios/catalogo.js"></script>
@endsection
@section('contenido')
    <div class="widget-body custom-form">
        {!! Form::open() !!}

        <div class="form-group">
            {!! Form::label("nombre","Nombre:") !!}
            {!! Form::text('nombre', @$name, ['class'=>'form-control', 'placeholder'=>'Nombre del usuario']) !!}
        </div>
        <div class="form-group">
            {!! Form::label("nickname","Nickname:") !!}
            {!! Form::text('usuario', @$name, ['class'=>'form-control', 'placeholder'=>'Nickname del usuario']) !!}
        </div>
        {!! Form::submit("Buscar",['class'=>'btn green btn-default']) !!}
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
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody id="cuerpo-usuarios">
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