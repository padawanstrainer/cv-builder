<?php 
function get_json( $filename ){
  $base = dirname(__DIR__, 2).'/data';
  $json = json_decode( file_get_contents($base.'/'.$filename ), true );
  return $json;
}

$json_user_data = get_json('about.json');
$json_jobs = get_json('experiencias.json');
$json_academic = get_json('ahyorya.json');
$json_skills = get_json('skills.json');
$json_hobbies = get_json('hobbies.json');
$json_otros = get_json('otros.json');
$json_recomendaciones = get_json('recomendaciones.json');


$a_iconos = [ 'castor-black.png' ];
$opciones = [];
foreach( $a_iconos as $i ){
  $opciones[] = "<option>$i</option>";
}
$opciones_iconos = implode($opciones);