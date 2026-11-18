@props([
    'season' => 'spring',
    'name' => "Fleur de l'Aube",
    'size' => 'lg', // sm, md, lg, xl
    'class' => '',
    'monogram' => '',
])

@php
$configs = [
    'spring' => [
        'liquidGradient' => ['#A3BE95', '#7A8C6E', '#4D5E44', '#313E2B'],
        'liquidGlow' => 'rgba(163, 190, 149, 0.45)',
        'causticColor' => 'rgba(122, 140, 110, 0.35)',
        'capMetal' => ['#F5E6C8', '#D4B37F', '#A67C48', '#E6CFA2', '#8C6230'],
        'collarMetal' => '#D4B37F',
        'accentColor' => '#7A8C6E',
        'labelBg' => '#FBF9F5',
        'labelBorder' => '#C9A96E',
        'labelText' => '#1A1A1A',
        'labelSub' => '#7A8C6E',
        'volume' => '100 ML &middot; 3.4 FL.OZ.',
        'tag' => 'EXTRAIT DE PARFUM'
    ],
    'summer' => [
        'liquidGradient' => ['#FCE38A', '#EBB036', '#C98B18', '#8F5C07'],
        'liquidGlow' => 'rgba(235, 176, 54, 0.5)',
        'causticColor' => 'rgba(201, 139, 24, 0.4)',
        'capMetal' => ['#FFF2D6', '#E5BA68', '#B88628', '#F9E2A8', '#8C5E12'],
        'collarMetal' => '#E5BA68',
        'accentColor' => '#C98B18',
        'labelBg' => '#FFFDF8',
        'labelBorder' => '#D4A83C',
        'labelText' => '#1A1A1A',
        'labelSub' => '#B88628',
        'volume' => '100 ML &middot; 3.4 FL.OZ.',
        'tag' => 'EXTRAIT DE PARFUM'
    ],
    'autumn' => [
        'liquidGradient' => ['#D97D3E', '#A8481A', '#6B270A', '#3D1204'],
        'liquidGlow' => 'rgba(217, 125, 62, 0.45)',
        'causticColor' => 'rgba(168, 72, 26, 0.4)',
        'capMetal' => ['#F3D0A8', '#C48248', '#8F4B18', '#DE9E68', '#5E2B08'],
        'collarMetal' => '#C48248',
        'accentColor' => '#A8481A',
        'labelBg' => '#140E0A',
        'labelBorder' => '#C47A45',
        'labelText' => '#F8F4EF',
        'labelSub' => '#E09B67',
        'volume' => '100 ML &middot; 3.4 FL.OZ.',
        'tag' => 'EXTRAIT DE PARFUM'
    ],
    'winter' => [
        'liquidGradient' => ['#D8E8F2', '#97B8CC', '#557F99', '#244557'],
        'liquidGlow' => 'rgba(151, 184, 204, 0.5)',
        'causticColor' => 'rgba(85, 127, 153, 0.35)',
        'capMetal' => ['#F0F4F8', '#C5D3DE', '#8FA4B5', '#DDE6ED', '#657B8C'],
        'collarMetal' => '#C5D3DE',
        'accentColor' => '#557F99',
        'labelBg' => '#0F1820',
        'labelBorder' => '#8FA4B5',
        'labelText' => '#F8F4EF',
        'labelSub' => '#A8C0CC',
        'volume' => '100 ML &middot; 3.4 FL.OZ.',
        'tag' => 'EXTRAIT DE PARFUM'
    ],
];

$cfg = $configs[$season] ?? $configs['spring'];
$uniqueId = 'flacon_' . $season . '_' . substr(md5($name . $size . $monogram), 0, 6);

// Sizing
$dimensions = [
    'sm' => 'width: 110px; max-width: 100%;',
    'md' => 'width: 170px; max-width: 100%;',
    'lg' => 'width: 250px; max-width: 100%;',
    'xl' => 'width: 320px; max-width: 100%;',
];
$dimStyle = $dimensions[$size] ?? $dimensions['lg'];
@endphp

<div class="q-real-bottle-wrap {{ $class }}" style="{{ $dimStyle }} position: relative; display: inline-block; filter: drop-shadow(0 25px 35px rgba(0,0,0,0.35)); user-select: none;">
    <!-- Floor Caustic Ambient Reflection -->
    <div style="position: absolute; bottom: -8%; left: 10%; right: 10%; height: 22%; background: radial-gradient(ellipse at center, {{ $cfg['causticColor'] }} 0%, rgba(0,0,0,0.4) 40%, transparent 75%); filter: blur(14px); pointer-events: none; border-radius: 50%;"></div>

    <!-- Photorealistic Flacon SVG -->
    <svg viewBox="0 0 340 520" width="100%" height="auto" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block; overflow: visible;">
        <defs>
            <!-- Heavy Glass Cap Gradients -->
            <linearGradient id="{{ $uniqueId }}_cap_gold" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0%" stop-color="{{ $cfg['capMetal'][0] }}"/>
                <stop offset="25%" stop-color="{{ $cfg['capMetal'][1] }}"/>
                <stop offset="50%" stop-color="{{ $cfg['capMetal'][3] }}"/>
                <stop offset="75%" stop-color="{{ $cfg['capMetal'][2] }}"/>
                <stop offset="100%" stop-color="{{ $cfg['capMetal'][4] }}"/>
            </linearGradient>

            <linearGradient id="{{ $uniqueId }}_cap_side" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#FFFFFF" stop-opacity="0.4"/>
                <stop offset="20%" stop-color="#FFFFFF" stop-opacity="0"/>
                <stop offset="80%" stop-color="#000000" stop-opacity="0"/>
                <stop offset="100%" stop-color="#000000" stop-opacity="0.5"/>
            </linearGradient>

            <!-- Atomizer Collar Ring -->
            <linearGradient id="{{ $uniqueId }}_collar" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0%" stop-color="{{ $cfg['capMetal'][4] }}"/>
                <stop offset="30%" stop-color="{{ $cfg['capMetal'][0] }}"/>
                <stop offset="70%" stop-color="{{ $cfg['capMetal'][1] }}"/>
                <stop offset="100%" stop-color="{{ $cfg['capMetal'][4] }}"/>
            </linearGradient>

            <!-- Translucent Inner Perfume Liquid -->
            <linearGradient id="{{ $uniqueId }}_liquid" x1="0.2" y1="0" x2="0.8" y2="1">
                <stop offset="0%" stop-color="{{ $cfg['liquidGradient'][0] }}"/>
                <stop offset="30%" stop-color="{{ $cfg['liquidGradient'][1] }}"/>
                <stop offset="70%" stop-color="{{ $cfg['liquidGradient'][2] }}"/>
                <stop offset="100%" stop-color="{{ $cfg['liquidGradient'][3] }}"/>
            </linearGradient>

            <!-- Liquid Glow Mask Filter -->
            <radialGradient id="{{ $uniqueId }}_liquid_glow" cx="50%" cy="50%" r="50%">
                <stop offset="0%" stop-color="{{ $cfg['liquidGlow'] }}"/>
                <stop offset="100%" stop-color="{{ $cfg['liquidGlow'] }}" stop-opacity="0"/>
            </radialGradient>

            <!-- Glass Outer Thickness Reflection -->
            <linearGradient id="{{ $uniqueId }}_glass_specular" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0%" stop-color="#FFFFFF" stop-opacity="0.6"/>
                <stop offset="8%" stop-color="#FFFFFF" stop-opacity="0.15"/>
                <stop offset="25%" stop-color="#FFFFFF" stop-opacity="0"/>
                <stop offset="75%" stop-color="#FFFFFF" stop-opacity="0"/>
                <stop offset="92%" stop-color="#FFFFFF" stop-opacity="0.2"/>
                <stop offset="100%" stop-color="#FFFFFF" stop-opacity="0.7"/>
            </linearGradient>

            <!-- Heavy Solid Crystal Base (Le Fond Lourd) -->
            <linearGradient id="{{ $uniqueId }}_crystal_base" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#FFFFFF" stop-opacity="0.05"/>
                <stop offset="50%" stop-color="#FFFFFF" stop-opacity="0.2"/>
                <stop offset="85%" stop-color="#FFFFFF" stop-opacity="0.45"/>
                <stop offset="100%" stop-color="#000000" stop-opacity="0.3"/>
            </linearGradient>

            <!-- Glass Diagonal Bevel Ray -->
            <linearGradient id="{{ $uniqueId }}_ray" x1="0" y1="0" x2="1" y2="1">
                <stop offset="0%" stop-color="#FFFFFF" stop-opacity="0.45"/>
                <stop offset="35%" stop-color="#FFFFFF" stop-opacity="0.05"/>
                <stop offset="70%" stop-color="#FFFFFF" stop-opacity="0"/>
            </linearGradient>

            <!-- Subtle Internal Glow -->
            <filter id="{{ $uniqueId }}_blur" x="-20%" y="-20%" width="140%" height="140%">
                <feGaussianBlur stdDeviation="10"/>
            </filter>
        </defs>

        <!-- 1. AMBIENT BACKLIGHT GLOW (Radiating from within liquid) -->
        <ellipse cx="170" cy="300" rx="90" ry="120" fill="url(#{{ $uniqueId }}_liquid_glow)" filter="url(#{{ $uniqueId }}_blur)"/>

        <!-- 2. FLACON CAP (Weighted Architectural Bouchon) -->
        <g id="cap">
            <!-- Cap Drop Shadow -->
            <rect x="110" y="86" width="120" height="8" rx="4" fill="#000000" fill-opacity="0.4" filter="url(#{{ $uniqueId }}_blur)"/>

            <!-- Bouchon Body (Faceted Crystal / Metal Block) -->
            <rect x="112" y="14" width="116" height="74" rx="5" fill="url(#{{ $uniqueId }}_cap_gold)" stroke="rgba(255,255,255,0.4)" stroke-width="1"/>
            <rect x="112" y="14" width="116" height="74" rx="5" fill="url(#{{ $uniqueId }}_cap_side)"/>

            <!-- Cap Top Bevel -->
            <polygon points="112,14 118,20 222,20 228,14" fill="#FFFFFF" fill-opacity="0.45"/>
            <!-- Cap Chamfer Highlight line -->
            <line x1="124" y1="20" x2="124" y2="82" stroke="#FFFFFF" stroke-opacity="0.4" stroke-width="1.5"/>
            <line x1="216" y1="20" x2="216" y2="82" stroke="#000000" stroke-opacity="0.25" stroke-width="1"/>

            <!-- Cap Center Engraving "Q" Crest or Custom Monogram -->
            @if(!empty($monogram))
                <circle cx="170" cy="51" r="16" fill="none" stroke="{{ $cfg['capMetal'][4] }}" stroke-width="1" stroke-opacity="0.7"/>
                <text x="170" y="56" font-family="'Cormorant Garamond', Georgia, serif" font-size="14" font-weight="600" fill="{{ $cfg['capMetal'][4] }}" text-anchor="middle" letter-spacing="2">{{ strtoupper($monogram) }}</text>
            @else
                <circle cx="170" cy="51" r="14" fill="none" stroke="{{ $cfg['capMetal'][4] }}" stroke-width="1" stroke-opacity="0.6"/>
                <text x="170" y="56" font-family="'Cormorant Garamond', Georgia, serif" font-size="16" font-weight="300" fill="{{ $cfg['capMetal'][4] }}" text-anchor="middle" letter-spacing="1">Q</text>
            @endif
        </g>

        <!-- 3. ATOMIZER COLLAR & NECK -->
        <g id="collar">
            <rect x="135" y="88" width="70" height="26" fill="url(#{{ $uniqueId }}_collar)" rx="2"/>
            <!-- Fluted metallic rings -->
            <line x1="135" y1="94" x2="205" y2="94" stroke="{{ $cfg['capMetal'][0] }}" stroke-width="1" stroke-opacity="0.7"/>
            <line x1="135" y1="102" x2="205" y2="102" stroke="{{ $cfg['capMetal'][4] }}" stroke-width="1" stroke-opacity="0.8"/>
            <line x1="135" y1="108" x2="205" y2="108" stroke="{{ $cfg['capMetal'][0] }}" stroke-width="1" stroke-opacity="0.5"/>
        </g>

        <!-- 4. OUTER CRYSTAL FLACON (High-Refraction Heavy Glass Body) -->
        <g id="flacon_body">
            <!-- Glass Outer Shell -->
            <rect x="50" y="114" width="240" height="360" rx="14" fill="#141414" fill-opacity="0.08" stroke="rgba(255,255,255,0.25)" stroke-width="1.5"/>

            <!-- Glass Shoulders (Biseaux Sup&eacute;rieurs) -->
            <path d="M 50 135 Q 50 114 74 114 L 266 114 Q 290 114 290 135 Z" fill="#FFFFFF" fill-opacity="0.1"/>

            <!-- 5. INNER LIQUID CHAMBER -->
            <!-- Inner Cavity Outline -->
            <rect x="68" y="140" width="204" height="270" rx="8" fill="url(#{{ $uniqueId }}_liquid)"/>

            <!-- Liquid Meniscus (Upper curve of perfume level) -->
            <path d="M 68 148 Q 170 142 272 148 L 272 140 L 68 140 Z" fill="#FFFFFF" fill-opacity="0.25"/>
            <ellipse cx="170" cy="142" rx="100" ry="4" fill="rgba(255,255,255,0.4)"/>

            <!-- Liquid Internal Caustic Highlights -->
            <path d="M 72 155 Q 120 280 80 395 L 95 395 Q 135 270 90 155 Z" fill="#FFFFFF" fill-opacity="0.18"/>

            <!-- Atomizer Dip Tube (Le Tube Plongeur) -->
            <rect x="168" y="114" width="4" height="288" fill="#FFFFFF" fill-opacity="0.45" rx="1"/>
            <rect x="169" y="114" width="2" height="288" fill="#FFFFFF" fill-opacity="0.8" rx="1"/>

            <!-- 6. SOLID GLASS BASE (Le Fond Lourd - 60mm solid glass weight) -->
            <rect x="52" y="410" width="236" height="62" rx="0 0 12 12" fill="url(#{{ $uniqueId }}_crystal_base)"/>
            <!-- Internal Base Reflection & Refraction lines -->
            <path d="M 68 410 L 80 458 L 260 458 L 272 410 Z" fill="#FFFFFF" fill-opacity="0.12"/>
            <line x1="68" y1="412" x2="272" y2="412" stroke="#FFFFFF" stroke-opacity="0.45" stroke-width="1.5"/>
            <line x1="85" y1="458" x2="255" y2="458" stroke="#FFFFFF" stroke-opacity="0.6" stroke-width="2"/>
            <line x1="95" y1="464" x2="245" y2="464" stroke="#FFFFFF" stroke-opacity="0.3" stroke-width="1"/>

            <!-- 7. LUXURY EMBOSSED LABEL (L'&Eacute;tiquette de Maison) -->
            <g id="label" transform="translate(85, 205)">
                <!-- Label Card -->
                <rect x="0" y="0" width="170" height="125" rx="2" fill="{{ $cfg['labelBg'] }}" filter="drop-shadow(0 6px 12px rgba(0,0,0,0.35))"/>
                
                <!-- Gold Foil Inner Border -->
                <rect x="5" y="5" width="160" height="115" rx="1" fill="none" stroke="{{ $cfg['labelBorder'] }}" stroke-width="1" stroke-opacity="0.85"/>
                <rect x="8" y="8" width="154" height="109" rx="0" fill="none" stroke="{{ $cfg['labelBorder'] }}" stroke-width="0.5" stroke-opacity="0.5"/>

                <!-- Label Brand Header -->
                <text x="85" y="28" font-family="'Cormorant Garamond', Georgia, serif" font-size="12" font-weight="500" fill="{{ $cfg['labelText'] }}" text-anchor="middle" letter-spacing="4">QUATR&Eacute;A</text>
                <text x="85" y="38" font-family="'Raleway', sans-serif" font-size="6" font-weight="600" fill="{{ $cfg['labelSub'] }}" text-anchor="middle" letter-spacing="3">PARIS</text>

                <!-- Thin Separator -->
                <line x1="55" y1="45" x2="115" y2="45" stroke="{{ $cfg['labelBorder'] }}" stroke-width="0.75" stroke-opacity="0.6"/>

                <!-- Fragrance Name -->
                <text x="85" y="66" font-family="'Cormorant Garamond', Georgia, serif" font-size="16" font-weight="400" font-style="italic" fill="{{ $cfg['labelText'] }}" text-anchor="middle" letter-spacing="1">
                    {{ $name }}
                </text>

                <!-- Concentration & Spec -->
                <text x="85" y="88" font-family="'Raleway', sans-serif" font-size="6.5" font-weight="600" fill="{{ $cfg['labelSub'] }}" text-anchor="middle" letter-spacing="2.5">
                    {{ $cfg['tag'] }}
                </text>
                <text x="85" y="104" font-family="'Raleway', sans-serif" font-size="5.5" font-weight="500" fill="{{ $cfg['labelText'] }}" text-anchor="middle" letter-spacing="2" opacity="0.6">
                    {!! $cfg['volume'] !!}
                </text>
            </g>

            <!-- 8. GLASS LIGHT REFLECTIONS & SPECULAR SHINE (L'&Eacute;clat du verre) -->
            <!-- Left Primary Specular Pillar -->
            <rect x="52" y="116" width="22" height="354" fill="url(#{{ $uniqueId }}_glass_specular)"/>
            <line x1="58" y1="120" x2="58" y2="466" stroke="#FFFFFF" stroke-opacity="0.85" stroke-width="1.5"/>

            <!-- Right Soft Reflection -->
            <rect x="266" y="116" width="22" height="354" fill="url(#{{ $uniqueId }}_glass_specular)" transform="scale(-1, 1) translate(-554, 0)"/>
            <line x1="282" y1="120" x2="282" y2="466" stroke="#FFFFFF" stroke-opacity="0.5" stroke-width="1"/>

            <!-- Diagonal Studio Softbox Flare across bottle -->
            <polygon points="52,140 180,114 220,114 52,240" fill="url(#{{ $uniqueId }}_ray)" pointer-events="none"/>
        </g>
    </svg>
</div>
