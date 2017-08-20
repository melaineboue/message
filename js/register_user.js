/**
 * Created by Melaine on 19/08/2017.
 */

function hideAllMessage()
{
    $('.required_name').hide();
    $('.required_email').hide();
    $('.required_username').hide();
    $('.password_non_conform').hide();
    $('.username_already_used').hide();
    $('.email_non_valide').hide();
    $('.email_used').hide();
    $('.message_compte_cree').hide();

}


hideAllMessage();
$('.required_name').removeClass('hidden');
$('.required_email').removeClass('hidden');
$('.required_username').removeClass('hidden');
$('.password_non_conform').removeClass('hidden');
$('.username_already_used').removeClass('hidden');
$('.email_non_valide').removeClass('hidden');
$('.email_used').removeClass('hidden');
$('.message_compte_cree').removeClass('hidden');


$('.bouton_register_user').click(function(){

    var nom=$('.nom').val().trim(),
        email=$('.email').val().trim(),
        username=$('.username').val().trim(),
        pwd=$('.password').val().trim(),
        pwd2=$('.confirm').val().trim();

    hideAllMessage();

    if(pwd==pwd2)
    {


        if(nom=='' || email=='' || username=='' )
        {
            if(nom=='')
            {
                $('.required_name').show(300);
            }

            if(email=='')
            {
                $('.required_email').show(300);
            }

            if(username=='')
            {
                $('.required_username').show(300);
            }


        }
        else
        {


            var url="execute/register_user.php?name="+nom+"&email="+email+"&username="+username+"&password="+pwd;
            //alert(url);
            $.ajax({
                url : url,
                type : 'GET',
                dataType : 'html',
                success : function(resultat, statut){
                    tab_resultat=resultat.split("/");
                    if(tab_resultat[0]==0)
                    {
                        $('.'+tab_resultat[1]).show(350);
                    }
                    else if(tab_resultat[0]==1)
                    {
                        $('.message_compte_cree').show(500);
                    }

                },
                error : function(resultat, statut, erreur){
                    alert(statut);
                }

            });


        }



    }
    else
    {
        $('.password_non_conform').show(300);
    }






});