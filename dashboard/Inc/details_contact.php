<div class="row-fluid">
    <div class="span6">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Contacts</div>
                <div class="pull-right"><span class="badge badge-info"><?php echo number_format($nombre_contact,0,","," ") ?></span>

                </div>
            </div>
            <div class="navbar navbar-inner block-header">
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
                    foreach ($liste_contact as $contact)
                    {
                        ?>
                        <tr>
                            <td>1</td>
                            <td>15/08/2017</td>
                            <td>28</td>
                        </tr>
                        <?php
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
                <div class="pull-right"><span class="badge badge-info"> <?php echo number_format($nombre_groupe,0,","," ") ?></span>

                </div>
            </div>
            <div class="block-content collapse in">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom groupe</th>
                        <th>Nombre de membre</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($liste_groupe as $groupe)
                    {
                        ?>
                        <tr>
                            <td>1</td>
                            <td><?php echo $groupe['nom_groupe'] ?></td>
                            <td><?php echo number_format($groupe['nombre'],0,","," ") ?></td>
                        </tr>
                        <?php
                    }
                    ?>


                    </tbody>
                </table>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>
