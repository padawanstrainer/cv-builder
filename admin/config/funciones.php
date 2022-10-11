<?php 
function create_user_data( ){
  global $json_user_data;

  echo <<<HTML
    <h1>$json_user_data[nombre]</h1>
    <img src="assets/img/perfil.jpg" alt='Nombre de la persona' />
    <p>$json_user_data[subtitulo]</p>
HTML;
}

function create_about_me( ){
  global $json_user_data;
  $biografia = nl2br( $json_user_data['biografia'] ); 
  echo <<<HTML
    <h2>Sobre mí</h2>
    <p>$biografia</p>
HTML;
}
