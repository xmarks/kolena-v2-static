<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : 'Kolena - Automate document-heavy workflows with AI. Transform document processing with enterprise-grade accuracy and transparency.'; ?>">
    <title><?php echo isset($page_title) ? $page_title : 'Kolena - AI-Powered Document Automation Platform'; ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo isset($base_path) ? $base_path : './'; ?>assets/kolena-logo.png">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo isset($base_path) ? $base_path : './'; ?>css/styles.css">
    <link rel="stylesheet" href="<?php echo isset($base_path) ? $base_path : './'; ?>css/navigation.css">
    <?php if (isset($additional_css) && is_array($additional_css)): ?>
        <?php foreach ($additional_css as $css): ?>
            <link rel="stylesheet" href="<?php echo isset($base_path) ? $base_path : './'; ?>css/<?php echo $css; ?>.css">
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($custom_css) && is_array($custom_css)): ?>
        <?php foreach ($custom_css as $css): ?>
            <link rel="stylesheet" href="<?php echo $css; ?>">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <!-- Navigation Component -->
    <nav class="navigation">
        <div class="navigation__container">
            <!-- Logo -->
            <a href="/" class="navigation__logo-link">
                <img src="<?php echo isset($base_path) ? $base_path : './'; ?>assets/kolena-logo.png" alt="Kolena" class="navigation__logo-image">
            </a>

            <!-- Desktop Navigation Menu -->
            <div class="navigation__menu navigation__menu--desktop">
                <ul class="navigation__list">
                    <li class="navigation__item">
                        <a href="/product" class="navigation__link">Product</a>
                    </li>
                    <li class="navigation__item navigation__item--has-dropdown">
                        <button class="navigation__link navigation__link--dropdown" data-dropdown="solutions">
                            Solutions
                            <svg class="navigation__dropdown-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="navigation__dropdown" id="solutions-dropdown">
                            <a href="/solutions/real-estate" class="navigation__dropdown-item">
                                <div class="navigation__dropdown-icon-wrapper">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"></path>
                                        <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"></path>
                                        <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"></path>
                                        <path d="M10 6h4"></path>
                                        <path d="M10 10h4"></path>
                                        <path d="M10 14h4"></path>
                                        <path d="M10 18h4"></path>
                                    </svg>
                                </div>
                                <div class="navigation__dropdown-content">
                                    <div class="navigation__dropdown-title">Real Estate</div>
                                    <p class="navigation__dropdown-description">Property documents and contracts</p>
                                </div>
                            </a>
                            <a href="/solutions/financial-services" class="navigation__dropdown-item">
                                <div class="navigation__dropdown-icon-wrapper">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                        <polyline points="17 6 23 6 23 12"></polyline>
                                    </svg>
                                </div>
                                <div class="navigation__dropdown-content">
                                    <div class="navigation__dropdown-title">Financial Services</div>
                                    <p class="navigation__dropdown-description">Investment memos and compliance testing</p>
                                </div>
                            </a>
                            <a href="/solutions/insurance" class="navigation__dropdown-item">
                                <div class="navigation__dropdown-icon-wrapper">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                                    </svg>
                                </div>
                                <div class="navigation__dropdown-content">
                                    <div class="navigation__dropdown-title">Insurance</div>
                                    <p class="navigation__dropdown-description">Claims processing and underwriting</p>
                                </div>
                            </a>
                            <a href="/solutions/banking" class="navigation__dropdown-item">
                                <div class="navigation__dropdown-icon-wrapper">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="3" y1="22" x2="21" y2="22"></line>
                                        <line x1="6" y1="18" x2="6" y2="11"></line>
                                        <line x1="10" y1="18" x2="10" y2="11"></line>
                                        <line x1="14" y1="18" x2="14" y2="11"></line>
                                        <line x1="18" y1="18" x2="18" y2="11"></line>
                                        <polygon points="12 2 20 7 4 7"></polygon>
                                    </svg>
                                </div>
                                <div class="navigation__dropdown-content">
                                    <div class="navigation__dropdown-title">Banking</div>
                                    <p class="navigation__dropdown-description">Lending workflows and UCC filings</p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="navigation__item">
                        <a href="/integrations" class="navigation__link">Integrations</a>
                    </li>
                    <li class="navigation__item">
                        <a href="/use-cases" class="navigation__link">Use Cases</a>
                    </li>
                    <li class="navigation__item navigation__item--has-dropdown">
                        <button class="navigation__link navigation__link--dropdown" data-dropdown="resources">
                            Resources
                            <svg class="navigation__dropdown-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="navigation__dropdown" id="resources-dropdown">
                            <a href="https://docs.agents.kolena.com" target="_blank" rel="noopener noreferrer" class="navigation__dropdown-item">
                                <div class="navigation__dropdown-icon-wrapper">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line x1="16" y1="13" x2="8" y2="13"></line>
                                        <line x1="16" y1="17" x2="8" y2="17"></line>
                                        <polyline points="10 9 9 9 8 9"></polyline>
                                    </svg>
                                </div>
                                <div class="navigation__dropdown-content">
                                    <div class="navigation__dropdown-title">Docs</div>
                                    <p class="navigation__dropdown-description">Technical documentation and guides</p>
                                </div>
                            </a>
                            <a href="/blog" class="navigation__dropdown-item">
                                <div class="navigation__dropdown-icon-wrapper">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"></path>
                                        <path d="M18 14h-8"></path>
                                        <path d="M15 18h-5"></path>
                                        <path d="M10 6h8v4h-8V6Z"></path>
                                    </svg>
                                </div>
                                <div class="navigation__dropdown-content">
                                    <div class="navigation__dropdown-title">Blog</div>
                                    <p class="navigation__dropdown-description">Latest news and insights</p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="navigation__item navigation__item--has-dropdown">
                        <button class="navigation__link navigation__link--dropdown" data-dropdown="company">
                            Company
                            <svg class="navigation__dropdown-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                        <div class="navigation__dropdown" id="company-dropdown">
                            <a href="/about" class="navigation__dropdown-item">
                                <div class="navigation__dropdown-icon-wrapper">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                                <div class="navigation__dropdown-content">
                                    <div class="navigation__dropdown-title">About</div>
                                    <p class="navigation__dropdown-description">Learn about our mission and team</p>
                                </div>
                            </a>
                            <a href="/contact" class="navigation__dropdown-item">
                                <div class="navigation__dropdown-icon-wrapper">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                        <polyline points="22,6 12,13 2,6"></polyline>
                                    </svg>
                                </div>
                                <div class="navigation__dropdown-content">
                                    <div class="navigation__dropdown-title">Contact Us</div>
                                    <p class="navigation__dropdown-description">Get in touch with our team</p>
                                </div>
                            </a>
                            <a href="/careers" class="navigation__dropdown-item">
                                <div class="navigation__dropdown-icon-wrapper">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                                        <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                    </svg>
                                </div>
                                <div class="navigation__dropdown-content">
                                    <div class="navigation__dropdown-title">Careers</div>
                                    <p class="navigation__dropdown-description">Join our growing team</p>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Desktop CTA Buttons -->
            <div class="navigation__cta-group navigation__cta-group--desktop">
                <a href="/request-a-demo/" class="navigation__button navigation__button--secondary">Request Demo</a>
                <a href="/request-access" class="navigation__button navigation__button--primary">2-Week Free Trial</a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="navigation__mobile-toggle" aria-label="Toggle mobile menu">
                <svg class="navigation__mobile-icon navigation__mobile-icon--menu" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
                <svg class="navigation__mobile-icon navigation__mobile-icon--close" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation Menu -->
        <div class="navigation__mobile-menu">
            <div class="navigation__mobile-container">
                <div class="navigation__mobile-links">
                    <a href="/product" class="navigation__mobile-link">Product</a>

                    <button class="navigation__mobile-link navigation__mobile-link--collapsible" data-mobile-collapse="solutions">
                        Solutions
                        <svg class="navigation__mobile-chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="navigation__mobile-collapse" id="mobile-solutions">
                        <a href="/solutions/real-estate" class="navigation__mobile-sublink">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"></path>
                                <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"></path>
                                <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"></path>
                                <path d="M10 6h4"></path>
                                <path d="M10 10h4"></path>
                                <path d="M10 14h4"></path>
                                <path d="M10 18h4"></path>
                            </svg>
                            Real Estate
                        </a>
                        <a href="/solutions/financial-services" class="navigation__mobile-sublink">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            </svg>
                            Financial Services
                        </a>
                        <a href="/solutions/insurance" class="navigation__mobile-sublink">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                            </svg>
                            Insurance
                        </a>
                        <a href="/solutions/banking" class="navigation__mobile-sublink">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polygon points="12 2 20 7 4 7"></polygon>
                            </svg>
                            Banking
                        </a>
                    </div>

                    <a href="/integrations" class="navigation__mobile-link">Integrations</a>
                    <a href="/use-cases" class="navigation__mobile-link">Use Cases</a>

                    <button class="navigation__mobile-link navigation__mobile-link--collapsible" data-mobile-collapse="resources">
                        Resources
                        <svg class="navigation__mobile-chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="navigation__mobile-collapse" id="mobile-resources">
                        <a href="https://docs.agents.kolena.com" target="_blank" rel="noopener noreferrer" class="navigation__mobile-sublink">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            </svg>
                            Docs
                        </a>
                        <a href="/blog" class="navigation__mobile-sublink">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-2 2Zm0 0a2 2 0 0 1-2-2v-9c0-1.1.9-2 2-2h2"></path>
                                <path d="M18 14h-8"></path>
                                <path d="M15 18h-5"></path>
                                <path d="M10 6h8v4h-8V6Z"></path>
                            </svg>
                            Blog
                        </a>
                    </div>

                    <button class="navigation__mobile-link navigation__mobile-link--collapsible" data-mobile-collapse="company">
                        Company
                        <svg class="navigation__mobile-chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                    <div class="navigation__mobile-collapse" id="mobile-company">
                        <a href="/about" class="navigation__mobile-sublink">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="7" r="4"></circle>
                            </svg>
                            About
                        </a>
                        <a href="/contact" class="navigation__mobile-sublink">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            </svg>
                            Contact Us
                        </a>
                        <a href="/careers" class="navigation__mobile-sublink">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect>
                            </svg>
                            Careers
                        </a>
                    </div>
                </div>

                <div class="navigation__mobile-cta">
                    <a href="/request-a-demo/" class="navigation__button navigation__button--secondary navigation__button--full">Request Demo</a>
                    <a href="/request-access" class="navigation__button navigation__button--primary navigation__button--full">2-Week Free Trial</a>
                </div>
            </div>
        </div>
    </nav>