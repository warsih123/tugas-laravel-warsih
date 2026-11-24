<div class="movies_nav">
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="navbar-header navbar-right">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
        <nav>
          <ul class="nav navbar-nav">
            <li class="w3_home_act <?php echo e(Route::current()->getName() == 'home' ? 'active' : ''); ?>"><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li class="dropdown <?php echo e(Route::current()->getName() == 'genre' ? 'active' : ''); ?>">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Genres <b class="caret"></b></a>
              <ul class="dropdown-menu multi-column columns-3">
                <li>
                  <div class="col-sm-4">
                    <ul class="multi-column-dropdown">
                      <?php for($genre = 1; $genre <= $genres->count() - 1; $genre++): ?>
                        <li><a href="<?php echo e(route('genre', $genres[$genre]->id)); ?>"><?php echo e($genres[$genre]->name); ?></a></li>
                        <?php if($genre % 7 == 0): ?>
                          </ul>
                        </div>
                        <div class="col-sm-4">
                          <ul class="multi-column-dropdown">
                        <?php endif; ?>
                      <?php endfor; ?>
                    </ul>
                  </div>
                  <div class="clearfix"></div>
                </li>
              </ul>
            </li>
            <li class="w3_home_act <?php echo e(Route::current()->getName() == 'movies' ? 'active' : ''); ?>"><a href="<?php echo e(route('movies')); ?>">Movies</a></li>

          </ul>
        </nav>
      </div>
    </nav>	
  </div>
</div><?php /**PATH C:\Users\ASUS\laravel-kelas-xii - Copy\resources\views/templates/component/navbar.blade.php ENDPATH**/ ?>