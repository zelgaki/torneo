/**
 * Created by roberto on 23/09/15.
 */
$(document).on("ready", function () {
    $("#registrar").on("click", function (e) {
        e.preventDefault();
        var jsonAgregar = obtenerJSON("/torneo/agregar-participante", "torneo_id=" + $("#torneo_id").val());
        if (!jsonAgregar.bandera) {
            regresarErrores(jsonAgregar.errors);
        }
        else {
            cargarParticipante($("#torneo_id").val());

        }
    }); 
    cargarParticipante($("#torneo_id").val());
    datosTorneo($("#torneo_id").val());
});

function datosTorneo(id){
    var josnTorneo = obtenerJSON("/torneo/show","id="+id);
    $("#imagen-emparejamiento").append("<img src='"+josnTorneo.tournament.live_image_url+"'/>");

    //return josnTorneo;
}
function cargarParticipante(id_torneo) {
    var jsonParticipantes = obtenerJSON("/torneo/obtener-participantes/", "torneo_id" + id_torneo);
    $("#participantes").html("");
    $.each(jsonParticipantes, function (k, v) {
        var li = $("<li/>");
        var a = $('<a href="#"/>');
        var img = $('<img width="51"  alt="">');
        img.attr("src", v.imagen);
        li.append(a.append(img));

        var div = $('<div class="member-hover">');
        var span = $('<span>' + v.usuario + '</span>');
        var a = $('<a href="#"/>');
        var img = $('<img width="51" height="51" alt="">');
        img.attr("src", v.imagen);
        div.append(a.append(img));
        div.append(span);
        li.append(div);
        console.log(li.html());
        $("#participantes").append(li);

    });
}