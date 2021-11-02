// $(document).ready(function(){

//     ecouteMelangeCartes();
//     ecouteDistributionCartes();
//     ecoutePoser1carteJ1();
//     ecoutePoser1carteJ2();


//     function ecouteMelangeCartes(){
//         $('#blend').click(function(event){
//             event.preventDefault();
//             event.stopPropagation();
//             setTimeout(function() {
//             $('#distributionCards').removeClass("d-none");
//             $('#blend').prop('disabled', true);
//             }, 1000);
//         })
//     }

//     function ecouteDistributionCartes(){
//         $('#distribution').click((event)=>{
//             event.preventDefault();
//             event.stopPropagation();
//             setTimeout(function() {
//                     $('#blendCards').addClass('d-none');
//                     $('#distributionCards').addClass('d-none');
//                     $('#gameStart').removeClass("d-none");
//             }, 1000);
//         })
//     }

//     function ecoutePoser1carteJ1(){
//         $('#cardPlaying1').click((event)=>{
//             event.preventDefault();
//             event.stopPropagation();
//             setTimeout(function() {
//             $('#carteJ1').removeClass("d-none");
//             }, 1000);
//         })
//     }

//     function ecoutePoser1carteJ2(){
//         $('#cardPlaying2').click(function(event){
//             event.preventDefault();
//             event.stopPropagation();
//             setTimeout(function() {
//             $('#carteJ2').removeClass("d-none");
//             }, 1000);
//         })
//     }
// });
$( document ).ready(function(){
    //----------------------------Pioche carteJ1------------------------
    $('#carteJ1').click(function(e){
        e.stopPropagation();
        e.preventDefault();
        $.ajax({
            url: "http://localhost/bataille_php/controller/ajax$_SESSION.php",
            cache: false
        })
        .done(function(result){
            var $_SESSION = $.parseJSON(result);
            var vcJ1_egale_vcJ2 = ($_SESSION['valeurCarteJ1'] == $_SESSION['valeurCarteJ2']) && ($_SESSION['valeurCarteJ1'] != 0) && ($_SESSION['valeurCarteJ2']!= 0);
            switch (true) {
                case $_SESSION['valeurCarteJ1'] >= 0:
                    $.ajax({
                        type: "POST",
                        //indique le fichier de traitement du code php
                        url: "http://localhost/bataille_php/controller/ajaxCardPlayJ1J2.php",
                        cache: false,
                    })
                    .done( function(data, textStatus,jqXHR){
                        $('#cardPlayJ1J2').html(data);
                    })
                    .fail(function (jqXHR, textStatus, errorThrown) {
                        //Réagit si le code serveur n'a pas pu être appelé par AJAX ou
                        // s'il a planté
                        alert('ça a planté');
                    })
                    $('#carteJ1').prop('disabled', true);
                    $('#carteJ1').addClass('desactive');
                    $('#carteJ2').prop('disabled', true);
                    $('#carteJ2').addClass('desactive');
                    $('#tourSuivant').removeClass('d-none');
                break;
                default:
                    vcJ1_egale_vcJ2;
                break;
            }
        });
    });
//----------------------------Pioche carteJ2------------------------
    $('#carteJ2').click(function(e){
        e.stopPropagation();
        e.preventDefault();
        $.ajax({
            url: "http://localhost/bataille_php/controller/ajax$_SESSION.php",
            cache: false
        })
        .done(function(result){
            var $_SESSION = $.parseJSON(result);
            var vcJ1_egale_vcJ2 = ($_SESSION['valeurCarteJ1'] == $_SESSION['valeurCarteJ2']) && ($_SESSION['valeurCarteJ1'] != 0) && ($_SESSION['valeurCarteJ2']!= 0);
            switch (true) {
                case $_SESSION['valeurCarteJ2']>=0:
                    $.ajax({
                        type: "POST",
                        //indique le fichier de traitement du code php
                        url: "http://localhost/bataille_php/controller/ajaxCardPlayJ1J2.php",
                        cache: false,
                    })
                    .done( function(data, textStatus,jqXHR){
                        $('#cardPlayJ1J2').html(data);
                    })
                    .fail(function (jqXHR, textStatus, errorThrown) {
                        //Réagit si le code serveur n'a pas pu être appelé par AJAX ou
                        // s'il a planté
                        alert('ça a planté');
                    })
                    $('#carteJ2').prop('disabled', true);
                    $('#carteJ2').addClass('desactive');
                    $('#carteJ1').prop('disabled', true);
                    $('#carteJ1').addClass('desactive');
                    $('#tourSuivant').removeClass('d-none');
                break;
                default:
                     vcJ1_egale_vcJ2;
                break;
            }
        });
    });

    $('#tourSuivant').click(function(e){
        e.stopPropagation();
        e.preventDefault();
        $.ajax({
            url: "http://localhost/bataille_php/controller/ajax$_SESSION.php",
            cache: false
        })
        .done(function(result){
            var $_SESSION = $.parseJSON(result);
            var vcJ1_egale_vcJ2 = ($_SESSION['valeurCarteJ1'] == $_SESSION['valeurCarteJ2']) && ($_SESSION['valeurCarteJ1'] != 0) && ($_SESSION['valeurCarteJ2']!= 0);
            switch (true) {
                case vcJ1_egale_vcJ2:
                    $("#bataille").removeClass("d-none");
                    $('#tourSuivant').addClass("d-none");
                break;
                default:
                    window.location.href = "http://localhost/bataille_php/Le_tapis_de_jeu";
                    $('#carteJ1').removeAttr('disabled');
                    $('#carteJ1').removeClass('desactive');
                    $('#carteJ2').removeAttr('disabled');
                    $('#carteJ2').removeClass('desactive');
                break;
            }
        })
    });

    $('#bataille').click(function(e){
        e.stopPropagation();
        e.preventDefault();
        $('#carteJ1').removeAttr('disabled');
        $('#carteJ1').removeClass('desactive');
        $('#carteJ2').removeAttr('disabled');
        $('#carteJ2').removeClass('desactive');

        //avoir faire la gestion égalité ici
        $.ajax({
            type: "POST",
            //indique le fichier de traitement du code php
            url: "http://localhost/bataille_php/controller/ajaxCardPlayJ1J2.php",
            cache: false,
        })
        .done( function(data, textStatus,jqXHR){
            $('#cardPlayJ1J2').html(data);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            //Réagit si le code serveur n'a pas pu être appelé par AJAX ou
            // s'il a planté
            alert('ça a planté');
        })
        $('#carteJ1').prop('disabled', true);
        $('#carteJ1').addClass('desactive');
        $('#carteJ2').prop('disabled', true);
        $('#carteJ2').addClass('desactive');
        $('#bataille').addClass('d-none');
        $('#tourSuivant').removeClass('d-none');
    });
    // $('#rebataille').click(function(e){
    //     e.stopPropagation();
    //     e.preventDefault();
    // });
});