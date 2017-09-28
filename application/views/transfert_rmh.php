<?php $radoms = rand(0,10); ?>
<div id="content_acpuisition" class="row">
	<div class="col-md-offset-1 col-md-10">
		<div class="row">
			<div class="col-md-2">
				<h3 class="head_acpuisition">Répertoire</h3>
				<button type="button" class="btn btn-primary btn-small btn-block">Lingerie</button>
				<button type="button" class="btn btn-primary btn-small btn-block">Mode</button>
				<button type="button" class="btn btn-primary btn-small btn-block">Extérieur</button>
			</div>
			<div class="col-md-8">
				<h3 class="head_acpuisition">Selection</h3>
				<div class="picto_selection">
				
					<div class="chosing_picto">
						<img class="selection_<?php echo $radoms; ?>" src="<?php echo base_url('assets/images/12.jpg'); ?>" alt="selection">
						<input class="chose_position" type="checkbox" name="selection_<?php echo $radoms; ?>">
					</div>
					
					<div class="chosing_picto">
						<img class="selection_<?php echo $radoms; ?>" src="<?php echo base_url('assets/images/12.jpg'); ?>" alt="selection">
						<input class="chose_position" type="checkbox" name="selection_<?php echo $radoms; ?>">
					</div>
					
					<div class="chosing_picto">
						<img class="selection_<?php echo $radoms; ?>" src="<?php echo base_url('assets/images/12.jpg'); ?>" alt="selection">
						<input class="chose_position" type="checkbox" name="selection_<?php echo $radoms; ?>">
					</div>
					
				</div>
				
				<button type="button" class="btn btn-primary add_img">Ajouter images</button>
				
			</div>
			<div class="col-md-2">
				<h3 class="head_acpuisition">Commentaire</h3>
				<ul class="coment_liste">
					<li>Retoucher les yeux</li>
					<li>Retires les rides & Lisser la peau ....</li>
					<li>Eclaircir la peau et la lissé</li>
					<li>.........................</li>
					<li>.........................</li>
					<li>.........................</li>
					<li>.........................</li>
					<li>.........................</li>
					<li>.........................</li>
				</ul>
			</div>
		</div>
		<div class="content_etapes">
			<ul class="etapes_commentaire">
				<li class="etapes_actives">	
					<i class="fa fa-check-square-o" aria-hidden="true"></i>
					<span class="desc">Choix de la prestation</span>
				</li>
				<li class="arrow_next etapes_actives">	
					<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
				</li>
				<li class="etapes_actives">
					<i class="fa fa-paypal" aria-hidden="true"></i>
					<span class="desc">Paiement</span>
				</li>
				<li class="arrow_next">	
					<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
				</li>
				<li>
					<i class="fa fa-database" aria-hidden="true"></i>
					<span class="desc">Téléchargement des photos</span>
				</li>
				<li class="arrow_next">	
					<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
				</li>
				<li>
					<i class="fa fa-info" aria-hidden="true"></i>
					<span class="desc">Inscription</span>
				</li>
				<li class="arrow_next">	
					<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
				</li>
				<li>
					<i class="fa fa-cogs" aria-hidden="true"></i>
					<span class="desc">Choix des identifiant et mot de passe</span>
				</li>
			</ul>
		</div>
		<div class="content_btn_transfert">
			<button type="button" class="btn btn-primary">Transfert</button>
			<button type="button" class="btn btn-danger">Annuler</button>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('.selection_<?php echo $radoms; ?>').click(function(){
			$(this).each(function(){
				$(this).parent('.chosing_picto').toggleClass('picto_schecked');
				var is_checked = $(this).parent('.chosing_picto').hasClass('picto_schecked');
				if(is_checked !== true){
					$(this).parent('.chosing_picto').find('.chose_position').attr('checked', false);
				}else{
					$(this).parent('.chosing_picto').find('.chose_position').attr('checked', true);
				}
				//$('.picto_schecked').find('.chose_position').attr('checked', true);
			});
		});
	});
</script>


<style type="text/css">
	#content_acpuisition {
		margin-bottom: 30px;
	}
	#content_acpuisition > div {
		background-color: #181818;
	}
	#content_acpuisition h3.head_acpuisition {
		text-align: center;
		color: #ffffff;
	}
	#content_acpuisition .chosing_picto {
		display: inline-table;
		width: 90px;
		height: 135px;
		overflow: hidden;
		margin-bottom: 15px;
		cursor: pointer;
		position: relative;
	}
	#content_acpuisition .chose_position {
		position: absolute;
		right: 5px;
		top: 0;
		z-index: 2;
	}
	#content_acpuisition .chosing_picto img {
		width: 100%;
	}
	#content_acpuisition .coment_liste {
		margin: 0;
		padding: 0;
	}
	#content_acpuisition .coment_liste li {
		list-style-type: no;
		text-align: left;
		font-size: 12px;
		color: #ffffff;
	}
	#content_acpuisition .etapes_commentaire {
		margin: 0;
		padding: 0;
		text-align: center;
		margin-top: 50px;
		margin-bottom: 30px;
	}
	#content_acpuisition .etapes_commentaire li {
		display: inline-block;
		cursor: pointer;
	}
	#content_acpuisition .etapes_commentaire li > i.fa {
		font-size: 50px;
		margin: 0 35px;
	}
	#content_acpuisition .etapes_commentaire li > span.desc {
		display: grid;
		color: #ffffff;
		width: 150px;
		margin-top: 20px;
	}
	#content_acpuisition .etapes_actives {
		color: #00be48;
	}
	#content_acpuisition .arrow_next {
		vertical-align: top;
	}
	#content_acpuisition .arrow_next i.fa {
		margin: 0 !important;
	}
	#content_acpuisition .add_img {
		clear: both;
		float: right;
		margin-top: 50px;
		overflow: hidden;
	}
	#content_acpuisition .content_btn_transfert {
	  margin-bottom: 20px;
	  text-align: right;
	}
</style>