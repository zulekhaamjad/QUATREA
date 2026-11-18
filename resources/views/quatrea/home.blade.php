@extends('layouts.quatrea', ['darkNav' => true])

@section('title', 'QUATRÉA — Haute Parfumerie | Four Seasons, Four Essences, One Art')
@section('description', 'Discover QUATRÉA — where four seasons become four extraordinary fragrances. Haute Parfumerie crafted at the intersection of nature, art and time.')

@section('content')

{{-- ═══════════════════════════════════════════════════════════════════════════
     HERO — Cinematic Full-Screen Opening
═══════════════════════════════════════════════════════════════════════════ --}}
<section class="q-hero" aria-label="Hero">
    <div class="q-hero-bg">
        <div class="q-hero-orb q-hero-orb-1"></div>
        <div class="q-hero-orb q-hero-orb-2"></div>
    </div>

    <div class="q-hero-content">
        <span class="q-hero-eyebrow">Haute Parfumerie &middot; Paris</span>

        <h1 class="q-hero-title" aria-label="QUATRÉA">
            <span class="line"><span>QUATR</span></span>
            <span class="line"><em>ÉA</em></span>
        </h1>

        <p class="q-hero-tagline">Four Seasons &middot; Four Essences &middot; One Art</p>

        <div class="q-hero-cta">
            <a href="{{ route('collection') }}" class="q-btn q-btn-light">
                <span>Discover Collection</span>
            </a>
            <button type="button" class="q-btn q-btn-light q-open-advisor" style="border-color:rgba(201,169,110,0.4);color:#C9A96E;">
                <span>Fragrance Advisor &rarr;</span>
            </button>
        </div>

        {{-- Luxury Quick-Season Navigator --}}
        <div class="q-hero-seasons-bar" aria-label="Explore by Season">
            <span class="q-hero-seasons-label">The Four Flacons &mdash;</span>
            <div class="q-hero-seasons-group">
                <button type="button" class="q-hero-season-pill" data-target=".q-season--spring" aria-label="Jump to Spring: Fleur de l'Aube">
                    <span class="q-pill-dot" style="background:#A3BE95;"></span>
                    <span class="q-pill-num">01</span>
                    <span class="q-pill-name">Spring</span>
                </button>
                <button type="button" class="q-hero-season-pill" data-target=".q-season--summer" aria-label="Jump to Summer: Soléaire">
                    <span class="q-pill-dot" style="background:#FCE38A;"></span>
                    <span class="q-pill-num">02</span>
                    <span class="q-pill-name">Summer</span>
                </button>
                <button type="button" class="q-hero-season-pill" data-target=".q-season--autumn" aria-label="Jump to Autumn: Ambre Noir">
                    <span class="q-pill-dot" style="background:#D97D3E;"></span>
                    <span class="q-pill-num">03</span>
                    <span class="q-pill-name">Autumn</span>
                </button>
                <button type="button" class="q-hero-season-pill" data-target=".q-season--winter" aria-label="Jump to Winter: Nuit de Glace">
                    <span class="q-pill-dot" style="background:#D8E8F2;"></span>
                    <span class="q-pill-num">04</span>
                    <span class="q-pill-name">Winter</span>
                </button>
            </div>
        </div>
    </div>

    <div class="q-hero-scroll" aria-hidden="true">
        <div class="q-hero-scroll-line"></div>
        <span>Scroll</span>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     BRAND INTRO
═══════════════════════════════════════════════════════════════════════════ --}}
<section class="q-section" aria-labelledby="brand-intro-heading">
    <div class="q-brand-intro" style="text-align:center;max-width:800px;margin:0 auto;">
        <span class="q-eyebrow q-reveal">The Art of Fragrance</span>
        <h2 class="q-heading q-heading-xl q-reveal q-reveal-delay-1" id="brand-intro-heading" style="margin-bottom:32px;">
            Where Seasons<br><em>Become Perfume</em>
        </h2>
        <div class="q-divider q-reveal q-reveal-delay-2" style="margin:0 auto 32px;"></div>
        <p class="q-body q-reveal q-reveal-delay-3" style="max-width:600px;margin:0 auto 48px;">
            QUATRÉA was born from a singular obsession: to capture the ineffable beauty of each season in a bottle.
            Four fragrances. Four moods. Four universes. Each crafted by master perfumers in Grasse using the
            rarest ingredients on earth.
        </p>
        <a href="{{ route('story') }}" class="q-btn q-btn-dark q-reveal q-reveal-delay-4">
            <span>Discover Our Atelier</span>
        </a>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     CINEMATIC SEASONS SCROLLYTELLING
═══════════════════════════════════════════════════════════════════════════ --}}
<div class="q-seasons" aria-label="The Four Seasons Collection">

    {{-- SPRING --}}
    <article class="q-season q-season--spring" aria-label="Spring Fragrance — Fleur de l'Aube">
        <div class="q-season-bg">
            <div class="q-season-orb q-season-orb-1"></div>
            <div class="q-season-orb q-season-orb-2"></div>
        </div>
        <div class="q-particles" aria-hidden="true"></div>

        <div class="q-season-inner">
            <div class="q-season-text">
                <span class="q-season-label">I &mdash; Spring</span>
                <h2 class="q-season-name">Fleur<br>de l'Aube</h2>
                <p class="q-season-subtitle">The bloom of dawn</p>
                <p class="q-season-desc">
                    As the first light of April touches the garden, peony petals unfurl one by one.
                    A fragrance that captures the tender vulnerability of spring mornings &mdash;
                    bergamot-kissed air, jasmine rising through morning mist, and the
                    lingering warmth of white musk on dewy skin.
                </p>
                <div class="q-season-notes" aria-label="Fragrance notes">
                    <span class="q-season-note">Peony</span>
                    <span class="q-season-note">Bergamot</span>
                    <span class="q-season-note">Jasmine</span>
                    <span class="q-season-note">White Musk</span>
                </div>
                <div style="display:flex;gap:14px;flex-wrap:wrap;align-items:center;">
                    <a href="{{ route('product', 'fleur-de-laube') }}" class="q-btn q-btn-light">
                        <span>Explore Dossier</span>
                    </a>
                    <button type="button" class="q-btn q-btn-light q-quick-view-btn" data-slug="fleur-de-laube" style="border-color:rgba(255,255,255,0.3);">
                        <span>Quick View</span>
                    </button>
                    <button type="button" class="q-btn q-btn-gold" onclick="window.QuatreaCart.add({id:'fleur-de-laube',name:'Fleur de l\'Aube',season:'spring',size:'50ml',price:195,color:'#7A8C6E'})">
                        <span>Add to Bag &middot; $195</span>
                    </button>
                </div>
            </div>

            <div class="q-bottle q-bottle--spring">
                <div class="q-bottle-visual" role="img" aria-label="Fleur de l'Aube perfume bottle">
                    <x-perfume-bottle season="spring" name="Fleur de l'Aube" size="xl" />
                </div>
            </div>
        </div>
    </article>

    {{-- SUMMER --}}
    <article class="q-season q-season--summer" aria-label="Summer Fragrance — Soléaire">
        <div class="q-season-bg">
            <div class="q-season-orb q-season-orb-1"></div>
            <div class="q-season-orb q-season-orb-2"></div>
        </div>
        <div class="q-particles" aria-hidden="true"></div>

        <div class="q-season-inner reverse">
            <div class="q-season-text">
                <span class="q-season-label">II &mdash; Summer</span>
                <h2 class="q-season-name">Soléaire</h2>
                <p class="q-season-subtitle">Golden Mediterranean light</p>
                <p class="q-season-desc">
                    The Mediterranean at its zenith. Mandarin sparkling like sunlight on water,
                    neroli opening like orange blossoms on a warm afternoon. Vanilla and orange
                    blossom weave together in a golden trail that lingers like a perfect summer memory,
                    long after sunset.
                </p>
                <div class="q-season-notes" aria-label="Fragrance notes">
                    <span class="q-season-note">Mandarin</span>
                    <span class="q-season-note">Neroli</span>
                    <span class="q-season-note">Orange Blossom</span>
                    <span class="q-season-note">Vanilla</span>
                </div>
                <div style="display:flex;gap:14px;flex-wrap:wrap;align-items:center;">
                    <a href="{{ route('product', 'solere') }}" class="q-btn q-btn-light">
                        <span>Explore Dossier</span>
                    </a>
                    <button type="button" class="q-btn q-btn-light q-quick-view-btn" data-slug="solere" style="border-color:rgba(255,255,255,0.3);">
                        <span>Quick View</span>
                    </button>
                    <button type="button" class="q-btn q-btn-gold" onclick="window.QuatreaCart.add({id:'solere',name:'Soléaire',season:'summer',size:'50ml',price:215,color:'#C9A44B'})">
                        <span>Add to Bag &middot; $215</span>
                    </button>
                </div>
            </div>

            <div class="q-bottle q-bottle--summer">
                <div class="q-bottle-visual" role="img" aria-label="Soléaire perfume bottle">
                    <x-perfume-bottle season="summer" name="Soléaire" size="xl" />
                </div>
            </div>
        </div>
    </article>

    {{-- AUTUMN --}}
    <article class="q-season q-season--autumn" aria-label="Autumn Fragrance — Ambre Noir">
        <div class="q-season-bg">
            <div class="q-season-orb q-season-orb-1"></div>
            <div class="q-season-orb q-season-orb-2"></div>
        </div>
        <div class="q-particles" aria-hidden="true"></div>

        <div class="q-season-inner">
            <div class="q-season-text">
                <span class="q-season-label">III &mdash; Autumn</span>
                <h2 class="q-season-name">Ambre<br>Noir</h2>
                <p class="q-season-subtitle">The warmth of fallen leaves</p>
                <p class="q-season-desc">
                    October forests shrouded in amber light. The rich, resinous embrace of amber
                    unfolds around cedarwood and sandalwood &mdash; grounding, ancient, profound.
                    A whisper of cinnamon and deep patchouli transforms this into something
                    mysterious, intimate, impossibly warm.
                </p>
                <div class="q-season-notes" aria-label="Fragrance notes">
                    <span class="q-season-note">Amber</span>
                    <span class="q-season-note">Sandalwood</span>
                    <span class="q-season-note">Cinnamon</span>
                    <span class="q-season-note">Patchouli</span>
                </div>
                <div style="display:flex;gap:14px;flex-wrap:wrap;align-items:center;">
                    <a href="{{ route('product', 'ambre-noir') }}" class="q-btn q-btn-light">
                        <span>Explore Dossier</span>
                    </a>
                    <button type="button" class="q-btn q-btn-light q-quick-view-btn" data-slug="ambre-noir" style="border-color:rgba(255,255,255,0.3);">
                        <span>Quick View</span>
                    </button>
                    <button type="button" class="q-btn q-btn-gold" onclick="window.QuatreaCart.add({id:'ambre-noir',name:'Ambre Noir',season:'autumn',size:'50ml',price:225,color:'#B5651D'})">
                        <span>Add to Bag &middot; $225</span>
                    </button>
                </div>
            </div>

            <div class="q-bottle q-bottle--autumn">
                <div class="q-bottle-visual" role="img" aria-label="Ambre Noir perfume bottle">
                    <x-perfume-bottle season="autumn" name="Ambre Noir" size="xl" />
                </div>
            </div>
        </div>
    </article>

    {{-- WINTER --}}
    <article class="q-season q-season--winter" aria-label="Winter Fragrance — Nuit de Glace">
        <div class="q-season-bg">
            <div class="q-season-orb q-season-orb-1"></div>
            <div class="q-season-orb q-season-orb-2"></div>
        </div>
        <div class="q-particles" aria-hidden="true"></div>

        <div class="q-season-inner reverse">
            <div class="q-season-text">
                <span class="q-season-label">IV &mdash; Winter</span>
                <h2 class="q-season-name">Nuit<br>de Glace</h2>
                <p class="q-season-subtitle">A frosted winter night</p>
                <p class="q-season-desc">
                    The world under snow is silence made beautiful. Iris, cold and crystalline,
                    meets the quiet strength of cedarwood. Cardamom adds a warmth that defies
                    the cold &mdash; an intimate, paradoxical perfume. White musk fades like
                    breath disappearing into frozen air.
                </p>
                <div class="q-season-notes" aria-label="Fragrance notes">
                    <span class="q-season-note">Iris</span>
                    <span class="q-season-note">Cedarwood</span>
                    <span class="q-season-note">White Musk</span>
                    <span class="q-season-note">Cardamom</span>
                </div>
                <div style="display:flex;gap:14px;flex-wrap:wrap;align-items:center;">
                    <a href="{{ route('product', 'nuit-de-glace') }}" class="q-btn q-btn-light">
                        <span>Explore Dossier</span>
                    </a>
                    <button type="button" class="q-btn q-btn-light q-quick-view-btn" data-slug="nuit-de-glace" style="border-color:rgba(255,255,255,0.3);">
                        <span>Quick View</span>
                    </button>
                    <button type="button" class="q-btn q-btn-gold" onclick="window.QuatreaCart.add({id:'nuit-de-glace',name:'Nuit de Glace',season:'winter',size:'50ml',price:235,color:'#6A8C9A'})">
                        <span>Add to Bag &middot; $235</span>
                    </button>
                </div>
            </div>

            <div class="q-bottle q-bottle--winter">
                <div class="q-bottle-visual" role="img" aria-label="Nuit de Glace perfume bottle">
                    <x-perfume-bottle season="winter" name="Nuit de Glace" size="xl" />
                </div>
            </div>
        </div>
    </article>

</div>

{{-- ═══════════════════════════════════════════════════════════════════════════
     HIGH-LEVEL SIGNATURE: L'ART DU SILLAGE (FRAGRANCE LAYERING ATELIER)
═══════════════════════════════════════════════════════════════════════════ --}}
<x-fragrance-layering />

{{-- ═══════════════════════════════════════════════════════════════════════════
     PHILOSOPHY SECTION
═══════════════════════════════════════════════════════════════════════════ --}}
<section class="q-philosophy" aria-labelledby="philosophy-heading">
    <div class="q-philosophy-visual">
        <div style="position:relative;text-align:center;padding:80px 40px;">
            <div style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(5rem,12vw,10rem);font-weight:300;color:rgba(248,244,239,0.04);line-height:1;letter-spacing:0.1em;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);" aria-hidden="true">ART</div>
            <div style="width:1px;height:200px;background:linear-gradient(to bottom, transparent, rgba(201,169,110,0.5), transparent);margin:0 auto 40px;" aria-hidden="true"></div>
            <blockquote style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(1.2rem,2.5vw,1.8rem);font-weight:300;font-style:italic;color:rgba(248,244,239,0.7);letter-spacing:0.03em;max-width:400px;line-height:1.5;">
                "Perfume is the art that makes memory speak."
            </blockquote>
            <div style="margin-top:24px;font-family:'Raleway',sans-serif;font-size:0.65rem;letter-spacing:0.4em;color:rgba(248,244,239,0.3);text-transform:uppercase;">&mdash; Maison QUATRÉA</div>
        </div>
    </div>

    <div class="q-philosophy-text" style="background:#1A1A1A;">
        <span class="q-eyebrow q-reveal" style="color:rgba(201,169,110,0.6);">Our Philosophy</span>
        <h2 class="q-heading q-heading-lg q-reveal q-reveal-delay-1" id="philosophy-heading" style="color:#F8F4EF;margin-bottom:32px;">
            Crafted at the<br>Intersection of<br><em>Nature &amp; Time</em>
        </h2>
        <div class="q-divider q-reveal q-reveal-delay-2" style="background:rgba(201,169,110,0.4);"></div>
        <div style="display:flex;flex-direction:column;gap:24px;margin-top:32px;">
            <p class="q-body q-reveal q-reveal-delay-2" style="color:rgba(248,244,239,0.6);">
                Every QUATRÉA fragrance begins with a season &mdash; not as a theme, but as a living
                experience. Our master perfumers spend entire seasons in the field: in Grasse
                gardens during spring bloom, on Mediterranean shores in midsummer heat.
            </p>
            <p class="q-body q-reveal q-reveal-delay-3" style="color:rgba(248,244,239,0.6);">
                The result is a collection that doesn't merely reference the seasons &mdash;
                it embodies them. When you wear QUATRÉA, you wear time itself.
            </p>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:32px;margin-top:48px;">
            @foreach([['100+', 'Rare Ingredients'], ['12', 'Master Perfumers'], ['1927', 'Founded in Paris'], ['4', 'Seasonal Essences']] as $stat)
            <div class="q-reveal" style="transition-delay:{{ $loop->index * 0.1 }}s">
                <span style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2.5rem;font-weight:300;color:#C9A96E;display:block;line-height:1;">{{ $stat[0] }}</span>
                <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;letter-spacing:0.25em;text-transform:uppercase;color:rgba(248,244,239,0.4);">{{ $stat[1] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════════
     FEATURED COLLECTION PREVIEW
═══════════════════════════════════════════════════════════════════════════ --}}
<section class="q-section" aria-labelledby="collection-preview-heading">
    <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:60px;flex-wrap:wrap;gap:24px;">
        <div>
            <span class="q-eyebrow q-reveal">The Collection</span>
            <h2 class="q-heading q-heading-lg q-reveal q-reveal-delay-1" id="collection-preview-heading">
                All Four<br><em>Seasons</em>
            </h2>
        </div>
        <a href="{{ route('collection') }}" class="q-btn q-btn-dark q-reveal q-reveal-delay-2">
            <span>View All Fragrances</span>
        </a>
    </div>

    <div class="q-collection-grid">
        @php
        $products = [
            ['slug'=>'fleur-de-laube','season'=>'spring','label'=>'Spring','name'=>"Fleur de l'Aube",'price'=>'$195'],
            ['slug'=>'solere','season'=>'summer','label'=>'Summer','name'=>'Soléaire','price'=>'$215'],
            ['slug'=>'ambre-noir','season'=>'autumn','label'=>'Autumn','name'=>'Ambre Noir','price'=>'$225'],
            ['slug'=>'nuit-de-glace','season'=>'winter','label'=>'Winter','name'=>'Nuit de Glace','price'=>'$235'],
        ];
        @endphp

        @foreach($products as $p)
        <article class="q-product-card q-product-card--{{ $p['season'] }} q-reveal" style="transition-delay:{{ $loop->index * 0.1 }}s;">
            <div class="q-product-card-visual" style="padding: 40px 20px; position: relative; overflow: hidden;">
                <div class="q-product-card-bg" aria-hidden="true"></div>
                <div class="q-product-card-num" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }}</div>
                <div class="q-product-card-bottle" role="img" aria-label="{{ $p['name'] }} bottle" style="display:flex;justify-content:center;align-items:center;position:relative;z-index:2;">
                    <x-perfume-bottle :season="$p['season']" :name="$p['name']" size="md" />
                </div>

                <div class="q-product-card-hover" aria-hidden="true">
                    <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;letter-spacing:0.3em;text-transform:uppercase;color:rgba(248,244,239,0.7);">Explore</span>
                    <span style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.3rem;font-style:italic;color:#F8F4EF;">{{ $p['name'] }}</span>
                    <div style="display:flex;gap:8px;pointer-events:auto;margin-top:12px;">
                        <a href="{{ route('product', $p['slug']) }}" class="q-btn q-btn-light" style="padding:10px 18px;font-size:0.65rem;">
                            <span>Dossier</span>
                        </a>
                        <button type="button" class="q-btn q-btn-gold q-quick-view-btn" data-slug="{{ $p['slug'] }}" style="padding:10px 18px;font-size:0.65rem;">
                            <span>Quick View</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="q-product-card-info">
                <span class="q-product-card-season">{{ $p['label'] }}</span>
                <a href="{{ route('product', $p['slug']) }}" style="text-decoration:none;color:inherit;">
                    <span class="q-product-card-name">{{ $p['name'] }}</span>
                </a>
                <span class="q-product-card-price">From {{ $p['price'] }}</span>
            </div>
        </article>
        @endforeach
    </div>
</section>

@endsection
