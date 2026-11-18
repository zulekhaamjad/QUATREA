@extends('layouts.quatrea')

@php
$products = [
    'fleur-de-laube' => [
        'id' => 'fleur-de-laube',
        'season' => 'spring',
        'label' => 'Spring',
        'name' => "Fleur de l'Aube",
        'tagline' => 'The bloom of dawn',
        'price50' => 195,
        'price100' => 320,
        'price200' => 460,
        'desc' => "Fleur de l'Aube captures the tender moment when spring finally arrives &mdash; that luminous morning when the garden awakens. The air is green and cool, then bergamot sparks like sun through leaves. Peony opens with vulnerable softness. Jasmine rises through the warmth of late morning. And white musk lingers on the skin like dew that refuses to evaporate, holding the entire dream of spring in a single breath.",
        'story' => "Inspired by the Perfumer's private garden in Grasse, where peonies bloom at dawn each April. The creation process began with over 300 raw materials tested against April morning air before the final 23 ingredients were selected.",
        'notes' => [
            'top' => ['Bergamot', 'Green Leaves', 'Pink Pepper'],
            'heart' => ['Peony', 'Jasmine Absolute', 'Rose Water'],
            'base' => ['White Musk', 'Blonde Woods', 'Ambrette Seed'],
        ],
        'ingredients' => 'Alcohol denat., Aqua, Parfum, Linalool, Citronellol, Geraniol, Limonene, Benzyl Alcohol, Citral, Eugenol, Farnesol.',
        'next' => 'solere',
        'next_name' => 'Soléaire',
    ],
    'solere' => [
        'id' => 'solere',
        'season' => 'summer',
        'label' => 'Summer',
        'name' => 'Soléaire',
        'tagline' => 'Golden Mediterranean light',
        'price50' => 215,
        'price100' => 350,
        'price200' => 490,
        'desc' => "Soléaire is Mediterranean summer at its most golden &mdash; that specific quality of August light on the sea, so saturated it seems to transform everything it touches. Mandarin explodes with zest and vitality. Neroli drifts in from orange groves in the warm afternoon breeze. Orange blossom weaves through, honeyed and heady. The base of vanilla and warm musk is like warm skin after a day on the beach &mdash; luminous, sun-kissed, unforgettable.",
        'story' => "Created after three summers spent in Capri, Positano, and the Côte d'Azur. Each location contributed a facet: the sharp citrus of Campania, the floral richness of Provence, the golden warmth of the Riviera.",
        'notes' => [
            'top' => ['Mandarin', 'Lemon Zest', 'Petitgrain'],
            'heart' => ['Neroli', 'Orange Blossom Absolute', 'Ylang-Ylang'],
            'base' => ['Vanilla Bourbon', 'White Musk', 'Sandalwood'],
        ],
        'ingredients' => 'Alcohol denat., Aqua, Parfum, Limonene, Linalool, Citral, Citronellol, Geraniol, Benzyl Alcohol, Coumarin, Farnesol.',
        'next' => 'ambre-noir',
        'next_name' => 'Ambre Noir',
    ],
    'ambre-noir' => [
        'id' => 'ambre-noir',
        'season' => 'autumn',
        'label' => 'Autumn',
        'name' => 'Ambre Noir',
        'tagline' => 'The warmth of fallen leaves',
        'price50' => 225,
        'price100' => 370,
        'price200' => 515,
        'desc' => "Ambre Noir is the most intimate of the four seasons &mdash; an autumn evening in a forest that smells of old leaves, ancient resins, and coming rain. The amber opens like a warm embrace, complex and faceted. Sandalwood grounds everything in creamy, meditative depth. Cinnamon adds a sharp, spiced vitality that never overwhelms. Patchouli, earthy and dark, anchors the entire composition in something deeply, beautifully human.",
        'story' => "Composed over a single autumn season in the forests of Fontainebleau. The perfumer walked the forest daily, collecting impressions. Each ingredient was chosen to reflect a specific moment of October: the first frost, midday warmth, the sudden dark of 5pm.",
        'notes' => [
            'top' => ['Cardamom', 'Black Pepper', 'Pink Pepper'],
            'heart' => ['Amber Resin', 'Cinnamon', 'Clove Bud'],
            'base' => ['Sandalwood', 'Patchouli Heart', 'Labdanum'],
        ],
        'ingredients' => 'Alcohol denat., Aqua, Parfum, Linalool, Eugenol, Cinnamal, Geraniol, Benzyl Cinnamate, Isoeugenol, Cinnamyl Alcohol, Benzyl Benzoate, Farnesol.',
        'next' => 'nuit-de-glace',
        'next_name' => 'Nuit de Glace',
    ],
    'nuit-de-glace' => [
        'id' => 'nuit-de-glace',
        'season' => 'winter',
        'label' => 'Winter',
        'name' => 'Nuit de Glace',
        'tagline' => 'A frosted winter night',
        'price50' => 235,
        'price100' => 385,
        'price200' => 530,
        'desc' => "Nuit de Glace is silence made visible &mdash; the rare, interior quiet of a world under its first deep snow. Iris opens crystalline and cold, like frosted glass. Cedarwood brings quiet, structural strength. Cardamom offers a paradoxical warmth &mdash; spiced comfort against the cold. White musk fades like breath in winter air, leaving behind only the memory of warmth.",
        'story' => "The winter fragrance was the last to be completed. It took five years and over 50 iterations to achieve the precise balance between cold and warmth &mdash; between the ice of winter and the intimate warmth of shelter within it.",
        'notes' => [
            'top' => ['Cardamom', 'Violet Leaf', 'Ozonic Accord'],
            'heart' => ['Iris Root', 'Orris Butter', 'Violet'],
            'base' => ['Cedarwood', 'White Musk', 'Cashmeran'],
        ],
        'ingredients' => 'Alcohol denat., Aqua, Parfum, Linalool, Citronellol, Geraniol, Benzyl Alcohol, Alpha-Isomethyl Ionone, Lilial, Lyral, Citral, Coumarin, Farnesol.',
        'next' => 'fleur-de-laube',
        'next_name' => "Fleur de l'Aube",
    ],
];

$product = $products[$slug] ?? $products['fleur-de-laube'];
@endphp

@section('title', $product['name'] . ' — QUATRÉA Haute Parfumerie')
@section('description', $product['tagline'] . ' — ' . substr($product['desc'], 0, 155) . '...')

@section('content')

{{-- Product Hero --}}
<div class="q-product-hero" style="background:{{ $product['season'] === 'spring' ? 'linear-gradient(160deg,#E8F0E0,#C4D8B8)' : ($product['season'] === 'summer' ? 'linear-gradient(160deg,#FBF0CC,#E8D580)' : ($product['season'] === 'autumn' ? 'linear-gradient(160deg,#E8C4A0,#C47A45)' : 'linear-gradient(160deg,#D8E8F0,#A8C0CC)')) }};">

    {{-- Visual with 3D Tilt Experience --}}
    <div class="q-product-visual" id="bottle3DContainer" style="position:relative;perspective:1000px;cursor:grab;" role="img" aria-label="{{ $product['name'] }} perfume bottle presentation">
        <div style="position:absolute;inset:0;background:rgba(255,255,255,0.1);backdrop-filter:blur(0);" aria-hidden="true"></div>

        {{-- Background number --}}
        <div style="position:absolute;font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(10rem,20vw,18rem);font-weight:400;color:rgba(255,255,255,0.28);line-height:1;pointer-events:none;user-select:none;text-shadow:0 10px 30px rgba(0,0,0,0.1);" aria-hidden="true">
            {{ $product['season'] === 'spring' ? '01' : ($product['season'] === 'summer' ? '02' : ($product['season'] === 'autumn' ? '03' : '04')) }}
        </div>

        <div id="bottle3DTarget" style="position:relative;z-index:2;display:flex;align-items:center;justify-content:center;width:100%;transform-style:preserve-3d;will-change:transform;">
            <x-perfume-bottle :season="$product['season']" :name="$product['name']" size="xl" class="q-product-bottle-large" />
        </div>

        {{-- Shadow/glow --}}
        <div style="position:absolute;bottom:40px;left:50%;transform:translateX(-50%);width:200px;height:60px;background:rgba(0,0,0,0.15);filter:blur(30px);border-radius:50%;" aria-hidden="true"></div>
    </div>

    {{-- Info --}}
    <div class="q-product-info" style="background:#F8F4EF;">
        <span class="q-eyebrow">{{ $product['label'] }}</span>
        <h1 class="q-heading q-heading-xl" style="margin-bottom:8px;">{{ $product['name'] }}</h1>
        <p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.3rem;font-style:italic;color:rgba(26,26,26,0.5);margin-bottom:40px;">{{ $product['tagline'] }}</p>

        <div class="q-divider"></div>

        <p class="q-body" style="margin:32px 0 40px;max-width:480px;">{{ $product['desc'] }}</p>

        {{-- Price --}}
        <div class="q-product-price" id="displayPrice" style="margin-bottom:24px;">
            ${{ number_format($product['price50']) }} <span style="font-family:'Raleway',sans-serif;font-size:0.75rem;font-weight:400;color:rgba(26,26,26,0.4);letter-spacing:0.1em;">/ 50ml</span>
        </div>

        {{-- Size Selector --}}
        <div>
            <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;font-weight:600;letter-spacing:0.3em;text-transform:uppercase;color:rgba(26,26,26,0.4);display:block;margin-bottom:12px;">Select Size</span>
            <div class="q-size-selector" role="group" aria-label="Select perfume size">
                <button class="q-size-btn active" data-size="50ml" data-price="{{ $product['price50'] }}" aria-pressed="true">50ml</button>
                <button class="q-size-btn" data-size="100ml" data-price="{{ $product['price100'] }}" aria-pressed="false">100ml</button>
                <button class="q-size-btn" data-size="200ml" data-price="{{ $product['price200'] }}" aria-pressed="false">200ml</button>
            </div>
        </div>

        {{-- Quantity --}}
        <div style="margin-top:24px;">
            <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;font-weight:600;letter-spacing:0.3em;text-transform:uppercase;color:rgba(26,26,26,0.4);display:block;margin-bottom:12px;">Quantity</span>
            <div class="q-qty-selector" role="group" aria-label="Select quantity">
                <button class="q-qty-btn" id="qtyMinus" aria-label="Decrease quantity">&minus;</button>
                <span class="q-qty-val" id="qtyVal" role="status" aria-live="polite">1</span>
                <button class="q-qty-btn" id="qtyPlus" aria-label="Increase quantity">+</button>
            </div>
        </div>

        {{-- Add to Bag --}}
        <div style="display:flex;gap:16px;margin-top:32px;flex-wrap:wrap;">
            <button
                class="q-btn q-btn-dark"
                id="addToBagBtn"
                style="flex:1;justify-content:center;min-width:200px;"
                aria-label="Add {{ $product['name'] }} to shopping bag"
            >
                <span>Add to Bag</span>
            </button>
            <a href="{{ route('bag') }}" class="q-btn q-btn-gold" style="justify-content:center;">
                <span>View Bag</span>
            </a>
        </div>

        {{-- Success message --}}
        <div id="addSuccess" style="display:none;margin-top:16px;" role="status" aria-live="polite">
            <div class="q-alert q-alert-success">Added to your bag successfully.</div>
        </div>

        {{-- Notes Accordion --}}
        <div class="q-notes-accordion">
            @foreach([
                ['Fragrance Notes', [
                    'Top Notes' => $product['notes']['top'],
                    'Heart Notes' => $product['notes']['heart'],
                    'Base Notes' => $product['notes']['base'],
                ]],
                ['Ingredients & Provenance', null],
                ['Complimentary White Glove Courier & Returns', null],
            ] as [$title, $data])
            <div class="q-notes-item">
                <button class="q-notes-trigger" aria-expanded="false">
                    <span>{{ $title }}</span>
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="transition:transform 0.3s;" aria-hidden="true">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>
                <div class="q-notes-content" aria-hidden="true">
                    @if($title === 'Fragrance Notes' && $data)
                        @foreach($data as $layer => $notes)
                        <div style="margin-bottom:20px;">
                            <span style="font-family:'Raleway',sans-serif;font-size:0.6rem;font-weight:600;letter-spacing:0.3em;text-transform:uppercase;color:rgba(26,26,26,0.35);display:block;margin-bottom:10px;">{{ $layer }}</span>
                            <div class="q-notes-pills">
                                @foreach($notes as $note)
                                <span class="q-note-pill q-pyramid-note-item">{{ $note }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    @elseif($title === 'Ingredients & Provenance')
                        <p class="q-body" style="font-size:0.78rem;padding-bottom:24px;line-height:1.7;">{{ $product['ingredients'] }}</p>
                    @else
                        <div style="padding-bottom:24px;">
                            <p class="q-body" style="font-size:0.82rem;margin-bottom:12px;">Complimentary carbon-neutral dispatch applied to all orders above $200. Three matching discovery vials included.</p>
                            <p class="q-body" style="font-size:0.82rem;">Test the matching sample vial first. The master flacon remains returnable within 30 days if its wax seal is intact.</p>
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Story Section --}}
<section class="q-section" style="background:#F8F4EF;" aria-labelledby="product-story-heading">
    <div style="max-width:900px;margin:0 auto;display:grid;grid-template-columns:1fr 2fr;gap:80px;align-items:start;" class="q-product-story-grid">
        <div class="q-reveal">
            <span class="q-eyebrow">The Creation</span>
            <div class="q-divider"></div>
            <div style="margin-top:24px;">
                @foreach($product['notes'] as $layer => $notes)
                <div style="margin-bottom:24px;">
                    <span style="font-family:'Raleway',sans-serif;font-size:0.6rem;font-weight:600;letter-spacing:0.3em;text-transform:uppercase;color:rgba(26,26,26,0.35);display:block;margin-bottom:10px;">{{ ucfirst($layer) }} Notes</span>
                    @foreach($notes as $note)
                    <div style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1rem;color:#1A1A1A;padding:6px 0;border-bottom:1px solid rgba(26,26,26,0.05);">{{ $note }}</div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
        <div class="q-reveal q-reveal-delay-1">
            <span class="q-eyebrow">The Story</span>
            <h2 class="q-heading q-heading-md" id="product-story-heading" style="margin-bottom:24px;">
                Behind the<br><em>Fragrance</em>
            </h2>
            <p class="q-body" style="margin-bottom:32px;">{{ $product['story'] }}</p>
            <a href="{{ route('notes') }}" class="q-btn q-btn-dark">
                <span>Discover All Notes</span>
            </a>
        </div>
    </div>
</section>

{{-- Related / Next Fragrance --}}
<section style="background:#0D0D0D;padding:80px clamp(24px,5vw,80px);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:40px;" aria-label="Next fragrance">
    <div class="q-reveal">
        <span class="q-eyebrow" style="color:rgba(201,169,110,0.6);">Next Season</span>
        <h3 class="q-heading q-heading-md" style="color:#F8F4EF;">{{ $product['next_name'] }}</h3>
    </div>
    <a href="{{ route('product', $product['next']) }}" class="q-btn q-btn-light q-reveal q-reveal-delay-1">
        <span>Explore Next &rarr;</span>
    </a>
</section>

@endsection

@push('scripts')
<script>
let selectedSize = '50ml';
let selectedPrice = {{ $product['price50'] }};

document.querySelectorAll('.q-size-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.q-size-btn').forEach(b => {
            b.classList.remove('active');
            b.setAttribute('aria-pressed', 'false');
        });
        btn.classList.add('active');
        btn.setAttribute('aria-pressed', 'true');
        selectedSize = btn.dataset.size;
        selectedPrice = parseFloat(btn.dataset.price);
        document.getElementById('displayPrice').innerHTML =
            '$' + selectedPrice.toLocaleString() +
            ' <span style="font-family:\'Raleway\',sans-serif;font-size:0.75rem;font-weight:400;color:rgba(26,26,26,0.4);letter-spacing:0.1em;">/ ' + selectedSize + '</span>';
    });
});

let qty = 1;
document.getElementById('qtyMinus')?.addEventListener('click', () => {
    if (qty > 1) {
        qty--;
        document.getElementById('qtyVal').textContent = qty;
    }
});
document.getElementById('qtyPlus')?.addEventListener('click', () => {
    if (qty < 10) {
        qty++;
        document.getElementById('qtyVal').textContent = qty;
    }
});

document.getElementById('addToBagBtn')?.addEventListener('click', () => {
    window.QuatreaCart.add({
        id: '{{ $product['id'] }}',
        name: '{{ addslashes($product['name']) }}',
        season: '{{ $product['season'] }}',
        size: selectedSize,
        price: selectedPrice,
        qty: qty,
    });

    const successEl = document.getElementById('addSuccess');
    if (successEl) {
        successEl.style.display = 'block';
        setTimeout(() => { successEl.style.display = 'none'; }, 3000);
    }
});

document.querySelectorAll('.q-notes-trigger').forEach(trigger => {
    trigger.addEventListener('click', () => {
        const content = trigger.nextElementSibling;
        const icon = trigger.querySelector('svg');
        const isOpen = content.classList.contains('open');

        document.querySelectorAll('.q-notes-content').forEach(c => {
            c.classList.remove('open');
            c.setAttribute('aria-hidden', 'true');
        });
        document.querySelectorAll('.q-notes-trigger').forEach(t => {
            t.setAttribute('aria-expanded', 'false');
            const tIcon = t.querySelector('svg');
            if (tIcon) tIcon.style.transform = '';
        });

        if (!isOpen) {
            content.classList.add('open');
            content.setAttribute('aria-hidden', 'false');
            trigger.setAttribute('aria-expanded', 'true');
            if (icon) icon.style.transform = 'rotate(180deg)';
        }
    });
});
</script>
@endpush
