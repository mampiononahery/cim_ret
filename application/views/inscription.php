<div class="row">
    <div class="col-xs-10 col-xs-offset-1" id="contenu_authentification"> <a href="<?php echo base_url(" home/authentification ")?>" class="btn btn-default">Se connecter</a>
        <center>
            <h1>Inscription</h1></center>
        <form class="form-horizontal" action="<?php echo base_url('home/register'); ?>" method="post">
            <div class="row">
                <div class="form-group">
                    <label for="email" class="col-xs-2 col-xs-offset-1">Email :</label>
                    <div class="col-xs-8">
                        <input type="email" name="email" class="form-control"> </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="login" class="col-xs-2 col-xs-offset-1">Login :</label>
                    <div class="col-xs-8">
                        <input type="text" name="login" class="form-control"> </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="password" class="col-xs-2 col-xs-offset-1">Mot de passe :</label>
                    <div class="col-xs-8">
                        <input type="password" name="password" class="form-control"> </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="password2" class="col-xs-2 col-xs-offset-1">Confirmation :</label>
                    <div class="col-xs-8">
                        <input type="password" name="password2" class="form-control"> </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="nom" class="col-xs-2 col-xs-offset-1">Nom :</label>
                    <div class="col-xs-8">
                        <input type="text" name="nom" class="form-control"> </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="prenoms" class="col-xs-2 col-xs-offset-1">Prénoms :</label>
                    <div class="col-xs-8">
                        <input type="text" name="prenoms" class="form-control"> </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="adresse" class="col-xs-2 col-xs-offset-1">Adresse :</label>
                    <div class="col-xs-8">
                        <input type="text" name="adresse" class="form-control"> </div>
                </div>
            </div>
            <div class="form-group">
                <input class="btn btn-default col-xs-offset-1" type="submit" value="Valider"> </div>
        </form>
    </div>
</div>