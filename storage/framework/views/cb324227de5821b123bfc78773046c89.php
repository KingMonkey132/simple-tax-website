<?php $__env->startSection('container'); ?>

        <h1>Target Anggaran</h1>
        <button class="tambah-data"><a href="/target/tambah-data">Tambah Data</a></button>
        <div class="search-feature">
            <form action="<?php echo e(route('cari-data-anggaran')); ?>" method="get" class="search">
                <label for="search">Cari: </label><input type="text" name="search" class="input-search" placeholder="Ketik Nama Rekening">
                <input type="submit" value="Cari">
            </form>
            <form action="<?php echo e(route('anggaran')); ?>" method="GET" class="refresh">
                <input type="submit" value="Refresh">
            </form>
        </div>


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
                    <th>Tahun Anggaran</th>
                    <th>Target Anggaran</th>
                    <th>Aksi</th>
                </tr>

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->kode_rekening); ?></td>
                    <td><?php echo e($item->jenis_rekening); ?></td>
                    <td><?php echo e($item->sub_rekening); ?></td>
                    <td><?php echo e($item->nama_rekening); ?></td>
                    <td><?php echo e($item->tahun_anggaran); ?></td>
                    <td><?php echo e($item->target_anggaran); ?></td>
                    <td>
                        <div class="action-container">
                            <form action="<?php echo e(route('edit-data-anggaran', $item->id_anggaran)); ?>" method="get">
                                <?php echo csrf_field(); ?>
                                <button type="submit">Edit</button>
                            </form>
                            <form action="<?php echo e(route('hapus-data-anggaran', $item->id_anggaran)); ?>" method="post" id="delete-<?php echo e($item->kode_rekening); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('delete'); ?>
                                <button type="button" onclick="confirmDelete('<?php echo e($item->kode_rekening); ?>')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
        <script>
            function confirmDelete(kode_rekening){
                if (confirm('Anda yakin untuk menghapus data ini?')){
                    document.getElementById('delete-' + kode_rekening).submit();
                } else {
                    console.log('Penghapusan dibatalkan');
                }
            }
        </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/naufal/Documents/My_Projects/web_perpajakan/resources/views/pages/target.blade.php ENDPATH**/ ?>