@extends('layouts.quatrea', ['darkNav' => true])

@section('title', 'Discover Notes — QUATRÉA Fragrance Guide')
@section('description', 'Explore the fragrance families, top notes, heart notes, and base notes of QUATRÉA\'s four seasonal perfumes.')

@section('content')

{{-- Notes Hero --}}
<section class="q-notes-hero" aria-labelledby="notes-hero-heading">
    <div style="position:absolute;inset:0;background:radial-gradient(ellipse 60% 80% at 70% 40%, rgba(201,169,110,0.07) 0%, transparent 70%);" aria-hidden="true"></div>
    <div style="position:relative;z-index:1;max-width:1400px;width:100%;margin:0 auto;">
        <span class="q-eyebrow" style="color:rgba(201,169,110,0.7);">The Olfactory Art</span>
        <h1 class="q-heading q-heading-xl" id="notes-hero-heading" style="color:#F8F4EF;max-width:700px;">
            Discover<br>the <em>Notes</em>
        </h1>
    </div>
</section>

{{-- Intro --}}
<section class="q-section" style="background:#F8F4EF;text-align:center;" aria-labelledby="notes-intro-heading">
    <div style="max-width:700px;margin:0 auto;">
        <span class="q-eyebrow q-reveal">Understanding Fragrance</span>
        <h2 class="q-heading q-heading-lg q-reveal q-reveal-delay-1" id="notes-intro-heading" style="margin-bottom:24px;">
            The Three Layers<br>of <em>Perfumery</em>
        </h2>
        <p class="q-body q-reveal q-reveal-delay-2" style="max-width:580px;margin:0 auto;">
            Every QUATRÉA fragrance unfolds in three acts &mdash; top notes that announce, heart notes that define,
            and base notes that linger. Together they create an olfactory narrative that evolves across hours on the skin.
        </p>
    </div>
</section>

{{-- Visual Pyramid --}}
<section style="background:#0D0D0D;padding:80px clamp(24px,5vw,80px);" aria-labelledby="pyramid-heading">
    <div style="max-width:900px;margin:0 auto;text-align:center;">
        <span class="q-eyebrow q-reveal" style="color:rgba(201,169,110,0.6);">The Fragrance Pyramid</span>
        <h2 class="q-heading q-heading-md q-reveal q-reveal-delay-1" id="pyramid-heading" style="color:#F8F4EF;margin-bottom:60px;">
            Layers of <em>Complexity</em>
        </h2>

        {{-- Top Notes --}}
        <div class="q-reveal" style="margin-bottom:2px;">
            <div style="font-family:'Raleway',sans-serif;font-size:0.6rem;letter-spacing:0.4em;text-transform:uppercase;color:rgba(248,244,239,0.3);margin-bottom:12px;">Top Notes &mdash; First 15&ndash;30 Minutes (Click to Inspect Profile)</div>
            <div style="display:flex;justify-content:center;gap:2px;flex-wrap:wrap;">
                @foreach(['Bergamot','Mandarin','Cardamom','Violet Leaf','Lemon Zest','Pink Pepper','Green Leaves','Petitgrain','Ozonic Accord'] as $note)
                <div style="background:rgba(201,169,110,0.12);border:1px solid rgba(201,169,110,0.3);padding:14px 20px;min-width:120px;cursor:pointer;transition:all 0.3s;" class="q-pyramid-note-item" title="Click to view extraction profile">
                    <span style="font-family:'Cormorant Garamond',Georgia,serif;font-size:0.95rem;color:#F8F4EF;display:block;">{{ $note }}</span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Divider --}}
        <div style="display:flex;align-items:center;gap:16px;padding:16px 0;" aria-hidden="true">
            <div style="flex:1;height:1px;background:rgba(201,169,110,0.2);"></div>
            <div style="width:6px;height:6px;border-radius:50%;background:#C9A96E;"></div>
            <div style="flex:1;height:1px;background:rgba(201,169,110,0.2);"></div>
        </div>

        {{-- Heart Notes --}}
        <div class="q-reveal q-reveal-delay-1" style="margin-bottom:2px;">
            <div style="font-family:'Raleway',sans-serif;font-size:0.6rem;letter-spacing:0.4em;text-transform:uppercase;color:rgba(248,244,239,0.3);margin-bottom:12px;">Heart Notes &mdash; 30 Minutes to 3 Hours (Click to Inspect Profile)</div>
            <div style="display:flex;justify-content:center;gap:2px;flex-wrap:wrap;">
                @foreach(['Peony','Jasmine Absolute','Rose Water','Neroli','Orange Blossom','Ylang-Ylang','Amber Resin','Cinnamon','Clove Bud','Iris Root','Orris Butter','Violet'] as $note)
                <div style="background:rgba(201,169,110,0.08);border:1px solid rgba(201,169,110,0.22);padding:14px 20px;min-width:120px;cursor:pointer;transition:all 0.3s;" class="q-pyramid-note-item" title="Click to view extraction profile">
                    <span style="font-family:'Cormorant Garamond',Georgia,serif;font-size:0.95rem;color:#F8F4EF;display:block;">{{ $note }}</span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Divider --}}
        <div style="display:flex;align-items:center;gap:16px;padding:16px 0;" aria-hidden="true">
            <div style="flex:1;height:1px;background:rgba(201,169,110,0.15);"></div>
            <div style="width:4px;height:4px;border-radius:50%;background:rgba(201,169,110,0.5);"></div>
            <div style="flex:1;height:1px;background:rgba(201,169,110,0.15);"></div>
        </div>

        {{-- Base Notes --}}
        <div class="q-reveal q-reveal-delay-2">
            <div style="font-family:'Raleway',sans-serif;font-size:0.6rem;letter-spacing:0.4em;text-transform:uppercase;color:rgba(248,244,239,0.3);margin-bottom:12px;">Base Notes &mdash; 3+ Hours (Click to Inspect Profile)</div>
            <div style="display:flex;justify-content:center;gap:2px;flex-wrap:wrap;">
                @foreach(['White Musk','Sandalwood','Patchouli Heart','Labdanum','Vanilla Bourbon','Cedarwood','Cashmeran','Blonde Woods','Ambrette Seed'] as $note)
                <div style="background:rgba(201,169,110,0.05);border:1px solid rgba(201,169,110,0.15);padding:14px 20px;min-width:120px;cursor:pointer;transition:all 0.3s;" class="q-pyramid-note-item" title="Click to view extraction profile">
                    <span style="font-family:'Cormorant Garamond',Georgia,serif;font-size:0.95rem;color:#F8F4EF;display:block;">{{ $note }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- Fragrance Families --}}
<section class="q-section" style="background:#F8F4EF;" aria-labelledby="families-heading">
    <div style="max-width:1200px;margin:0 auto;">
        <div style="text-align:center;margin-bottom:80px;">
            <span class="q-eyebrow q-reveal">Olfactory Families</span>
            <h2 class="q-heading q-heading-lg q-reveal q-reveal-delay-1" id="families-heading">
                The <em>Fragrance</em> Families<br>of QUATRÉA
            </h2>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:1px;background:rgba(26,26,26,0.06);">
            @php
            $families = [
                ['spring','Floral — Fresh','#7A8C6E','Fleur de l\'Aube belongs to the Fresh Floral family. Light, aqueous, and delicate — the olfactory equivalent of morning light.','spring','fleur-de-laube'],
                ['summer','Citrus — Floral','#C9A44B','Soléaire inhabits the Citrus Floral family. Vibrant, luminous top notes balanced with warm, honeyed florals.','summer','solere'],
                ['autumn','Oriental — Woody','#B5651D','Ambre Noir explores the Warm Oriental family. Rich, resinous, spiced — the most complex and intimate of our fragrances.','autumn','ambre-noir'],
                ['winter','Woody — Floral','#6A8C9A','Nuit de Glace crosses the Woody and Floral families — structured and cold, yet with an intimate, crystalline core.','winter','nuit-de-glace'],
            ];
            @endphp

            @foreach($families as $f)
            <div style="background:#F8F4EF;padding:48px 36px;" class="q-reveal" style="transition-delay:{{ $loop->index * 0.1 }}s;">
                <div style="width:48px;height:48px;border-radius:50%;background:{{ $f[2] }};margin-bottom:24px;opacity:0.8;" aria-hidden="true"></div>
                <span style="font-family:'Raleway',sans-serif;font-size:0.6rem;font-weight:600;letter-spacing:0.35em;text-transform:uppercase;color:{{ $f[2] }};display:block;margin-bottom:12px;">{{ $f[0] }}</span>
                <h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.3rem;font-weight:400;color:#1A1A1A;margin-bottom:16px;">{{ $f[1] }}</h3>
                <p class="q-body" style="font-size:0.82rem;margin-bottom:28px;">{{ $f[3] }}</p>
                <a href="{{ route('product', $f[5]) }}" style="font-family:'Raleway',sans-serif;font-size:0.65rem;font-weight:500;letter-spacing:0.25em;text-transform:uppercase;color:{{ $f[2] }};text-decoration:none;border-bottom:1px solid {{ $f[2] }};padding-bottom:3px;transition:opacity 0.3s;">
                    Discover {{ $f[4] === 'spring' ? "Fleur de l'Aube" : ($f[4] === 'summer' ? 'Soléaire' : ($f[4] === 'autumn' ? 'Ambre Noir' : 'Nuit de Glace')) }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Fragrance Layering Atelier --}}
<x-fragrance-layering />

{{-- How to Wear --}}
<section class="q-section" aria-labelledby="wear-heading">
    <div style="max-width:900px;margin:0 auto;">
        <div style="text-align:center;margin-bottom:60px;">
            <span class="q-eyebrow q-reveal">The Art of Application</span>
            <h2 class="q-heading q-heading-lg q-reveal q-reveal-delay-1" id="wear-heading">
                How to Wear<br><em>QUATRÉA</em>
            </h2>
        </div>

        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:48px;">
            @foreach([
                ['01','Pulse Points','Apply to wrists, neck, behind ears, and inner elbows. The natural blood warmth of these areas gently diffuses the aromatic molecules.'],
                ['02','Layer Lightly','Each QUATRÉA fragrance is designed to evolve — start with a single spray, allow the top notes to blossom, then layer if desired.'],
                ['03','Never Rub','After applying, resist the urge to rub your wrists together. Friction crushes delicate floral top notes and distorts sillage.'],
                ['04','Seasonal Timing','Fragrances behave differently with ambient temperature. Cool air preserves crisp citrus top notes; warmth amplifies resinous bases.'],
            ] as $tip)
            <div class="q-reveal" style="transition-delay:{{ $loop->index * 0.1 }}s;">
                <div style="font-family:'Cormorant Garamond',Georgia,serif;font-size:3.2rem;font-weight:600;color:#C9A96E;margin-bottom:12px;line-height:1;text-shadow:0 2px 8px rgba(201,169,110,0.2);">{{ $tip[0] }}</div>
                <h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.2rem;font-weight:500;color:#1A1A1A;margin-bottom:12px;">{{ $tip[1] }}</h3>
                <p class="q-body" style="font-size:0.85rem;color:rgba(26,26,26,0.85);line-height:1.7;">{{ $tip[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
