# Kolena Homepage - PHP Modular Version

The static site has been converted to PHP with modular components for easier maintenance and scalability.

## 📁 PHP Structure

```
static/
├── index.php               # Main homepage (includes all content sections)
├── includes/               # Modular PHP components
│   ├── header.php          # <head>, meta tags, and navigation
│   └── footer.php          # Footer and closing tags
├── css/                    # All stylesheets (unchanged)
├── js/                     # JavaScript files (unchanged)
└── assets/                 # Images and logos (unchanged)
```

## 🔧 How It Works

### index.php
The main page that:
1. Sets page-specific variables (title, meta description, CSS/JS includes)
2. Includes `header.php`
3. Contains all main content sections
4. Includes `footer.php`

### header.php
Contains:
- `<!DOCTYPE html>` and `<head>` section
- Dynamic page title and meta description
- CSS includes (global + page-specific)
- Opening `<body>` tag
- Complete navigation component (desktop & mobile)

### footer.php
Contains:
- Complete footer component
- JavaScript includes (global + page-specific)
- Closing `</body>` and `</html>` tags

## 🎯 Usage

### Basic Usage
```php
<?php
// Set page configuration
$page_title = 'Your Page Title';
$meta_description = 'Your meta description';
$additional_css = ['hero', 'custom-section'];
$additional_js = ['custom-script'];

// Include header
include './includes/header.php';
?>

<!-- Your page content here -->

<?php
// Include footer
include './includes/footer.php';
?>
```

### Page Variables

**$page_title** (optional)
- Default: 'Kolena - AI-Powered Document Automation Platform'
- Sets the `<title>` tag

**$meta_description** (optional)
- Default: 'Kolena - Automate document-heavy workflows with AI...'
- Sets the meta description tag

**$additional_css** (optional)
- Array of CSS filenames (without .css extension)
- Example: `['hero', 'about', 'contact']`
- Files are loaded from `/css/` directory

**$additional_js** (optional)
- Array of JS filenames (without .js extension)
- Example: `['slider', 'form-validation']`
- Files are loaded from `/js/` directory

## 📄 Creating New Pages

1. Create a new PHP file (e.g., `about.php`)
2. Set your page variables
3. Include header.php
4. Add your content
5. Include footer.php

Example:
```php
<?php
$page_title = 'About Us - Kolena';
$meta_description = 'Learn about Kolena and our mission';
$additional_css = ['about'];
include './includes/header.php';
?>

<section class="about">
    <div class="about__container">
        <h1>About Kolena</h1>
        <!-- Your content -->
    </div>
</section>

<?php include './includes/footer.php'; ?>
```

## 🌐 Server Requirements

- **PHP**: 7.0 or higher
- **Web Server**: Apache, Nginx, or any PHP-compatible server

## 🚀 Local Development

### Using PHP Built-in Server
```bash
cd static
php -S localhost:8000
```
Then visit: http://localhost:8000/index.php

### Using XAMPP/WAMP/MAMP
1. Place the `static` folder in your web root
2. Visit: http://localhost/static/index.php

## ✨ Benefits of PHP Modular Structure

### Before (Static HTML)
- ❌ Duplicate navigation in every page
- ❌ Duplicate footer in every page
- ❌ Hard to maintain (update menu = edit all files)
- ❌ No dynamic content

### After (PHP Modular)
- ✅ Single source of truth for navigation
- ✅ Single source of truth for footer
- ✅ Easy to maintain (update once, applies everywhere)
- ✅ Dynamic page titles and meta tags
- ✅ Flexible CSS/JS loading per page
- ✅ Easy to scale and add new pages

## 🔄 Dynamic Features

### Dynamic Copyright Year
The footer automatically displays the current year:
```php
© <?php echo date('Y'); ?> Kolena. All rights reserved.
```

### Conditional CSS Loading
Only load CSS files needed for specific pages:
```php
<?php if (isset($additional_css) && is_array($additional_css)): ?>
    <?php foreach ($additional_css as $css): ?>
        <link rel="stylesheet" href="./css/<?php echo $css; ?>.css">
    <?php endforeach; ?>
<?php endif; ?>
```

### Conditional JS Loading
Only load JavaScript files needed for specific pages:
```php
<?php if (isset($additional_js) && is_array($additional_js)): ?>
    <?php foreach ($additional_js as $js): ?>
        <script src="./js/<?php echo $js; ?>.js"></script>
    <?php endforeach; ?>
<?php endif; ?>
```

## 📊 File Comparison

| Feature | Static HTML | PHP Modular |
|---------|-------------|-------------|
| Navigation | Duplicate in every file | Single `header.php` |
| Footer | Duplicate in every file | Single `footer.php` |
| Page Title | Hardcoded | Dynamic variable |
| Meta Tags | Hardcoded | Dynamic variable |
| CSS Loading | Load all CSS | Load only needed CSS |
| JS Loading | Load all JS | Load only needed JS |
| Maintainability | Low | High |
| Scalability | Low | High |

## 🎨 BEM Methodology

All CSS still follows BEM (Block Element Modifier) naming convention:
- **Block**: `.navigation`
- **Element**: `.navigation__link`
- **Modifier**: `.navigation__link--dropdown`

This remains unchanged from the static version.

## 📝 Next Steps

1. ✅ Homepage converted to PHP
2. ⏳ Convert other pages (Product, About, Contact, etc.)
3. ⏳ Add dynamic content (blog posts, case studies, etc.)
4. ⏳ Implement form handling
5. ⏳ Add CMS integration (optional)

---

**Version**: 2.0.0 (PHP Modular)
**Previous Version**: 1.0.0 (Static HTML)
**Status**: Homepage Complete ✅