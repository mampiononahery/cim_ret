<div class="row">    <div  id="barre_retouches" class="col-md-10 col-md-offset-1">        <ul class="list-inline" style="display: table; margin:0 auto;">            <li ><a href="<?php echo site_url('home/retouchesbeaute'); ?>">&nbsp;&nbsp;PORTRAIT&nbsp;&nbsp;</a>            </li>            <li><a href="<?php echo site_url('home/retouchesmontage'); ?>">&nbsp;&nbsp;<font color="">MAKE UP</font>&nbsp;&nbsp;</a></li>            <li><a href="<?php echo site_url('home/retouchesmagazine'); ?>">&nbsp;&nbsp;MODE&nbsp;&nbsp;</a>            </li>            <li class="ractive"><a href="<?php echo site_url('home/retouchesobjet'); ?>">&nbsp;&nbsp;PHOTO MONTAGE&nbsp;&nbsp;&nbsp;&nbsp;</a>            </li>                        <li><a href="#">&nbsp;&nbsp;DIVERS&nbsp;&nbsp;&nbsp;&nbsp;</a>            </li>        </ul>        <script type="text/javascript">            function previ() {                var i = 1;                $("#standard").hide();                for (i; i <= 2; i++) {                    $("#b" + i).hide();                }                var enc = $("#pardef").val();                var aff = parseInt(enc) - 1;                if (aff < 1) {                    $("#b1").show();                } else {                    $("#b" + aff).show();                }                $("#pardef").val(aff);            }            function nexta() {                var i = 1;                $("#standard").hide();                for (i; i <= 2; i++) {                    $("#b" + i).hide();                }                var enc = $("#pardef").val();                var aff = parseInt(enc) + 1;                if (aff > 2) {                    $("#b2").show();                } else {                    $("#b" + aff).show();                }                $("#pardef").val(aff);            }        </script>    </div></div><div class="row">    <div class="col-md-10 col-md-offset-1" id="contenubeaute">        <div class="row">              <img class="slider-arrow sa-left" style="position: fixed;margin-left: 33%;margin-top: 314px;z-index: 100;" onclick="javascript:previ();" src="https://www.myretooch.com/images/prev.png">            <img class="slider-arrow sa-right" style="position: fixed;margin-right: 32%;margin-top: 314px;z-index: 100;" onclick="javascript:nexta();" src="https://www.myretooch.com/images/next.png" >            <div class="col-xs-12" id="apercu_retouche">                <div class="limage" id="affichage">                    <a href="javascript:toggle('<?php echo base_url(); ?>photos/objet/', 'crayon-couleur-objet-03_or___recadrer.jpg', 'beaute');" onMouseOver="document.beautes.src = '<?php echo base_url(); ?>photos/objet/avant/crayon-couleur-objet-03_or___recadrer.jpg';                            avant();" onMouseOut="document.beautes.src = '<?php echo base_url(); ?>photos/objet/apres/crayon-couleur-objet-03_or___recadrer.jpg';                                    apres();" id="standard">                        <img src="<?php echo base_url(); ?>photos/objet/apres/crayon-couleur-objet-03_or___recadrer.jpg" width="400" height="600" name="beautes" id="beaute">                    </a>                    <a href="javascript:toggle('<?php echo base_url(); ?>photos/objet/', 'crayon-couleur-objet-03_or___recadrer.jpg', 'montages1');" onMouseOver="document.montage1.src = '<?php echo base_url(); ?>photos/objet/avant/crayon-couleur-objet-03_or___recadrer.jpg';                            avant();" onMouseOut="document.montage1.src = '<?php echo base_url(); ?>photos/objet/apres/crayon-couleur-objet-03_or___recadrer.jpg';                                    apres();" id="b1" class="beaute">                        <img src="<?php echo base_url(); ?>photos/objet/apres/crayon-couleur-objet-03_or___recadrer.jpg" width="400" height="600"  name="montage1" id="montages1">                    </a>                    <a href="javascript:toggle('<?php echo base_url(); ?>photos/objet/', 'PhotoObjet-lunette-chanel1___2.jpg', 'montage2');" onMouseOver="document.montage2.src = '<?php echo base_url(); ?>photos/objet/avant/PhotoObjet-lunette-chanel1___2.jpg';                            avant();" onMouseOut="document.montage2.src = '<?php echo base_url(); ?>photos/objet/apres/PhotoObjet-lunette-chanel1___2.jpg';                                    apres();" id="b2" class="beaute">                        <img src="<?php echo base_url(); ?>photos/objet/apres/PhotoObjet-lunette-chanel1___2.jpg" width="400" height="600"  name="montage2" id="montage2">                    </a>                    <div id="textephoto">APRES</div>                </div>                <div align="center"                     style="position:relative; top:5px; height: 50px; left:10px; color:#FFF; font-weight:bold; font-family:Tahoma, Geneva, sans-serif; font-size:12px">                    (PASSER LA SOURIS SUR UNE PHOTO )                    <div id="likebox">                        <span class="share" style="position : relative; left:50%;">                            <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo current_url() . "?id=#b1"; ?>&layout=box_count&show_faces=true&width=65&action=like&font=arial&colorscheme=light&height=65" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:65px; height:65px; margin-top:3px;z-index: 100" allowTransparency="true"></iframe>                                <a name="fb_share" type="box_count" share_url="<?php echo current_url() . "?id=#b1"; ?>" style="z-index: 100"></a>    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>                        </span>                    </div>                </div>            </div>        </div>    </div></div>