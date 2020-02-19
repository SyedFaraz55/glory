
$('.ticker1, .ticker2').easyTicker({
	direction: 'up',
	easing: 'swing',
	speed: 'medium',
	interval: 2000,
	height: 'auto',
	visible: 0,
	mousePause: 1,
	controls: {
		up: '',
		down: '',
		toggle: '',
		playText: 'Play',
		stopText: 'Stop'
	}
});

const carouselSlide = document.querySelector('.carousel-slide');
const carouselImages = document.querySelectorAll('.carousel-slide img');

const prev = document.querySelector('#prev');
const btn = document.querySelector('#next');

let counter = 1;
const size =  carouselImages[0].clientWidth;

carouselSlide.style.transform = 'translateX('+(-size*counter) + 'px)';

next.addEventListener('click',()=>{
	carouselSlide.style.transition = "transform 0.4s ease-in-out";
	counter++;
	carouselSlide.style.transform = 'translateX('+(-size*counter) + 'px)';
})

prev.addEventListener('click',()=>{
	carouselSlide.style.transition = "transform 0.4s ease-in-out";
	counter--;
	carouselSlide.style.transform = 'translateX('+(-size*counter) + 'px)';
})

carouselSlide.addEventListener('transitionend',()=>{
	if(carouselImages[counter].id === 'lastclone'){
		carouselSlide.style.transition = "none";
		counter = carouselImages.length-2;
		carouselSlide.style.transform = 'translateX('+(-size*counter) + 'px)';
	}

	if(carouselImages[counter].id === 'firstclone'){
		carouselSlide.style.transition = "none";
		counter = carouselImages.length-counter;
		carouselSlide.style.transform = 'translateX('+(-size*counter) + 'px)';
	}
});
