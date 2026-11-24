

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Data Cast</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('admin.casts.create')); ?>" class="btn btn-primary mb-3">
        Tambah Cast
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Bio</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $casts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cast): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration + ($casts->currentPage() - 1) * $casts->perPage()); ?></td>
                    <td><?php echo e($cast->name); ?></td>
                    <td><?php echo e($cast->age); ?></td>
                    <td><?php echo e($cast->bio); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.casts.edit', $cast->id)); ?>" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="<?php echo e(route('admin.casts.destroy', $cast->id)); ?>" method="POST" style="display:inline;">
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
                    <td colspan="5" class="text-center">Belum ada data cast.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php echo e($casts->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\laravel-kelas-xii - Copy\resources\views/admin/cast/index.blade.php ENDPATH**/ ?>