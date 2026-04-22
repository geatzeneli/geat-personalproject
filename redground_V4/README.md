# REDGROUND — Olympus Terminal

A maximalist, futuristic WordPress theme for a Mars-themed coffee collective.

## Install

1. In WordPress admin go to **Appearance → Themes → Add New → Upload Theme**
2. Upload `redground-olympus-terminal.zip`
3. Click **Install** then **Activate**
4. Go to **Settings → Permalinks** and click **Save Changes** (refreshes rewrite rules so /manifest/, /provenance/, /dispatch/, /colony/ work)
5. Visit **Settings → Reading** and set **Your homepage displays → A static page** if you want the front page to show the maximalist landing layout. (The theme also ships `front-page.php`, so this is optional — WordPress will use it automatically on the home URL.)

## What activation does

On first activation the theme automatically creates the four pages and assigns the right templates:

| URL          | Template            |
| ------------ | ------------------- |
| /manifest/   | page-manifest.php   |
| /provenance/ | page-provenance.php |
| /dispatch/   | page-dispatch.php   |
| /colony/     | page-colony.php     |

It also creates a "Primary" navigation menu pointing to those four pages and assigns it to the Primary location.

## Files

- `style.css` — theme metadata + full design system
- `front-page.php` — homepage with hero, image carousel, origin dispatch, roast log, dispatch newsletter, manifest feed, telemetry strip
- `header.php` / `footer.php` — site shell
- `index.php` — fallback / blog index
- `page.php` / `single.php` / `404.php` — defaults
- `page-manifest.php` / `page-provenance.php` / `page-dispatch.php` / `page-colony.php` — the four nav pages
- `functions.php` — setup, asset enqueue, auto page provisioning, custom nav walker
- `assets/js/app.js` — carousel + mobile nav

## Slider images

The carousel currently uses procedural CSS-generated frames (no image files). To swap in your own photos, edit the `$slides` array in `front-page.php` and either:

- replace the `redground_slide_styles()` call with `style="background-image:url(...)"` and an `<img>` inside `.carousel__slide`, or
- drop your photos into `assets/images/` and reference them via `get_template_directory_uri()`.

Version 1.5.0
