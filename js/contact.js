/**
 * Created by Melaine on 22/08/2017.
 */

//alert('ok');
$('.modifier_contact').click(function(){
    var class_nom='.ligne_contact'+$(this).attr('data-id');
    //alert(class_nom);
    $(class_nom+' td.nom').html('<input type"text" class="nom_modifier" value="'+$(class_nom+' td.nom').html()+'"/>');
    $(class_nom+' td.numero').html('<input type"text" class="numero_modifier" value="'+$(class_nom+' td.numero').html()+'"/>');
});