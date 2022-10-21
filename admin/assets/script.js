const D = new DOM( );

/**** DATOS PERSONALES ****/

const dp_btn = D.query('#datos_personales button');
const dp_div = D.query('#datos_personales > div');
const dp_deletes = D.queryAll('#datos_personales .dp-delete');
Array.from(dp_deletes).forEach( d => { 
  d.addEventListener('click', ( )=>{ d.parentNode.remove(); } );
} );

dp_btn.addEventListener('click', e => {
  const div = D.create('div');
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
  const div = D.create('div');
  const borrar = D.create('a', { href: 'javascript:void(0)', innerHTML: 'x', onclick: function( ){ div.remove(); } } );
  const subdiv1 = D.create('div', {className: 'subdiv' });
  const subdiv2 = D.create('div', {className: 'subdiv' });

  const empresa = D.create('input', { type: 'text', name: 'exp_empresa[]', required: true, placeholder: "Nombre empresa" } );
  const cargo = D.create('input', { type: 'text', name: 'exp_cargo[]', placeholder: "Cargo en la empresa" } );
  const desde = D.create('input', { type: 'number', name: 'exp_desde[]', placeholder: "Inicio" } );
  const hasta = D.create('input', { type: 'number', name: 'exp_hasta[]', placeholder: "Fin" } );
  const info = D.create('textarea', { name: 'exp_info[]', rows: 6, cols: 40, placeholder: 'Qué cosas hiciste en ese trabajo' } );

  D.append( [empresa, cargo], subdiv1 );
  D.append( [desde, hasta], subdiv2 );
  D.append( [borrar, subdiv1, subdiv2, info], div );
  D.append( div, exp_div );
} );




/**** ACADEMICO ****/
const ac_deletes = D.queryAll('#formacion_academica .ac-delete');
Array.from(ac_deletes).forEach( d => { 
  d.addEventListener('click', ( )=>{ d.parentNode.remove(); } );
} );


const ac_div = D.query('#formacion_academica > div');
const ac_btn = D.query('#formacion_academica > button');

ac_btn.addEventListener('click', e => {
  const div = D.create('div');
  const borrar = D.create('a', { href: 'javascript:void(0)', innerHTML: 'x', onclick: function( ){ div.remove(); } } );
  const subdiv1 = D.create('div', {className: 'subdiv' });
  const subdiv2 = D.create('div', {className: 'subdiv' });

  const instituto = D.create('input', { type: 'text', name: 'ac_instituto[]', required: true, placeholder: "Nombre instituto" } );
  const titulo = D.create('input', { type: 'text', name: 'ac_titulo[]', placeholder: "Titulo o certificación obtenido" } );
  const desde = D.create('input', { type: 'number', name: 'ac_desde[]', placeholder: "Inicio" } );
  const hasta = D.create('input', { type: 'number', name: 'ac_hasta[]', placeholder: "Fin" } );
  const info = D.create('textarea', { name: 'ac_info[]', rows: 6, cols: 40, placeholder: 'Qué cosas aprendiste en ese curso' } );

  D.append( [instituto, titulo], subdiv1 );
  D.append( [desde, hasta], subdiv2 );
  D.append( [borrar, subdiv1, subdiv2, info], div );
  D.append( div, ac_div );
} );