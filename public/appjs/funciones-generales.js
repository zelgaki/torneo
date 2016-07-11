/**
 * Created by roberto on 9/09/15.
 */

/*funcion para obtener json*/
function obtenerJSON(url, params) {
    var json_usos;
    $.ajax({
        url: url,
        data: params,
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function (json) {
            json_usos = json;
        }
    });
    return json_usos;
}
/*funcion para obtener json*/

/*json con error */
function obtenerJSONApi(url, params) {
    var json_usos;
    $.ajax({
        url: url,
        data: params,
        type: 'POST',
        dataType: 'json',
        async: false,
        success: function (json) {
            json_usos = json;
        },
        error: function (responseText, statusText, xhr) {
            console.log(responseText);
        }
    });
    return json_usos;
}
function traducirError(error) {
    var traduccion = '';
    switch (error) {
        case 'Tie breaks must be valid Challonge stats':
            traduccion = 'El valor desempate debe ser valido';
            break;
        case "Name can't be blank":
            traduccion = 'El nombre del torneo no puede estar en blanco';
            break;
        case "URL can't be blank":
            traduccion = 'La url no puede estar en blanco';
            break;
        case "URL has already been taken":
            traduccion = "La URL ya esta en uso";
            break;
        case "URL can only contain letters, numbers, and underscores":
            traduccion = "La URL solo puede contener letras y numeros";
            break;
        case "Undefined index: participant":
            traduccion = "No se envio el campo participante";
            break;
        case "Name has already been taken":
            traduccion = "El nombre de usuario ya esta en uso";
            break;
    }
    if (traduccion == '')
        traduccion = error;
    return traduccion;

}
function regresarErrores(errores) {
    var dialog = '<div><div class="col-md-4" style="width: 100%">' +
        '<div class="tdl-holder">' +
        '<h2 class="pink">Errores</h2>' +
        '<div class="tdl-content">' +
        '<ul>';
    $.each(errores, function (key, value) {
        value = traducirError(value);
        dialog += '<li><label><i></i><span>' + value + '</span><a href="#">–</a></label></li>';

    });
    dialog += '</ul>' +
        '</div>' +
        '</div></div>';
    $(dialog).dialog({
        width: 500
    });

}