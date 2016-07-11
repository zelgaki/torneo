/**
 * Created by roberto on 22/09/15.
 */
$(document).on("ready",function(){
    $('form').on('submit',function(e){
        e.preventDefault();
        var torneos = obtenerJSON("/torneo/json-torneo", $(this).serialize());
        $("#cuerpo-torneos").html("");
        $.each(torneos,function(k,torneo){
            var tr = $("<tr/>");
            tr.append("<td>"+torneo.id+"</td>");
            tr.append("<td>"+torneo.name+"</td>");
            tr.append("<td>"+torneo.description+"</td>");
            tr.append("<td>"+torneo.estatus+"</td>");

            var td = $("<td/>");
            var a =$("<a/>");
            a.attr("href","/torneo/ver-torneo/"+torneo.id);
            a.append('<i class="fa fa-building-o"></i>');
            td.append(a);
            tr.append(td);
            $("#cuerpo-torneos").append(tr);

        });
    })
});