


<?php $__env->startSection('content'); ?>
<div class="container" style="padding: 30px;">

    <h2>Kelola Data Film</h2>
    <p>Daftar seluruh film One Movies.</p>

    <a href="<?php echo e(route('admin.films.create')); ?>"
       class="btn btn-primary"
       style="margin-bottom: 20px;">
        + Tambah Film
    </a>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <form action="<?php echo e(route('admin.films.index')); ?>"
          method="GET"
          style="display: flex; gap: 10px; margin-bottom: 20px;">

        <input type="text"
               name="search"
               class="form-control"
               placeholder="Cari judul film..."
               value="<?php echo e($search ?? ''); ?>">

        <button type="submit" class="btn btn-primary">
            Cari
        </button>

        <a href="<?php echo e(route('admin.films.index')); ?>"
           class="btn btn-secondary">
            Reset
        </a>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Poster</th>
                    <th>Judul Film</th>
                    <th>Tahun</th>
                    <th>Genre</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($films->firstItem() + $loop->index); ?></td>

                        <td>
                            <img src="<?php echo e(asset($film->poster)); ?>"
                                 width="70"
                                 alt="Poster film">
                        </td>

                        <td><?php echo e($film->title); ?></td>
                        <td><?php echo e($film->year); ?></td>
                        <td><?php echo e($film->genre->name ?? '-'); ?></td>

                        <td>
                            <a href="<?php echo e(route('admin.films.edit', $film->id)); ?>"
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <form action="<?php echo e(route('admin.films.destroy', $film->id)); ?>"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Yakin ingin menghapus film ini?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="submit"
                                        class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">
                            <?php if(!empty($search)): ?>
                                Film "<?php echo e($search); ?>" tidak ditemukan.
                            <?php else: ?>
                                Belum ada data film.
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php echo e($films->links()); ?>


</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\laravel-kelas-xii - Copy\resources\views/admin/film/index.blade.php ENDPATH**/ ?>