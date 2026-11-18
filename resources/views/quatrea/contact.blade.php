@extends('layouts.quatrea', ['darkNav' => true])

@section('title', 'Contact & Ateliers — QUATRÉA Haute Parfumerie')
@section('description', 'Connect with Maison QUATRÉA. Book a private bespoke fragrance consultation at our Paris or Grasse ateliers, or speak with our fragrance concierges.')

@section('content')

{{-- Contact Hero --}}
<section class="q-story-hero" style="min-height:480px;height:55vh;" aria-labelledby="contact-hero-heading">
    <div style="position:absolute;inset:0;background:radial-gradient(ellipse 70% 70% at 80% 30%, rgba(201,169,110,0.08) 0%, transparent 70%);"></div>
    <div style="position:relative;z-index:1;max-width:1400px;width:100%;margin:0 auto;">
        <span class="q-eyebrow" style="color:rgba(201,169,110,0.7);">Private Client Concierge</span>
        <h1 class="q-heading q-heading-xl" id="contact-hero-heading" style="color:#F8F4EF;max-width:800px;line-height:1.05;">
            Conversations &amp;<br><em>Private Appointments</em>
        </h1>
        <div style="width:60px;height:1px;background:#C9A96E;margin-top:32px;"></div>
    </div>
</section>

{{-- Main Contact Section --}}
<section class="q-section" style="background:#F8F4EF;" aria-label="Contact information and form">
    <div style="max-width:1300px;margin:0 auto;display:grid;grid-template-columns:1fr 1.2fr;gap:90px;align-items:start;" class="q-contact-layout">

        {{-- Left: Ateliers & Information --}}
        <div class="q-reveal">
            <span class="q-eyebrow">The Maisons</span>
            <h2 class="q-heading q-heading-md" style="margin-bottom:32px;">
                Where Time &amp;<br><em>Scent Converge</em>
            </h2>
            <p class="q-body" style="margin-bottom:40px;">
                Whether you seek guidance selecting your signature seasonal fragrance, desire a private consultation in our salon, or inquire regarding custom commissions, our ambassadors are at your service.
            </p>

            <div style="display:flex;flex-direction:column;gap:36px;border-top:1px solid rgba(26,26,26,0.08);padding-top:36px;">
                {{-- Paris Atelier --}}
                <div>
                    <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;font-weight:600;letter-spacing:0.3em;text-transform:uppercase;color:#C9A96E;display:block;margin-bottom:8px;">Parisian Flagship Salon</span>
                    <h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.3rem;font-weight:400;color:#1A1A1A;margin-bottom:6px;">18 Place Vend&ocirc;me</h3>
                    <p style="font-family:'Raleway',sans-serif;font-size:0.82rem;line-height:1.7;color:rgba(26,26,26,0.6);">
                        75001 Paris, France<br>
                        Tuesday &ndash; Saturday: 10:30 &ndash; 19:30<br>
                        <span style="color:rgba(26,26,26,0.4);">Private appointments upon request</span>
                    </p>
                </div>

                {{-- Grasse Laboratory --}}
                <div>
                    <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;font-weight:600;letter-spacing:0.3em;text-transform:uppercase;color:#C9A96E;display:block;margin-bottom:8px;">Historic Extraction Atelier</span>
                    <h3 style="font-family:'Cormorant Garamond',Georgia,serif;font-size:1.3rem;font-weight:400;color:#1A1A1A;margin-bottom:6px;">Domaine des Quatre Vents</h3>
                    <p style="font-family:'Raleway',sans-serif;font-size:0.82rem;line-height:1.7;color:rgba(26,26,26,0.6);">
                        Route des Bastides, 06130 Grasse, France<br>
                        Seasonal harvests &amp; private organ visits by prior invitation.
                    </p>
                </div>

                {{-- Direct Contacts --}}
                <div style="border-top:1px solid rgba(26,26,26,0.08);padding-top:28px;">
                    <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;font-weight:600;letter-spacing:0.3em;text-transform:uppercase;color:rgba(26,26,26,0.4);display:block;margin-bottom:12px;">Direct Concierge</span>
                    <p style="font-family:'Raleway',sans-serif;font-size:0.85rem;line-height:1.9;color:#1A1A1A;">
                        Telephone: <a href="tel:+33147000000" style="color:#1A1A1A;text-decoration:none;border-bottom:1px solid rgba(26,26,26,0.2);">+33 (0)1 47 00 00 00</a><br>
                        Inquiries: <a href="mailto:concierge@quatrea.com" style="color:#1A1A1A;text-decoration:none;border-bottom:1px solid rgba(26,26,26,0.2);">concierge@quatrea.com</a><br>
                        Press &amp; Archives: <a href="mailto:presse@quatrea.com" style="color:#1A1A1A;text-decoration:none;border-bottom:1px solid rgba(26,26,26,0.2);">presse@quatrea.com</a>
                    </p>
                </div>
            </div>
        </div>

        {{-- Right: Form --}}
        <div class="q-reveal q-reveal-delay-1" style="background:#FFF;padding:clamp(32px,5vw,60px);box-shadow:0 20px 50px rgba(0,0,0,0.03);border:1px solid rgba(26,26,26,0.06);">
            <span class="q-eyebrow">Transmission</span>
            <h2 class="q-heading q-heading-md" style="margin-bottom:16px;">
                Send an <em>Inquiry</em>
            </h2>
            <p class="q-body" style="font-size:0.82rem;margin-bottom:32px;">
                Please convey your wishes. An ambassador from our Paris atelier will reply within twenty-four hours.
            </p>

            @if(session('success'))
                <div class="q-alert q-alert-success" role="alert" style="margin-bottom:32px;">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="q-contact-form" id="contactForm" novalidate>
                @csrf

                {{-- Full Name --}}
                <div class="q-field">
                    <label for="contact_name" class="q-label">Full Name *</label>
                    <input 
                        type="text" 
                        id="contact_name" 
                        name="name" 
                        value="{{ old('name') }}" 
                        class="q-input @error('name') border-red-500 @enderror" 
                        placeholder="e.g. Comtesse H&eacute;l&egrave;ne de Valois" 
                        required
                    >
                    @error('name')
                        <span class="q-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Email Address --}}
                <div class="q-field">
                    <label for="contact_email" class="q-label">Email Address *</label>
                    <input 
                        type="email" 
                        id="contact_email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        class="q-input @error('email') border-red-500 @enderror" 
                        placeholder="helene.valois@domaine.fr" 
                        required
                    >
                    @error('email')
                        <span class="q-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Topic / Subject --}}
                <div class="q-field">
                    <label for="contact_subject" class="q-label">Inquiry Nature *</label>
                    <select 
                        id="contact_subject" 
                        name="subject" 
                        class="q-input" 
                        style="background:transparent;cursor:pointer;-webkit-appearance:none;appearance:none;padding-right:24px;"
                        required
                    >
                        <option value="Private Fragrance Consultation" {{ old('subject') === 'Private Fragrance Consultation' ? 'selected' : '' }}>Private Salon Consultation (Paris)</option>
                        <option value="Order & Shipping Inquiry" {{ old('subject') === 'Order & Shipping Inquiry' ? 'selected' : '' }}>Order &amp; Delivery Concierge</option>
                        <option value="Bespoke Seasonal Commission" {{ old('subject') === 'Bespoke Seasonal Commission' ? 'selected' : '' }}>Bespoke Perfume Commission</option>
                        <option value="Press & Media Relations" {{ old('subject') === 'Press & Media Relations' ? 'selected' : '' }}>Editorial &amp; Media Relations</option>
                        <option value="General Brand Inquiry" {{ old('subject') === 'General Brand Inquiry' ? 'selected' : '' }}>General Brand Inquiry</option>
                    </select>
                    @error('subject')
                        <span class="q-error">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Preferred Season Interest --}}
                <div class="q-field">
                    <span class="q-label">Season of Affinity</span>
                    <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:6px;">
                        @foreach([
                            ['spring', "Fleur de l'Aube (Spring)"],
                            ['summer', 'Soléaire (Summer)'],
                            ['autumn', 'Ambre Noir (Autumn)'],
                            ['winter', 'Nuit de Glace (Winter)']
                        ] as [$sKey, $sLabel])
                            <label style="display:inline-flex;align-items:center;gap:6px;font-family:'Raleway',sans-serif;font-size:0.75rem;color:rgba(26,26,26,0.7);cursor:pointer;">
                                <input type="radio" name="season_affinity" value="{{ $sKey }}" style="accent-color:#C9A96E;">
                                <span>{{ $sLabel }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Message --}}
                <div class="q-field">
                    <label for="contact_message" class="q-label">Your Message *</label>
                    <textarea 
                        id="contact_message" 
                        name="message" 
                        rows="5" 
                        class="q-input q-textarea @error('message') border-red-500 @enderror" 
                        placeholder="Describe your inquiry or desired appointment date..." 
                        required
                    >{{ old('message') }}</textarea>
                    @error('message')
                        <span class="q-error">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="q-btn q-btn-dark" style="width:100%;justify-content:center;margin-top:16px;">
                    <span>Transmit to Concierge &rarr;</span>
                </button>
            </form>
        </div>

    </div>
</section>

@endsection
