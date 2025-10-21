/**
 * Real Estate Scroll Story Animation
 * Handles scroll-based animations for the real estate page scroll storytelling section
 */

(function() {
    'use strict';

    /**
     * Initialize scroll story animations using IntersectionObserver
     */
    function initScrollStory() {
        const steps = document.querySelectorAll('.scroll-step');

        if (steps.length === 0) {
            return; // No scroll steps found
        }

        // Configure IntersectionObserver
        const observerOptions = {
            threshold: 0.35, // Trigger when 35% of the element is visible
            rootMargin: '0px'
        };

        // Create observer
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Add 'in-view' class when element comes into view
                    entry.target.classList.add('in-view');
                }
            });
        }, observerOptions);

        // Observe all scroll steps
        steps.forEach(step => {
            observer.observe(step);
        });
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initScrollStory);
    } else {
        initScrollStory();
    }
})();