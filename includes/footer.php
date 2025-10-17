    <!-- Footer -->
    <footer class="footer">
        <div class="footer__container">
            <div class="footer__main">
                <!-- Column 1: Logo and Social -->
                <div class="footer__column">
                    <a href="/" class="footer__logo-link">
                        <img src="./assets/kolena-logo.png" alt="Kolena" class="footer__logo">
                    </a>
                    <p class="footer__tagline">Automate document-heavy workflows with AI</p>
                    <div class="footer__social">
                        <a href="https://www.linkedin.com/company/kolena-ai/" target="_blank" rel="noopener noreferrer" class="footer__social-link" aria-label="LinkedIn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                <rect x="2" y="9" width="4" height="12"></rect>
                                <circle cx="4" cy="4" r="2"></circle>
                            </svg>
                        </a>
                        <a href="https://x.com/kolenaIO" target="_blank" rel="noopener noreferrer" class="footer__social-link" aria-label="X (Twitter)">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
                            </svg>
                        </a>
                        <a href="https://www.youtube.com/@KolenaAI" target="_blank" rel="noopener noreferrer" class="footer__social-link" aria-label="YouTube">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
                                <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Column 2: Solutions -->
                <div class="footer__column">
                    <h3 class="footer__heading">Solutions</h3>
                    <ul class="footer__links">
                        <li><a href="/solutions/real-estate" class="footer__link">Real Estate</a></li>
                        <li><a href="/solutions/financial-services" class="footer__link">Financial Services</a></li>
                        <li><a href="/solutions/insurance" class="footer__link">Insurance</a></li>
                        <li><a href="/solutions/banking" class="footer__link">Banking</a></li>
                    </ul>
                </div>

                <!-- Column 3: Resources -->
                <div class="footer__column">
                    <h3 class="footer__heading">Resources</h3>
                    <ul class="footer__links">
                        <li><a href="/blog" class="footer__link">Blog</a></li>
                        <li>
                            <a href="/white-papers" class="footer__link">
                                White Papers
                                <span class="footer__badge">Coming Soon</span>
                            </a>
                        </li>
                        <li><a href="/docs" class="footer__link">Documentation</a></li>
                    </ul>
                </div>

                <!-- Column 4: Company -->
                <div class="footer__column">
                    <h3 class="footer__heading">Company</h3>
                    <ul class="footer__links">
                        <li><a href="/about" class="footer__link">About</a></li>
                        <li>
                            <a href="/careers" class="footer__link">
                                Careers
                                <span class="footer__badge">Coming Soon</span>
                            </a>
                        </li>
                        <li><a href="/contact" class="footer__link">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer__bottom">
                <p class="footer__copyright">&copy; <?php echo date('Y'); ?> Kolena. All rights reserved.</p>
                <div class="footer__legal">
                    <a href="/terms" class="footer__legal-link">Terms & Conditions</a>
                    <a href="/privacy-policy" class="footer__legal-link">Privacy Policy</a>
                    <a href="/security" class="footer__legal-link">Security</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="./js/navigation.js"></script>
    <?php if (isset($additional_js) && is_array($additional_js)): ?>
        <?php foreach ($additional_js as $js): ?>
            <script src="./js/<?php echo $js; ?>.js"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($custom_js) && is_array($custom_js)): ?>
        <?php foreach ($custom_js as $js): ?>
            <script src="<?php echo $js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>