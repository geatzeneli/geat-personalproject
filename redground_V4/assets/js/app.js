/* REDGROUND — Olympus Terminal v1.5.0 */
(function () {
	'use strict';

	/* Mobile nav toggle */
	var navToggle = document.getElementById('rg-nav-toggle');
	var nav = document.getElementById('rg-nav');
	if (navToggle && nav) {
		navToggle.addEventListener('click', function () {
			var open = nav.classList.toggle('is-open');
			navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
		});
	}

	/* Carousel */
	document.querySelectorAll('[data-carousel]').forEach(function (root) {
		var track = root.querySelector('.carousel__track');
		var slides = root.querySelectorAll('.carousel__slide');
		var prev = root.querySelector('[data-carousel-prev]');
		var next = root.querySelector('[data-carousel-next]');
		var dotsWrap = root.querySelector('[data-carousel-dots]');
		var counter = root.querySelector('[data-carousel-counter]');
		var i = 0;
		var n = slides.length;
		if (!n) return;

		// build dots
		if (dotsWrap) {
			for (var d = 0; d < n; d++) {
				var b = document.createElement('button');
				b.className = 'carousel__dot' + (d === 0 ? ' is-active' : '');
				b.setAttribute('aria-label', 'Go to frame ' + (d + 1));
				b.dataset.idx = d;
				dotsWrap.appendChild(b);
			}
		}
		var dots = root.querySelectorAll('.carousel__dot');

		function go(idx) {
			i = (idx + n) % n;
			if (track) track.style.transform = 'translateX(' + (-i * 100) + '%)';
			dots.forEach(function (el, k) { el.classList.toggle('is-active', k === i); });
			if (counter) counter.innerHTML = '<b>FRAME ' + String(i + 1).padStart(2, '0') + '</b> / ' + String(n).padStart(2, '0');
		}
		if (prev) prev.addEventListener('click', function () { go(i - 1); });
		if (next) next.addEventListener('click', function () { go(i + 1); });
		dots.forEach(function (el) { el.addEventListener('click', function () { go(parseInt(el.dataset.idx, 10)); }); });

		// auto-advance
		var timer = setInterval(function () { go(i + 1); }, 6000);
		root.addEventListener('mouseenter', function () { clearInterval(timer); });

		// keyboard
		root.addEventListener('keydown', function (e) {
			if (e.key === 'ArrowLeft') go(i - 1);
			if (e.key === 'ArrowRight') go(i + 1);
		});

		go(0);
	});

	/* Live MTC clock in header */
	var statusTime = document.querySelector('.site-status span:last-child');
	if (statusTime) {
		setInterval(function () {
			var d = new Date();
			var hh = String(d.getUTCHours()).padStart(2, '0');
			var mm = String(d.getUTCMinutes()).padStart(2, '0');
			statusTime.textContent = 'LINK · ' + hh + ':' + mm + ' MTC';
		}, 30000);
	}
})();
