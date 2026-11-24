

<?php $__env->startSection('content'); ?>
<div class="container" style="padding: 30px;">
    <h2>Tambah Film</h2>

    <form action="<?php echo e(route('admin.films.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <div class="form-group mb-3">
            <label>Judul Film</label>
            <input type="text" name="title" class="form-control" value="<?php echo e(old('title')); ?>" required>
        </div>

        <div class="form-group mb-3">
            <label>Sinopsis</label>
            <textarea name="sinopsis" class="form-control" rows="5" required><?php echo e(old('sinopsis')); ?></textarea>
        </div>

        <div class="form-group mb-3">
            <label>Tahun</label>
            <input type="number" name="year" class="form-control" value="<?php echo e(old('year')); ?>" required>
        </div>

        <div class="form-group mb-3">
            <label>Genre</label>
            <select name="genre_id" class="form-control" required>
                <option value="">Pilih Genre</option>
                <?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($genre->id); ?>" <?php echo e(old('genre_id') == $genre->id ? 'selected' : ''); ?>>
                        <?php echo e($genre->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Sutradara</label>
            <select name="sutradara_id" class="form-control">
                <option value="">Pilih Sutradara</option>
                <?php $__currentLoopData = $sutradaras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sutradara): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($sutradara->id); ?>" <?php echo e(old('sutradara_id') == $sutradara->id ? 'selected' : ''); ?>>
                        <?php echo e($sutradara->nama_sutradara); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Poster Film</label>
            <input type="file" name="poster" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Film</button>
        <a href="<?php echo e(route('admin.films.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\laravel-kelas-xii - Copy\resources\views/admin/film/create.blade.php ENDPATH**/ ?>