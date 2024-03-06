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

    <h1>Tambah Data Rekening</h1>
        <form action="<?php echo e(route('simpan-data-rekening')); ?>" class="input_form" method="post">
            <?php echo csrf_field(); ?>
            <h5 class="form-label">Kode Rekening</h5><input type="text" name="no-rek">
            <h5 class="form-label">Nama Rekening</h5><input type="text" name="nama-rek">
            <input type="submit" value="Submit">
        </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/naufal/Documents/My Projects/web_perpajakan/resources/views/form/form_rekening.blade.php ENDPATH**/ ?>