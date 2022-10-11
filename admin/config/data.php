<?php 
function get_json( $filename ){
  $base = dirname(__DIR__, 2).'/data';
  $json = json_decode( file_get_contents($base.'/'.$filename ), true );
  return $json;
}

$json_user_data = get_json('about.json');
#$json_jobs = get_json('jobs.json');