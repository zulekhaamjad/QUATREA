@extends('layouts.quatrea', ['darkNav' => true])

@section('title', 'Collection — QUATRÉA Haute Parfumerie')
@section('description', 'Explore the QUATRÉA collection. Four seasonal fragrances: Fleur de l\'Aube, Soléaire, Ambre Noir, and Nuit de Glace.')

@section('content')

{{-- Page Hero --}}
<section style="padding-top:var(--nav-height);background:#0D0D0D;padding-bottom:0;position:relative;overflow:hidden;" aria-labelledby="collection-title">
    <div style="position:absolute;inset:0;background:radial-gradient(ellipse 50% 70% at 70% 50%, rgba(201,169,110,0.07) 0%, transparent 70%);" aria-hidden="true"></div>
    <div style="padding:80px clamp(24px,5vw,80px) 100px;position:relative;z-index:1;">
        <div style="max-width:1400px;margin:0 auto;">
            <span class="q-eyebrow" style="color:rgba(201,169,110,0.7);">Haute Parfumerie &middot; Paris</span>
            <h1 class="q-heading q-heading-xl" id="collection-title" style="color:#F8F4EF;margin-bottom:24px;">
                The Four<br><em>Seasons Collection</em>
            </h1>
            <p class="q-body" style="color:rgba(248,244,239,0.5);max-width:500px;">
                Each fragrance is a world unto itself &mdash; an entire season distilled into glass and liquid art.
            </p>
        </div>
    </div>
</section>

{{-- Filter Bar --}}
<div style="background:#F8F4EF;border-bottom:1px solid rgba(26,26,26,0.06);padding:0 clamp(24px,5vw,80px);" role="navigation" aria-label="Filter collection">
    <div style="max-width:1400px;margin:0 auto;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:20px;padding:20px 0;">
        <div style="display:flex;gap:36px;overflow-x:auto;">
            @foreach([['all','All Seasons'],['spring','Spring'],['summer','Summer'],['autumn','Autumn'],['winter','Winter']] as $filter)
            <button
                class="q-collection-filter {{ $loop->first ? 'active' : '' }}"
                data-filter="{{ $filter[0] }}"
                aria-pressed="{{ $loop->first ? 'true' : 'false' }}"
                style="font-family:'Raleway',sans-serif;font-size:0.65rem;font-weight:500;letter-spacing:0.3em;text-transform:uppercase;background:none;border:none;cursor:pointer;color:{{ $loop->first ? '#1A1A1A' : 'rgba(26,26,26,0.4)' }};padding:0;white-space:nowrap;transition:color 0.3s;border-bottom:{{ $loop->first ? '1px solid #C9A96E' : '1px solid transparent' }};padding-bottom:4px;"
            >
                {{ $filter[1] }}
            </button>
            @endforeach
        </div>

        <button type="button" class="q-open-advisor" style="background:none;border:none;cursor:pointer;font-family:'Raleway',sans-serif;font-size:0.65rem;font-weight:600;letter-spacing:0.25em;text-transform:uppercase;color:#C9A96E;display:flex;align-items:center;gap:6px;">
            <span>Not sure? Take diagnosis &rarr;</span>
        </button>
    </div>
</div>

{{-- Products Grid --}}
<section class="q-section" style="background:#F8F4EF;" aria-label="Fragrance collection">
    <div style="max-width:1400px;margin:0 auto;">
        @php
        $products = [
            [
                'slug' => 'fleur-de-laube',
                'season' => 'spring',
                'label' => 'Spring',
                'name' => "Fleur de l'Aube",
                'tagline' => 'The bloom of dawn',
                'price50' => 195,
                'price100' => 320,
                'price200' => 460,
                'notes' => ['Peony', 'Bergamot', 'Jasmine', 'White Musk'],
                'desc' => 'A fragrance of tender beginnings &mdash; the morning air after spring rain, peony petals unfolding in first light.',
            ],
            [
                'slug' => 'solere',
                'season' => 'summer',
                'label' => 'Summer',
                'name' => 'Soléaire',
                'tagline' => 'Golden Mediterranean light',
                'price50' => 215,
                'price100' => 350,
                'price200' => 490,
                'notes' => ['Mandarin', 'Neroli', 'Orange Blossom', 'Vanilla'],
                'desc' => 'Mediterranean sunlight bottled in champagne gold &mdash; warm, radiant, impossibly luminous.',
            ],
            [
                'slug' => 'ambre-noir',
                'season' => 'autumn',
                'label' => 'Autumn',
                'name' => 'Ambre Noir',
                'tagline' => 'The warmth of fallen leaves',
                'price50' => 225,
                'price100' => 370,
                'price200' => 515,
                'notes' => ['Amber', 'Sandalwood', 'Cinnamon', 'Patchouli'],
                'desc' => 'An autumn forest at dusk &mdash; rich amber, warm sandalwood, the intoxicating spice of fallen leaves.',
            ],
            [
                'slug' => 'nuit-de-glace',
                'season' => 'winter',
                'label' => 'Winter',
                'name' => 'Nuit de Glace',
                'tagline' => 'A frosted winter night',
                'price50' => 235,
                'price100' => 385,
                'price200' => 530,
                'notes' => ['Iris', 'Cedarwood', 'White Musk', 'Cardamom'],
                'desc' => 'Crystalline and serene &mdash; iris blooming through frost, cedarwood anchoring a cold, beautiful night.',
            ],
        ];
        @endphp

        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:40px;">
            @foreach($products as $p)
            <article
                class="q-reveal q-collection-item"
                data-season="{{ $p['season'] }}"
                style="transition-delay:{{ $loop->index * 0.1 }}s;"
                aria-label="{{ $p['name'] }} &mdash; {{ $p['label'] }} fragrance"
            >
                {{-- Product Visual --}}
                <div style="position:relative;aspect-ratio:3/4;overflow:hidden;margin-bottom:24px;">
                    <a href="{{ route('product', $p['slug']) }}" style="display:block;width:100%;height:100%;" aria-label="View {{ $p['name'] }} details">
                        <div class="q-product-card-bg q-product-card--{{ $p['season'] }} q-product-card-bg" style="position:absolute;inset:0;transition:transform 0.9s cubic-bezier(0.25,0.46,0.45,0.94);" aria-hidden="true"></div>

                        {{-- Bottle --}}
                        <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;">
                            <x-perfume-bottle :season="$p['season']" :name="$p['name']" size="md" />
                        </div>

                        {{-- Season Badge --}}
                        <div style="position:absolute;top:20px;left:20px;padding:6px 14px;border:1px solid rgba(255,255,255,0.3);backdrop-filter:blur(10px);z-index:2;">
                            <span style="font-family:'Raleway',sans-serif;font-size:0.6rem;letter-spacing:0.3em;text-transform:uppercase;color:rgba(255,255,255,0.8);">{{ $p['label'] }}</span>
                        </div>
                    </a>

                    {{-- Hover Overlay with Quick View --}}
                    <div style="position:absolute;inset:0;background:rgba(13,13,13,0.88);display:flex;flex-direction:column;align-items:center;justify-content:center;gap:16px;opacity:0;transition:opacity 0.3s;padding:24px;text-align:center;" class="q-card-overlay" aria-hidden="true">
                        <span style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.3rem;font-style:italic;color:#F8F4EF;">{{ $p['tagline'] }}</span>
                        
                        <div style="display:flex;gap:10px;margin-top:10px;pointer-events:auto;">
                            <button 
                                type="button" 
                                class="q-btn q-btn-light q-quick-view-btn" 
                                data-slug="{{ $p['slug'] }}"
                                style="padding:10px 20px;font-size:0.65rem;"
                            >
                                <span>Quick View</span>
                            </button>
                            <a href="{{ route('product', $p['slug']) }}" class="q-btn q-btn-gold" style="padding:10px 20px;font-size:0.65rem;">
                                <span>Dossier</span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Product Info --}}
                <div>
                    <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:12px;">
                        <div>
                            <span class="q-product-card-season q-product-card--{{ $p['season'] }}" style="font-family:'Raleway',sans-serif;font-size:0.6rem;font-weight:500;letter-spacing:0.4em;text-transform:uppercase;display:block;margin-bottom:6px;">
                                {{ $p['label'] }}
                            </span>
                            <a href="{{ route('product', $p['slug']) }}" style="text-decoration:none;color:inherit;">
                                <h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.5rem;font-weight:400;color:#1A1A1A;margin:0;">
                                    {{ $p['name'] }}
                                </h3>
                            </a>
                        </div>
                        <span style="font-family:'Raleway',sans-serif;font-size:0.85rem;color:rgba(26,26,26,0.7);font-weight:600;">
                            ${{ $p['price50'] }}
                        </span>
                    </div>

                    <p style="font-family:'Raleway',sans-serif;font-size:0.78rem;color:rgba(26,26,26,0.55);line-height:1.6;margin-bottom:18px;">
                        {{ $p['desc'] }}
                    </p>

                    <div style="display:flex;gap:6px;flex-wrap:wrap;margin-bottom:20px;">
                        @foreach($p['notes'] as $note)
                        <span style="font-family:'Raleway',sans-serif;font-size:0.6rem;letter-spacing:0.15em;text-transform:uppercase;color:rgba(26,26,26,0.6);background:rgba(26,26,26,0.04);padding:4px 10px;border-radius:2px;">
                            {{ $note }}
                        </span>
                        @endforeach
                    </div>

                    <div style="display:flex;gap:10px;">
                        <a href="{{ route('product', $p['slug']) }}" class="q-btn q-btn-dark" style="flex:1;justify-content:center;font-size:0.65rem;padding:12px 14px;">
                            <span>Explore Fragrance</span>
                        </a>
                        <button
                            type="button"
                            class="q-btn q-btn-gold"
                            onclick="window.QuatreaCart.add({id:'{{ $p['slug'] }}',name:'{{ $p['name'] }}',season:'{{ $p['season'] }}',size:'50ml',price:{{ $p['price50'] }}})"
                            aria-label="Add {{ $p['name'] }} to shopping bag"
                            style="padding:12px 18px;"
                            title="Add to Shopping Bag"
                        >
                            <span>+</span>
                        </button>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

{{-- Fragrance Layering Atelier --}}
<x-fragrance-layering />

{{-- Editorial Strip --}}
<section style="background:#1A1A1A;padding:80px clamp(24px,5vw,80px);display:flex;align-items:center;justify-content:center;text-align:center;">
    <div>
        <span class="q-eyebrow q-reveal" style="color:rgba(201,169,110,0.6);">Discover More</span>
        <h2 class="q-heading q-heading-md q-reveal q-reveal-delay-1" style="color:#F8F4EF;margin-bottom:24px;">
            The Chemistry of <em>High Extraction</em>
        </h2>
        <p class="q-body q-reveal q-reveal-delay-2" style="color:rgba(248,244,239,0.5);max-width:540px;margin:0 auto 36px;">
            Learn how our Grasse atelier distills each rare botanical note, honoring centuries of traditional Parisian perfumery.
        </p>
        <div style="display:flex;gap:16px;justify-content:center;flex-wrap:wrap;">
            <a href="{{ route('notes') }}" class="q-btn q-btn-light q-reveal q-reveal-delay-3">
                <span>Explore Olfactory Notes</span>
            </a>
            <a href="{{ route('story') }}" class="q-btn q-btn-dark q-reveal q-reveal-delay-3" style="border-color:rgba(255,255,255,0.2);">
                <span>Read Our Heritage</span>
            </a>
        </div>
    </div>
</section>

@endsection
