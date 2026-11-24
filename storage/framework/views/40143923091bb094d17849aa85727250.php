 


<?php $__env->startSection('content'); ?>
<div class="container" style="padding: 30px;">

    <h2>Kelola Data Genre</h2>

    <a href="<?php echo e(route('admin.genres.create')); ?>" class="btn btn-primary mb-3">
        + Tambah Genre
    </a>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Genre</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($genre->name); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.genres.edit', $genre->id)); ?>"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="<?php echo e(route('admin.genres.destroy', $genre->id)); ?>"
                              method="POST"
                              style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus genre ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="3" class="text-center">
                        Belum ada data genre.
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php echo e($genres->links()); ?>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\laravel-kelas-xii - Copy\resources\views/admin/genre/index.blade.php ENDPATH**/ ?>