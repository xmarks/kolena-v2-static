<?php
// Page configuration
$page_title = 'Kolena - AI-Powered Document Automation Platform';
$meta_description = 'Kolena - Automate document-heavy workflows with AI. Transform document processing with enterprise-grade accuracy and transparency.';
$additional_css = ['hero', 'logo-carousel', 'platform-overview', 'solutions-grid', 'social-proof', 'homepage-cta', 'footer'];
$additional_js = ['logo-carousel'];

// Include header
include './includes/header.php';
?>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero__background"></div>
        <div class="hero__container">
            <div class="hero__content">
                <div class="hero__text-wrapper">
                    <div class="hero__text-content">
                        <h1 class="hero__title">
                            Automate Document-Heavy Workflows
                            <span class="hero__title-gradient">with AI</span>
                        </h1>
                        <p class="hero__description">
                            Kolena turns document workflows into automated operations. Use AI to automatically review, validate, generate, and act on claims, leases, financial packages, and more.
                        </p>
                    </div>

                    <div class="hero__cta">
                        <a href="/request-a-demo/" class="hero__button">
                            Request a Demo
                            <svg class="hero__button-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>

                    <div class="hero__trust-indicators">
                        <div class="hero__badges">
                            <span class="hero__badge hero__badge--success">SOC 2 Compliant</span>
                            <span class="hero__badge hero__badge--primary">Enterprise Ready</span>
                        </div>
                    </div>
                </div>

                <div class="hero__animation">
                    <!-- Placeholder for Hero Animation -->
                    <div class="hero__animation-placeholder">
                        <div class="hero__animation-box"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Logo Carousel Section -->
    <section class="logo-carousel">
        <div class="logo-carousel__container">
            <div class="logo-carousel__header">
                <p class="logo-carousel__title">Trusted by Industry Leaders</p>
            </div>
            <div class="logo-carousel__wrapper">
                <div class="logo-carousel__track">
                    <!-- Logos will be dynamically inserted by JS -->
                </div>
            </div>
        </div>
    </section>

    <!-- Platform Overview Section -->
    <section class="platform-overview">
        <div class="platform-overview__container">
            <div class="platform-overview__header">
                <h2 class="platform-overview__title">
                    From Document Chaos to Clarity — with <span class="platform-overview__title-accent">AI</span>
                </h2>
                <p class="platform-overview__description">
                    Kolena's AI processes thousands of files in seconds with enterprise-grade accuracy, scale, and transparency. Transform your document-heavy workflows into streamlined, automated processes.
                </p>
            </div>

            <div class="platform-overview__steps">
                <!-- Step 1 -->
                <div class="platform-overview__step">
                    <div class="platform-overview__step-card">
                        <div class="platform-overview__step-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="17 8 12 3 7 8"></polyline>
                                <line x1="12" y1="3" x2="12" y2="15"></line>
                            </svg>
                        </div>
                        <div class="platform-overview__step-content">
                            <h3 class="platform-overview__step-title">Ingest & Route Documents</h3>
                            <p class="platform-overview__step-description">Ingest PDFs, scans, audio, emails, calls</p>
                            <p class="platform-overview__step-details">Upload any document type from any source. Our platform handles all formats automatically.</p>
                        </div>
                    </div>
                    <div class="platform-overview__arrow">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="platform-overview__step">
                    <div class="platform-overview__step-card">
                        <div class="platform-overview__step-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-5 4 4 0 0 1-5-5"></path>
                                <path d="M8.5 8.5v.01"></path>
                                <path d="M16 15.5v.01"></path>
                                <path d="M12 12v.01"></path>
                                <path d="M11 17v.01"></path>
                                <path d="M7 14v.01"></path>
                            </svg>
                        </div>
                        <div class="platform-overview__step-content">
                            <h3 class="platform-overview__step-title">Automate Analysis & Checks</h3>
                            <div class="platform-overview__step-chips">
                                <span class="platform-overview__chip platform-overview__chip--success">Citations ✓</span>
                                <span class="platform-overview__chip platform-overview__chip--primary">Confidence ✓</span>
                            </div>
                            <p class="platform-overview__step-description">AI parses and validates with citations and confidence scores</p>
                            <p class="platform-overview__step-details">Kolena validates every data point with full transparency and citations.</p>
                        </div>
                    </div>
                    <div class="platform-overview__arrow">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="platform-overview__step">
                    <div class="platform-overview__step-card">
                        <div class="platform-overview__step-icon">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                        </div>
                        <div class="platform-overview__step-content">
                            <h3 class="platform-overview__step-title">Generate Reports, Actions & Integrations</h3>
                            <p class="platform-overview__step-description">Push results to documents, spreadsheets, CRMs, dashboards</p>
                            <p class="platform-overview__step-details">Structure results and push them into reports, workflows, systems, dashboards, or trigger next steps</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="platform-overview__cta">
                <a href="/product" class="platform-overview__button">
                    Take the Product Tour
                    <svg class="platform-overview__button-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Solutions Grid Section -->
    <section class="solutions-grid">
        <div class="solutions-grid__container">
            <div class="solutions-grid__header">
                <h2 class="solutions-grid__title">
                    Tailored for <span class="solutions-grid__title-accent">Your</span> Workflows
                </h2>
                <p class="solutions-grid__description">
                    Kolena AI adapts to the document-heavy processes in your sector, delivering specialized solutions for maximum efficiency.
                </p>
            </div>

            <div class="solutions-grid__grid">
                <!-- Real Estate Card -->
                <div class="solutions-grid__card">
                    <div class="solutions-grid__card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building2">
                            <path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"></path>
                            <path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"></path>
                            <path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"></path>
                            <path d="M10 6h4"></path>
                            <path d="M10 10h4"></path>
                            <path d="M10 14h4"></path>
                            <path d="M10 18h4"></path>
                        </svg>
                    </div>
                    <div class="solutions-grid__card-content">
                        <h3 class="solutions-grid__card-title">Real Estate</h3>
                        <p class="solutions-grid__card-description">
                            Automate lease abstraction, due diligence, and affordable housing compliance.
                        </p>
                        <ul class="solutions-grid__benefits">
                            <li class="solutions-grid__benefit">
                                <span class="solutions-grid__benefit-dot"></span>
                                Lease processing
                            </li>
                            <li class="solutions-grid__benefit">
                                <span class="solutions-grid__benefit-dot"></span>
                                Due diligence automation
                            </li>
                            <li class="solutions-grid__benefit">
                                <span class="solutions-grid__benefit-dot"></span>
                                Compliance tracking
                            </li>
                        </ul>
                    </div>
                    <a href="/solutions/real-estate" class="solutions-grid__card-link">
                        Explore Real Estate
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                <!-- Financial Services Card -->
                <div class="solutions-grid__card">
                    <div class="solutions-grid__card-icon">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                    </div>
                    <div class="solutions-grid__card-content">
                        <h3 class="solutions-grid__card-title">Financial Services</h3>
                        <p class="solutions-grid__card-description">
                            Generate investment memos, automate compliance testing, and accelerate due diligence.
                        </p>
                        <ul class="solutions-grid__benefits">
                            <li class="solutions-grid__benefit">
                                <span class="solutions-grid__benefit-dot"></span>
                                Investment analysis
                            </li>
                            <li class="solutions-grid__benefit">
                                <span class="solutions-grid__benefit-dot"></span>
                                Compliance automation
                            </li>
                            <li class="solutions-grid__benefit">
                                <span class="solutions-grid__benefit-dot"></span>
                                Risk assessment
                            </li>
                        </ul>
                    </div>
                    <a href="/solutions/financial-services" class="solutions-grid__card-link">
                        Explore Financial Services
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                <!-- Insurance Card -->
                <div class="solutions-grid__card">
                    <div class="solutions-grid__card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield">
                            <path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path>
                        </svg>
                    </div>
                    <div class="solutions-grid__card-content">
                        <h3 class="solutions-grid__card-title">Insurance</h3>
                        <p class="solutions-grid__card-description">
                            Streamline loss run analysis and risk profiling for workers' comp underwriting.
                        </p>
                        <ul class="solutions-grid__benefits">
                            <li class="solutions-grid__benefit">
                                <span class="solutions-grid__benefit-dot"></span>
                                Claims processing
                            </li>
                            <li class="solutions-grid__benefit">
                                <span class="solutions-grid__benefit-dot"></span>
                                Risk analysis
                            </li>
                            <li class="solutions-grid__benefit">
                                <span class="solutions-grid__benefit-dot"></span>
                                Underwriting support
                            </li>
                        </ul>
                    </div>
                    <a href="/solutions/insurance" class="solutions-grid__card-link">
                        Explore Insurance
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                <!-- Banking Card -->
                <div class="solutions-grid__card">
                    <div class="solutions-grid__card-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" x2="21" y1="22" y2="22"></line>
                            <line x1="6" x2="6" y1="18" y2="11"></line>
                            <line x1="10" x2="10" y1="18" y2="11"></line>
                            <line x1="14" x2="14" y1="18" y2="11"></line>
                            <line x1="18" x2="18" y1="18" y2="11"></line>
                            <polygon points="12 2 20 7 4 7"></polygon>
                        </svg>
                    </div>
                    <div class="solutions-grid__card-content">
                        <h3 class="solutions-grid__card-title">Banking</h3>
                        <p class="solutions-grid__card-description">
                            Automate UCC filings, loan package review, and invoice validation.
                        </p>
                        <ul class="solutions-grid__benefits">
                            <li class="solutions-grid__benefit">
                                <span class="solutions-grid__benefit-dot"></span>
                                Loan processing
                            </li>
                            <li class="solutions-grid__benefit">
                                <span class="solutions-grid__benefit-dot"></span>
                                Document validation
                            </li>
                            <li class="solutions-grid__benefit">
                                <span class="solutions-grid__benefit-dot"></span>
                                Regulatory compliance
                            </li>
                        </ul>
                    </div>
                    <a href="/solutions/banking" class="solutions-grid__card-link">
                        Explore Banking
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Proof Section -->
    <section class="social-proof">
        <div class="social-proof__container">
            <div class="social-proof__header">
                <h2 class="social-proof__title">
                    Trusted by <span class="social-proof__title-accent">Leading Enterprises</span>
                </h2>
                <p class="social-proof__description">
                    Real estate firms, insurers, banks, and financial institutions cut turnaround times by 80%+ with Kolena's AI-powered document automation.
                </p>
            </div>

            <div class="social-proof__testimonial">
                <div class="social-proof__quote-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"></path>
                        <path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-4c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2h.75c0 2.25.25 4-2.75 4v3c0 1 0 1 1 1z"></path>
                    </svg>
                </div>
                <blockquote class="social-proof__quote">
                    "Kolena cut our document processing time by 85% while maintaining perfect accuracy. What used to take our team weeks now happens in hours."
                </blockquote>
                <div class="social-proof__author">
                    <div class="social-proof__author-name">Sarah Chen</div>
                    <div class="social-proof__author-title">VP of Operations, Gateway Management</div>
                </div>
            </div>

            <div class="social-proof__stats">
                <div class="social-proof__stat">
                    <div class="social-proof__stat-value social-proof__stat-value--success">80%+</div>
                    <div class="social-proof__stat-label">Faster Processing</div>
                </div>
                <div class="social-proof__stat">
                    <div class="social-proof__stat-value social-proof__stat-value--primary">99.9%</div>
                    <div class="social-proof__stat-label">Accuracy Rate</div>
                </div>
                <div class="social-proof__stat">
                    <div class="social-proof__stat-value">1M+</div>
                    <div class="social-proof__stat-label">Documents Processed</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Homepage CTA Section -->
    <section class="homepage-cta">
        <div class="homepage-cta__background"></div>
        <div class="homepage-cta__linework">
            <svg class="homepage-cta__svg" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="lineGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#2F66F5" stop-opacity="0.3" />
                        <stop offset="50%" stop-color="#46C09A" stop-opacity="0.3" />
                        <stop offset="100%" stop-color="#FFFFFF" stop-opacity="0.1" />
                    </linearGradient>
                </defs>
                <g class="homepage-cta__lines">
                    <path d="M 0 200 Q 200 100, 400 200 T 800 200 T 1200 200 T 1600 200" stroke="url(#lineGradient)" stroke-width="2" fill="none" opacity="0.4" />
                    <path d="M 0 400 Q 300 300, 600 400 T 1200 400 T 1800 400" stroke="url(#lineGradient)" stroke-width="2" fill="none" opacity="0.3" />
                    <circle cx="400" cy="200" r="4" fill="#2F66F5" opacity="0.5" />
                    <circle cx="800" cy="200" r="4" fill="#46C09A" opacity="0.5" />
                    <circle cx="600" cy="400" r="4" fill="#2F66F5" opacity="0.5" />
                </g>
            </svg>
        </div>
        <div class="homepage-cta__container">
            <div class="homepage-cta__content">
                <div class="homepage-cta__header">
                    <h2 class="homepage-cta__title">Ready to See Kolena in Action?</h2>
                    <p class="homepage-cta__description">
                        Try Kolena on your own documents — or let our team walk you through how it fits your workflows. Transform your document processing today.
                    </p>
                </div>
                <div class="homepage-cta__button-wrapper">
                    <a href="/request-a-demo/" class="homepage-cta__button">Request a Demo</a>
                </div>
                <p class="homepage-cta__tagline">Reasoning you can trust. Results you can explain.</p>
                <div class="homepage-cta__checklist">
                    <div class="homepage-cta__checklist-item">
                        <svg class="homepage-cta__check-icon homepage-cta__check-icon--success" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span>Free 2-week trial</span>
                    </div>
                    <div class="homepage-cta__checklist-item">
                        <svg class="homepage-cta__check-icon homepage-cta__check-icon--primary" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span>No setup fees</span>
                    </div>
                    <div class="homepage-cta__checklist-item">
                        <svg class="homepage-cta__check-icon homepage-cta__check-icon--success" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span>Enterprise support</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
// Include footer
include './includes/footer.php';
?>