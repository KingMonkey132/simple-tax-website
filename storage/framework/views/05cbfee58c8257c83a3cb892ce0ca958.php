<?php $__env->startSection('download'); ?>
    <style>
        input{
            margin-left: 7px;
        }
        table{
            margin-top: 10px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 2px 5px 2px 5px;
        }

    </style>

    <h1>Laporan Penerimaan Pajak</h1>
    <h3>Bulan : <?php echo e($bulan); ?></h3>
    <h3>Tahun : <?php echo e($tahun); ?></h3>
   
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('../layouts.download', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/naufal/Documents/My_Projects/web_perpajakan/resources/views/download/laporan_pajak.blade.php ENDPATH**/ ?>