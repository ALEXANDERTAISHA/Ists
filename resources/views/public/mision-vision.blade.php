@extends('layouts.site')

@section('content')
<section class="py-5" style="background: #f6fbfa;">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100" style="border-radius: 24px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div style="background: #19c6ac; border-radius: 16px; width: 56px; height: 56px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 12px #19c6ac33;">
                                <svg width="32" height="32" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24"><path d="M4 13V7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v6"/><path d="M4 13l8 5 8-5"/><path d="M4 13v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6"/></svg>
                            </div>
                            <span class="badge ms-3" style="background: #e6faf7; color: #19c6ac; font-weight: 600; font-size: 1rem; letter-spacing: 1px;">• MISIÓN</span>
                        </div>
                        <h2 class="fw-bold mb-3" style="color: #181c32;">Nuestra Misión</h2>
                        <hr style="width: 48px; border: 2px solid #19c6ac; margin-left: 0;">
                        <p style="font-size: 1.1rem; color: #4b5563;">Formar profesionales de calidad y excelencia, competentes y con pensamiento crítico, compromiso ético, valores y principios; garantizando el uso racional de los recursos naturales, para su inserción en el mundo laboral y social. Nuestra labor diaria se orienta a la formación integral de ciudadanos, fortaleciendo la investigación, el desarrollo, la innovación, la vinculación con la sociedad y la cultura ecológica, y promoviendo la mejora continua.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm border-0 h-100" style="border-radius: 24px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div style="background: #3b82f6; border-radius: 16px; width: 56px; height: 56px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 12px #3b82f633;">
                                <svg width="32" height="32" fill="none" stroke="#fff" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="4"/><path d="M12 8v4l3 3"/></svg>
                            </div>
                            <span class="badge ms-3" style="background: #e6edfa; color: #3b82f6; font-weight: 600; font-size: 1rem; letter-spacing: 1px;">• VISIÓN</span>
                        </div>
                        <h2 class="fw-bold mb-3" style="color: #181c32;">Nuestra Visión</h2>
                        <hr style="width: 48px; border: 2px solid #3b82f6; margin-left: 0;">
                        <p style="font-size: 1.1rem; color: #4b5563;">Ser una Institución de Educación Superior modelo y líder en la provincia, generadora de conocimiento innovador con base en la investigación científica y aplicada; desarrollando capacidades productivas, con docentes comprometidos y de excelencia, y perfiles profesionales acordes con las carreras que oferta. Además, contar con una implementación tecnológica adecuada para garantizar la formación de profesionales proactivos y comprometidos con la construcción de una sociedad equitativa, libre de violencia y en equilibrio con el medio ambiente.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
