<?php 
require 'admin/config/funciones.php';
require 'admin/config/data.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $json_user_data['nombre']; ?> | CV</title>
  <link rel="stylesheet" href="templates/jovial/estilos.css" />
</head>
<body>
  <header>
    <div>
      <?php 
      echo create_user_data( );
      ?>
    </div>
    <a href='javascript:void(0)' id="videopresentacion">Videopresentación</a>
  </header>
  <main>
    <section class='info'>
      <h2>Información general</h2>
      <?php 
      echo create_personal_info( );
      ?>
    </section>

    <section class='about'>
      <?php 
      echo create_about_me( );
      ?>
      <a id="download" href='assets/docs/curriculum.pdf' download="Curriculum-Nina-Rodriguez.pdf"><span>Descargar mi CV</span></a>
    </section>

    <section class='laboral'>
      <h2>Experiencia Laboral</h2>
      <?php 
      echo create_job_experience( );
      ?>
    </section>
  
    <section class='academica'>
      <h2>Formación Académica</h2>
      <?php 
      echo create_academic_info( );
      ?>
      <!--ul>
        <li>
          <h3>CODEXCODER</h3>
          <span class='tagline'>MASTER OF COMPUTER SCIENCE @ 2016 – Present (2 years 9 months)</span>
          <p>Proressive orchestrate vertical scenarios throulis ordstinctive services Continually innovate fully tested scenarios with</p>
        </li>
        <li>
          <h3>LABARTISAN</h3>
          <span class='tagline'>BACHELOR OF COMPUTER SCIENCE @ 2011 – 2014 (3 YEARS)</span>
          <p>Proressive orchestrate vertical scenarios throulis ordstinctive services Continually innovate fully tested scenarios with</p>
        </li>
        <li>
          <h3>Alakazam Akademy</h3>
          <span class='tagline'>GENERAL EDUCATION DEVELOPMENT (GED)  @ 2005 – 2009 (4 YEARS)</span>
          <p>Proressive orchestrate vertical scenarios throulis ordstinctive services Continually innovate fully tested scenarios with</p>
        </li>
      </ul-->
    </section>
    <section class='large skills'>
      <h2>Habilidades personales y lenguajes que manejo</h2>
      <?php if($json_skills['formato'] == 'Barras' ): ?>
      <ul class='barrita'>
        <?php foreach($json_skills['skills'] as $skill): 
        echo <<<HTML
        <li>
            <span>$skill[nombre]</span><span>$skill[porcentaje]%</span>
            <div style="--porcentaje: $skill[porcentaje]%; --primary: $skill[color]"><span></span></div>
        </li>
HTML;
        endforeach; ?>
        <!-- 
        <li>
            <span>Javascript</span><span>70%</span>
            <div style="--porcentaje: 70%; --primary: teal"><span></span></div>
        </li>
        <li>
            <span>PHP MySQL</span><span>20%</span>
            <div style="--porcentaje: 20%; --primary: forestgreen"><span></span></div>
        </li>
        <li>
            <span>DevOps</span><span>90%</span>
            <div style="--porcentaje: 90%; --primary: peru"><span></span></div>
        </li>
        <li>
            <span>PseINT</span><span>50%</span>
            <div style="--porcentaje: 50%; --primary: Maroon"><span></span></div>
        </li>
        <li>
            <span>Sre Engineer</span><span>20%</span>
            <div style="--porcentaje: 20%; --primary: DarkSlateBlue"><span></span></div>
        </li>
        <li>
            <span>Word</span><span>99%</span>
            <div style="--porcentaje: 99%; --primary: DarkKhaki"><span></span></div>
        </li>
        -->
      </ul>
      <?php else:?>
      <ul class='circulitos'>
      <?php foreach($json_skills['skills'] as $skill): 
        echo <<<HTML
        <li>
          <h3>$skill[nombre]</h3>
          <div style="--porcentaje: $skill[porcentaje]; --primary: $skill[color]">
            <svg>
              <circle r="60" cx="50%" cy="50%" />
              <circle r="60" cx="50%" cy="50%" pathLength="100" />
            </svg>
            <span>$skill[porcentaje]%</span>
          </div>
        </li>
HTML;
        endforeach; ?>
        <!-- 
          <li>
          <h3>Javascript</h3>
          <div style="--porcentaje: 75; --primary: fuchsia">
            <svg>
              <circle r="60" cx="50%" cy="50%" />
              <circle r="60" cx="50%" cy="50%" pathLength="100" />
            </svg>
            <span>75%</span>
          </div>
        </li>
        <li>
          <h3>PHP y MySQL</h3>
          <div style="--porcentaje: 50; --primary: forestgreen">
            <svg>
              <circle r="60" cx="50%" cy="50%" />
              <circle r="60" cx="50%" cy="50%" pathLength="100" />
            </svg>
            <span>50%</span>
          </div>
        </li>
      -->
      </ul>
      <?php endif; ?>
    </section>

    <section class='intereses'>
      <h2>Intereses y Hobbies</h2>
      <ul>
        <?php 
        foreach( $json_hobbies as $h ):
          echo "<li style='background-image:  url(/assets/iconos/$h[icono])'>$h[nombre]</li>";
        endforeach; ?><!-- 
        <li style='background-image:  url(/assets/iconos/castor-black.png)'>Siestas largas</li>
        <li style='background-image:  url(/assets/iconos/castor-black.png)'>Cazar</li>
        <li style='background-image:  url(/assets/iconos/castor-black.png)'>Radio</li>
        <li style='background-image:  url(/assets/iconos/castor-black.png)'>Comer</li>
        <li style='background-image:  url(/assets/iconos/castor-black.png)'>Jugar</li>
        <li style='background-image:  url(/assets/iconos/castor-black.png)'>Pescado</li>
        <li style='background-image:  url(/assets/iconos/castor-black.png)'>Mimos</li>
        <li style='background-image:  url(/assets/iconos/castor-black.png)'>Testear la gravedad</li>
        <li style='background-image:  url(/assets/iconos/castor-black.png)'>Codear de madrugada</li> -->
      </ul>
    </section>

    <section class='referencias'>
      <h2>Referencias</h2>
      <ul>
        <?php 
        foreach( $json_recomendaciones as $rec ):
          $info = nl2br( $rec['info'] ); //new line 2 (a) <br>
          echo <<<HTML
        <li>
          <div>
            <h3>$rec[nombre]</h3>
            <span class='tagline'>$rec[cargo]</span>
          </div>
          <img src="assets/img/$rec[imagen]" alt="Don Gato" />
          <p>$info.</p>
        </li>
HTML;
        endforeach;
        ?>
        <!--
        <li>
          <div>
            <h3>Garfield</h3>
            <span class='tagline'>Sommelier de Lasagna</span>
          </div>
          <img src="assets/img/garfield.jpg" alt="Garfield" />
          <p>Scratch leg; meow for can opener to feed me plop down in the middle where everybody walks and swat turds around the house for mewl for food at 4am eat half my food and ask for more purr while eating, or flop over.</p>
        </li>
      -->
      </ul>
    </section>
    <section class='large extra-skills'>
      <h2>Habilidades adicionales</h2>
      <ul>
        <?php foreach($json_otros as $o ):
        echo "<li>$o</li>";
        endforeach;
        ?>
        <!-- 
        <li>Interactively actualize synergistic resources</li>
        <li>Collaboratively engineer pandemic growth ategies</li>
        <li>Progressively maximize multimedia based narios</li>
        <li>Actualize synergistic resources for efficient</li>
        <li>Compellingly productize virtual solutions for user</li>
        <li>Interactively actualize synergistic resources</li>
        <li>Collaboratively engineer pandemic growth ategies</li>
        <li>Progressively maximize multimedia based narios</li>
        <li>Actualize synergistic resources for efficient</li>
      -->
      </ul>
    </section>
  </main>
  <script src="/templates/jovial/porcentajes.js"></script>
  <script>
    const id_video = '<?php echo $json_user_data["video"];?>';
  </script>
  <script src="/templates/jovial/video.js"></script>
</body>
</html>