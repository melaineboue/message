<div class="row-fluid">
    <div class="span6">
        <!-- block -->

        <div class="block">
<!--            <div class="text-right">
                <span  data-toggle="modal" data-target="#add_contact" title="Ajouter nouveau contact" style="cursor:pointer">Ajouter contact
                </span>

            </div>
-->




            <div class="row modal fade" role="dialog" id="add_contact">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Ajout de nouveau contact</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <center class="row">
                                        <input class="ajout_nom" type="text" name="ajout_nom" placeholder="Nom" />
                                    </center>

                                    <center class="row">
                                        <input class="ajout_numero" type="number" name="ajout_numero" placeholder="Numero (Ex 22545774483)" />
                                    </center>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default bouton_add_contact" data-dismiss="modal" " >VALIDER</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>








            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><b>Contacts&emsp;</b><span  data-toggle="modal" data-target="#add_contact" title="Ajouter nouveau contact" class="pull-right fa fa-plus-circle fa-2x" style="cursor:pointer; color: #00a0d2; font-size: 20px"></span></div>
                <div class="pull-right"><span class="badge badge-info"><?php echo number_format(sizeof($liste_contact),0,","," ") ?></span>

                </div>
            </div>
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left nom_groupe">Tout les contact</div>
                <div class="pull-right"><input type="search" placeholder="Rechercher"/></span>

                </div>
            </div>

            <div class="block-content collapse in">

                <table class="table table-striped tableau_contact">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Numero</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
                    foreach ($liste_contact as $contact)
                    {
                        ?>
                        <tr class="ligne_contact<?php echo $contact['id_contact'] ?>">
                            <td><?php echo $i ?></td>
                            <td class="nom"><?php echo htmlspecialchars($contact['nom']) ?></td>
                            <td class="numero"><?php echo htmlspecialchars($contact['numero']) ?></td>
                            <td>
                                <span class="modifier_contact modifier_contact<?php echo $contact['id_contact'] ?> icon-pencil" style="cursor: pointer" title="Modifier le contact"  data-id="<?php echo $contact['id_contact'] ?>"></span>
                                <span class="hidden icon-ok validate_modification validate_modification<?php echo $contact['id_contact'] ?>" style="cursor: pointer" title="Valider la modification"  data-id="<?php echo $contact['id_contact'] ?>"></span>
                                <span class="hidden icon-remove cancel_modification cancel_modification<?php echo $contact['id_contact'] ?>" style="cursor: pointer" title="Annuler la modification"  data-id="<?php echo $contact['id_contact'] ?>"></span>
                                <span class="icon-trash delete_contact delete_contact<?php echo $contact['id_contact'] ?>" style="cursor: pointer" title="Supprimer le contact"  data-id="<?php echo $contact['id_contact'] ?>"></span>

                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>


                    </tbody>
                </table>
            </div>
        </div>
        <!-- /block -->
    </div>
    <div class="span6">
        <!-- block -->


        <div class="block">
<!--            <div class="text-right">
                <span  data-toggle="modal" data-target="#add_groupe" title="Ajouter nouveau groupe" style="cursor:pointer">Ajouter groupe
                </span>

            </div>
-->




            <div class="row modal fade" role="dialog" id="add_groupe">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Ajout de nouveau groupe</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <center class="row">
                                        <input class="nom_groupe_ajouter" type="text" name="nom_groupe" placeholder="Nom" />
                                    </center>



                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default bouton_add_groupe" data-dismiss="modal" " >VALIDER</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>





<!--            <div class="block">-->
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><b>Groupe&emsp;</b><span  data-toggle="modal" data-target="#add_groupe" title="Ajouter nouveau groupe" class="pull-right fa fa-plus-circle fa-2x" style="cursor:pointer; color: #00a0d2; font-size: 20px"></span></div>
                <div class="pull-right"><span class="badge badge-info"> <?php echo number_format(sizeof($liste_groupe),0,","," ") ?></span>

                </div>
            </div>
            <div class="block-content collapse in">
                <table class="table table-striped tableau_groupe" style="cursor: pointer">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom groupe</th>
                        <th>Nombre de membre</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $j=1;
                    foreach ($liste_groupe as $groupe)
                    {
                        ?>
                        <tr class="ligne_groupe<?php echo $groupe['id_groupe'] ?>" data-id="<?php echo $groupe['id_groupe'] ?>">
                            <td><?php echo $j ?></td>
                            <td class="nom_groupe"><?php echo $groupe['nom_groupe'] ?></td>
                            <td class="nombre_membre"><?php echo number_format($groupe['nombre'],0,","," ") ?></td>
                            <td>
                                <span class="modifier_groupe modifier_groupe<?php echo $groupe['id_groupe'] ?> icon-pencil" style="cursor: pointer" title="Modifier le contact"  data-id="<?php echo $groupe['id_groupe'] ?>"></span>
                                <span class="hidden icon-ok validate_modification_groupe validate_modification_groupe<?php echo $groupe['id_groupe'] ?>" style="cursor: pointer" title="Valider la modification"  data-id="<?php echo $groupe['id_groupe'] ?>"></span>
                                <span class="hidden icon-remove cancel_modification_groupe cancel_modification_groupe<?php echo $groupe['id_groupe'] ?>" style="cursor: pointer" title="Annuler la modification"  data-id="<?php echo $groupe['id_groupe'] ?>"></span>
                                <span class="icon-trash delete_groupe delete_groupe<?php echo $groupe['id_groupe'] ?>" style="cursor: pointer" title="Supprimer le contact"  data-id="<?php echo $groupe['id_groupe'] ?>"></span>

                            </td>
                        </tr>
                        <?php
                        $j++;
                    }
                    ?>


                    </tbody>
                </table>
            </div>
<!--        </div>-->
        <!-- /block -->
    </div>
</div>
