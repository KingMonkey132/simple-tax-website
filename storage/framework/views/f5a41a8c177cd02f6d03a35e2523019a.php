<?php $__env->startSection('container'); ?>

    <h1>Laporan Penerimaan Pajak</h1>
    <button class="tambah-data"><a href="/laporan/tambah-data">Tambah Data</a></button>

    <?php if(session('success')): ?>
        <style>
            .alert {
                margin-top: 10px;
            }
        </style>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
    <?php endif; ?>

    <table style="margin-top: 10px">
            <tr>
                <th>Kode Rekening</th>
                <th>Nama Rekening</th>
                <th>Target</th>
                <th>sd Bulan Lalu</th>
                <th>Bulan Ini</th>
                <th>sd Bulan Ini</th>
                <th>%</th>
                <th>Aksi</th>
             </tr>

            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($item->kode_rekening); ?></td>
                <td><?php echo e($item->nama_rekening); ?></td>
                <td><?php echo e($item->target_anggaran); ?></td>
                <td><?php echo e($item->sd_bulan_lalu); ?></td>
                <td><?php echo e($item->bulan_ini); ?></td>
                <td><?php echo e($item->sd_bulan_ini); ?></td>
                <td><?php echo e($item->percentage); ?></td>
                <td>
                    <form action="<?php echo e(route('hapus-data-laporan', $item->kode_rekening)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('delete'); ?>
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/belajar_laravel/resources/views/pages/laporan.blade.php ENDPATH**/ ?>