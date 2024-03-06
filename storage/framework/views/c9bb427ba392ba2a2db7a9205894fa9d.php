<?php $__env->startSection('container'); ?>
        <h1>Daftar Rekening</h1>
        <button class="tambah-data"><a href="/rekening/tambah-data">Tambah Data</a></button>

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

        <div class="table-container">
            <table>
                <tr>
                    <th>Kode Rekening</th>
                    <th>Jenis Rekening</th>
                    <th>Sub Rekening</th>
                    <th>Nama Rekening</th>
                    <th>Aksi</th>
                </tr>

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->kode_rekening); ?></td>
                    <td><?php echo e($item->jenis_rekening); ?></td>
                    <td><?php echo e($item->sub_rekening); ?></td>
                    <td><?php echo e($item->nama_rekening); ?></td>
                    <td>
                        <form action="<?php echo e(route('hapus-data-rekening', $item->kode_rekening)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/belajar_laravel/resources/views/pages/rekening.blade.php ENDPATH**/ ?>