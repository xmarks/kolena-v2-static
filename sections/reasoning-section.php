<?php
/**
 * Reasoning Section
 * Shows the reasoning transparency animation with descriptive text
 * Matches reference: ReasoningSection.tsx
 */
?>

<section class="bg-muted/20 pt-12 pb-12">
    <div class="container mx-auto px-6 md:px-4 max-w-[1200px]">
        <div class="grid md:grid-cols-2 gap-8 md:gap-12 items-center">
            <!-- Left Visual - appears second on mobile, first on desktop -->
            <div class="flex justify-center order-2 md:order-1">
                <div id="reasoningAnimation"></div>
            </div>

            <!-- Right Copy - appears first on mobile, second on desktop -->
            <div class="space-y-4 order-1 md:order-2">
                <p class="text-sm font-semibold text-primary uppercase tracking-wider">
                    Reasoning Transparency
                </p>
                <h3 class="text-2xl md:text-4xl font-bold text-foreground leading-tight">
                    See the 'why' behind every answer
                </h3>
                <p class="text-base md:text-lg text-muted-foreground leading-relaxed">
                    Kolena doesn't just give results — it shows its reasoning. Every extraction and insight includes clear explanations and citations you can verify.
                </p>
            </div>
        </div>
    </div>
</section>
