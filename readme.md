# Smidgen

A featherlight, minimalist starter block theme built on the SmidgenCSS framework. A clean foundation for any WordPress project.

![License: GPL-2.0+](https://img.shields.io/badge/License-GPL--2.0%2B-blue.svg)
![Version](https://img.shields.io/badge/version-0.1.0-blue.svg)

---

## What it is

A barebones WordPress block theme designed as a starting point for projects that want the layout primitives of SmidgenCSS without baked-in opinions on color, typography, or content. System fonts, monochrome palette, generous spacing, and a small set of reusable section patterns are what you get out of the box.

## Requirements

- WordPress 6.4 or later
- PHP 7.4 or later
- The **Smidgen Blocks** companion plugin (required — provides the Grid, Column, Content Wrapper, and Content Well blocks the templates use)

## Installation

1. Download the theme as a ZIP and upload via **Appearance → Themes → Add New → Upload**, or clone the repo into `wp-content/themes/smidgen/`.
2. Install and activate the **Smidgen Blocks** plugin.
3. Activate the Smidgen theme.
4. Use the Site Editor to customize templates, parts, and global styles.

## What's included

### Templates

- `index.html` — universal fallback (homepage, blog index, default)
- `single.html` — single blog post with article header, featured image, prose body, tags, prev/next nav
- `page.html` — minimal title + content for static pages
- `page-canvas.html` — blank canvas template for page-builder layouts (no title, no constraint)
- `archive.html` — category, tag, author, and date archives
- `search.html` — search results with query title and refinement form
- `404.html` — not-found page with search and back link

### Template parts

- `header.html` — logo + navigation
- `footer.html` — three-column links + copyright bar

### Patterns

Section patterns available from the Patterns inserter:

- **Hero** — centered headline, subhead, two CTAs
- **Feature grid** — three-column section on muted background
- **Content with image** — two-column text + image
- **Call to action** — centered CTA band
- **Home page layout** — composite starter pattern combining all four sections, offered when creating a new page

### Design tokens (theme.json)

- 6-color monochrome palette (base, contrast, contrast-2, contrast-3, subtle-background, border)
- System fonts (sans and monospace)
- 5 font sizes (small, medium, large, x-large, xx-large), with fluid scaling on the largest two
- 7-step custom spacing scale aligned with SmidgenCSS variables

## Customization

- **Colors**: Edit `theme.json` `settings.color.palette`, or override via the Site Editor (Styles → Colors)
- **Fonts**: Replace `settings.typography.fontFamilies` in `theme.json` with your own (Google Fonts, self-hosted, etc.)
- **Spacing**: Adjust the SmidgenCSS variables in `assets/css/smidgen.min.css` or override in `assets/css/style.css`
- **Templates**: Edit any template in the Site Editor (Appearance → Editor → Templates)
- **Patterns**: Add your own in `patterns/` following the docblock format of the included patterns

## Updates

The theme checks for new versions automatically. When a new release is published on GitHub, WordPress shows the standard theme update notice in your admin dashboard — same flow as any theme from the WordPress directory.

## Adding a build pipeline (optional)

The theme ships buildless — `assets/css/style.css` is hand-edited and loaded directly. If your project grows past a single stylesheet and you'd rather work in Sass, either of the paths below drops in cleanly.

**When it's worth doing:** the stylesheet has grown past ~400 lines, you're repeating long selector prefixes and want nesting, you're maintaining multiple style files that need shared logic, or you're composing child theme variants where partials would help.

### Lightweight: Sass directly

For a CSS-only theme, the simplest path is the `sass` package on its own:

```bash
npm init -y
npm install --save-dev sass
```

Add to `package.json`:

```json
"scripts": {
  "build:css": "sass src/style.scss assets/css/style.css --style=compressed --no-source-map",
  "watch:css": "sass src/style.scss assets/css/style.css --watch"
}
```

Move `assets/css/style.css` to `src/style.scss`. Split into partials as needed (`_header.scss`, `_article.scss`, `_prose.scss`) and import them into the main file. Run `npm run watch:css` while developing, `npm run build:css` for production. No changes needed to `functions.php` since the compiled output lands at the same path the theme already enqueues.

### WordPress-standard: wp-scripts

If you'd rather match the tooling used by the **Smidgen Blocks** plugin:

```bash
npm init -y
npm install --save-dev @wordpress/scripts
```

Create `src/index.js` containing `import './style.scss';`, then add to `package.json`:

```json
"scripts": {
  "build": "wp-scripts build",
  "start": "wp-scripts start"
}
```

Output lands in `build/` by default, so update `functions.php` to enqueue from `build/style-index.css` instead. This path brings in webpack and a JS pipeline you won't use, but gives you symmetry with the plugin's tooling — handy if you're working on both at once.

### A note on design tokens

The theme's design tokens — colors, fonts, spacing — live in `theme.json` and WordPress exposes them as CSS custom properties at runtime (`var(--wp--preset--color--contrast)`, etc.). Reference those custom properties from your Sass rather than redefining them as Sass variables. That keeps `theme.json` as the single source of truth, so any color or typography changes a user makes in the Site Editor automatically flow through your stylesheet.

## Companion plugin

The **Smidgen Blocks** plugin provides four layout blocks the templates use:

- Smidgen Grid — responsive `.flex-grid` row
- Smidgen Column — cells with responsive widths, order, and self-alignment
- Content Wrapper — full-width section
- Content Well — centered max-width container

Without the plugin, templates will throw block-recovery warnings. Install the plugin before activating the theme.

## License

Licensed under **GPL-2.0-or-later**. See the `LICENSE` file for details.

SmidgenCSS framework is MIT-licensed and bundled in `assets/css/smidgen.min.css`.

## Credits

Built on [SmidgenCSS](https://smidgencss.com). Update flow handled by [Plugin Update Checker](https://github.com/YahnisElsts/plugin-update-checker).
