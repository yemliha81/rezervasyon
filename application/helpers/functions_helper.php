<?php
function debug( $var ) {
    echo '<pre>'; print_r($var); die();
}

function img_seo_name($s) {
    $tr = array('ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç');
    $eng = array('s','s','i','i','g','g','u','u','o','o','c','c');
    $s = str_replace($tr,$eng,$s);
    $s = strtolower($s);
	$s = preg_replace('/[^.%a-z0-9 _-]/', '', $s);
	$s = preg_replace('/&+?;/', '', $s);
    $s = preg_replace('/\s+/', '-', $s);
    $s = preg_replace('|-+|', '-', $s);
    $s = trim($s, '-');
 
    return $s;
}