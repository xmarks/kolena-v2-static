// Hero Workflow Animation - Vanilla JavaScript
// Complete implementation matching reference TSX with all 4 scenarios
(function() {
    'use strict';

    // Check for reduced motion preference
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (prefersReducedMotion) {
        console.log('Animations disabled due to reduced motion preference');
        return;
    }

    // Scenario data structures (lines 22-65 from reference)
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
            files: [
                { name: "PPM.pdf", color: "#2F66F5" },
                { name: "Appraisal_Q2.pdf", color: "#46C09A" }
            ],
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

    // State management
    let currentScenario = 'extraction';
    let typingTimer = null;
    let scenarioTimer = null;
    let timeouts = [];
    let hoveredRow = null;

    const grid = document.getElementById('workflowGrid');
    if (!grid) {
        console.error('Hero workflow grid element not found');
        return;
    }

    // Helper function to manage timeouts
    function addTimeout(fn, delay) {
        const id = setTimeout(fn, delay);
        timeouts.push(id);
        return id;
    }

    // Helper function to clear all timers
    function clearAllTimers() {
        if (typingTimer) {
            clearInterval(typingTimer);
            typingTimer = null;
        }
        timeouts.forEach(id => clearTimeout(id));
        timeouts = [];
    }

    // Type text with cursor animation
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
                    typingTimer = null;
                    cursor.remove();
                    resolve();
                }
            }, speed);
        });
    }

    // Render extraction scenario with dual-pane layout
    function renderExtractionScenario() {
        clearAllTimers();
        const data = scenarios.extraction;

        grid.style.gridTemplateRows = 'auto 1fr auto';
        grid.innerHTML = `
            <!-- Prompt Section -->
            <div class="hero-workflow__section">
                <div class="hero-workflow__label">Your prompt</div>
                <div class="hero-workflow__prompt-bar">
                    <svg class="hero-workflow__prompt-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                    <p class="hero-workflow__prompt-text" id="promptText"></p>
                </div>
            </div>

            <!-- Result Section -->
            <div class="hero-workflow__section hero-workflow__section--result" style="position: relative;">
                <div id="processingIndicator" style="display: none; position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity 300ms;">
                    <p style="color: #64748B; font-size: 14px; animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;">Processing files…</p>
                </div>
                <div id="optimizedPrompt" style="display: none; position: absolute; inset: 0; opacity: 0; transition: opacity 300ms;"></div>
                <div id="resultContent" style="position: absolute; inset: 0; opacity: 0; transition: opacity 300ms; overflow: auto;"></div>
            </div>

            <!-- Footer Section -->
            <div class="hero-workflow__section"></div>
        `;

        const promptText = document.getElementById('promptText');

        // Type prompt
        typeText(promptText, data.prompt, 30).then(() => {
            // +100ms: Show processing indicator
            addTimeout(() => {
                const processing = document.getElementById('processingIndicator');
                processing.style.display = 'flex';
                processing.style.opacity = '1';

                // +400ms: Hide processing, show optimized prompt
                addTimeout(() => {
                    processing.style.opacity = '0';
                    addTimeout(() => {
                        processing.style.display = 'none';

                        const optimized = document.getElementById('optimizedPrompt');
                        optimized.style.display = 'block';
                        optimized.innerHTML = `
                            <div>
                                <div class="hero-workflow__label" style="color: #46C09A; margin-bottom: 8px;">Optimized by Kolena</div>
                                <div style="background: #F9FAFB; border-radius: 8px; padding: 16px; border: 1px solid rgba(70, 192, 154, 0.2);">
                                    <p style="font-size: 14px; color: rgba(30, 41, 59, 0.8); line-height: 1.6;">${data.optimized}</p>
                                </div>
                            </div>
                        `;
                        addTimeout(() => {
                            optimized.style.opacity = '1';
                        }, 10);

                        // +2500ms: Hide optimized, show result
                        addTimeout(() => {
                            optimized.style.opacity = '0';
                            addTimeout(() => {
                                optimized.style.display = 'none';
                                showExtractionResult(data);
                            }, 300);
                        }, 2500);
                    }, 300);
                }, 400);
            }, 100);
        });
    }

    // Show extraction result with dual-pane layout and hover interactions
    function showExtractionResult(data) {
        const resultContent = document.getElementById('resultContent');

        resultContent.innerHTML = `
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; height: 100%;">
                <!-- Left: Source Pane -->
                <div>
                    <div class="hero-workflow__label" style="margin-bottom: 8px;">Source</div>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <!-- Lease.pdf - Active -->
                        <div style="background: white; border-radius: 8px; border: 2px solid rgba(70, 192, 154, 0.4); overflow: hidden;">
                            <div style="background: #F9FAFB; padding: 6px 12px; display: flex; align-items: center; gap: 8px; border-bottom: 1px solid #E2E8F0;">
                                <svg width="12" height="12" fill="none" stroke="#46C09A" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <span style="font-size: 12px; font-weight: 500; color: #1E293B;">Lease.pdf</span>
                            </div>
                            <div id="sourceContent" style="padding: 12px; background: white; position: relative; height: 180px;">
                                <!-- Mock page content with highlights -->
                                <div style="display: flex; flex-direction: column; gap: 6px;">
                                    <div style="height: 6px; background: #E5E7EB; border-radius: 3px; width: 100%;"></div>
                                    <div style="height: 6px; background: #E5E7EB; border-radius: 3px; width: 92%;"></div>
                                    <div style="height: 6px; background: #E5E7EB; border-radius: 3px; width: 100%;"></div>
                                    <!-- Highlight 1: Base Rent -->
                                    <div id="highlight-0" style="padding: 6px; border-radius: 4px; background: #FEF3C7; transition: all 300ms;">
                                        <div style="height: 6px; background: #4B5563; border-radius: 3px; width: 83%;"></div>
                                        <div style="height: 6px; background: #4B5563; border-radius: 3px; width: 92%; margin-top: 4px;"></div>
                                    </div>
                                    <div style="height: 6px; background: #E5E7EB; border-radius: 3px; width: 100%;"></div>
                                    <div style="height: 6px; background: #E5E7EB; border-radius: 3px; width: 83%;"></div>
                                    <!-- Highlight 2: Escalation -->
                                    <div id="highlight-1" style="padding: 6px; border-radius: 4px; background: #FEF3C7; transition: all 300ms;">
                                        <div style="height: 6px; background: #4B5563; border-radius: 3px; width: 75%;"></div>
                                    </div>
                                    <div style="height: 6px; background: #E5E7EB; border-radius: 3px; width: 100%;"></div>
                                    <div style="height: 6px; background: #E5E7EB; border-radius: 3px; width: 92%;"></div>
                                </div>
                                <!-- Hover popover -->
                                <div id="hoverPopover" style="display: none; position: absolute; top: 8px; right: 8px; background: #1E293B; color: white; font-size: 12px; padding: 4px 8px; border-radius: 4px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); transition: opacity 300ms;">
                                    Lease.pdf — p.12
                                </div>
                            </div>
                        </div>
                        <!-- Amendment_01.pdf - Inactive -->
                        <div style="background: white; border-radius: 8px; border: 1px solid #E2E8F0; overflow: hidden; opacity: 0.6;">
                            <div style="background: #F9FAFB; padding: 6px 12px; display: flex; align-items: center; gap: 8px; border-bottom: 1px solid #E2E8F0;">
                                <svg width="12" height="12" fill="none" stroke="#94A3B8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <span style="font-size: 12px; font-weight: 500; color: #1E293B;">Amendment_01.pdf</span>
                            </div>
                            <div style="padding: 12px; background: white; height: 60px;">
                                <div style="display: flex; flex-direction: column; gap: 6px;">
                                    <div style="height: 6px; background: #E5E7EB; border-radius: 3px; width: 100%;"></div>
                                    <div style="height: 6px; background: #E5E7EB; border-radius: 3px; width: 83%;"></div>
                                    <div style="height: 6px; background: #E5E7EB; border-radius: 3px; width: 92%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Extraction Table -->
                <div>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                        <div class="hero-workflow__label">Output: ${data.output}</div>
                        <div id="chips" style="display: flex; gap: 8px; opacity: 0; transition: opacity 300ms;"></div>
                    </div>
                    <!-- Source chips -->
                    <div id="sourceChips" style="display: flex; gap: 8px; margin-bottom: 8px; opacity: 0; transition: opacity 300ms;">
                        <div style="display: flex; align-items: center; gap: 4px; padding: 2px 8px; border-radius: 4px; font-size: 12px; background: white; border: 1px solid rgba(70, 192, 154, 0.3); cursor: default;">
                            <div style="width: 6px; height: 6px; border-radius: 50%; background: #46C09A;"></div>
                            Lease.pdf
                        </div>
                        <div style="display: flex; align-items: center; gap: 4px; padding: 2px 8px; border-radius: 4px; font-size: 12px; background: white; border: 1px solid #E2E8F0; cursor: default;">
                            <div style="width: 6px; height: 6px; border-radius: 50%; background: #94A3B8;"></div>
                            Amendment_01.pdf
                        </div>
                    </div>
                    <div style="background: white; border-radius: 8px; overflow: hidden; border: 1px solid #E2E8F0;">
                        <table style="width: 100%; font-size: 14px;">
                            <thead style="background: #F9FAFB; border-bottom: 1px solid #E2E8F0;">
                                <tr>
                                    <th style="text-align: left; padding: 8px 12px; font-size: 16px; font-weight: 600; color: #1E293B;">Clause</th>
                                    <th style="text-align: left; padding: 8px 12px; font-size: 16px; font-weight: 600; color: #1E293B;">Value</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                ${data.tableData.map((row, idx) => `
                                    <tr data-row="${idx}" style="border-bottom: 1px solid #E2E8F0; height: 44px; cursor: default;">
                                        <td style="padding: 8px 12px; font-size: 16px; color: #1E293B;">${row.clause}</td>
                                        <td style="padding: 8px 12px; font-size: 16px; color: #1E293B;">
                                            ${row.value}
                                            ${row.citation ? `<sup style="color: #2F66F5; font-size: 12px; margin-left: 4px; text-decoration: underline; text-decoration-color: rgba(47, 102, 245, 0.7); text-decoration-thickness: 1px; cursor: default;">${row.citation}</sup>` : ''}
                                        </td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        `;

        // Show result with fade-in
        addTimeout(() => {
            resultContent.style.opacity = '1';

            // +400ms: Show chips
            addTimeout(() => {
                const chips = document.getElementById('chips');
                chips.innerHTML = `
                    <div style="display: flex; align-items: center; gap: 4px; padding: 4px 8px; border-radius: 16px; background: rgba(70, 192, 154, 0.1); color: #46C09A; font-size: 12px; font-weight: 500;">
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Citations
                    </div>
                    <div style="display: flex; align-items: center; gap: 4px; padding: 4px 8px; border-radius: 16px; background: rgba(47, 102, 245, 0.1); color: #2F66F5; font-size: 12px; font-weight: 500;">
                        <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Confidence
                    </div>
                `;
                chips.style.opacity = '1';

                const sourceChips = document.getElementById('sourceChips');
                sourceChips.style.opacity = '1';

                // Add hover interactions
                const tableBody = document.getElementById('tableBody');
                const rows = tableBody.querySelectorAll('tr');
                rows.forEach((row, idx) => {
                    row.addEventListener('mouseenter', () => {
                        if (idx < 2) { // Only first 2 rows have highlights
                            const highlight = document.getElementById(`highlight-${idx}`);
                            const popover = document.getElementById('hoverPopover');
                            if (highlight) {
                                highlight.style.background = '#FDE68A';
                                highlight.style.boxShadow = '0 0 0 2px #FBBF24';
                            }
                            if (popover) {
                                popover.style.display = 'block';
                            }
                        }
                    });
                    row.addEventListener('mouseleave', () => {
                        if (idx < 2) {
                            const highlight = document.getElementById(`highlight-${idx}`);
                            const popover = document.getElementById('hoverPopover');
                            if (highlight) {
                                highlight.style.background = '#FEF3C7';
                                highlight.style.boxShadow = 'none';
                            }
                            if (popover) {
                                popover.style.display = 'none';
                            }
                        }
                    });
                });

                // Move to next scenario after 6.5s total
                addTimeout(() => {
                    renderGenerationScenario();
                }, 6100); // 400ms + 6100ms = 6500ms total
            }, 400);
        }, 10);
    }

    // Render generation scenario with file drop zone
    function renderGenerationScenario() {
        clearAllTimers();
        const data = scenarios.generation;

        grid.style.gridTemplateRows = 'auto auto 1fr';
        grid.innerHTML = `
            <!-- Sources Section -->
            <div class="hero-workflow__section" style="min-height: 120px;">
                <div class="hero-workflow__label" style="margin-bottom: 8px;">Sources</div>
                <div id="dropZone" style="background: white; border-radius: 8px; border: 1px solid #E2E8F0; padding: 16px; transition: all 300ms; position: relative;">
                    <div id="dropPlaceholder" style="display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 8px; transition: opacity 300ms;">
                        <div style="display: flex; align-items: center; gap: 12px;">
                            <svg width="16" height="16" fill="none" stroke="#94A3B8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                            <p style="font-size: 14px; color: #94A3B8;">Drop your documents here or click to upload</p>
                            <svg width="16" height="16" fill="none" stroke="#94A3B8" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <div id="files" style="display: none; justify-content: center; align-items: center; gap: 16px;">
                        <div class="file-tile" style="display: flex; align-items: center; gap: 8px; padding: 8px 16px; border-radius: 6px; background: #F9FAFB; border: 1px solid #E2E8F0; box-shadow: 0 2px 6px rgba(0,0,0,0.06); opacity: 0; transform: translateY(-12px); transition: all 250ms ease-out;">
                            <div style="width: 8px; height: 8px; border-radius: 50%; background: #2F66F5;"></div>
                            <svg width="16" height="16" fill="none" stroke="#2F66F5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                            <span style="font-size: 14px; color: #1E293B;">PPM.pdf</span>
                        </div>
                        <div class="file-tile" style="display: flex; align-items: center; gap: 8px; padding: 8px 16px; border-radius: 6px; background: #F9FAFB; border: 1px solid #E2E8F0; box-shadow: 0 2px 6px rgba(0,0,0,0.06); opacity: 0; transform: translateY(-12px); transition: all 250ms ease-out 100ms;">
                            <div style="width: 8px; height: 8px; border-radius: 50%; background: #46C09A;"></div>
                            <svg width="16" height="16" fill="none" stroke="#46C09A" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                            <span style="font-size: 14px; color: #1E293B;">Appraisal_Q2.pdf</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prompt Section -->
            <div class="hero-workflow__section" style="min-height: 56px;">
                <div class="hero-workflow__label">Your prompt</div>
                <div class="hero-workflow__prompt-bar">
                    <svg class="hero-workflow__prompt-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                    <p class="hero-workflow__prompt-text" id="promptText"></p>
                </div>
            </div>

            <!-- Result Section -->
            <div class="hero-workflow__section hero-workflow__section--result" style="position: relative; min-height: 0;">
                <div id="resultContent" style="opacity: 0; transition: opacity 300ms;"></div>
            </div>
        `;

        const dropZone = document.getElementById('dropZone');
        const dropPlaceholder = document.getElementById('dropPlaceholder');
        const files = document.getElementById('files');
        const promptText = document.getElementById('promptText');

        // 0-600ms: Show drop zone with pulse
        dropZone.style.boxShadow = '0 0 0 3px rgba(47, 102, 245, 0.1)';

        addTimeout(() => {
            dropZone.style.boxShadow = 'none';
        }, 600);

        // 600ms: Files drop in
        addTimeout(() => {
            dropPlaceholder.style.opacity = '0';
            addTimeout(() => {
                dropPlaceholder.style.display = 'none';
                files.style.display = 'flex';
                const fileTiles = files.querySelectorAll('.file-tile');
                addTimeout(() => {
                    fileTiles[0].style.opacity = '1';
                    fileTiles[0].style.transform = 'translateY(0)';
                }, 10);
                addTimeout(() => {
                    fileTiles[1].style.opacity = '1';
                    fileTiles[1].style.transform = 'translateY(0)';
                }, 110);
            }, 300);
        }, 600);

        // 1200ms: Start typing prompt
        addTimeout(() => {
            typeText(promptText, data.prompt, 30).then(() => {
                // After prompt typed: Show result immediately (no optimized for generation)
                addTimeout(() => {
                    showGenerationResult(data);
                }, 300);
            });
        }, 1200);
    }

    // Show generation result (investment memo)
    function showGenerationResult(data) {
        const resultContent = document.getElementById('resultContent');

        resultContent.innerHTML = `
            <div style="display: flex; flex-direction: column; gap: 16px;">
                <div style="background: white; border-radius: 8px; padding: 16px; border: 1px solid #E2E8F0; position: relative;">
                    <!-- Output chip at top-right inside card -->
                    <div style="position: absolute; top: 16px; right: 16px;">
                        <div style="font-size: 12px; font-weight: 600; color: #94A3B8; padding: 4px 8px; border-radius: 4px; background: #F9FAFB; border: 1px solid #E2E8F0;">
                            Output: Document
                        </div>
                    </div>
                    <h3 style="font-size: 20px; font-weight: 600; color: #1E293B; padding-right: 128px; margin-bottom: 12px;">Investment Memo — Executive Summary</h3>
                    <div style="display: flex; flex-direction: column; gap: 8px; margin-bottom: 12px;">
                        <h4 style="font-size: 16px; font-weight: 600; color: #1E293B;">Property Overview</h4>
                        <p id="para1" style="font-size: 16px; line-height: 1.6; color: rgba(30, 41, 59, 0.7);">
                            Class A office tower located in Atlanta CBD, comprising 24 floors with 485,000 sq ft of rentable area. LEED Gold certified with premium amenities including on-site fitness center and 6-level parking garage.
                        </p>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                        <h4 style="font-size: 16px; font-weight: 600; color: #1E293B;">Investment Thesis</h4>
                        <p id="para2" style="font-size: 16px; line-height: 1.6; color: rgba(30, 41, 59, 0.7);">
                            Strong NOI growth trajectory driven by below-market rents and upcoming lease renewals. Building positioned to capitalize on return-to-office trends with superior amenities and prime location commanding 12% premium over market rates.
                        </p>
                    </div>
                </div>
            </div>
        `;

        // Show result
        addTimeout(() => {
            resultContent.style.opacity = '1';

            // +500ms: Show citations
            addTimeout(() => {
                const para1 = document.getElementById('para1');
                const para2 = document.getElementById('para2');

                para1.innerHTML = `Class A office tower located in Atlanta CBD, comprising 24 floors with 485,000 sq ft of rentable area<sup style="color: #2F66F5; font-size: 12px; margin-left: 2px; text-decoration: underline; text-decoration-color: rgba(47, 102, 245, 0.7); text-decoration-thickness: 1px; cursor: default;">[1]</sup>. LEED Gold certified with premium amenities including on-site fitness center and 6-level parking garage.`;

                para2.innerHTML = `Strong NOI growth trajectory driven by below-market rents and upcoming lease renewals. Building positioned to capitalize on return-to-office trends with superior amenities and prime location commanding 12% premium over market rates<sup style="color: #46C09A; font-size: 12px; margin-left: 2px; text-decoration: underline; text-decoration-color: rgba(70, 192, 154, 0.7); text-decoration-thickness: 1px; cursor: default;">[2]</sup>.`;

                // Move to next scenario after 3s more
                addTimeout(() => {
                    renderSpreadsheetScenario();
                }, 3000);
            }, 500);
        }, 10);
    }

    // Render spreadsheet scenario with ExternalLink icons
    function renderSpreadsheetScenario() {
        clearAllTimers();
        const data = scenarios.spreadsheet;

        grid.style.gridTemplateRows = 'auto 1fr auto';
        grid.innerHTML = `
            <!-- Prompt Section -->
            <div class="hero-workflow__section">
                <div class="hero-workflow__label">Your prompt</div>
                <div class="hero-workflow__prompt-bar">
                    <svg class="hero-workflow__prompt-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                    <p class="hero-workflow__prompt-text" id="promptText"></p>
                </div>
            </div>

            <!-- Result Section -->
            <div class="hero-workflow__section hero-workflow__section--result" style="position: relative;">
                <div id="processingIndicator" style="display: none; position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity 300ms;">
                    <p style="color: #64748B; font-size: 14px; animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;">Processing files…</p>
                </div>
                <div id="optimizedPrompt" style="display: none; position: absolute; inset: 0; opacity: 0; transition: opacity 300ms;"></div>
                <div id="resultContent" style="position: absolute; inset: 0; opacity: 0; transition: opacity 300ms; overflow: auto;"></div>
            </div>

            <!-- Footer Section -->
            <div class="hero-workflow__section"></div>
        `;

        const promptText = document.getElementById('promptText');

        // Type prompt
        typeText(promptText, data.prompt, 30).then(() => {
            // +100ms: Show processing
            addTimeout(() => {
                const processing = document.getElementById('processingIndicator');
                processing.style.display = 'flex';
                processing.style.opacity = '1';

                // +400ms: Hide processing, show optimized
                addTimeout(() => {
                    processing.style.opacity = '0';
                    addTimeout(() => {
                        processing.style.display = 'none';

                        const optimized = document.getElementById('optimizedPrompt');
                        optimized.style.display = 'block';
                        optimized.innerHTML = `
                            <div>
                                <div class="hero-workflow__label" style="color: #46C09A; margin-bottom: 8px;">Optimized by Kolena</div>
                                <div style="background: #F9FAFB; border-radius: 8px; padding: 16px; border: 1px solid rgba(70, 192, 154, 0.2);">
                                    <p style="font-size: 14px; color: rgba(30, 41, 59, 0.8); line-height: 1.6;">${data.optimized}</p>
                                </div>
                            </div>
                        `;
                        addTimeout(() => {
                            optimized.style.opacity = '1';
                        }, 10);

                        // +2500ms: Hide optimized, show result
                        addTimeout(() => {
                            optimized.style.opacity = '0';
                            addTimeout(() => {
                                optimized.style.display = 'none';
                                showSpreadsheetResult(data);
                            }, 300);
                        }, 2500);
                    }, 300);
                }, 400);
            }, 100);
        });
    }

    // Show spreadsheet result with ExternalLink icons
    function showSpreadsheetResult(data) {
        const resultContent = document.getElementById('resultContent');

        resultContent.innerHTML = `
            <div style="display: flex; flex-direction: column; gap: 8px;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                    <div class="hero-workflow__label">Output: ${data.output}</div>
                </div>
                <div style="background: white; border-radius: 8px; overflow: hidden; border: 1px solid #E2E8F0;">
                    <table style="width: 100%; font-size: 14px;">
                        <thead style="background: #F9FAFB; border-bottom: 1px solid #E2E8F0;">
                            <tr>
                                <th style="text-align: left; padding: 8px 16px; font-size: 16px; font-weight: 600; color: #1E293B;">Metric</th>
                                <th style="text-align: left; padding: 8px 16px; font-size: 16px; font-weight: 600; color: #1E293B;">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${data.tableData.map((row) => `
                                <tr style="border-bottom: 1px solid #E2E8F0; height: 44px;">
                                    <td style="padding: 8px 16px; font-size: 16px; color: #1E293B;">${row.metric}</td>
                                    <td style="padding: 8px 16px; font-size: 16px; color: #1E293B; font-weight: 600;">
                                        <div style="display: inline-flex; align-items: center; gap: 6px;">
                                            ${row.value}
                                            <svg width="12" height="12" fill="none" stroke="#2F66F5" viewBox="0 0 24 24" style="opacity: 0.9; cursor: default;">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                            </svg>
                                        </div>
                                    </td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>
                <div style="display: flex; align-items: center; gap: 4px; font-size: 12px; color: #94A3B8;">
                    <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    Linked to source
                </div>
            </div>
        `;

        // Show result
        addTimeout(() => {
            resultContent.style.opacity = '1';

            // Move to next scenario after total timing
            addTimeout(() => {
                renderDiligenceScenario();
            }, 6100); // Total ~6.5s
        }, 10);
    }

    // Render diligence scenario with status badges and reasoning card
    function renderDiligenceScenario() {
        clearAllTimers();
        const data = scenarios.diligence;

        grid.style.gridTemplateRows = 'minmax(56px, auto) 1fr auto';
        grid.innerHTML = `
            <!-- Prompt Section -->
            <div class="hero-workflow__section">
                <div class="hero-workflow__label">Your prompt</div>
                <div class="hero-workflow__prompt-bar">
                    <svg class="hero-workflow__prompt-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                    </svg>
                    <p class="hero-workflow__prompt-text" id="promptText"></p>
                </div>
            </div>

            <!-- Result Section -->
            <div class="hero-workflow__section hero-workflow__section--result" style="position: relative;">
                <div id="processingIndicator" style="display: none; position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity 300ms;">
                    <p style="color: #64748B; font-size: 14px; animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;">Processing files…</p>
                </div>
                <div id="optimizedPrompt" style="display: none; position: absolute; inset: 0; opacity: 0; transition: opacity 300ms;"></div>
                <div id="resultContent" style="position: absolute; inset: 0; opacity: 0; transition: opacity 300ms; overflow: auto;"></div>
            </div>

            <!-- Footer Section (Reasoning Card) -->
            <div class="hero-workflow__section" style="min-height: auto;">
                <div id="reasoningSection" style="opacity: 0; transition: opacity 300ms;">
                    <!-- Divider -->
                    <div style="border-top: 1px solid #E2E8F0; margin-bottom: 24px;"></div>
                    <!-- Section Label -->
                    <p style="color: #2F66F5; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.02em; margin-bottom: 4px;">
                        Reasoning Transparency
                    </p>
                    <div style="background: white; border: 1px solid #E2E8F0; border-radius: 8px; padding: 16px; box-shadow: 0 2px 6px rgba(0,0,0,0.04); min-height: 120px;">
                        <div style="display: flex; align-items: center; gap: 6px; margin-bottom: 8px;">
                            <h4 style="font-size: 16px; font-weight: 600; color: #1E293B;">Reasoning</h4>
                            <svg width="16" height="16" fill="none" stroke="#94A3B8" viewBox="0 0 24 24" style="cursor: default;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <p style="font-size: 15px; line-height: 1.55; color: #475569;">
                            From three loss-run PDFs (2025–2026, 2020–2022, 2019,2022–2025), I selected claims where Total Incurred &gt; $30,000. When the policy period was missing, I inferred it from Pol. Eff Date (1-year). For each claim I captured Status and summarized Cause of Loss. 69 claims qualified (none in 2025–2026). Sorted by Total Incurred; top 40 shown, remaining 29 available.
                        </p>
                    </div>
                </div>
            </div>
        `;

        const promptText = document.getElementById('promptText');

        // Type prompt
        typeText(promptText, data.prompt, 30).then(() => {
            // +100ms: Show processing
            addTimeout(() => {
                const processing = document.getElementById('processingIndicator');
                processing.style.display = 'flex';
                processing.style.opacity = '1';

                // +400ms: Hide processing, show optimized
                addTimeout(() => {
                    processing.style.opacity = '0';
                    addTimeout(() => {
                        processing.style.display = 'none';

                        const optimized = document.getElementById('optimizedPrompt');
                        optimized.style.display = 'block';
                        optimized.innerHTML = `
                            <div>
                                <div class="hero-workflow__label" style="color: #46C09A; margin-bottom: 8px;">Optimized by Kolena</div>
                                <div style="background: #F9FAFB; border-radius: 8px; padding: 16px; border: 1px solid rgba(70, 192, 154, 0.2);">
                                    <p style="font-size: 14px; color: rgba(30, 41, 59, 0.8); line-height: 1.6;">${data.optimized}</p>
                                </div>
                            </div>
                        `;
                        addTimeout(() => {
                            optimized.style.opacity = '1';
                        }, 10);

                        // +2500ms: Hide optimized, show result
                        addTimeout(() => {
                            optimized.style.opacity = '0';
                            addTimeout(() => {
                                optimized.style.display = 'none';
                                showDiligenceResult(data);
                            }, 300);
                        }, 2500);
                    }, 300);
                }, 400);
            }, 100);
        });
    }

    // Show diligence result with status badges and reasoning card
    function showDiligenceResult(data) {
        const resultContent = document.getElementById('resultContent');

        resultContent.innerHTML = `
            <div>
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                    <div class="hero-workflow__label">Output: ${data.output}</div>
                </div>
                <div style="background: white; border-radius: 8px; overflow: hidden; border: 1px solid #E2E8F0;">
                    <table style="width: 100%; font-size: 14px;">
                        <thead style="background: #F9FAFB; border-bottom: 1px solid #E2E8F0;">
                            <tr>
                                <th style="text-align: left; padding: 8px 16px; font-size: 16px; font-weight: 600; color: #1E293B;">Claim ID</th>
                                <th style="text-align: left; padding: 8px 16px; font-size: 16px; font-weight: 600; color: #1E293B;">Period</th>
                                <th style="text-align: left; padding: 8px 16px; font-size: 16px; font-weight: 600; color: #1E293B;">Total Incurred</th>
                                <th style="text-align: left; padding: 8px 16px; font-size: 16px; font-weight: 600; color: #1E293B;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${data.tableData.map((row) => `
                                <tr style="border-bottom: 1px solid #E2E8F0; height: 44px; cursor: default;">
                                    <td style="padding: 8px 16px; font-size: 16px; color: #1E293B;">${row.claimId}</td>
                                    <td style="padding: 8px 16px; font-size: 16px; color: #1E293B;">${row.period}</td>
                                    <td style="padding: 8px 16px; font-size: 16px; color: #1E293B; font-weight: 600; position: relative;">
                                        ${row.incurred}
                                        ${row.citation ? `<sup style="color: #2F66F5; font-size: 12px; margin-left: 4px; text-decoration: underline; text-decoration-color: rgba(47, 102, 245, 0.7); text-decoration-thickness: 1px; cursor: default;">${row.citation}</sup>` : ''}
                                    </td>
                                    <td style="padding: 8px 16px;">
                                        <span style="display: inline-flex; align-items: center; gap: 4px; font-size: 16px; color: ${row.status === 'Open' ? '#EA580C' : '#059669'};">
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

        // Show result
        addTimeout(() => {
            resultContent.style.opacity = '1';

            // +400ms: Show chips (none for diligence)
            addTimeout(() => {
                // +1000ms: Show reasoning card
                addTimeout(() => {
                    const reasoningSection = document.getElementById('reasoningSection');
                    reasoningSection.style.opacity = '1';

                    // Move to next scenario (loop back to extraction) after 7s total
                    addTimeout(() => {
                        renderExtractionScenario();
                    }, 6600); // Total ~7s for diligence
                }, 1000);
            }, 400);
        }, 10);
    }

    // Start animation
    renderExtractionScenario();

    // Cleanup on page unload
    window.addEventListener('beforeunload', () => {
        clearAllTimers();
    });

})();
