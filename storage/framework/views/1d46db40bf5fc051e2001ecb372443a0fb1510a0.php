

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h1 class="mb-4">Calendario de Eventos</h1>
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
                window.location.href = info.event.url;
                info.jsEvent.preventDefault();
            }
        });
        calendar.render();
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('public.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\workspace\ists\resources\views\public\events\calendar.blade.php ENDPATH**/ ?>