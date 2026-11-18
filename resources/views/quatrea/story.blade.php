@extends('layouts.quatrea', ['darkNav' => true])

@section('title', 'Our Story — QUATRÉA Haute Parfumerie')
@section('description', 'Discover the story behind QUATRÉA — nearly a century of Haute Parfumerie in Paris. Craftsmanship, passion, and the pursuit of olfactory art.')

@section('content')

{{-- Story Hero --}}
<section class="q-story-hero" aria-labelledby="story-hero-heading">
    <div style="position:absolute;inset:0;background:radial-gradient(ellipse 60% 80% at 30% 60%, rgba(201,169,110,0.08) 0%, transparent 70%);"></div>
    <div style="position:relative;z-index:1;max-width:1400px;width:100%;margin:0 auto;">
        <span class="q-eyebrow" style="color:rgba(201,169,110,0.7);">Since 1927 &middot; Paris</span>
        <h1 class="q-heading q-heading-xl" id="story-hero-heading" style="color:#F8F4EF;max-width:700px;line-height:1.05;">
            A Century of<br>Olfactory <em>Artistry</em>
        </h1>
        <div style="width:60px;height:1px;background:#C9A96E;margin-top:40px;"></div>
    </div>
</section>

{{-- Introduction --}}
<section class="q-section" aria-labelledby="story-intro-heading">
    <div style="max-width:900px;margin:0 auto;display:grid;grid-template-columns:1fr 2fr;gap:80px;align-items:start;" class="q-story-intro-grid">
        <div class="q-reveal">
            <span class="q-eyebrow">The Beginning</span>
            <div class="q-divider"></div>
            <div style="margin-top:24px;">
                <div style="font-family:'Cormorant Garamond',Georgia,serif;font-size:4rem;font-weight:500;color:#C9A96E;line-height:1;text-shadow:0 2px 8px rgba(201,169,110,0.2);">1927</div>
                <p style="font-family:'Raleway',sans-serif;font-size:0.75rem;color:rgba(26,26,26,0.7);letter-spacing:0.15em;margin-top:8px;font-weight:500;">Year of founding</p>
            </div>
        </div>
        <div class="q-reveal q-reveal-delay-1">
            <h2 class="q-heading q-heading-md" id="story-intro-heading" style="margin-bottom:32px;">
                Born from a<br><em>Single Question</em>
            </h2>
            <p class="q-body" style="margin-bottom:24px;">
                In the spring of 1927, master perfumer &Eacute;douard Quatr&eacute;mont walked through his
                family's garden in Grasse and asked a question that would define the next
                century of work: <em>"Can a single fragrance capture an entire season?"</em>
            </p>
            <p class="q-body" style="margin-bottom:24px;">
                He spent the next four years creating four answers &mdash; one for each season of the
                year. The original QUATR&Eacute;A collection, presented to Parisian society in 1931,
                was described by critics as "not perfume, but time itself, made wearable."
            </p>
            <p class="q-body">
                Nearly a century later, the Quatr&eacute;mont family still oversees every creation.
                The same gardens in Grasse still supply their raw materials. The same obsessive
                attention to seasonal nuance still drives every formula.
            </p>
        </div>
    </div>
</section>

{{-- Full-Width Quote --}}
<section style="background:#0D0D0D;padding:120px clamp(24px,5vw,80px);text-align:center;position:relative;overflow:hidden;" aria-label="Brand philosophy quote">
    <div style="position:absolute;font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(10rem,20vw,20rem);font-weight:300;color:rgba(248,244,239,0.02);line-height:1;top:50%;left:50%;transform:translate(-50%,-50%);pointer-events:none;user-select:none;" aria-hidden="true">TIME</div>
    <div style="position:relative;z-index:1;max-width:800px;margin:0 auto;">
        <div style="width:1px;height:80px;background:linear-gradient(to bottom,transparent,rgba(201,169,110,0.5));margin:0 auto 40px;" aria-hidden="true"></div>
        <blockquote class="q-reveal">
            <p style="font-family:'Cormorant Garamond',Georgia,serif;font-size:clamp(1.5rem,3.5vw,2.8rem);font-weight:300;font-style:italic;color:#F8F4EF;line-height:1.4;letter-spacing:0.03em;">
                "The rarest thing we can offer is not a fragrance,<br>but a moment in time &mdash; experienced again."
            </p>
            <footer style="margin-top:32px;font-family:'Raleway',sans-serif;font-size:0.65rem;letter-spacing:0.4em;color:rgba(248,244,239,0.4);text-transform:uppercase;">
                &mdash; Isabelle Quatr&eacute;mont, Creative Director
            </footer>
        </blockquote>
        <div style="width:1px;height:80px;background:linear-gradient(to bottom,rgba(201,169,110,0.5),transparent);margin:40px auto 0;" aria-hidden="true"></div>
    </div>
</section>

{{-- Timeline --}}
<section class="q-section" style="background:#F8F4EF;" aria-labelledby="timeline-heading">
    <div style="max-width:1000px;margin:0 auto;">
        <div style="text-align:center;margin-bottom:80px;">
            <span class="q-eyebrow q-reveal">Our History</span>
            <h2 class="q-heading q-heading-lg q-reveal q-reveal-delay-1" id="timeline-heading">
                A Century of<br><em>Milestones</em>
            </h2>
        </div>

        <div style="position:relative;">
            {{-- Central line --}}
            <div style="position:absolute;left:50%;top:0;bottom:0;width:1px;background:linear-gradient(to bottom,transparent,rgba(201,169,110,0.4) 10%,rgba(201,169,110,0.4) 90%,transparent);transform:translateX(-50%);" aria-hidden="true" class="q-timeline-line"></div>

            @php
            $timeline = [
                ['year'=>'1927','side'=>'left','title'=>'The Garden Begins','text'=>'Édouard Quatrémont, fresh from his training under Ernest Beaux in Grasse, establishes his private garden laboratory in the hills above Cannes.'],
                ['year'=>'1931','side'=>'right','title'=>'The First Collection','text'=>'The original four seasonal fragrances debut at the Hôtel de Crillon in Paris. Within a week, every bottle is claimed. A waiting list forms for the first time.'],
                ['year'=>'1952','side'=>'left','title'=>'Royal Appointment','text'=>'QUATRÉA receives its first royal warrant, supplying the House of Monaco for three consecutive decades. Princess Grace famously wore Fleur de l\'Aube on her wedding day.'],
                ['year'=>'1968','side'=>'right','title'=>'The Grasse Atelier','text'=>'Construction of the purpose-built extraction laboratory in Grasse allows for year-round harvesting and preservation of seasonal raw materials at peak intensity.'],
                ['year'=>'1991','side'=>'left','title'=>'Second Generation','text'=>'Marie-Claire Quatrémont assumes creative direction at 28, bringing a new editorial vision to the brand while preserving every original formula to the molecule.'],
                ['year'=>'2024','side'=>'right','title'=>'The Modern Age','text'=>'Under Isabelle Quatrémont, the third generation unveils the reimagined seasonal collection &mdash; honoring nearly a century of heritage while embracing the contemporary world.'],
            ];
            @endphp

            @foreach($timeline as $item)
            <div style="display:flex;{{ $item['side'] === 'right' ? 'flex-direction:row-reverse;' : '' }}align-items:flex-start;margin-bottom:60px;gap:0;" class="q-reveal q-timeline-item {{ $item['side'] }}">
                <div style="flex:1;padding:0 {{ $item['side'] === 'left' ? '60px 0 0' : '0 0 0 60px' }};{{ $item['side'] === 'right' ? 'text-align:right;' : '' }}">
                    <span style="font-family:'Cormorant Garamond',Georgia,serif;font-size:3.2rem;font-weight:600;color:#C9A96E;display:block;line-height:1;letter-spacing:0.02em;text-shadow:0 2px 10px rgba(201,169,110,0.2);">{{ $item['year'] }}</span>
                    <h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.35rem;font-weight:500;color:#1A1A1A;margin:6px 0 12px;">{{ $item['title'] }}</h3>
                    <p class="q-body" style="font-size:0.85rem;color:rgba(26,26,26,0.85);">{{ $item['text'] }}</p>
                </div>
                <div style="width:40px;display:flex;justify-content:center;position:relative;flex-shrink:0;" aria-hidden="true">
                    <div style="width:10px;height:10px;border-radius:50%;background:#C9A96E;position:relative;z-index:1;margin-top:52px;border:2px solid #F8F4EF;box-shadow:0 0 0 1px #C9A96E;"></div>
                </div>
                <div style="flex:1;"></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Craftsmanship --}}
<section style="background:#1A1A1A;padding:clamp(80px,12vw,160px) clamp(24px,5vw,80px);" aria-labelledby="craft-heading">
    <div style="max-width:1200px;margin:0 auto;display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:60px;">
        <div>
            <span class="q-eyebrow q-reveal" style="color:rgba(201,169,110,0.6);">Our Craft</span>
            <h2 class="q-heading q-heading-lg q-reveal q-reveal-delay-1" id="craft-heading" style="color:#F8F4EF;margin-bottom:32px;">
                The Art of<br><em>Perfumery</em>
            </h2>
            <p class="q-body q-reveal q-reveal-delay-2" style="color:rgba(248,244,239,0.6);">
                Every QUATRÉA fragrance is created using the most traditional extraction methods,
                combined with contemporary precision. Our perfumers &mdash; trained over decades in
                Grasse &mdash; work alongside seasonal calendars, not production schedules.
            </p>
        </div>

        @foreach([
            ['Enfleurage','The oldest and rarest extraction method &mdash; cold-fat absorption preserves the most delicate floral molecules, used exclusively for our peony and jasmine accords.'],
            ['Steam Distillation','Used for our wood, resin, and spice extracts &mdash; ancient copper stills in Grasse run on the same schedules they have for generations.'],
            ['Supercritical CO2','Modern precision extraction used for the most volatile top notes &mdash; capturing citrus and herbs at the exact moment of peak aromatic intensity.'],
        ] as $method)
        <div class="q-reveal" style="transition-delay:{{ $loop->index * 0.15 }}s;">
            <div style="width:40px;height:1px;background:#C9A96E;margin-bottom:24px;" aria-hidden="true"></div>
            <h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.3rem;font-weight:400;color:#F8F4EF;margin-bottom:16px;">{{ $method[0] }}</h3>
            <p class="q-body" style="color:rgba(248,244,239,0.5);font-size:0.82rem;line-height:1.7;">{{ $method[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="q-section" style="text-align:center;" aria-label="Explore the collection">
    <span class="q-eyebrow q-reveal">The Collection</span>
    <h2 class="q-heading q-heading-lg q-reveal q-reveal-delay-1" style="margin-bottom:40px;">
        Experience<br><em>All Four Seasons</em>
    </h2>
    <a href="{{ route('collection') }}" class="q-btn q-btn-dark q-reveal q-reveal-delay-2">
        <span>Explore Fragrances</span>
    </a>
</section>

@endsection
