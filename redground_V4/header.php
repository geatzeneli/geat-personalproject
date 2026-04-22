<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) wp_body_open(); ?>

<header class="site-header">
	<div class="site-header__bar">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<span class="brand__mark" aria-hidden="true"></span>
			<span class="brand__text">
				<span class="brand__title"><?php bloginfo( 'name' ); ?></span>
				<span class="brand__sub">OLYMPUS TERMINAL // EST. M-YR 31</span>
			</span>
		</a>

		<button class="nav-toggle" id="rg-nav-toggle" aria-expanded="false" aria-controls="rg-nav">MENU</button>

		<nav class="site-nav" id="rg-nav" aria-label="Primary">
			<?php
			if ( has_nav_menu( 'primary' ) ) {
				wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => false,
					'items_wrap'     => '%3$s',
					'walker'         => new Redground_Nav_Walker(),
				) );
			} else {
				$fallback = array(
					'manifest'   => 'Manifest',
					'provenance' => 'Provenance',
					'dispatch'   => 'Dispatch',
					'colony'     => 'Colony',
				);
				foreach ( $fallback as $slug => $label ) {
					$active = is_page( $slug ) ? 'is-active' : '';
					$code   = strtoupper( substr( $label, 0, 3 ) );
					printf(
						'<a href="%s" class="%s"><span class="nav-code">[%s]</span>%s</a>',
						esc_url( home_url( '/' . $slug . '/' ) ),
						esc_attr( $active ),
						esc_html( $code ),
						esc_html( $label )
					);
				}
			}
			?>
		</nav>

		<div class="site-status">
			<span class="dot"></span>
			<span>LINK · <?php echo esc_html( gmdate( 'H:i' ) ); ?> MTC</span>
		</div>
	</div>
</header>
