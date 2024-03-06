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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function () {
        $("#tgl-setor").datepicker({
            dateFormat: "yy-mm-dd" 
        });
    });
</script>

<h1>Tambah Data Transaksi</h1>
<form action="<?php echo e(route('simpan-data-transaksi')); ?>" class="input_form" method="post">
    <?php echo csrf_field(); ?>
    <h5 class="form-label">Kode Rekening</h5>
    <select name="no-rek">
        <option value=""></option>
        <?php $__currentLoopData = $rekenings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rekening): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($rekening->kode_rekening); ?>"><?php echo e($rekening->kode_rekening); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <h5 class="form-label">Nama Rekening</h5><input type="text" name="nama-rek" id="nama_rekening">
    <h5 class="form-label">Jumlah Setor</h5><input type="text" name="jumlah-setor">
    <h5 class="form-label">Tanggal Setor</h5><input type="text" name="tgl-setor" id="tgl-setor">
    <input type="submit" value="Submit">
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('../layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/belajar_laravel/resources/views/form/form_transaksi.blade.php ENDPATH**/ ?>