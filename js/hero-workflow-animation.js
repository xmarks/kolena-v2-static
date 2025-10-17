// Hero Workflow Animation - Vanilla JavaScript
// Exact match to HeroWorkflowAnimation.tsx reference
(function() {
    'use strict';

    // Check for reduced motion preference
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (prefersReducedMotion) {
        return;
    }

    // Scenario data - exact match to reference
    const scenarios = {
        extraction: {
            prompt: "Extract key clauses & rent schedule from this lease.",
            optimized: "Extract: (1) Material clauses (Rent Escalation, Termination, Options), (2) Rent schedule with dates, amounts, escalations. Return structured table format.",
            tableData: [
                { clause: "Base Rent (Year 1)", value: "$45,000/month", citation: "[1]", source: "Lease.pdf", page: 12 },
                { clause: "Rent Escalation", value: "3% annually", citation: "[1]", source: "Lease.pdf", page: 12 },
                { clause: "Lease Term", value: "5 years", citation: "[2]", source: "Amendment_01.pdf", page: 3 },
                { clause: "Security Deposit", value: "$90,000", citation: "[1]", source: "Lease.pdf", page: 14 }
            ],
            output: "Table",
            showCitations: true
        },
        generation: {
            prompt: "Generate an investment memo summary from PPM + appraisal.",
            optimized: "Synthesize PPM and appraisal into executive summary: (1) Property overview, (2) Investment thesis, (3) Key financials, (4) Risk factors. Professional memo format, 2-3 paragraphs.",
            tableData: [],
            output: "Document",
            showCitations: false
        },
        spreadsheet: {
            prompt: "Build a valuation table with NOI, cap rate, and IRR.",
            optimized: "Create financial valuation table with: Net Operating Income (NOI), Capitalization Rate, 5-year IRR projection. Include formulas and assumptions used.",
            tableData: [
                { metric: "NOI", value: "$4,200,000", source: "Lease_Summary.xlsx — Inputs!B12", type: "excel" },
                { metric: "Cap Rate", value: "6.2%", source: "PPM.pdf — p.22", type: "pdf" },
                { metric: "IRR (5yr)", value: "12.8%", source: "PPM.pdf — p.24", type: "pdf" }
            ],
            output: "Table",
            showCitations: false
        },
        diligence: {
            prompt: "Extract Top Losses (Total Incurred > $30,000).",
            optimized: "Filter and extract claims where Total Incurred exceeds $30,000. Sort by Total Incurred (descending). Include Claim ID, Loss Period, Total Incurred, Status. Add citations for source documents.",
            tableData: [
                { claimId: "CLM-2024-1847", period: "Q2 2024", incurred: "$127,450", status: "Open", citation: "[1]", source: "LossRuns_2020–2022.pdf", page: 12 },
                { claimId: "CLM-2024-1652", period: "Q1 2024", incurred: "$94,200", status: "Closed", citation: "[2]", source: "LossRuns_2020–2022.pdf", page: 18 },
                { claimId: "CLM-2023-2941", period: "Q4 2023", incurred: "$68,900", status: "Open", citation: "[3]", source: "LossRuns_2020–2022.pdf", page: 24 }
            ],
            output: "Table",
            showCitations: false,
            showReasoningButton: false
        }
    };

    let currentScenario = 'extraction';
    let typingTimer = null;
    let scenarioTimer = null;
    let allTimers = [];

    const grid = document.getElementById('workflowGrid');

    function clearAllTimers() {
        if (typingTimer) clearInterval(typingTimer);
        if (scenarioTimer) clearTimeout(scenarioTimer);
        allTimers.forEach(timer => clearTimeout(timer));
        allTimers = [];
    }

    function addTimer(timer) {
        allTimers.push(timer);
        return timer;
    }

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

    function moveToNextScenario() {
        const scenarioList = ['extraction', 'generation', 'spreadsheet', 'diligence'];
        const currentIndex = scenarioList.indexOf(currentScenario);
        const nextIndex = (currentIndex + 1) % scenarioList.length;
        currentScenario = scenarioList[nextIndex];
        clearAllTimers();
        renderScenario();
    }

    function renderScenario() {
        const data = scenarios[currentScenario];
        const gridRows = currentScenario === "generation" ? 'auto auto 1fr' :
                        currentScenario === "diligence" ? 'minmax(56px, auto) 1fr auto' : 'auto 1fr auto';
        grid.style.gridTemplateRows = gridRows;
        grid.style.gap = '16px';

        if (currentScenario === 'generation') {
            renderGenerationScenario(data);
        } else {
            renderStandardScenario(data);
        }
    }

    function renderGenerationScenario(data) {
        grid.innerHTML = '';

        // Row 1: Sources (Drop Zone)
        const sourcesRow = document.createElement('div');
        sourcesRow.style.minHeight = '120px';
        sourcesRow.innerHTML = `
            <div class="hero-workflow__label">Sources</div>
            <div class="hero-workflow__drop-zone" id="dropZone">
                <div class="hero-workflow__drop-placeholder" id="dropPlaceholder">
                    <div style="display: flex; align-items: center; gap: 12px;">
                        <svg class="hero-workflow__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 16px; height: 16px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p style="font-size: 14px; color: #64748B;">Drop your documents here or click to upload</p>
                        <svg class="hero-workflow__icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="width: 16px; height: 16px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <div class="hero-workflow__files" id="droppedFiles" style="opacity: 0;">
                    <div class="hero-workflow__file-tile" style="animation-delay: 0ms;">
                        <div class="hero-workflow__file-dot" style="background-color: #2F66F5;"></div>
                        <svg class="hero-workflow__file-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #2F66F5;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>PPM.pdf</span>
                    </div>
                    <div class="hero-workflow__file-tile" style="animation-delay: 100ms;">
                        <div class="hero-workflow__file-dot" style="background-color: #46C09A;"></div>
                        <svg class="hero-workflow__file-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="color: #46C09A;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <span>Appraisal_Q2.pdf</span>
                    </div>
                </div>
            </div>
        `;
        grid.appendChild(sourcesRow);

        // Row 2: Prompt Bar
        const promptRow = document.createElement('div');
        promptRow.style.minHeight = '56px';
        promptRow.innerHTML = `
            <div class="hero-workflow__label">Your prompt</div>
            <div class="hero-workflow__prompt-bar">
                <svg class="hero-workflow__prompt-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
                <p id="promptText"></p>
            </div>
        `;
        grid.appendChild(promptRow);

        // Row 3: Result Area
        const resultRow = document.createElement('div');
        resultRow.style.position = 'relative';
        resultRow.style.minHeight = '0';
        resultRow.innerHTML = `
            <div id="resultContent" style="position: absolute; inset: 0; opacity: 0; transition: opacity 300ms;">
                <div class="hero-workflow__document">
                    <div class="hero-workflow__document-header">
                        <h3>Investment Memo — Executive Summary</h3>
                        <div class="hero-workflow__output-chip">Output: Document</div>
                    </div>
                    <div class="hero-workflow__document-section">
                        <h4>Property Overview</h4>
                        <p>Class A office tower located in Atlanta CBD, comprising 24 floors with 485,000 sq ft of rentable area<sup class="hero-workflow__citation" id="citation1" style="opacity: 0;">[1]</sup>. LEED Gold certified with premium amenities including on-site fitness center and 6-level parking garage.</p>
                    </div>
                    <div class="hero-workflow__document-section">
                        <h4>Investment Thesis</h4>
                        <p>Strong NOI growth trajectory driven by below-market rents and upcoming lease renewals. Building positioned to capitalize on return-to-office trends with superior amenities and prime location commanding 12% premium over market rates<sup class="hero-workflow__citation hero-workflow__citation--green" id="citation2" style="opacity: 0;">[2]</sup>.</p>
                    </div>
                </div>
            </div>
        `;
        grid.appendChild(resultRow);

        // Animation sequence
        const dropZone = document.getElementById('dropZone');
        const dropPlaceholder = document.getElementById('dropPlaceholder');
        const droppedFiles = document.getElementById('droppedFiles');
        const promptText = document.getElementById('promptText');
        const resultContent = document.getElementById('resultContent');

        // 0-600ms: Show pulse on drop zone
        dropZone.classList.add('hero-workflow__drop-zone--pulse');
        addTimer(setTimeout(() => {
            dropZone.classList.remove('hero-workflow__drop-zone--pulse');
        }, 600));

        // 600ms: Files drop in
        addTimer(setTimeout(() => {
            dropPlaceholder.style.opacity = '0';
            droppedFiles.style.opacity = '1';

            // 1200ms: Start typing prompt
            addTimer(setTimeout(() => {
                typeText(promptText, data.prompt, 30).then(() => {
                    // 300ms after typing: Show document result
                    addTimer(setTimeout(() => {
                        resultContent.style.opacity = '1';

                        // 500ms: Fade in citations
                        addTimer(setTimeout(() => {
                            document.getElementById('citation1').style.opacity = '1';
                            document.getElementById('citation2').style.opacity = '1';

                            // 3000ms: Move to next scenario
                            scenarioTimer = setTimeout(() => {
                                moveToNextScenario();
                            }, 3000);
                        }, 500));
                    }, 300));
                });
            }, 200));
        }, 600));
    }

    function renderStandardScenario(data) {
        grid.innerHTML = '';

        // Row 1: Prompt Bar
        const promptRow = document.createElement('div');
        promptRow.style.minHeight = '64px';
        promptRow.innerHTML = `
            <div class="hero-workflow__label">Your prompt</div>
            <div class="hero-workflow__prompt-bar">
                <svg class="hero-workflow__prompt-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
                <p id="promptText"></p>
            </div>
        `;
        grid.appendChild(promptRow);

        // Row 2: Result Area
        const resultRow = document.createElement('div');
        resultRow.style.position = 'relative';
        resultRow.style.minHeight = '0';
        resultRow.innerHTML = `
            <div id="processingIndicator" style="position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity 300ms;">
                <p style="color: #64748B; font-size: 14px; animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;">Processing files…</p>
            </div>
            <div id="optimizedPrompt" style="position: absolute; inset: 0; opacity: 0; transition: opacity 300ms;">
                <div class="hero-workflow__label" style="color: #46C09A;">Optimized by Kolena</div>
                <div class="hero-workflow__optimized-box">
                    <p>${data.optimized}</p>
                </div>
            </div>
            <div id="resultContent" style="position: absolute; inset: 0; opacity: 0; transition: opacity 300ms; overflow: auto;">
            </div>
        `;
        grid.appendChild(resultRow);

        // Row 3: Reasoning (for diligence only)
        const reasoningRow = document.createElement('div');
        if (currentScenario === 'diligence') {
            reasoningRow.style.minHeight = 'auto';
            reasoningRow.style.opacity = '0';
            reasoningRow.style.transition = 'opacity 300ms';
            reasoningRow.id = 'reasoningSection';
            reasoningRow.innerHTML = `
                <div style="border-top: 1px solid #E2E8F0; margin-bottom: 24px;"></div>
                <p style="color: #2F66F5; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.02em; margin-bottom: 4px;">Reasoning Transparency</p>
                <div class="hero-workflow__reasoning-card">
                    <div style="display: flex; align-items: center; gap: 6px; margin-bottom: 8px;">
                        <h4 style="font-size: 16px; font-weight: 600; color: #1E293B;">Reasoning</h4>
                        <svg style="width: 16px; height: 16px; color: #64748B;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <p style="color: #475569; font-size: 15px; line-height: 1.55;">From three loss-run PDFs (2025–2026, 2020–2022, 2019,2022–2025), I selected claims where Total Incurred &gt; $30,000. When the policy period was missing, I inferred it from Pol. Eff Date (1-year). For each claim I captured Status and summarized Cause of Loss. 69 claims qualified (none in 2025–2026). Sorted by Total Incurred; top 40 shown, remaining 29 available.</p>
                </div>
            `;
        } else {
            reasoningRow.style.minHeight = '56px';
        }
        grid.appendChild(reasoningRow);

        // Animation sequence
        const promptText = document.getElementById('promptText');

        typeText(promptText, data.prompt, 30).then(() => {
            // Show processing indicator
            addTimer(setTimeout(() => {
                showProcessingIndicator();

                // Hide processing and show optimized prompt (not result yet!)
                addTimer(setTimeout(() => {
                    hideProcessingIndicator();
                    showOptimizedPrompt(data);

                    // Show result after optimized prompt is visible for 2.5 seconds
                    addTimer(setTimeout(() => {
                        hideOptimizedPrompt();

                        // Show appropriate result based on scenario
                        if (currentScenario === 'extraction') {
                            showExtractionResult(data);
                        } else if (currentScenario === 'spreadsheet') {
                            showSpreadsheetResult(data);
                        } else if (currentScenario === 'diligence') {
                            showDiligenceResult(data);
                        }

                        // Show chips after result
                        addTimer(setTimeout(() => {
                            const chipsContainer = document.getElementById('chipsContainer');
                            if (chipsContainer) {
                                chipsContainer.style.opacity = '1';
                            }

                            // Show reasoning for diligence
                            if (currentScenario === 'diligence') {
                                addTimer(setTimeout(() => {
                                    const reasoningSection = document.getElementById('reasoningSection');
                                    if (reasoningSection) {
                                        reasoningSection.style.opacity = '1';
                                    }
                                }, 1000));
                            }

                            // Move to next scenario
                            const timing = currentScenario === 'diligence' ? 7000 : 6500;
                            scenarioTimer = setTimeout(() => {
                                moveToNextScenario();
                            }, timing);
                        }, 400));
                    }, 2500));
                }, 400));
            }, 100));
        });
    }

    function showProcessingIndicator() {
        const indicator = document.getElementById('processingIndicator');
        if (indicator) {
            indicator.style.opacity = '1';
        }
    }

    function hideProcessingIndicator() {
        const indicator = document.getElementById('processingIndicator');
        if (indicator) {
            indicator.style.opacity = '0';
        }
    }

    function showOptimizedPrompt(data) {
        const optimized = document.getElementById('optimizedPrompt');
        if (optimized) {
            optimized.style.opacity = '1';
        }
    }

    function hideOptimizedPrompt() {
        const optimized = document.getElementById('optimizedPrompt');
        if (optimized) {
            optimized.style.opacity = '0';
        }
    }

    function showExtractionResult(data) {
        const resultContent = document.getElementById('resultContent');
        resultContent.innerHTML = `
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; height: 100%;">
                <!-- Left: Source Pane -->
                <div>
                    <div class="hero-workflow__label">Source</div>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <!-- Lease.pdf - Active -->
                        <div class="hero-workflow__source-pane hero-workflow__source-pane--active">
                            <div class="hero-workflow__source-header">
                                <svg class="hero-workflow__file-icon" style="color: #46C09A; width: 12px; height: 12px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span style="font-size: 12px; font-weight: 500;">Lease.pdf</span>
                            </div>
                            <div class="hero-workflow__source-content" style="position: relative;">
                                <div class="hero-workflow__source-line"></div>
                                <div class="hero-workflow__source-line" style="width: 91.67%;"></div>
                                <div class="hero-workflow__source-line"></div>
                                <div class="hero-workflow__source-highlight" data-row="0">
                                    <div class="hero-workflow__source-line" style="background-color: #4B5563; width: 83.33%;"></div>
                                    <div class="hero-workflow__source-line" style="background-color: #4B5563; width: 91.67%; margin-top: 4px;"></div>
                                </div>
                                <div class="hero-workflow__source-line"></div>
                                <div class="hero-workflow__source-line" style="width: 83.33%;"></div>
                                <div class="hero-workflow__source-highlight" data-row="1">
                                    <div class="hero-workflow__source-line" style="background-color: #4B5563; width: 75%;"></div>
                                </div>
                                <div class="hero-workflow__source-line"></div>
                                <div class="hero-workflow__source-line" style="width: 91.67%;"></div>
                                <div id="sourcePopover" class="hero-workflow__source-popover" style="opacity: 0;">Lease.pdf — p.12</div>
                            </div>
                        </div>
                        <!-- Amendment_01.pdf - Inactive -->
                        <div class="hero-workflow__source-pane" style="opacity: 0.6;">
                            <div class="hero-workflow__source-header">
                                <svg class="hero-workflow__file-icon" style="color: #64748B; width: 12px; height: 12px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                <span style="font-size: 12px; font-weight: 500;">Amendment_01.pdf</span>
                            </div>
                            <div class="hero-workflow__source-content" style="height: 60px;">
                                <div class="hero-workflow__source-line"></div>
                                <div class="hero-workflow__source-line" style="width: 83.33%;"></div>
                                <div class="hero-workflow__source-line" style="width: 91.67%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Table -->
                <div>
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                        <div class="hero-workflow__label">Output: ${data.output}</div>
                        <div id="chipsContainer" style="display: flex; gap: 8px; opacity: 0; transition: opacity 300ms;">
                            <div class="hero-workflow__chip hero-workflow__chip--green">
                                <svg style="width: 12px; height: 12px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Citations
                            </div>
                            <div class="hero-workflow__chip hero-workflow__chip--blue">
                                <svg style="width: 12px; height: 12px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Confidence
                            </div>
                        </div>
                    </div>

                    <!-- Source chips -->
                    <div id="sourceChipsContainer" style="display: flex; gap: 8px; margin-bottom: 8px; opacity: 0; transition: opacity 300ms;">
                        <div class="hero-workflow__source-chip hero-workflow__source-chip--active">
                            <div class="hero-workflow__file-dot" style="background-color: #46C09A;"></div>
                            Lease.pdf
                        </div>
                        <div class="hero-workflow__source-chip">
                            <div class="hero-workflow__file-dot" style="background-color: #64748B;"></div>
                            Amendment_01.pdf
                        </div>
                    </div>

                    <div class="hero-workflow__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Clause</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${data.tableData.map((row, idx) => `
                                    <tr class="hero-workflow__table-row" data-row="${idx}">
                                        <td>${row.clause}</td>
                                        <td>${row.value}<sup class="hero-workflow__citation">${row.citation}</sup></td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        `;
        resultContent.style.opacity = '1';

        // Show source chips with chips
        addTimer(setTimeout(() => {
            const sourceChipsContainer = document.getElementById('sourceChipsContainer');
            if (sourceChipsContainer) {
                sourceChipsContainer.style.opacity = '1';
            }
        }, 400));

        // Add hover listeners
        const tableRows = resultContent.querySelectorAll('.hero-workflow__table-row');
        const highlights = resultContent.querySelectorAll('.hero-workflow__source-highlight');
        const popover = document.getElementById('sourcePopover');

        tableRows.forEach((row, idx) => {
            row.addEventListener('mouseenter', () => {
                if (idx < 2 && highlights[idx]) {
                    highlights[idx].classList.add('hero-workflow__source-highlight--active');
                    if (popover) {
                        popover.style.opacity = '1';
                    }
                }
            });
            row.addEventListener('mouseleave', () => {
                if (idx < 2 && highlights[idx]) {
                    highlights[idx].classList.remove('hero-workflow__source-highlight--active');
                    if (popover) {
                        popover.style.opacity = '0';
                    }
                }
            });
        });
    }

    function showSpreadsheetResult(data) {
        const resultContent = document.getElementById('resultContent');
        resultContent.innerHTML = `
            <div>
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                    <div class="hero-workflow__label">Output: ${data.output}</div>
                    <div id="chipsContainer" style="opacity: 0;"></div>
                </div>

                <div style="display: flex; flex-direction: column; gap: 8px;">
                    <div class="hero-workflow__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Metric</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${data.tableData.map(row => `
                                    <tr class="hero-workflow__table-row hero-workflow__table-row--hover">
                                        <td>${row.metric}</td>
                                        <td style="font-weight: 600;">
                                            <div style="display: inline-flex; align-items: center; gap: 6px;">
                                                ${row.value}
                                                <svg style="width: 12px; height: 12px; color: #2F66F5; opacity: 0.9;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                                                </svg>
                                            </div>
                                        </td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>

                    <div style="display: flex; align-items: center; gap: 4px; font-size: 12px; color: #64748B; transition: opacity 300ms;">
                        <svg style="width: 12px; height: 12px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                        </svg>
                        Linked to source
                    </div>
                </div>
            </div>
        `;
        resultContent.style.opacity = '1';
    }

    function showDiligenceResult(data) {
        const resultContent = document.getElementById('resultContent');
        resultContent.innerHTML = `
            <div>
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
                    <div class="hero-workflow__label">Output: ${data.output}</div>
                    <div id="chipsContainer" style="opacity: 0;"></div>
                </div>

                <div class="hero-workflow__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Claim ID</th>
                                <th>Period</th>
                                <th>Total Incurred</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${data.tableData.map(row => `
                                <tr>
                                    <td>${row.claimId}</td>
                                    <td>${row.period}</td>
                                    <td style="font-weight: 600;">
                                        ${row.incurred}<sup class="hero-workflow__citation">${row.citation}</sup>
                                    </td>
                                    <td>
                                        <span class="hero-workflow__status-badge hero-workflow__status-badge--${row.status.toLowerCase()}">
                                            ${row.status}
                                        </span>
                                    </td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>
            </div>
        `;
        resultContent.style.opacity = '1';
    }

    // Initialize the animation
    renderScenario();

    // Cleanup on page unload
    window.addEventListener('beforeunload', clearAllTimers);

})();
