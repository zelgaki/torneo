@extends('layout')
@section('titulo') Datos del torneo @stop
@section('ubicacion') <h1>Torneos <i>ver torneo</i></h1> @endsection
@section('javascript')
    <script src="/appjs/torneos/ver-torneo.js"></script>
@endsection
@section('contenido')
    <div class="widget-body custom-form">
        <div class="total-members">
            <div class="total-memeber-head">
                <span><i class="fa fa-user"></i>Participantes</span>

                <div class="add-btn">
                    <a href="#" title="" id="registrar"><i class="fa fa-plus pink"></i>Inscribirse</a>
                </div>
            </div>
            <ul id="participantes">
                <li><a href="#" title=""><img src="http://placehold.it/51x51" alt=""></a>

                    <div class="member-hover">
                        <a href="#" title=""><img src="http://placehold.it/51x51" alt=""></a>
                        <span>JOHN DE</span>
                    </div>
                </li>


            </ul>
        </div>
        <div class="total-members">
            <div class="total-memeber-head">
                <span><i class="fa fa-user"></i>Emparejamientos</span>

                <div class="add-btn">
                    <a href="#" title="" id="registrar"><i class="fa fa-plus pink"></i>Inscribirse</a>
                </div>
            </div>
            <ul id="imagen-emparejamiento">

            </ul>
        </div>

        <input type="hidden" name="_token" id="_token" value="{!! csrf_token() !!}">
        <input type="hidden" name="torneo_id" id="torneo_id" value="{{ $id_torneo}}">
    </div>
    @endsection


            <!--
/**
* Created by PhpStorm.
* User: roberto
* Date: 23/09/15
* Time: 08:37 AM
*/-->