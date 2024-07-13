jQuery('.ml2').each(function(){
  jQuery(this).html(jQuery(this).text().replace(/\S/g, "<span class='letter'>$&</span>"));
});

/*
anime.timeline({loop: false})
  .add({
    targets: '.ml2 .letter',
    scale: [14,1],
    opacity: [0,1],
    easing: "easeOutCirc",
    duration: 750,
    delay: (el, i) => 200 * i
  });



anime.timeline({loop: false})
  .add({
    targets: '.ml2 .letter',
    translateY: ["1.1em", 0],
    translateX: ["0.55em", 0],
    translateZ: 0,
    rotateZ: [180, 0],
    duration: 750,
    easing: "easeOutExpo",
    delay: (el, i) => 50 * i
  });

  anime.timeline({loop: false})
  .add({
    targets: '.ml2 .letter',
    opacity: [0,1],
    easing: "easeInOutQuad",
    duration: 1050,
    delay: (el, i) => 150 * (i+1)
  });
  
  anime.timeline({loop: false})
  .add({
    targets: '.ml2 .letter',
    translateY: ["1.1em", 0],
    translateZ: 0,
    duration: 750,
    delay: (el, i) => 50 * i
  });
 */   
  anime.timeline({loop: false})
  .add({
    targets: '.ml2 .letter',
    rotateY: [-90, 0],
    duration: 1300,
	opacity: [0,1],
    delay: (el, i) => 45 * i
  });