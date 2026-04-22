{{-- ── MISIÓN & VISIÓN — static texts ── --}}
@php
    $mision = 'Formar profesionales de calidad y excelencia, competentes y con pensamiento crítico, compromiso ético, valores y principios; garantizando el uso racional de los recursos naturales, para su inserción en el mundo laboral y social. Nuestra labor diaria se orienta a la formación integral de ciudadanos, fortaleciendo la investigación, el desarrollo, la innovación, la vinculación con la sociedad y la cultura ecológica, y promoviendo la mejora continua.';
    $vision = 'Ser una Institución de Educación Superior modelo y líder en la provincia, generadora de conocimiento innovador con base en la investigación científica y aplicada; desarrollando capacidades productivas, con docentes comprometidos y de excelencia, y perfiles profesionales acordes con las carreras que oferta. Además, contar con una implementación tecnológica adecuada para garantizar la formación de profesionales proactivos y comprometidos con la construcción de una sociedad equitativa, libre de violencia y en equilibrio con el medio ambiente.';
@endphp

<section class="mvp-section">
    <div class="container mvp-inner">

        {{-- Header --}}
        <div class="mvp-header">
            <div class="mvp-eyebrow">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"/></svg>
                Identidad Institucional
            </div>
            <h2>Nuestra <span class="mvp-green">Misión</span> y <span class="mvp-blue">Visión</span></h2>
            <p>Los principios que guían nuestra labor educativa día a día, orientados a la excelencia y al servicio de la comunidad.</p>
        </div>

        {{-- Cards --}}
        <div class="mvp-cards-row">

            <div class="mvp-card mvp-card-mision">
                <div class="mvp-card-border-glow"></div>
                <div class="mvp-card-pattern"></div>
                <div class="mvp-card-orb2"></div>
                <div class="mvp-num">01</div>
                <div class="mvp-icon">
                    <span class="mvp-icon-particle"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                    </svg>
                </div>
                <span class="mvp-tag">Misión</span>
                <h3>Nuestra Misión</h3>
                <div class="mvp-divider"></div>
                <p>{{ $mision }}</p>
            </div>

            <div class="mvp-card mvp-card-vision">
                <div class="mvp-card-border-glow"></div>
                <div class="mvp-card-pattern"></div>
                <div class="mvp-card-orb2"></div>
                <div class="mvp-num">02</div>
                <div class="mvp-icon">
                    <span class="mvp-icon-particle"></span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <span class="mvp-tag">Visión</span>
                <h3>Nuestra Visión</h3>
                <div class="mvp-divider"></div>
                <p>{{ $vision }}</p>
            </div>

        </div>

    </div>
</section>
