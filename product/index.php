<?php
// Page configuration
$base_path = '../';
$page_title = 'Product - Kolena AI';
$meta_description = 'Kolena AI handles underwriting, lease abstraction, compliance audits, loan validation, and other document workflows with unmatched speed, accuracy, and transparency.';
$additional_css = ['logo-carousel', 'feature-section', 'product-hero', 'core-capabilities', 'why-teams-choose', 'integrations-grid', 'text-section', 'key-capabilities', 'workflows-section', 'trusted-outcomes', 'product-cta', 'footer'];
$additional_js = ['logo-carousel'];
$custom_css = ['../animations/reasoning/reasoning-animation.css', '../animations/pre-built-workflows/pre-built-workflows.css', '../animations/prompt-optimization/prompt-optimization.css'];
$custom_js = ['../animations/reasoning/reasoning-animation.js', '../animations/pre-built-workflows/pre-built-workflows.js', '../animations/prompt-optimization/prompt-optimization.js'];

// Include header
include '../includes/header.php';
?>

    <!-- Product Hero Section -->
    <section class="product-hero">
        <div class="product-hero__background"></div>
        <div class="product-hero__container">
            <div class="product-hero__content">
                <div class="product-hero__text-wrapper">
                    <h1 class="product-hero__title">
                        AI for Smarter, Faster <span class="product-hero__title-gradient">Business Workflows</span>
                    </h1>
                    <p class="product-hero__description">
                        Kolena AI handles underwriting, lease abstraction, compliance audits, loan validation, and other document workflows with unmatched speed, accuracy, and transparency.
                    </p>
                </div>

                <div class="product-hero__cta">
                    <a href="/request-a-demo/" class="product-hero__button">
                        Request a Demo
                        <svg class="product-hero__button-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                <div class="product-hero__trust-indicators">
                    <div class="product-hero__badges">
                        <span class="product-hero__badge product-hero__badge--success">SOC 2 Compliant</span>
                        <span class="product-hero__badge product-hero__badge--primary">Enterprise Ready</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Capabilities Section -->
    <section class="core-capabilities">
        <div class="core-capabilities__container">
            <div class="core-capabilities__header">
                <h2 class="core-capabilities__title">Core Capabilities</h2>
            </div>
            <div class="core-capabilities__grid">
                <!-- Document Understanding -->
                <div class="core-capabilities__card">
                    <div class="core-capabilities__icon-wrapper">
                        <svg class="core-capabilities__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                    <h3 class="core-capabilities__card-title">Document Understanding</h3>
                    <p class="core-capabilities__card-description">
                        Parse data from any file — PDFs, spreadsheets, emails, scans, or audio.
                    </p>
                    <p class="core-capabilities__card-details">
                        Kolena automatically detects document types and extracts the details you need.
                    </p>
                </div>

                <!-- AI-Powered Data Analysis -->
                <div class="core-capabilities__card">
                    <div class="core-capabilities__icon-wrapper">
                        <svg class="core-capabilities__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="8" height="4" x="8" y="2" rx="1" ry="1"></rect>
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                            <path d="m9 14 2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="core-capabilities__card-title">AI-Powered Data Analysis</h3>
                    <p class="core-capabilities__card-description">
                        Apply business rules and cross-checks to validate every field.
                    </p>
                    <p class="core-capabilities__card-details">
                        Every result includes confidence scores and citations for transparency.
                    </p>
                </div>

                <!-- Reporting & Integrations -->
                <div class="core-capabilities__card">
                    <div class="core-capabilities__icon-wrapper">
                        <svg class="core-capabilities__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="7" height="9" x="3" y="3" rx="1"></rect>
                            <rect width="7" height="5" x="14" y="3" rx="1"></rect>
                            <rect width="7" height="9" x="14" y="12" rx="1"></rect>
                            <rect width="7" height="5" x="3" y="16" rx="1"></rect>
                        </svg>
                    </div>
                    <h3 class="core-capabilities__card-title">Reporting & Integrations</h3>
                    <p class="core-capabilities__card-description">
                        Generate structured outputs and push results into your existing systems.
                    </p>
                    <p class="core-capabilities__card-details">
                        Export to Excel, CRMs, or data warehouses seamlessly.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Reasoning Section (Reusable) -->
    <section class="feature-section feature-section--muted feature-section--visual-left">
        <div class="feature-section__container">
            <div class="feature-section__grid">
                <!-- Left Visual - appears second on mobile, first on desktop -->
                <div class="feature-section__visual">
                    <div id="reasoningAnimation" class="feature-section__animation"></div>
                </div>

                <!-- Right Copy - appears first on mobile, second on desktop -->
                <div class="feature-section__content">
                    <p class="feature-section__label">
                        Reasoning Transparency
                    </p>
                    <h3 class="feature-section__title">
                        See the 'why' behind every answer
                    </h3>
                    <p class="feature-section__description">
                        Kolena doesn't just give results — it shows its reasoning. Every extraction and insight includes clear explanations and citations you can verify.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pre-Built Workflows Section (Reusable) -->
    <section class="feature-section feature-section--white feature-section--visual-right">
        <div class="feature-section__container">
            <div class="feature-section__grid">
                <!-- Visual - appears second on mobile and desktop -->
                <div class="feature-section__visual">
                    <div id="preBuiltWorkflowsAnimation" class="feature-section__animation"></div>
                </div>

                <!-- Copy - appears first on mobile and desktop -->
                <div class="feature-section__content">
                    <p class="feature-section__label">
                        INDUSTRY-READY AUTOMATION
                    </p>
                    <h3 class="feature-section__title">
                        Pre-built AI workflows
                    </h3>
                    <p class="feature-section__description">
                        Get started fast with pre-built automations for real estate, insurance, banking, and finance — easily tailored to your policy, compliance, data, and reporting requirements.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Prompt Optimization Section (Reusable) -->
    <section class="feature-section feature-section--muted feature-section--visual-left">
        <div class="feature-section__container">
            <div class="feature-section__grid">
                <!-- Visual - appears second on mobile, first on desktop -->
                <div class="feature-section__visual">
                    <div id="promptOptimizationAnimation" class="feature-section__animation"></div>
                </div>

                <!-- Copy - appears first on mobile, second on desktop -->
                <div class="feature-section__content">
                    <p class="feature-section__label">
                        Smart Prompt Optimization
                    </p>
                    <h3 class="feature-section__title">
                        No prompt engineering required
                    </h3>
                    <p class="feature-section__description">
                        Kolena automatically re-writes and optimizes your prompts for clarity and accuracy — so every user gets expert-level results without the learning curve.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Teams Choose Kolena Section -->
    <section class="why-teams-choose">
        <div class="why-teams-choose__container">
            <div class="why-teams-choose__header">
                <h2 class="why-teams-choose__title">Why Teams Choose Kolena</h2>
            </div>
            <div class="why-teams-choose__grid">
                <!-- Accuracy with Context -->
                <div class="why-teams-choose__item">
                    <div class="why-teams-choose__icon-wrapper">
                        <svg class="why-teams-choose__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="12" r="6"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                        </svg>
                    </div>
                    <h3 class="why-teams-choose__item-title">Accuracy with Context</h3>
                    <p class="why-teams-choose__item-description">
                        Validated results backed by citations and reasoning.
                    </p>
                </div>

                <!-- Speed at Scale -->
                <div class="why-teams-choose__item">
                    <div class="why-teams-choose__icon-wrapper">
                        <svg class="why-teams-choose__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path>
                            <path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"></path>
                            <path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"></path>
                            <path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"></path>
                        </svg>
                    </div>
                    <h3 class="why-teams-choose__item-title">Speed at Scale</h3>
                    <p class="why-teams-choose__item-description">
                        Process thousands of pages in hours, not weeks.
                    </p>
                </div>

                <!-- Effortless Setup -->
                <div class="why-teams-choose__item">
                    <div class="why-teams-choose__icon-wrapper">
                        <svg class="why-teams-choose__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22v-5"></path>
                            <path d="M9 8V2"></path>
                            <path d="M15 8V2"></path>
                            <path d="M18 8v5a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4V8Z"></path>
                        </svg>
                    </div>
                    <h3 class="why-teams-choose__item-title">Effortless Setup</h3>
                    <p class="why-teams-choose__item-description">
                        Prebuilt workflows go live in hours, no custom code required.
                    </p>
                </div>

                <!-- Trusted Transparency -->
                <div class="why-teams-choose__item">
                    <div class="why-teams-choose__icon-wrapper">
                        <svg class="why-teams-choose__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    <h3 class="why-teams-choose__item-title">Trusted Transparency</h3>
                    <p class="why-teams-choose__item-description">
                        Understand every AI decision — nothing hidden.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Works Seamlessly with Your Stack Section -->
    <section class="integrations-grid">
        <div class="integrations-grid__container">
            <div class="integrations-grid__header">
                <h2 class="integrations-grid__title">Works Seamlessly with Your Stack</h2>
                <p class="integrations-grid__subtitle">
                    Kolena integrates with the tools your teams already use.
                </p>
                <p class="integrations-grid__description">
                    Connect Kolena to your existing systems — from storage and CRMs to analytics platforms — without disrupting your workflows.
                </p>
            </div>

            <div class="integrations-grid__logos">
                <div class="integrations-grid__logo-item">
                    <img src="../assets/logos/excel-logo.png" alt="Microsoft Excel" class="integrations-grid__logo">
                </div>
                <div class="integrations-grid__logo-item">
                    <img src="../assets/logos/google-drive-logo.png" alt="Google Drive" class="integrations-grid__logo">
                </div>
                <div class="integrations-grid__logo-item">
                    <img src="../assets/logos/yardi-logo.png" alt="Yardi" class="integrations-grid__logo">
                </div>
                <div class="integrations-grid__logo-item">
                    <img src="../assets/logos/mri-logo.png" alt="MRI Software" class="integrations-grid__logo">
                </div>
                <div class="integrations-grid__logo-item">
                    <img src="../assets/logos/vts-logo.png" alt="VTS" class="integrations-grid__logo">
                </div>
                <div class="integrations-grid__logo-item">
                    <img src="../assets/logos/salesforce-logo.png" alt="Salesforce" class="integrations-grid__logo">
                </div>
                <div class="integrations-grid__logo-item">
                    <img src="../assets/logos/hubspot-logo.png" alt="HubSpot" class="integrations-grid__logo">
                </div>
                <div class="integrations-grid__logo-item">
                    <img src="../assets/logos/box-logo.png" alt="Box" class="integrations-grid__logo">
                </div>
                <div class="integrations-grid__logo-item">
                    <img src="../assets/logos/sharepoint-logo.png" alt="SharePoint" class="integrations-grid__logo">
                </div>
                <div class="integrations-grid__logo-item">
                    <img src="../assets/logos/snowflake-logo.png" alt="Snowflake" class="integrations-grid__logo">
                </div>
                <div class="integrations-grid__logo-item">
                    <img src="../assets/logos/slack-logo.png" alt="Slack" class="integrations-grid__logo">
                </div>
                <div class="integrations-grid__logo-item">
                    <img src="../assets/logos/servicenow-logo.png" alt="ServiceNow" class="integrations-grid__logo">
                </div>
            </div>

            <div class="integrations-grid__cta">
                <a href="/integrations" class="integrations-grid__link">
                    View All Integrations
                    <svg class="integrations-grid__link-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="7" y1="17" x2="17" y2="7"></line>
                        <polyline points="7 7 17 7 17 17"></polyline>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- The Kolena Advantage Section -->
    <section class="text-section text-section--centered">
        <div class="text-section__container">
            <div class="text-section__header">
                <h2 class="text-section__title">The Kolena Advantage</h2>
                <p class="text-section__description">
                    Kolena doesn't just pull data from documents — it automates the entire workflow. From ingestion to validation to approvals, our AI mirrors the way your teams already work, so you get faster results without changing your process.
                </p>
            </div>
        </div>
    </section>

    <!-- Key Capabilities Section -->
    <section class="key-capabilities">
        <div class="key-capabilities__container">
            <div class="key-capabilities__header">
                <h2 class="key-capabilities__title">Key Capabilities</h2>
            </div>
            <div class="key-capabilities__grid">
                <!-- AI for Every Workflow -->
                <div class="key-capabilities__card">
                    <div class="key-capabilities__icon-wrapper">
                        <svg class="key-capabilities__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                        </svg>
                    </div>
                    <h3 class="key-capabilities__card-title">AI for Every Workflow</h3>
                    <p class="key-capabilities__card-description">
                        Spin up underwriting, compliance, lease review, or claims processing in minutes.
                    </p>
                    <div class="key-capabilities__card-divider"></div>
                    <p class="key-capabilities__card-outcome">
                        Domain-specific automation that adapts instantly to your business.
                    </p>
                </div>

                <!-- Smarter Validation -->
                <div class="key-capabilities__card">
                    <div class="key-capabilities__icon-wrapper">
                        <svg class="key-capabilities__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="key-capabilities__card-title">Smarter Validation</h3>
                    <p class="key-capabilities__card-description">
                        Kolena checks values, cross-references data, and flags anomalies automatically.
                    </p>
                    <div class="key-capabilities__card-divider"></div>
                    <p class="key-capabilities__card-outcome">
                        Mistakes caught early, risks avoided, and reviews you can trust.
                    </p>
                </div>

                <!-- Fits Right Into Your Stack -->
                <div class="key-capabilities__card">
                    <div class="key-capabilities__icon-wrapper">
                        <svg class="key-capabilities__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22v-5"></path>
                            <path d="M9 8V2"></path>
                            <path d="M15 8V2"></path>
                            <path d="M18 8v5a4 4 0 0 1-4 4h-4a4 4 0 0 1-4-4V8Z"></path>
                        </svg>
                    </div>
                    <h3 class="key-capabilities__card-title">Fits Right Into Your Stack</h3>
                    <p class="key-capabilities__card-description">
                        Seamlessly connect with Excel, Yardi, MRI, VTS, Salesforce, Box, Drive, SharePoint, and more.
                    </p>
                    <div class="key-capabilities__card-divider"></div>
                    <p class="key-capabilities__card-outcome">
                        No rip-and-replace. Kolena works where you already work.
                    </p>
                </div>

                <!-- Transparency That Builds Confidence -->
                <div class="key-capabilities__card">
                    <div class="key-capabilities__icon-wrapper">
                        <svg class="key-capabilities__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <h3 class="key-capabilities__card-title">Transparency That Builds Confidence</h3>
                    <p class="key-capabilities__card-description">
                        Every result comes with citations, confidence scores, and reasoning.
                    </p>
                    <div class="key-capabilities__card-divider"></div>
                    <p class="key-capabilities__card-outcome">
                        Audit-ready outputs that everyone can trust.
                    </p>
                </div>

                <!-- Scale Without Limits -->
                <div class="key-capabilities__card">
                    <div class="key-capabilities__icon-wrapper">
                        <svg class="key-capabilities__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                    </div>
                    <h3 class="key-capabilities__card-title">Scale Without Limits</h3>
                    <p class="key-capabilities__card-description">
                        Process hundreds or thousands of documents in parallel.
                    </p>
                    <div class="key-capabilities__card-divider"></div>
                    <p class="key-capabilities__card-outcome">
                        Handle portfolio-level volume without hiring more staff.
                    </p>
                </div>

                <!-- Optimized Prompt Rewriting -->
                <div class="key-capabilities__card">
                    <div class="key-capabilities__icon-wrapper">
                        <svg class="key-capabilities__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9.937 15.5A2 2 0 0 0 8.5 14.063l-6.135-1.582a.5.5 0 0 1 0-.962L8.5 9.936A2 2 0 0 0 9.937 8.5l1.582-6.135a.5.5 0 0 1 .963 0L14.063 8.5A2 2 0 0 0 15.5 9.937l6.135 1.581a.5.5 0 0 1 0 .964L15.5 14.063a2 2 0 0 0-1.437 1.437l-1.582 6.135a.5.5 0 0 1-.963 0z"></path>
                            <path d="M20 3v4"></path>
                            <path d="M22 5h-4"></path>
                            <path d="M4 17v2"></path>
                            <path d="M5 18H3"></path>
                        </svg>
                    </div>
                    <h3 class="key-capabilities__card-title">Optimized Prompt Rewriting</h3>
                    <p class="key-capabilities__card-description">
                        Automatically refines your input into expert-level prompts — so tasks run cleanly and accurately, no prompt engineering needed.
                    </p>
                    <div class="key-capabilities__card-divider"></div>
                    <p class="key-capabilities__card-outcome">
                        Consistent accuracy with zero manual prompt tuning.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Get Up and Running Fast Section -->
    <section class="text-section text-section--centered">
        <div class="text-section__container">
            <div class="text-section__header">
                <h2 class="text-section__title">Get Up and Running Fast</h2>
                <h3 class="text-section__subtitle">Go Live in Hours, Not Weeks</h3>
                <p class="text-section__description">
                    Kolena is designed for instant value. Prebuilt workflow templates, guided setup, and simple configuration mean you can be processing your first leases, claims, or loan packages on day one.
                </p>
            </div>
        </div>
    </section>

    <!-- Real Workflows Section -->
    <section class="workflows-section">
        <div class="workflows-section__container">
            <div class="workflows-section__header">
                <h2 class="workflows-section__title">Real Workflows, Real Results</h2>
            </div>
            <div class="workflows-section__grid">
                <!-- Lease Abstraction -->
                <div class="workflows-section__card">
                    <div class="workflows-section__icon-wrapper">
                        <svg class="workflows-section__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                    <h3 class="workflows-section__card-title">Lease Abstraction & Due Diligence</h3>
                    <p class="workflows-section__card-description">
                        Extract rent schedules, clauses, and obligations with exceptions automatically flagged for review.
                    </p>
                </div>

                <!-- Claims & Loss Run Audits -->
                <div class="workflows-section__card">
                    <div class="workflows-section__icon-wrapper">
                        <svg class="workflows-section__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"></path>
                            <path d="M12 9v4"></path>
                            <path d="M12 17h.01"></path>
                        </svg>
                    </div>
                    <h3 class="workflows-section__card-title">Claims & Loss Run Audits</h3>
                    <p class="workflows-section__card-description">
                        Standardize loss runs across carriers, spot anomalies instantly, and export clean summaries.
                    </p>
                </div>

                <!-- Loan Package Validation -->
                <div class="workflows-section__card">
                    <div class="workflows-section__icon-wrapper">
                        <svg class="workflows-section__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                            <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                            <path d="m9 15 2 2 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="workflows-section__card-title">Loan Package Validation</h3>
                    <p class="workflows-section__card-description">
                        Cross-check borrower files, invoices, and contracts to deliver funding-ready packages in hours.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted Outcomes Section -->
    <section class="trusted-outcomes">
        <div class="trusted-outcomes__container">
            <div class="trusted-outcomes__header">
                <h2 class="trusted-outcomes__title">Trusted Outcomes, Proven Impact</h2>
            </div>

            <!-- Stats -->
            <div class="trusted-outcomes__stats">
                <div class="trusted-outcomes__stat">
                    <div class="trusted-outcomes__stat-value">80%</div>
                    <div class="trusted-outcomes__stat-label">faster review cycles</div>
                </div>
                <div class="trusted-outcomes__stat">
                    <div class="trusted-outcomes__stat-value">80%</div>
                    <div class="trusted-outcomes__stat-label">fewer errors</div>
                </div>
                <div class="trusted-outcomes__stat">
                    <div class="trusted-outcomes__stat-value">10×</div>
                    <div class="trusted-outcomes__stat-label">more volume handled</div>
                </div>
                <div class="trusted-outcomes__stat">
                    <div class="trusted-outcomes__stat-value">ROI</div>
                    <div class="trusted-outcomes__stat-label">in the first project</div>
                </div>
            </div>

            <!-- Testimonials -->
            <div class="trusted-outcomes__testimonials">
                <div class="trusted-outcomes__testimonial-card">
                    <div class="trusted-outcomes__stars">
                        <svg class="trusted-outcomes__star" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <svg class="trusted-outcomes__star" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <svg class="trusted-outcomes__star" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <svg class="trusted-outcomes__star" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <svg class="trusted-outcomes__star" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                    </div>
                    <p class="trusted-outcomes__testimonial-text">
                        "Kolena's reasoning view changed how our analysts work — we can finally understand why every decision was made."
                    </p>
                </div>
                <div class="trusted-outcomes__testimonial-card">
                    <div class="trusted-outcomes__stars">
                        <svg class="trusted-outcomes__star" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <svg class="trusted-outcomes__star" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <svg class="trusted-outcomes__star" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <svg class="trusted-outcomes__star" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                        <svg class="trusted-outcomes__star" width="20" height="20" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2">
                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                    </div>
                    <p class="trusted-outcomes__testimonial-text">
                        "The automatic prompt optimization has been a game-changer. We trust every result because it's consistently accurate."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Logo Carousel Section -->
    <section class="logo-carousel" data-base-path="../">
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

    <!-- Product CTA Section -->
    <section class="product-cta">
        <div class="product-cta__background"></div>
        <div class="product-cta__linework">
            <svg class="product-cta__svg" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="productLineGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#2F66F5" stop-opacity="0.3" />
                        <stop offset="50%" stop-color="#46C09A" stop-opacity="0.3" />
                        <stop offset="100%" stop-color="#FFFFFF" stop-opacity="0.1" />
                    </linearGradient>
                </defs>
                <g class="product-cta__lines">
                    <path d="M 0 200 Q 200 100, 400 200 T 800 200 T 1200 200 T 1600 200" stroke="url(#productLineGradient)" stroke-width="2" fill="none" opacity="0.4" />
                    <path d="M 0 400 Q 300 300, 600 400 T 1200 400 T 1800 400" stroke="url(#productLineGradient)" stroke-width="2" fill="none" opacity="0.3" />
                    <circle cx="400" cy="200" r="4" fill="#2F66F5" opacity="0.5" />
                    <circle cx="800" cy="200" r="4" fill="#46C09A" opacity="0.5" />
                    <circle cx="600" cy="400" r="4" fill="#2F66F5" opacity="0.5" />
                </g>
            </svg>
        </div>
        <div class="product-cta__container">
            <div class="product-cta__content">
                <div class="product-cta__header">
                    <h2 class="product-cta__title">Ready to Automate Your Workflows with AI?</h2>
                    <p class="product-cta__description">
                        Experience the AI that explains its reasoning and delivers consistent accuracy — without prompt engineering.
                    </p>
                </div>
                <div class="product-cta__button-wrapper">
                    <a href="/request-a-demo/" class="product-cta__button">Request a Demo</a>
                </div>
                <p class="product-cta__tagline">Reasoning you can trust. Results you can explain.</p>
                <div class="product-cta__checklist">
                    <div class="product-cta__checklist-item">
                        <svg class="product-cta__check-icon product-cta__check-icon--success" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span>Free 2-week trial</span>
                    </div>
                    <div class="product-cta__checklist-item">
                        <svg class="product-cta__check-icon product-cta__check-icon--primary" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                        <span>No setup fees</span>
                    </div>
                    <div class="product-cta__checklist-item">
                        <svg class="product-cta__check-icon product-cta__check-icon--success" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
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
include '../includes/footer.php';
?>
