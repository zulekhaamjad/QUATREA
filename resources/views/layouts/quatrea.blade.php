<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'QUATRÉA — Haute Parfumerie Paris')</title>
    <meta name="description" content="@yield('description', 'Four seasons. Four essences. One art. QUATRÉA — Luxury Haute Parfumerie.')">

    <!-- Preconnect -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
<body class="{{ $bodyClass ?? '' }}">

    <!-- Loading Screen (First visit only, smooth fade) -->
    <div class="q-loader" id="qLoader">
        <div class="q-loader-logo">
            <span>Q</span><span>U</span><span>A</span><span>T</span><span>R</span><span>É</span><span>A</span>
        </div>
        <div class="q-loader-line" id="loaderLine"></div>
        <div class="q-loader-tagline">Four Seasons &middot; Four Essences &middot; One Art</div>
    </div>

    <!-- Persistent Haute Navigation -->
    <nav class="q-nav {{ $darkNav ?? false ? 'dark-nav' : '' }}" id="qNav" role="navigation" aria-label="Main navigation">
        <a href="{{ route('home') }}" class="q-wordmark" aria-label="QUATRÉA Home">
            QUATRÉA
        </a>

        <ul class="q-nav-links" role="list">
            <li><a href="{{ route('home') }}" class="q-nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('collection') }}" class="q-nav-link {{ request()->routeIs('collection') ? 'active' : '' }}">Collection</a></li>
            <li><a href="{{ route('story') }}" class="q-nav-link {{ request()->routeIs('story') ? 'active' : '' }}">Our Story</a></li>
            <li><a href="{{ route('notes') }}" class="q-nav-link {{ request()->routeIs('notes') ? 'active' : '' }}">Discover Notes</a></li>
            <li><button type="button" class="q-nav-link q-open-advisor" title="Take the Fragrance Diagnosis">Fragrance Advisor</button></li>
            <li><a href="{{ route('contact') }}" class="q-nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
        </ul>

        <div class="q-nav-icons">
            {{-- Multi-Currency Selector --}}
            <div class="q-currency-wrap" style="position:relative;">
                <button type="button" class="q-currency-toggle" id="currencyToggleBtn" aria-label="Select Currency" aria-expanded="false" title="Change currency">
                    <span id="activeCurrencyCode">USD</span>
                    <span id="activeCurrencySymbol" style="opacity:0.7;margin-left:2px;">$</span>
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left:4px;"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <div class="q-currency-dropdown" id="currencyDropdown">
                    <button type="button" class="q-currency-opt" data-currency="USD" data-symbol="$" data-rate="1.0">USD ($)</button>
                    <button type="button" class="q-currency-opt" data-currency="EUR" data-symbol="€" data-rate="0.92">EUR (€)</button>
                    <button type="button" class="q-currency-opt" data-currency="GBP" data-symbol="£" data-rate="0.79">GBP (£)</button>
                </div>
            </div>

            {{-- Shopping Bag Link --}}
            <a href="{{ route('bag') }}" class="q-nav-icon" aria-label="Shopping Bag" title="Shopping Bag">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M6 2 3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <path d="M16 10a4 4 0 01-8 0"/>
                </svg>
                <span class="q-cart-badge" id="cartBadge" style="display:none">0</span>
            </a>

            {{-- Hamburger Toggle --}}
            <button class="q-hamburger" id="qHamburger" aria-label="Open Navigation Menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Mobile Navigation Drawer -->
    <div class="q-mobile-menu" id="qMobileMenu" role="dialog" aria-modal="true" aria-label="Mobile Navigation">
        <div class="q-mobile-menu-inner">
            <div class="q-mobile-menu-header">
                <span class="q-wordmark" style="color:#F8F4EF;font-size:1.3rem;">QUATRÉA</span>
                <button type="button" class="q-mobile-close-btn" id="qMobileCloseBtn" aria-label="Close navigation menu">&times;</button>
            </div>
            
            {{-- Quick Seasonal Shortcut Pills in Drawer --}}
            <div style="padding:16px 24px;border-bottom:1px solid rgba(255,255,255,0.08);background:rgba(255,255,255,0.02);">
                <span style="font-family:'Raleway',sans-serif;font-size:0.6rem;letter-spacing:0.25em;text-transform:uppercase;color:#C9A96E;display:block;margin-bottom:10px;">The Four Flacons</span>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:8px;">
                    <a href="{{ route('product', 'fleur-de-laube') }}" class="q-mobile-season-tag" style="display:flex;align-items:center;gap:8px;padding:8px 10px;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.1);text-decoration:none;border-radius:2px;">
                        <span style="width:7px;height:7px;border-radius:50%;background:#A3BE95;display:inline-block;"></span>
                        <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;color:#F8F4EF;letter-spacing:0.1em;">Spring</span>
                    </a>
                    <a href="{{ route('product', 'solere') }}" class="q-mobile-season-tag" style="display:flex;align-items:center;gap:8px;padding:8px 10px;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.1);text-decoration:none;border-radius:2px;">
                        <span style="width:7px;height:7px;border-radius:50%;background:#FCE38A;display:inline-block;"></span>
                        <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;color:#F8F4EF;letter-spacing:0.1em;">Summer</span>
                    </a>
                    <a href="{{ route('product', 'ambre-noir') }}" class="q-mobile-season-tag" style="display:flex;align-items:center;gap:8px;padding:8px 10px;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.1);text-decoration:none;border-radius:2px;">
                        <span style="width:7px;height:7px;border-radius:50%;background:#D97D3E;display:inline-block;"></span>
                        <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;color:#F8F4EF;letter-spacing:0.1em;">Autumn</span>
                    </a>
                    <a href="{{ route('product', 'nuit-de-glace') }}" class="q-mobile-season-tag" style="display:flex;align-items:center;gap:8px;padding:8px 10px;background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.1);text-decoration:none;border-radius:2px;">
                        <span style="width:7px;height:7px;border-radius:50%;background:#D8E8F2;display:inline-block;"></span>
                        <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;color:#F8F4EF;letter-spacing:0.1em;">Winter</span>
                    </a>
                </div>
            </div>

            <nav class="q-mobile-nav-links">
                <a href="{{ route('home') }}" class="q-mobile-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                <a href="{{ route('collection') }}" class="q-mobile-link {{ request()->routeIs('collection') ? 'active' : '' }}">Collection</a>
                <a href="{{ route('story') }}" class="q-mobile-link {{ request()->routeIs('story') ? 'active' : '' }}">Our Story</a>
                <a href="{{ route('notes') }}" class="q-mobile-link {{ request()->routeIs('notes') ? 'active' : '' }}">Discover Notes</a>
                <button type="button" class="q-mobile-link q-open-advisor" style="background:none;border:none;cursor:pointer;color:#C9A96E;text-align:left;padding:12px 0;width:100%;font-family:'Cormorant Garamond',Georgia,serif;display:flex;align-items:center;justify-content:space-between;">
                    <span>Fragrance Advisor</span>
                    <span style="font-size:0.9rem;">&rarr;</span>
                </button>
                <a href="{{ route('contact') }}" class="q-mobile-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact &amp; Ateliers</a>
                <a href="{{ route('bag') }}" class="q-mobile-link q-mobile-bag-link {{ request()->routeIs('bag') ? 'active' : '' }}">
                    <span>Shopping Bag</span>
                    <span class="q-mobile-cart-badge" id="mobileCartBadge">0</span>
                </a>
            </nav>

            {{-- Mobile Currency & Settings --}}
            <div style="padding:16px 24px;border-top:1px solid rgba(255,255,255,0.08);display:flex;justify-content:space-between;align-items:center;">
                <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;color:rgba(248,244,239,0.5);letter-spacing:0.15em;text-transform:uppercase;">Currency:</span>
                <div style="display:flex;gap:6px;">
                    <button type="button" class="q-mobile-currency-btn" data-currency="USD" style="padding:4px 8px;background:none;border:1px solid rgba(255,255,255,0.2);color:#F8F4EF;font-size:0.65rem;cursor:pointer;">USD $</button>
                    <button type="button" class="q-mobile-currency-btn" data-currency="EUR" style="padding:4px 8px;background:none;border:1px solid rgba(255,255,255,0.2);color:#F8F4EF;font-size:0.65rem;cursor:pointer;">EUR €</button>
                    <button type="button" class="q-mobile-currency-btn" data-currency="GBP" style="padding:4px 8px;background:none;border:1px solid rgba(255,255,255,0.2);color:#F8F4EF;font-size:0.65rem;cursor:pointer;">GBP £</button>
                </div>
            </div>

            <div class="q-mobile-menu-footer">
                <p style="font-family:'Raleway',sans-serif;font-size:0.65rem;letter-spacing:0.3em;color:rgba(248,244,239,0.5);text-transform:uppercase;margin-bottom:8px;">18 Place Vend&ocirc;me &middot; Paris</p>
                <p style="font-family:'Cormorant Garamond',Georgia,serif;font-style:italic;color:#C9A96E;font-size:0.95rem;margin:0;">Four Seasons &middot; Four Essences &middot; One Art</p>
            </div>
        </div>
    </div>

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <!-- Floating Bag Toast Notification -->
    <div id="qBagToast" style="display:none;position:fixed;top:90px;right:24px;z-index:9990;max-width:390px;width:calc(100vw - 48px);background:#FFF;box-shadow:0 25px 60px rgba(0,0,0,0.25);border:1px solid rgba(26,26,26,0.1);padding:20px;transition:all 0.4s cubic-bezier(0.16, 1, 0.3, 1);transform:translateY(-20px);opacity:0;" role="alert" aria-live="assertive">
        <div style="display:flex;gap:16px;align-items:center;">
            <div id="toastThumb" style="width:50px;height:65px;border-radius:3px;flex-shrink:0;background:linear-gradient(160deg,#D4E8CC,#7A8C6E);display:flex;align-items:center;justify-content:center;">
                <div style="width:20px;height:38px;background:rgba(255,255,255,0.3);border-radius:2px;border:1px solid rgba(255,255,255,0.5);"></div>
            </div>
            <div style="flex:1;">
                <div style="display:flex;justify-content:space-between;align-items:baseline;">
                    <span style="font-family:'Raleway',sans-serif;font-size:0.6rem;letter-spacing:0.3em;text-transform:uppercase;color:#C9A96E;font-weight:600;">Added to Bag</span>
                    <button type="button" onclick="window.hideBagToast()" style="background:none;border:none;cursor:pointer;color:rgba(26,26,26,0.4);font-size:1.1rem;padding:0 4px;" aria-label="Close notification">&times;</button>
                </div>
                <h4 id="toastTitle" style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.2rem;font-weight:400;margin:2px 0;color:#1A1A1A;">Fleur de l'Aube</h4>
                <p id="toastDetail" style="font-family:'Raleway',sans-serif;font-size:0.75rem;color:rgba(26,26,26,0.5);margin:0;">50ml &middot; $195</p>
            </div>
        </div>
        <div style="display:flex;gap:10px;margin-top:16px;">
            <a href="{{ route('bag') }}" class="q-btn q-btn-dark" style="flex:1;justify-content:center;padding:10px 14px;font-size:0.65rem;">
                <span>View Bag</span>
            </a>
            <button type="button" onclick="window.hideBagToast()" class="q-btn q-btn-light" style="padding:10px 14px;font-size:0.65rem;border-color:rgba(26,26,26,0.2);color:#1A1A1A;">
                <span>Continue</span>
            </button>
        </div>
    </div>

    <!-- Interactive Olfactory Quick View Modal -->
    <div id="quickViewModal" style="display:none;position:fixed;inset:0;background:rgba(13,13,13,0.85);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);z-index:9996;align-items:center;justify-content:center;padding:20px;overflow-y:auto;" role="dialog" aria-modal="true" aria-labelledby="qvTitle">
        <div style="background:#FAF8F5;max-width:840px;width:100%;border:1px solid rgba(26,26,26,0.12);box-shadow:0 35px 90px rgba(0,0,0,0.5);margin:auto;max-height:92vh;display:flex;flex-direction:column;position:relative;overflow:hidden;">
            {{-- Close Button --}}
            <button type="button" id="closeQuickViewBtn" aria-label="Close Quick View" style="position:absolute;top:18px;right:18px;background:rgba(255,255,255,0.8);border:1px solid rgba(26,26,26,0.1);width:36px;height:36px;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:1.2rem;color:#1A1A1A;z-index:10;">&times;</button>

            <div style="display:grid;grid-template-columns:1fr 1fr;overflow-y:auto;" class="q-quickview-layout">
                {{-- Left: Flacon Showcase --}}
                <div style="background:radial-gradient(circle at center, #FFFFFF 0%, #EFEBE4 100%);padding:48px 24px;display:flex;align-items:center;justify-content:center;position:relative;">
                    <div id="qvBottleContainer" style="transform:scale(0.85);transition:transform 0.3s ease;">
                        {{-- Dynamically populated --}}
                    </div>
                </div>

                {{-- Right: Perfume Details --}}
                <div style="padding:40px 32px;display:flex;flex-direction:column;justify-content:space-between;background:#FAF8F5;">
                    <div>
                        <span id="qvSeasonLabel" class="q-eyebrow" style="margin-bottom:6px;">Spring &middot; Extrait de Parfum</span>
                        <h3 id="qvTitle" style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2rem;font-weight:400;color:#1A1A1A;margin:0 0 4px;line-height:1.1;">Fleur de l'Aube</h3>
                        <p id="qvTagline" style="font-family:'Cormorant Garamond',Georgia,serif;font-style:italic;color:#C9A96E;font-size:1.1rem;margin:0 0 16px;">The bloom of dawn</p>
                        
                        <div id="qvPrice" style="font-family:'Raleway',sans-serif;font-size:1.25rem;font-weight:600;color:#1A1A1A;margin-bottom:20px;">$195</div>

                        <p id="qvDesc" class="q-body" style="font-size:0.8rem;line-height:1.7;margin-bottom:24px;color:rgba(26,26,26,0.7);">
                            Fragrance story will appear here.
                        </p>

                        {{-- Size Selector --}}
                        <div style="margin-bottom:24px;">
                            <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;letter-spacing:0.2em;text-transform:uppercase;color:rgba(26,26,26,0.6);display:block;margin-bottom:8px;font-weight:600;">Select Flacon Size</span>
                            <div style="display:flex;gap:8px;">
                                <button type="button" class="q-qv-size-btn active" data-size="50ml" style="flex:1;padding:8px 12px;background:#1A1A1A;color:#FFF;border:1px solid #1A1A1A;font-family:'Raleway',sans-serif;font-size:0.7rem;cursor:pointer;">50ml</button>
                                <button type="button" class="q-qv-size-btn" data-size="100ml" style="flex:1;padding:8px 12px;background:#FFF;color:#1A1A1A;border:1px solid rgba(26,26,26,0.2);font-family:'Raleway',sans-serif;font-size:0.7rem;cursor:pointer;">100ml</button>
                                <button type="button" class="q-qv-size-btn" data-size="200ml" style="flex:1;padding:8px 12px;background:#FFF;color:#1A1A1A;border:1px solid rgba(26,26,26,0.2);font-family:'Raleway',sans-serif;font-size:0.7rem;cursor:pointer;">200ml</button>
                            </div>
                        </div>

                        {{-- Olfactory Notes Tags --}}
                        <div style="margin-bottom:28px;">
                            <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;letter-spacing:0.2em;text-transform:uppercase;color:rgba(26,26,26,0.6);display:block;margin-bottom:8px;font-weight:600;">Key Accords</span>
                            <div id="qvNotesTags" style="display:flex;gap:6px;flex-wrap:wrap;"></div>
                        </div>
                    </div>

                    <div>
                        <button type="button" id="qvAddBagBtn" class="q-btn q-btn-dark" style="width:100%;justify-content:center;padding:14px 20px;font-size:0.75rem;">
                            <span>Add to Shopping Bag &middot; <span id="qvBtnPrice">$195</span></span>
                        </button>
                        <div style="text-align:center;margin-top:10px;">
                            <a id="qvFullPageLink" href="#" style="font-family:'Raleway',sans-serif;font-size:0.7rem;color:rgba(26,26,26,0.6);text-decoration:underline;">View Complete Atelier Dossier &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fragrance Advisor / Seasonal Diagnosis Modal -->
    <div id="advisorModal" style="display:none;position:fixed;inset:0;background:rgba(13,13,13,0.85);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);z-index:9995;align-items:center;justify-content:center;padding:24px;overflow-y:auto;" role="dialog" aria-modal="true" aria-labelledby="advisorTitle">
        <div style="background:#FAF8F5;max-width:640px;width:100%;border:1px solid rgba(26,26,26,0.1);box-shadow:0 35px 90px rgba(0,0,0,0.5);margin:auto;max-height:90vh;display:flex;flex-direction:column;position:relative;">
            
            <div style="padding:28px 36px;border-bottom:1px solid rgba(26,26,26,0.08);display:flex;justify-content:space-between;align-items:center;background:#FFF;">
                <div>
                    <span class="q-eyebrow" style="margin-bottom:4px;">Olfactory Diagnosis</span>
                    <h3 id="advisorTitle" style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.6rem;font-weight:400;color:#1A1A1A;margin:0;">Find Your Essence</h3>
                </div>
                <button type="button" id="closeAdvisorBtn" aria-label="Close Advisor" style="background:none;border:none;cursor:pointer;font-size:1.3rem;color:#1A1A1A;padding:4px;">&times;</button>
            </div>

            <div style="padding:36px;overflow-y:auto;flex:1;">
                <!-- Quiz Steps Container -->
                <div id="advisorSteps">
                    <!-- Step 1 -->
                    <div class="advisor-step" id="advisorStep1">
                        <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;letter-spacing:0.3em;text-transform:uppercase;color:#C9A96E;display:block;margin-bottom:8px;">Step 1 of 3</span>
                        <h4 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.4rem;font-weight:400;margin-bottom:20px;color:#1A1A1A;">Which seasonal landscape calls to your spirit?</h4>
                        <div style="display:flex;flex-direction:column;gap:12px;">
                            <button type="button" class="advisor-opt q-btn q-btn-light" data-season="spring" style="justify-content:flex-start;text-align:left;border-color:rgba(26,26,26,0.15);color:#1A1A1A;padding:14px 20px;">
                                <span>A. Dew-drenched gardens awakening in April dawn</span>
                            </button>
                            <button type="button" class="advisor-opt q-btn q-btn-light" data-season="summer" style="justify-content:flex-start;text-align:left;border-color:rgba(26,26,26,0.15);color:#1A1A1A;padding:14px 20px;">
                                <span>B. Sun-drenched Mediterranean terraces overlooking turquoise sea</span>
                            </button>
                            <button type="button" class="advisor-opt q-btn q-btn-light" data-season="autumn" style="justify-content:flex-start;text-align:left;border-color:rgba(26,26,26,0.15);color:#1A1A1A;padding:14px 20px;">
                                <span>C. October forest canopies rich with ancient woods and golden embers</span>
                            </button>
                            <button type="button" class="advisor-opt q-btn q-btn-light" data-season="winter" style="justify-content:flex-start;text-align:left;border-color:rgba(26,26,26,0.15);color:#1A1A1A;padding:14px 20px;">
                                <span>D. Quiet starlit midnight across frosted alpine peaks</span>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="advisor-step" id="advisorStep2" style="display:none;">
                        <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;letter-spacing:0.3em;text-transform:uppercase;color:#C9A96E;display:block;margin-bottom:8px;">Step 2 of 3</span>
                        <h4 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.4rem;font-weight:400;margin-bottom:20px;color:#1A1A1A;">What sensory texture do you desire to wear on skin?</h4>
                        <div style="display:flex;flex-direction:column;gap:12px;">
                            <button type="button" class="advisor-opt q-btn q-btn-light" data-season="spring" style="justify-content:flex-start;text-align:left;border-color:rgba(26,26,26,0.15);color:#1A1A1A;padding:14px 20px;">
                                <span>A. Ethereal peony petals, crisp bergamot, soft white musk</span>
                            </button>
                            <button type="button" class="advisor-opt q-btn q-btn-light" data-season="summer" style="justify-content:flex-start;text-align:left;border-color:rgba(26,26,26,0.15);color:#1A1A1A;padding:14px 20px;">
                                <span>B. Sparkling neroli, radiant mandarin zest, rich honeyed vanilla</span>
                            </button>
                            <button type="button" class="advisor-opt q-btn q-btn-light" data-season="autumn" style="justify-content:flex-start;text-align:left;border-color:rgba(26,26,26,0.15);color:#1A1A1A;padding:14px 20px;">
                                <span>C. Resinous amber, cinnamon warmth, velvety sandalwood</span>
                            </button>
                            <button type="button" class="advisor-opt q-btn q-btn-light" data-season="winter" style="justify-content:flex-start;text-align:left;border-color:rgba(26,26,26,0.15);color:#1A1A1A;padding:14px 20px;">
                                <span>D. Noble orris iris, cool cedarwood, spicy cardamom</span>
                            </button>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="advisor-step" id="advisorStep3" style="display:none;">
                        <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;letter-spacing:0.3em;text-transform:uppercase;color:#C9A96E;display:block;margin-bottom:8px;">Step 3 of 3</span>
                        <h4 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.4rem;font-weight:400;margin-bottom:20px;color:#1A1A1A;">When will this fragrance accompany you?</h4>
                        <div style="display:flex;flex-direction:column;gap:12px;">
                            <button type="button" class="advisor-opt q-btn q-btn-light" data-season="spring" style="justify-content:flex-start;text-align:left;border-color:rgba(26,26,26,0.15);color:#1A1A1A;padding:14px 20px;">
                                <span>A. Morning rituals &amp; serene contemplation</span>
                            </button>
                            <button type="button" class="advisor-opt q-btn q-btn-light" data-season="summer" style="justify-content:flex-start;text-align:left;border-color:rgba(26,26,26,0.15);color:#1A1A1A;padding:14px 20px;">
                                <span>B. Sunlit afternoons &amp; coastal celebrations</span>
                            </button>
                            <button type="button" class="advisor-opt q-btn q-btn-light" data-season="autumn" style="justify-content:flex-start;text-align:left;border-color:rgba(26,26,26,0.15);color:#1A1A1A;padding:14px 20px;">
                                <span>C. Intimate salons &amp; evening firesides</span>
                            </button>
                            <button type="button" class="advisor-opt q-btn q-btn-light" data-season="winter" style="justify-content:flex-start;text-align:left;border-color:rgba(26,26,26,0.15);color:#1A1A1A;padding:14px 20px;">
                                <span>D. Gala nights &amp; mysterious twilight encounters</span>
                            </button>
                        </div>
                    </div>

                    <!-- Step Result -->
                    <div class="advisor-result" id="advisorResult" style="display:none;text-align:center;">
                        <div id="advResultThumb" style="width:70px;height:95px;margin:0 auto 20px;border-radius:4px;display:flex;align-items:center;justify-content:center;box-shadow:0 10px 25px rgba(0,0,0,0.15);"></div>
                        <span class="q-eyebrow" id="advResultSeason">Your Seasonal Essence</span>
                        <h3 id="advResultName" style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2.2rem;font-weight:400;margin:6px 0 12px;color:#1A1A1A;">Fleur de l'Aube</h3>
                        <p id="advResultDesc" class="q-body" style="font-size:0.85rem;max-width:440px;margin:0 auto 24px;">The bloom of dawn</p>
                        
                        <div style="display:flex;gap:12px;justify-content:center;flex-wrap:wrap;">
                            <a id="advResultLink" href="#" class="q-btn q-btn-dark">
                                <span>Explore This Fragrance</span>
                            </a>
                            <button type="button" id="advResultAddBag" class="q-btn q-btn-gold">
                                <span>Add to Bag</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Haute Footer -->
    <footer class="q-footer" role="contentinfo">
        <div class="q-footer-grid">
            <div>
                <a href="{{ route('home') }}" class="q-footer-logo">QUATRÉA</a>
                <p class="q-footer-tagline">Four Seasons &middot; Four Essences &middot; One Art</p>
                <p style="font-family:'Raleway',sans-serif;font-size:0.82rem;line-height:1.9;color:rgba(248,244,239,0.5);max-width:280px;">
                    Haute Parfumerie crafted at the intersection of nature, art, and time.
                </p>
            </div>
            <div>
                <h3 class="q-footer-col-title">The Four Flacons</h3>
                <ul class="q-footer-links" role="list">
                    <li><a href="{{ route('product', 'fleur-de-laube') }}" class="q-footer-link">Fleur de l'Aube &mdash; Spring</a></li>
                    <li><a href="{{ route('product', 'solere') }}" class="q-footer-link">Soléaire &mdash; Summer</a></li>
                    <li><a href="{{ route('product', 'ambre-noir') }}" class="q-footer-link">Ambre Noir &mdash; Autumn</a></li>
                    <li><a href="{{ route('product', 'nuit-de-glace') }}" class="q-footer-link">Nuit de Glace &mdash; Winter</a></li>
                </ul>
            </div>
            <div>
                <h3 class="q-footer-col-title">Maison</h3>
                <ul class="q-footer-links" role="list">
                    <li><a href="{{ route('home') }}" class="q-footer-link">Home</a></li>
                    <li><a href="{{ route('collection') }}" class="q-footer-link">Collection</a></li>
                    <li><a href="{{ route('story') }}" class="q-footer-link">Our Story</a></li>
                    <li><a href="{{ route('notes') }}" class="q-footer-link">Discover Notes</a></li>
                    <li><a href="{{ route('contact') }}" class="q-footer-link">Contact &amp; Appointments</a></li>
                    <li><button type="button" class="q-footer-link q-open-advisor" style="background:none;border:none;cursor:pointer;padding:0;text-align:left;color:#C9A96E;">Find Your Essence &rarr;</button></li>
                </ul>
            </div>
            <div>
                <h3 class="q-footer-col-title">Ateliers</h3>
                <ul class="q-footer-links" role="list">
                    <li><span class="q-footer-link">18 Place Vend&ocirc;me, Paris</span></li>
                    <li><a href="mailto:atelier@quatrea.com" class="q-footer-link">atelier@quatrea.com</a></li>
                    <li><span class="q-footer-link">+33 1 47 00 00 00</span></li>
                </ul>
                <div style="margin-top:28px;display:flex;gap:20px;">
                    <a href="#" class="q-footer-link" aria-label="Instagram" title="Instagram">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                    <a href="#" class="q-footer-link" aria-label="Facebook" title="Facebook">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Newsletter in footer -->
        <div style="border-top:1px solid rgba(248,244,239,0.06);padding-top:48px;margin-bottom:48px;display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:40px;">
            <div>
                <span class="q-eyebrow" style="color:rgba(248,244,239,0.3)">The World of QUATRÉA</span>
                <h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.8rem;font-weight:300;color:#F8F4EF;letter-spacing:0.05em;">Join Our Inner Circle</h3>
            </div>
            <form action="{{ route('newsletter') }}" method="POST" class="q-newsletter-form" id="footerNewsletter" style="margin:0;max-width:400px;flex:1;min-width:280px;">
                @csrf
                <input type="email" name="email" class="q-newsletter-input" placeholder="YOUR EMAIL ADDRESS" required aria-label="Email address for newsletter">
                <button type="submit" class="q-newsletter-btn">Subscribe</button>
            </form>
        </div>

        <div class="q-footer-bottom">
            <p class="q-footer-copy">&copy; {{ date('Y') }} QUATRÉA. All rights reserved. Haute Parfumerie &middot; 18 Place Vend&ocirc;me, Paris.</p>
            <div style="display:flex;gap:24px;">
                <a href="#" class="q-footer-copy" style="text-decoration:none;transition:color 0.3s;">Privacy Policy</a>
                <a href="#" class="q-footer-copy" style="text-decoration:none;transition:color 0.3s;">Terms of Use</a>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
