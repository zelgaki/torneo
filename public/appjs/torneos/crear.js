/**
 * Created by roberto on 17/09/15.
 */


$(document).on("ready", function () {

    $("#start_at").datetimepicker();
    $("form").on("submit", function (e) {
        e.preventDefault();
        var json = {
            "api_key": "hola",
            "tournament": {
                "accept_attachments": false,
                "allow_participant_match_reporting": true,
                "anonymous_voting": false,
                "category": null,
                "check_in_duration": null,
                "completed_at": null,
                "created_at": "2015-01-19T16:47:30-05:00",
                "created_by_api": false,
                "credit_capped": false,
                "description": $("#description").val(),
                "game_id": 600,
                "group_stages_enabled": false,
                "hide_forum": false,
                "hide_seeds": false,
                "hold_third_place_match": $("#hold_third_place_match").val(),
                "max_predictions_per_user": 1,
                "name": $("#name").val(),
                "notify_users_when_matches_open": true,
                "notify_users_when_the_tournament_ends": true,
                "open_signup": false,
                "participants_count": 4,
                "prediction_method": 0,
                "predictions_opened_at": null,
                "private": false,
                "progress_meter": 0,
                "pts_for_bye": "1.0",
                "pts_for_game_tie": "0.0",
                "pts_for_game_win": "0.0",
                "pts_for_match_tie": "0.5",
                "pts_for_match_win": "1.0",
                "quick_advance": false,
                "ranked_by": "match wins",
                "require_score_agreement": false,
                "rr_pts_for_game_tie": "0.0",
                "rr_pts_for_game_win": "0.0",
                "rr_pts_for_match_tie": "0.5",
                "rr_pts_for_match_win": "1.0",
                "sequential_pairings": false,
                "show_rounds": true,
                "signup_cap": null,
                "start_at": null,
                "started_at": null,
                "started_checking_in_at": null,
                "state": "pending",
                "swiss_rounds": 0,
                "teams": false,
                "tournament_type": $("#tournament_type").val(),
                "updated_at": "2015-01-19T16:57:17-05:00",
                "url": $("#url").val(),
                "subdomain": null,
                "review_before_finalizing": true,
            }
        }
        var jsonTorneo = obtenerJSON('/torneo/create', json);
        if (jsonTorneo.errors) {
            $(".mensajes").html('');
            $.each(jsonTorneo.errors, function (k, v) {
                var div6 = $('<div class="col-md-6" />')
                var div = $('<div class="notifications widget-body pink"/>');
                var buton = $('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>');
                var p = $('<p><i>Error</i>'+traducirError(v)+'</p>');
                div.append(buton).append(p);
                div6.append(div);
                $(".mensajes").append(div6);
            });


        }
        else{
            alert("Se creo el torneo correctamente");
            window.location = "/";
        }
    });


})
;