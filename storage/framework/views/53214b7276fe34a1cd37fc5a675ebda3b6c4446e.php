<?php if(isset($updates) && count($updates)): ?>
<?php
    $updatesCollection = $updates instanceof \Illuminate\Support\Collection ? $updates : collect($updates);

    $videoUpdate = $updatesCollection->first(function ($u) {
        return !empty($u->video_url) || !empty($u->video_path);
    });

    $imageUpdate = $updatesCollection->first(function ($u) {
        return !empty($u->image_path) && empty($u->video_url) && empty($u->video_path);
    });

    if (!$imageUpdate) {
        $imageUpdate = $updatesCollection->first(function ($u) {
            return !empty($u->image_path);
        });
    }

    if (!$videoUpdate) {
        $videoUpdate = $updatesCollection->first();
    }

    if (!$imageUpdate) {
        $imageUpdate = $updatesCollection->skip(1)->first() ?: $videoUpdate;
    }
?>

<section class="upd-section">
    <div class="upd-container">
        <div class="upd-header">
            <span class="upd-label">• MULTIMEDIA</span>
            <h2 class="upd-title">Últimas Actualizaciones</h2>
            <p class="upd-subtitle">Videos, imágenes y novedades recientes del ISTS Sucúa</p>
        </div>

        <div class="upd-grid-two">
            <?php if($videoUpdate): ?>
            <article class="upd-show-card upd-show-card--video">
                <span class="upd-hover-glow" aria-hidden="true"></span>
                <span class="upd-hover-sheen" aria-hidden="true"></span>
                <div class="upd-card-top">
                    <div class="upd-icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" width="24" height="24"><path d="M8 5v14l11-7z"/></svg>
                    </div>
                    <span class="upd-pill upd-pill--video">• VIDEO</span>
                </div>

                <h3 class="upd-card-title"><?php echo e($videoUpdate->title ?? 'Último video institucional'); ?></h3>
                <?php if(!empty($videoUpdate->description)): ?>
                    <p class="upd-card-desc"><?php echo e(\Illuminate\Support\Str::limit(strip_tags(html_entity_decode($videoUpdate->description)), 135)); ?></p>
                <?php endif; ?>

                <div class="upd-media-box upd-media-box--video">
                    <?php if(!empty($videoUpdate->video_url)): ?>
                        <iframe src="<?php echo e($videoUpdate->video_url); ?>" allowfullscreen loading="lazy" title="<?php echo e($videoUpdate->title); ?>"></iframe>
                    <?php elseif(!empty($videoUpdate->video_path)): ?>
                        <video controls preload="metadata">
                            <source src="<?php echo e(asset('storage/' . $videoUpdate->video_path)); ?>" type="video/mp4">
                        </video>
                    <?php elseif(!empty($videoUpdate->image_path)): ?>
                        <img src="<?php echo e(asset('storage/' . $videoUpdate->image_path)); ?>" alt="<?php echo e($videoUpdate->title); ?>" loading="lazy">
                    <?php else: ?>
                        <div class="upd-empty">Sin video disponible</div>
                    <?php endif; ?>
                </div>

                <div class="upd-meta-row">
                    <span><?php echo e(optional($videoUpdate->date)->format('d M, Y')); ?></span>
                    <?php if(!empty($videoUpdate->link_url)): ?>
                    <a href="<?php echo e($videoUpdate->link_url); ?>" target="_blank" rel="noopener">Ver más</a>
                    <?php endif; ?>
                </div>
            </article>
            <?php endif; ?>

            <?php if($imageUpdate): ?>
            <article class="upd-show-card upd-show-card--image">
                <span class="upd-hover-glow" aria-hidden="true"></span>
                <span class="upd-hover-sheen" aria-hidden="true"></span>
                <div class="upd-card-top">
                    <div class="upd-icon-box">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" width="24" height="24"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A1.5 1.5 0 0021.75 19.5V7.5A1.5 1.5 0 0020.25 6H3.75A1.5 1.5 0 002.25 7.5v12A1.5 1.5 0 003.75 21z"/></svg>
                    </div>
                    <span class="upd-pill upd-pill--image">• FOTOGRAFÍA</span>
                </div>

                <h3 class="upd-card-title"><?php echo e($imageUpdate->title ?? 'Última fotografía institucional'); ?></h3>
                <?php if(!empty($imageUpdate->description)): ?>
                    <p class="upd-card-desc"><?php echo e(\Illuminate\Support\Str::limit(strip_tags(html_entity_decode($imageUpdate->description)), 135)); ?></p>
                <?php endif; ?>

                <div class="upd-media-box upd-media-box--image">
                    <?php if(!empty($imageUpdate->image_path)): ?>
                        <img src="<?php echo e(asset('storage/' . $imageUpdate->image_path)); ?>" alt="<?php echo e($imageUpdate->title); ?>" loading="lazy">
                    <?php elseif(!empty($imageUpdate->video_url)): ?>
                        <iframe src="<?php echo e($imageUpdate->video_url); ?>" allowfullscreen loading="lazy" title="<?php echo e($imageUpdate->title); ?>"></iframe>
                    <?php elseif(!empty($imageUpdate->video_path)): ?>
                        <video controls preload="metadata">
                            <source src="<?php echo e(asset('storage/' . $imageUpdate->video_path)); ?>" type="video/mp4">
                        </video>
                    <?php else: ?>
                        <div class="upd-empty">Sin imagen disponible</div>
                    <?php endif; ?>
                </div>

                <div class="upd-meta-row">
                    <span><?php echo e(optional($imageUpdate->date)->format('d M, Y')); ?></span>
                    <?php if(!empty($imageUpdate->link_url)): ?>
                    <a href="<?php echo e($imageUpdate->link_url); ?>" target="_blank" rel="noopener">Ver más</a>
                    <?php endif; ?>
                </div>
            </article>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.upd-section {
    position: relative;
    background:
        radial-gradient(circle at 12% 8%, rgba(20,184,166,.14), transparent 30%),
        radial-gradient(circle at 88% 12%, rgba(59,130,246,.13), transparent 32%),
        linear-gradient(170deg, #f6fbff 0%, #f3fbf8 58%, #f8f6ff 100%);
    padding: 4.4rem 0 4.6rem;
    overflow: hidden;
}

.upd-section::before {
    content: "";
    position: absolute;
    inset: 1.2rem;
    border: 1px solid rgba(148,163,184,.18);
    border-radius: 34px;
    pointer-events: none;
}

.upd-container {
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 2rem;
}

.upd-header {
    text-align: center;
    margin-bottom: 2rem;
}

.upd-label {
    display: inline-block;
    color: #0f766e;
    font-size: .72rem;
    letter-spacing: 2.2px;
    font-weight: 800;
    background: rgba(15,118,110,.10);
    border: 1px solid rgba(15,118,110,.22);
    border-radius: 999px;
    padding: .38rem .95rem;
    margin-bottom: .9rem;
}

.upd-title {
    margin: 0;
    font-size: clamp(1.8rem, 3vw, 2.5rem);
    letter-spacing: -1.2px;
    font-weight: 900;
    color: #0f172a;
}

.upd-subtitle {
    margin: .45rem 0 0;
    color: #64748b;
    font-size: .95rem;
}

.upd-grid-two {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.65rem;
    align-items: stretch;
}

.upd-show-card {
    background:
        linear-gradient(160deg, rgba(255,255,255,.96) 0%, rgba(248,250,252,.92) 100%);
    border: 1px solid rgba(148,163,184,.28);
    border-radius: 28px;
    box-shadow:
        0 18px 46px rgba(15,23,42,.11),
        inset 0 1px 0 rgba(255,255,255,.85);
    padding: 1.25rem;
    position: relative;
    overflow: hidden;
    height: auto;
    backdrop-filter: blur(8px);
    display: flex;
    flex-direction: column;
    isolation: isolate;
    transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease;
}

.upd-hover-glow {
    position: absolute;
    inset: -1px;
    border-radius: 27px;
    pointer-events: none;
    z-index: 1;
    opacity: 0;
    border: 1px solid transparent;
    transition: opacity .28s ease;
}

.upd-hover-sheen {
    position: absolute;
    top: -20%;
    left: -55%;
    width: 42%;
    height: 150%;
    z-index: 2;
    pointer-events: none;
    opacity: 0;
    transform: translateX(0) rotate(16deg);
    background: linear-gradient(
        105deg,
        rgba(255,255,255,0) 0%,
        rgba(255,255,255,.12) 40%,
        rgba(255,255,255,.5) 52%,
        rgba(255,255,255,.12) 64%,
        rgba(255,255,255,0) 100%
    );
}

.upd-show-card--video .upd-hover-sheen {
    background: linear-gradient(
        105deg,
        rgba(16,185,129,0) 0%,
        rgba(16,185,129,.10) 38%,
        rgba(255,255,255,.55) 50%,
        rgba(16,185,129,.14) 62%,
        rgba(16,185,129,0) 100%
    );
}

.upd-show-card--image .upd-hover-sheen {
    background: linear-gradient(
        105deg,
        rgba(59,130,246,0) 0%,
        rgba(59,130,246,.10) 38%,
        rgba(255,255,255,.55) 50%,
        rgba(59,130,246,.14) 62%,
        rgba(59,130,246,0) 100%
    );
}

.upd-show-card--video .upd-hover-glow {
    box-shadow:
        0 0 0 1px rgba(16,185,129,.24),
        0 0 20px rgba(16,185,129,.20),
        0 0 38px rgba(16,185,129,.13);
}

.upd-show-card--image .upd-hover-glow {
    box-shadow:
        0 0 0 1px rgba(59,130,246,.24),
        0 0 20px rgba(59,130,246,.20),
        0 0 38px rgba(59,130,246,.13);
}

.upd-show-card::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 4px;
}

.upd-show-card::after {
    content: "";
    position: absolute;
    inset: 0;
    pointer-events: none;
    background: radial-gradient(circle at 85% 12%, rgba(255,255,255,.55), transparent 40%);
}

.upd-show-card--video::before {
    background: linear-gradient(180deg, #059669, #10b981);
}

.upd-show-card--image::before {
    background: linear-gradient(180deg, #2563eb, #3b82f6);
}

.upd-show-card:hover {
    transform: translateY(-4px);
    box-shadow:
        0 22px 45px rgba(15,23,42,.13),
        inset 0 1px 0 rgba(255,255,255,.9);
}

.upd-show-card:hover .upd-hover-glow {
    opacity: 1;
    animation: updGlowPulse 1.8s ease-in-out infinite alternate;
}

.upd-show-card:hover .upd-hover-sheen {
    opacity: .8;
    animation: updSheenSweep .9s cubic-bezier(.22,.9,.3,1) both;
}

@keyframes updGlowPulse {
    0% { filter: saturate(100%) brightness(100%); }
    100% { filter: saturate(120%) brightness(112%); }
}

@keyframes updSheenSweep {
    0% {
        transform: translateX(0) rotate(16deg);
        opacity: 0;
    }
    15% {
        opacity: .45;
    }
    100% {
        transform: translateX(320%) rotate(16deg);
        opacity: 0;
    }
}

@media (prefers-reduced-motion: reduce) {
    .upd-show-card:hover .upd-hover-glow,
    .upd-show-card:hover .upd-hover-sheen {
        animation: none;
    }
}

.upd-card-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: .9rem;
    margin-bottom: 1rem;
}

.upd-icon-box {
    width: 54px;
    height: 54px;
    border-radius: 18px;
    display: grid;
    place-items: center;
    color: #fff;
    box-shadow: 0 10px 24px rgba(37,99,235,.23);
}

.upd-show-card--video .upd-icon-box {
    background: linear-gradient(145deg, #10b981, #0f766e);
    box-shadow: 0 10px 24px rgba(16,185,129,.27);
}

.upd-show-card--image .upd-icon-box {
    background: linear-gradient(145deg, #3b82f6, #2563eb);
}

.upd-pill {
    display: inline-flex;
    align-items: center;
    padding: .36rem .88rem;
    border-radius: 999px;
    font-size: .72rem;
    font-weight: 800;
    letter-spacing: 2px;
}

.upd-pill--video {
    color: #0f766e;
    background: #d1fae5;
    border: 1px solid #99f6e4;
}

.upd-pill--image {
    color: #1d4ed8;
    background: #dbeafe;
    border: 1px solid #bfdbfe;
}

.upd-card-title {
    margin: 0 0 .45rem;
    font-size: clamp(1.25rem, 1.8vw, 1.65rem);
    line-height: 1.18;
    letter-spacing: -.8px;
    color: #0f172a;
    font-weight: 900;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.upd-card-desc {
    margin: 0 0 1rem;
    color: #64748b;
    font-size: .92rem;
    line-height: 1.62;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.upd-media-box {
    width: 100%;
    height: clamp(360px, 36vw, 520px);
    border-radius: 22px;
    overflow: hidden;
    border: 1px solid rgba(148,163,184,.34);
    background:
        linear-gradient(145deg, #f8fafc 0%, #edf2f8 100%);
    flex-shrink: 0;
    display: grid;
    place-items: center;
    padding: .65rem;
    box-shadow:
        inset 0 1px 0 rgba(255,255,255,.88),
        0 12px 28px rgba(15,23,42,.08);
}

.upd-media-box--video {
    height: clamp(430px, 42vw, 620px);
    background:
        radial-gradient(circle at 50% 0%, rgba(20,184,166,.16), transparent 38%),
        linear-gradient(145deg, #08111f 0%, #111827 100%);
}

.upd-media-box--image {
    height: clamp(430px, 42vw, 620px);
    background:
        radial-gradient(circle at 50% 0%, rgba(59,130,246,.15), transparent 38%),
        linear-gradient(145deg, #f8fafc 0%, #e8eef8 100%);
}

.upd-media-box iframe,
.upd-media-box video,
.upd-media-box img {
    width: 100%;
    height: 100%;
    display: block;
    border: 0;
    object-fit: contain;
    border-radius: 16px;
}

.upd-media-box iframe,
.upd-media-box video {
    background: #020617;
}

.upd-media-box--video iframe,
.upd-media-box--video video {
    object-position: center center;
}

.upd-media-box img {
    background: transparent;
    object-position: center center;
}

.upd-empty {
    width: 100%;
    height: 100%;
    display: grid;
    place-items: center;
    color: #64748b;
    font-weight: 600;
    background: linear-gradient(135deg, #f1f5f9, #e2e8f0);
}

.upd-meta-row {
    margin-top: 1rem;
    padding-top: .85rem;
    border-top: 1px solid rgba(148,163,184,.22);
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: .82rem;
    color: #64748b;
}

.upd-meta-row a {
    color: #0f766e;
    text-decoration: none;
    font-weight: 700;
}

.upd-meta-row a:hover {
    color: #0d9488;
}

@media (max-width: 1024px) {
    .upd-grid-two {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 640px) {
    .upd-container {
        padding: 0 1rem;
    }

    .upd-card-title {
        font-size: 1.5rem;
        -webkit-line-clamp: 2;
    }

    .upd-card-top {
        align-items: flex-start;
        flex-direction: column;
    }

    .upd-media-box {
        height: clamp(280px, 72vw, 430px);
        padding: .3rem;
    }

    .upd-media-box--video {
        height: clamp(360px, 92vw, 520px);
    }

    .upd-media-box--image {
        height: clamp(360px, 92vw, 520px);
    }
}
</style>
<?php endif; ?>
<?php /**PATH C:\workspace\ists\resources\views/public/partials/updates.blade.php ENDPATH**/ ?>