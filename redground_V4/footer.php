<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<footer class="site-footer">
	<div class="wrap">
		<div class="site-footer__grid">
			<div>
				<div class="foot__h">// Collective</div>
				<p class="foot__p">
					REDGROUND Coffee Collective<br />
					Olympus Terminal, Bay 07<br />
					Tharsis Basin, Mars
				</p>
			</div>
			<div>
				<div class="foot__h">// Dispatch</div>
				<p class="foot__p">
					Earth Window: Q3 / M-YR 34<br />
					Lift Vehicle: Heavy-Lift OL-09<br />
					Cargo Bay: 7.4 t pressurized
				</p>
			</div>
			<div>
				<div class="foot__h">// Signal</div>
				<p class="foot__p">
					Earth ↔ Olympus: DELAY 07:31<br />
					Relay: Phobos-Sat 03<br />
					Status: NOMINAL
				</p>
			</div>
		</div>
		<div class="site-footer__bar">
			<span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> REDGROUND OPS · OLYMPUS TERMINAL · EST. M-YR 31</span>
			<span>SIGNAL STRENGTH: NOMINAL · NEXT DISPATCH WINDOW: 06:00 MTC</span>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
