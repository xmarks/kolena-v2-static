<?php
// Page configuration
$base_path = '../../';
$page_title = 'Real Estate Solutions - Kolena AI';
$meta_description = 'Kolena automates lease abstraction, acquisition due diligence, compliance, and post-close management — so your team can scale faster, cut costs, and focus on deals.';
$additional_css = ['real-estate-hero', 'real-estate-scroll-story', 'logo-carousel', 'real-estate-pipeline', 'real-estate-advantage', 'real-estate-lifecycle', 'real-estate-advantages-grid', 'real-estate-integrations', 'real-estate-cta', 'footer'];
$additional_js = ['logo-carousel', 'real-estate-scroll'];
$custom_css = [];
$custom_js = [];

// Include header
include '../../includes/header.php';
?>

    <!-- Real Estate Hero Section -->
    <section class="real-estate-hero">
        <div class="real-estate-hero__background"></div>
        <div class="real-estate-hero__container">
            <div class="real-estate-hero__content">
                <div class="real-estate-hero__text-wrapper">
                    <div class="real-estate-hero__text-content">
                        <h1 class="real-estate-hero__title">
                            AI for Real Estate Workflows <span class="real-estate-hero__title-gradient">— Scale Faster, Close More Deals</span>
                        </h1>
                        <p class="real-estate-hero__description">
                            Kolena automates lease abstraction, acquisition due diligence, compliance, and post-close management — so your team can scale faster, cut costs, and focus on deals.
                        </p>
                    </div>

                    <div class="real-estate-hero__cta">
                        <a href="/request-a-demo/" class="real-estate-hero__button">
                            Request a Demo
                            <svg class="real-estate-hero__button-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>

                    <div class="real-estate-hero__trust-indicators">
                        <div class="real-estate-hero__badges">
                            <span class="real-estate-hero__badge real-estate-hero__badge--success">SOC 2 Compliant</span>
                            <span class="real-estate-hero__badge real-estate-hero__badge--primary">Enterprise Ready</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scroll Storytelling Section -->
    <section class="real-estate-scroll-story" id="re-scroll-story">
        <div class="real-estate-scroll-story__step scroll-step" id="re-step-1">
            <figure class="real-estate-scroll-story__figure">
                <div class="real-estate-scroll-story__image-wrapper">
                    <img src="../../assets/realestate_lease_abstract_final.jpg" alt="Lease documents becoming a lease abstract" class="real-estate-scroll-story__image">
                    <div class="real-estate-scroll-story__stamp">
                        <div class="real-estate-scroll-story__stamp-text">
                            PLACEHOLDER
                        </div>
                    </div>
                </div>
            </figure>
        </div>
    </section>

    <!-- Logo Carousel -->
    <section class="logo-carousel" data-base-path="../../">
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

    <!-- Visual Pipeline Illustration -->
    <section class="real-estate-pipeline">
        <div class="real-estate-pipeline__container">
            <div class="real-estate-pipeline__header">
                <h2 class="real-estate-pipeline__title">From Documents to Decisions</h2>
                <p class="real-estate-pipeline__description">
                    Kolena automates every step — from document intake to structured, validated outputs.
                </p>
            </div>

            <div class="real-estate-pipeline__grid">
                <div class="real-estate-pipeline__connector"></div>
                <div class="real-estate-pipeline__connector"></div>

                <!-- Card 1: Collect Documents -->
                <div class="real-estate-pipeline__card">
                    <div class="real-estate-pipeline__icon-wrapper">
                        <svg class="real-estate-pipeline__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"></path>
                        </svg>
                    </div>
                    <h3 class="real-estate-pipeline__card-title">Collect Documents</h3>
                    <p class="real-estate-pipeline__card-description">
                        Leases, rent rolls, due diligence files, and compliance packages.
                    </p>
                </div>

                <!-- Card 2: Process with AI -->
                <div class="real-estate-pipeline__card">
                    <div class="real-estate-pipeline__icon-wrapper">
                        <svg class="real-estate-pipeline__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="16" height="16" x="4" y="4" rx="2"></rect>
                            <rect width="6" height="6" x="9" y="9" rx="1"></rect>
                            <path d="M15 2v2"></path>
                            <path d="M15 20v2"></path>
                            <path d="M2 15h2"></path>
                            <path d="M2 9h2"></path>
                            <path d="M20 15h2"></path>
                            <path d="M20 9h2"></path>
                            <path d="M9 2v2"></path>
                            <path d="M9 20v2"></path>
                        </svg>
                    </div>
                    <h3 class="real-estate-pipeline__card-title">Process with AI</h3>
                    <p class="real-estate-pipeline__card-description">
                        Kolena extracts, validates, and cross-checks every clause, number, and date.
                    </p>
                </div>

                <!-- Card 3: Generate Results -->
                <div class="real-estate-pipeline__card">
                    <div class="real-estate-pipeline__icon-wrapper">
                        <svg class="real-estate-pipeline__icon" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="7" height="9" x="3" y="3" rx="1"></rect>
                            <rect width="7" height="5" x="14" y="3" rx="1"></rect>
                            <rect width="7" height="9" x="14" y="12" rx="1"></rect>
                            <rect width="7" height="5" x="3" y="16" rx="1"></rect>
                        </svg>
                    </div>
                    <h3 class="real-estate-pipeline__card-title">Generate Results</h3>
                    <p class="real-estate-pipeline__card-description">
                        Receive structured reports, financial models, and compliance-ready summaries.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- The Kolena Advantage -->
    <section class="real-estate-advantage">
        <div class="real-estate-advantage__container">
            <div class="real-estate-advantage__header">
                <h2 class="real-estate-advantage__title">The Kolena Advantage</h2>
                <p class="real-estate-advantage__description">
                    Real-estate teams manage thousands of leases, rent rolls, and compliance files. Kolena AI handles the repetitive work — extracting, validating, and cross-referencing data so nothing gets missed, speeding reviews and reducing errors.
                </p>
            </div>

            <div class="real-estate-advantage__grid">
                <!-- Without Kolena -->
                <div class="real-estate-advantage__card real-estate-advantage__card--without">
                    <div class="real-estate-advantage__badge real-estate-advantage__badge--manual">Manual Process</div>
                    <svg class="real-estate-advantage__status-icon real-estate-advantage__status-icon--error" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="m15 9-6 6"></path>
                        <path d="m9 9 6 6"></path>
                    </svg>
                    <div class="real-estate-advantage__card-header">
                        <h3 class="real-estate-advantage__card-title">Without Kolena</h3>
                    </div>
                    <div class="real-estate-advantage__card-content">
                        <div class="real-estate-advantage__feature">
                            <svg class="real-estate-advantage__feature-icon real-estate-advantage__feature-icon--error" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12"></polyline>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                            <span class="real-estate-advantage__feature-text real-estate-advantage__feature-text--muted">Multiple days to process each document</span>
                        </div>
                        <div class="real-estate-advantage__feature">
                            <svg class="real-estate-advantage__feature-icon real-estate-advantage__feature-icon--error" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="m15 9-6 6"></path>
                                <path d="m9 9 6 6"></path>
                            </svg>
                            <span class="real-estate-advantage__feature-text real-estate-advantage__feature-text--muted">Manual errors and missed clauses</span>
                        </div>
                        <div class="real-estate-advantage__feature">
                            <svg class="real-estate-advantage__feature-icon real-estate-advantage__feature-icon--error" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="real-estate-advantage__feature-text real-estate-advantage__feature-text--muted">Team bottlenecks slow every review cycle</span>
                        </div>
                        <div class="real-estate-advantage__feature">
                            <svg class="real-estate-advantage__feature-icon real-estate-advantage__feature-icon--error" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                            <span class="real-estate-advantage__feature-text real-estate-advantage__feature-text--muted">Limited scalability across portfolios</span>
                        </div>
                    </div>
                </div>

                <!-- With Kolena -->
                <div class="real-estate-advantage__card real-estate-advantage__card--with">
                    <div class="real-estate-advantage__badge real-estate-advantage__badge--ai">AI-Driven Workflow</div>
                    <svg class="real-estate-advantage__status-icon real-estate-advantage__status-icon--success" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="m9 12 2 2 4-4"></path>
                    </svg>
                    <div class="real-estate-advantage__card-header">
                        <h3 class="real-estate-advantage__card-title">With Kolena</h3>
                    </div>
                    <div class="real-estate-advantage__card-content">
                        <div class="real-estate-advantage__feature">
                            <svg class="real-estate-advantage__feature-icon real-estate-advantage__feature-icon--success" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                            </svg>
                            <span class="real-estate-advantage__feature-text real-estate-advantage__feature-text--bold">Process documents in hours, not days</span>
                        </div>
                        <div class="real-estate-advantage__feature">
                            <svg class="real-estate-advantage__feature-icon real-estate-advantage__feature-icon--success" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                            <span class="real-estate-advantage__feature-text real-estate-advantage__feature-text--bold">99%+ accuracy with citations and confidence scoring</span>
                        </div>
                        <div class="real-estate-advantage__feature">
                            <svg class="real-estate-advantage__feature-icon real-estate-advantage__feature-icon--success" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                            <span class="real-estate-advantage__feature-text real-estate-advantage__feature-text--bold">Same team, 10× throughput</span>
                        </div>
                        <div class="real-estate-advantage__feature">
                            <svg class="real-estate-advantage__feature-icon real-estate-advantage__feature-icon--success" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                            <span class="real-estate-advantage__feature-text real-estate-advantage__feature-text--bold">Easily scale analysis across 50+ assets</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Built for the Entire Property Lifecycle -->
    <section class="real-estate-lifecycle">
        <div class="real-estate-lifecycle__container">
            <div class="real-estate-lifecycle__header">
                <h2 class="real-estate-lifecycle__title">Built for the Entire Property Lifecycle</h2>
                <p class="real-estate-lifecycle__description">
                    From acquisition to ongoing management, Kolena supports every stage
                </p>
            </div>

            <div class="real-estate-lifecycle__timeline">
                <div class="real-estate-lifecycle__line"></div>
                <div class="real-estate-lifecycle__pulse"></div>

                <div class="real-estate-lifecycle__items">
                    <!-- Use Case 1 -->
                    <div class="real-estate-lifecycle__item">
                        <div class="real-estate-lifecycle__dot"></div>
                        <div class="real-estate-lifecycle__item-layout">
                            <div class="real-estate-lifecycle__item-content">
                                <div class="real-estate-lifecycle__card">
                                    <div class="real-estate-lifecycle__card-header">
                                        <div class="real-estate-lifecycle__icon-wrapper">
                                            <svg class="real-estate-lifecycle__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                                <polyline points="14 2 14 8 20 8"></polyline>
                                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                                <polyline points="10 9 9 9 8 9"></polyline>
                                            </svg>
                                        </div>
                                        <h3 class="real-estate-lifecycle__card-title">Acquisition Due Diligence</h3>
                                    </div>
                                    <p class="real-estate-lifecycle__card-description">
                                        Review leases, amendments, and rent rolls in hours, not weeks.
                                    </p>
                                </div>
                            </div>
                            <div class="real-estate-lifecycle__item-spacer"></div>
                        </div>
                    </div>

                    <!-- Use Case 2 -->
                    <div class="real-estate-lifecycle__item">
                        <div class="real-estate-lifecycle__dot"></div>
                        <div class="real-estate-lifecycle__item-layout">
                            <div class="real-estate-lifecycle__item-content">
                                <div class="real-estate-lifecycle__card">
                                    <div class="real-estate-lifecycle__card-header">
                                        <div class="real-estate-lifecycle__icon-wrapper">
                                            <svg class="real-estate-lifecycle__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect width="16" height="20" x="4" y="2" rx="2" ry="2"></rect>
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
                                        <h3 class="real-estate-lifecycle__card-title">Post-Acquisition Lease Management</h3>
                                    </div>
                                    <p class="real-estate-lifecycle__card-description">
                                        Automate abstractions to keep management data accurate.
                                    </p>
                                </div>
                            </div>
                            <div class="real-estate-lifecycle__item-spacer"></div>
                        </div>
                    </div>

                    <!-- Use Case 3 -->
                    <div class="real-estate-lifecycle__item">
                        <div class="real-estate-lifecycle__dot"></div>
                        <div class="real-estate-lifecycle__item-layout">
                            <div class="real-estate-lifecycle__item-content">
                                <div class="real-estate-lifecycle__card">
                                    <div class="real-estate-lifecycle__card-header">
                                        <div class="real-estate-lifecycle__icon-wrapper">
                                            <svg class="real-estate-lifecycle__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                            </svg>
                                        </div>
                                        <h3 class="real-estate-lifecycle__card-title">HUD / Affordable Housing Compliance</h3>
                                    </div>
                                    <p class="real-estate-lifecycle__card-description">
                                        Validate applicant qualifications and audit files automatically.
                                    </p>
                                </div>
                            </div>
                            <div class="real-estate-lifecycle__item-spacer"></div>
                        </div>
                    </div>

                    <!-- Use Case 4 -->
                    <div class="real-estate-lifecycle__item">
                        <div class="real-estate-lifecycle__dot"></div>
                        <div class="real-estate-lifecycle__item-layout">
                            <div class="real-estate-lifecycle__item-content">
                                <div class="real-estate-lifecycle__card">
                                    <div class="real-estate-lifecycle__card-header">
                                        <div class="real-estate-lifecycle__icon-wrapper">
                                            <svg class="real-estate-lifecycle__icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <circle cx="12" cy="12" r="6"></circle>
                                                <circle cx="12" cy="12" r="2"></circle>
                                            </svg>
                                        </div>
                                        <h3 class="real-estate-lifecycle__card-title">Single-Tenant Net Lease Investments</h3>
                                    </div>
                                    <p class="real-estate-lifecycle__card-description">
                                        Verify rent obligations and lease amendments at scale.
                                    </p>
                                </div>
                            </div>
                            <div class="real-estate-lifecycle__item-spacer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Real Estate Teams Choose Kolena -->
    <section class="real-estate-advantages-grid">
        <div class="real-estate-advantages-grid__container">
            <div class="real-estate-advantages-grid__header">
                <h2 class="real-estate-advantages-grid__title">Why Real Estate Teams Choose Kolena</h2>
            </div>
            <div class="real-estate-advantages-grid__grid">
                <!-- Speed -->
                <div class="real-estate-advantages-grid__card">
                    <div class="real-estate-advantages-grid__card-content">
                        <div class="real-estate-advantages-grid__icon-wrapper">
                            <svg class="real-estate-advantages-grid__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div class="real-estate-advantages-grid__text">
                            <h3 class="real-estate-advantages-grid__card-title">Speed</h3>
                            <p class="real-estate-advantages-grid__card-description">
                                Reduce manual reviews from days to hours.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Accuracy -->
                <div class="real-estate-advantages-grid__card">
                    <div class="real-estate-advantages-grid__card-content">
                        <div class="real-estate-advantages-grid__icon-wrapper">
                            <svg class="real-estate-advantages-grid__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <circle cx="12" cy="12" r="6"></circle>
                                <circle cx="12" cy="12" r="2"></circle>
                            </svg>
                        </div>
                        <div class="real-estate-advantages-grid__text">
                            <h3 class="real-estate-advantages-grid__card-title">Accuracy</h3>
                            <p class="real-estate-advantages-grid__card-description">
                                Every extraction includes source citations and confidence scores.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Scale -->
                <div class="real-estate-advantages-grid__card">
                    <div class="real-estate-advantages-grid__card-content">
                        <div class="real-estate-advantages-grid__icon-wrapper">
                            <svg class="real-estate-advantages-grid__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                        <div class="real-estate-advantages-grid__text">
                            <h3 class="real-estate-advantages-grid__card-title">Scale</h3>
                            <p class="real-estate-advantages-grid__card-description">
                                Expand portfolio capacity dramatically without growing your team.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Compliance Confidence -->
                <div class="real-estate-advantages-grid__card">
                    <div class="real-estate-advantages-grid__card-content">
                        <div class="real-estate-advantages-grid__icon-wrapper">
                            <svg class="real-estate-advantages-grid__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                        </div>
                        <div class="real-estate-advantages-grid__text">
                            <h3 class="real-estate-advantages-grid__card-title">Compliance Confidence</h3>
                            <p class="real-estate-advantages-grid__card-description">
                                Stay audit-ready with standardized lease data.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Ease of Setup -->
                <div class="real-estate-advantages-grid__card">
                    <div class="real-estate-advantages-grid__card-content">
                        <div class="real-estate-advantages-grid__icon-wrapper">
                            <svg class="real-estate-advantages-grid__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                            </svg>
                        </div>
                        <div class="real-estate-advantages-grid__text">
                            <h3 class="real-estate-advantages-grid__card-title">Ease of Setup</h3>
                            <p class="real-estate-advantages-grid__card-description">
                                Go live in hours with prebuilt real-estate workflows.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Collaboration -->
                <div class="real-estate-advantages-grid__card">
                    <div class="real-estate-advantages-grid__card-content">
                        <div class="real-estate-advantages-grid__icon-wrapper">
                            <svg class="real-estate-advantages-grid__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                        <div class="real-estate-advantages-grid__text">
                            <h3 class="real-estate-advantages-grid__card-title">Collaboration</h3>
                            <p class="real-estate-advantages-grid__card-description">
                                Share results across teams and partners.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Integration Band -->
    <section class="real-estate-integrations">
        <div class="real-estate-integrations__container">
            <h2 class="real-estate-integrations__title">Works with Your Existing Tools</h2>
            <p class="real-estate-integrations__description">
                Kolena connects directly with Yardi, MRI, VTS, Box, and Salesforce — no workflow disruption.
            </p>
            <div class="real-estate-integrations__logos">
                <img src="../../assets/logos/yardi-logo.png" alt="Yardi" class="real-estate-integrations__logo">
                <img src="../../assets/logos/mri-logo.png" alt="MRI Software" class="real-estate-integrations__logo">
                <img src="../../assets/logos/vts-logo.png" alt="VTS" class="real-estate-integrations__logo">
                <img src="../../assets/logos/box-logo.png" alt="Box" class="real-estate-integrations__logo">
                <img src="../../assets/logos/salesforce-logo.png" alt="Salesforce" class="real-estate-integrations__logo">
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="real-estate-cta">
        <div class="real-estate-cta__background"></div>
        <div class="real-estate-cta__linework">
            <svg class="real-estate-cta__svg" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="lineGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#2F66F5" stop-opacity="0.3"></stop>
                        <stop offset="50%" stop-color="#46C09A" stop-opacity="0.3"></stop>
                        <stop offset="100%" stop-color="#FFFFFF" stop-opacity="0.1"></stop>
                    </linearGradient>
                </defs>
                <g class="real-estate-cta__lines">
                    <path d="M 0 200 Q 200 100, 400 200 T 800 200 T 1200 200 T 1600 200" stroke="url(#lineGradient)" stroke-width="2" fill="none" opacity="0.4"></path>
                    <path d="M 0 400 Q 300 300, 600 400 T 1200 400 T 1800 400" stroke="url(#lineGradient)" stroke-width="2" fill="none" opacity="0.3"></path>
                    <circle cx="400" cy="200" r="4" fill="#2F66F5" opacity="0.5"></circle>
                    <circle cx="800" cy="200" r="4" fill="#46C09A" opacity="0.5"></circle>
                    <circle cx="600" cy="400" r="4" fill="#2F66F5" opacity="0.5"></circle>
                </g>
            </svg>
        </div>
        <div class="real-estate-cta__container">
            <div class="real-estate-cta__content">
                <div class="real-estate-cta__header">
                    <h2 class="real-estate-cta__title">Ready to See Kolena in Action?</h2>
                    <p class="real-estate-cta__description">
                        Experience faster diligence, cleaner data, and smarter workflows — purpose-built for real estate.
                    </p>
                </div>
                <div class="real-estate-cta__button-wrapper">
                    <a href="/request-a-demo/" class="real-estate-cta__button">Request a Demo</a>
                </div>
                <p class="real-estate-cta__tagline">Reasoning you can trust. Results you can explain.</p>
                <div class="real-estate-cta__checklist">
                    <div class="real-estate-cta__checklist-item">
                        <svg class="real-estate-cta__check-icon real-estate-cta__check-icon--success" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                        <span>Free 2-week trial</span>
                    </div>
                    <div class="real-estate-cta__checklist-item">
                        <svg class="real-estate-cta__check-icon real-estate-cta__check-icon--primary" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                        <span>No setup fees</span>
                    </div>
                    <div class="real-estate-cta__checklist-item">
                        <svg class="real-estate-cta__check-icon real-estate-cta__check-icon--success" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                        <span>Enterprise support</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
// Include footer
include '../../includes/footer.php';
?>
