<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : 'Kolena - Automate document-heavy workflows with AI. Transform document processing with enterprise-grade accuracy and transparency.'; ?>">
    <title><?php echo isset($page_title) ? $page_title : 'Kolena - AI-Powered Document Automation Platform'; ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="./assets/kolena-logo.png">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/navigation.css">
    <?php if (isset($additional_css) && is_array($additional_css)): ?>
        <?php foreach ($additional_css as $css): ?>
            <link rel="stylesheet" href="./css/<?php echo $css; ?>.css">
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>
    <!-- Navigation Component -->
    <nav class="navigation">
        <div class="navigation__container">
            <!-- Logo -->
            <a href="/" class="navigation__logo-link">
                <img src="./assets/kolena-logo.png" alt="Kolena" class="navigation__logo-image">
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
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                                        <path d="M9 22v-4h6v4"></path>
                                        <path d="M8 6h.01"></path>
                                        <path d="M16 6h.01"></path>
                                        <path d="M12 6h.01"></path>
                                        <path d="M12 10h.01"></path>
                                        <path d="M12 14h.01"></path>
                                        <path d="M16 10h.01"></path>
                                        <path d="M16 14h.01"></path>
                                        <path d="M8 10h.01"></path>
                                        <path d="M8 14h.01"></path>
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
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
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
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M3 3h18v18H3zM21 9H3M21 15H3M12 3v18"></path>
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
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
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
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
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
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 3h18v18H3z"></path>
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