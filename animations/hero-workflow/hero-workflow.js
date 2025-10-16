// Hero Workflow Animation - Vanilla JavaScript
(function() {
    'use strict';

    // Check for reduced motion preference
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (prefersReducedMotion) {
        // Show static version
        return;
    }

    const scenarios = {
        extraction: {
            prompt: "Extract key clauses & rent schedule from this lease.",
            tableData: [
                { clause: "Base Rent (Year 1)", value: "$45,000/month", citation: "[1]" },
                { clause: "Rent Escalation", value: "3% annually", citation: "[1]" },
                { clause: "Lease Term", value: "5 years", citation: "[2]" },
                { clause: "Security Deposit", value: "$90,000", citation: "[1]" }
            ],
            output: "Table",
            showCitations: true
        },
        generation: {
            prompt: "Generate an investment memo summary from PPM + appraisal.",
            files: [
                { name: "PPM.pdf", color: "purple" },
                { name: "Appraisal_Q2.pdf", color: "teal" }
            ],
            document: {
                title: "Investment Memo — Executive Summary",
                sections: [
                    {
                        heading: "Property Overview",
                        text: "Class A office tower located in Atlanta CBD, comprising 24 floors with 485,000 sq ft of rentable area",
                        citation: "[1]"
                    },
                    {
                        heading: "Investment Thesis",
                        text: "Strong NOI growth trajectory driven by below-market rents and upcoming lease renewals.",
                        citation: "[2]"
                    }
                ]
            },
            output: "Document"
        }
    };

    let currentScenario = 'extraction';
    let typingTimer = null;
    let scenarioTimer = null;

    const grid = document.getElementById('workflowGrid');

    function typeText(element, text, speed = 30) {
        return new Promise(resolve => {
            let index = 0;
            element.textContent = '';

            const cursor = document.createElement('span');
            cursor.className = 'hero-workflow__cursor';
            element.appendChild(cursor);

            typingTimer = setInterval(() => {
                if (index < text.length) {
                    element.textContent = text.slice(0, index + 1);
                    element.appendChild(cursor);
                    index++;
                } else {
                    clearInterval(typingTimer);
                    cursor.remove();
                    resolve();
                }
            }, speed);
        });
    }

    function showProcessing() {
        return new Promise(resolve => {
            const processing = document.createElement('div');
            processing.className = 'hero-workflow__result hero-workflow__result--visible';
            processing.innerHTML = `
                <div class="hero-workflow__processing">
                    <p class="hero-workflow__processing-text">Processing files…</p>
                </div>
            `;

            const resultContainer = document.querySelector('.hero-workflow__section--result');
            resultContainer.innerHTML = '';
            resultContainer.appendChild(processing);

            setTimeout(() => {
                processing.remove();
                resolve();
            }, 400);
        });
    }

    function renderExtractionScenario() {
        const data = scenarios.extraction;

        grid.style.gridTemplateRows = 'auto 1fr auto';
        grid.innerHTML = `
            <!-- Prompt Section -->
            <div class="hero-workflow__section">
                <div class="hero-workflow__label">Your prompt</div>
                <div class="hero-workflow__prompt-bar">
                    <svg class="hero-workflow__prompt-icon" fill="none" stroke="#2F66F5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                    <p class="hero-workflow__prompt-text" id="promptText"></p>
                </div>
            </div>

            <!-- Result Section -->
            <div class="hero-workflow__section hero-workflow__section--result">
            </div>

            <!-- Footer Section -->
            <div class="hero-workflow__section"></div>
        `;

        const promptText = document.getElementById('promptText');

        typeText(promptText, data.prompt).then(() => {
            return showProcessing();
        }).then(() => {
            showExtractionResult(data);
        });
    }

    function showExtractionResult(data) {
        const resultContainer = document.querySelector('.hero-workflow__section--result');

        const result = document.createElement('div');
        result.className = 'hero-workflow__result hero-workflow__result--visible fade-in';

        result.innerHTML = `
            <div>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                    <div class="hero-workflow__label">Output: ${data.output}</div>
                    <div class="hero-workflow__chips fade-in">
                        <div class="hero-workflow__chip hero-workflow__chip--success">
                            <svg class="hero-workflow__chip-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Citations
                        </div>
                        <div class="hero-workflow__chip hero-workflow__chip--primary">
                            <svg class="hero-workflow__chip-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Confidence
                        </div>
                    </div>
                </div>
                <div class="hero-workflow__table-wrap">
                    <table class="hero-workflow__table">
                        <thead>
                            <tr>
                                <th>Clause</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${data.tableData.map(row => `
                                <tr>
                                    <td>${row.clause}</td>
                                    <td>
                                        ${row.value}
                                        ${row.citation ? `<sup class="hero-workflow__citation">${row.citation}</sup>` : ''}
                                    </td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>
            </div>
        `;

        resultContainer.innerHTML = '';
        resultContainer.appendChild(result);

        // Move to next scenario
        scenarioTimer = setTimeout(() => {
            renderGenerationScenario();
        }, 6500);
    }

    function renderGenerationScenario() {
        const data = scenarios.generation;

        grid.style.gridTemplateRows = 'auto auto 1fr';
        grid.innerHTML = `
            <!-- Sources Section -->
            <div class="hero-workflow__section">
                <div class="hero-workflow__label">Sources</div>
                <div class="hero-workflow__drop-zone hero-workflow__drop-zone--pulse" id="dropZone">
                    <div class="hero-workflow__drop-placeholder" id="dropPlaceholder">
                        <svg width="16" height="16" fill="none" stroke="#64748B" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <p class="hero-workflow__drop-text">Drop your documents here or click to upload</p>
                        <svg width="16" height="16" fill="none" stroke="#64748B" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div class="hero-workflow__files hidden" id="files">
                        ${data.files.map(file => `
                            <div class="hero-workflow__file">
                                <div class="hero-workflow__file-dot hero-workflow__file-dot--${file.color}"></div>
                                <svg width="16" height="16" fill="none" stroke="${file.color === 'purple' ? '#2F66F5' : '#46C09A'}" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <span class="hero-workflow__file-name">${file.name}</span>
                            </div>
                        `).join('')}
                    </div>
                </div>
            </div>

            <!-- Prompt Section -->
            <div class="hero-workflow__section">
                <div class="hero-workflow__label">Your prompt</div>
                <div class="hero-workflow__prompt-bar">
                    <svg class="hero-workflow__prompt-icon" fill="none" stroke="#2F66F5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                    <p class="hero-workflow__prompt-text" id="promptText"></p>
                </div>
            </div>

            <!-- Result Section -->
            <div class="hero-workflow__section hero-workflow__section--result">
            </div>
        `;

        // Animate files dropping
        setTimeout(() => {
            document.getElementById('dropZone').classList.remove('hero-workflow__drop-zone--pulse');
        }, 600);

        setTimeout(() => {
            document.getElementById('dropPlaceholder').classList.add('hero-workflow__drop-placeholder--hidden');
            document.getElementById('files').classList.remove('hidden');
        }, 600);

        // Type prompt
        setTimeout(() => {
            const promptText = document.getElementById('promptText');
            typeText(promptText, data.prompt).then(() => {
                setTimeout(() => {
                    showGenerationResult(data);
                }, 300);
            });
        }, 1200);
    }

    function showGenerationResult(data) {
        const resultContainer = document.querySelector('.hero-workflow__section--result');

        const result = document.createElement('div');
        result.className = 'hero-workflow__result hero-workflow__result--visible fade-in';

        result.innerHTML = `
            <div class="hero-workflow__document">
                <div class="hero-workflow__output-badge">Output: Document</div>
                <h3 class="hero-workflow__document-title">${data.document.title}</h3>
                ${data.document.sections.map((section, idx) => `
                    <div class="hero-workflow__document-section">
                        <h4 class="hero-workflow__document-heading">${section.heading}</h4>
                        <p class="hero-workflow__document-text">
                            ${section.text}<sup class="hero-workflow__citation" style="color: ${idx === 0 ? '#2F66F5' : '#46C09A'}">${section.citation}</sup>.
                        </p>
                    </div>
                `).join('')}
            </div>
        `;

        resultContainer.innerHTML = '';
        resultContainer.appendChild(result);

        // Move to next scenario (loop back to extraction)
        scenarioTimer = setTimeout(() => {
            renderExtractionScenario();
        }, 6500);
    }

    // Start animation
    renderExtractionScenario();

    // Cleanup on page unload
    window.addEventListener('beforeunload', () => {
        if (typingTimer) clearInterval(typingTimer);
        if (scenarioTimer) clearTimeout(scenarioTimer);
    });
})();
