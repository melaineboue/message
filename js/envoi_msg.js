/**
 * Created by Melaine on 18/08/2017.
 */
var nombre_caractere_un_msg=160;
var nombre_message;
updateNumbermsg();

$('.message_sms').keyup(function(){
    updateNumbermsg();
});












function updateNumbermsg() {
    nombre_message=$('.message_sms').val().length;
    $('.nombre_caractere').html(nombre_message);
    $('.nombre_message').html(parseInt(nombre_message/nombre_caractere_un_msg)+1);
}