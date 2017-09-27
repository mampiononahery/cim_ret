<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 29/09/15
 * Time: 15:24
 */

if( ! defined('BASEPATH')) exit('No direct Script access allowed');

function css_url($nom){
    return base_url('assets/css/'.$nom.'.css');
}

function js_url($nom){
    return base_url('assets/js/'.$nom.'.js');
}

function fonts_url($nom){
    return base_url('assets/fonts/'.$nom);
}

function images_url($nom){
    return base_url('assets/images/'.$nom);
}

function image_produit_url($nom){
    return base_url('imagesProduit/'.$nom);
}

function img($nom, $alt = ''){
    return '<img src="' . img_url($nom) . '"alt=' . $alt . '" />';
}

function js_files($js_files){
    $res = "";
    foreach($js_files as $js_file){
        $res .= '<script type="text/javascript" src="';
        $res .= js_url($js_file);
        $res .= '"></script>';
        $res .= "\n";
    }
    return $res;
}

function css_files($css_files){
    $res = "";
    foreach($css_files as $css_file){
        $res .= '<link rel="stylesheet" href="';
        $res .= css_url('style.default');
        $res .= '" type="text/css" />';
        $res .= "\n";
    }
    return $res;
}

function php2js( $php_array, $js_array_name ) {
    if( !is_array( $php_array ) ) {
        trigger_error( "php2js() => 'array' attendu en parametre 1, '".gettype($array)."' fourni !?!");
        return false;
    }
    if( !is_string( $js_array_name ) ) {
        trigger_error( "php2js() => 'string' attendu en parametre 2, '".gettype($array)."' fourni !?!");
        return false;
    }
    $script_js = "var $js_array_name = new Array();\n";
    foreach( $php_array as $key => $value ) {
        if( is_array($value) ) {
            $temp = strtr(uniqid('temp_', true),".","_");
            $t = php2js( $value, $temp );
            if( $t===false ) return false;
            $script_js.= $t;
            $script_js.= "{$js_array_name}['{$key}'] = {$temp};\n";
        }
        elseif( is_int($key) ) $script_js.= "{$js_array_name}[{$key}] = '{$value}';\n";
        else $script_js.= "{$js_array_name}['{$key}'] = '{$value}';\n";
    }
    return $script_js;
}

function notEmptyStringArray($strings){
    if(!is_array($strings))
        return false;

    foreach($strings as $string){
        if($string == '' || !isset($string))
            return false;
    }
    return true;
}

function dbResultToFlot($results, $col1){
    $toFlot = array();
    foreach($results as $result){
        array_push($toFlot, array($result->$col1, $result->valeur));
    }
    return $toFlot;
}

function getAnneeEnCours(){
    $date = new DateTime();
    $anneeEnCours = $date->format('Y');
    return $anneeEnCours;
}

function prince_format($valeur){
    return number_format($valeur, 0, ',', ' ') . " Ar";
}

function english_to_french_date($date){
    return date("d-m-Y", strtotime($date));
}