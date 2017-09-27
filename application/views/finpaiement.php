<div class="row">
    <div class="col-xs-10 col-xs-offset-1" id="contenufinpaiement">
        <form class="form-horizontal" action="envoyerPhoto" method="post">
            <?php for($i = 0; $i < $nbimages; $i++) { ?>
                <div class="row">
                    <div class="form-group">
                        <div class="col-xs-2 col-xs-offset-1">
                            <input class="form-control" type="file" name="image" >
                            <input name="image" type="file" class="filestyle" data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus" data-buttonText="Choisissez votre image">
                        </div>
                        <div class="col-xs-8">
                            <input class="form-control" type="text" name="commentaire" placeholder="Placez votre commentaire ici">
                        </div>
                    </div>
                </div>
            <?php } ?>
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