/**
 * Navigation Component - Vanilla JavaScript
 * Handles desktop dropdown menus and mobile menu interactions
 */

(function() {
    'use strict';

    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', initNavigation);

    function initNavigation() {
        const navigation = document.querySelector('.navigation');
        if (!navigation) return;

        // Initialize desktop dropdown functionality
        initDesktopDropdowns();

        // Initialize mobile menu functionality
        initMobileMenu();

        // Initialize mobile collapsible sections
        initMobileCollapsibles();
    }

    /**
     * Desktop Dropdown Menus
     */
    function initDesktopDropdowns() {
        const dropdownTriggers = document.querySelectorAll('.navigation__link--dropdown');

        dropdownTriggers.forEach(function(trigger) {
            const dropdownId = trigger.getAttribute('data-dropdown');
            const dropdownMenu = document.getElementById(dropdownId + '-dropdown');
            const parentItem = trigger.closest('.navigation__item--has-dropdown');

            if (!dropdownMenu || !parentItem) return;

            // Toggle dropdown on click
            trigger.addEventListener('click', function(event) {
                event.preventDefault();
                event.stopPropagation();

                // Close other open dropdowns
                const openDropdowns = document.querySelectorAll('.navigation__item--has-dropdown.is-open');
                openDropdowns.forEach(function(item) {
                    if (item !== parentItem) {
                        item.classList.remove('is-open');
                    }
                });

                // Toggle current dropdown
                parentItem.classList.toggle('is-open');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!parentItem.contains(event.target)) {
                    parentItem.classList.remove('is-open');
                }
            });

            // Close dropdown on Escape key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    parentItem.classList.remove('is-open');
                }
            });
        });
    }

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const navigation = document.querySelector('.navigation');
        const mobileToggle = document.querySelector('.navigation__mobile-toggle');
        const mobileMenu = document.querySelector('.navigation__mobile-menu');

        if (!mobileToggle || !mobileMenu) return;

        mobileToggle.addEventListener('click', function() {
            const isOpen = navigation.classList.contains('is-mobile-open');

            if (isOpen) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });

        // Close mobile menu when clicking on a link
        const mobileLinks = document.querySelectorAll('.navigation__mobile-sublink');
        mobileLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                closeMobileMenu();
            });
        });

        function openMobileMenu() {
            navigation.classList.add('is-mobile-open');
            mobileToggle.setAttribute('aria-expanded', 'true');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            navigation.classList.remove('is-mobile-open');
            mobileToggle.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        }

        // Close mobile menu on window resize to desktop size
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                closeMobileMenu();
            }
        });
    }

    /**
     * Mobile Collapsible Sections
     */
    function initMobileCollapsibles() {
        const collapsibleTriggers = document.querySelectorAll('.navigation__mobile-link--collapsible');

        collapsibleTriggers.forEach(function(trigger) {
            const collapseId = trigger.getAttribute('data-mobile-collapse');
            const collapseContent = document.getElementById('mobile-' + collapseId);

            if (!collapseContent) return;

            trigger.addEventListener('click', function(event) {
                event.preventDefault();

                const isOpen = trigger.classList.contains('is-open');

                // Close other open collapsibles
                const openCollapsibles = document.querySelectorAll('.navigation__mobile-link--collapsible.is-open');
                openCollapsibles.forEach(function(item) {
                    if (item !== trigger) {
                        item.classList.remove('is-open');
                        const itemId = item.getAttribute('data-mobile-collapse');
                        const itemContent = document.getElementById('mobile-' + itemId);
                        if (itemContent) {
                            itemContent.classList.remove('is-open');
                        }
                    }
                });

                // Toggle current collapsible
                if (isOpen) {
                    trigger.classList.remove('is-open');
                    collapseContent.classList.remove('is-open');
                } else {
                    trigger.classList.add('is-open');
                    collapseContent.classList.add('is-open');
                }
            });
        });
    }
})();