<?php $__env->startSection('container'); ?>
    <style>
        input{
            margin-left: 7px;
        }
    </style>

    <h1>Laporan Penerimaan Pajak</h1>
    <form action="<?php echo e(route('generate')); ?>" method="POST">
    <?php echo csrf_field(); ?>
        <label for="bulan">Bulan: </label><input type="text" id="bulan" name="bulan">
        <label for="tahun">Tahun: </label><input type="text" id="tahun" name="tahun">
        <input type="submit" name="Submit" value="Cari">
    </form>
    
    <script src="<?php echo e(asset('js/datepicker.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/naufal/Documents/My_Projects/web_perpajakan/resources/views/pages/laporan.blade.php ENDPATH**/ ?>