# REDGROUND — Olympus Terminal

A Frontier-Maximalist WordPress theme for the first native Martian coffee collective.

## Install

1. Zip the `redground/` folder (already done if you downloaded `redground.zip`).
2. WP Admin → **Appearance → Themes → Add New → Upload Theme**.
3. Upload the zip, **Install**, then **Activate**.

## Files

- `style.css` — Theme header + full design system (CSS variables, scan-lines, dome motifs).
- `functions.php` — Setup, enqueues Google Fonts + stylesheet, registers menus/sidebars, custom telemetry helpers (`redground_atmospheric_pressure()`, `redground_signal_delay()`, `redground_colonial_timestamp()`).
- `header.php` — `<head>` shell with `language_attributes`, `bloginfo('charset')`, `body_class`, `wp_head()`, telemetry strip, brand masthead, primary nav.
- `index.php` — The Loop pulling coffee posts into the manifest grid + atmospheric sidebar.
- `footer.php` — Three-column technical footer + versioning strip + `wp_footer()`.

## Content setup

- Create posts for each coffee. Set a **Featured Image** (else a generated specimen graphic renders).
- Assign each post a **Category** — it surfaces as the technical label on the card.
- Register a menu under **Appearance → Menus** and assign it to "Primary Terminal Navigation".

## Customization

- All colors live as CSS variables on `:root` in `style.css`:
  - `--rg-void` `#0A0705`
  - `--rg-rust` `#B84A1E`
  - `--rg-dome` `#F0E8DF`
  - `--rg-gold` `#C4A35A`
- Bump `REDGROUND_MARTIAN_YEAR` in `functions.php` to tick the colonial year.

v1.0.0 // M-Year 34
