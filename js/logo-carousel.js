/**
 * Logo Carousel Component - Vanilla JavaScript
 * Creates an infinite scrolling carousel of client logos
 */

(function() {
    'use strict';

    // Client logos data
    const clients = [
        { name: 'The Gateway Companies', industry: 'Real Estate', logo: './assets/gateway-logo.png', isDark: false },
        { name: 'Milestone Bank', industry: 'Banking', logo: './assets/milestone-bank-logo.png', isDark: false },
        { name: 'Kairoi Residential', industry: 'Real Estate', logo: './assets/kairoi-logo.webp', isDark: false },
        { name: 'Paragon Loan Advisors', industry: 'Financial Services', logo: './assets/paragon-logo.png', isDark: false },
        { name: 'Zeller', industry: 'Financial Services', logo: './assets/zeller-logo.png', isDark: false },
        { name: 'SFA Partners', industry: 'Financial Services', logo: './assets/sfa-partners-logo.png', isDark: false },
        { name: 'EAH Housing', industry: 'Real Estate', logo: './assets/eah-housing-logo.png', isDark: false },
        { name: 'Highview', industry: 'Insurance', logo: './assets/highview-logo.png', isDark: false },
        { name: 'Goffa Interactive Group', industry: 'Real Estate', logo: './assets/goffa-logo.png', isDark: false },
        { name: 'Avenue Living', industry: 'Real Estate', logo: './assets/avenue-living-logo.png', isDark: false },
        { name: 'Montclair', industry: 'Real Estate', logo: './assets/montclair-logo.png', isDark: true },
        { name: 'ProStar', industry: 'Technology', logo: './assets/prostar-logo.svg', isDark: false },
        { name: 'Levin Management', industry: 'Real Estate', logo: './assets/levin-management-logo.png', isDark: true },
        { name: 'Block & Company', industry: 'Real Estate', logo: './assets/block-logo.png', isDark: false },
        { name: 'Union Pacific', industry: 'Transportation', logo: './assets/union-pacific-logo.svg', isDark: false },
        { name: 'Prenetics', industry: 'Healthcare', logo: './assets/prenetics-logo.png', isDark: true },
        { name: 'Alora', industry: 'Real Estate', logo: './assets/alora-logo.png', isDark: true }
    ];

    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', initLogoCarousel);

    function initLogoCarousel() {
        const track = document.querySelector('.logo-carousel__track');
        if (!track) return;

        // Duplicate clients array for infinite scroll effect
        const allClients = [...clients, ...clients];

        // Calculate track width
        const itemWidth = 156; // Width of each logo item
        const itemMargin = 16; // Margin on each side (4 * 4px)
        const totalWidth = allClients.length * (itemWidth + itemMargin * 2);

        // Set track width
        track.style.width = totalWidth + 'px';

        // Create logo items
        allClients.forEach(function(client, index) {
            const item = createLogoItem(client, index);
            track.appendChild(item);
        });
    }

    /**
     * Create a single logo carousel item
     */
    function createLogoItem(client, index) {
        const item = document.createElement('div');
        item.className = 'logo-carousel__item';

        const card = document.createElement('div');
        card.className = 'logo-carousel__card';

        const img = document.createElement('img');
        img.src = client.logo;
        img.alt = client.name + ' logo';
        img.className = 'logo-carousel__logo';

        // Add dark logo class for specific logos
        if (client.isDark) {
            img.classList.add('logo-carousel__logo--dark');
        }

        card.appendChild(img);
        item.appendChild(card);

        return item;
    }
})();
