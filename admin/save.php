<?php 
$info = $_POST['info'];

function write_json( $filename, $data ){
  file_put_contents(
    $filename,
    json_encode($data, JSON_PRETTY_PRINT)
  );
}

if( !empty($_POST['info']['video'] ) ){
  preg_match( "/[0-9a-z_-]+$/i", $_POST['info']['video'], $coincidencias );
  if( count( $coincidencias ) > 0 && strlen($coincidencias[0]) == 11 ){
    $info['video'] = $coincidencias[0];
  }else{
    $info['video'] = NULL;
  }
}

$info['datos_personales'] = [];
if( isset( $_POST['dp_clave'] ) && isset($_POST['dp_valor'] )):
  foreach( $_POST['dp_clave'] as $indice => $clave ){
    $info['datos_personales'][$clave] = $_POST['dp_valor'][$indice] ?? '';
  }
endif;

write_json( "../data/about.json", $info );
/*
file_put_contents(
  "../data/about.json",
  json_encode(
    $info,
    JSON_PRETTY_PRINT
  )
);
*/
if( $_FILES['foto']['size'] > 0 ){
  move_uploaded_file(
    $_FILES['foto']['tmp_name'],
    "../assets/img/perfil.jpg"
  );
}


if( $_FILES['cover']['size'] > 0 ){
  move_uploaded_file(
    $_FILES['cover']['tmp_name'],
    "../img/video.jpg"
  );
}



$experiencias = [];
if( isset( $_POST['exp_empresa'] ) ){
  foreach( $_POST['exp_empresa'] as $indice => $empresa ){
    $experiencias[] = [
      'empresa' => $empresa,
      'cargo' =>  $_POST['exp_cargo'][$indice],
      'desde' =>  $_POST['exp_desde'][$indice],
      'hasta' =>  $_POST['exp_hasta'][$indice],
      'info' =>  $_POST['exp_info'][$indice]
    ];
  }
}
write_json( "../data/experiencias.json", $experiencias );




$academico = [];
if( isset( $_POST['ac_instituto'] ) ){
  foreach( $_POST['ac_instituto'] as $indice => $instituto ){
    $academico[] = [
      'instituto' => $instituto,
      'titulo' =>  $_POST['ac_titulo'][$indice],
      'desde' =>  $_POST['ac_desde'][$indice],
      'hasta' =>  $_POST['ac_hasta'][$indice],
      'info' =>  $_POST['ac_info'][$indice]
    ];
  }
}
write_json( "../data/ahyorya.json", $academico );


header("Location: index.php");