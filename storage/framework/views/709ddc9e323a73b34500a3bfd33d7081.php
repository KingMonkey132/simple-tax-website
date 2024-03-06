<?php $__env->startSection('container'); ?>
    <style>
        input{
            margin-left: 7px;
        }
        table{
            margin-top: 10px;
        }
    </style>

    <h1>Laporan Penerimaan Pajak</h1>
    <form action="<?php echo e(route('generate')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <label for="bulan">Bulan: </label><input type="text" id="bulan" name="bulan" value="<?php echo e($bulan); ?>">
        <label for="tahun">Tahun: </label><input type="text" id="tahun" name="tahun" value="<?php echo e($tahun); ?>">
        <input type="submit" name="Submit" value="Cari">
    </form>
    <form action="<?php echo e(route('download-laporan')); ?>" method="get" class="download-container">
        <button>Download PDF</button>
    </form>
    <table>
        <tr>
            <th>Kode Rekening</th>
            <th>Nama Rekening</th>
            <th>Target Anggaran</th>
            <th>sd Bulan Lalu</th>
            <th>Bulan Ini</th>
            <th>sd Bulan Ini</th>
            <th>%</th>
        </tr>
        <?php $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($data['kode_rekening']); ?></td>
            <td><?php echo e($data['nama_rekening']); ?></td>
            <td><?php echo e($data['target_anggaran']); ?></td>
            <td><?php echo e($data['sd_bulan_lalu']); ?></td>
            <td><?php echo e($data['bulan_ini']); ?></td>
            <td><?php echo e($data['sd_bulan_ini']); ?></td>
            <td><?php echo e($data['percentage']); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <script src="<?php echo e(asset('js/datepicker.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/naufal/Documents/My_Projects/web_perpajakan/resources/views/pages/show.blade.php ENDPATH**/ ?>