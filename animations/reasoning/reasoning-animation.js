// Reasoning Animation - Vanilla JavaScript
// Shows typing animation of AI reasoning with auto-scrolling and source citation
(function() {
    'use strict';

    // Check for reduced motion preference
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (prefersReducedMotion) {
        console.log('Reasoning animation disabled due to reduced motion preference');
        return;
    }

    // State
    let isTyping = false;
    let typedText = '';
    let showSource = false;
    let animationCycle = 0;
    let typingInterval = null;
    let sourceTimer = null;
    let resetTimer = null;

    // Data
    const reasoningText = "From three loss-run PDFs (2025–2026, 2020–2022, 2019,2022–2025), I selected claims where Total Incurred > $30,000.\nWhen the policy period was missing, I inferred it from Pol. Eff Date (1-year).\nFor each claim I captured Status and summarized Cause of Loss.\n69 claims qualified (none in 2025–2026).\nSorted by Total Incurred; top 40 are returned, remaining 29 available.";

    const results = [
        { id: "CLM-21984", period: "2021–2022", incurred: "$143,200", status: "Open", citation: "[1]" },
        { id: "CLM-20457", period: "2020–2021", incurred: "$118,450", status: "Closed", citation: "[2]" },
        { id: "CLM-18830", period: "2022–2023", incurred: "$103,910", status: "Open", citation: "[3]" }
    ];

    // Get container
    const container = document.getElementById('reasoningAnimation');
    if (!container) {
        console.error('Reasoning animation container not found');
        return;
    }

    // Build initial HTML structure
    function buildHTML() {
        container.innerHTML = `
            <div class="reasoning-animation">
                <!-- Prompt Chip - Always visible -->
                <div class="reasoning-animation__prompt-container">
                    <div class="reasoning-animation__prompt-chip">
                        <span class="reasoning-animation__prompt-label">Prompt</span>
                        <span class="reasoning-animation__prompt-text">Extract Top Losses (Total Incurred &gt; $30,000)</span>
                    </div>
                </div>

                <!-- Results Table - Always visible -->
                <div class="reasoning-animation__table-container">
                    <div class="reasoning-animation__table-wrapper">
                        <table class="reasoning-animation__table">
                            <thead>
                                <tr class="reasoning-animation__table-header">
                                    <th class="reasoning-animation__table-th">Claim ID</th>
                                    <th class="reasoning-animation__table-th">Policy Period</th>
                                    <th class="reasoning-animation__table-th">Total Incurred</th>
                                    <th class="reasoning-animation__table-th">Status</th>
                                    <th class="reasoning-animation__table-th reasoning-animation__table-th--narrow"></th>
                                </tr>
                            </thead>
                            <tbody>
                                ${results.map(row => `
                                    <tr class="reasoning-animation__table-row">
                                        <td class="reasoning-animation__table-td reasoning-animation__table-td--medium">${row.id}</td>
                                        <td class="reasoning-animation__table-td">${row.period}</td>
                                        <td class="reasoning-animation__table-td reasoning-animation__table-td--semibold reasoning-animation__table-td--red">${row.incurred}</td>
                                        <td class="reasoning-animation__table-td">
                                            <span class="reasoning-animation__status-badge ${row.status === 'Open' ? 'reasoning-animation__status-badge--blue' : 'reasoning-animation__status-badge--gray'}">
                                                ${row.status}
                                            </span>
                                        </td>
                                        <td class="reasoning-animation__table-td reasoning-animation__table-td--citation">${row.citation}</td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Reasoning Panel - Always visible -->
                <div class="reasoning-animation__panel">
                    <div class="reasoning-animation__panel-header">
                        Reasoning
                    </div>
                    <div class="reasoning-animation__panel-content" id="reasoningContent">
                        <p class="reasoning-animation__panel-text" id="reasoningText"></p>
                        <div class="reasoning-animation__source-pill" id="sourcePill" style="display: none;">
                            📄 Source: LOSS RUNS 2020–2022 (p.12)
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    // Clear all timers
    function clearTimers() {
        if (typingInterval) {
            clearInterval(typingInterval);
            typingInterval = null;
        }
        if (sourceTimer) {
            clearTimeout(sourceTimer);
            sourceTimer = null;
        }
        if (resetTimer) {
            clearTimeout(resetTimer);
            resetTimer = null;
        }
    }

    // Start typing animation
    function startTyping() {
        // Clear any existing timers first (cleanup pattern from React useEffect)
        clearTimers();

        isTyping = true;
        typedText = '';
        showSource = false;

        const reasoningTextElement = document.getElementById('reasoningText');
        const sourcePill = document.getElementById('sourcePill');
        const reasoningContent = document.getElementById('reasoningContent');

        if (!reasoningTextElement) return;

        // Hide source pill
        sourcePill.style.display = 'none';
        sourcePill.style.opacity = '0';

        let index = 0;
        const typingSpeed = 20; // 20ms per character

        typingInterval = setInterval(() => {
            if (index < reasoningText.length) {
                typedText = reasoningText.slice(0, index + 1);

                // Update text with cursor
                reasoningTextElement.innerHTML = typedText.replace(/\n/g, '<br>') +
                    '<span class="reasoning-animation__cursor"></span>';

                index++;

                // Auto-scroll to bottom as we type
                reasoningContent.scrollTop = reasoningContent.scrollHeight;
            } else {
                clearInterval(typingInterval);
                typingInterval = null;
                isTyping = false;

                // Remove cursor
                reasoningTextElement.innerHTML = typedText.replace(/\n/g, '<br>');
            }
        }, typingSpeed);

        // Show source pill after typing completes (~7.5s) and scroll to reveal it
        const typingDuration = reasoningText.length * typingSpeed + 200;
        sourceTimer = setTimeout(() => {
            showSource = true;
            sourcePill.style.display = 'inline-block';

            // Trigger animation by setting opacity after display
            setTimeout(() => {
                sourcePill.style.opacity = '1';

                // Scroll to bottom to reveal the source pill
                setTimeout(() => {
                    reasoningContent.scrollTop = reasoningContent.scrollHeight;
                }, 100);
            }, 10);
        }, typingDuration);

        // Reset animation after 10s total and restart
        resetTimer = setTimeout(() => {
            typedText = '';
            showSource = false;
            isTyping = false;
            reasoningTextElement.innerHTML = '';
            sourcePill.style.display = 'none';
            sourcePill.style.opacity = '0';
            animationCycle++;

            // Restart animation
            startTyping();
        }, 10000);
    }

    // Initialize
    buildHTML();
    startTyping();

    // Cleanup on page unload
    window.addEventListener('beforeunload', () => {
        clearTimers();
    });

})();
