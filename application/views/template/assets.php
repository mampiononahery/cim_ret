<!DOCTYPE html>

<html lang="fr" xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://ogp.me/ns/fb#">

<head>

<meta charset="utf-8">
<?php if(isset($src)) { ?>
    <meta property="og:image" content="<?php echo $src ?>" />
<?php } ?>

<title>MYRETOOCH</title>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-dialog.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fileupload/css/jquery.fileupload.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fileupload/css/jquery.fileupload-ui.css"> 

<!-- Generic page styles -->
<!-- <link rel="stylesheet" href="<?php echo base_url();?>css/css/templates.css"> -->
<!-- blueimp Gallery styles -->
<!-- <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css"> -->
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<!-- <link rel="stylesheet" href="<?php echo base_url();?>css/css/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo base_url();?>css/css/jquery.fileupload-ui.css"> -->
<!-- CSS adjustments for browsers with JavaScript disabled -->
<!-- <noscript><link rel="stylesheet" href="<?php echo base_url();?>css/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="<?php echo base_url();?>css/css/jquery.fileupload-ui-noscript.css"></noscript> -->

<!-- <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" id="theme"> -->
<!--     <link rel="stylesheet" href="<?php echo base_url(); ?>js/js/jquery.fileupload-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/css/templates.css"> -->
    <style>
    /*body {
        font-family: Verdana, Arial, sans-serif;
        font-size: 13px;
        margin: 0;
        padding: 20px;
    }*/
    </style>
<!--upload file -->

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">

<noscript><link rel="stylesheet" href="<?php echo base_url(); ?>cssup/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="<?php echo base_url(); ?>cssup/css/jquery.fileupload-ui-noscript.css"></noscript>



<link rel="stylesheet" href="<?php echo base_url('css/jquery-ui.css') ?>" type="text/css" />
<?php echo @css_files($css_files) ?>
<script src="<?php echo base_url('js/jquery.min.1.9.0.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.js"></script>
<script type=text/javascript" src="<?php echo base_url();?>js/bootstrap-dialog.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('js/jquery.ui.min.1.10.2.js') ?>"></script>
<?php echo @js_files($js_files) ?>



<script type="text/javascript">

    $( document ).ready(function() {
        $(".b1").hide();
        $("#mag").hide();
        $(".v1").css({"border":"2px solid orange"});
        $(".formule").prop('disabled', true);

        var src=$("#beaute").attr('src');
        //var url= '<?php echo current_url(); ?>';
        var url= '<?php echo current_url()."?class=v1,b1," ?>' + src;
        facebook(url);
//$(".formule").attr('readonly','readonly');
        $('input:radio[name="pack"]').change(
            function(){
                if ($(this).is(':checked') ) {
                    //Choix pack1
                    if($(this).val() == 'pack1'){
                        initialisation();
                        $("#formule1").attr('disabled',false);
                        $("#item_name").val("Retouche Unitaire");
                        $("#item_number").val("1");
                        $("#amount").val("6.90");
                    }
                    //choix pack2
                    if($(this).val() == 'pack2'){
                        initialisation();
                        $("#formule2").attr('disabled',false);
                        $("#item_name").val("Pack 10 photos");
                        $("#item_number").val("2");
                        $("#amount").val(" 29.90");
                    }
                    //choix pack3
                    if($(this).val() == 'pack3'){
                        initialisation();
                        $("#formule3").attr('disabled',false);
                        $("#item_name").val("Pack 20 photos");
                        $("#item_number").val("3");
                        $("#amount").val(" 39.90");
                    }
                    //choix pack4
                    if($(this).val() == 'pack4'){
                        initialisation();
                        $("#formule4").attr('disabled',false);
                        $("#item_name").val("Pack 30 photos");
                        $("#item_number").val("4");
                        $("#amount").val(" 49.90");
                    }
                    //choix pack5
                    if($(this).val() == 'pack5'){
                        initialisation();
                        $("#formule5").attr('disabled',false);
                        $("#item_name").val("Abonnement 50 photos");
                        $("#item_number").val("5");
                        $("#amount").val(" 49.90");
                    }
                    // $("#formule1").attr('disabled',true);
                }

                //pack1

                $("#formule1").change(function() {
                    var quantite=parseInt($(this).val());
                    var montant=quantite*6.90;
                    var fichier=quantite;
                    $(".total").html(montant.toFixed(2));
                    $("#montantf1").html(montant.toFixed(2));
                    $("#totalfichier").val(fichier);
                    $("#fichier1").html(fichier);
                    $("#custom").val(fichier);
                    $("#quantity").val(quantite);


                });

//pack2
                $("#formule2").change(function() {
                    var quantite=parseInt($(this).val());
                    var montant=parseInt($(this).val())*29.90;
                    var fichier=quantite*10;
                    $(".total").html(montant.toFixed(2));
                    $("#montantf2").html(montant.toFixed(2));
                    $("#totalfichier").val(fichier);
                    $("#fichier2").html(fichier);
                    $("#custom").val(fichier);
                    $("#quantity").val(quantite);


                });
//pack3
                $("#formule3").change(function() {
                    var quantite=parseInt($(this).val());
                    var montant=parseInt($(this).val())*39.90;
                    var fichier=quantite*20;
                    $(".total").html(montant.toFixed(2));
                    $("#montantf3").html(montant.toFixed(2));
                    $("#totalfichier").val(fichier);
                    $("#fichier3").html(fichier);
                    $("#custom").val(fichier);
                    $("#quantity").val(quantite);


                });
//pack4

                $("#formule4").change(function() {
                    var quantite=parseInt($(this).val());
                    var montant=parseInt($(this).val())*49.90;
                    var fichier=quantite*30;
                    $(".total").html(montant.toFixed(2));
                    $("#montantf4").html(montant.toFixed(2));
                    $("#totalfichier").val(fichier);
                    $("#fichier4").html(fichier);
                    $("#custom").val(fichier);
                    $("#quantity").val(quantite);


                });
//pack5
                $("#formule5").change(function() {
                    var quantite=parseInt($(this).val());
                    var montant=parseInt($(this).val())*49.90;
                    var fichier=parseInt($(this).val())*50;
                    $(".total").html(montant.toFixed(2));
                    $("#montantf5").html(montant.toFixed(2));
                    $("#totalfichier").val(fichier);
                    $("#fichier5").html(fichier);
                    $("#custom").val(fichier);
                    $("#quantity").val(quantite);


                });

            });

    });
    function initialisation(){
        $(".formule").prop('disabled', true);
        $(".formule").val("0");
        $(".total").html("0.00");
        $(".montant").html("0.00");
        $(".fichier").html("0");

    }
    function chargement(classe,id){
        var cl="."+classe;
        var lid="#"+id;
        var src=$(cl).attr('src');
        var url= '<?php echo current_url()."?class="; ?>'+classe+","+id+","+src;
        $(".vignette").css({"border":"2px solid  #ee36b2"});
        $(cl).css({"border":"2px solid orange"});
        $("#standard").hide();
        $(".beaute").hide();
        $(lid).show();
        facebook(url);
    }
    function facebook(url){
        $('.share').empty();
        var share_options =  '<iframe src="https://www.facebook.com/plugins/like.php?href=' + url + '&width=300&layout=button&action=like&show_faces=true&share=true&height=46&appId" width="300" height="46" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';
//var share_options = '<iframe src="//www.facebook.com/plugins/like.php?href='+url+'&amp;width&amp;layout=button_count&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=21&amp;appId=192160397588128" scrolling="no" frameborder="0"  style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe>';
        $('.share').html(share_options);
    }
    function avant()
    {
        $("#textephoto").html("AVANT");
    }
    function apres()
    {
        $("#textephoto").html("APRES");
    }

    function toggle(folder, file, id){
        if(document.getElementById("textephoto").innerHTML == "APRES"){
            document.getElementById(id).src=folder+"avant/"+file;
            avant();
        }
        else{
            document.getElementById(id).src=folder+"apres/"+file;
            apres();
        }
    }
</script>

<script src="<?php echo base_url();?>js/jquery.lbslider.js"></script>

