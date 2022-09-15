
/* ========================== MOBILE NAV ========================== */
let mobileNavButton = document.querySelector('.mobile-nav-button');
let mobileNavIcon = document.querySelector('.mobile-nav-button__icon');
let mobileNav = document.querySelector('.mobile-nav');

mobileNavButton.addEventListener('click', function (e) {
	mobileNavIcon.classList.toggle('active')
	mobileNav.classList.toggle('active')
	document.body.classList.toggle('no-scroll')
  })

/* ========================== VIDEO ========================== */

let videoBtn = document.querySelector('#video-story-btn')
let videoIcon = document.querySelector('#video-story-btn-icon')
let videoFile = document.querySelector('#video-story')
let overlay = document.querySelector('.story-video-overlay')

videoBtn.addEventListener('click', function (e) {
	if(videoFile.paused) {
		videoFile.play()
		videoIcon.src = 'img/pause.svg'

		overlay.onmouseleave = overlay.onmouseenter = toggleOverlay;
	} else {
		videoFile.pause()
		videoIcon.src = 'img/story/play-white.svg'
		overlay.onmouseenter = null
		overlay.onmouseleave = null
	}
  })

	function toggleOverlay(e){
		if(e.type == 'mouseleave'){
			overlay.classList.add('hidden')
		} else {
			overlay.classList.remove('hidden')
		}
	}
