<div class="row">
    <div class="col-xs-10 col-xs-offset-1" id="contenufinpaiement">
        <form class="form-horizontal" action="complete_profile_action" method="post">
            <input type="hidden" name="next" value="<?php echo $next ?>" >
            <div class="row">
                <div class="form-group">
                    <div class="col-xs-3 col-xs-offset-1">
                        <label for="password">Mot de passe :</label>
                    </div>
                    <div class="col-xs-7">
                        <input class="form-control" type="password" name="password" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-xs-3 col-xs-offset-1">
                        <label for="confirm_password" >Confirmer votre mot de passe :</label>
                    </div>
                    <div class="col-xs-7">
                        <input class="form-control" type="password" name="confirm_password" >
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-xs-2 col-xs-offset-1">
                        <input class="btn btn-default" type="submit" value="Valider">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>