<style>
.ql-section {
    background: linear-gradient(135deg, #f0fdf9 0%, #e8f5f2 50%, #f0f9ff 100%);
    padding: 3.2rem 0 2.8rem;
    position: relative;
    overflow: hidden;
}
.ql-section::before {
    content: '';
    position: absolute;
    top: -80px; left: -80px;
    width: 340px; height: 340px;
    background: radial-gradient(circle, rgba(0,150,136,0.08) 0%, transparent 70%);
    pointer-events: none;
}
.ql-section::after {
    content: '';
    position: absolute;
    bottom: -60px; right: -60px;
    width: 280px; height: 280px;
    background: radial-gradient(circle, rgba(52,152,219,0.07) 0%, transparent 70%);
    pointer-events: none;
}
.ql-header {
    text-align: center;
    margin-bottom: 2rem;
    position: relative;
    z-index: 1;
}
.ql-header .ql-label {
    display: inline-block;
    background: linear-gradient(90deg, #00796b, #1abc9c);
    color: #fff;
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    padding: 0.3rem 1.1rem;
    border-radius: 50px;
    margin-bottom: 1rem;
}
.ql-header h2 {
    font-size: 1.9rem;
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -1px;
    line-height: 1.15;
    margin: 0 0 0.4rem;
}
.ql-header h2 span {
    background: linear-gradient(90deg, #00796b, #1abc9c);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}
.ql-header p {
    color: #64748b;
    font-size: 1.05rem;
    margin: 0;
}
.ql-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1rem;
    position: relative;
    z-index: 1;
}
@media (max-width: 768px) {
    .ql-grid { grid-template-columns: 1fr; gap: 1rem; }
    .ql-header h2 { font-size: 1.7rem; }
}
@media (min-width: 769px) and (max-width: 1024px) {
    .ql-grid { grid-template-columns: repeat(2, 1fr); }
}
.ql-card {
    position: relative;
    background: #fff;
    border-radius: 18px;
    padding: 1.5rem 1.5rem 1.4rem;
    text-decoration: none !important;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    gap: 1rem;
    border: 1.5px solid rgba(0,150,136,0.10);
    box-shadow: 0 4px 24px rgba(15,23,42,0.07), 0 1px 4px rgba(0,150,136,0.05);
    transition: transform 0.32s cubic-bezier(0.22,1,0.36,1),
                box-shadow 0.32s cubic-bezier(0.22,1,0.36,1),
                border-color 0.22s ease;
    overflow: hidden;
    cursor: pointer;
}
.ql-card::before {
    content: '';
    position: absolute;
    inset: 0;
    background: var(--ql-grad);
    opacity: 0;
    transition: opacity 0.32s ease;
    border-radius: inherit;
    z-index: 0;
}
.ql-card:hover::before { opacity: 1; }
.ql-card:hover {
    transform: translateY(-7px) scale(1.025);
    box-shadow: 0 20px 50px rgba(0,150,136,0.16), 0 4px 12px rgba(15,23,42,0.10);
    border-color: transparent;
}
.ql-card > * { position: relative; z-index: 1; }

/* === PREMIUM ICON WRAP === */
.ql-icon-wrap {
    width: 68px; height: 68px;
    border-radius: 20px;
    display: flex; align-items: center; justify-content: center;
    background: var(--ql-icon-bg);
    flex-shrink: 0;
    position: relative;
    overflow: hidden;
    transition: all 0.42s cubic-bezier(0.22,1,0.36,1);
    box-shadow:
        0 6px 20px var(--ql-glow, rgba(0,150,136,0.2)),
        inset 0 1px 1px rgba(255,255,255,0.85),
        0 1px 3px rgba(0,0,0,0.07);
    border: 1.5px solid rgba(255,255,255,0.75);
}
/* Glass sheen layer */
.ql-icon-wrap::before {
    content: '';
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 50%;
    background: linear-gradient(180deg, rgba(255,255,255,0.55) 0%, transparent 100%);
    border-radius: inherit;
    pointer-events: none;
    z-index: 1;
}
/* Animated shimmer on idle */
.ql-icon-wrap::after {
    content: '';
    position: absolute;
    top: -60%; left: -80%;
    width: 60%; height: 220%;
    background: linear-gradient(105deg, transparent 40%, rgba(255,255,255,0.4) 50%, transparent 60%);
    border-radius: 50%;
    animation: ql-shimmer 3.5s infinite 1s;
    pointer-events: none;
    z-index: 2;
}
@keyframes ql-shimmer {
    0%   { left: -80%; opacity: 0; }
    30%  { opacity: 1; }
    100% { left: 140%; opacity: 0; }
}
.ql-icon-wrap svg {
    width: 32px; height: 32px;
    color: var(--ql-icon-color);
    transition: color 0.35s ease, transform 0.42s cubic-bezier(0.22,1,0.36,1), filter 0.35s ease;
    position: relative;
    z-index: 3;
    filter: drop-shadow(0 2px 6px var(--ql-glow, rgba(0,150,136,0.3)));
}
.ql-card:hover .ql-icon-wrap {
    background: rgba(255,255,255,0.92);
    transform: scale(1.18) rotate(-7deg);
    box-shadow:
        0 12px 36px var(--ql-glow, rgba(0,150,136,0.45)),
        inset 0 1px 1px rgba(255,255,255,0.9);
    border-color: rgba(255,255,255,0.9);
}
.ql-card:hover .ql-icon-wrap svg {
    color: var(--ql-icon-color);
    transform: scale(1.08);
    filter: drop-shadow(0 3px 10px var(--ql-glow, rgba(0,150,136,0.55)));
}

.ql-card-body { width: 100%; }
.ql-card-title {
    font-size: 1.18rem;
    font-weight: 700;
    color: #0f172a;
    margin: 0 0 0.35rem;
    transition: color 0.3s ease;
    line-height: 1.25;
}
.ql-card:hover .ql-card-title { color: #fff; }
.ql-card-desc {
    font-size: 0.875rem;
    color: #64748b;
    margin: 0;
    line-height: 1.5;
    transition: color 0.3s ease;
}
.ql-card:hover .ql-card-desc { color: rgba(255,255,255,0.85); }

/* === PREMIUM ARROW BUTTON === */
.ql-card-arrow {
    margin-top: auto;
    width: 40px; height: 40px;
    border-radius: 50%;
    background: var(--ql-icon-bg);
    display: flex; align-items: center; justify-content: center;
    transition: all 0.38s cubic-bezier(0.22,1,0.36,1);
    align-self: flex-end;
    box-shadow: 0 3px 12px var(--ql-glow, rgba(0,150,136,0.18)),
                inset 0 1px 1px rgba(255,255,255,0.8);
    border: 1.5px solid rgba(255,255,255,0.7);
    position: relative;
    overflow: hidden;
}
.ql-card-arrow svg { width: 17px; height: 17px; color: var(--ql-icon-color); transition: all 0.35s ease; position: relative; z-index: 1; }
.ql-card:hover .ql-card-arrow {
    background: rgba(255,255,255,0.9);
    transform: translate(4px, -4px) scale(1.1);
    box-shadow: 0 6px 20px var(--ql-glow, rgba(0,150,136,0.4));
    border-color: rgba(255,255,255,0.95);
}
.ql-card:hover .ql-card-arrow svg { color: var(--ql-icon-color); transform: scale(1.1); }
/* Decorative stripe at top */
.ql-card-stripe {
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 4px;
    background: var(--ql-stripe);
    border-radius: 20px 20px 0 0;
}
</style>

<section class="ql-section">
    <div class="container">
        <div class="ql-header">
            <span class="ql-label">Acceso Directo</span>
            <h2>Enlaces <span>Rápidos</span></h2>
            <p>Accede de forma rápida a nuestros servicios y plataformas más utilizadas</p>
        </div>

        <div class="ql-grid">

            
            <a href="<?php echo e(url('/eventos')); ?>" class="ql-card"
               style="--ql-grad: linear-gradient(135deg, #00796b 0%, #1abc9c 100%);
                      --ql-icon-bg: rgba(0,150,136,0.12);
                      --ql-icon-color: #00796b;
                      --ql-glow: rgba(0,150,136,0.28);
                      --ql-stripe: linear-gradient(90deg, #00796b, #1abc9c);">
                <div class="ql-card-stripe"></div>
                <div class="ql-icon-wrap">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"/>
                    </svg>
                </div>
                <div class="ql-card-body">
                    <div class="ql-card-title">Eventos</div>
                    <p class="ql-card-desc">Conoce nuestras actividades académicas, culturales y deportivas programadas.</p>
                </div>
                <div class="ql-card-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"/></svg>
                </div>
            </a>

            
            <a href="<?php echo e(url('/noticias')); ?>" class="ql-card"
               style="--ql-grad: linear-gradient(135deg, #1565c0 0%, #3498db 100%);
                      --ql-icon-bg: rgba(21,101,192,0.12);
                      --ql-icon-color: #1565c0;
                      --ql-glow: rgba(21,101,192,0.28);
                      --ql-stripe: linear-gradient(90deg, #1565c0, #3498db);">
                <div class="ql-card-stripe"></div>
                <div class="ql-icon-wrap">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                    </svg>
                </div>
                <div class="ql-card-body">
                    <div class="ql-card-title">Relaciones Públicas</div>
                    <p class="ql-card-desc">Noticias, comunicados y toda la información institucional más reciente.</p>
                </div>
                <div class="ql-card-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"/></svg>
                </div>
            </a>

            
            <a href="https://egresados.istsucua.edu.ec" class="ql-card" target="_blank" rel="noopener"
               style="--ql-grad: linear-gradient(135deg, #7b1fa2 0%, #ab47bc 100%);
                      --ql-icon-bg: rgba(123,31,162,0.12);
                      --ql-icon-color: #7b1fa2;
                      --ql-glow: rgba(123,31,162,0.28);
                      --ql-stripe: linear-gradient(90deg, #7b1fa2, #ab47bc);">
                <div class="ql-card-stripe"></div>
                <div class="ql-icon-wrap">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.906 59.906 0 0112 3.493a59.903 59.903 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"/>
                    </svg>
                </div>
                <div class="ql-card-body">
                    <div class="ql-card-title">Portal de Egresados</div>
                    <p class="ql-card-desc">Accede al portal exclusivo para egresados y gestiona tu titulación y más.</p>
                </div>
                <div class="ql-card-arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25"/></svg>
                </div>
            </a>

        </div>
    </div>
</section>
<?php /**PATH C:\workspace\ists\resources\views\public\partials\quick_links.blade.php ENDPATH**/ ?>