
        
        <div class="row">
        	
        	
        <div class="col-md-10 col-md-offset-1" id="contenubeaute">
        	<div id="panier" >
        		<span class="pull-left"> <font face="BebasNeue" size="5px">MON PANIER</font> </span>
        		<span class="pull-right"> <font face="BebasNeue" size="5px">Montant TOTAL:<span class="total">0.00  </span>&euro; </span></font>
        	</div>
        	<div class="promo">
        		<span class="pull-left"> 
        			
        			

    <form class="form-inline">

        <div class="form-group">

            <label>Code promo:</label>

            <input type="text" class="form-control" id="code_promo">

        </div>

       


        <button type="submit" class="btn btn-warning">OK</button>

    </form>


        			
        			
        			
        	    </span>
        		
        	</div>
        	
        	 <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
        	
        <table class="table" callpadding="15" style="border-bottom:1px solid white;border-left:1px solid white; border-right:1px solid white;">
        
        		
        		
        
        	<tbody>
        		<tr class="btn-default">
        		<th></th>
        	    <th></th>
        		<th> <font face="BebasNeue" size="4px" color="#f3b839">Quantité</font></th>
        		<th style="text-align:right;"> <font face="BebasNeue" size="4px" color="#f3b839">Prix unitaire</font></th>
        		<th style="text-align:right;"> <font face="BebasNeue" size="4px" color="#f3b839"> Montant</font></th>
        	</tr>
        		<tr>
        	    <td><input type="radio" name="pack"  value="pack1"/></td>
        		<td>Retouche Unitaire</td>
        		<td> <input type="number"  name="formule1"  id="formule1" class="form-control formule" min="0"  value="0" style="width:80px;"></td>
        		<td style="text-align:right;"><span class="text-right"></span> 6,90 &euro;</td>
        		<td style="text-align:right;"> <span id="montantf1" class="montant">0.00 </span>&euro;</td>
        	</tr>
        
        	<tr>
        		<td><input type="radio" name="pack" value="pack2"/></td>
        		<td>Pack 10 photos</td>
        		
        		<td> <input type="number"  name="formule2"   id="formule2" class="form-control formule" min="0"  value="0" style="width:80px;"></td>
        		<td style="text-align:right;"> 29,90 &euro;</td>
        		<td style="text-align:right;"> <span id="montantf2" class="montant">0.00 </span> &euro;</td>
        	</tr>
        	
        	<tr>
        		 <td><input type="radio" name="pack" value="pack3"/></td>
        		<td>Pack 20 photos</td>
        		
        		<td> <input type="number"  name="formule3"   id="formule3" class="form-control formule" min="0"  value="0" style="width:80px;"></td>
        		<td style="text-align:right;"> 39,90 &euro;</td>
        		<td style="text-align:right;"><span id="montantf3" class="montant">0.00 </span>  &euro;</td>
        	</tr>
        	<tr>
        		 <td><input type="radio" name="pack" value="pack4"/></td>
        		<td>Pack 30 photos</td>
        	
        		<td> <input type="number"  min="0" class="form-control formule" min="0"  value="0" name="formule4"  id="formule4" style="width:80px;"></td>
        		<td style="text-align:right;"> 49,90 &euro;</td>
        		<td style="text-align:right;"> <span id="montantf4" class="montant">0.00  </span> &euro;</td>
        	</tr>
        	<tr>
        		 <td><input type="radio" name="pack" value="pack5"/></td>
        		<td>  <font color:"red">Abonnement 50 photos</font> </td>
        		
        		<td> <input type="number"  min="0"  class="form-control formule" min="0"  value="0" name="formule5"   id="formule5" style="width:80px;"></td>
        		<td style="text-align:right;"> 49,90 &euro; hebdomadaire</td>
        		<td style="text-align:right;">  <span id="montantf5" class="montant">0.00  </span>  &euro;</td>
        	</tr>
        	<tr style="border-top:1px solid white;border-bottom: 1px solid white">
        		<td></td>
        		<td></td>
        		
        		<td> </td>
        		<td style="text-align:right;"><font face="BebasNeue" size="5px">MONTANT TOTAL:&nbsp;</font> </td>
        		<td style="text-align:right;"> <font face="BebasNeue" size="5px"><span class="total">0.00  </span>  &euro;</font></td>
        	</tr>
        	<tr>
        		<td></td>
        		<td></td>
        		<td></td>
        		<td> </td>
        		<td style="text-align:right;"> <button class="btn btn-warning" type="submit" width="200px">Valider & Payer</button></td>
        	</tr>
        		
        	</tbody>
        </table>
    <input type="hidden" name="cmd" value="_xclick">
     <input name="notify_url" type="hidden" value="<?php echo site_url('notification');?>" />
	 <input type="hidden" name="business"   id="business" value="soiby-facilitator@gmail.com">
	 <input type="hidden" name="item_name" id="item_name"  value="">
	 <input type="hidden" name="item_number" id="item_number" value="">
	 <input type="hidden" name="amount"  id="amount" value="">
	 <input type="hidden" name="quantity" id="quantity" value="">
	 <input type="hidden" name="no_shipping" value="1">
	 <input type="hidden" name="no_note" value="1">
	 <input type="hidden" name="currency_code" value="EUR">
	 <input type="hidden" name="lc" value="FR">
	 <input type="hidden" name="bn" value="PP-BuyNowBF">
	 <input type="hidden" name="return" value="<?php echo site_url('home/finpaiement');?>">
	 <input name = "cbt" value ="Continuer sur myretooch.com" type = "hidden">
	 <input type="hidden" name="cancel_return" value="<?php echo site_url('home/formules');?>">
	 <input type="hidden" name="rm" value="2">
	 <input name ="custom" id="custom" value ="" type = "hidden">
     <input  name="totalfichier" type="hidden" id="totalfichier"  value="0" />
     
</form>
        
        
     
        
        </div>
         </div>
        
 
