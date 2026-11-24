


<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Tambah Sutradara</h2>

    <form action="<?php echo e(route('admin.sutradara.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="form-group mb-3">
            <label>Nama Sutradara</label>
            <input type="text" name="nama_sutradara"
                class="form-control"
                value="<?php echo e(old('nama_sutradara')); ?>"
                placeholder="Masukkan nama sutradara"
                required>
            <?php $__errorArgs = ['nama_sutradara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-danger"><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="form-group mb-3">
            <label>Biografi</label>
            <textarea name="biografi" class="form-control"
                rows="4"
                placeholder="Masukkan biografi sutradara"><?php echo e(old('biografi')); ?></textarea>
            <?php $__errorArgs = ['biografi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <small class="text-danger"><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan
        </button>

        <a href="<?php echo e(route('admin.sutradara.index')); ?>"
            class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\laravel-kelas-xii - Copy\resources\views/admin/sutradara/create.blade.php ENDPATH**/ ?>