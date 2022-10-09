const animate = section => {
  if(section[0] && section[0].isIntersecting){
    section[0].target.classList.add('animate');
  }
}

const settings = {
  threshold: .8
};

let observador = new IntersectionObserver(
  animate,
  settings
);

const ulBarritas = document.querySelector('.skills .barrita');
const ulCirculitos = document.querySelector('.skills .circulitos');
observador.observe( ulBarritas );
observador.observe( ulCirculitos );
