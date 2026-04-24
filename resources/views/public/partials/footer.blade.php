<style>
/* ── Footer Premium ── */
.ftr {
    background: #0c1a2e;
    color: rgba(255,255,255,0.72);
    font-size: 0.92rem;
    line-height: 1.7;
}
.ftr-top-bar {
    background: linear-gradient(90deg, #00796b 0%, #1abc9c 50%, #1565c0 100%);
    height: 4px;
}
.ftr-main {
    max-width: 1240px; margin: 0 auto;
    padding: 3.5rem 2rem 2rem;
    display: grid;
    grid-template-columns: 1.8fr 1fr 1fr 1.4fr;
    gap: 2.5rem;
}
.ftr-brand-logo {
    display:flex; align-items:center; gap:0.75rem;
    margin-bottom:1rem;
}
.ftr-brand-icon {
    width:44px; height:44px;
    background: linear-gradient(135deg,#00796b,#1abc9c);
    border-radius:12px;
    display:flex; align-items:center; justify-content:center;
    flex-shrink:0;
}
.ftr-brand-icon svg { color:#fff; }
.ftr-brand-name {
    font-size:0.95rem; font-weight:800;
    color:#fff; line-height:1.2; letter-spacing:-0.3px;
}
.ftr-brand-tagline {
    font-size:0.82rem; color:rgba(255,255,255,0.45);
    font-weight:500; letter-spacing:0.5px;
}
.ftr-brand-desc {
    color:rgba(255,255,255,0.5); font-size:0.88rem;
    line-height:1.75; margin: 0 0 1.5rem;
}
.ftr-socials {
    display:flex; gap:0.6rem; flex-wrap:wrap;
}
.ftr-social-btn {
    width:36px; height:36px; border-radius:10px;
    background:rgba(255,255,255,0.07);
    border:1px solid rgba(255,255,255,0.1);
    display:flex; align-items:center; justify-content:center;
    color:rgba(255,255,255,0.55) !important;
    text-decoration:none !important;
    transition:background 0.22s ease, color 0.22s ease, border-color 0.22s ease;
}
.ftr-social-btn:hover {
    background:rgba(0,150,136,0.25);
    border-color:rgba(0,150,136,0.4);
    color:#1abc9c !important;
}

.ftr-col-title {
    font-size:0.72rem; font-weight:800;
    letter-spacing:2.5px; text-transform:uppercase;
    color:rgba(255,255,255,0.35);
    margin:0 0 1.1rem; padding-bottom:0.65rem;
    border-bottom:1px solid rgba(255,255,255,0.07);
}
.ftr-links {
    list-style:none; margin:0; padding:0;
    display:flex; flex-direction:column; gap:0.4rem;
}
.ftr-links a {
    color:rgba(255,255,255,0.6) !important;
    text-decoration:none !important;
    font-size:0.9rem;
    transition:color 0.2s ease, padding-left 0.2s ease;
    display:inline-block;
}
.ftr-links a:hover { color:#1abc9c !important; padding-left:4px; }

.ftr-contact-list {
    display:flex; flex-direction:column; gap:0.9rem;
}
.ftr-contact-item {
    display:flex; align-items:flex-start; gap:0.75rem;
}
.ftr-contact-ico {
    width:30px; height:30px; border-radius:8px;
    background:rgba(255,255,255,0.06);
    border:1px solid rgba(255,255,255,0.08);
    display:flex; align-items:center; justify-content:center;
    flex-shrink:0;
    color:rgba(0,188,157,0.85);
}
.ftr-contact-text {
    font-size:0.85rem; color:rgba(255,255,255,0.55);
    line-height:1.5;
}
.ftr-contact-text strong {
    display:block; font-size:0.72rem; font-weight:700;
    letter-spacing:1px; text-transform:uppercase;
    color:rgba(255,255,255,0.3); margin-bottom:0.15rem;
}

.ftr-bottom {
    border-top: 1px solid rgba(255,255,255,0.06);
    max-width:1240px; margin:0 auto;
    padding: 1.25rem 2rem;
    display:flex; align-items:center; justify-content:space-between;
    gap:1rem; flex-wrap:wrap;
}
.ftr-copyright { font-size:0.8rem; color:rgba(255,255,255,0.28); }
.ftr-dev { font-size:0.78rem; color:rgba(255,255,255,0.22); }
.ftr-dev span { color:rgba(0,188,157,0.55); }

.back-to-top {
    position: fixed !important;
    right: 1rem;
    bottom: 1rem;
    width: 44px;
    height: 44px;
    margin: 0 !important;
    padding: 0 !important;
    border: 1px solid rgba(255,255,255,0.22);
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #0f766e, #1565c0);
    color: #fff;
    box-shadow: 0 12px 26px rgba(8, 18, 32, 0.24);
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transform: translateY(10px);
    transition: opacity 0.22s ease, visibility 0.22s ease, transform 0.22s ease;
    z-index: 1090;
    line-height: 1;
}

.back-to-top.visible {
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
    transform: translateY(0);
}

@media(max-width:1024px) {
    .ftr-main { grid-template-columns: 1fr 1fr; }
}
@media(max-width:640px) {
    .ftr-main { grid-template-columns: 1fr; gap:2rem; padding-top:2.5rem; }
    .ftr-bottom { flex-direction:column; text-align:center; gap:0.25rem; }
    .back-to-top {
        right: 0.85rem;
        bottom: 0.85rem;
        width: 40px;
        height: 40px;
    }
}
</style>

<footer class="ftr">
    <div class="ftr-top-bar"></div>

    <div class="ftr-main">
        {{-- Col 1: Marca --}}
        <div>
            <div class="ftr-brand-logo">
                <div class="ftr-brand-icon">
                    <img src="{{ asset('assets/images/logoists.png') }}" alt="Logo ISTS" style="height: 48px; width: 48px; min-width:48px; min-height:48px; max-width:48px; max-height:48px; border-radius:10px; background:#fff; object-fit:contain;">
                </div>
                <div>
                    <div class="ftr-brand-name">ISTS Sucúa</div>
                    <div class="ftr-brand-tagline">Instituto Superior Tecnológico</div>
                </div>
            </div>
            <p class="ftr-brand-desc">
                Formando profesionales de excelencia para el desarrollo tecnológico y social de la Amazonía ecuatoriana desde 1995.
            </p>
            <div class="ftr-socials">
                <a href="https://www.facebook.com/profile.php?id=61571969525536" class="ftr-social-btn" aria-label="Facebook" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3l-.5 3H13v6.95C18.05 21.45 22 17.19 22 12z"/></svg>
                </a>
                <a href="https://www.instagram.com/istsucua" class="ftr-social-btn" aria-label="Instagram" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                </a>
                <a href="https://www.youtube.com/@istsucua" class="ftr-social-btn" aria-label="YouTube" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M21.58 7.19a2.76 2.76 0 0 0-1.94-1.95C18.13 5 12 5 12 5s-6.13 0-7.64.24A2.76 2.76 0 0 0 2.42 7.19 29 29 0 0 0 2 12a29 29 0 0 0 .42 4.81 2.76 2.76 0 0 0 1.94 1.95C5.87 19 12 19 12 19s6.13 0 7.64-.24a2.76 2.76 0 0 0 1.94-1.95A29 29 0 0 0 22 12a29 29 0 0 0-.42-4.81zM10 15V9l6 3-6 3z"/></svg>
                </a>
                <a href="https://chat.whatsapp.com/DpBz7BKBL7sEPwXpJ1xnnb?mode=hqrc" class="ftr-social-btn" aria-label="WhatsApp" target="_blank" rel="noopener">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M17.47 14.38c-.27-.13-1.58-.78-1.82-.87s-.42-.13-.6.13-.69.87-.85 1.05-.31.2-.58.07a7.28 7.28 0 0 1-2.14-1.32 8.07 8.07 0 0 1-1.49-1.84c-.15-.27 0-.41.12-.55l.39-.45a1.7 1.7 0 0 0 .26-.44.48.48 0 0 0 0-.46c-.07-.13-.6-1.44-.82-1.97-.21-.52-.43-.45-.6-.46h-.5a1 1 0 0 0-.72.34A3 3 0 0 0 8 10.5a5.17 5.17 0 0 0 1.09 2.75 11.82 11.82 0 0 0 4.53 4 6.18 6.18 0 0 0 2.07.54 2.82 2.82 0 0 0 1.76-.55 2.58 2.58 0 0 0 .86-1.72c.06-.43-.14-.67-.41-.8zM12 2A10 10 0 0 0 3.49 17.19L2 22l4.93-1.45A10 10 0 1 0 12 2z"/></svg>
                </a>
            </div>
        </div>

        {{-- Col 2: Links --}}
        <div>
            <p class="ftr-col-title">Institución</p>
            <ul class="ftr-links">
                <li><a href="{{ url('/carreras') }}">Carreras</a></li>
                <li><a href="{{ url('/eventos') }}">Eventos</a></li>
                <li><a href="{{ url('/noticias') }}">Noticias</a></li>
                <li><a href="{{ url('/calendario') }}">Calendario Académico</a></li>
                <li><a href="https://biblioteca.istsucua.edu.ec" target="_blank" rel="noopener">Biblioteca Digital</a></li>
            </ul>
        </div>

        {{-- Col 3: Recursos --}}
        <div>
            <p class="ftr-col-title">Recursos</p>
            <ul class="ftr-links">
                <li><a href="https://chat.whatsapp.com/DpBz7BKBL7sEPwXpJ1xnnb?mode=hqrc" target="_blank" rel="noopener">Admisión SNNA</a></li>
                <li><a href="{{ url('/transparency/reglamentos') }}">Reglamentos</a></li>
                <li><a href="{{ url('/campus') }}">Campus Virtual</a></li>
            </ul>
            <div style="margin-top:1.5rem;">
                @include('public.partials.footer_calendar_card')
            </div>
        </div>

        {{-- Col 4: Contacto --}}
        <div>
            <p class="ftr-col-title">Contacto</p>
            <div class="ftr-contact-list">
                <div class="ftr-contact-item">
                    <div class="ftr-contact-ico">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0z"/></svg>
                    </div>
                    <div class="ftr-contact-text">
                        <strong>Dirección</strong>
                        Efrén Zúñiga - Luis Sangurima<br>Sucúa, Ecuador
                    </div>
                </div>
                <div class="ftr-contact-item">
                    <div class="ftr-contact-ico">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25z"/></svg>
                    </div>
                    <div class="ftr-contact-text">
                        <strong>Teléfono</strong>
                        (07) 274-0421
                    </div>
                </div>
                <div class="ftr-contact-item">
                    <div class="ftr-contact-ico">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
                    </div>
                    <div class="ftr-contact-text">
                        <strong>Correo</strong>
                        secretaria@istsucua.edu.ec
                    </div>
                </div>
                <div class="ftr-contact-item">
                    <div class="ftr-contact-ico">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" width="14" height="14"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/></svg>
                    </div>
                    <div class="ftr-contact-text">
                        <strong>Horario</strong>
                        Lun–Vie: 14:00 – 22:00
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom bar --}}
    <div style="border-top:1px solid rgba(255,255,255,0.06);">
        <div class="ftr-bottom">
            <p class="ftr-copyright">
                &copy; {{ date('Y') }} Instituto Superior Tecnológico Sucúa. Todos los derechos reservados.
            </p>
            <p class="ftr-dev">Desarrollado por <span>Favian Cumbanama</span></p>
        </div>
    </div>
</footer>

<button id="back-to-top" class="back-to-top" aria-label="Volver arriba">↑</button>

<script src="{{ asset(ltrim(($base ?? '') . '/js/main.js', '/')) }}"></script>
