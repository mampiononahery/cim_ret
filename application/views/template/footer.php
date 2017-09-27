 <div class="row">
        	
        	
        <div class="col-md-10 col-md-offset-1" id="footer">
        	<ul class="list-inline">
        		<li><a href="<?php echo site_url('home/aboutus');?>">Qui sommes nous ?</a></li>
        		<li><a href="">Signaler un abus</a></li>
        		<li><a href=""> &copy; My Retooch 2014 Tous droits réservés</a></li>
        	</ul>
      
        
        </div>
        
      
        
        
        </div>


        </div>
<script>

    function left(){
        var left = parseInt($(".portion-vignettes").css("left"));
        left += 230;
        $(".portion-vignettes").css("left", left+"px");
    }

    function right(){
        var left = parseInt($(".portion-vignettes").css("left"));
        left -= 230;
        $(".portion-vignettes").css("left", left+"px");
    }

/*jQuery('.slider').lbSlider({
    leftBtn: '.sa-left',
    rightBtn: '.sa-right',
    visible: 8,
    autoPlay: false
    
});*/
//if($(":file")) $(":file").fileStyle();
<?php if(isset($class) && isset($id)) { ?>
    $(document).ready(function(){
        chargement(<?php echo "'".$class."','".$id."'"; ?>);
    });
<?php } ?>
</script>
<div id="fb-root"></div>
<div id="fb-root"></div>
<div id="fb-root"></div>
<script  type="text/javascript">
$(document).ready(function()
{
    $('img').bind('contextmenu', function(e){
        return false;
    }); 
});
</script>



    </body>

    </html>
