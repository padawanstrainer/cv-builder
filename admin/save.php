<?php 
$info = $_POST['info'];

if( !empty($_POST['info']['video'] ) ){
  preg_match( "/[0-9a-z_-]+$/i", $_POST['info']['video'], $coincidencias );
  if( count( $coincidencias ) > 0 && strlen($coincidencias[0]) == 11 ){
    $info['video'] = $coincidencias[0];
  }else{
    $info['video'] = NULL;
  }
}

file_put_contents(
  "../data/about.json",
  json_encode(
    $info,
    JSON_PRETTY_PRINT
  )
);

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



header("Location: index.php");