<?php $__env->startSection('container'); ?>

        <h1>Daftar Transaksi</h1>
        <button class="tambah-data"><a href="/transaksi/tambah-data">Tambah Data</a></button>
        <div class="search-feature">
            <form action="<?php echo e(route('cari-data-transaksi')); ?>" method="get" class="search">
                <label for="search">Cari: </label><input type="text" name="search" class="input-search" placeholder="Ketik Nama Rekening">
                <input type="submit" value="Cari">
            </form>
            <form action="<?php echo e(route('transaksi')); ?>" method="GET" class="refresh">
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
                <th>Nama Rekening</th>
                <th>Tanggal Setor</th>
                <th>Jumlah Setor</th>
                <th>Aksi</th>
                </tr>

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td><?php echo e($item->kode_rekening); ?></td>
                <td><?php echo e($item->nama_rekening); ?></td>
                <td><?php echo e($item->tgl_setor); ?></td>
                <td><?php echo e($item->jumlah_setor); ?></td>
                <td>
                        <div class="action-container">
                                <form action="<?php echo e(route('edit-data-transaksi', $item->id_transaksi)); ?>">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit">Edit</button>
                                </form>
                                <form action="<?php echo e(route('hapus-data-transaksi', $item->id_transaksi)); ?>" method="post" id="delete-<?php echo e($item->id_transaksi); ?>">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button type="submit" onclick="confirmDelete()">Hapus</button>
                                </form>
                        </div>
                </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>
        </div>
        <script>
        function confirmDelete(id_transaksi){
                if (confirm('Anda yakin untuk menghapus data ini?')){
                    document.getElementById('delete-' + id_transaksi).submit();
                } else {
                    console.log('Penghapusan dibatalkan');
                }
            }
        </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/naufal/Documents/My_Projects/web_perpajakan/resources/views/pages/transaksi.blade.php ENDPATH**/ ?>