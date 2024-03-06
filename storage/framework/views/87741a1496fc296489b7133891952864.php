<?php $__env->startSection('container'); ?>


<style>
    * {
        text-align: left;
    }



    h1 {
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-label {
        position: absolute;
        text-align: left;
        left: 0px;
        margin-left: 300px;
        margin-bottom: 10px;
    }

    input {
        margin-left: 600px;
        margin-bottom: 10px;
    }

    select {
        margin-left: 600px;
        margin-bottom: 10px;
    }

</style>

    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <h1>Tambah Data Target Anggaran</h1>
        <form action="<?php echo e(route('simpan-data-laporan')); ?>" class="input_form" method="post">
            <?php echo csrf_field(); ?>
            <h5 class="form-label">Kode Rekening</h5>
                <select name="no-rek">
                    <option value=""></option>
                    <?php $__currentLoopData = $rekenings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rekening): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($rekening->kode_rekening); ?>"><?php echo e($rekening->kode_rekening); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            <h5 class="form-label">Nama Rekening</h5><input type="text" name="nama-rek" id="nama_rekening">
            <h5 class="form-label">Tahun Anggaran</h5><input type="text" name="tahun-anggaran">
            <h5 class="form-label">Target Anggaran</h5><input type="text" name="target-anggaran">
            <h5 class="form-label">s/d Bulan Lalu</h5><input type="text" name="sd-bulan-lalu">
            <h5 class="form-label">Bulan Ini</h5><input type="text" name="bulan-ini">
            <input type="submit" value="Submit">
        </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/belajar_laravel/resources/views/form/form_laporan.blade.php ENDPATH**/ ?>