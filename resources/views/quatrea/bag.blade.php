@extends('layouts.quatrea')

@section('title', 'Shopping Bag — QUATRÉA Haute Parfumerie')
@section('description', 'Review your selected QUATRÉA seasonal fragrances, personalize luxury cap engraving, and proceed through our concierge checkout.')

@section('content')

{{-- Bag Header --}}
<section style="padding-top:var(--nav-height);background:#F8F4EF;border-bottom:1px solid rgba(26,26,26,0.06);" aria-labelledby="bag-heading">
    <div style="padding:60px clamp(24px,5vw,80px) 40px;max-width:1400px;margin:0 auto;">
        <span class="q-eyebrow">Your Selection</span>
        <h1 class="q-heading q-heading-lg" id="bag-heading" style="margin-bottom:12px;">
            The <em>Shopping Bag</em>
        </h1>
        <p class="q-body" style="font-size:0.85rem;color:rgba(26,26,26,0.6);">
            Complimentary signature presentation coffret, engraved silk ribbon, and three seasonal discovery samples accompany every parcel.
        </p>
    </div>
</section>

{{-- Bag Main Container --}}
<section class="q-section" style="background:#FAF8F5;min-height:60vh;" aria-label="Shopping bag contents">
    <div style="max-width:1400px;margin:0 auto;">

        {{-- Free Shipping Progress --}}
        <div id="shippingBanner" style="background:#FFF;padding:18px 24px;border:1px solid rgba(26,26,26,0.08);margin-bottom:48px;display:flex;flex-direction:column;gap:8px;">
            <div style="display:flex;justify-content:space-between;align-items:center;font-family:'Raleway',sans-serif;font-size:0.75rem;">
                <span id="shippingText" style="color:#1A1A1A;font-weight:500;">Complimentary white-glove dispatch applied to all orders above $200.</span>
                <span id="shippingStatus" style="font-weight:600;color:#C9A96E;letter-spacing:0.1em;text-transform:uppercase;">Eligible</span>
            </div>
            <div style="width:100%;height:3px;background:rgba(26,26,26,0.08);overflow:hidden;position:relative;">
                <div id="shippingProgressBar" style="height:100%;background:#C9A96E;width:100%;transition:width 0.4s ease;"></div>
            </div>
        </div>

        {{-- Layout Grid --}}
        <div class="q-bag-layout">

            {{-- Cart Items List (Left Column) --}}
            <div>
                {{-- Empty Cart State --}}
                <div id="emptyCartView" style="display:none;text-align:center;padding:80px 20px;background:#FFF;border:1px solid rgba(26,26,26,0.06);">
                    <div style="width:64px;height:64px;margin:0 auto 24px;color:rgba(26,26,26,0.25);">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" style="width:100%;height:100%;">
                            <path d="M6 2 3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                            <line x1="3" y1="6" x2="21" y2="6"/>
                            <path d="M16 10a4 4 0 01-8 0"/>
                        </svg>
                    </div>
                    <h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.8rem;font-weight:300;margin-bottom:12px;">Your Bag is Currently Empty</h3>
                    <p class="q-body" style="font-size:0.85rem;max-width:440px;margin:0 auto 32px;">
                        Each season holds a distinct emotion. Explore our four signature extraits de parfum and select your essence.
                    </p>
                    <a href="{{ route('collection') }}" class="q-btn q-btn-dark">
                        <span>Discover The Collection</span>
                    </a>
                </div>

                {{-- Table/List of Cart Items --}}
                <div id="cartItemsList" style="display:flex;flex-direction:column;gap:20px;">
                    <!-- Dynamically populated via JavaScript -->
                </div>

                {{-- BESPOKE CAP ENGRAVING CUSTOMIZATION (HIGH-LEVEL ATELIER TOUCH) --}}
                <div id="engravingCard" style="margin-top:32px;background:#FFF;border:1px solid rgba(201,169,110,0.3);padding:24px;box-shadow:0 8px 24px rgba(0,0,0,0.03);">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:12px;flex-wrap:wrap;gap:12px;">
                        <div>
                            <span class="q-eyebrow" style="color:#C9A96E;margin-bottom:4px;">Atelier Gravure &middot; Complimentary</span>
                            <h4 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.3rem;font-weight:400;margin:0;color:#1A1A1A;">Custom Cap Monogramming</h4>
                        </div>
                        <label style="display:flex;align-items:center;gap:8px;font-family:'Raleway',sans-serif;font-size:0.75rem;cursor:pointer;">
                            <input type="checkbox" id="enableEngravingCheck" style="accent-color:#C9A96E;width:16px;height:16px;">
                            <span>Add personalized engraving</span>
                        </label>
                    </div>

                    <div id="engravingPanel" style="display:none;margin-top:16px;padding-top:16px;border-top:1px solid rgba(26,26,26,0.08);">
                        <div style="display:grid;grid-template-columns:1fr 180px;gap:24px;align-items:center;">
                            <div>
                                <label for="monogramInput" style="font-family:'Raleway',sans-serif;font-size:0.65rem;font-weight:600;letter-spacing:0.2em;text-transform:uppercase;color:rgba(26,26,26,0.6);display:block;margin-bottom:6px;">Your Initials (Up to 3 Letters)</label>
                                <input type="text" id="monogramInput" maxlength="3" placeholder="e.g. CLG" style="width:100%;background:#FAF8F5;border:1px solid rgba(26,26,26,0.2);padding:10px 14px;font-family:'Cormorant Garamond',serif;font-size:1.2rem;letter-spacing:0.2em;text-transform:uppercase;outline:none;">
                                <span style="font-family:'Raleway',sans-serif;font-size:0.68rem;color:rgba(26,26,26,0.45);display:block;margin-top:6px;">Each letter is diamond-cut directly into the solid weighted gold flacon bouchon.</span>
                            </div>
                            {{-- Live Monogram Cap Preview --}}
                            <div style="text-align:center;">
                                <span style="font-family:'Raleway',sans-serif;font-size:0.6rem;letter-spacing:0.2em;text-transform:uppercase;color:#C9A96E;display:block;margin-bottom:6px;">Live Preview</span>
                                <div style="width:90px;height:55px;background:linear-gradient(to right,#F5E6C8,#E0C898,#C9A96E,#8C6230);border-radius:3px;margin:0 auto;box-shadow:0 6px 14px rgba(0,0,0,0.25);border:1px solid rgba(255,255,255,0.6);display:flex;align-items:center;justify-content:center;position:relative;">
                                    <div style="position:absolute;top:0;left:4px;bottom:0;width:2px;background:rgba(255,255,255,0.6);"></div>
                                    <div style="width:34px;height:34px;border-radius:50%;border:1px solid #8C6230;display:flex;align-items:center;justify-content:center;">
                                        <span id="monogramPreviewText" style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1rem;font-weight:600;color:#5E3E18;letter-spacing:1px;line-height:1;">Q</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Complimentary Inclusions --}}
                <div style="margin-top:32px;padding:28px;background:#FFF;border:1px solid rgba(26,26,26,0.06);display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:24px;">
                    <div style="display:flex;gap:14px;align-items:flex-start;">
                        <span style="color:#C9A96E;font-size:1.2rem;">✦</span>
                        <div>
                            <h4 style="font-family:'Raleway',sans-serif;font-size:0.7rem;font-weight:600;letter-spacing:0.15em;text-transform:uppercase;color:#1A1A1A;margin-bottom:4px;">Seasonal Trio Samples</h4>
                            <p style="font-family:'Raleway',sans-serif;font-size:0.75rem;color:rgba(26,26,26,0.6);line-height:1.5;">3x 2ml discovery vials of alternating seasons included.</p>
                        </div>
                    </div>
                    <div style="display:flex;gap:14px;align-items:flex-start;">
                        <span style="color:#C9A96E;font-size:1.2rem;">✦</span>
                        <div>
                            <h4 style="font-family:'Raleway',sans-serif;font-size:0.7rem;font-weight:600;letter-spacing:0.15em;text-transform:uppercase;color:#1A1A1A;margin-bottom:4px;">Presentation Coffret</h4>
                            <p style="font-family:'Raleway',sans-serif;font-size:0.75rem;color:rgba(26,26,26,0.6);line-height:1.5;">Hand-wrapped in heavy linen paper with wax seal &amp; gold foil.</p>
                        </div>
                    </div>
                    <div style="display:flex;gap:14px;align-items:flex-start;">
                        <span style="color:#C9A96E;font-size:1.2rem;">✦</span>
                        <div>
                            <h4 style="font-family:'Raleway',sans-serif;font-size:0.7rem;font-weight:600;letter-spacing:0.15em;text-transform:uppercase;color:#1A1A1A;margin-bottom:4px;">Trial Before Opening</h4>
                            <p style="font-family:'Raleway',sans-serif;font-size:0.75rem;color:rgba(26,26,26,0.6);line-height:1.5;">Test the matching sample first. Flacon remains returnable if sealed.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Summary Sidebar (Right Column) --}}
            <div id="cartSummaryCol">
                <div class="q-bag-summary" style="border:1px solid rgba(26,26,26,0.06);box-shadow:0 10px 30px rgba(0,0,0,0.02);">
                    <h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.6rem;font-weight:400;margin-bottom:24px;border-bottom:1px solid rgba(26,26,26,0.08);padding-bottom:12px;">Order Summary</h3>

                    <div class="q-bag-row">
                        <span>Bag Subtotal</span>
                        <span id="summarySubtotal" style="font-weight:600;color:#1A1A1A;">$0.00</span>
                    </div>

                    <div class="q-bag-row">
                        <span>Standard Dispatch</span>
                        <span id="summaryShipping" style="color:#7A8C6E;font-weight:500;">Complimentary</span>
                    </div>

                    <div class="q-bag-row" id="discountRow" style="display:none;color:#7A8C6E;">
                        <span>Atelier Privilege Code</span>
                        <span id="summaryDiscount">-$0.00</span>
                    </div>

                    <div class="q-bag-row">
                        <span>Estimated VAT &amp; Duties (Included)</span>
                        <span id="summaryTax">$0.00</span>
                    </div>

                    {{-- Promo Code Input --}}
                    <div style="margin:24px 0;padding:16px 0;border-top:1px solid rgba(26,26,26,0.08);border-bottom:1px solid rgba(26,26,26,0.08);">
                        <label for="voucherInput" style="font-family:'Raleway',sans-serif;font-size:0.65rem;font-weight:600;letter-spacing:0.25em;text-transform:uppercase;color:rgba(26,26,26,0.5);display:block;margin-bottom:8px;">Privilege Code</label>
                        <div style="display:flex;gap:8px;">
                            <input 
                                type="text" 
                                id="voucherInput" 
                                placeholder="e.g. VENDOME10" 
                                style="flex:1;background:#FFF;border:1px solid rgba(26,26,26,0.2);padding:10px 14px;font-family:'Raleway',sans-serif;font-size:0.75rem;text-transform:uppercase;outline:none;"
                            >
                            <button 
                                type="button" 
                                id="applyVoucherBtn" 
                                class="q-btn q-btn-dark" 
                                style="padding:10px 18px;font-size:0.65rem;"
                            >
                                <span>Apply</span>
                            </button>
                        </div>
                        <div id="voucherFeedback" style="font-family:'Raleway',sans-serif;font-size:0.7rem;margin-top:6px;display:none;"></div>
                    </div>

                    {{-- Final Total --}}
                    <div style="display:flex;justify-content:space-between;align-items:baseline;margin:28px 0;">
                        <span style="font-family:'Raleway',sans-serif;font-size:0.8rem;letter-spacing:0.15em;text-transform:uppercase;font-weight:600;">Total Amount</span>
                        <span class="q-bag-total" id="summaryTotal">$0.00</span>
                    </div>

                    {{-- Checkout CTA --}}
                    <button 
                        type="button" 
                        id="openCheckoutBtn" 
                        class="q-btn q-btn-dark" 
                        style="width:100%;justify-content:center;padding:18px 24px;"
                    >
                        <span>Proceed to Concierge Checkout</span>
                    </button>

                    <p style="font-family:'Raleway',sans-serif;font-size:0.68rem;color:rgba(26,26,26,0.45);text-align:center;margin-top:16px;line-height:1.6;">
                        Secure concierge checkout protected by 256-bit encryption. Carbon-neutral worldwide courier dispatch.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- DEMO CHECKOUT MODAL --}}
<div id="checkoutModal" style="display:none;position:fixed;inset:0;background:rgba(13,13,13,0.85);backdrop-filter:blur(10px);z-index:9999;align-items:center;justify-content:center;padding:24px;overflow-y:auto;" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
    <div style="background:#FAF8F5;max-width:680px;width:100%;border:1px solid rgba(26,26,26,0.1);box-shadow:0 30px 80px rgba(0,0,0,0.4);position:relative;margin:auto;max-height:90vh;display:flex;flex-direction:column;">

        {{-- Modal Header --}}
        <div style="padding:28px 36px;border-bottom:1px solid rgba(26,26,26,0.08);display:flex;justify-content:space-between;align-items:center;background:#FFF;">
            <div>
                <span class="q-eyebrow" style="margin-bottom:4px;">QUATRÉA Concierge</span>
                <h3 id="modalTitle" style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.6rem;font-weight:400;color:#1A1A1A;margin:0;">Bespoke Checkout</h3>
            </div>
            <button type="button" id="closeCheckoutBtn" aria-label="Close checkout" style="background:none;border:none;cursor:pointer;padding:8px;font-size:1.3rem;color:#1A1A1A;">&times;</button>
        </div>

        {{-- Modal Body / Form --}}
        <div style="padding:36px;overflow-y:auto;flex:1;">
            {{-- Step 1: Form --}}
            <div id="checkoutFormStep">
                <p class="q-body" style="font-size:0.8rem;margin-bottom:28px;">
                    This is an interactive luxury demonstration. No real financial payment will be charged to your card.
                </p>

                <form id="demoOrderForm" onsubmit="event.preventDefault(); window.submitDemoCheckout();">
                    <div class="q-checkout-grid-2" style="gap:20px;margin-bottom:20px;">
                        <div class="q-field">
                            <label class="q-label" for="co_first">First Name *</label>
                            <input type="text" id="co_first" class="q-input" required placeholder="Camille" style="background:#FFF;padding:10px 12px;border:1px solid rgba(26,26,26,0.15);">
                        </div>
                        <div class="q-field">
                            <label class="q-label" for="co_last">Last Name *</label>
                            <input type="text" id="co_last" class="q-input" required placeholder="de Saint-Germain" style="background:#FFF;padding:10px 12px;border:1px solid rgba(26,26,26,0.15);">
                        </div>
                    </div>

                    <div class="q-field" style="margin-bottom:20px;">
                        <label class="q-label" for="co_email">Email for Dispatch Tracking *</label>
                        <input type="email" id="co_email" class="q-input" required placeholder="camille@domain.fr" style="background:#FFF;padding:10px 12px;border:1px solid rgba(26,26,26,0.15);">
                    </div>

                    <div class="q-field" style="margin-bottom:20px;">
                        <label class="q-label" for="co_addr">Delivery Address *</label>
                        <input type="text" id="co_addr" class="q-input" required placeholder="24 Rue de la Paix, Apt 4B" style="background:#FFF;padding:10px 12px;border:1px solid rgba(26,26,26,0.15);">
                    </div>

                    <div class="q-checkout-grid-3" style="gap:16px;margin-bottom:24px;">
                        <div class="q-field">
                            <label class="q-label" for="co_city">City *</label>
                            <input type="text" id="co_city" class="q-input" required placeholder="Paris" style="background:#FFF;padding:10px 12px;border:1px solid rgba(26,26,26,0.15);">
                        </div>
                        <div class="q-field">
                            <label class="q-label" for="co_postal">Postal Code *</label>
                            <input type="text" id="co_postal" class="q-input" required placeholder="75002" style="background:#FFF;padding:10px 12px;border:1px solid rgba(26,26,26,0.15);">
                        </div>
                        <div class="q-field">
                            <label class="q-label" for="co_country">Country *</label>
                            <select id="co_country" class="q-input" style="background:#FFF;padding:10px 12px;border:1px solid rgba(26,26,26,0.15);height:42px;">
                                <option>France</option>
                                <option>United Kingdom</option>
                                <option>United States</option>
                                <option>Switzerland</option>
                                <option>Monaco</option>
                                <option>United Arab Emirates</option>
                                <option>Japan</option>
                            </select>
                        </div>
                    </div>

                    {{-- Gift Engraving / Note --}}
                    <div class="q-field" style="margin-bottom:24px;">
                        <label class="q-label" for="co_note">Complimentary Calligraphed Card Message (Optional)</label>
                        <textarea id="co_note" rows="2" class="q-input q-textarea" placeholder="To my eternal muse, with all my love..." style="background:#FFF;padding:10px 12px;border:1px solid rgba(26,26,26,0.15);"></textarea>
                    </div>

                    {{-- Demo Payment Notice --}}
                    <div style="background:rgba(201,169,110,0.1);border-left:2px solid #C9A96E;padding:14px 18px;margin-bottom:28px;">
                        <span style="font-family:'Raleway',sans-serif;font-size:0.75rem;color:#1A1A1A;font-weight:500;">
                            ✦ Payment Simulation: Orders are registered directly into demonstration storage.
                        </span>
                    </div>

                    <button type="submit" class="q-btn q-btn-dark" style="width:100%;justify-content:center;padding:18px 24px;">
                        <span>Confirm &amp; Place Order (<span id="modalBtnTotal">$0.00</span>)</span>
                    </button>
                </form>
            </div>

            {{-- Step 2: Order Placed Success --}}
            <div id="checkoutSuccessStep" style="display:none;text-align:center;padding:30px 10px;">
                <div style="width:60px;height:60px;border-radius:50%;background:#7A8C6E;color:#FFF;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;font-size:1.6rem;">
                    ✓
                </div>
                <span class="q-eyebrow" style="color:#7A8C6E;">Order Confirmed</span>
                <h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:2rem;font-weight:400;margin-bottom:8px;">Merci pour Votre Commande</h3>
                <p style="font-family:'Raleway',sans-serif;font-size:0.85rem;color:rgba(26,26,26,0.7);max-width:440px;margin:0 auto 20px;line-height:1.7;">
                    Your bespoke parcel reference is <strong id="orderReference" style="color:#1A1A1A;letter-spacing:0.1em;">#QT-892401</strong>. Our atelier in Paris is currently preparing your coffret with hand-tied ribbon.
                </p>
                <div style="border-top:1px solid rgba(26,26,26,0.08);padding-top:24px;margin-top:24px;">
                    <a href="{{ route('home') }}" class="q-btn q-btn-dark" style="margin-right:12px;">
                        <span>Return to Atelier</span>
                    </a>
                    <a href="{{ route('collection') }}" class="q-btn q-btn-gold">
                        <span>Continue Browsing</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
let discountMultiplier = 1;
let appliedDiscountCode = '';

function renderBag() {
    const cart = window.QuatreaCart.get();
    const emptyView = document.getElementById('emptyCartView');
    const itemsList = document.getElementById('cartItemsList');
    const summaryCol = document.getElementById('cartSummaryCol');
    const shippingBanner = document.getElementById('shippingBanner');
    const engravingCard = document.getElementById('engravingCard');

    if (!cart || cart.length === 0) {
        if (emptyView) emptyView.style.display = 'block';
        if (itemsList) itemsList.style.display = 'none';
        if (summaryCol) summaryCol.style.opacity = '0.5';
        if (shippingBanner) shippingBanner.style.display = 'none';
        if (engravingCard) engravingCard.style.display = 'none';
        updateTotals(0);
        return;
    }

    if (emptyView) emptyView.style.display = 'none';
    if (itemsList) {
        itemsList.style.display = 'flex';
        itemsList.innerHTML = '';
    }
    if (summaryCol) summaryCol.style.opacity = '1';
    if (shippingBanner) shippingBanner.style.display = 'flex';
    if (engravingCard) engravingCard.style.display = 'block';

    let rawSubtotal = 0;

    cart.forEach(item => {
        const itemTotal = (item.price || 0) * (item.qty || 1);
        rawSubtotal += itemTotal;

        const row = document.createElement('div');
        row.className = 'q-bag-item';
        row.style.background = '#FFF';
        row.style.padding = '24px';
        row.style.border = '1px solid rgba(26,26,26,0.06)';

        row.innerHTML = `
            <div class="q-bag-item-thumb q-bag-item-thumb--${item.season || 'spring'}" style="position:relative;width:90px;height:120px;border-radius:4px;overflow:hidden;box-shadow:0 8px 18px rgba(0,0,0,0.08);display:flex;align-items:center;justify-content:center;background:linear-gradient(135deg,rgba(255,255,255,0.7),rgba(240,240,240,0.3));border:1px solid rgba(26,26,26,0.08);">
                <div style="position:relative;width:46px;height:84px;display:flex;flex-direction:column;align-items:center;">
                    <div style="width:24px;height:14px;background:linear-gradient(to right,#F5E6C8,#C9A96E,#8C6230);border-radius:2px;box-shadow:0 2px 4px rgba(0,0,0,0.25);"></div>
                    <div style="width:14px;height:5px;background:#C9A96E;"></div>
                    <div style="width:46px;height:65px;border-radius:3px 3px 8px 8px;border:1.5px solid rgba(255,255,255,0.85);background:linear-gradient(160deg,${item.color || '#7A8C6E'}88,${item.color || '#7A8C6E'});position:relative;box-shadow:0 8px 16px rgba(0,0,0,0.18) inset, 0 4px 8px rgba(0,0,0,0.15);">
                        <div style="position:absolute;top:0;left:3px;bottom:0;width:3px;background:rgba(255,255,255,0.7);"></div>
                        <div style="position:absolute;bottom:12px;left:5px;right:5px;background:#FFF;padding:2px;border:0.5px solid #C9A96E;text-align:center;">
                            <span style="font-family:'Cormorant Garamond',serif;font-size:0.45rem;display:block;color:#1A1A1A;line-height:1;font-weight:600;">QUATRÉA</span>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display:flex;flex-direction:column;gap:6px;">
                <span style="font-family:'Raleway',sans-serif;font-size:0.6rem;letter-spacing:0.35em;text-transform:uppercase;color:#C9A96E;font-weight:600;">
                    ${item.season ? item.season.toUpperCase() : 'ATELIER'}
                </span>
                <h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.4rem;font-weight:400;color:#1A1A1A;margin:0;">
                    ${item.name}
                </h3>
                <span style="font-family:'Raleway',sans-serif;font-size:0.75rem;color:rgba(26,26,26,0.5);">
                    Flacon Size: ${item.size || '50ml'} &middot; Extrait de Parfum
                </span>
                <span style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.15rem;color:#1A1A1A;margin-top:4px;">
                    $${Number(item.price).toLocaleString()}
                </span>
            </div>
            <div style="display:flex;flex-direction:column;align-items:flex-end;justify-content:space-between;height:100%;gap:16px;">
                <button type="button" onclick="window.QuatreaCart.remove('${item.id}', '${item.size}'); renderBag();" style="background:none;border:none;cursor:pointer;color:rgba(26,26,26,0.4);font-family:'Raleway',sans-serif;font-size:0.65rem;letter-spacing:0.2em;text-transform:uppercase;transition:color 0.2s;" onmouseover="this.style.color='#B5651D'" onmouseout="this.style.color='rgba(26,26,26,0.4)'">
                    Remove
                </button>
                <div class="q-qty-selector" style="margin:0;">
                    <button class="q-qty-btn" onclick="window.QuatreaCart.updateQty('${item.id}', '${item.size}', ${(item.qty||1) - 1}); renderBag();" style="width:32px;height:32px;font-size:0.9rem;">&minus;</button>
                    <span class="q-qty-val" style="width:36px;padding:6px 0;font-size:0.8rem;">${item.qty || 1}</span>
                    <button class="q-qty-btn" onclick="window.QuatreaCart.updateQty('${item.id}', '${item.size}', ${(item.qty||1) + 1}); renderBag();" style="width:32px;height:32px;font-size:0.9rem;">+</button>
                </div>
                <span style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.2rem;font-weight:500;color:#1A1A1A;">
                    $${Number(itemTotal).toLocaleString()}
                </span>
            </div>
        `;
        itemsList.appendChild(row);
    });

    updateTotals(rawSubtotal);
}

function updateTotals(rawSubtotal) {
    const discountedSubtotal = rawSubtotal * discountMultiplier;
    const discountAmount = rawSubtotal - discountedSubtotal;
    const tax = Math.round(discountedSubtotal * 0.10);
    const total = discountedSubtotal;

    const progressBar = document.getElementById('shippingProgressBar');
    const shippingText = document.getElementById('shippingText');
    const shippingStatus = document.getElementById('shippingStatus');

    if (rawSubtotal >= 200) {
        if (progressBar) progressBar.style.width = '100%';
        if (shippingText) shippingText.textContent = 'You have unlocked complimentary white-glove courier dispatch.';
        if (shippingStatus) {
            shippingStatus.textContent = 'Complimentary';
            shippingStatus.style.color = '#7A8C6E';
        }
    } else {
        const remaining = 200 - rawSubtotal;
        const pct = Math.min(100, Math.round((rawSubtotal / 200) * 100));
        if (progressBar) progressBar.style.width = pct + '%';
        if (shippingText) shippingText.textContent = `Add $${remaining.toLocaleString()} more to unlock complimentary white-glove dispatch.`;
        if (shippingStatus) {
            shippingStatus.textContent = `${pct}%`;
            shippingStatus.style.color = '#C9A96E';
        }
    }

    const subtotalEl = document.getElementById('summarySubtotal');
    const totalEl = document.getElementById('summaryTotal');
    const taxEl = document.getElementById('summaryTax');
    const modalBtnTotal = document.getElementById('modalBtnTotal');
    const discountRow = document.getElementById('discountRow');
    const discountEl = document.getElementById('summaryDiscount');

    if (subtotalEl) subtotalEl.textContent = '$' + rawSubtotal.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
    if (taxEl) taxEl.textContent = '$' + tax.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
    if (totalEl) totalEl.textContent = '$' + total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
    if (modalBtnTotal) modalBtnTotal.textContent = '$' + total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});

    if (discountAmount > 0) {
        if (discountRow) discountRow.style.display = 'flex';
        if (discountEl) discountEl.textContent = '-$' + discountAmount.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2});
    } else {
        if (discountRow) discountRow.style.display = 'none';
    }
}

// Monogram handler
const enableEngravingCheck = document.getElementById('enableEngravingCheck');
const engravingPanel = document.getElementById('engravingPanel');
const monogramInput = document.getElementById('monogramInput');
const monogramPreviewText = document.getElementById('monogramPreviewText');

enableEngravingCheck?.addEventListener('change', (e) => {
    engravingPanel.style.display = e.target.checked ? 'block' : 'none';
});

monogramInput?.addEventListener('input', (e) => {
    const val = e.target.value.trim().toUpperCase();
    monogramPreviewText.textContent = val || 'Q';
});

// Voucher code handler
document.getElementById('applyVoucherBtn')?.addEventListener('click', () => {
    const input = document.getElementById('voucherInput');
    const fb = document.getElementById('voucherFeedback');
    const code = input.value.trim().toUpperCase();

    if (code === 'VENDOME10' || code === 'QUATREA10') {
        discountMultiplier = 0.90;
        appliedDiscountCode = code;
        fb.style.display = 'block';
        fb.style.color = '#7A8C6E';
        fb.textContent = `Privilege code ${code} applied: 10% atelier courtesy.`;
        renderBag();
    } else if (code === 'SOLERE20') {
        discountMultiplier = 0.80;
        appliedDiscountCode = code;
        fb.style.display = 'block';
        fb.style.color = '#7A8C6E';
        fb.textContent = `Privilege code ${code} applied: 20% seasonal indulgence.`;
        renderBag();
    } else {
        fb.style.display = 'block';
        fb.style.color = '#B5651D';
        fb.textContent = 'Privilege code unrecognized. Please check your invitation card.';
    }
});

// Checkout Modal toggles
const checkoutModal = document.getElementById('checkoutModal');
document.getElementById('openCheckoutBtn')?.addEventListener('click', () => {
    const cart = window.QuatreaCart.get();
    if (!cart || cart.length === 0) {
        alert('Your shopping bag is empty. Please select a seasonal fragrance first.');
        return;
    }
    if (checkoutModal) {
        checkoutModal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
});

document.getElementById('closeCheckoutBtn')?.addEventListener('click', () => {
    if (checkoutModal) {
        checkoutModal.style.display = 'none';
        document.body.style.overflow = '';
    }
});

// Submit Demo Checkout
window.submitDemoCheckout = function() {
    const refNum = 'QT-' + Math.floor(100000 + Math.random() * 900000);
    document.getElementById('orderReference').textContent = '#' + refNum;

    document.getElementById('checkoutFormStep').style.display = 'none';
    document.getElementById('checkoutSuccessStep').style.display = 'block';

    window.QuatreaCart.save([]);
    renderBag();
};

document.addEventListener('DOMContentLoaded', () => {
    renderBag();
});
</script>
@endpush
