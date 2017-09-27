<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title ?></title>
    <?php echo $ressources; ?>
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

                <h4 class="widgettitle">Modifier un client</h4>

                <form id="form1" class="stdform" method="post" action="../updateAction">
                    <input type="hidden" name="id_client" value="<?php echo $client->idclient ?>" />
                    <div class="par control-group">
                        <label class="control-label" for="nom">Nom</label>
                        <div class="controls">
                            <input value="<?php echo $client->nom ?>" id="nom" name="nom" type="text" class="input-large" />
                        </div>
                    </div>

                    <div class="par control-group">
                        <label class="control-label" for="prenom">Prénom(s)</label>
                        <div class="controls">
                            <input value="<?php echo $client->prenom ?>" id="prenom" name="prenom" type="text" class="input-large" />
                        </div>
                    </div>
                    <!--<div class="par control-group">
                        <label class="control-label" for="sexe">Sexe</label>
                        <div class="controls">
                            <select name="sexe" id="sexe">
                                <option <?php if($client->sexe == "Homme") echo "selected:selected" ?> value="Homme">Homme</option>
                                <option <?php if($client->sexe == "Femme") echo "selected:selected" ?> value="Femme">Femme</option>
                            </select>
                        </div>
                    </div>-->
                    <div class="par control-group">
                        <label class="control-label" for="email">E-mail</label>
                        <div class="controls">
                            <input value="<?php echo $client->email ?>" id="email" name="email" type="email" class="input-large" />
                        </div>
                    </div>

                    <div class="par control-group">
                        <label class="control-label" for="password">Nouveau mot de passe</label>
                        <div class="controls">
                            <input id="password" name="password" type="password" class="input-large" />
                        </div>
                    </div>
                    <div class="par control-group">
                        <label class="control-label" for="confirm_password">Confirmer du mot de passe</label>
                        <div class="controls">
                            <input id="confirm_password" name="confirm_password" type="password" class="input-large" />
                        </div>
                    </div>

                    <p class="stdformbutton">
                        <button class="btn btn-primary">Valider</button>
                    </p>
                </form>

                <?php echo $footer ?>

            </div><!--maincontentinner-->
        </div><!--maincontent-->

    </div><!--rightpanel-->
</div><!--mainwrapper-->
</body>
</html>
