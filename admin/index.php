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
    <fieldset id="datos_personales">
      <legend>Datos personales</legend>
      <div class='row'><?php 
      foreach($json_user_data['datos_personales'] as $clave => $valor){
        echo <<<HTML
          <div><input type="text" placeholder="Nombre del dato" autocomplete="off" name="dp_clave[]" value="$clave" /><input type="text" placeholder="Valor del dato" autocomplete="off" name="dp_valor[]" value="$valor" /><a href='javascript:void(0)' class='dp-delete'>x</a></div>
        HTML;
      }
      ?></div>
      <button type="button">Agregar dato</button>
    </fieldset>

    <fieldset id="experiencia_laboral">
      <legend>Experiencia Laboral</legend>

      <div class='row'><?php 
      foreach( $json_jobs as $job ){
        echo <<<HTML
          <div>
            <a href='javascript:void(0)' class='exp-delete'>x</a>
            <div class='subdiv'>
              <input type="text" name="exp_empresa[]" value="$job[empresa]" placeholder="Nombre de la empresa" />
              <input type="text" name="exp_cargo[]" value="$job[cargo]" placeholder="Cargo en la empresa" />
            </div>
            <div class='subdiv'>
              <input type="number" name="exp_desde[]" value="$job[desde]" placeholder="Inicio" />
              <input type="number" name="exp_hasta[]" value="$job[hasta]" placeholder="Fin" />
            </div>
            <textarea rows="6" cols="40" placeholder="Qué cosas hiciste en ese trabajo" name="exp_info[]">$job[info]</textarea>
          </div>
        HTML;
      } 
      ?></div>
      <button type="button">Agregar experiencia</button>
    </fieldset>



    <fieldset id="formacion_academica">
      <legend>Formación Académica</legend>

      <div class='row'><?php 
      foreach( $json_academic as $academy ){
        echo <<<HTML
          <div>
            <a href='javascript:void(0)' class='ac-delete'>x</a>
            <div class='subdiv'>
              <input type="text" name="ac_instituto[]" value="$academy[instituto]" placeholder="Nombre del instituto" />
              <input type="text" name="ac_titulo[]" value="$academy[titulo]" placeholder="Titulo o certificación obtenido" />
            </div>
            <div class='subdiv'>
              <input type="number" name="ac_desde[]" value="$academy[desde]" placeholder="Inicio" />
              <input type="number" name="ac_hasta[]" value="$academy[hasta]" placeholder="Fin" />
            </div>
            <textarea rows="6" cols="40" placeholder="Qué cosas aprendiste en el curso" name="ac_info[]">$academy[info]</textarea>
          </div>
        HTML;
      } 
      ?></div>
      <button type="button">Agregar estudios</button>
    </fieldset>



    <button type="submit">Enviar</button>
  </form>
  <script src="assets/dom.js"></script>
  <script src="assets/script.js"></script>
</body>
</html>