/**
 * REDGROUND — Olympus Terminal
 * Slider controller — vanilla JS, no dependencies.
 *
 * Wires prev/next/dot controls, autoplay (8s), pause-on-hover,
 * keyboard arrows when focused. Initializes every [data-rg-slider]
 * on the page independently.
 */
(function () {
    'use strict';

    var AUTOPLAY_MS = 8000;

    function initSlider(stage) {
        var slides = stage.querySelectorAll('.rg-slider__slide');
        var dots   = stage.querySelectorAll('[data-rg-dot]');
        var prev   = stage.querySelector('[data-rg-prev]');
        var next   = stage.querySelector('[data-rg-next]');
        if (!slides.length) return;

        var current = 0;
        var timer   = null;

        function go(i) {
            current = (i + slides.length) % slides.length;
            slides.forEach(function (s, idx) {
                var active = idx === current;
                s.classList.toggle('is-active', active);
                s.setAttribute('aria-hidden', active ? 'false' : 'true');
            });
            dots.forEach(function (d, idx) {
                var active = idx === current;
                d.classList.toggle('is-active', active);
                d.setAttribute('aria-selected', active ? 'true' : 'false');
            });
        }

        function start() { stop(); timer = setInterval(function () { go(current + 1); }, AUTOPLAY_MS); }
        function stop()  { if (timer) { clearInterval(timer); timer = null; } }

        if (prev) prev.addEventListener('click', function () { go(current - 1); start(); });
        if (next) next.addEventListener('click', function () { go(current + 1); start(); });
        dots.forEach(function (d, idx) {
            d.addEventListener('click', function () { go(idx); start(); });
        });

        stage.addEventListener('mouseenter', stop);
        stage.addEventListener('mouseleave', start);
        stage.setAttribute('tabindex', '0');
        stage.addEventListener('keydown', function (e) {
            if (e.key === 'ArrowLeft')  { go(current - 1); start(); }
            if (e.key === 'ArrowRight') { go(current + 1); start(); }
        });

        start();
    }

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('[data-rg-slider]').forEach(initSlider);
    });
}());
