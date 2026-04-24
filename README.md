# RouteOne — WordPress Theme

[![WordPress](https://img.shields.io/badge/WordPress-5.4%2B-21759B?logo=wordpress&logoColor=white)](https://wordpress.org/)
[![PHP](https://img.shields.io/badge/PHP-7.4%2B-777BB4?logo=php&logoColor=white)](https://www.php.net/)
[![License](https://img.shields.io/badge/License-GPL--2.0--or--later-blue.svg)](LICENSE)
[![Code Style](https://img.shields.io/badge/Code%20Style-WPCS-21759B)](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/)

Custom WordPress theme for a transfers and car-rental brand. Built on the [Underscores (`_s`)](https://underscores.me/) starter, with a full ACF-driven Gutenberg block library, AJAX-based content loading, custom post types, and a Webpack/Sass front-end pipeline.

This is a portfolio version of a real client project — text content, brand assets, and deploy host have been replaced with neutral placeholders. See [Anonymization notes](#anonymization-notes) below.

---

## Highlights

- **28 ACF Gutenberg blocks** (`template-parts/blocks/`) covering hero sections, sliders, pricing tables, FAQ, testimonials, transfer forms, services grids, and more — registered via `acf_register_block_type()` in [`inc/acf-register-blocks.php`](inc/acf-register-blocks.php).
- **AJAX endpoints** for paginated post/transfer loading ([`inc/ajax.php`](inc/ajax.php)).
- **Modular `inc/` layer**: theme setup, customizer, ACF options pages, common helpers, template tags/functions, Jetpack compatibility, fix-up hooks.
- **Custom post types & taxonomies** for transfers, services, and cars.
- **WPML / Polylang-ready** i18n with all strings wrapped in `__()` / `_e()` and a `routeone` text domain.
- **RTL support** via `rtlcss`-generated `style-rtl.css`.
- **Front-end build**: Webpack 5 + Sass + Babel, with separate `dist/` for production assets (see [`assets/`](assets/)).
- **WPCS linting** via `phpcs` + `wptrt/wpthemereview`.
- **CI/CD example**: GitLab CI deploy stage in [`gitlab-ci.yml`](gitlab-ci.yml) (legacy, kept for reference).

## Project structure

```
routeone-wp-theme/
├── assets/                       # Front-end build (Webpack/Sass/JS)
│   ├── src/                      # SCSS, JS, images, fonts
│   ├── webpack.config.js
│   └── package.json
├── inc/                          # PHP modules
│   ├── acf-option-page.php       # ACF Options Pages
│   ├── acf-register-blocks.php   # ACF Gutenberg block registration
│   ├── ajax.php                  # AJAX handlers
│   ├── common-functions.php      # Helpers (image sizes, reading time, etc.)
│   ├── customizer.php            # Theme Customizer
│   ├── custom-header.php
│   ├── fix-functions.php
│   ├── jetpack.php               # Jetpack compat
│   ├── template-functions.php
│   └── template-tags.php
├── template-parts/
│   ├── blocks/                   # 28 ACF block render templates
│   ├── cards/
│   └── content-*.php             # Post / page / search / archive partials
├── languages/
│   └── routeone.pot
├── functions.php                 # Theme bootstrap
├── style.css                     # Theme metadata header + admin overrides
├── style-rtl.css
└── *.php                         # WP template hierarchy (header, footer, single, page, archive, ...)
```

## Requirements

- PHP **7.4+**
- WordPress **5.4+** (Gutenberg)
- [ACF Pro](https://www.advancedcustomfields.com/pro/) (for block templates and Options Pages)
- Node **18.x** (for the front-end build)
- Composer (for PHP linters)

## Installation

```sh
# 1. Drop the theme into your WordPress install
git clone https://github.com/Hadomdev/routeone-wp-theme.git wp-content/themes/routeone-wp-theme

# 2. Install PHP dev dependencies (optional — only needed for linting)
cd wp-content/themes/routeone-wp-theme
composer install

# 3. Build front-end assets
cd assets
npm install --force
npm run build         # production build → ./dist/
# or:
npm run start         # dev server with watch
```

Activate **RouteOne** in *Appearance → Themes*.

> Note: the `dist/` folder is **not committed** — it is generated locally by the Webpack build. If you skip the build, the theme will load `style.css` (admin overrides) but the front-end design will not render.

## Available scripts

### Root (PHP linters + i18n)

```sh
composer lint:wpcs    # WordPress Coding Standards check
composer lint:php     # parallel PHP syntax lint
composer make-pot     # regenerate languages/routeone.pot
npm run compile:rtl   # regenerate style-rtl.css from style.css
```

### Front-end (`assets/`)

```sh
npm run start         # webpack-dev-server (development, with watch)
npm run watch         # webpack --watch (development)
npm run build         # production build to ./dist/
```

The Webpack pipeline:
- Compiles SCSS → `dist/css/style.bundle.css` (with PostCSS + cssnano).
- Bundles JS → `dist/js/bundle.js` (Babel + Terser).
- Copies `src/img/`, `src/fonts/`, `src/favicon/` to `dist/`.
- Optionally generates static HTML pages from `src/html/views/` (the views folder is not included in this public repo — the config gracefully skips it when missing).

## Deployment

`gitlab-ci.yml` ships a single `deploy_dev` stage that SSHes into a target host on push to `main` and runs `git pull && npm install && npm run build`. Set the following CI variables before enabling the pipeline:

| Variable          | Purpose                                |
|-------------------|----------------------------------------|
| `DEPLOY_HOST`     | Target server IP or hostname           |
| `SSH_PRIVATE_KEY` | Private key authorized on the server   |

## Anonymization notes

This repository is a **public portfolio version** of a real client project. The following changes were made before publication:

- All client-specific brand identifiers (theme name, function prefixes, text domain, package name, logo) were replaced with `RouteOne` / `routeone`.
- Static HTML mockups under `assets/src/html/` (used by Webpack to generate standalone HTML previews) were removed because they contained client copy. The Webpack config tolerates the missing folder.
- A 150-entry `custom_redirects()` map of legacy slugs (specific to one operating region) was reduced to a 3-entry generic example in `routeone_legacy_redirects()`.
- A debug-only `grab_pages_content()` helper containing ~40 hardcoded production URLs was removed.
- All photographic assets (JPG/PNG/WebP) under `assets/src/img/` were removed. They contained client photography (team headshots, client-branded vehicles, location-identifiable airport/landscape shots, and a watermark). Only generic SVG icons (UI icons, social, payment, decorative) and the new RouteOne wordmark logos remain. Two SCSS rules that referenced removed background photos were switched to a solid neutral colour.
- The deploy host IP in `gitlab-ci.yml` was replaced with a `${DEPLOY_HOST}` CI variable.
- The Yoast SEO export file (`yoastseo_export_vr.json`) was deleted.

The PHP architecture, block registration, AJAX handlers, build pipeline, and template hierarchy are unchanged.

## License

GPL-2.0-or-later. Based on [Automattic/_s](https://github.com/Automattic/_s) (also GPL-2.0-or-later).
