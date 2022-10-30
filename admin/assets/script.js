/**** INSTANCIA DEL CKEDITOR 5 ****/

ConfigCkeditor = {
  ckfinder: {
    uploadUrl: '/subir.php'
  },
  toolbar: [ 'ckfinder', 'bold', 'italic', 'link', 'bulletedList', 'numberedList' ,  'undo', 'redo']
}
ClassicEditor
  .create( document.getElementById( 'biografia' ), ConfigCkeditor )
  .catch( error => { console.error( error ); } );


const D = new DOM( );

/**** DATOS PERSONALES ****/

const dp_btn = D.query('#datos_personales button');
const dp_div = D.query('#datos_personales > div');
const dp_deletes = D.queryAll('#datos_personales .dp-delete');
Array.from(dp_deletes).forEach( d => { 
  d.addEventListener('click', ( )=>{ d.parentNode.remove(); } );
} );

dp_btn.addEventListener('click', e => {
  const div = D.create('div', { className: 'row row-item' });
  const input1 = D.create('input', { type:'text', name:'dp_clave[]', placeholder: 'Nombre del dato', autocomplete: 'off', required: true } );
  const input2 = D.create('input', { type:'text', name:'dp_valor[]', placeholder: 'Valor del dato', autocomplete: 'off', required: true } );
  const borrar = D.create('a', { href: 'javascript:void(0)', innerHTML: 'x', onclick: function( ){ div.remove( ); } } );

  D.append( [ input1, input2, borrar ], div );
  D.append( div, dp_div );
} );


/**** EXPERIENCIA ****/
const exp_deletes = D.queryAll('#experiencia_laboral .exp-delete');
Array.from(exp_deletes).forEach( d => { 
  d.addEventListener('click', ( )=>{ d.parentNode.remove(); } );
} );


const exp_div = D.query('#experiencia_laboral > div');
const exp_btn = D.query('#experiencia_laboral > button');

exp_btn.addEventListener('click', e => {
  const div = D.create('div', { className: 'row row-box' } );
  const borrar = D.create('a', { href: 'javascript:void(0)', innerHTML: 'eliminar', onclick: function( ){ div.remove(); } } );
  const subdiv1 = D.create('div', {className: 'subdiv' });
  const subdiv2 = D.create('div', {className: 'subdiv' });
  const subdiv3 = D.create('div', {className: 'subdiv' });

  const empresa = D.create('input', { type: 'text', name: 'exp_empresa[]', required: true, placeholder: "Nombre empresa" } );
  const cargo = D.create('input', { type: 'text', name: 'exp_cargo[]', placeholder: "Cargo en la empresa" } );
  const desde = D.create('input', { type: 'date', name: 'exp_desde[]', placeholder: "Inicio" } );
  const hasta = D.create('input', { type: 'date', name: 'exp_hasta[]', placeholder: "Fin" } );
  const info = D.create('textarea', { name: 'exp_info[]', rows: 6, cols: 40, placeholder: 'Qué cosas hiciste en ese trabajo' } );

  D.append( [empresa, cargo], subdiv1 );
  D.append( [desde, hasta], subdiv2 );
  D.append( info, subdiv3 );
  D.append( [subdiv1, subdiv2, subdiv3, borrar], div );
  D.append( div, exp_div );
} );




/**** ACADEMICO ****/
const ac_deletes = D.queryAll('#formacion_academica .ac-delete, #habilidades .skill-delete, #hobbies .hobbie-delete, #otros .otros-delete, #recomendaciones .rec-delete');
Array.from(ac_deletes).forEach( d => { 
  d.addEventListener('click', ( )=>{ d.parentNode.remove(); } );
} );


const ac_div = D.query('#formacion_academica > div');
const ac_btn = D.query('#formacion_academica > button');

ac_btn.addEventListener('click', e => {
  const div = D.create('div', { className: 'row row-box' } );
  const borrar = D.create('a', { href: 'javascript:void(0)', innerHTML: 'eliminar', onclick: function( ){ div.remove(); } } );
  const subdiv1 = D.create('div', {className: 'subdiv' });
  const subdiv2 = D.create('div', {className: 'subdiv' });
  const subdiv3 = D.create('div', {className: 'subdiv' });

  const instituto = D.create('input', { type: 'text', name: 'ac_instituto[]', required: true, placeholder: "Nombre instituto" } );
  const titulo = D.create('input', { type: 'text', name: 'ac_titulo[]', placeholder: "Titulo o certificación obtenido" } );
  const desde = D.create('input', { type: 'date', name: 'ac_desde[]', placeholder: "Inicio" } );
  const hasta = D.create('input', { type: 'date', name: 'ac_hasta[]', placeholder: "Fin" } );
  const info = D.create('textarea', { name: 'ac_info[]', rows: 6, cols: 40, placeholder: 'Qué cosas aprendiste en ese curso' } );

  D.append( [instituto, titulo], subdiv1 );
  D.append( [desde, hasta], subdiv2 );
  D.append( info, subdiv3 );
  D.append( [subdiv1, subdiv2, subdiv3, borrar], div );
  D.append( div, ac_div );
} );


/***** HABILIDADES *******/
const div_skills = D.query( '#habilidades > .row' );
const btn_skills = D.query( '#habilidades > button' );

btn_skills.addEventListener('click', e => {
  const div = D.create('div', { className: 'row-item row-skill' } );
  const input1 = D.create('input', { type: 'text', name: 'skills_name[]', placeholder: 'Habilidad - Ej: HTML, Diseño, Cerrar puertas', required : true, min: 1, max: 100 } );
  const input2 = D.create('input', { type: 'number', name: 'skills_value[]', placeholder: 'Porcentaje (solo número)', required : true } );
  const input3 = D.create('input', { type: 'color', name: 'skills_color[]', required : true } );
  const label_color = D.create('span', { className: 'color_label', innerHTML: 'Color del gráfico' } );
  const close = D.create('a', { href: 'javascript:void(0)', innerHTML: 'x', onclick: function( e ){ div.remove( ); } } );

  D.append( [input1, input2, label_color, input3, close ], div );
  D.append( div, div_skills );
} );


/***** HOBBIES *****/
const a_iconos = [ 'castor-black.png' ];
const btn_hobbie = D.query( '#hobbies > button' );
const div_hobbies = D.query( '#hobbies > .row' );

btn_hobbie.addEventListener('click', e => {
  const div = D.create('div', { className: 'row-item' } );
  const input = D.create('input', { name: 'hobbie_name[]', required: true, type: 'text', placeholder: 'Nombre del hobbie' } );
  const icono = D.create('select', { name: 'hobbie_icon[]' } );
  a_iconos.map( i => { D.append( D.create('option', {innerHTML: i } ), icono ) } );
  const borrar = D.create( 'a', { href:'javascript:void(0)', onclick: e => { div.remove( ) }, innerHTML: 'x' } );

  D.append( [input, icono, borrar], div );
  D.append( div, div_hobbies );
} );



/***** OTROS *****/
const btn_otros = D.query( '#otros > button' );
const div_otros = D.query( '#otros > .row' );

btn_otros.addEventListener('click', e => {
  const div = D.create('div', { className: 'row-item' } );
  const input = D.create('input', { name: 'otros_name[]', required: true, type: 'text', placeholder: 'Nombre del skill' } );
  const borrar = D.create( 'a', { href:'javascript:void(0)', onclick: e => { div.remove( ) }, innerHTML: 'x' } );

  D.append( [input, borrar], div );
  D.append( div, div_otros );
} );


/***** OTROS *****/
const btn_recomendaciones = D.query( '#recomendaciones > button' );
const div_recomendaciones = D.query( '#recomendaciones > .row' );

btn_recomendaciones.addEventListener('click', e => {
  const div = D.create('div', { className: 'row-box' } );

  const div1 = D.create('div', {className: 'subdiv' });
  const div2 = D.create('div', {className: 'subdiv' });
  const div3 = D.create('div', {className: 'subdiv' });

  const input1 = D.create('input', { name: 'rec_name[]', required: true, type: 'text', placeholder: 'Nombre del recomendador' } );
  const input2 = D.create('input', { name: 'rec_relacion[]', required: true, type: 'text', placeholder: 'Puesto del recomendador' } );
  const input3 = D.create('input', { name: 'rec_imagen[]', required: true, type: 'file' } );
  const textarea = D.create('textarea', { name: 'rec_info[]', required: true, placeholder: 'Recomendacion' } );

  const borrar = D.create( 'a', { href:'javascript:void(0)', onclick: e => { div.remove( ) }, innerHTML: 'eliminar' } );
  
  D.append( [input1, input2], div1 );
  D.append( input3, div2 );
  D.append( textarea, div3 );
  D.append( [div1, div2, div3, borrar], div );
  D.append( div, div_recomendaciones );
} );