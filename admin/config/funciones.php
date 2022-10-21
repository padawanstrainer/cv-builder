<?php 
function create_user_data( ){
  global $json_user_data;

  return <<<HTML
    <h1>$json_user_data[nombre]</h1>
    <img src="assets/img/perfil.jpg" alt='Nombre de la persona' />
    <p>$json_user_data[subtitulo]</p>
HTML;
}

function create_about_me( ){
  global $json_user_data;
  $biografia = nl2br( $json_user_data['biografia'] ); 
  return <<<HTML
    <h2>Sobre mí</h2>
    <p>$biografia</p>
HTML;
}

function create_personal_info( ){
  global $json_user_data;
  $str = '';
  if( count( $json_user_data['datos_personales'] ) ){
    $str .= "<ul>";
    foreach( $json_user_data['datos_personales'] as $c => $v ){
      $str .= "<li><span>$c</span>: <span>$v</span></li>";
    }
    $str .= "</ul>";
  }
  return $str;
}



function create_job_experience( ){
  global $json_jobs;
  $str = '';
  if( count($json_jobs) ):
    $str .= '<ul>';
    foreach( $json_jobs as $job ){
      $str .= <<<HTML
        <li>
          <h3>$job[empresa]</h3>
          <span class='tagline'>$job[cargo] @ $job[desde] – $job[hasta] (2 years 9 months)</span>
          <p>$job[info]</p>
        </li>
      HTML;
    }
    $str .= '</ul>';
  endif;
  return $str;
}


function create_academic_info( ){
  global $json_academic;
  $str = '';
  if( count($json_academic) ):
    $str .= '<ul>';
    foreach( $json_academic as $academy ){
      $str .= <<<HTML
        <li>
          <h3>$academy[instituto]</h3>
          <span class='tagline'>$academy[titulo] @ $academy[desde] – $academy[hasta] (2 years 9 months)</span>
          <p>$academy[info]</p>
        </li>
      HTML;
    }
    $str .= '</ul>';
  endif;
  return $str;
}





