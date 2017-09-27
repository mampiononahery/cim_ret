<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title ?></title>
    <?php echo $ressources; ?>

    <script type="text/javascript">
        jQuery(document).ready(function(){
            // dynamic table
            jQuery('#dyntable').dataTable({
                "sPaginationType": "full_numbers",
                "aaSorting": [],
                "oLanguage": {
                    "sUrl": '<?php echo base_url('assets/js/fr_FR.json') ?>'
                }
            });
        });
    </script>

</head>

<body>

<div class="mainwrapper">
    <?php echo $header; ?>

    <?php echo $menu; ?>

    <div class="rightpanel">

        <?php echo $breadcrumbs; ?>

        <?php echo $pageheader; ?>

        <div class="maincontent">
            <div class="maincontentinner">

                <a href="<?php echo base_url('backoffice4682/client/add') ?>" class="btn btn"><i class="iconfa-plus"></i> Ajouter</a>
                <a href="<?php echo base_url('backoffice4682/client/') ?>" class="btn btn"><i class="iconfa-plus"></i> Voir tous les clients </a>
                <a href="<?php echo base_url('backoffice4682/client/nouveaux') ?>" class="btn btn"><i class="iconfa-plus"></i> Voir les nouveaux clients des 7 derniers jours </a>
                <h4 class="widgettitle"><?php echo $titreTab ?></h4>
                <table id="dyntable" class="table table-bordered responsive">
                    <!--<colgroup>
                        <col class="con0" style="align: center; width: 4%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>-->
                    <thead>
                    <tr>
                        <!--<th class="head0">Hidden</th>-->
                        <th class="head0">Nom</th>
                        <th class="head0">Prénoms</th>
                        <th class="head1">E-mail</th>
                        <th class="head0">Nombres d'images en cours</th>
                        <th class="head1">Date d'inscription</th>
                        <th class="head0"></th>
                        <th class="head1"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($clients as $client) {
                        ?>
                        <tr class="gradeX">
                            <!--<td></td>-->
                            <td><?php echo $client->nom; ?></td>
                            <td><?php echo $client->prenom; ?></td>
                            <td><?php echo $client->email; ?></td>
                            <td><?php echo $client->nb_images; ?></td>
                            <td><?php echo $client->date_ajout; ?></td>
                            <td class="center" style="width: 50px"><a href="<?php echo base_url('backoffice4682/client/update/'.$client->idclient) ?>"><button class="btn">Modifier</button></a></td>
                            <td class="center" style="width: 50px"><a href="<?php echo base_url('backoffice4682/client/delete/'.$client->idclient) ?>"><button class="btn btn-danger">Supprimer</button></a></td>
                        </tr>
                    <?php
                    } ?>
                    </tbody>
                </table>

                <?php echo $footer ?>

            </div><!--maincontentinner-->
        </div><!--maincontent-->

    </div><!--rightpanel-->

</div><!--mainwrapper-->
</body>
</html>
