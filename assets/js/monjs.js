$(document).ready(function(){

    ecouteMelangeCartes();
    ecouteDistributionCartes();

    function ecouteMelangeCartes(){
        $('#blend').click(function(event){
            event.preventDefault();
            event.stopPropagation();
            $('#distributionCards').removeClass("d-none");
            $('#blend').prop('disabled', true);
        })
    }

    function ecouteDistributionCartes(){
        $('#distribution').click(function(event){
            event.preventDefault();
            event.stopPropagation();
            $('#blendCards').addClass('d-none');
            $('#distributionCards').addClass('d-none');
            $('#gameStart').removeClass("d-none");
        })
    }
});