<div class="row-fluid">
    <div class="span6">
        <!-- block -->

        <div class="block">
            <div class="text-right">
                <span  data-toggle="modal" data-target="#add_contact" title="Ajouter nouveau contact" style="cursor:pointer">Ajouter contact
                </span>

            </div>





            <div class="row modal fade" role="dialog" id="edit_token">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit token of <?php echo $student->name ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group">
                                    <input class="form-control token_value_edit" type="number" name="" value="0" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default bouton_reduce_token" data-dismiss="modal"  alt="<?php echo $student->id ?>" >Deduct</button>
                            <button type="button" class="btn btn-default bouton_add_token" data-dismiss="modal" alt="<?php echo $student->id ?>" >Add</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>








            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"><b>Contacts</b></div>
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
                                <span class="modifier_contact icon-pencil" style="cursor: pointer" title="Modifier le contact"  data-id="<?php echo $contact['id_contact'] ?>"></span>
                                <span class="modifier_contact icon-check" style="cursor: pointer" title="Modifier le contact"  data-id="<?php echo $contact['id_contact'] ?>"></span>
                               <!-- <span class="modifier_contact icon-close" style="cursor: pointer" title="Modifier le contact"  data-id="<?php echo $contact['id_contact'] ?>"></span>-->
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
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Groupe</div>
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
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $j=1;
                    foreach ($liste_groupe as $groupe)
                    {
                        ?>
                        <tr data-id="<?php echo $groupe['id_groupe'] ?>">
                            <td><?php echo $j ?></td>
                            <td><?php echo $groupe['nom_groupe'] ?></td>
                            <td><?php echo number_format($groupe['nombre'],0,","," ") ?></td>
                        </tr>
                        <?php
                        $j++;
                    }
                    ?>


                    </tbody>
                </table>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>
