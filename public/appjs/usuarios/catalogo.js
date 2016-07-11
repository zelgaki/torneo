/**
 * Created by roberto on 9/09/15.
 */
$(document).on("ready", function () {
    $('form').on("submit", function (e) {
        e.preventDefault();
        var datos = $(this).serialize();
        var url = "/usuarios/json-usuarios";
        var json = obtenerJSON(url, datos);
        $("#cuerpo-usuarios").html("");
        $.each(json, function (key, value) {
            var tr = $("<tr/>");
            tr.append('<td>'+value.id+'</td');
            tr.append('<td>'+value.usuario+'</td');
            tr.append('<td>'+value.nombre+'</td');
            tr.append('<td>'+value.rol+'</td');
            var td = $("<td/>");
            var a = $("<a/>");
            a.attr("class","fa fa-edit");
            a.attr("href","#");
            td.append(a);

            tr.append(td);
            $("#cuerpo-usuarios").append(tr);

        });
    })
});

