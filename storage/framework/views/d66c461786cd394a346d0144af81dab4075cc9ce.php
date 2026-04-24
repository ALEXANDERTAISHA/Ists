
<?php $__env->startSection('title', 'Calendario Académico'); ?>
<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <h1 class="mb-4" style="color: var(--color-primary); font-family: var(--font-heading); font-weight: 700;">Calendario Académico</h1>
    <div id="calendar"></div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
<style>
    #calendar {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        padding: 1rem;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            events: <?php echo json_encode($calendarEvents, 15, 512) ?>,
            eventClick: function(info) {
                if(info.event.extendedProps.description) {
                    alert(info.event.title + "\n" + info.event.extendedProps.description);
                }
                info.jsEvent.preventDefault();
            }
        });
        calendar.render();
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\public\academic_calendar\index.blade.php ENDPATH**/ ?>