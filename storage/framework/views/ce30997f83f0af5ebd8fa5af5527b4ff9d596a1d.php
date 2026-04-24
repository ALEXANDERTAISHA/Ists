<div class="authority-profile-layout">
    <div class="authority-image-section">
        <?php if($member->image_path): ?>
            <img src="<?php echo e(asset('storage/' . $member->image_path)); ?>" alt="<?php echo e($member->name); ?>" class="authority-profile-image">
        <?php endif; ?>
        <div class="authority-name-card">
            <h2 class="authority-name"><?php echo e($member->name); ?></h2>
            <p class="authority-position"><?php echo e($member->position); ?></p>
        </div>
    </div>
    <div class="authority-info-section">
        <div class="authority-bio-content">
            <?php echo nl2br(e($member->bio)); ?>

        </div>
    </div>
</div>
<?php /**PATH C:\workspace\ists\resources\views\public\partials\team_member_profile.blade.php ENDPATH**/ ?>