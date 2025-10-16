# Kolena Homepage - Static HTML/CSS/JS Version

This directory contains the static HTML/CSS/JS conversion of the Kolena homepage from the React/TypeScript/Tailwind reference project.

## 📋 Project Overview

**Goal**: Convert the React-based homepage to a static site using:
- Pure HTML (no frameworks)
- Vanilla CSS (no Tailwind)
- Vanilla JavaScript (no TypeScript)
- BEM Methodology for CSS naming

## 📁 Directory Structure

```
static/
├── index.html              # Main homepage HTML
├── css/                    # All stylesheets
│   ├── styles.css          # Global styles & CSS variables
│   ├── navigation.css      # Navigation component styles
│   ├── hero.css            # Hero section styles
│   ├── logo-carousel.css   # Logo carousel styles
│   ├── platform-overview.css  # Platform overview styles
│   ├── solutions-grid.css  # Solutions grid styles
│   ├── social-proof.css    # Social proof section styles
│   ├── homepage-cta.css    # Homepage CTA styles
│   └── footer.css          # Footer styles
├── js/                     # JavaScript files
│   ├── navigation.js       # Navigation interactivity
│   └── logo-carousel.js    # Logo carousel functionality
└── assets/                 # Images and logos
    ├── kolena-logo.png
    └── logos/              # Client logos directory
```

## 🎨 Homepage Components

The homepage consists of the following sections (top to bottom):

1. **Navigation** - Sticky header with desktop dropdown menus and mobile hamburger menu
2. **Hero** - Main hero section with title, CTA, and trust badges
3. **Logo Carousel** - Infinite scrolling carousel of client logos (17 companies)
4. **Platform Overview** - 3-step platform process cards
5. **Solutions Grid** - 4 industry solution cards (Real Estate, Financial, Insurance, Banking)
6. **Social Proof** - Featured testimonial and statistics
7. **Homepage CTA** - Final call-to-action section
8. **Footer** - 4-column footer with links and social media

## 🏗️ BEM Methodology

All CSS follows BEM (Block Element Modifier) naming convention:

### Naming Structure
- **Block**: `.component-name`
- **Element**: `.component-name__element`
- **Modifier**: `.component-name__element--modifier`

### Examples
```css
/* Block */
.navigation { }

/* Elements */
.navigation__container { }
.navigation__logo { }
.navigation__menu { }
.navigation__link { }

/* Modifiers */
.navigation__menu--desktop { }
.navigation__button--primary { }
.navigation__mobile-icon--close { }
```

## 🎨 CSS Variables (Design Tokens)

All colors, spacing, typography, and other design values are defined as CSS variables in `styles.css`:

```css
:root {
    /* Colors */
    --primary: #2F66F5;
    --success: #46C09A;
    --foreground: #1E293B;
    --muted-foreground: #64748B;

    /* Spacing */
    --spacing-4: 16px;
    --spacing-6: 24px;
    --spacing-8: 32px;

    /* Typography */
    --font-base: 16px;
    --font-xl: 20px;
    --font-3xl: 30px;

    /* Shadows */
    --shadow-md: 0 4px 6px rgba(30, 41, 59, 0.1);
    --shadow-lg: 0 10px 15px rgba(30, 41, 59, 0.1);
}
```

## 🔧 JavaScript Functionality

### Navigation (navigation.js)
- **Desktop Dropdowns**: Click to open/close dropdown menus with outside-click and Escape key handling
- **Mobile Menu**: Hamburger toggle with slide-in menu
- **Mobile Collapsibles**: Expandable sections in mobile menu
- **Responsive**: Auto-closes mobile menu on window resize

### Logo Carousel (logo-carousel.js)
- **Infinite Scroll**: Seamless infinite horizontal scrolling
- **Pause on Hover**: Animation pauses when user hovers over logos
- **Responsive**: Adapts to different screen sizes
- **Accessibility**: Respects `prefers-reduced-motion`

## 📱 Responsive Design

The site is fully responsive with breakpoints at:
- **Mobile**: `max-width: 767px`
- **Tablet**: `768px - 1023px`
- **Desktop**: `min-width: 1024px`

Responsive features:
- Sticky navigation with mobile hamburger menu
- Flexible grid layouts that stack on mobile
- Typography scales down on smaller screens
- Touch-friendly tap targets on mobile

## ♿ Accessibility Features

- Semantic HTML5 elements (`<nav>`, `<section>`, `<footer>`)
- ARIA attributes (`aria-label`, `aria-expanded`)
- Keyboard navigation support (Tab, Escape keys)
- Focus-visible states for all interactive elements
- Sufficient color contrast ratios
- `prefers-reduced-motion` support

## 🎯 Key Differences from Reference

### What Was Converted:
✅ All React components → Pure HTML
✅ Tailwind classes → Vanilla CSS with BEM
✅ TypeScript → Vanilla JavaScript
✅ React state management → DOM manipulation
✅ React Router Links → Standard anchor tags
✅ Shadcn UI components → Custom HTML/CSS

### Simplified Elements:
- Complex animations (Hero, Reasoning, Workflows) → Placeholder divs
- React forms → Static HTML forms
- Dynamic routing → Static anchor links

## 🚀 Usage

Simply open `index.html` in a web browser. No build process or server required!

```bash
# Open in default browser (Windows)
start index.html

# Or use a local server
python -m http.server 8000
# Then visit http://localhost:8000
```

## 📦 Assets

All required assets have been copied from the reference project:
- Kolena logo: `assets/kolena-logo.png`
- Client logos: `assets/logos/` (17 company logos)
- Images: Various hero and background images

## 🔄 Future Enhancements

Potential additions for a complete static site:
1. **Animations**: Add CSS animations for Hero workflow visualization
2. **Form Handling**: Implement form submission with JavaScript
3. **Additional Pages**: Convert other pages (Product, About, Contact, etc.)
4. **Optimization**: Minify CSS/JS for production
5. **Service Worker**: Add offline functionality

## 📚 Reference

Original React project located at: `/reference/`

Key reference files:
- `/reference/src/pages/Index.tsx` - Homepage structure
- `/reference/src/index.css` - Global styles and design tokens
- `/reference/tailwind.config.ts` - Tailwind configuration
- `/reference/DESIGN_SYSTEM.md` - Design system documentation

## 📝 Notes

- All external links (docs, blog, social media) point to their original destinations
- Internal navigation links use relative paths (will need to be updated when other pages are created)
- The site follows the exact visual design of the reference project
- BEM methodology ensures maintainable and scalable CSS
- No external dependencies - 100% vanilla code

---

**Created**: October 2025
**Version**: 1.0.0
**Status**: Homepage Complete ✅