# Smidgen CSS

A featherlight, no-nonsense CSS grid and layout system built for speed and simplicity.

![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)

---

## Why Smidgen CSS?

In a world of complex frameworks, Smidgen CSS is intentionally simple. It's a tiny, plain CSS file that provides the essential tools to create responsive layouts. There are no preprocessors, no JavaScript, and no complicated classes to memorize.

It's designed for developers who want to get a project up and running quickly while maintaining full control over their code.

### Features

- **Purely CSS**: No Sass, Less, or JavaScript required.
- **Incredibly Lightweight**: A tiny footprint for faster load times.
- **Mobile-First Design**: Naturally responsive, scaling up from mobile to desktop.
- **Flexbox-Powered**: Built on modern, powerful Flexbox for easy alignment and distribution.
- **Easily Customizable**: Tweak containers, gutters, and breakpoints by changing a few CSS variables.
- **Essential Utilities**: Includes classes for containers, wrappers, gutters, and alignment.

---

## Quick Start

1.  Download the `smidgen.min.css` file from this repository.
2.  Link it in the `<head>` of your HTML file.

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Awesome Site</title>
    <link rel="stylesheet" href="path/to/smidgen.min.css" />
  </head>
  <body></body>
</html>
```

---

## How to Use

### The Basic Structure

The layout system consists of two main components: a `.content-wrapper` for full-width sections (like a background color) and a `.content-well` to constrain your content to a centered, max-width container.

HTML

```
<div class="content-wrapper">

  <div class="content-well">
    ... your grid goes here ...
  </div>

</div>

```

**Container Variations**:

- `.content-well-narrow`: For tighter content areas.
- `.content-well`: The standard, default width.
- `.content-well-wide`: For more spacious layouts.

### The Grid

To create a grid, use the `.flex-grid` container and fill it with `.flex-col` items. Add responsive classes to control the column widths at different breakpoints (`sm-`, `md-`, `lg-`).

To add spacing (gutters) between columns, simply add the `.with-gutters` class to the `.flex-grid` container.

HTML

```
<div class="flex-grid with-gutters">
  <div class="flex-col sm-12 md-6">
    ...
  </div>
  <div class="flex-col sm-12 md-6">
    ...
  </div>
</div>

```

### Auto and Shrink Columns

For flexible columns, use `.col-auto` to make a column automatically fill the remaining space, or `.col-shrink` to make it only as wide as its content.

HTML

```
<div class="flex-grid with-gutters">
  <div class="flex-col col-shrink">Shrink</div>
  <div class="flex-col col-auto">Auto</div>
  <div class="flex-col lg-3">lg-3</div>
</div>

```

### Alignment Utilities

Control the alignment of columns within a `.flex-grid` container or align individual columns themselves.

**1. On the `.flex-grid` container:**

- **Horizontal:** `.justify-start`, `.justify-center`, `.justify-end`, `.justify-between`.
- **Vertical:** `.align-top`, `.align-middle`, `.align-bottom`.

HTML

```
<div class="flex-grid align-middle justify-center">
  <div class="flex-col sm-4">...</div>
  <div class="flex-col sm-4">...</div>
</div>

```

**2. On an individual `.flex-col`:**

- **Vertical Self-Alignment:** `.self-top`, `.self-middle`, `.self-bottom`.

HTML

```
<div class="flex-grid align-top">
  <div class="flex-col sm-6">This column is tall.</div>
  <div class="flex-col sm-6 self-bottom">This column is at the bottom.</div>
</div>

```

---

## Customization

You can easily change the entire grid system by editing the CSS variables defined at the top of the `smidgen.css` file.

CSS

```
:root {
  --grid-columns: 12;
  --grid-gutter: 1.5rem;
  --container-standard: 1140px;
  --breakpoint-md: 768px;
  /* ...and more */
}

```

---

## License

This project is licensed under the **MIT License**. See the `LICENSE` file for details.
