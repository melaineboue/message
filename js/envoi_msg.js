/**
 * Created by Melaine on 18/08/2017.
 */
var nombre_caractere_un_msg=160;
var nombre_message=1;
updateNumbermsg();


$('.message_sms').keyup(function(){
    updateNumbermsg();
});


/************MASQUER******************/
hideAll();
$('nombre_message_insuffisant').removeClass('hidden');







function hideAll()
{
    $('.nombre_message_insuffisant').hide();
}


function updateNumbermsg() {
    nombre_caractere=$('.message_sms').val().length;
    nombre_message=parseInt(nombre_caractere/nombre_caractere_un_msg)+1;
    $('.nombre_caractere').html(nombre_caractere);
    $('.nombre_message').html(nombre_message);
}



/***************************************************************************************/
$('.message_envoye').hide();
$('.message_envoye').removeClass('hidden');

$('.bouton_envoyer_message').click(function(){

    hideAll();
    if( parseInt($('.m').val().trim())>=parseInt(nombre_message))
    {

        var url='authsms.php?sender='+$('.sender').val()+'&recipient='+$('.recipient').val()+'&message='+$('.message_sms').val()+"&nb="+nombre_message;
       //alert(url);
        $.ajax({
            url : url,
            type : 'GET',
            dataType : 'html',
            success: function(reponse, statut){

                if(reponse=='non')
                {

                }
                else
                {
                    //alert(reponse);
                    $('.message_envoye').hide();
                    $('.message_envoye').show(500);

                    //$('.sender').val('');
                    $('.recipient').val('');
                    $('.message').val('');

                    //alert(reponse);
                    $.ajax({
                        url : reponse,
                        type : 'GET',
                        dataType : 'html',
                        success: function(retour, statut2){},
                        error: function(resultat, statut){}
                    });
                }


            },
            error: function(resultat, statut){

            }


        });

    }
    else
    {
        $('.nombre_message_insuffisant').show(500);
    }



});
/***********************************************************************************************************************/