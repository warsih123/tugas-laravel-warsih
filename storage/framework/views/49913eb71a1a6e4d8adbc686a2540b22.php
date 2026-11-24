


<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Data Sutradara</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('admin.sutradara.create')); ?>" class="btn btn-primary mb-3">
        Tambah Sutradara
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Sutradara</th>
                <th>Biografi</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $sutradaras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sutradara): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($sutradara->nama_sutradara); ?></td>
                    <td><?php echo e($sutradara->biografi ?? '-'); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.sutradara.edit', $sutradara->id)); ?>"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="<?php echo e(route('admin.sutradara.destroy', $sutradara->id)); ?>"
                            method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada data sutradara.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\laravel-kelas-xii - Copy\resources\views/admin/sutradara/index.blade.php ENDPATH**/ ?>