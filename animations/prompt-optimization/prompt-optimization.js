// Prompt Optimization Animation - Vanilla JavaScript
// 4 phases: typing → optimizing → output → reset
(function() {
    'use strict';

    // Check for reduced motion preference
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (prefersReducedMotion) {
        console.log('Prompt optimization animation disabled due to reduced motion preference');
        return;
    }

    // State
    let phase = 'typing';
    let typedText = '';
    let animationCycle = 0;
    let timers = [];
    let typingInterval = null;
    let mainInterval = null;

    // Content
    const initialPrompt = "What are the key facts for this property investment opportunity?";
    const optimizedPrompt = "Extract a table with key investment facts about the property, including location type, property type, building features, tenant mix, and any notable financial metrics or characteristics. Look for details about the building's class, size, occupancy, lease terms, and key amenities.";

    const tableData = [
        { category: "Location Type", details: "Central Business District, Atlanta GA" },
        { category: "Property Type", details: "Class A Office Tower (24 Floors)" },
        { category: "Building Features", details: "LEED Gold Certified, On-site Fitness Center, Parking Garage" }
    ];

    // Get container
    const container = document.getElementById('promptOptimizationAnimation');
    if (!container) {
        console.error('Prompt optimization animation container not found');
        return;
    }

    // Sparkles SVG icon (from lucide-react)
    const sparklesIcon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"></path><path d="M5 3v4"></path><path d="M19 17v4"></path><path d="M3 5h4"></path><path d="M17 19h4"></path></svg>';

    // Build HTML structure
    function buildHTML() {
        container.innerHTML = `
            <div class="prompt-optimization">
                <!-- Initial Prompt Section -->
                <div class="prompt-optimization__initial-section">
                    <p class="prompt-optimization__label">Your prompt</p>
                    <div class="prompt-optimization__input-box">
                        <p class="prompt-optimization__input-text">
                            <span id="typedText"></span><span id="cursor" class="prompt-optimization__cursor prompt-optimization__hidden"></span>
                        </p>
                    </div>
                </div>

                <!-- Optimization Transition -->
                <div id="optimizingSection" class="prompt-optimization__optimizing prompt-optimization__hidden">
                    <div class="prompt-optimization__optimizing-content">
                        <div class="prompt-optimization__sparkles">${sparklesIcon}</div>
                        <span class="prompt-optimization__optimizing-text">Optimizing...</span>
                    </div>
                </div>

                <!-- Optimized Prompt Section -->
                <div id="optimizedSection" class="prompt-optimization__optimized-section prompt-optimization__hidden">
                    <p class="prompt-optimization__optimized-label">Optimized by Kolena</p>
                    <div class="prompt-optimization__optimized-box">
                        <p class="prompt-optimization__optimized-text">${optimizedPrompt}</p>
                    </div>
                </div>

                <!-- Output Section -->
                <div id="outputSection" class="prompt-optimization__output-section prompt-optimization__hidden">
                    <div class="prompt-optimization__output-chip">Output: Table</div>
                    <div class="prompt-optimization__table-container">
                        <table class="prompt-optimization__table">
                            <thead>
                                <tr class="prompt-optimization__table-header">
                                    <th class="prompt-optimization__table-th">Category</th>
                                    <th class="prompt-optimization__table-th">Details</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                ${tableData.map(row => `
                                    <tr class="prompt-optimization__table-row">
                                        <td class="prompt-optimization__table-td--category">${row.category}</td>
                                        <td class="prompt-optimization__table-td--details">${row.details}</td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        `;
    }

    // Clear all timers (NOT mainInterval)
    function clearTimers() {
        if (typingInterval) {
            clearInterval(typingInterval);
            typingInterval = null;
        }
        timers.forEach(timer => clearTimeout(timer));
        timers = [];
    }

    // Show/hide sections
    function showSection(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            section.classList.remove('prompt-optimization__hidden');
        }
    }

    function hideSection(sectionId) {
        const section = document.getElementById(sectionId);
        if (section) {
            section.classList.add('prompt-optimization__hidden');
        }
    }

    // Reset table row animations by cloning
    function resetTableAnimations() {
        const tableBody = document.getElementById('tableBody');
        if (!tableBody) return;

        const rows = tableBody.querySelectorAll('.prompt-optimization__table-row');
        rows.forEach(row => {
            const parent = row.parentNode;
            const clone = row.cloneNode(true);
            parent.replaceChild(clone, row);
        });
    }

    // Run animation timeline
    function runAnimation() {
        // Clear previous timers
        clearTimers();

        // Get DOM elements
        const typedTextEl = document.getElementById('typedText');
        const cursorEl = document.getElementById('cursor');

        if (!typedTextEl || !cursorEl) return;

        // Reset state
        phase = 'typing';
        typedText = '';
        typedTextEl.textContent = '';

        // Hide all sections
        hideSection('optimizingSection');
        hideSection('optimizedSection');
        hideSection('outputSection');

        // Reset cursor
        cursorEl.classList.remove('prompt-optimization__hidden');
        cursorEl.classList.remove('prompt-optimization__cursor--complete');

        // Phase 1: Type initial prompt (0-2s)
        phase = 'typing';
        let index = 0;
        const typingSpeed = 30; // 30ms per character

        typingInterval = setInterval(() => {
            if (index < initialPrompt.length) {
                typedText = initialPrompt.slice(0, index + 1);
                typedTextEl.textContent = typedText;
                index++;
            } else {
                // Typing complete - change cursor to pulse 2 times
                clearInterval(typingInterval);
                typingInterval = null;
                cursorEl.classList.add('prompt-optimization__cursor--complete');
            }
        }, typingSpeed);

        // Phase 2: Show optimization (2s)
        const optimizeTimer = setTimeout(() => {
            phase = 'optimizing';
            showSection('optimizingSection');

            // After 300ms, show optimized prompt
            const optimizedTimer = setTimeout(() => {
                showSection('optimizedSection');
            }, 300);
            timers.push(optimizedTimer);
        }, 2000);
        timers.push(optimizeTimer);

        // Phase 3: Show output format (4s)
        const outputTimer = setTimeout(() => {
            phase = 'output';
            // Hide cursor when output shows
            cursorEl.classList.add('prompt-optimization__hidden');

            // Hide only the "Optimizing..." text, keep optimized prompt visible
            hideSection('optimizingSection');

            showSection('outputSection');
            // Reset table animations to retrigger staggered fade-in
            resetTableAnimations();
        }, 4000);
        timers.push(outputTimer);

        // Phase 4: Reset and loop (6.5s)
        const resetTimer = setTimeout(() => {
            phase = 'reset';
            animationCycle++;
            // runAnimation will be called by mainInterval
        }, 6500);
        timers.push(resetTimer);
    }

    // Initialize
    buildHTML();
    runAnimation();

    // Loop animation every 6.5 seconds
    mainInterval = setInterval(runAnimation, 6500);

    // Cleanup on page unload
    window.addEventListener('beforeunload', () => {
        clearTimers();
        if (mainInterval) {
            clearInterval(mainInterval);
        }
    });

})();
