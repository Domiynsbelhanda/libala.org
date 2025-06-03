(function ($) {
	"use strict";

	$('.sidebar-button').on("click", function () {
        $(this).toggleClass('active');
    });

	document.querySelector('.sidebar-button').addEventListener('click', () =>
		document.querySelector('.main-menu').classList.toggle('show-menu'));

	$('.menu-close-btn').on("click", function () {
		$('.main-menu').removeClass('show-menu');
	});


	// Sidebar 
	$('.sidebar-btn').on("click", function () {
		$('.sidebar-area').addClass('active');
	});
	$('.sidebar-menu-close').on("click", function () {
		$('.sidebar-area').removeClass('active');
	});

	jQuery('.dropdown-icon').on('click', function () {
		jQuery(this).toggleClass('active').next('ul').slideToggle();
		jQuery(this).parent().siblings().children('ul').slideUp();
		jQuery(this).parent().siblings().children('.active').removeClass('active');
	});
	jQuery('.dropdown-icon2').on('click', function () {
		jQuery(this).toggleClass('active').next('.submenu-list').slideToggle();
		jQuery(this).parent().siblings().children('.submenu-list').slideUp();
		jQuery(this).parent().siblings().children('.active').removeClass('active');
	});	
	
	// sticky header
	window.addEventListener('scroll', function () {
		const header = document.querySelector('header.header-area');
		header.classList.toggle("sticky", window.scrollY > 200);
	});

	// Serch Btn
	$(".search-btn").on("click", function (e) {
		let parent = $(this).parent();
		parent.find(".search-input, .lang-card").toggleClass("active");
		e.stopPropagation();

	});
	$(document).on("click", function (e) {
		if (!$(e.target).closest(".search-input, .search-btn").length) {
			$(".search-input").removeClass("active");
		}
	});
	$(".serch-close").on("click", function (e) {
		$(".search-input").removeClass("active");
	});

	// sidebar
	$('.right-sidebar-button').on("click", function () {
		$('.right-sidebar-menu').addClass('show-right-menu');
	});
	$('.right-sidebar-close-btn').on("click", function () {
		$('.right-sidebar-menu').removeClass('show-right-menu');
	});

	//Counter up
	$('.counter').counterUp({
		delay: 10,
		time: 1500
	});

	
	// niceSelect
	$('select').niceSelect();
	
	// Home1 Service Slider
	var swiper = new Swiper(".home1-service-slider", {
		slidesPerView: 1,
		speed: 1500,
		spaceBetween: 25,
		autoplay: {
			delay: 2500, // Autoplay duration in milliseconds
			disableOnInteraction: false,
		},
		pagination: {
			el: ".swiper-pagination1",
			clickable: true,
		},
	
		breakpoints: {
		  280: {
			slidesPerView: 1,
		  },
		  386: {
			slidesPerView: 1,
		  },
		  576: {
			slidesPerView: 1,
		  },
		  768: {
			slidesPerView: 2,
		  },
		  992: {
			slidesPerView: 2,
		  },
		  1200: {
			slidesPerView: 3,
		  },
		  1400: {
			slidesPerView: 3,
		  },
		},
	});
	// Home1 Portfolio Slider
	var swiper = new Swiper(".home1-portfolio-slider", {
		slidesPerView: 1,
		speed: 1500,
		spaceBetween: 25,
		loop: true,
		autoplay: {
			delay: 2500, // Autoplay duration in milliseconds
			disableOnInteraction: false,
		},
		pagination: {
			el: ".swiper-pagination2",
			clickable: true,
		},
	
		breakpoints: {
		  280: {
			slidesPerView: 1,
		  },
		  386: {
			slidesPerView: 1,
		  },
		  576: {
			slidesPerView: 1,
		  },
		  768: {
			slidesPerView: 2,
		  },
		  992: {
			slidesPerView: 2,
		  },
		  1200: {
			slidesPerView: 2,
		  },
		  1400: {
			slidesPerView: 2,
		  },
		},
	});
	// Home1 Testimonial Slider
	var swiper = new Swiper(".home1-testimonial-slider", {
		slidesPerView: 1,
		spaceBetween: 10,
		speed: 1500,
		effect: 'fade',             // Use the fade effect
		fadeEffect: {
		  crossFade: true           // Enable cross-fade transition
		},
		autoplay: {
			delay: 2500, // Autoplay duration in milliseconds
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: ".testimonial-slider-next",
			prevEl: ".testimonial-slider-prev",
		},
	});
	// Home2 Banner Slider
	var swiper = new Swiper(".home2-banner-slider", {
		slidesPerView: 1,
		speed: 1500,
		spaceBetween: 25,
		slidesPerView: 1,
		centerSlides: true,
		loop: true,
		effect: 'fade',
		
		autoplay: {
			delay: 3000, // Autoplay duration in milliseconds
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: ".banner-slider-next",
			prevEl: ".banner-slider-prev",
		},
		pagination: {
			el: ".paginations1",
			clickable: true,
		},
	});
	// Home2 Testimonial Slider
	var swiper = new Swiper(".home2-testimonial-slider", {
		slidesPerView: 1,
		spaceBetween: 10,
		speed: 1500,
		autoplay: {
			delay: 2500, // Autoplay duration in milliseconds
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: ".testimonial-slider-next",
			prevEl: ".testimonial-slider-prev",
		},
	});
	// Home3 Testimonial Slider
	var swiper = new Swiper(".home3-testimonial-slider", {
		slidesPerView: 1,
		spaceBetween: 10,
		speed: 1500,
		effect: 'fade',             // Use the fade effect
		fadeEffect: {
		  crossFade: true           // Enable cross-fade transition
		},
		autoplay: {
			delay: 2500, // Autoplay duration in milliseconds
			disableOnInteraction: false,
		},
		navigation: {
			nextEl: ".testimonial-slider-next",
			prevEl: ".testimonial-slider-prev",
		},
	});


	//Progress Bar
	var experiencePers = document.querySelectorAll(".experience-bar-per");

	experiencePers.forEach(function(experiencePer) {
	var per = parseFloat(experiencePer.getAttribute("data-per"));
	experiencePer.style.width = per + "%";
	
	var animatedValue = 0; 
	var startTime = null;
	
	function animate(timestamp) {
		if (!startTime) startTime = timestamp;
		var progress = timestamp - startTime;
		var stepPercentage = progress / 1000; // Dividing by duration in milliseconds (1000ms = 1s)
		
		if (stepPercentage < 1) {
		animatedValue = per * stepPercentage;
		experiencePer.setAttribute("data-per", Math.floor(animatedValue) + "%");
		requestAnimationFrame(animate);
		} else {
		animatedValue = per;
		experiencePer.setAttribute("data-per", Math.floor(animatedValue) + "%");
		}
	}
	requestAnimationFrame(animate);
	});

	///Marquee
	const marquee = document.querySelectorAll(".marquee_text");
	if (marquee) {
		$(".marquee_text").marquee({
			direction: "left",
			duration: 25000,
			gap: 50,
			delayBeforeStart: 0,
			duplicated: true,
			startVisible: true,
		});
	}

	if ($("body").not(".is-mobile").hasClass("tt-magic-cursor")) {
		if ($(window).width() > 1024) {
		  gsap.config({
			nullTargetWarn: false,
			trialWarn: false,
		  });
		  $(".magnetic-item").wrap('<div class="magnetic-wrap"></div>');
	
		  if ($("a.magnetic-item").length) {
			$("a.magnetic-item").addClass("not-hide-cursor");
		  }
	
		  var $mouse = { x: 0, y: 0 }; // Cursor position
		  var $pos = { x: 0, y: 0 }; // Cursor position
		  var $ratio = 0.15; // delay follow cursor
		  var $active = false;
		  var $ball = $("#ball");
	
		  var $ballWidth = 20; // Ball default width
		  var $ballHeight = 20; // Ball default height
		  var $ballOpacity = 0.5; // Ball default opacity
		  var $ballBorderWidth = 2; // Ball default border width
	
		  gsap.set($ball, {
			// scale from middle and style ball
			xPercent: -50,
			yPercent: -50,
			width: $ballWidth,
			height: $ballHeight,
			borderWidth: $ballBorderWidth,
			opacity: $ballOpacity,
		  });
	
		  document.addEventListener("mousemove", mouseMove);
	
		  function mouseMove(e) {
			$mouse.x = e.clientX;
			$mouse.y = e.clientY;
		  }
	
		  gsap.ticker.add(updatePosition);
	
		  function updatePosition() {
			if (!$active) {
			  $pos.x += ($mouse.x - $pos.x) * $ratio;
			  $pos.y += ($mouse.y - $pos.y) * $ratio;
	
			  gsap.set($ball, { x: $pos.x, y: $pos.y });
			}
		  }
	
		  $(".magnetic-wrap").mousemove(function (e) {
			parallaxCursor(e, this, 2); // magnetic ball = low number is more attractive
			callParallax(e, this);
		  });
	
		  function callParallax(e, parent) {
			parallaxIt(e, parent, parent.querySelector(".magnetic-item"), 25); // magnetic area = higher number is more attractive
		  }
	
		  function parallaxIt(e, parent, target, movement) {
			var boundingRect = parent.getBoundingClientRect();
			var relX = e.clientX - boundingRect.left;
			var relY = e.clientY - boundingRect.top;
	
			gsap.to(target, {
			  duration: 0.3,
			  x: ((relX - boundingRect.width / 2) / boundingRect.width) * movement,
			  y:
				((relY - boundingRect.height / 2) / boundingRect.height) * movement,
			  ease: Power2.easeOut,
			});
		  }
	
		  function parallaxCursor(e, parent, movement) {
			var rect = parent.getBoundingClientRect();
			var relX = e.clientX - rect.left;
			var relY = e.clientY - rect.top;
			$pos.x =
			  rect.left + rect.width / 2 + (relX - rect.width / 2) / movement;
			$pos.y =
			  rect.top + rect.height / 2 + (relY - rect.height / 2) / movement;
			gsap.to($ball, { duration: 0.3, x: $pos.x, y: $pos.y });
		  }
	
		  // Magic cursor behavior
		  // ======================
	
		  // Magnetic item hover.
		  $(".magnetic-wrap")
			.on("mouseenter mouseover", function (e) {
			  $ball.addClass("magnetic-active");
			  gsap.to($ball, { duration: 0.3, width: 70, height: 70, opacity: 1 });
			  $active = true;
			})
			.on("mouseleave", function (e) {
			  $ball.removeClass("magnetic-active");
			  gsap.to($ball, {
				duration: 0.3,
				width: $ballWidth,
				height: $ballHeight,
				opacity: $ballOpacity,
			  });
			  gsap.to(this.querySelector(".magnetic-item"), {
				duration: 0.3,
				x: 0,
				y: 0,
				clearProps: "all",
			  });
			  $active = false;
			});
	
		  // Alternative cursor style on hover.
		  $(
			".cursor-alter, .tt-main-menu-list > li > a, .tt-main-menu-list > li > .tt-submenu-trigger > a"
		  )
			.not(".magnetic-item") // omit from selection.
			.on("mouseenter", function () {
			  gsap.to($ball, {
				duration: 0.3,
				borderWidth: 0,
				opacity: 0.2,
				backgroundColor: "#CCC",
				width: "90px",
				height: "90px",
			  });
			})
			.on("mouseleave", function () {
			  gsap.to($ball, {
				duration: 0.3,
				borderWidth: $ballBorderWidth,
				opacity: $ballOpacity,
				backgroundColor: "transparent",
				width: $ballWidth,
				height: $ballHeight,
				clearProps: "backgroundColor",
			  });
			});	
		
	
		  // Cursor close on hover.
		  $(".cursor-close").each(function () {
			$(this).addClass("ball-close-enabled");
			$(this)
			  .on("mouseenter", function () {
				$ball.addClass("ball-close-enabled");
				$ball.append('<div class="ball-close">Close</div>');
				gsap.to($ball, {
				  duration: 0.3,
				  yPercent: -75,
				  width: 80,
				  height: 80,
				  opacity: 1,
				});
				gsap.from(".ball-close", { duration: 0.3, scale: 0, autoAlpha: 0 });
			  })
			  .on("mouseleave click", function () {
				$ball.removeClass("ball-close-enabled");
				gsap.to($ball, {
				  duration: 0.3,
				  yPercent: -50,
				  width: $ballWidth,
				  height: $ballHeight,
				  opacity: $ballOpacity,
				});
				$ball.find(".ball-close").remove();
			  });
	
			// Hover on "cursor-close" inner elements.
			$(
			  ".cursor-close a, .cursor-close button, .cursor-close .tt-btn, .cursor-close .hide-cursor"
			)
			  .not(".not-hide-cursor") // omit from selection (class "not-hide-cursor" is for global use).
			  .on("mouseenter", function () {
				$ball.removeClass("ball-close-enabled");
			  })
			  .on("mouseleave", function () {
				$ball.addClass("ball-close-enabled");
			  });
		  });
	
		  // ================================================================
		  // Scroll between anchors
		  // ================================================================
	
		  $('a[href^="#"]')
			.not('[href$="#"]') // omit from selection
			.not('[href$="#0"]') // omit from selection
			.on("click", function () {
			  var target = this.hash;
	
			  // If fixed header position enabled.
			  if ($("#tt-header").hasClass("tt-header-fixed")) {
				var $offset = $("#tt-header").height();
			  } else {
				var $offset = 0;
			  }
	
			  // You can use data attribute (for example: data-offset="100") to set top offset in HTML markup if needed.
			  if ($(this).data("offset") != undefined)
				$offset = $(this).data("offset");
	
			  
			  return false;
			});
	
		 
		  // Show/hide magic cursor
		  // =======================
	
		  // Hide on hover.
		  $(
			"a, button, .tt-btn, .tt-form-control, .tt-form-radio, .tt-form-check, .hide-cursor"
		  ) // class "hide-cursor" is for global use.
			.not(".not-hide-cursor") // omit from selection (class "not-hide-cursor" is for global use).
			.not(".cursor-alter") // omit from selection
			.not(".tt-main-menu-list > li > a") // omit from selection
			.not(".tt-main-menu-list > li > .tt-submenu-trigger > a") // omit from selection
			.on("mouseenter", function () {
			  gsap.to($ball, { duration: 0.3, scale: 0, opacity: 0 });
			})
			.on("mouseleave", function () {
			  gsap.to($ball, { duration: 0.3, scale: 1, opacity: $ballOpacity });
			});
	
		  // Hide on click.
		  $("a")
			.not('[target="_blank"]') // omit from selection.
			.not('[href^="#"]') // omit from selection.
			.not('[href^="mailto"]') // omit from selection.
			.not('[href^="tel"]') // omit from selection.
			.not(".lg-trigger") // omit from selection.
			.not(".video-player") // omit from selection.
			.not(".tt-btn-disabled") // omit from selection.
			.on("click", function () {
			  gsap.to($ball, { duration: 0.3, scale: 1.3, autoAlpha: 0 });
			});

		  // Show/hide on document leave/enter.
		  $(document)
			.on("mouseleave", function () {
			  gsap.to("#magic-cursor", { duration: 0.3, autoAlpha: 0 });
			})
			.on("mouseenter", function () {
			  gsap.to("#magic-cursor", { duration: 0.3, autoAlpha: 1 });
			});
	
		  // Show as the mouse moves.
		  $(document).mousemove(function () {
			gsap.to("#magic-cursor", { duration: 0.3, autoAlpha: 1 });
	   	  });
		}
	  }
	

	 // Title Animation
	 let splitTitleLines = gsap.utils.toArray(".text-animation");

	 splitTitleLines.forEach((splitTextLine) => {
	   const tl2 = gsap.timeline({
		 scrollTrigger: {
		   trigger: splitTextLine,
		   start: "top 90%",
		   end: "bottom 60%",
		   scrub: false,
		   markers: false,
		   toggleActions: "play none none none",
		 },
	   });
   
	   const itemSplitted = new SplitText(splitTextLine, { type: "words, lines" });
	   gsap.set(splitTextLine, { perspective: 400 });
	   itemSplitted.split({ type: "lines" });
	   tl2.from(itemSplitted.lines, {
		 duration: 1,
		 delay: 0.3,
		 opacity: 0,
		 rotationX: -80,
		 force3D: true,
		 transformOrigin: "top center -50",
		 stagger: 0.1,
	   });
	 });
	 // 27. Text Animation
	 let splitTextLines = gsap.utils.toArray(".text-animation p");
   
	 splitTextLines.forEach((splitTextLine) => {
	   const tl3 = gsap.timeline({
		 scrollTrigger: {
		   trigger: splitTextLine,
		   start: "top 90%",
		   duration: 2,
		   end: "bottom 60%",
		   scrub: false,
		   markers: false,
		   toggleActions: "play none none none",
		 },
	   });
   
	   const itemSplitted = new SplitText(splitTextLine, { type: "lines" });
	   gsap.set(splitTextLine, { perspective: 400 });
	   itemSplitted.split({ type: "lines" });
	   tl3.from(itemSplitted.lines, {
		 duration: 1,
		 delay: 0.5,
		 opacity: 0,
		 rotationX: -80,
		 force3D: true,
		 transformOrigin: "top center -50",
		 stagger: 0.1,
	   });
	 });
	
	// All Buttons
	let arr1 = gsap.utils.toArray("#btn_wrapper");
	let arr2 = gsap.utils.toArray(".btn_wrapper");
	const all_buttons = arr1.concat(arr2);

	all_buttons.forEach((btn) => {
	if (!btn.classList.contains("banner-btn")) {
		gsap.from(btn, {
		scrollTrigger: {
			trigger: btn,
			start: "top center+=400",
			markers: false,
		},
		opacity: 0,
		y: -70,
		ease: "bounce",
		duration: 1.5,
		});
	}
	});
	
	let arr3 = gsap.utils.toArray("#bounce_up");
	let arr4 = gsap.utils.toArray(".bounce_up");
	const all_buttons2 = arr3.concat(arr4);

	all_buttons2.forEach((btn) => {
	if (!btn.classList.contains("banner-btn")) {
		gsap.from(btn, {
		scrollTrigger: {
			trigger: btn,
			start: "top center+=150",
			markers: false,
		},
		opacity: 0,
		y: 50,
		ease: "bounce",
		duration: 1.5,
		});
	}
	});
	

	//Scroll Down Button
	const scrollBtn = document.querySelector('#scroll-btn');
	if (scrollBtn) { 
		scrollBtn.addEventListener('click', function(e) {
			e.preventDefault();
			document.querySelector('#scroll-section').scrollIntoView({
				behavior: 'smooth'
			});
		});
	}

	// Video Popup

	$('[data-fancybox="gallery"]').fancybox({
		buttons: [
			"close"
		],
		loop: false,
		protect: true
	});
	$('.video-player').fancybox({
		buttons: [
			"close"
		],
		loop: false,
		protect: true
	});
	
	//wow js 
	jQuery(window).on('load', function () {
		new WOW().init();
		window.wow = new WOW({
			boxClass: 'wow',
			animateClass: 'animated',
			offset: 0,
			mobile: true,
			live: true,
			offset: 80
		})
		window.wow.init();
	});

}(jQuery));