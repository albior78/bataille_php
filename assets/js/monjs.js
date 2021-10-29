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
// $( document ).ready(function(){
//     if($("#result").hasClass("resultat1")){
//         $.ajax({
//             type: "POST",
//             //indique le fichier de traitement du code php
//             url: "http://localhost/bataille_php/controller/ajaxNoBlend.php",
//             cache: false,
//         })
//         .done( function(data, textStatus,jqXHR){
//             $('#result').html(data);
//         })
//         .fail(function (jqXHR, textStatus, errorThrown) {
//             //Réagit si le code serveur n'a pas pu être appelé par AJAX ou
//             // s'il a planté
//             alert('ça a planté');
//         })
//     }
//     $('#blend6').click(function(e){
//         e.stopPropagation();
//         e.preventDefault();
//         $("#result").removeClass("resultat1")
//         alert('coucou');
//         $.ajax({
//             type: "POST",
//             //indique le fichier de traitement du code php
//             url: "http://localhost/bataille_php/controller/ajaxBlend.php",
//             cache: false,
//         })
//         .done( function(data, textStatus,jqXHR){
//             $('#result').html(data);
//         })
//         .fail(function (jqXHR, textStatus, errorThrown) {
//             //Réagit si le code serveur n'a pas pu être appelé par AJAX ou
//             // s'il a planté
//             alert('ça a planté');
//         })
//     });

// });