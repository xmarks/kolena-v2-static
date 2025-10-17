// Pre-Built Workflows Animation - Vanilla JavaScript
// 4 stages: Select → Upload → Process → Output
(function() {
    'use strict';

    // Check for reduced motion preference
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (prefersReducedMotion) {
        console.log('Pre-built workflows animation disabled due to reduced motion preference');
        return;
    }

    // State
    let stage = 'select';
    let uploadedDocs = [];
    let processFields = [];
    let timers = [];
    let mainInterval = null;

    // Data
    const workflows = [
        { name: "Loan Underwriting", selected: true },
        { name: "Compliance Validation", selected: false },
        { name: "Lease Abstraction", selected: false },
        { name: "Risk Assessment", selected: false },
    ];

    const documents = [
        { name: "Credit Report.pdf", icon: "file-text" },
        { name: "PayStub.pdf", icon: "file-text" },
        { name: "ID.pdf", icon: "credit-card" },
        { name: "Appraisal.pdf", icon: "home" },
    ];

    const fields = [
        { label: "Credit Score", value: "795" },
        { label: "Debt-to-Income", value: "13%" },
        { label: "Employment", value: "Engineer" },
    ];

    // Get container
    const container = document.getElementById('preBuiltWorkflowsAnimation');
    if (!container) {
        console.error('Pre-built workflows animation container not found');
        return;
    }

    // SVG Icons - exact sizes from lucide-react
    const icons = {
        'file-text': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>',
        'credit-card': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>',
        'home': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>',
        'check-circle': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
        'badge-check': '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path><polyline points="9 12 12 15 16 10"></polyline></svg>',
    };

    // Build HTML structure
    function buildHTML() {
        container.innerHTML = `
            <div class="pre-built-workflows">
                <!-- Select Stage -->
                <div class="pre-built-workflows__stage pre-built-workflows__stage--select" data-stage="select">
                    <div style="width: 100%;">
                        <div class="pre-built-workflows__select-header">
                            <p class="pre-built-workflows__select-label">PRE-BUILT AI AGENTS</p>
                            <h3 class="pre-built-workflows__select-title">Choose Workflow</h3>
                        </div>
                        <div class="pre-built-workflows__workflow-grid">
                            ${workflows.map((workflow, i) => `
                                <div class="pre-built-workflows__workflow-card ${workflow.selected ? 'pre-built-workflows__workflow-card--selected' : ''}" data-card-index="${i}">
                                    <div class="pre-built-workflows__workflow-name">${workflow.name}</div>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                </div>

                <!-- Upload Stage -->
                <div class="pre-built-workflows__stage pre-built-workflows__stage--upload" data-stage="upload">
                    <div style="width: 100%;">
                        <div class="pre-built-workflows__upload-header">
                            <p class="pre-built-workflows__upload-text">Uploading documents...</p>
                        </div>
                        <div class="pre-built-workflows__documents">
                            ${documents.map((doc, i) => `
                                <div class="pre-built-workflows__document" data-doc-index="${i}">
                                    <div class="pre-built-workflows__document-icon">${icons[doc.icon]}</div>
                                    <span class="pre-built-workflows__document-name">${doc.name}</span>
                                    <div class="pre-built-workflows__document-check">${icons['check-circle']}</div>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                </div>

                <!-- Process Stage -->
                <div class="pre-built-workflows__stage pre-built-workflows__stage--process" data-stage="process">
                    <div style="width: 100%; position: relative;">
                        <div class="pre-built-workflows__process-grid">
                            <!-- Animated SVG Line -->
                            <svg class="pre-built-workflows__process-svg">
                                <!-- Desktop: horizontal line -->
                                <path class="pre-built-workflows__process-line pre-built-workflows__process-line--desktop" d="M 10% 50% L 90% 50%"></path>
                                <circle class="pre-built-workflows__process-circle pre-built-workflows__process-circle--desktop" cy="50%" r="4" cx="10%"></circle>
                                <!-- Mobile: vertical line -->
                                <path class="pre-built-workflows__process-line pre-built-workflows__process-line--mobile" d="M 50% 10% L 50% 90%"></path>
                                <circle class="pre-built-workflows__process-circle pre-built-workflows__process-circle--mobile" cx="50%" r="4" cy="10%"></circle>
                            </svg>

                            <!-- Input Panel -->
                            <div class="pre-built-workflows__process-panel">
                                <div class="pre-built-workflows__process-panel-title">Input</div>
                                <div class="pre-built-workflows__process-items">
                                    ${documents.map((doc, i) => `
                                        <div class="pre-built-workflows__process-item">
                                            <div class="pre-built-workflows__process-item-icon">${icons[doc.icon]}</div>
                                            <span class="pre-built-workflows__process-item-name">${doc.name}</span>
                                            <div class="pre-built-workflows__process-item-check">${icons['check-circle']}</div>
                                        </div>
                                    `).join('')}
                                </div>
                            </div>

                            <!-- Process Panel -->
                            <div class="pre-built-workflows__process-panel">
                                <div class="pre-built-workflows__process-panel-title">Process</div>
                                <div class="pre-built-workflows__process-items">
                                    ${fields.map((field, i) => `
                                        <div class="pre-built-workflows__process-field" data-field-index="${i}">
                                            <span class="pre-built-workflows__process-field-label">${field.label}</span>
                                            <span class="pre-built-workflows__process-field-value">${field.value}</span>
                                        </div>
                                    `).join('')}
                                </div>
                            </div>

                            <!-- Output Panel -->
                            <div class="pre-built-workflows__process-panel">
                                <div class="pre-built-workflows__process-panel-title">Output</div>
                                <div class="pre-built-workflows__process-items">
                                    <div class="pre-built-workflows__output-placeholder"></div>
                                    <div class="pre-built-workflows__output-placeholder pre-built-workflows__output-placeholder--75"></div>
                                    <div class="pre-built-workflows__output-placeholder pre-built-workflows__output-placeholder--50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Output Stage - Will be rebuilt each cycle -->
                <div class="pre-built-workflows__stage pre-built-workflows__stage--output" data-stage="output">
                    <div class="pre-built-workflows__output-container" id="outputContainer">
                        <!-- Content will be dynamically inserted -->
                    </div>
                </div>
            </div>
        `;
    }

    // Build output stage HTML - must be rebuilt each time to retrigger animations
    function buildOutputStage() {
        const outputContainer = document.getElementById('outputContainer');
        if (!outputContainer) return;

        outputContainer.innerHTML = `
            <div class="pre-built-workflows__output-card">
                <div class="pre-built-workflows__output-badge">Report Ready</div>

                <div class="pre-built-workflows__output-header">
                    <div class="pre-built-workflows__output-icon">${icons['badge-check']}</div>
                    <span class="pre-built-workflows__output-title">Loan Analysis</span>
                </div>

                <div class="pre-built-workflows__output-fields">
                    ${fields.map(field => `
                        <div class="pre-built-workflows__output-field">
                            <span class="pre-built-workflows__output-field-label">${field.label}</span>
                            <span class="pre-built-workflows__output-field-value">${field.value}</span>
                        </div>
                    `).join('')}
                    <div class="pre-built-workflows__output-field">
                        <span class="pre-built-workflows__output-field-label">Property Value</span>
                        <span class="pre-built-workflows__output-field-value">$1,209,176</span>
                    </div>
                </div>

                <div class="pre-built-workflows__output-footer">
                    <div class="pre-built-workflows__output-footer-icon">${icons['check-circle']}</div>
                    <span class="pre-built-workflows__output-footer-text">Approved</span>
                </div>
            </div>

            <div class="pre-built-workflows__output-actions">
                <div class="pre-built-workflows__output-action">Export to Excel</div>
                <div class="pre-built-workflows__output-action">Send for Review</div>
            </div>
        `;
    }

    // Clear all timers - CRITICAL: Do NOT clear mainInterval here
    function clearTimers() {
        timers.forEach(timer => clearTimeout(timer));
        timers = [];
    }

    // Show stage
    function showStage(stageName) {
        stage = stageName;
        const stages = container.querySelectorAll('.pre-built-workflows__stage');
        stages.forEach(stageEl => {
            if (stageEl.dataset.stage === stageName) {
                stageEl.classList.add('pre-built-workflows__stage--active');
            } else {
                stageEl.classList.remove('pre-built-workflows__stage--active');
            }
        });

        // Rebuild output stage HTML to retrigger animations
        if (stageName === 'output') {
            buildOutputStage();
        }
    }

    // Upload stage animations
    function animateUploadDoc(index) {
        const doc = container.querySelector(`.pre-built-workflows__document[data-doc-index="${index}"]`);
        if (!doc) return;

        doc.classList.add('pre-built-workflows__document--visible');

        // Show checkmark after a brief delay
        const timer = setTimeout(() => {
            const check = doc.querySelector('.pre-built-workflows__document-check');
            if (check) {
                check.classList.add('pre-built-workflows__document-check--visible');
            }
        }, 150);
        timers.push(timer);
    }

    // Process stage animations
    function animateProcessField(index) {
        const field = container.querySelector(`.pre-built-workflows__process-field[data-field-index="${index}"]`);
        if (!field) return;

        field.classList.add('pre-built-workflows__process-field--active');

        const valueEl = field.querySelector('.pre-built-workflows__process-field-value');
        if (valueEl) {
            valueEl.classList.add('pre-built-workflows__process-field-value--visible');
        }
    }

    // Restart SVG animations
    function restartSVGAnimation() {
        const svgCircles = container.querySelectorAll('.pre-built-workflows__process-circle');

        // Reset circle positions by cloning
        svgCircles.forEach(circle => {
            const parent = circle.parentNode;
            const clone = circle.cloneNode(true);
            parent.replaceChild(clone, circle);
        });

        // Trigger line animation restart by cloning
        const svgLines = container.querySelectorAll('.pre-built-workflows__process-line');
        svgLines.forEach(line => {
            const parent = line.parentNode;
            const clone = line.cloneNode(true);
            parent.replaceChild(clone, line);
        });
    }

    // Update responsive SVG display
    function updateSVGDisplay() {
        const isDesktop = window.innerWidth >= 768;
        const desktopLine = container.querySelector('.pre-built-workflows__process-line--desktop');
        const desktopCircle = container.querySelector('.pre-built-workflows__process-circle--desktop');
        const mobileLine = container.querySelector('.pre-built-workflows__process-line--mobile');
        const mobileCircle = container.querySelector('.pre-built-workflows__process-circle--mobile');

        if (desktopLine && desktopCircle && mobileLine && mobileCircle) {
            if (isDesktop) {
                desktopLine.style.display = 'block';
                desktopCircle.style.display = 'block';
                mobileLine.style.display = 'none';
                mobileCircle.style.display = 'none';
            } else {
                desktopLine.style.display = 'none';
                desktopCircle.style.display = 'none';
                mobileLine.style.display = 'block';
                mobileCircle.style.display = 'block';
            }
        }
    }

    // Retrigger select stage animations by cloning cards
    function retriggerSelectAnimations() {
        const cards = container.querySelectorAll('.pre-built-workflows__workflow-card');
        cards.forEach(card => {
            const parent = card.parentNode;
            const clone = card.cloneNode(true);
            parent.replaceChild(clone, card);
        });
    }

    // Reset all animation states
    function resetAnimationStates() {
        // Reset uploadedDocs state
        container.querySelectorAll('.pre-built-workflows__document').forEach(doc => {
            doc.classList.remove('pre-built-workflows__document--visible');
            const check = doc.querySelector('.pre-built-workflows__document-check');
            if (check) check.classList.remove('pre-built-workflows__document-check--visible');
        });

        // Reset processFields state
        container.querySelectorAll('.pre-built-workflows__process-field').forEach(field => {
            field.classList.remove('pre-built-workflows__process-field--active');
            const value = field.querySelector('.pre-built-workflows__process-field-value');
            if (value) value.classList.remove('pre-built-workflows__process-field-value--visible');
        });
    }

    // Run animation timeline
    function runAnimation() {
        // CRITICAL: Clear ONLY the setTimeout timers, NOT the mainInterval
        clearTimers();

        // Reset states
        uploadedDocs = [];
        processFields = [];
        resetAnimationStates();

        // Timeline matching reference exactly
        const timeline = [
            { time: 0, action: () => {
                showStage('select');
                retriggerSelectAnimations();
            }},
            { time: 1800, action: () => showStage('upload') },
            { time: 2100, action: () => animateUploadDoc(0) },
            { time: 2900, action: () => animateUploadDoc(1) },
            { time: 3700, action: () => animateUploadDoc(2) },
            { time: 4500, action: () => animateUploadDoc(3) },
            { time: 5100, action: () => {
                showStage('process');
                updateSVGDisplay();
                restartSVGAnimation();
            }},
            { time: 6000, action: () => animateProcessField(0) },
            { time: 7500, action: () => animateProcessField(1) },
            { time: 9000, action: () => animateProcessField(2) },
            { time: 9600, action: () => showStage('output') },
        ];

        timeline.forEach(({ time, action }) => {
            const timer = setTimeout(action, time);
            timers.push(timer);
        });
    }

    // Initialize
    buildHTML();
    updateSVGDisplay();
    runAnimation();

    // Loop animation every 13.5 seconds - mainInterval is NEVER cleared by runAnimation
    mainInterval = setInterval(runAnimation, 13500);

    // Update SVG on window resize
    window.addEventListener('resize', () => {
        if (stage === 'process') {
            updateSVGDisplay();
        }
    });

    // Cleanup on page unload
    window.addEventListener('beforeunload', () => {
        clearTimers();
        if (mainInterval) {
            clearInterval(mainInterval);
        }
    });

})();
