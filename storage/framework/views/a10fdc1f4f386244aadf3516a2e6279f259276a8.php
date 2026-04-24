<?php
    // $rawOnly: if true, attempt to render raw inner HTML without outer wrapper divs
    $rawOnly = $rawOnly ?? false;
    $title = $content->title ?? ($content['title'] ?? 'Contenido');
    $description = $content->description ?? $content['description'] ?? null;
    $bodyHtml = $content->body ?? $content->content ?? $content['body'] ?? $content['content'] ?? '';
    if ($rawOnly) {
        // Strip a single outer wrapper div if present to avoid duplicating layout-specific containers
        if (preg_match('/^\s*<div[^>]*>(.*)<\/div>\s*$/is', $bodyHtml, $m)) {
            $bodyHtml = $m[1];
        }
    }
?>

<div class="content-display">
    <h1><?php echo e($title); ?></h1>

    <?php if($description): ?>
        <p><?php echo e($description); ?></p>
    <?php endif; ?>

    <div class="content-body"><?php echo $bodyHtml; ?></div>
</div>
<?php /**PATH C:\workspace\ists\resources\views\public\partials\content_display.blade.php ENDPATH**/ ?>