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

</style>

    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <h1>Edit Data Target Anggaran</h1>
        <form action="<?php echo e(route('update-data-anggaran', $data->id_anggaran)); ?>" class="edit_form" method="post">
            <?php echo method_field('put'); ?>
            <?php echo csrf_field(); ?>
            <h5 class="form-label">Kode Rekening</h5><input type="text" name="no-rek" value="<?php echo e($data->kode_rekening); ?>">
            <h5 class="form-label">Nama Rekening</h5><input type="text" name="nama-rek" value="<?php echo e($data->nama_rekening); ?>">
            <h5 class="form-label">Tahun Anggaran</h5><input type="text" name="tahun_anggaran" value="<?php echo e($data->tahun_anggaran); ?>">
            <h5 class="form-label">Target Anggaran</h5><input type="text" name="target_anggaran" value="<?php echo e($data->target_anggaran); ?>">
            <input type="submit" value="Submit">
        </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/naufal/Documents/My_Projects/web_perpajakan/resources/views/form/edit_target.blade.php ENDPATH**/ ?>