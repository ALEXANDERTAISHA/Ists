<style>
    /* ── Keyframe Animations ── */
    @keyframes header-glow {
        0%, 100% { box-shadow: 0 4px 16px rgba(0,150,136,0.12); }
        50% { box-shadow: 0 4px 24px rgba(0,150,136,0.18); }
    }
    @keyframes nav-item-glow {
        0%, 100% { box-shadow: inset 0 0 0px 0px rgba(255,255,255,0); }
        50% { box-shadow: inset 0 0 12px 2px rgba(255,255,255,0.15); }
    }
    @keyframes dropdown-slide-down {
        from { opacity: 0; transform: translateY(-12px); }
        to { opacity: 1; transform: translateY(0); }
    }

    html, body {
        overflow-x: hidden;
    }
    :root {
        --public-header-height: 64px;
    }

    body.public-sticky-footer .public-page-main {
        padding-top: var(--public-header-height) !important;
    }

    /* ── PREMIUM Header ── */
    .header-public {
        position: fixed !important;
        top: 0;
        left: 0;
        right: 0;
        width: 100% !important;
        min-height: var(--public-header-height);
        height: var(--public-header-height);
        padding-top: 0;
        padding-bottom: 0;
        background: linear-gradient(90deg, rgba(15, 23, 84, 0.98) 0%, rgba(8, 145, 178, 0.97) 44%, rgba(5, 150, 105, 0.97) 100%) !important;
        box-shadow: 0 6px 24px rgba(15,23,42,0.14), inset 0 1px 1px rgba(255,255,255,0.18);
        z-index: 1040;
        display: flex;
        align-items: center;
        overflow: visible !important;
    }

    .header-public.scrolled {
        background: linear-gradient(90deg, rgba(23, 37, 84, 0.96) 0%, rgba(14, 116, 144, 0.95) 44%, rgba(4, 120, 87, 0.95) 100%) !important;
        backdrop-filter: blur(10px) !important;
        -webkit-backdrop-filter: blur(10px) !important;
        box-shadow: 0 8px 28px rgba(15,23,42,0.13) !important;
        border-bottom: none !important;
    }

    .header-public::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 40%;
        background: linear-gradient(180deg, rgba(255,255,255,0.08) 0%, transparent 100%);
        pointer-events: none;
        border-radius: 0 0 8px 8px;
    }

    .header-public .header-navbar {
        width: calc(100% - var(--scrollbar-w, 0px)) !important;
        max-width: calc(100% - var(--scrollbar-w, 0px)) !important;
        margin-right: var(--scrollbar-w, 0px) !important;
        padding-right: 0 !important;
        box-sizing: border-box;
    }

    .header-public .header-link {
        border-radius: 11px;
        transition: 
            background-color 0.3s cubic-bezier(0.22,1,0.36,1),
            color 0.3s ease,
            box-shadow 0.3s ease,
            transform 0.3s ease;
        position: relative;
        padding: 0.28rem 0.65rem !important;
        font-size: 0.89rem !important;
        font-family: 'Montserrat', 'Segoe UI', Arial, sans-serif !important;
        font-weight: 700 !important;
        letter-spacing: 0.32px !important;
        text-transform: uppercase !important;
    }

    .header-public .header-link::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 12px;
        background: linear-gradient(180deg, rgba(255,255,255,0.20) 0%, rgba(255,255,255,0.05) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .header-public .header-link:hover,
    .header-public .header-link:focus-visible,
    .header-public .header-link.active,
    .header-public .dropdown.menu-open > .header-link {
        background: rgba(255, 255, 255, 0.25) !important;
        color: #ffffff !important;
        box-shadow: 
            0 8px 20px rgba(255,255,255,0.15),
            inset 0 1px 2px rgba(255,255,255,0.25);
        transform: translateY(-2px);
    }

    .header-public .header-link:hover::before {
        opacity: 1;
    }

    /* ── Mobile Menu Toggle — Premium ── */
    .mobile-menu-toggle {
        display: none;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border: 1.5px solid rgba(255, 255, 255, 0.35);
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.12);
        color: #fff;
        font-size: 1.15rem;
        cursor: pointer;
        position: relative;
        z-index: 1050;
        pointer-events: auto;
        transition: 
            background 0.3s ease,
            border-color 0.3s ease,
            box-shadow 0.3s ease,
            transform 0.3s ease;
        backdrop-filter: blur(8px);
    }

    .mobile-menu-toggle:hover {
        background: rgba(255, 255, 255, 0.20);
        border-color: rgba(255, 255, 255, 0.55);
        box-shadow: 0 4px 12px rgba(255,255,255,0.15);
        transform: scale(1.05) translateY(-1px);
    }

    /* ── Mobile Menu — Premium Glass ── */
    .mobile-menu {
        position: fixed;
        top: 0;
        right: -100%;
        width: min(86vw, 332px);
        height: 100vh;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(12px);
        z-index: 1200;
        box-shadow: -12px 0 40px rgba(15,23,42,0.18);
        transition: right 0.4s cubic-bezier(0.22,1,0.36,1);
        overflow-y: auto;
        border-left: 1px solid rgba(255,255,255,0.60);
    }

    .mobile-menu.active {
        right: 0;
    }

    .mobile-menu__header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem;
        border-bottom: 1.5px solid rgba(15,23,42,0.08);
        position: sticky;
        top: 0;
        background: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(12px);
        z-index: 2;
    }

    .mobile-menu__close {
        border: 1.5px solid #e0e7ff;
        border-radius: 12px;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        width: 34px;
        height: 34px;
        cursor: pointer;
        font-size: 1.2rem;
        color: #0f172a;
        transition: 
            background 0.3s ease,
            border-color 0.3s ease,
            transform 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .mobile-menu__close:hover {
        background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%);
        border-color: #cbd5e1;
        transform: scale(1.08) rotate(90deg);
    }

    .mobile-menu__list {
        list-style: none;
        margin: 0;
        padding: 0.85rem 0.95rem 1.5rem;
    }

    .mobile-menu__item {
        margin-bottom: 0.6rem;
        border: 1.5px solid rgba(15,23,42,0.08);
        border-radius: 14px;
        overflow: hidden;
        background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(248,250,252,0.95));
        backdrop-filter: blur(8px);
        transition: 
            all 0.3s cubic-bezier(0.22,1,0.36,1);
    }

    .mobile-menu__item:hover {
        border-color: rgba(0,150,136,0.2);
        background: linear-gradient(135deg, rgba(255,255,255,1), rgba(240,253,250,0.98));
        box-shadow: 0 6px 16px rgba(15,23,42,0.08);
    }

    .mobile-menu__item > a,
    .mobile-menu__summary {
        display: block;
        padding: 0.84rem 0.92rem;
        color: #0f172a;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.89rem !important;
        font-family: 'Montserrat', 'Segoe UI', Arial, sans-serif !important;
        font-weight: 700 !important;
        letter-spacing: 0.32px !important;
        text-transform: uppercase !important;
    }

    .mobile-menu__summary {
        cursor: pointer;
        list-style: none;
        user-select: none;
        position: relative;
    }

    .mobile-menu__summary::after {
        content: '›';
        position: absolute;
        right: 1.1rem;
        top: 50%;
        transform: translateY(-50%) rotate(0deg);
        transition: transform 0.3s ease;
        font-size: 1.5rem;
        color: #00796b;
    }

    .mobile-menu__item details[open] > .mobile-menu__summary::after {
        transform: translateY(-50%) rotate(90deg);
    }

    .mobile-menu__children {
        list-style: none;
        margin: 0;
        padding: 0.3rem 1rem 1rem;
        border-top: 1.5px solid rgba(15,23,42,0.06);
        background: linear-gradient(180deg, rgba(240,253,250,0.6) 0%, transparent 100%);
    }

    .mobile-menu__children li a {
        display: block;
        padding: 0.52rem 0.28rem;
        color: #1d4ed8;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
        transition: all 0.3s ease;
        padding-left: 1.2rem;
        position: relative;
    }

    .mobile-menu__children li a::before {
        content: '';
        position: absolute;
        left: 0.4rem;
        top: 50%;
        transform: translateY(-50%);
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #00796b;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .mobile-menu__children li a:hover {
        color: #00796b;
        padding-left: 1.6rem;
    }

    .mobile-menu__children li a:hover::before {
        opacity: 1;
    }

    /* ── Career Submenu Styles ── */
    .career-submenu-wrapper {
        position: relative;
    }

    .career-submenu-title {
        color: #0b335c;
    }

    .career-submenu {
        list-style: none;
        padding-left: 16px !important;
        margin-bottom: 10px;
        opacity: 1;
        visibility: visible;
        max-height: none;
    }

    .career-submenu li {
        margin: 6px 0;
    }

    .career-submenu li a {
        font-size: 0.95rem;
        color: #0b335c;
        text-decoration: none;
        transition: color 0.2s, padding-left 0.2s;
        padding-left: 4px;
        display: inline-block;
    }

    .career-submenu li a:hover {
        color: #0ea5a2;
        padding-left: 8px;
    }

    /* ── Premium Nested Menu Tree ── */
    .menu-tree-item {
        list-style: none;
        margin-bottom: 0.42rem;
        position: relative;
    }

    .menu-tree-item.has-children::after {
        content: '';
        position: absolute;
        top: 0;
        left: 100%;
        width: 18px;
        height: 100%;
        pointer-events: auto;
    }

    .header-public .dropdown::after {
        height: 22px !important;
    }

    .header-public .dropdown-content.academic-dropdown {
        top: calc(100% + 6px) !important;
        background: #fff !important;
        border-radius: 22px !important;
        box-shadow: 0 4px 18px rgba(23,102,163,0.10), 0 1.5px 8px rgba(0,0,0,0.03);
        padding: 0.5rem 0.7rem 0.6rem 0.7rem !important;
        min-width: 220px;
        border: 1.5px solid #e5e7eb !important;
    }

    .header-public .academic-dropdown-columns ul li {
        padding: 0.32rem 0.1rem 0.32rem 0.3rem;
        border-bottom: 1px solid #f3f4f6;
        font-size: 0.98rem;
        color: #22334a;
        font-weight: 500;
        transition: background 0.16s, color 0.16s;
        border-radius: 10px;
        margin-bottom: 2px;
    }
    .header-public .academic-dropdown-columns ul li:last-child {
        border-bottom: none;
    }
    .header-public .academic-dropdown-columns ul li a {
        color: #22334a;
        text-decoration: none;
        display: block;
        width: 100%;
        padding: 0.08rem 0.2rem 0.08rem 0.2rem;
        border-radius: 8px;
        font-size: 0.98rem;
        transition: background 0.16s, color 0.16s;
    }
    .header-public .academic-dropdown-columns ul li a:hover {
        background: #e0e7ef;
        color: #1766a3;
    }

    .header-public .academic-dropdown-columns ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .header-public .academic-dropdown-columns ul li {
        padding: 0.48rem 0.2rem;
        border-bottom: 1px solid #f1f5f9;
        font-size: 1.07rem;
        color: #22334a;
        font-weight: 500;
        transition: background 0.18s, color 0.18s;
    }
    .header-public .academic-dropdown-columns ul li:last-child {
        border-bottom: none;
    }
    .header-public .academic-dropdown-columns ul li a {
        color: #22334a;
        text-decoration: none;
        display: block;
        width: 100%;
        padding: 0.1rem 0.2rem;
        border-radius: 7px;
        transition: background 0.18s, color 0.18s;
    }
    .header-public .academic-dropdown-columns ul li a:hover {
        background: #f1f5f9;
        color: #1766a3;
    }

    .menu-tree-row {
        display: flex;
        align-items: center;
        gap: 0.45rem;
        padding: 0.18rem 0.24rem;
        border-radius: 9px;
        transition: background-color 0.24s ease, box-shadow 0.24s ease;
    }

    .menu-tree-item:hover > .menu-tree-row,
    .menu-tree-item.is-hover > .menu-tree-row,
    .menu-tree-item.is-open > .menu-tree-row {
        background: linear-gradient(135deg, rgba(14, 165, 164, 0.12), rgba(59, 130, 246, 0.1));
        box-shadow: none;
        border: 0;
        outline: none;
    }

    .menu-tree-link {
        flex: 1;
        display: block;
        color: #0b335c;
        text-decoration: none !important;
        font-weight: 600;
        font-size: 0.89rem;
        line-height: 1.28;
        padding: 0.28rem 0.32rem;
        border-radius: 8px;
        border: 0;
        outline: none;
        box-shadow: none;
        background: transparent;
        transition: color 0.2s ease, transform 0.2s ease, background-color 0.2s ease;
    }

    .header-public .academic-dropdown-columns ul li .menu-tree-link::before,
    .header-public .academic-dropdown-columns ul li .menu-tree-link::after {
        content: none !important;
        display: none !important;
    }

    .header-public .academic-column a.menu-tree-link,
    .header-public .academic-column a.menu-tree-link:hover,
    .header-public .academic-column a.menu-tree-link:focus,
    .header-public .academic-column a.menu-tree-link:focus-visible,
    .header-public .academic-column a.menu-tree-link:active {
        text-decoration: none !important;
        border-bottom: 0 !important;
        background-image: none !important;
        outline: none !important;
        box-shadow: none !important;
    }

    .menu-tree-link:hover,
    .menu-tree-link:focus,
    .menu-tree-link:focus-visible,
    .menu-tree-link:active {
        color: #0ea5a2;
        text-decoration: none !important;
        outline: none;
        box-shadow: none;
        background: transparent;
        transform: none;
    }

    .menu-tree-toggle {
        width: 1.45rem;
        height: 1.45rem;
        border-radius: 999px;
        border: 1px solid rgba(14, 165, 164, 0.26);
        background: linear-gradient(135deg, #f0fdfa, #eff6ff);
        color: #0f766e;
        font-size: 0.72rem;
        line-height: 1;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.25s ease, background 0.25s ease, border-color 0.25s ease;
        flex-shrink: 0;
    }

    .menu-tree-item.has-children:hover > .menu-tree-row .menu-tree-toggle,
    .menu-tree-item.has-children.is-hover > .menu-tree-row .menu-tree-toggle,
    .menu-tree-item.has-children.is-open > .menu-tree-row .menu-tree-toggle {
        transform: rotate(90deg);
        background: linear-gradient(135deg, #ccfbf1, #dbeafe);
        border-color: rgba(14, 165, 164, 0.44);
    }

    .header-public .menu-tree-children {
        list-style: none;
        position: absolute;
        top: -0.35rem;
        left: calc(100% + 12px);
        min-width: 236px;
        margin: 0;
        padding: 0.65rem;
        border: 1.5px solid rgba(255, 255, 255, 0.72) !important;
        border-radius: 14px !important;
        background: linear-gradient(180deg, rgba(255,255,255,0.99) 0%, rgba(248,250,252,0.985) 100%) !important;
        backdrop-filter: blur(16px) !important;
        -webkit-backdrop-filter: blur(16px) !important;
        box-shadow:
            0 14px 34px rgba(15, 23, 42, 0.16),
            inset 0 1px 2px rgba(255,255,255,0.85) !important;
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        pointer-events: none;
        transform: translateX(-8px) scale(0.98);
        transition: max-height 0.34s ease, opacity 0.28s ease, transform 0.28s ease;
        z-index: 35;
    }

    .header-public .menu-tree-children::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 58%;
        border-radius: 16px 16px 0 0;
        background: linear-gradient(180deg, rgba(255,255,255,0.58) 0%, transparent 100%);
        pointer-events: none;
    }

    .header-public .menu-tree-children::after {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 16px;
        box-shadow: inset 0 0 0 1px rgba(14, 165, 164, 0.06);
        pointer-events: none;
    }

    .header-public .menu-tree-children,
    .header-public .menu-tree-children li,
    .header-public .menu-tree-children .menu-tree-row {
        background-color: transparent !important;
        box-shadow: none;
    }

    .header-public .menu-tree-children > li {
        position: relative;
        z-index: 1;
    }

    .menu-tree-item.has-children:hover > .menu-tree-children,
    .menu-tree-item.has-children.is-hover > .menu-tree-children,
    .menu-tree-item.has-children.is-open > .menu-tree-children {
        max-height: 560px;
        opacity: 1;
        pointer-events: auto;
        overflow: visible;
        transform: translateX(0) scale(1);
    }

    .menu-tree-children .menu-tree-item:last-child {
        margin-bottom: 0;
    }

    .mobile-tree-item {
        list-style: none;
        margin-bottom: 0.42rem;
    }

    .mobile-tree-summary {
        padding: 0.62rem 0.72rem;
        font-size: 0.88rem;
        font-weight: 700;
        color: #0f172a;
        border-radius: 10px;
        background: linear-gradient(135deg, rgba(240, 253, 250, 0.85), rgba(239, 246, 255, 0.85));
    }

    .mobile-tree-summary::after {
        right: 0.8rem;
        font-size: 1.2rem;
    }

    .mobile-tree-details[open] > .mobile-tree-summary {
        box-shadow: inset 0 0 0 1px rgba(14, 165, 164, 0.2);
    }

    .mobile-tree-children {
        padding: 0.34rem 0.2rem 0.2rem 0.5rem;
        border-top: none;
        background: transparent;
    }

    .mobile-tree-link {
        display: block;
        color: #1d4ed8;
        text-decoration: none;
        font-size: 0.88rem;
        font-weight: 600;
        padding: 0.5rem 0.3rem 0.5rem 0.88rem;
        border-radius: 8px;
        transition: color 0.22s ease, background-color 0.22s ease, transform 0.22s ease;
    }

    .mobile-tree-link:hover {
        color: #0f766e;
        background: rgba(15, 118, 110, 0.08);
        transform: translateX(2px);
    }

    @media (max-width: 992px) {
        :root {
            --public-header-height: 62px;
        }

        .header-public {
            right: 0 !important;
            width: 100% !important;
        }

        .header-public .header-navbar {
            justify-content: space-between !important;
            padding: 0.3rem 1rem !important;
            width: calc(100% - var(--scrollbar-w, 0px)) !important;
            max-width: calc(100% - var(--scrollbar-w, 0px)) !important;
            margin-right: var(--scrollbar-w, 0px) !important;
        }

        .mobile-logo {
            display: inline-flex !important;
        }

        .desktop-logo {
            display: none !important;
        }

        .header-public .header-menu {
            display: none !important;
        }

        .mobile-menu-toggle {
            display: inline-flex;
        }

        .header-public .dropdown-content {
            display: none !important;
        }
    }
</style>
<script>
    // Detect exact scrollbar width and set as CSS var so header stops exactly at scrollbar edge
    (function() {
        var div = document.createElement('div');
        div.style.cssText = 'width:100px;height:100px;overflow:scroll;position:absolute;top:-9999px;visibility:hidden';
        document.documentElement.appendChild(div);
        var scrollbarW = div.offsetWidth - div.clientWidth;
        document.documentElement.style.setProperty('--scrollbar-w', scrollbarW + 'px');
        document.documentElement.removeChild(div);
    })();

    document.addEventListener('DOMContentLoaded', function() {
        let lastScrollTop = window.scrollY;
        let ticking = false;
        const header = document.querySelector('.header-public');
        function onScroll() {
            let st = window.scrollY;
            if (st > 0) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            if (window.matchMedia('(max-width: 992px)').matches) {
                header.style.transform = 'translateY(0)';
                lastScrollTop = st;
                return;
            }
            if (st > lastScrollTop && st > 30) {
                header.style.transform = 'translateY(-100%)';
            } else if (st < lastScrollTop) {
                header.style.transform = 'translateY(0)';
            }
            lastScrollTop = st;
        }
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    onScroll();
                    ticking = false;
                });
                ticking = true;
            }
        });
    });
</script>


<header class="header-public">
    @php
        $allCareers = \App\Models\Career::where('is_active', true)->orderBy('name')->get();
        $documentos = \Illuminate\Support\Facades\DB::table('contents')->where('category', 'documentos')->where('status', 'published')->orderBy('title')->get();
        $menuItems = \App\Models\MenuItem::whereNull('parent_id')->where('is_active', true)->with(['pdfs', 'childrenRecursive'])->orderBy('order')->get();
        $careerMenuLinks = \App\Models\MenuItem::where('is_active', true)
            ->whereNotNull('career_id')
            ->whereNotNull('url')
            ->with('career:id,slug')
            ->get()
            ->filter(function ($menuItem) {
                $url = trim((string) $menuItem->url);
                return $url !== '' && $url !== '#' && $menuItem->career;
            })
            ->mapWithKeys(function ($menuItem) {
                return [$menuItem->career->slug => $menuItem->url];
            });
        $contentModel = new \App\Models\Content();
        $aboutContents = $contentModel->getByCategory('about');
        $acercaMenuItem = $menuItems->first(function ($menuItem) {
            $key = $menuItem->system_key ?: preg_replace('/[^A-Z]/', '', strtoupper(\Illuminate\Support\Str::ascii($menuItem->title)));
            return $key === 'ACERCA';
        });
        $visitSections = \App\Models\VisitSection::active()->ordered()->get();
        $campusItems = \App\Models\CampusItem::active()->where('category', 'servicios')->ordered()->get();
        $vidaEstudiantilItems = \App\Models\CampusItem::active()->where('category', 'Vida Estudiantil')->ordered()->get();
        $icons = [
            'asesoria-juridica' => '⚖️',
            'bienestar-institucional' => '❤️',
            'planificacion-estrategica' => '📈',
            'relaciones-internacionales' => '🌍',
            'secretaria-general' => '📋',
            'seguridad-salud-ocupacional' => '🛡️',
            'talento-humano' => '👥',
            'tecnologias-informacion' => '💻',
            'unidad-administrativa' => '🏢',
            'unidad-comunicacion' => '📢',
        ];
        $transparencyContents = $transparencyContents ?? [];
        $headerLogoUrl = !empty($headerLogoPath) ? asset(ltrim($headerLogoPath, '/')) : asset('assets/images/logoists.png');
    @endphp
    <nav class="header-navbar" style="width: 100%; height:100%; background: transparent; box-shadow: none; display: flex; justify-content: center; align-items: center; padding: 0.18rem 0; position: relative;">
        <a href="{{ url('/') }}" class="mobile-logo" style="display:none; align-items:center;" aria-label="Inicio ISTS">
              <img src="{{ $headerLogoUrl }}" alt="Logo ISTS" style="height: 56px; width: 96px; min-width:96px; min-height:56px; max-width:96px; max-height:56px; object-fit:contain; margin-left: 18px; margin-right: 8px;">
        </a>
                <div class="desktop-logo" style="margin-right: 1.6rem; display: flex; align-items: center; list-style:none;">
                        <a href="{{ url('/') }}" style="display: flex; align-items: center;">
                            <img src="{{ $headerLogoUrl }}" alt="Logo ISTS" style="height: 64px; width: 138px; min-width:138px; min-height:64px; max-width:138px; max-height:64px; object-fit:contain; margin-left: 28px; margin-right: 8px;">
                        </a>
                </div>
        <ul class="header-menu" style="display: flex; flex-direction: row; align-items: center; gap: 0.86rem; list-style: none; margin: 0; padding: 0; justify-content: flex-start; max-width: 1400px; width: 100%;">
            <li class="dropdown" style="position: relative;">
                <a href="#" class="header-link" style="font-weight: 600; color: #ffffff; font-size: 0.96rem; letter-spacing: 0.32px; padding: 0.42rem 1rem; transition: background 0.2s, color 0.2s;">{{ $acercaMenuItem->title ?? 'ACERCA' }}</a>
                <div class="dropdown-content academic-dropdown single-column">
                    <div class="academic-dropdown-columns">
                        <div class="academic-column">
                            <ul>
                                @foreach($aboutContents as $section)
                                    @if(Str::lower($section['title']) !== 'sobre el ists')
                                        <li>
                                            @if(Str::lower($section['title']) === 'autoridades')
                                                <a href="{{ url('/autoridades') }}">{{ $section['title'] }}</a>
                                            @elseif(Str::lower($section['title']) === 'planta docente')
                                                <a href="{{ url('/planta-docente') }}">{{ $section['title'] }}</a>
                                            @else
                                                <a href="{{ url('/contenido/'.$section['slug']) }}">{{ $section['title'] }}</a>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                                @if($acercaMenuItem && $acercaMenuItem->childrenRecursive->count() > 0)
                                    @foreach($acercaMenuItem->childrenRecursive as $child)
                                        @if(Str::lower($child->title) !== 'sobre el ists')
                                            <li>
                                                <a href="{{ url($child->url) }}">{{ $child->title }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            @foreach($menuItems as $item)
                @php
                    $titleKey = $item->system_key ?: preg_replace('/[^A-Z]/', '', strtoupper(\Illuminate\Support\Str::ascii($item->title)));
                    $displayTitle = match ($titleKey) {
                        'CARRERAS' => 'CARRERAS',
                        'CAMPUS' => 'SERVICIOS',
                        'DOCUMENTOS' => 'DOCUMENTOS',
                        default => $item->title,
                    };
                @endphp
                @if($titleKey === 'ACERCA')
                    @continue
                @elseif($titleKey === 'CARRERAS')
                    <li class="dropdown" style="position: relative;">
                        <a href="#" class="header-link" style="font-weight: 600; color: #ffffff; font-size: 1.05rem; letter-spacing: 0.5px; padding: 0.5rem 1.2rem; transition: background 0.2s, color 0.2s;">{{ $displayTitle }}</a>
                        <div class="dropdown-content academic-dropdown single-column">
                            <div class="academic-dropdown-columns">
                                <div class="academic-column">
                                    <ul>
                                        @if($item->childrenRecursive && $item->childrenRecursive->count() > 0)
                                            @include('public.partials.menu.desktop_nodes', ['nodes' => $item->childrenRecursive])
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                @elseif($titleKey === 'CAMPUS')
                    @php
                        $hasVidaEstudiantil = isset($vidaEstudiantilItems) && $vidaEstudiantilItems->count() > 0;
                    @endphp
                    <li class="dropdown" style="position: relative;">
                        <a href="#" class="header-link" style="font-weight: 600; color: #ffffff; font-size: 1.05rem; letter-spacing: 0.5px; padding: 0.5rem 1.2rem; transition: background 0.2s, color 0.2s;">{{ $displayTitle }}</a>
                        <div class="dropdown-content academic-dropdown{{ $hasVidaEstudiantil ? '' : ' single-column' }}">
                            <div class="academic-dropdown-columns">
                                <div class="academic-column">
                                    <ul>
                                        @foreach($campusItems ?? [] as $campusItem)
                                            <li>
                                                <a href="{{ $campusItem->url ?? '#' }}"@if($campusItem->is_external) target="_blank" rel="noopener"@endif>{{ $campusItem->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @if($hasVidaEstudiantil)
                                <div class="academic-column">
                                    <ul>
                                        @foreach(($vidaEstudiantilItems ?? []) as $campusItem)
                                            <li>
                                                <a href="{{ $campusItem->url ?? '#' }}">{{ $campusItem->title }}</a>
                                                @if($campusItem->contents && $campusItem->contents->count())
                                                    <ul style="margin-left:20px;">
                                                        @foreach($campusItem->contents as $content)
                                                            <li>
                                                                <a href="{{ $content->external_url ?? '#' }}" target="_blank" style="color:#007bff; text-decoration:underline;">{{ $content->title }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                    </li>
                @elseif($titleKey === 'VISITAR')
                    @php
                        $total = count($visitSections);
                        $half = ceil($total / 2);
                        $firstCol = $visitSections->slice(0, $half);
                        $secondCol = $visitSections->slice($half);
                    @endphp
                    <li class="dropdown" style="position: relative;">
                        <a href="#" class="header-link" style="font-weight: 600; color: #ffffff; font-size: 1.05rem; letter-spacing: 0.5px; padding: 0.5rem 1.2rem; transition: background 0.2s, color 0.2s;">{{ $displayTitle }}</a>
                        <div class="dropdown-content academic-dropdown">
                            <div class="academic-dropdown-columns">
                                <div class="academic-column">
                                    <ul>
                                        @foreach($firstCol as $section)
                                            <li>
                                                <a href="{{ url('/visitar/'.$section->slug) }}">
                                                    {{ $icons[$section->slug] ?? '' }} {{ $section->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="academic-column">
                                    <ul>
                                        @foreach($secondCol as $section)
                                            <li>
                                                <a href="{{ url('/visitar/'.$section->slug) }}">
                                                    {{ $icons[$section->slug] ?? '' }} {{ $section->title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                @elseif($titleKey === 'NOTICIAS')
                    <li><a href="/noticias" class="header-link" style="font-weight: 600; color: #ffffff; font-size: 1.05rem; letter-spacing: 0.5px; padding: 0.5rem 1.2rem; transition: background 0.2s, color 0.2s;">{{ $displayTitle }}</a></li>
                @elseif($titleKey === 'TRANSPARENCIA')
                    <li class="dropdown" style="position: relative;">
                        <a href="#" class="header-link" style="font-weight: 600; color: #ffffff; font-size: 1.05rem; letter-spacing: 0.5px; padding: 0.5rem 1.2rem; transition: background 0.2s, color 0.2s;">{{ $displayTitle }}</a>
                        <div class="dropdown-content academic-dropdown single-column">
                            <div class="academic-dropdown-columns">
                                <div class="academic-column">
                                    <ul>
                                        @if($item->childrenRecursive && $item->childrenRecursive->count() > 0)
                                            @include('public.partials.menu.desktop_nodes', ['nodes' => $item->childrenRecursive])
                                        @else
                                        @foreach($transparencyContents as $parent)
                                            <li class="menu-tree-item{{ !empty($parent['children']) ? ' has-children' : '' }}">
                                                @php
                                                    $url = isset($parent['file_url']) && filter_var($parent['file_url'], FILTER_VALIDATE_URL)
                                                        ? $parent['file_url']
                                                        : (isset($parent['file_url']) && $parent['file_url'] ? asset($parent['file_url']) : url('transparency/' . $parent['slug']));
                                                    $target = (isset($parent['file_url']) && $parent['file_url']) ? '_blank' : '_self';
                                                    $hasChildren = !empty($parent['children']);
                                                @endphp
                                                <div class="menu-tree-row">
                                                    @if($hasChildren)
                                                        <a href="#" class="menu-tree-link menu-tree-link--no-nav" tabindex="0">{{ $parent['title'] }}</a>
                                                        <button type="button" class="menu-tree-toggle" aria-label="Desplegar submenu de transparencia">▶</button>
                                                    @else
                                                        <a href="{{ $url }}" target="{{ $target }}" class="menu-tree-link">{{ $parent['title'] }}</a>
                                                    @endif
                                                </div>
                                                <script>
                                                    // Prevenir navegación en enlaces de menú principal con submenús
                                                    document.addEventListener('DOMContentLoaded', function () {
                                                        document.querySelectorAll('.menu-tree-link--no-nav').forEach(function(link) {
                                                            link.addEventListener('click', function(e) {
                                                                e.preventDefault();
                                                            });
                                                        });
                                                    });
                                                </script>
                                                @if(!empty($parent['children']))
                                                    <ul class="menu-tree-children">
                                                        @foreach($parent['children'] as $child)
                                                            <li class="menu-tree-item">
                                                                @php
                                                                    $childUrl = isset($child['file_url']) && filter_var($child['file_url'], FILTER_VALIDATE_URL)
                                                                        ? $child['file_url']
                                                                        : (isset($child['file_url']) && $child['file_url'] ? asset($child['file_url']) : url('transparency/' . $child['slug']));
                                                                    $childTarget = (isset($child['file_url']) && $child['file_url']) ? '_blank' : '_self';
                                                                @endphp
                                                                <div class="menu-tree-row">
                                                                    <a href="{{ $childUrl }}" target="{{ $childTarget }}" class="menu-tree-link">{{ $child['title'] }}</a>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                @elseif($titleKey === 'DOCUMENTOS')
                    <li class="dropdown" style="position: relative;">
                        <a href="#" class="header-link" style="font-weight: 600; color: #ffffff; font-size: 1.05rem; letter-spacing: 0.5px; padding: 0.5rem 1.2rem; transition: background 0.2s, color 0.2s;">{{ $displayTitle }}</a>
                        <div class="dropdown-content academic-dropdown single-column">
                            <div class="academic-dropdown-columns">
                                <div class="academic-column">
                                    <ul>
                                        @if($item->childrenRecursive && $item->childrenRecursive->count() > 0)
                                            @include('public.partials.menu.desktop_nodes', ['nodes' => $item->childrenRecursive])
                                        @else
                                        @foreach($documentos as $documento)
                                            @php
                                                $url = $documento->url ?? null;
                                                $file = $documento->file_url ?? null;
                                                $isExternalUrl = $url && filter_var($url, FILTER_VALIDATE_URL);
                                                $isFile = $file && !$isExternalUrl;
                                            @endphp
                                            <li class="dropdown-item">
                                                @if($isExternalUrl)
                                                    <a href="{{ $url }}" target="_blank">{{ $documento->title }}</a>
                                                @elseif($isFile)
                                                    <a href="{{ asset($file) }}" target="_blank">{{ $documento->title }}</a>
                                                @else
                                                    <span>{{ $documento->title }}</span>
                                                @endif
                                            </li>
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                @else
                    @if($item->childrenRecursive && $item->childrenRecursive->count() > 0)
                        <li class="dropdown" style="position: relative;">
                            <a href="#" class="header-link" style="font-weight: 600; color: #ffffff; font-size: 1.05rem; letter-spacing: 0.5px; padding: 0.5rem 1.2rem; transition: background 0.2s, color 0.2s;">{{ $displayTitle }}</a>
                            <div class="dropdown-content academic-dropdown single-column">
                                <div class="academic-dropdown-columns">
                                    <div class="academic-column">
                                        <ul>
                                            @include('public.partials.menu.desktop_nodes', ['nodes' => $item->childrenRecursive])
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @else
                        <li><a href="{{ $item->url }}" class="header-link" style="font-weight: 600; color: #ffffff; font-size: 1.05rem; letter-spacing: 0.5px; padding: 0.5rem 1.2rem; transition: background 0.2s, color 0.2s;">{{ $displayTitle }}</a></li>
                    @endif
                @endif
            @endforeach
        </ul>
        <button id="mobile-menu-toggle" class="mobile-menu-toggle" type="button" aria-label="Abrir menu">
            <span>☰</span>
        </button>
    </nav>

    <aside id="mobile-menu" class="mobile-menu" aria-label="Navegacion movil">
        <div class="mobile-menu__header">
            <strong style="color:#0f172a;">Menu</strong>
            <button id="mobile-menu-close" class="mobile-menu__close" type="button" aria-label="Cerrar menu">×</button>
        </div>

        <ul class="mobile-menu__list">
            <li class="mobile-menu__item"><a href="{{ url('/') }}">Inicio</a></li>

            @if($acercaMenuItem)
                <li class="mobile-menu__item">
                    <details>
                        <summary class="mobile-menu__summary">{{ $acercaMenuItem->title }}</summary>
                        <ul class="mobile-menu__children">
                            @foreach($aboutContents as $section)
                                @if(Str::lower($section['title']) !== 'sobre el ists')
                                    <li>
                                        @if(Str::lower($section['title']) === 'autoridades')
                                            <a href="{{ url('/autoridades') }}">{{ $section['title'] }}</a>
                                        @elseif(Str::lower($section['title']) === 'planta docente')
                                            <a href="{{ url('/planta-docente') }}">{{ $section['title'] }}</a>
                                        @else
                                            <a href="{{ url('/contenido/'.$section['slug']) }}">{{ $section['title'] }}</a>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </details>
                </li>
            @endif

            @foreach($menuItems as $item)
                @php
                    $titleKey = $item->system_key ?: preg_replace('/[^A-Z]/', '', strtoupper(\Illuminate\Support\Str::ascii($item->title)));
                    $displayTitle = match ($titleKey) {
                        'CARRERAS' => 'CARRERAS',
                        'CAMPUS' => 'SERVICIOS',
                        'DOCUMENTOS' => 'DOCUMENTOS',
                        default => $item->title,
                    };
                @endphp
                @if($titleKey === 'ACERCA')
                    @continue
                @elseif($titleKey === 'CARRERAS')
                    <li class="mobile-menu__item">
                        <details>
                            <summary class="mobile-menu__summary">{{ $displayTitle }}</summary>
                            <ul class="mobile-menu__children">
                                <li style="font-weight:bold; padding:8px 0; color:#0b335c;">Carreras Presenciales Destacadas</li>
                                @foreach(['desarrollo-software' => 'Desarrollo de Software', 'contabilidad-y-asesoria-tributaria' => 'Contabilidad y Asesoria Tributaria', 'agroecologia' => 'Agroecologia'] as $slug => $label)
                                    @php
                                        $careerUrl = $careerMenuLinks[$slug] ?? null;
                                        $careerHref = $careerUrl ? url($careerUrl) : route('career.show', $slug);
                                    @endphp
                                    <li><a href="{{ $careerHref }}">{{ $label }}</a></li>
                                @endforeach
                                <li style="font-weight:bold; padding:8px 0; margin-top:8px; color:#0b335c;">Todas las Carreras Presenciales</li>
                                @php
                                    $presencialesMostradas = [];
                                @endphp
                                @foreach($carrerasPresenciales as $career)
                                    @if(!in_array($career->id, $presencialesMostradas))
                                        @php
                                            $careerUrl = $careerMenuLinks[$career->slug] ?? null;
                                            $careerHref = $careerUrl ? url($careerUrl) : route('career.show', $career->slug);
                                        @endphp
                                        <li>
                                            <a href="{{ $careerHref }}">{{ $career->name }}</a>
                                        </li>
                                        @php $presencialesMostradas[] = $career->id; @endphp
                                    @endif
                                @endforeach
                                <li style="font-weight:bold; padding:8px 0; margin-top:8px; color:#0b335c;">Carreras Duales</li>
                                @php
                                    $dualesMostradas = [];
                                @endphp
                                @foreach($carrerasDuales as $career)
                                    @if(!in_array($career->id, $dualesMostradas))
                                        @php
                                            $careerUrl = $careerMenuLinks[$career->slug] ?? null;
                                            $careerHref = $careerUrl ? url($careerUrl) : route('career.show', $career->slug);
                                        @endphp
                                        <li>
                                            <a href="{{ $careerHref }}">{{ $career->name }}</a>
                                        </li>
                                        @php $dualesMostradas[] = $career->id; @endphp
                                    @endif
                                @endforeach
                                @if($item->childrenRecursive && $item->childrenRecursive->count() > 0)
                                    <li style="font-weight:bold; padding:8px 0; margin-top:8px; color:#0b335c;">Submenus de Carreras</li>
                                    @include('public.partials.menu.mobile_nodes', ['nodes' => $item->childrenRecursive, 'presencialesMostradas' => $presencialesMostradas, 'dualesMostradas' => $dualesMostradas])
                                @endif
                            </ul>
                        </details>
                    </li>
                @elseif($titleKey === 'CAMPUS')
                    <li class="mobile-menu__item">
                        <details>
                            <summary class="mobile-menu__summary">{{ $displayTitle }}</summary>
                            <ul class="mobile-menu__children">
                                @foreach($campusItems ?? [] as $campusItem)
                                    <li><a href="{{ $campusItem->url ?? '#' }}"@if($campusItem->is_external) target="_blank" rel="noopener"@endif>{{ $campusItem->title }}</a></li>
                                @endforeach
                                @foreach($vidaEstudiantilItems ?? [] as $vidaItem)
                                    <li><a href="{{ $vidaItem->url ?? '#' }}">{{ $vidaItem->title }}</a></li>
                                @endforeach
                            </ul>
                        </details>
                    </li>
                @elseif($titleKey === 'VISITAR')
                    <li class="mobile-menu__item">
                        <details>
                            <summary class="mobile-menu__summary">{{ $displayTitle }}</summary>
                            <ul class="mobile-menu__children">
                                @foreach($visitSections as $section)
                                    <li><a href="{{ url('/visitar/'.$section->slug) }}">{{ $icons[$section->slug] ?? '' }} {{ $section->title }}</a></li>
                                @endforeach
                            </ul>
                        </details>
                    </li>
                @elseif($titleKey === 'TRANSPARENCIA')
                    <li class="mobile-menu__item">
                        <details>
                            <summary class="mobile-menu__summary">{{ $displayTitle }}</summary>
                            <ul class="mobile-menu__children">
                                @if($item->childrenRecursive && $item->childrenRecursive->count() > 0)
                                    @include('public.partials.menu.mobile_nodes', ['nodes' => $item->childrenRecursive])
                                @else
                                @foreach($transparencyContents as $parent)
                                    @php
                                        $url = isset($parent['file_url']) && filter_var($parent['file_url'], FILTER_VALIDATE_URL)
                                            ? $parent['file_url']
                                            : (isset($parent['file_url']) && $parent['file_url'] ? asset($parent['file_url']) : url('transparency/' . $parent['slug']));
                                    @endphp
                                    @if(!empty($parent['children']))
                                        <li class="mobile-tree-item">
                                            <details class="mobile-tree-details">
                                                <summary class="mobile-tree-summary">{{ $parent['title'] }}</summary>
                                                <ul class="mobile-tree-children">
                                                    <li>
                                                        <a href="{{ $url }}" target="{{ (isset($parent['file_url']) && $parent['file_url']) ? '_blank' : '_self' }}" class="mobile-tree-link">Abrir seccion principal</a>
                                                    </li>
                                                    @foreach($parent['children'] as $child)
                                                        @php
                                                            $childUrl = isset($child['file_url']) && filter_var($child['file_url'], FILTER_VALIDATE_URL)
                                                                ? $child['file_url']
                                                                : (isset($child['file_url']) && $child['file_url'] ? asset($child['file_url']) : url('transparency/' . $child['slug']));
                                                        @endphp
                                                        <li>
                                                            <a href="{{ $childUrl }}" target="{{ (isset($child['file_url']) && $child['file_url']) ? '_blank' : '_self' }}" class="mobile-tree-link">{{ $child['title'] }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </details>
                                        </li>
                                    @else
                                        <li><a href="{{ $url }}" target="{{ (isset($parent['file_url']) && $parent['file_url']) ? '_blank' : '_self' }}">{{ $parent['title'] }}</a></li>
                                    @endif
                                @endforeach
                                @endif
                            </ul>
                        </details>
                    </li>
                @elseif($titleKey === 'DOCUMENTOS')
                    <li class="mobile-menu__item">
                        <details>
                            <summary class="mobile-menu__summary">{{ $displayTitle }}</summary>
                            <ul class="mobile-menu__children">
                                @if($item->childrenRecursive && $item->childrenRecursive->count() > 0)
                                    @include('public.partials.menu.mobile_nodes', ['nodes' => $item->childrenRecursive])
                                @else
                                @foreach($documentos as $documento)
                                    @php
                                        $url = $documento->url ?? null;
                                        $file = $documento->file_url ?? null;
                                        $isExternalUrl = $url && filter_var($url, FILTER_VALIDATE_URL);
                                        $isFile = $file && !$isExternalUrl;
                                    @endphp
                                    @if($isExternalUrl)
                                        <li><a href="{{ $url }}" target="_blank">{{ $documento->title }}</a></li>
                                    @elseif($isFile)
                                        <li><a href="{{ asset($file) }}" target="_blank">{{ $documento->title }}</a></li>
                                    @endif
                                @endforeach
                                @endif
                            </ul>
                        </details>
                    </li>
                @else
                    @if($item->childrenRecursive && $item->childrenRecursive->count() > 0)
                        <li class="mobile-menu__item">
                            <details>
                                <summary class="mobile-menu__summary">{{ $displayTitle }}</summary>
                                <ul class="mobile-menu__children">
                                    @include('public.partials.menu.mobile_nodes', ['nodes' => $item->childrenRecursive])
                                </ul>
                            </details>
                        </li>
                    @else
                        <li class="mobile-menu__item"><a href="{{ $item->url }}">{{ $displayTitle }}</a></li>
                    @endif
                @endif
            @endforeach
        </ul>
    </aside>
</header>

<script>
    (function () {
        function setupPublicMobileMenu() {
            const toggle = document.getElementById('mobile-menu-toggle');
            const menu = document.getElementById('mobile-menu');
            const close = document.getElementById('mobile-menu-close');
            const header = document.querySelector('.header-public');

            if (!toggle || !menu || toggle.dataset.publicMenuBound === '1') {
                return;
            }

            toggle.dataset.publicMenuBound = '1';

            function openMenu(event) {
                if (event) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                if (header) {
                    header.style.transform = 'translateY(0)';
                }
                menu.classList.add('active');
                toggle.setAttribute('aria-expanded', 'true');
                document.body.style.overflow = 'hidden';
            }

            function closeMenu() {
                menu.classList.remove('active');
                toggle.setAttribute('aria-expanded', 'false');
                document.body.style.overflow = '';
            }

            closeMenu();

            toggle.addEventListener('click', openMenu);

            if (close) {
                close.addEventListener('click', function (event) {
                    event.preventDefault();
                    closeMenu();
                });
            }

            menu.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', closeMenu);
            });

            menu.querySelectorAll('summary').forEach(function (summary) {
                summary.addEventListener('click', function (event) {
                    event.stopPropagation();
                });
            });

            document.addEventListener('click', function (event) {
                if (!menu.classList.contains('active')) {
                    return;
                }

                if (!menu.contains(event.target) && !toggle.contains(event.target)) {
                    closeMenu();
                }
            });

            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    closeMenu();
                }
            });

            window.addEventListener('pageshow', closeMenu);
            window.addEventListener('pagehide', closeMenu);
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', setupPublicMobileMenu);
        } else {
            setupPublicMobileMenu();
        }
    })();

    document.addEventListener('DOMContentLoaded', function () {
        // Cache de elementos
        const headerPublic = document.querySelector('.header-public');
        const desktopMedia = window.matchMedia('(min-width: 993px)');
        const dropdownItems = document.querySelectorAll('.header-public .dropdown');
        const dropdownToggles = document.querySelectorAll('.header-public .dropdown > .header-link[href="#"]');
        const dropdownContents = document.querySelectorAll('.header-public .dropdown-content');
        const topLevelItems = document.querySelectorAll('.header-public .header-menu > li');

        // Cerrar todos los menús abiertos
        function closeAllMenus() {
            document.querySelectorAll('.header-public .dropdown.menu-open').forEach(function (node) {
                node.classList.remove('menu-open');
            });

            document.querySelectorAll('.menu-tree-item.is-open, .menu-tree-item.is-hover, .menu-tree-item.is-pinned').forEach(function (node) {
                node.classList.remove('is-open', 'is-hover', 'is-pinned');
            });
        }

        // En desktop mantenemos el menú abierto al pasar al submenú (anti-parpadeo)
        if (desktopMedia.matches) {
            dropdownItems.forEach(function (item) {
                let closeTimer = null;
                const content = item.querySelector('.dropdown-content');

                function clearCloseTimer() {
                    if (closeTimer) {
                        clearTimeout(closeTimer);
                        closeTimer = null;
                    }
                }

                function openItem() {
                    if (!desktopMedia.matches) return;
                    clearCloseTimer();
                    closeAllMenus();
                    item.classList.add('menu-open');
                }

                function scheduleSmartClose() {
                    if (!desktopMedia.matches) return;
                    clearCloseTimer();
                    closeTimer = setTimeout(function () {
                        const stillHoveringItem = item.matches(':hover');
                        const stillHoveringContent = content ? content.matches(':hover') : false;

                        if (!stillHoveringItem && !stillHoveringContent) {
                            item.classList.remove('menu-open');
                        }
                    }, 340);
                }

                item.addEventListener('mouseenter', openItem);
                item.addEventListener('mouseleave', scheduleSmartClose);

                if (content) {
                    content.addEventListener('mouseenter', clearCloseTimer);
                    content.addEventListener('mouseleave', scheduleSmartClose);
                }
            });

            // Si el cursor pasa a otra opcion superior, cerramos inmediatamente el menu anterior.
            topLevelItems.forEach(function (item) {
                item.addEventListener('mouseenter', function () {
                    const isDropdownItem = item.classList.contains('dropdown');
                    if (!isDropdownItem) {
                        closeAllMenus();
                    }
                });
            });
        }

        // Botones del menú (ACERCA, ACADÉMICOS, etc.)
        dropdownToggles.forEach(function (toggle) {
            toggle.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                const parent = toggle.closest('.dropdown');
                if (!parent) return;

                const isOpen = parent.classList.contains('menu-open');
                closeAllMenus();

                if (!isOpen) {
                    parent.classList.add('menu-open');
                }
            });
        });

        // Prevenir que clicks dentro del dropdown cierren el menú
        dropdownContents.forEach(function (content) {
            content.addEventListener('click', function (e) {
                e.stopPropagation();
                // No cerrar el menú aquí, esperar a que se complete la navegación
            });
        });

        // Links dentro del dropdown - permitir navegación
        // Ya no cerramos el menú automáticamente al hacer clic en enlaces internos
        // El menú solo se cerrará al pasar a otro menú principal o hacer clic fuera

        // Submenus anidados premium: abrir con click y también por hover
        document.querySelectorAll('.menu-tree-toggle').forEach(function (toggle) {
            toggle.addEventListener('click', function (e) {
                e.preventDefault();
                e.stopPropagation();

                const item = toggle.closest('.menu-tree-item');
                if (!item) return;

                const siblings = item.parentElement ? item.parentElement.querySelectorAll(':scope > .menu-tree-item.is-open') : [];
                siblings.forEach(function (sibling) {
                    if (sibling !== item) {
                        sibling.classList.remove('is-open', 'is-pinned', 'is-hover');
                    }
                });

                const isPinned = item.classList.contains('is-pinned');
                if (isPinned) {
                    item.classList.remove('is-pinned');
                    if (!item.matches(':hover')) {
                        item.classList.remove('is-open');
                    }
                } else {
                    item.classList.add('is-pinned', 'is-open');
                }
            });
        });

        // Hover-intent para evitar cierre accidental al ir a segundo/tercer nivel
        document.querySelectorAll('.menu-tree-item.has-children').forEach(function (item) {
            let nestedCloseTimer = null;

            item.addEventListener('mouseenter', function () {
                if (nestedCloseTimer) {
                    clearTimeout(nestedCloseTimer);
                    nestedCloseTimer = null;
                }
                item.classList.add('is-hover', 'is-open');
            });

            item.addEventListener('mouseleave', function () {
                nestedCloseTimer = setTimeout(function () {
                    item.classList.remove('is-hover');
                    if (!item.classList.contains('is-pinned')) {
                        item.classList.remove('is-open');
                    }
                }, 220);
            });
        });

        // Cerrar menú cuando haces click fuera del header
        document.addEventListener('click', function (e) {
            const isClickInsideHeader = headerPublic && headerPublic.contains(e.target);
            if (!isClickInsideHeader) {
                closeAllMenus();
            }
        });

        // Cerrar menú al presionar Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                closeAllMenus();
            }
        });
    });
</script>
