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

                <a href="<?php echo base_url('backoffice4682/commande/') ?>" class="btn btn"><i class="iconfa-plus"></i> Voir toutes les commandes </a>
                <a href="<?php echo base_url('backoffice4682/commande/nonTraite') ?>" class="btn btn"><i class="iconfa-plus"></i> Voir les commandes non traitées </a>
                <a href="<?php echo base_url('backoffice4682/commande/traite') ?>" class="btn btn"><i class="iconfa-plus"></i> Voir les commandes traitées </a>
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
                        <th class="head1">Formule</th>
                        <th class="head0">Quantité</th>
                        <th class="head0">Nombres d'images</th>
                        <th class="head1">Traités</th>
                        <th class="head1">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($commandes as $commande) {
                        ?>
                        <tr class="gradeX">
                            <!--<td></td>-->
                            <td><?php echo $commande->client->nom; ?></td>
                            <td><?php echo $commande->client->prenom; ?></td>
                            <td><?php echo $commande->formule; ?></td>
                            <td><?php echo $commande->quantite; ?></td>
                            <td><?php echo $commande->nb_images; ?></td>
                            <td><?php echo $commande->nb_images_traites; ?></td>
                            <td><?php echo $commande->total; ?> €</td>
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
