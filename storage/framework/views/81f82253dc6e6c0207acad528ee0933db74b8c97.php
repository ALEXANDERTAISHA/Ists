<?php
use App\Models\AcademicCalendarEvent;

$event = AcademicCalendarEvent::orderBy('start_date', 'asc')
    ->whereDate('end_date', '>=', now())
    ->first();
?>

<?php if($event): ?>
    <div style="margin-top: 0.35rem;">
        <div style="font-weight: 700; color: rgba(255,255,255,0.92); font-size: 0.95rem; line-height: 1.45;">
            <?php echo e($event->title); ?>

        </div>
        <div style="color: rgba(255,255,255,0.58); font-size: 0.84rem; margin-top: 0.15rem;">
            <?php echo e(\Carbon\Carbon::parse($event->start_date)->format('d/m/Y')); ?> - <?php echo e(\Carbon\Carbon::parse($event->end_date)->format('d/m/Y')); ?>

        </div>
        <?php if($event->description): ?>
            <div style="color: rgba(255,255,255,0.5); font-size: 0.82rem; margin-top: 0.3rem; line-height: 1.6;">
                <?php echo e(\Illuminate\Support\Str::limit(trim(strip_tags($event->description)), 90)); ?>

            </div>
        <?php endif; ?>
        <div style="margin-top: 0.45rem;">
            <a href="<?php echo e(url('/calendario')); ?>" style="color: #6ee7d8; text-decoration: none; font-size: 0.84rem; font-weight: 700;">
                Ver calendario completo
            </a>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\workspace\ists\resources\views/public/partials/footer_calendar_card.blade.php ENDPATH**/ ?>