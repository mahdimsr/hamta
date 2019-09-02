const logo= document.querySelector(".header_area");

const tl = new TimelineMax();
tl.fromTo(logo, 0.5, {opacity:0, x:30},{opacity: 1 , x:0})
