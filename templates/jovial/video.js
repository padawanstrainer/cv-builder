const boton = document.getElementById('videopresentacion');
const quitar_modal = e => {
  if( modal = document.getElementById('modal') ){
    modal.remove( );
  }
}
boton.addEventListener('click', e => {
  const modal = document.createElement('div');
  const random = ~~(Math.random( ) * 9999999999);
  modal.id = 'modal';
  modal.innerHTML = `
    <div>
      <a href='javascript:void(0)' onclick='quitar_modal()'>Cerrar</a>
      <iframe width="560" height="315" src="https://www.youtube.com/embed/${id_video}?${random}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
  `;
  document.body.appendChild(modal);
} );


document.body.addEventListener('keyup', e => {
  if( e.key == 'Escape' ){
    quitar_modal( ); 
  }
} );