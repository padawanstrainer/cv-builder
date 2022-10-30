<?php 
require 'config/data.php';
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Contenidos</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Righteous&family=Rubik:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/estilos.css" />
  <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
  <script src="/libs/ckfinder-3.4/ckfinder.js"></script>
  
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
      <div class='v-top'>
        <span>Mini biogafía (Acerca de tí)</span>
        <textarea name="info[biografia]" id="biografia" rows="10" cols="80"><?php echo $json_user_data['biografia']; ?></textarea>
      </div>
    </fieldset>
    <fieldset id="datos_personales">
      <legend>Datos personales</legend>
      <div class='row'><?php 
      foreach($json_user_data['datos_personales'] as $clave => $valor){
        echo <<<HTML
          <div class='row-item'><input type="text" placeholder="Nombre del dato" autocomplete="off" name="dp_clave[]" value="$clave" /><input type="text" placeholder="Valor del dato" autocomplete="off" name="dp_valor[]" value="$valor" /><a href='javascript:void(0)' class='dp-delete'>x</a></div>
        HTML;
      }
      ?></div>
      <button type="button" class='add-item'>Agregar dato</button>
    </fieldset>

    <fieldset id="experiencia_laboral">
      <legend>Experiencia Laboral</legend>

      <div class='row'><?php 
      foreach( $json_jobs as $job ){
        echo <<<HTML
          <div class='row-box'>
            <div class='subdiv'>
              <input type="text" name="exp_empresa[]" value="$job[empresa]" placeholder="Nombre de la empresa" />
              <input type="text" name="exp_cargo[]" value="$job[cargo]" placeholder="Cargo en la empresa" />
            </div>
            <div class='subdiv'>
              <input type="date" name="exp_desde[]" value="$job[desde]" placeholder="Inicio" />
              <input type="date" name="exp_hasta[]" value="$job[hasta]" placeholder="Fin" />
            </div>
            <div>
              <textarea rows="6" cols="40" placeholder="Qué cosas hiciste en ese trabajo" name="exp_info[]">$job[info]</textarea>
            </div>
            <a href='javascript:void(0)' class='exp-delete'>eliminar</a>
          </div>
        HTML;
      } 
      ?></div>
      <button type="button" class='add-item'>Agregar experiencia</button>
    </fieldset>



    <fieldset id="formacion_academica">
      <legend>Formación Académica</legend>

      <div class='row'><?php 
      foreach( $json_academic as $academy ){
        echo <<<HTML
          <div class='row-box'>
            <div class='subdiv'>
              <input type="text" name="ac_instituto[]" value="$academy[instituto]" placeholder="Nombre del instituto" />
              <input type="text" name="ac_titulo[]" value="$academy[titulo]" placeholder="Titulo o certificación obtenido" />
            </div>
            <div class='subdiv'>
              <input type="date" name="ac_desde[]" value="$academy[desde]" placeholder="Inicio" />
              <input type="date" name="ac_hasta[]" value="$academy[hasta]" placeholder="Fin" />
            </div>
            <div>
              <textarea rows="6" cols="40" placeholder="Qué cosas aprendiste en el curso" name="ac_info[]">$academy[info]</textarea>
            </div>
            <a href='javascript:void(0)' class='ac-delete'>eliminar</a>
          </div>
        HTML;
      } 
      ?></div>
      <button type="button" class='add-item'>Agregar estudios</button>
    </fieldset>


    <fieldset id="habilidades">
      <legend>Habilidades</legend>
      <div>
        <span>Seleccione formato</span>
        <select name="skills_formato">
            <option <?php if($json_skills['formato'] == 'Barras' ) echo 'selected'; ?>>Barras</option>
            <option <?php if($json_skills['formato'] == 'Círculos' ) echo 'selected'; ?>>Círculos</option>
        </select>
      </div>
      <div class='row'><?php 
      foreach( $json_skills['skills'] as $skill ):
        echo <<<HTML
          <div class="row-item row-skill">
              <input required type="text" name="skills_name[]" placeholder="Habilidad - Ej: HTML, Diseño, Cerrar puertas" value='$skill[nombre]'>
              <input required type="number" name="skills_value[]" placeholder="Porcentaje (solo número)"  value='$skill[porcentaje]'  min="1" max="100">
              <span class="color_label">Color del gráfico</span>
              <input required type="color" name="skills_color[]"  value='$skill[color]'>
              <a href="javascript:void(0)" class='skill-delete'>x</a>
          </div>
HTML;
      endforeach; ?></div>
      <button type="button" class='add-item'>Agregar habilidad</button>
    </fieldset>


    <fieldset id="hobbies">
      <legend>Hobbies</legend>
      <div class='row'><?php 
      foreach($json_hobbies as $j):
        echo <<<HTML
      <div class="row-item">
        <input name="hobbie_name[]" required type="text" placeholder="Nombre del hobbie" value='$j[nombre]'>
        <select name="hobbie_icon[]">$opciones_iconos</select>
        <a href="javascript:void(0)" class='hobbie-delete'>x</a>
        </div>
      HTML; 
endforeach;
      ?></div>

      <button type="button" class='add-item'>Agregar hobbie</button>
    </fieldset>

    <fieldset id="recomendaciones">
      <legend>Recomendaciones</legend>
      <div class="row"><?php 
      foreach( $json_recomendaciones as $r ):
        echo <<<HTML
        <div class="row-box">
            <div class="subdiv">
              <input name="rec_name[]" required type="text" placeholder="Nombre del recomendador" value="$r[nombre]">
              <input name="rec_relacion[]" required type="text" placeholder="Puesto del recomendador" value="$r[cargo]">
          </div>
            <div class="subdiv">
              <img src='/assets/img/$r[imagen]' alt='fotito' />
              <input name="rec_imagen[]"  type="file">
          </div>
            <div class="subdiv">
              <textarea name="rec_info[]" required="" placeholder="Recomendacion">$r[info]</textarea>
          </div>
          <input type="hidden" name="rec_prev_foto[]" value="$r[imagen]" />
          <a href="javascript:void(0)" class='rec-delete'>eliminar</a>
        </div>
HTML;
      endforeach;
      ?>
      </div>
      <button type="button" class='add-item'>Agregar recomendacion</button>
    </fieldset>

    <fieldset id="otros">
      <legend>Otros skills</legend>
      <div class='row'><?php 
      foreach( $json_otros as $otro ):
      echo <<<HTML
      <div class="row-item">
        <input name="otros_name[]" required type="text" placeholder="Nombre del skill" value="$otro">
        <a href="javascript:void(0)" class='otros-delete'>x</a>
      </div>
HTML;
      endforeach;
      ?></div>
      <button type="button" class='add-item'>Agregar skill</button>
    </fieldset>


    <button type="submit">Enviar</button>

    <p class='disclaimer'>Que conste en actas que el programador de este sistemita, no estaba de acuerdo con poner el input de tipo date (día, mes, año) para la formación académica ni para la experiencia laboral. Yo era feliz con el input de tipo month, pero como el mongosaurio de firefox no lo entendía, en vez de que el usuario final use solo Chrome, SEGÚN EL CHAT es mejor cambiar la codificación de todo el sistema. Sorry</p>
  </form>
  <script src="assets/dom.js"></script>
  <script src="assets/script.js"></script>
</body>
</html>