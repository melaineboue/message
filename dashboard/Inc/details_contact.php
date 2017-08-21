<div class="row-fluid">
    <div class="span6">
        <!-- block -->
        <div class="block">
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
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Numero</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i=1;
                    foreach ($liste_contact as $contact)
                    {
                        ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo htmlspecialchars($contact['nom']) ?></td>
                            <td><?php echo htmlspecialchars($contact['numero']) ?></td>
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
                <table class="table table-striped " style="cursor: pointer">
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
                        <tr>
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
