<?php 
require 'config/data.php';
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Contenidos</title>
  <link rel="stylesheet" href="assets/estilos.css" />
</head>
<body>
  <h1>Editar tu CV :)</h1>
  <form method="post" action="save.php" enctype="multipart/form-data">
    <fieldset>
      <legend>Información personal</legend>
      <div>
        <span>Tu nombre</span>
        <input type="text" name="info[nombre]" autocomplete="off" value="<?php echo $json_user_data['nombre']; ?>" />
      </div>
      <div>
        <span>Tu foto</span>
        <input type="file" name="foto" accept="image/*" />
      </div>
      <div>
        <span>Profesión (leyenda / subtitulo)</span>
        <input type="text" name="info[subtitulo]" autocomplete="off" value="<?php echo $json_user_data['subtitulo']; ?>" />
      </div>
  
      <div>
        <span>Tené Video de Chutube?</span>
        <input type="text" name="info[video]" value="<?php echo $json_user_data['video'] ?? ''; ?>" />
        <small>OJO que es solo el ID del video</small>
      </div>
      <div>
        <span>Cover del Video</span>
        <input type="file" name="cover" accept="image/*" />
      </div>
      <div>
        <span>Mini biogafía (Acerca de tí)</span>
        <textarea name="info[biografia]" rows="10" cols="80"><?php echo $json_user_data['biografia']; ?></textarea>
      </div>
    </fieldset>

    <button type="submit">Enviar</button>
  </form>
</body>
</html>