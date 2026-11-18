import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Lenis from '@studio-freight/lenis';

gsap.registerPlugin(ScrollTrigger);

/* ─── LENIS SMOOTH SCROLL ─────────────────────────────────────────────────── */
let lenis;

function initLenis() {
    // Respect reduced motion preference
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        return;
    }

    lenis = new Lenis({
        duration: 1.4,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        direction: 'vertical',
        gestureDirection: 'vertical',
        smooth: true,
        smoothTouch: false,
        touchMultiplier: 2,
    });

    lenis.on('scroll', ScrollTrigger.update);

    gsap.ticker.add((time) => {
        lenis.raf(time * 1000);
    });

    gsap.ticker.lagSmoothing(0);
}

/* ─── CUSTOM CURSOR ───────────────────────────────────────────────────────── */
function initCursor() {
    const cursor = document.getElementById('qCursor');
    const ring = document.getElementById('qCursorRing');

    if (!cursor || !ring) return;
    if (window.matchMedia('(pointer: coarse)').matches) return;

    let mouseX = 0, mouseY = 0;
    let ringX = 0, ringY = 0;

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        gsap.set(cursor, { x: mouseX, y: mouseY });
    });

    // Lag ring for smooth trail effect
    gsap.ticker.add(() => {
        ringX += (mouseX - ringX) * 0.12;
        ringY += (mouseY - ringY) * 0.12;
        gsap.set(ring, { x: ringX, y: ringY });
    });

    // Hover effects
    const hoverEls = document.querySelectorAll('a, button, [role="button"], .q-product-card, .q-size-btn, .q-qty-btn');
    hoverEls.forEach(el => {
        el.addEventListener('mouseenter', () => {
            cursor.classList.add('hovering');
            ring.classList.add('hovering');
        });
        el.addEventListener('mouseleave', () => {
            cursor.classList.remove('hovering');
            ring.classList.remove('hovering');
        });
    });
}

/* ─── LOADING SCREEN ──────────────────────────────────────────────────────── */
function initLoader() {
    const loader = document.getElementById('qLoader');
    if (!loader) return;

    const letters = loader.querySelectorAll('.q-loader-logo span');
    const line = document.getElementById('loaderLine');
    const tagline = loader.querySelector('.q-loader-tagline');

    const tl = gsap.timeline({
        onComplete: () => {
            gsap.to(loader, {
                yPercent: -100,
                duration: 0.9,
                ease: 'power3.inOut',
                onComplete: () => {
                    loader.style.display = 'none';
                    document.body.style.overflow = '';
                    // Trigger hero entrance
                    animateHeroEntrance();
                }
            });
        }
    });

    document.body.style.overflow = 'hidden';

    tl.to(letters, {
        y: 0,
        opacity: 1,
        stagger: 0.06,
        duration: 0.6,
        ease: 'power3.out',
    })
    .to(line, {
        height: 60,
        duration: 0.8,
        ease: 'power2.out',
    }, '-=0.2')
    .to(tagline, {
        opacity: 1,
        duration: 0.6,
        ease: 'power2.out',
    }, '-=0.4')
    .to({}, { duration: 0.8 }); // pause to read
}

/* ─── HERO ENTRANCE ───────────────────────────────────────────────────────── */
function animateHeroEntrance() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        document.querySelectorAll('.q-hero-eyebrow, .q-hero-tagline, .q-hero-cta, .q-hero-scroll').forEach(el => {
            el.style.opacity = '1';
            el.style.transform = 'none';
        });
        document.querySelectorAll('.q-hero-title .line span, .q-hero-title .line em').forEach(el => {
            el.style.transform = 'none';
        });
        return;
    }

    const tl = gsap.timeline();

    tl.to('.q-hero-orb-1, .q-hero-orb-2', {
        opacity: 1,
        duration: 2,
        ease: 'power2.out',
    })
    .to('.q-hero-eyebrow', {
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: 'power3.out',
    }, '-=1.5')
    .to('.q-hero-title .line span, .q-hero-title .line em', {
        y: 0,
        stagger: 0.08,
        duration: 1.1,
        ease: 'power3.out',
    }, '-=0.5')
    .to('.q-hero-tagline', {
        opacity: 1,
        y: 0,
        duration: 0.7,
        ease: 'power3.out',
    }, '-=0.6')
    .to('.q-hero-cta', {
        opacity: 1,
        y: 0,
        duration: 0.7,
        ease: 'power3.out',
    }, '-=0.5')
    .to('.q-hero-seasons-bar', {
        opacity: 1,
        y: 0,
        duration: 0.7,
        ease: 'power3.out',
    }, '-=0.4')
    .to('.q-hero-scroll', {
        opacity: 1,
        duration: 0.6,
        ease: 'power2.out',
    }, '-=0.3');
}

/* ─── NAVBAR SCROLL BEHAVIOR ──────────────────────────────────────────────── */
function initNav() {
    const nav = document.getElementById('qNav');
    if (!nav) return;

    if (lenis) {
        lenis.on('scroll', ({ scroll }) => {
            updateNav(scroll);
        });
    } else {
        window.addEventListener('scroll', () => updateNav(window.scrollY), { passive: true });
    }

    function updateNav(scroll) {
        if (scroll > 60) {
            nav.classList.add('scrolled');
            nav.classList.remove('dark-nav');
        } else {
            nav.classList.remove('scrolled');
            if (nav.dataset.dark === 'true') {
                nav.classList.add('dark-nav');
            }
        }
    }

    if (nav.classList.contains('dark-nav')) {
        nav.dataset.dark = 'true';
    }
}

/* ─── MOBILE MENU ─────────────────────────────────────────────────────────── */
function initMobileMenu() {
    const hamburger = document.getElementById('qHamburger');
    const menu = document.getElementById('qMobileMenu');
    const links = menu?.querySelectorAll('.q-mobile-link');

    if (!hamburger || !menu) return;

    let isOpen = false;

    hamburger.addEventListener('click', () => {
        isOpen = !isOpen;
        hamburger.classList.toggle('open', isOpen);
        menu.classList.toggle('open', isOpen);
        hamburger.setAttribute('aria-expanded', isOpen.toString());

        if (isOpen) {
            document.body.style.overflow = 'hidden';
            if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                gsap.to(links, {
                    opacity: 1,
                    y: 0,
                    stagger: 0.07,
                    duration: 0.5,
                    ease: 'power3.out',
                });
            } else {
                links?.forEach(l => { l.style.opacity = '1'; l.style.transform = 'none'; });
            }
        } else {
            document.body.style.overflow = '';
            if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                gsap.to(links, {
                    opacity: 0,
                    y: 20,
                    stagger: 0.04,
                    duration: 0.3,
                });
            } else {
                links?.forEach(l => { l.style.opacity = '0'; });
            }
        }
    });

    links?.forEach(link => {
        link.addEventListener('click', () => {
            isOpen = false;
            hamburger.classList.remove('open');
            menu.classList.remove('open');
            document.body.style.overflow = '';
        });
    });
}

/* ─── SCROLL REVEAL ANIMATIONS ───────────────────────────────────────────── */
function initScrollReveal() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        document.querySelectorAll('.q-reveal').forEach(el => {
            el.style.opacity = '1';
            el.style.transform = 'none';
        });
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('revealed');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -50px 0px' });

    document.querySelectorAll('.q-reveal').forEach(el => observer.observe(el));
}

/* ─── SEASON PARALLAX ─────────────────────────────────────────────────────── */
function initSeasonParallax() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const seasons = document.querySelectorAll('.q-season');
    if (!seasons.length) return;

    seasons.forEach(season => {
        const orbs = season.querySelectorAll('.q-season-orb');
        const bottleEl = season.querySelector('.q-bottle-visual');

        ScrollTrigger.create({
            trigger: season,
            start: 'top bottom',
            end: 'bottom top',
            onUpdate: (self) => {
                const progress = self.progress;
                const offset = (progress - 0.5) * 100;

                orbs.forEach((orb, i) => {
                    gsap.set(orb, { y: offset * (i % 2 === 0 ? 0.4 : -0.3) });
                });

                if (bottleEl) {
                    gsap.set(bottleEl, { y: offset * -0.15 });
                }
            }
        });

        // Entrance animation
        const tl = gsap.timeline({
            scrollTrigger: {
                trigger: season,
                start: 'top 80%',
                once: true,
            }
        });

        const textEls = season.querySelectorAll('.q-season-label, .q-season-name, .q-season-subtitle, .q-season-desc, .q-season-notes, .q-btn');
        const bottleVis = season.querySelector('.q-bottle-visual');

        tl.from(textEls, {
            opacity: 0,
            y: 30,
            stagger: 0.08,
            duration: 0.8,
            ease: 'power2.out',
        });

        if (bottleVis) {
            tl.from(bottleVis, {
                opacity: 0,
                scale: 0.95,
                y: 20,
                duration: 0.8,
                ease: 'power2.out',
            }, 0.1);
        }
    });
}

/* ─── PARTICLES (Seasonal) ────────────────────────────────────────────────── */
function initParticles() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const configs = {
        spring: { colors: ['#A8C49A', '#E8C5C5', '#F5F2EC'], count: 12 },
        summer: { colors: ['#C9A44B', '#E8D580', '#FBF6EB'], count: 10 },
        autumn: { colors: ['#C47A45', '#8B4019', '#E8C4A0'], count: 15 },
        winter: { colors: ['#A8C0CC', '#D8E8F0', '#E8F0F5'], count: 8 },
    };

    Object.entries(configs).forEach(([season, config]) => {
        const container = document.querySelector(`.q-season--${season} .q-particles`);
        if (!container) return;

        config.colors.forEach((color) => {
            for (let i = 0; i < Math.ceil(config.count / config.colors.length); i++) {
                const particle = document.createElement('div');
                particle.className = 'q-particle';

                const size = Math.random() * 6 + 2;
                const left = Math.random() * 100;
                const duration = Math.random() * 15 + 10;
                const delay = Math.random() * -15;

                particle.style.cssText = `
                    width: ${size}px;
                    height: ${size}px;
                    left: ${left}%;
                    bottom: -20px;
                    background: ${color};
                    animation-duration: ${duration}s;
                    animation-delay: ${delay}s;
                    opacity: 0.6;
                `;

                container.appendChild(particle);
            }
        });
    });
}

/* ─── CART BADGE ──────────────────────────────────────────────────────────── */
function initCartBadge() {
    const badge = document.getElementById('cartBadge');
    if (!badge) return;

    function updateBadge() {
        try {
            const cart = JSON.parse(localStorage.getItem('quatrea_cart') || '[]');
            const total = cart.reduce((sum, item) => sum + (item.qty || 1), 0);
            if (total > 0) {
                badge.textContent = total;
                badge.style.display = 'flex';
            } else {
                badge.style.display = 'none';
            }
        } catch (e) {
            badge.style.display = 'none';
        }
    }

    updateBadge();
    window.addEventListener('storage', updateBadge);
    window.addEventListener('cartUpdated', updateBadge);
}

/* ─── BAG TOAST NOTIFICATION ──────────────────────────────────────────────── */
let toastTimeout;
window.showBagToast = function(product) {
    const toast = document.getElementById('qBagToast');
    if (!toast) return;

    const titleEl = document.getElementById('toastTitle');
    const detailEl = document.getElementById('toastDetail');
    const thumbEl = document.getElementById('toastThumb');

    if (titleEl) titleEl.textContent = product.name;
    if (detailEl) detailEl.textContent = `${product.size || '50ml'} · $${Number(product.price).toLocaleString()}`;

    if (thumbEl) {
        const seasons = {
            spring: 'linear-gradient(160deg,#D4E8CC,#7A8C6E)',
            summer: 'linear-gradient(160deg,#FBF0CC,#C9A44B)',
            autumn: 'linear-gradient(160deg,#E8C4A0,#8B4019)',
            winter: 'linear-gradient(160deg,#D8E8F0,#6A8C9A)',
        };
        const bgGrad = seasons[product.season] || 'linear-gradient(160deg,#E0C898,#C9A96E)';
        thumbEl.style.background = 'transparent';
        thumbEl.innerHTML = `
            <div style="position:relative;width:34px;height:56px;display:flex;flex-direction:column;align-items:center;">
                <div style="width:18px;height:9px;background:linear-gradient(to right,#F5E6C8,#C9A96E,#8C6230);border-radius:2px;box-shadow:0 2px 4px rgba(0,0,0,0.3);"></div>
                <div style="width:10px;height:3px;background:#C9A96E;"></div>
                <div style="width:34px;height:44px;border-radius:2px 2px 5px 5px;border:1px solid rgba(255,255,255,0.85);background:${bgGrad};box-shadow:0 4px 8px rgba(0,0,0,0.2) inset;position:relative;">
                    <div style="position:absolute;top:0;left:2px;bottom:0;width:2px;background:rgba(255,255,255,0.7);"></div>
                </div>
            </div>
        `;
    }

    toast.style.display = 'block';
    // Trigger transition
    requestAnimationFrame(() => {
        toast.style.transform = 'translateY(0)';
        toast.style.opacity = '1';
    });

    playLuxuryChime();

    clearTimeout(toastTimeout);
    toastTimeout = setTimeout(() => {
        window.hideBagToast();
    }, 4000);
};

window.hideBagToast = function() {
    const toast = document.getElementById('qBagToast');
    if (!toast) return;
    toast.style.transform = 'translateY(-20px)';
    toast.style.opacity = '0';
    setTimeout(() => {
        toast.style.display = 'none';
    }, 400);
};

/* ─── CART UTILITIES ──────────────────────────────────────────────────────── */
window.QuatreaCart = {
    get() {
        try {
            return JSON.parse(localStorage.getItem('quatrea_cart') || '[]');
        } catch (e) {
            return [];
        }
    },

    save(cart) {
        localStorage.setItem('quatrea_cart', JSON.stringify(cart));
        window.dispatchEvent(new Event('cartUpdated'));
    },

    add(product) {
        const cart = this.get();
        const existing = cart.find(i => i.id === product.id && i.size === product.size);
        if (existing) {
            existing.qty = (existing.qty || 1) + (product.qty || 1);
        } else {
            cart.push({ ...product, qty: product.qty || 1 });
        }
        this.save(cart);

        // Show elegant floating notification
        window.showBagToast(product);
    },

    remove(id, size) {
        const cart = this.get().filter(i => !(i.id === id && i.size === size));
        this.save(cart);
    },

    updateQty(id, size, qty) {
        const cart = this.get();
        const item = cart.find(i => i.id === id && i.size === size);
        if (item) {
            if (qty < 1) {
                this.remove(id, size);
                return;
            }
            item.qty = qty;
            this.save(cart);
        }
    },

    total() {
        return this.get().reduce((sum, item) => sum + (item.price * (item.qty || 1)), 0);
    },

    count() {
        return this.get().reduce((sum, item) => sum + (item.qty || 1), 0);
    }
};

/* ─── NEWSLETTER VALIDATION ───────────────────────────────────────────────── */
function initNewsletterForm() {
    const form = document.getElementById('footerNewsletter');
    if (!form) return;

    form.addEventListener('submit', (e) => {
        const emailInput = form.querySelector('input[type="email"]');
        const val = emailInput?.value?.trim();
        if (!val || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) {
            e.preventDefault();
            emailInput?.classList.add('border-red-400');
            setTimeout(() => emailInput?.classList.remove('border-red-400'), 2000);
        }
    });
}

/* ─── FRAGRANCE ADVISOR QUIZ ──────────────────────────────────────────────── */
function initFragranceAdvisor() {
    const modal = document.getElementById('advisorModal');
    const openBtns = document.querySelectorAll('.q-open-advisor');
    const closeBtn = document.getElementById('closeAdvisorBtn');

    if (!modal) return;

    let scores = { spring: 0, summer: 0, autumn: 0, winter: 0 };
    let currentStep = 1;

    function openModal() {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        resetQuiz();
    }

    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }

    function resetQuiz() {
        scores = { spring: 0, summer: 0, autumn: 0, winter: 0 };
        currentStep = 1;
        document.getElementById('advisorStep1').style.display = 'block';
        document.getElementById('advisorStep2').style.display = 'none';
        document.getElementById('advisorStep3').style.display = 'none';
        document.getElementById('advisorResult').style.display = 'none';
    }

    openBtns.forEach(btn => btn.addEventListener('click', openModal));
    closeBtn?.addEventListener('click', closeModal);

    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    const options = modal.querySelectorAll('.advisor-opt');
    options.forEach(opt => {
        opt.addEventListener('click', () => {
            const season = opt.dataset.season;
            scores[season] = (scores[season] || 0) + 1;

            if (currentStep === 1) {
                currentStep = 2;
                document.getElementById('advisorStep1').style.display = 'none';
                document.getElementById('advisorStep2').style.display = 'block';
            } else if (currentStep === 2) {
                currentStep = 3;
                document.getElementById('advisorStep2').style.display = 'none';
                document.getElementById('advisorStep3').style.display = 'block';
            } else if (currentStep === 3) {
                document.getElementById('advisorStep3').style.display = 'none';
                showResult();
            }
        });
    });

    function showResult() {
        const topSeason = Object.keys(scores).reduce((a, b) => scores[a] >= scores[b] ? a : b);
        
        const data = {
            spring: {
                name: "Fleur de l'Aube",
                slug: 'fleur-de-laube',
                seasonLabel: 'Spring Affinity — Extrait de Parfum',
                desc: 'Your essence belongs to the morning light. A delicate symphony of white peony, crisp bergamot, and morning jasmine that brings renewal with every pulse.',
                price: 195,
                bg: 'linear-gradient(160deg,#D4E8CC,#7A8C6E)'
            },
            summer: {
                name: 'Soléré',
                slug: 'solere',
                seasonLabel: 'Summer Affinity — Extrait de Parfum',
                desc: 'Your spirit seeks radiant Mediterranean brilliance. Sparkling mandarin zest and golden neroli unfold into honeyed orange blossom and sun-kissed vanilla.',
                price: 215,
                bg: 'linear-gradient(160deg,#FBF0CC,#C9A44B)'
            },
            autumn: {
                name: 'Ambre Noir',
                slug: 'ambre-noir',
                seasonLabel: 'Autumn Affinity — Extrait de Parfum',
                desc: 'You resonate with intimate warmth and timeless mystery. Deep amber resins and sandalwood are enriched with cardamom and velvety patchouli.',
                price: 225,
                bg: 'linear-gradient(160deg,#E8C4A0,#8B4019)'
            },
            winter: {
                name: 'Nuit de Glace',
                slug: 'nuit-de-glace',
                seasonLabel: 'Winter Affinity — Extrait de Parfum',
                desc: 'Your aura is pure, crystalline, and unforgettable. Noble iris root blooming through ice, anchored by structural cedarwood and delicate cardamom.',
                price: 235,
                bg: 'linear-gradient(160deg,#D8E8F0,#6A8C9A)'
            }
        };

        const res = data[topSeason];
        const resEl = document.getElementById('advisorResult');
        const thumbEl = document.getElementById('advResultThumb');
        const seasonEl = document.getElementById('advResultSeason');
        const nameEl = document.getElementById('advResultName');
        const descEl = document.getElementById('advResultDesc');
        const linkEl = document.getElementById('advResultLink');
        const addBagBtn = document.getElementById('advResultAddBag');

        if (thumbEl) {
            thumbEl.style.background = 'transparent';
            thumbEl.innerHTML = `
                <div style="position:relative;width:52px;height:90px;display:flex;flex-direction:column;align-items:center;">
                    <div style="width:26px;height:14px;background:linear-gradient(to right,#F5E6C8,#C9A96E,#8C6230);border-radius:2px;box-shadow:0 3px 6px rgba(0,0,0,0.35);"></div>
                    <div style="width:14px;height:5px;background:#C9A96E;"></div>
                    <div style="width:52px;height:71px;border-radius:3px 3px 8px 8px;border:1.5px solid rgba(255,255,255,0.9);background:${res.bg};box-shadow:0 8px 16px rgba(0,0,0,0.25) inset;position:relative;">
                        <div style="position:absolute;top:0;left:3px;bottom:0;width:3px;background:rgba(255,255,255,0.75);"></div>
                        <div style="position:absolute;bottom:14px;left:6px;right:6px;background:#FFF;padding:3px;border:0.5px solid #C9A96E;text-align:center;">
                            <span style="font-family:'Cormorant Garamond',serif;font-size:0.5rem;display:block;color:#1A1A1A;font-weight:600;line-height:1;">QUATRÉA</span>
                        </div>
                    </div>
                </div>
            `;
        }
        if (seasonEl) seasonEl.textContent = res.seasonLabel;
        if (nameEl) nameEl.textContent = res.name;
        if (descEl) descEl.textContent = res.desc;
        if (linkEl) linkEl.href = `/product/${res.slug}`;

        if (addBagBtn) {
            addBagBtn.onclick = () => {
                window.QuatreaCart.add({
                    id: res.slug,
                    name: res.name,
                    season: topSeason,
                    size: '50ml',
                    price: res.price
                });
                closeModal();
            };
        }

        resEl.style.display = 'block';
    }
}

/* ─── WEB AUDIO LUXURY CHIME & SOUNDSCAPE ─────────────────────────────────── */
/* ═══════════════════════════════════════════════════════════════════════════
   MULTI-CURRENCY ATELIER SYSTEM (USD, EUR, GBP)
═══════════════════════════════════════════════════════════════════════════ */
const currencyRates = {
    USD: { symbol: '$', rate: 1.0 },
    EUR: { symbol: '€', rate: 0.92 },
    GBP: { symbol: '£', rate: 0.79 },
};

let currentCurrency = localStorage.getItem('quatrea_currency') || 'USD';

window.formatPrice = function(usdAmount) {
    const curr = currencyRates[currentCurrency] || currencyRates.USD;
    const converted = Math.round(usdAmount * curr.rate);
    return `${curr.symbol}${converted.toLocaleString()}`;
};

function initCurrencySystem() {
    const wrap = document.querySelector('.q-currency-wrap');
    const toggleBtn = document.getElementById('currencyToggleBtn');
    const dropdown = document.getElementById('currencyDropdown');
    const codeSpan = document.getElementById('activeCurrencyCode');
    const symbolSpan = document.getElementById('activeCurrencySymbol');
    const opts = document.querySelectorAll('.q-currency-opt, .q-mobile-currency-btn');

    function applyCurrency(code) {
        if (!currencyRates[code]) return;
        currentCurrency = code;
        localStorage.setItem('quatrea_currency', code);

        const curr = currencyRates[code];
        if (codeSpan) codeSpan.textContent = code;
        if (symbolSpan) symbolSpan.textContent = curr.symbol;

        opts.forEach(opt => {
            const isMatch = opt.dataset.currency === code;
            opt.classList.toggle('selected', isMatch);
            if (opt.classList.contains('q-mobile-currency-btn')) {
                opt.style.borderColor = isMatch ? '#C9A96E' : 'rgba(255,255,255,0.2)';
                opt.style.color = isMatch ? '#C9A96E' : '#F8F4EF';
            }
        });

        window.dispatchEvent(new CustomEvent('currencyChanged', { detail: { currency: code, ...curr } }));

        if (typeof window.renderBag === 'function') {
            window.renderBag();
        }
    }

    toggleBtn?.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdown?.classList.toggle('active');
        toggleBtn.setAttribute('aria-expanded', dropdown?.classList.contains('active') ? 'true' : 'false');
    });

    document.addEventListener('click', () => {
        dropdown?.classList.remove('active');
        toggleBtn?.setAttribute('aria-expanded', 'false');
    });

    opts.forEach(opt => {
        opt.addEventListener('click', () => {
            applyCurrency(opt.dataset.currency);
            dropdown?.classList.remove('active');
            playLuxuryChime();
        });
    });

    applyCurrency(currentCurrency);
}

/* ═══════════════════════════════════════════════════════════════════════════
   WEB AUDIO LUXURY AMBIENT SOUNDSCAPE & GLASS CHIME
═══════════════════════════════════════════════════════════════════════════ */
let audioCtx;
let isSoundEnabled = false;
let ambientOscs = [];
let ambientGain;

function playLuxuryChime() {
    if (!isSoundEnabled) return;
    try {
        if (!audioCtx) audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        if (audioCtx.state === 'suspended') audioCtx.resume();

        const osc = audioCtx.createOscillator();
        const gain = audioCtx.createGain();

        osc.type = 'sine';
        osc.frequency.setValueAtTime(880, audioCtx.currentTime); // A5
        osc.frequency.exponentialRampToValueAtTime(1760, audioCtx.currentTime + 0.35); // A6

        gain.gain.setValueAtTime(0.09, audioCtx.currentTime);
        gain.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.9);

        osc.connect(gain);
        gain.connect(audioCtx.destination);

        osc.start();
        osc.stop(audioCtx.currentTime + 0.9);
    } catch (e) {}
}

function startAmbientPad() {
    try {
        if (!audioCtx) audioCtx = new (window.AudioContext || window.webkitAudioContext)();
        if (audioCtx.state === 'suspended') audioCtx.resume();

        stopAmbientPad();

        ambientGain = audioCtx.createGain();
        ambientGain.gain.setValueAtTime(0.001, audioCtx.currentTime);
        ambientGain.gain.exponentialRampToValueAtTime(0.032, audioCtx.currentTime + 2.5);

        // Classical Grasse Atelier Chord: A3, C#4, E4, G#4
        const freqs = [220, 277.18, 329.63, 415.30];
        ambientOscs = freqs.map((f, i) => {
            const osc = audioCtx.createOscillator();
            osc.type = 'sine';
            osc.frequency.setValueAtTime(f, audioCtx.currentTime);

            const filter = audioCtx.createBiquadFilter();
            filter.type = 'lowpass';
            filter.frequency.setValueAtTime(550 + i * 160, audioCtx.currentTime);

            osc.connect(filter);
            filter.connect(ambientGain);
            osc.start();
            return osc;
        });

        ambientGain.connect(audioCtx.destination);
    } catch (e) {}
}

function stopAmbientPad() {
    if (ambientGain && audioCtx) {
        try {
            ambientGain.gain.setValueAtTime(ambientGain.gain.value, audioCtx.currentTime);
            ambientGain.gain.exponentialRampToValueAtTime(0.0001, audioCtx.currentTime + 1.2);
            setTimeout(() => {
                ambientOscs.forEach(o => { try { o.stop(); o.disconnect(); } catch (e) {} });
                ambientOscs = [];
            }, 1300);
        } catch (e) {
            ambientOscs.forEach(o => { try { o.stop(); o.disconnect(); } catch (e) {} });
            ambientOscs = [];
        }
    }
}

function initAtmosphereSound() {
    const btn = document.getElementById('soundToggleBtn');
    const iconMuted = document.getElementById('soundIconMuted');
    const iconActive = document.getElementById('soundIconActive');

    if (!btn) return;

    btn.addEventListener('click', () => {
        isSoundEnabled = !isSoundEnabled;

        if (iconMuted) iconMuted.style.display = isSoundEnabled ? 'none' : 'block';
        if (iconActive) iconActive.style.display = isSoundEnabled ? 'block' : 'none';

        btn.setAttribute('title', isSoundEnabled ? 'Sound Active · Click to mute' : 'Atmospheric Soundscape: Click to unmute');
        btn.setAttribute('aria-pressed', isSoundEnabled ? 'true' : 'false');
        btn.classList.toggle('active', isSoundEnabled);

        if (isSoundEnabled) {
            playLuxuryChime();
            startAmbientPad();
        } else {
            stopAmbientPad();
        }
    });
}

/* ═══════════════════════════════════════════════════════════════════════════
   HERO SEASONAL QUICK-BAR
═══════════════════════════════════════════════════════════════════════════ */
function initHeroSeasonBar() {
    const pills = document.querySelectorAll('.q-hero-season-pill');
    pills.forEach(pill => {
        pill.addEventListener('click', () => {
            const targetSelector = pill.getAttribute('data-target');
            const targetEl = document.querySelector(targetSelector);
            if (!targetEl) return;

            playLuxuryChime();

            if (window.__lenis) {
                window.__lenis.scrollTo(targetEl, { offset: -60, duration: 1.4 });
            } else {
                targetEl.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
}

/* ═══════════════════════════════════════════════════════════════════════════
   3D FLACON MOUSE PHYSICS (HOMEPAGE & PRODUCT PAGE)
═══════════════════════════════════════════════════════════════════════════ */
function init3DFlaconPhysics() {
    if (window.matchMedia('(pointer: coarse)').matches) return;

    const containers = document.querySelectorAll('.q-bottle, #bottle3DContainer');
    containers.forEach(container => {
        const visual = container.querySelector('.q-bottle-visual, #bottle3DTarget');
        if (!visual) return;

        let rect = container.getBoundingClientRect();
        window.addEventListener('resize', () => {
            rect = container.getBoundingClientRect();
        });

        container.addEventListener('mouseenter', () => {
            rect = container.getBoundingClientRect();
        });

        container.addEventListener('mousemove', (e) => {
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;

            gsap.to(visual, {
                rotateY: x * 22,
                rotateX: -y * 22,
                scale: 1.04,
                duration: 0.35,
                ease: 'power2.out',
                transformPerspective: 1000,
            });
        });

        container.addEventListener('mouseleave', () => {
            gsap.to(visual, {
                rotateY: 0,
                rotateX: 0,
                scale: 1,
                duration: 0.8,
                ease: 'elastic.out(1, 0.5)',
            });
        });
    });
}

/* ═══════════════════════════════════════════════════════════════════════════
   UNIVERSAL INTERACTIVE QUICK VIEW MODAL
═══════════════════════════════════════════════════════════════════════════ */
const perfumeCatalog = {
    'fleur-de-laube': {
        name: "Fleur de l'Aube",
        season: 'spring',
        seasonLabel: 'Spring Affinity · Extrait de Parfum',
        tagline: 'The bloom of dawn',
        desc: "As the first light of April touches the garden, peony petals unfurl one by one. Bergamot-kissed air and white musk linger on dewy skin.",
        price50: 195,
        price100: 320,
        price200: 460,
        notes: ['Peony', 'Bergamot', 'Jasmine Absolute', 'White Musk', 'Pink Pepper'],
        bg: 'linear-gradient(160deg,#D4E8CC,#7A8C6E)',
        color: '#7A8C6E'
    },
    'solere': {
        name: 'Soléaire',
        season: 'summer',
        seasonLabel: 'Summer Affinity · Extrait de Parfum',
        tagline: 'Golden Mediterranean light',
        desc: "Mandarin sparkling like sunlight on water, neroli opening in the warm afternoon breeze, woven with rich bourbon vanilla.",
        price50: 215,
        price100: 350,
        price200: 490,
        notes: ['Mandarin', 'Neroli', 'Orange Blossom', 'Vanilla Bourbon', 'Lemon Zest'],
        bg: 'linear-gradient(160deg,#FBF0CC,#C9A44B)',
        color: '#C9A44B'
    },
    'ambre-noir': {
        name: 'Ambre Noir',
        season: 'autumn',
        seasonLabel: 'Autumn Affinity · Extrait de Parfum',
        tagline: 'The warmth of fallen leaves',
        desc: "October forests shrouded in amber light. The resinous warmth of amber unfolds around creamy sandalwood and cinnamon spice.",
        price50: 225,
        price100: 370,
        price200: 515,
        notes: ['Amber Resin', 'Sandalwood', 'Cinnamon', 'Patchouli Heart', 'Cardamom'],
        bg: 'linear-gradient(160deg,#E8C4A0,#8B4019)',
        color: '#B5651D'
    },
    'nuit-de-glace': {
        name: 'Nuit de Glace',
        season: 'winter',
        seasonLabel: 'Winter Affinity · Extrait de Parfum',
        tagline: 'A frosted winter night',
        desc: "Iris, cold and crystalline like frosted glass, meets the quiet strength of cedarwood and paradoxical warmth of cardamom.",
        price50: 235,
        price100: 385,
        price200: 530,
        notes: ['Iris Root', 'Cedarwood', 'White Musk', 'Cardamom', 'Ozonic Accord'],
        bg: 'linear-gradient(160deg,#D8E8F0,#6A8C9A)',
        color: '#6A8C9A'
    }
};

function initQuickViewModal() {
    const modal = document.getElementById('quickViewModal');
    const closeBtn = document.getElementById('closeQuickViewBtn');
    const bottleContainer = document.getElementById('qvBottleContainer');
    const seasonLabel = document.getElementById('qvSeasonLabel');
    const title = document.getElementById('qvTitle');
    const tagline = document.getElementById('qvTagline');
    const desc = document.getElementById('qvDesc');
    const priceEl = document.getElementById('qvPrice');
    const notesTags = document.getElementById('qvNotesTags');
    const sizeBtns = document.querySelectorAll('.q-qv-size-btn');
    const addBagBtn = document.getElementById('qvAddBagBtn');
    const btnPrice = document.getElementById('qvBtnPrice');
    const fullLink = document.getElementById('qvFullPageLink');

    if (!modal) return;

    let activeSlug = 'fleur-de-laube';
    let currentSelectedSize = '50ml';

    function openModal(slug) {
        const item = perfumeCatalog[slug] || perfumeCatalog['fleur-de-laube'];
        activeSlug = slug;
        currentSelectedSize = '50ml';

        if (seasonLabel) seasonLabel.textContent = item.seasonLabel;
        if (title) title.textContent = item.name;
        if (tagline) tagline.textContent = item.tagline;
        if (desc) desc.textContent = item.desc;
        if (fullLink) fullLink.href = `/product/${slug}`;

        // Render Flacon
        if (bottleContainer) {
            bottleContainer.innerHTML = `
                <div style="position:relative;width:130px;height:230px;display:flex;flex-direction:column;align-items:center;filter:drop-shadow(0 25px 35px rgba(0,0,0,0.35));">
                    <div style="width:68px;height:34px;background:linear-gradient(to right,#F5E6C8,#E0C898,#C9A96E,#8C6230);border-radius:3px;box-shadow:0 3px 6px rgba(0,0,0,0.35);border:1px solid rgba(255,255,255,0.4);position:relative;">
                        <div style="position:absolute;top:0;left:6px;bottom:0;width:3px;background:rgba(255,255,255,0.5);"></div>
                    </div>
                    <div style="width:40px;height:12px;background:linear-gradient(to right,#8C6230,#E0C898,#8C6230);"></div>
                    <div style="width:130px;height:184px;border-radius:6px 6px 14px 14px;border:2px solid rgba(255,255,255,0.85);background:${item.bg};position:relative;box-shadow:0 12px 28px rgba(0,0,0,0.25) inset;overflow:hidden;">
                        <div style="position:absolute;top:0;left:6px;bottom:0;width:6px;background:rgba(255,255,255,0.65);"></div>
                        <div style="position:absolute;top:0;left:50%;bottom:20px;width:2px;background:rgba(255,255,255,0.6);transform:translateX(-50%);"></div>
                        <div style="position:absolute;bottom:0;left:0;right:0;height:32px;background:linear-gradient(to bottom,rgba(255,255,255,0.1),rgba(255,255,255,0.4));border-top:1px solid rgba(255,255,255,0.4);"></div>
                        <div style="position:absolute;bottom:50px;left:18px;right:18px;background:#FFF;padding:8px 6px;border:1px solid #C9A96E;text-align:center;box-shadow:0 4px 10px rgba(0,0,0,0.15);">
                            <span style="font-family:'Cormorant Garamond',Georgia,serif;font-size:0.65rem;letter-spacing:0.25em;color:#1A1A1A;display:block;font-weight:600;">QUATRÉA</span>
                            <span style="font-family:'Cormorant Garamond',Georgia,serif;font-size:0.85rem;font-style:italic;color:#1A1A1A;display:block;margin-top:2px;">${item.name}</span>
                        </div>
                    </div>
                </div>
            `;
        }

        // Render notes
        if (notesTags) {
            notesTags.innerHTML = item.notes.map(n => `
                <span style="font-family:'Raleway',sans-serif;font-size:0.65rem;padding:4px 10px;background:rgba(26,26,26,0.05);border:1px solid rgba(26,26,26,0.1);border-radius:2px;color:#1A1A1A;">${n}</span>
            `).join('');
        }

        updatePrice();

        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
        playLuxuryChime();
    }

    function closeModal() {
        modal.style.display = 'none';
        document.body.style.overflow = '';
    }

    function updatePrice() {
        const item = perfumeCatalog[activeSlug];
        if (!item) return;
        const key = 'price' + currentSelectedSize.replace('ml', '');
        const p = item[key] || item.price50;

        if (priceEl) priceEl.textContent = `${window.formatPrice(p)} / ${currentSelectedSize}`;
        if (btnPrice) btnPrice.textContent = window.formatPrice(p);
    }

    sizeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            sizeBtns.forEach(b => {
                b.style.background = '#FFF';
                b.style.color = '#1A1A1A';
                b.classList.remove('active');
            });
            btn.classList.add('active');
            btn.style.background = '#1A1A1A';
            btn.style.color = '#FFF';
            currentSelectedSize = btn.dataset.size;
            updatePrice();
        });
    });

    addBagBtn?.addEventListener('click', () => {
        const item = perfumeCatalog[activeSlug];
        if (!item) return;
        const key = 'price' + currentSelectedSize.replace('ml', '');
        const p = item[key] || item.price50;

        window.QuatreaCart.add({
            id: activeSlug,
            name: item.name,
            season: item.season,
            size: currentSelectedSize,
            price: p,
            color: item.color
        });
        closeModal();
    });

    document.querySelectorAll('.q-quick-view-btn, .q-open-qv').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const slug = btn.dataset.slug || 'fleur-de-laube';
            openModal(slug);
        });
    });

    closeBtn?.addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });

    window.addEventListener('currencyChanged', updatePrice);
}

/* ═══════════════════════════════════════════════════════════════════════════
   FRAGRANCE LAYERING ATELIER (BESPOKE SCENT DUO SIMULATOR)
═══════════════════════════════════════════════════════════════════════════ */
function initFragranceLayering() {
    const section = document.getElementById('fragranceLayering');
    if (!section) return;

    const layerPills = section.querySelectorAll('.q-layer-pill');
    let seasonA = 'spring';
    let seasonB = 'autumn';

    const layeringMatrix = {
        'spring+summer': {
            title: "L'Accord Solaire Floral",
            desc: "Pristine white peony petals and luminous Italian bergamot infused with honeyed Mediterranean neroli and sunlit mandarin. A joyful, effervescent radiance.",
            synergy: '96%',
            price: 360
        },
        'spring+autumn': {
            title: "L'Accord Crépusculaire",
            desc: "The ethereal freshness of dawn peony meets opulent balsamic amber and Mysore sandalwood, cultivating an intimate, hypnotic sillage.",
            synergy: '98%',
            price: 375
        },
        'spring+winter': {
            title: "L'Aube Céleste",
            desc: "Dewy garden blooms kissed by crystalline Florentine orris iris and cedarwood, crafting a pure, aristocratic and unforgettable signature.",
            synergy: '94%',
            price: 380
        },
        'summer+autumn': {
            title: "L'Or d'Octobre",
            desc: "Luminous mandarin zest and rich orange blossom drifting through velvety amber resins and cinnamon warmth. Pure golden hour bottled.",
            synergy: '97%',
            price: 390
        },
        'summer+winter': {
            title: "L'Ombre Solaire",
            desc: "Sunlit neroli effervescence juxtaposed with frosted mountain cedar and cardamom spice. A striking, magnetic contrast of fire and ice.",
            synergy: '93%',
            price: 395
        },
        'autumn+winter': {
            title: "Nuit d'Ambre Éternelle",
            desc: "Deep ancient amber resins and smoky patchouli anchored by aristocratic iris root and dark winter musk. Majestic, mysterious and profound.",
            synergy: '99%',
            price: 410
        }
    };

    function updateLayering() {
        const key1 = `${seasonA}+${seasonB}`;
        const key2 = `${seasonB}+${seasonA}`;
        const result = layeringMatrix[key1] || layeringMatrix[key2] || {
            title: "L'Harmonie Pure",
            desc: "Two distinct seasonal extraits resonating in delicate equilibrium across pulse points.",
            synergy: '95%',
            price: 375
        };

        const titleEl = document.getElementById('layerChordTitle');
        const descEl = document.getElementById('layerChordDesc');
        const synergyPct = document.getElementById('layerSynergyPercent');
        const synergyBar = document.getElementById('layerSynergyBar');
        const priceEl = document.getElementById('layerDuoPrice');

        if (titleEl) titleEl.textContent = result.title;
        if (descEl) descEl.textContent = result.desc;
        if (synergyPct) synergyPct.textContent = result.synergy + ' Synergy';
        if (synergyBar) synergyBar.style.width = result.synergy;
        if (priceEl) priceEl.textContent = window.formatPrice(result.price);

        // Update Slot A
        const itemA = perfumeCatalog[getSlug(seasonA)];
        if (itemA) {
            document.getElementById('layerNameA').textContent = itemA.name;
            document.getElementById('layerSubtitleA').textContent = `${seasonA.toUpperCase()} · ${itemA.notes.slice(0, 2).join(' & ').toUpperCase()}`;
        }

        // Update Slot B
        const itemB = perfumeCatalog[getSlug(seasonB)];
        if (itemB) {
            document.getElementById('layerNameB').textContent = itemB.name;
            document.getElementById('layerSubtitleB').textContent = `${seasonB.toUpperCase()} · ${itemB.notes.slice(0, 2).join(' & ').toUpperCase()}`;
        }
    }

    function getSlug(season) {
        const map = { spring: 'fleur-de-laube', summer: 'solere', autumn: 'ambre-noir', winter: 'nuit-de-glace' };
        return map[season] || 'fleur-de-laube';
    }

    layerPills.forEach(pill => {
        pill.addEventListener('click', () => {
            const slot = pill.dataset.slot;
            const season = pill.dataset.season;

            section.querySelectorAll(`.q-layer-pill[data-slot="${slot}"]`).forEach(p => {
                p.classList.remove('active');
                p.style.background = 'transparent';
                p.style.borderColor = 'rgba(255,255,255,0.15)';
                p.style.color = 'rgba(248,244,239,0.6)';
            });

            pill.classList.add('active');
            pill.style.background = 'rgba(201,169,110,0.25)';
            pill.style.borderColor = '#C9A96E';
            pill.style.color = '#F8F4EF';

            if (slot === 'A') seasonA = season;
            if (slot === 'B') seasonB = season;

            updateLayering();
            playLuxuryChime();
        });
    });

    document.getElementById('addLayeringDuoBtn')?.addEventListener('click', () => {
        const slugA = getSlug(seasonA);
        const slugB = getSlug(seasonB);
        const itemA = perfumeCatalog[slugA];
        const itemB = perfumeCatalog[slugB];

        if (itemA && itemB) {
            window.QuatreaCart.add({ id: slugA, name: itemA.name + ' (Duo Coffret)', season: seasonA, size: '50ml', price: Math.round(itemA.price50 * 0.85) });
            window.QuatreaCart.add({ id: slugB, name: itemB.name + ' (Duo Coffret)', season: seasonB, size: '50ml', price: Math.round(itemB.price50 * 0.85) });
        }
    });

    window.addEventListener('currencyChanged', updateLayering);
    updateLayering();
}

/* ═══════════════════════════════════════════════════════════════════════════
   COLLECTION FILTERS (ALL, SPRING, SUMMER, AUTUMN, WINTER)
═══════════════════════════════════════════════════════════════════════════ */
function initCollectionFilters() {
    const filters = document.querySelectorAll('.q-collection-filter');
    const items = document.querySelectorAll('.q-collection-item');
    if (!filters.length || !items.length) return;

    filters.forEach(filter => {
        filter.addEventListener('click', () => {
            const f = filter.dataset.filter;

            filters.forEach(btn => {
                btn.classList.remove('active');
                btn.setAttribute('aria-pressed', 'false');
                btn.style.color = 'rgba(26,26,26,0.4)';
                btn.style.borderBottomColor = 'transparent';
            });
            filter.classList.add('active');
            filter.setAttribute('aria-pressed', 'true');
            filter.style.color = '#1A1A1A';
            filter.style.borderBottomColor = '#C9A96E';

            items.forEach(item => {
                if (f === 'all' || item.dataset.season === f) {
                    item.style.display = 'block';
                    gsap.fromTo(item, { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.5, ease: 'power2.out' });
                } else {
                    item.style.display = 'none';
                }
            });

            playLuxuryChime();
        });
    });
}

/* ═══════════════════════════════════════════════════════════════════════════
   OLFACTORY NOTES SENSORY INSPECTOR
═══════════════════════════════════════════════════════════════════════════ */
function initOlfactoryInspector() {
    const noteItems = document.querySelectorAll('.q-pyramid-note-item');
    if (!noteItems.length) return;

    let inspectorEl = document.getElementById('qNoteInspector');
    if (!inspectorEl) {
        inspectorEl = document.createElement('div');
        inspectorEl.id = 'qNoteInspector';
        inspectorEl.className = 'q-note-inspector-overlay';
        inspectorEl.innerHTML = `
            <div class="q-note-inspector-card">
                <button type="button" class="q-note-close" aria-label="Close Note Inspector">&times;</button>
                <div class="q-note-eyebrow">✦ Haute Parfumerie Profile</div>
                <h3 class="q-note-title" id="qNoteTitle">Bergamot</h3>
                <div class="q-note-origin" id="qNoteOrigin">Harvested in Calabria, Southern Italy</div>
                <div class="q-note-metrics">
                    <div class="q-note-metric-row">
                        <span class="q-metric-label">Freshness Spectrum</span>
                        <div class="q-metric-track"><div class="q-metric-fill" id="metricFreshness"></div></div>
                    </div>
                    <div class="q-note-metric-row">
                        <span class="q-metric-label">Sensory Warmth</span>
                        <div class="q-metric-track"><div class="q-metric-fill" id="metricWarmth"></div></div>
                    </div>
                    <div class="q-note-metric-row">
                        <span class="q-metric-label">Sillage / Projection</span>
                        <div class="q-metric-track"><div class="q-metric-fill" id="metricProjection"></div></div>
                    </div>
                </div>
                <p class="q-note-desc" id="qNoteDesc"></p>
                <div class="q-note-footer">QUATRÉA Atelier Collection · Pure Extraction</div>
            </div>
        `;
        document.body.appendChild(inspectorEl);

        inspectorEl.querySelector('.q-note-close').addEventListener('click', () => {
            inspectorEl.classList.remove('active');
        });
        inspectorEl.addEventListener('click', (e) => {
            if (e.target === inspectorEl) inspectorEl.classList.remove('active');
        });
    }

    const noteDatabase = {
        'Bergamot': { origin: 'Calabria, Southern Italy', freshness: '96%', warmth: '25%', projection: '88%', desc: 'Sun-drenched citrus with a distinctive aromatic sparkle, hand-pressed at dawn before Mediterranean heat arrives.' },
        'Mandarin': { origin: 'Sicily, Italy', freshness: '92%', warmth: '38%', projection: '82%', desc: 'Luminous, honeyed zest releasing golden effervescence, capturing the warmth of coastal groves.' },
        'Cardamom': { origin: 'Guatemala Highlands', freshness: '65%', warmth: '82%', projection: '90%', desc: 'A crystalline, cooling aromatic spice that blooms instantly into an intimate, crackling warmth.' },
        'Peony': { origin: 'Grasse, France', freshness: '88%', warmth: '45%', projection: '78%', desc: 'Dew-kissed, ethereal floral petals that mirror the pristine freshness of an early May morning in Paris.' },
        'Jasmine Absolute': { origin: 'Grasse, France', freshness: '70%', warmth: '78%', projection: '94%', desc: 'Opulent, narcotic night-blooming white jasmine harvested in darkness to preserve volatile essences.' },
        'Neroli': { origin: 'Cap Bon, Tunisia & Grasse', freshness: '94%', warmth: '42%', projection: '85%', desc: 'Steam-distilled bitter orange blossoms offering an aristocratic fusion of citrus brilliance and honeyed grace.' },
        'Orange Blossom': { origin: 'Nabeul, Tunisia', freshness: '80%', warmth: '62%', projection: '88%', desc: 'Golden, nectar-rich white floral accord radiating warmth and luxurious midday sun.' },
        'Amber Resin': { origin: 'Baltic Coastline', freshness: '18%', warmth: '98%', projection: '96%', desc: 'Fossilized amber tree tears slowly aged to achieve an opulent, honeyed warmth fusing organically with skin.' },
        'Sandalwood': { origin: 'Mysore, India', freshness: '28%', warmth: '92%', projection: '86%', desc: 'Creamy, sacred wood heartwood aged for decades to cultivate a meditative, smoky softness.' },
        'Iris Root': { origin: 'Florence, Tuscany', freshness: '62%', warmth: '68%', projection: '90%', desc: 'Precious Florentine Orris butter aged underground for three seasons, delivering an exquisite aristocratic suede texture.' },
        'White Musk': { origin: 'High Alpine Atelier', freshness: '86%', warmth: '58%', projection: '80%', desc: 'Pure, gossamer second-skin veil that leaves an unforgettable ethereal signature in the air.' },
        'Vanilla Bourbon': { origin: 'Sava Region, Madagascar', freshness: '15%', warmth: '96%', projection: '92%', desc: 'Smoky, charred black gourmet pods drenched in rum facets, rich, dark, and utterly intoxicating.' },
        'Cedarwood': { origin: 'Atlas Mountains, Morocco', freshness: '52%', warmth: '86%', projection: '82%', desc: 'Noble, resinous pencil-shaving cedar evoking ancient sacred temples and quiet mountain evenings.' },
    };

    noteItems.forEach(item => {
        item.style.cursor = 'pointer';
        item.setAttribute('title', 'Click to inspect olfactory profile');
        item.addEventListener('click', () => {
            const name = item.querySelector('span')?.textContent.trim() || item.textContent.trim();
            const data = noteDatabase[name] || {
                origin: 'Master Atelier, Grasse',
                freshness: '78%',
                warmth: '65%',
                projection: '82%',
                desc: 'An exquisite botanical essence extracted through artisanal methods in our Grasse laboratory.'
            };

            document.getElementById('qNoteTitle').textContent = name;
            document.getElementById('qNoteOrigin').textContent = 'Provenance: ' + data.origin;
            document.getElementById('qNoteDesc').textContent = data.desc;
            document.getElementById('metricFreshness').style.width = data.freshness;
            document.getElementById('metricWarmth').style.width = data.warmth;
            document.getElementById('metricProjection').style.width = data.projection;

            inspectorEl.classList.add('active');
            playLuxuryChime();
        });
    });
}

/* ═══════════════════════════════════════════════════════════════════════════
   INIT ALL LUXURY EXPERIENCES
═══════════════════════════════════════════════════════════════════════════ */
document.addEventListener('DOMContentLoaded', () => {
    initLenis();
    initLoader();
    initNav();
    initMobileMenu();
    initCursor();
    initScrollReveal();
    initSeasonParallax();
    initParticles();
    initCartBadge();
    initNewsletterForm();
    initFragranceAdvisor();
    initAtmosphereSound();
    initHeroSeasonBar();
    init3DFlaconPhysics();
    initOlfactoryInspector();
    initCurrencySystem();
    initQuickViewModal();
    initFragranceLayering();
    initCollectionFilters();
});
