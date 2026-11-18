<section class="q-section q-layering-section" id="fragranceLayering" style="background: radial-gradient(ellipse 70% 60% at 50% 50%, #171513 0%, #0D0D0D 100%); color: #F8F4EF; position: relative; overflow: hidden; border-top: 1px solid rgba(201,169,110,0.15); border-bottom: 1px solid rgba(201,169,110,0.15);" aria-labelledby="layering-title">
    {{-- Ambient Golden Glow --}}
    <div style="position: absolute; top: 10%; left: 50%; transform: translateX(-50%); width: 600px; height: 350px; background: radial-gradient(ellipse, rgba(201,169,110,0.08) 0%, transparent 70%); pointer-events: none;"></div>

    <div style="max-width: 1300px; margin: 0 auto; position: relative; z-index: 2;">
        {{-- Section Header --}}
        <div style="text-align: center; max-width: 780px; margin: 0 auto 56px;">
            <span class="q-eyebrow" style="color: #C9A96E; letter-spacing: 0.35em;">L'Art du Sillage &middot; Atelier Exclusive</span>
            <h2 class="q-heading q-heading-lg" id="layering-title" style="color: #F8F4EF; margin-top: 8px; margin-bottom: 20px;">
                The Art of <em>Fragrance Layering</em>
            </h2>
            <div class="q-divider" style="margin: 0 auto 24px; background: #C9A96E; opacity: 0.6;"></div>
            <p class="q-body" style="color: rgba(248,244,239,0.7); font-size: 0.9rem; line-height: 1.8;">
                In the classical traditions of Grasse, true connoisseurs never limit themselves to a single essence. Blend two seasonal extraits together on pulse points to reveal a fifth, unreleased olfactory chord tailored exclusively to your aura.
            </p>
        </div>

        {{-- Layering Interactive Interface --}}
        <div class="q-layering-grid" style="display: grid; grid-template-columns: 1fr 340px 1fr; gap: 36px; align-items: center;">
            
            {{-- Slot 1: Primary Essence --}}
            <div class="q-layering-card" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(201,169,110,0.2); padding: 32px 24px; text-align: center; backdrop-filter: blur(10px); transition: border-color 0.3s ease;">
                <span style="font-family:'Raleway',sans-serif; font-size:0.65rem; letter-spacing:0.3em; text-transform:uppercase; color:#C9A96E; display:block; margin-bottom:12px;">Primary Base Essence</span>
                
                {{-- Selector Tabs --}}
                <div class="q-layer-selector" id="layerSelectA" style="display: flex; gap: 8px; justify-content: center; margin-bottom: 24px; flex-wrap: wrap;">
                    <button type="button" class="q-layer-pill active" data-slot="A" data-season="spring" style="padding: 6px 14px; font-size: 0.65rem; font-family:'Raleway',sans-serif; text-transform: uppercase; letter-spacing: 0.15em; border: 1px solid #7A8C6E; background: rgba(122,140,110,0.2); color: #F8F4EF; cursor: pointer;">Spring</button>
                    <button type="button" class="q-layer-pill" data-slot="A" data-season="summer" style="padding: 6px 14px; font-size: 0.65rem; font-family:'Raleway',sans-serif; text-transform: uppercase; letter-spacing: 0.15em; border: 1px solid rgba(255,255,255,0.15); background: transparent; color: rgba(248,244,239,0.6); cursor: pointer;">Summer</button>
                    <button type="button" class="q-layer-pill" data-slot="A" data-season="autumn" style="padding: 6px 14px; font-size: 0.65rem; font-family:'Raleway',sans-serif; text-transform: uppercase; letter-spacing: 0.15em; border: 1px solid rgba(255,255,255,0.15); background: transparent; color: rgba(248,244,239,0.6); cursor: pointer;">Autumn</button>
                    <button type="button" class="q-layer-pill" data-slot="A" data-season="winter" style="padding: 6px 14px; font-size: 0.65rem; font-family:'Raleway',sans-serif; text-transform: uppercase; letter-spacing: 0.15em; border: 1px solid rgba(255,255,255,0.15); background: transparent; color: rgba(248,244,239,0.6); cursor: pointer;">Winter</button>
                </div>

                {{-- Bottle Visual A --}}
                <div id="layerBottleA" style="height: 180px; display: flex; align-items: center; justify-content: center; margin-bottom: 16px;">
                    <div style="transform: scale(0.65); transform-origin: center center;">
                        <x-perfume-bottle season="spring" name="Fleur de l'Aube" size="md" />
                    </div>
                </div>

                <h3 id="layerNameA" style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.5rem; font-weight:400; color:#F8F4EF; margin:0 0 6px;">Fleur de l'Aube</h3>
                <p id="layerSubtitleA" style="font-family:'Raleway',sans-serif; font-size:0.75rem; color:#C9A96E; letter-spacing:0.15em; margin:0 0 12px;">SPRING &middot; WHITE PEONY &amp; BERGAMOT</p>
                <p id="layerDescA" style="font-family:'Raleway',sans-serif; font-size:0.8rem; color:rgba(248,244,239,0.6); line-height:1.6; margin:0;">Crisp morning dew and opening blossom petals providing luminous floral elevation.</p>
            </div>

            {{-- Center: Dynamic Fusion Crucible --}}
            <div class="q-layering-fusion" style="text-align: center; padding: 24px 16px; background: rgba(201,169,110,0.04); border: 1px solid rgba(201,169,110,0.3); border-radius: 4px; box-shadow: 0 15px 40px rgba(0,0,0,0.6);">
                <div style="width: 48px; height: 48px; margin: 0 auto 16px; border-radius: 50%; border: 1px dashed #C9A96E; display: flex; align-items: center; justify-content: center; color: #C9A96E; font-size: 1.2rem;">
                    &amp;
                </div>

                <span style="font-family:'Raleway',sans-serif; font-size:0.6rem; letter-spacing:0.3em; text-transform:uppercase; color:#C9A96E; display:block; margin-bottom:8px;">The Resulting Symphony</span>
                
                <h4 id="layerChordTitle" style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.6rem; font-weight:400; font-style:italic; color:#F8F4EF; margin:0 0 10px; line-height: 1.2;">
                    L'Accord Cr&eacute;pusculaire
                </h4>

                <p id="layerChordDesc" style="font-family:'Raleway',sans-serif; font-size:0.78rem; color:rgba(248,244,239,0.75); line-height:1.6; margin:0 0 20px;">
                    Luminous white peony blooms straight into opulent amber warmth, generating an intimate yet radiant aura with lingering sandalwood sillage.
                </p>

                {{-- Olfactory Synergy Bar --}}
                <div style="background: rgba(0,0,0,0.4); padding: 12px 14px; border-radius: 2px; margin-bottom: 24px; text-align: left;">
                    <div style="display: flex; justify-content: space-between; font-family:'Raleway',sans-serif; font-size:0.65rem; color:#C9A96E; margin-bottom: 6px;">
                        <span>Harmonic Resonance</span>
                        <span id="layerSynergyPercent">98% Synergy</span>
                    </div>
                    <div style="width: 100%; height: 4px; background: rgba(255,255,255,0.1); border-radius: 2px; overflow: hidden;">
                        <div id="layerSynergyBar" style="width: 98%; height: 100%; background: linear-gradient(to right, #7A8C6E, #C9A96E, #C47A45); transition: width 0.5s ease;"></div>
                    </div>
                </div>

                {{-- Duo Order CTA --}}
                <div style="border-top: 1px solid rgba(201,169,110,0.2); padding-top: 20px;">
                    <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 12px;">
                        <span style="font-family:'Raleway',sans-serif; font-size:0.7rem; color:rgba(248,244,239,0.6); text-transform: uppercase; letter-spacing: 0.15em;">Duo Coffret (2x 50ml)</span>
                        <span id="layerDuoPrice" style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.3rem; color:#C9A96E; font-weight: 500;">$350</span>
                    </div>
                    <button type="button" id="addLayeringDuoBtn" class="q-btn q-btn-gold" style="width: 100%; justify-content: center; font-size: 0.7rem; padding: 12px 16px;">
                        <span>Acquire Layering Coffret &rarr;</span>
                    </button>
                    <span style="display: block; margin-top: 8px; font-family:'Raleway',sans-serif; font-size: 0.65rem; color: rgba(248,244,239,0.4);">
                        Includes Atelier Coffret &amp; 15% Courtesy Privilege
                    </span>
                </div>
            </div>

            {{-- Slot 2: Complementary Essence --}}
            <div class="q-layering-card" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(201,169,110,0.2); padding: 32px 24px; text-align: center; backdrop-filter: blur(10px); transition: border-color 0.3s ease;">
                <span style="font-family:'Raleway',sans-serif; font-size:0.65rem; letter-spacing:0.3em; text-transform:uppercase; color:#C9A96E; display:block; margin-bottom:12px;">Harmonizing Top Essence</span>

                {{-- Selector Tabs --}}
                <div class="q-layer-selector" id="layerSelectB" style="display: flex; gap: 8px; justify-content: center; margin-bottom: 24px; flex-wrap: wrap;">
                    <button type="button" class="q-layer-pill" data-slot="B" data-season="spring" style="padding: 6px 14px; font-size: 0.65rem; font-family:'Raleway',sans-serif; text-transform: uppercase; letter-spacing: 0.15em; border: 1px solid rgba(255,255,255,0.15); background: transparent; color: rgba(248,244,239,0.6); cursor: pointer;">Spring</button>
                    <button type="button" class="q-layer-pill" data-slot="B" data-season="summer" style="padding: 6px 14px; font-size: 0.65rem; font-family:'Raleway',sans-serif; text-transform: uppercase; letter-spacing: 0.15em; border: 1px solid rgba(255,255,255,0.15); background: transparent; color: rgba(248,244,239,0.6); cursor: pointer;">Summer</button>
                    <button type="button" class="q-layer-pill active" data-slot="B" data-season="autumn" style="padding: 6px 14px; font-size: 0.65rem; font-family:'Raleway',sans-serif; text-transform: uppercase; letter-spacing: 0.15em; border: 1px solid #C47A45; background: rgba(196,122,69,0.2); color: #F8F4EF; cursor: pointer;">Autumn</button>
                    <button type="button" class="q-layer-pill" data-slot="B" data-season="winter" style="padding: 6px 14px; font-size: 0.65rem; font-family:'Raleway',sans-serif; text-transform: uppercase; letter-spacing: 0.15em; border: 1px solid rgba(255,255,255,0.15); background: transparent; color: rgba(248,244,239,0.6); cursor: pointer;">Winter</button>
                </div>

                {{-- Bottle Visual B --}}
                <div id="layerBottleB" style="height: 180px; display: flex; align-items: center; justify-content: center; margin-bottom: 16px;">
                    <div style="transform: scale(0.65); transform-origin: center center;">
                        <x-perfume-bottle season="autumn" name="Ambre Noir" size="md" />
                    </div>
                </div>

                <h3 id="layerNameB" style="font-family:'Cormorant Garamond',Georgia,serif; font-size:1.5rem; font-weight:400; color:#F8F4EF; margin:0 0 6px;">Ambre Noir</h3>
                <p id="layerSubtitleB" style="font-family:'Raleway',sans-serif; font-size:0.75rem; color:#C9A96E; letter-spacing:0.15em; margin:0 0 12px;">AUTUMN &middot; AMBER RESIN &amp; SANDALWOOD</p>
                <p id="layerDescB" style="font-family:'Raleway',sans-serif; font-size:0.8rem; color:rgba(248,244,239,0.6); line-height:1.6; margin:0;">Rich golden resins, cinnamon spice, and velvety sandalwood creating hypnotic depth.</p>
            </div>

        </div>
    </div>
</section>
