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

                <h4 class="widgettitle">Ajouter un client</h4>

                <div class="alert alert-error">
                    <?php echo validation_errors(); ?>
                </div>

                <form id="form1" class="stdform" method="post" action="addAction">
                    <div class="par control-group">
                        <label class="control-label" for="nom">Nom</label>
                        <div class="controls">
                            <input value="<?php echo set_value('nom'); ?>" id="nom" name="nom" type="text" class="input-large" />
                        </div>
                    </div>

                    <div class="par control-group">
                        <label class="control-label" for="prenom">Prénom(s)</label>
                        <div class="controls">
                            <input value="<?php echo set_value('prenom'); ?>" id="prenom" name="prenom" type="text" class="input-large" />
                        </div>
                    </div>
                    <div class="par control-group">
                        <label class="control-label" for="sexe">Sexe</label>
                        <div class="controls">
                            <select name="sexe" id="sexe">
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>
                    </div>
                    <div class="par control-group">
                        <label class="control-label" for="email">E-mail</label>
                        <div class="controls">
                            <input value="<?php echo set_value('email'); ?>" id="email" name="email" type="email" class="input-large" />
                        </div>
                    </div>

                    <div class="par control-group">
                        <label class="control-label" for="password">Mot de passe</label>
                        <div class="controls">
                            <input value="<?php echo set_value('password'); ?>" id="password" name="password" type="password" class="input-large" />
                        </div>
                    </div>
                    <div class="par control-group">
                        <label class="control-label" for="confirm_password">Confirmer du mot de passe</label>
                        <div class="controls">
                            <input value="<?php echo set_value('confirm_password'); ?>" id="confirm_password" name="confirm_password" type="password" class="input-large" />
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
