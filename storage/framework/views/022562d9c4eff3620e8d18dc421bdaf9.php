<?php $__env->startPush('style'); ?>
<link href="<?php echo e(asset('template/css/owl.carousel.css')); ?>" rel="stylesheet" type="text/css" media="all">
<!-- banner-slider -->
<link href="<?php echo e(asset('template/css/jquery.slidey.min.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<!-- banner -->
<div id="slidey" style="display:none;">
  <ul>
    <?php $__currentLoopData = $filmSlidey; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><img src="<?php echo e($film->poster); ?>" alt="<?php echo e($film->title); ?>">
        <p class='title'><?php echo e($film->title); ?></p>
        <p class='description'><?php echo e($film->sinopsis); ?></p>
      </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>   	
  </div>
  <script src="<?php echo e(asset('template/js/jquery.slidey.js')); ?>"></script>
  <script src="<?php echo e(asset('template/js/jquery.dotdotdot.min.js')); ?>"></script>
   <script type="text/javascript">
    $("#slidey").slidey({
      interval: 8000,
      listCount: 5,
      autoplay: false,
      showList: true
    });
    $(".slidey-list-description").dotdotdot();
  </script>
<!-- //banner -->
<!-- banner-bottom -->
<div class="banner-bottom">
  <div class="container">
    <div class="w3_agile_banner_bottom_grid">
      <div id="owl-demo" class="owl-carousel owl-theme">
        <?php for($data = 0; $data < $films->count(); $data++): ?>
          <div class="item">
            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
              <a href="<?php echo e(route('movies.show', $films[$data]->id)); ?>" class="hvr-shutter-out-horizontal"><img src="<?php echo e(asset($films[$data]->poster)); ?>" title="album-name" alt=" " />
                <div class="w3l-action-icon">
                  <i class="fa fa-play-circle" aria-hidden="true"></i>
                </div>
              </a>
              <div class="mid-1">
                <div class="w3l-movie-text">
                  <h6><a href="<?php echo e(route('movies.show', $films[$data]->id)); ?>"><?php echo e($films[$data]->title); ?></a></h6>							
                </div>
                <div class="mid-2">
                  <p><?php echo e($films[$data]->year); ?></p>
                  <div class="block-stars">
                    <ul class="w3l-ratings">
                          <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                          
                
                    </ul>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
              <?php if($films[$data]->year == now()->year): ?>
              <div class="ribben two">
                <p>NEW</p>
              </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>			
  </div>
</div>
<!-- //banner-bottom -->
<div class="general_social_icons">
<nav class="social">
  <ul>
    <li class="w3_twitter"><a href="#">Twitter <i class="fa fa-twitter"></i></a></li>
    <li class="w3_facebook"><a href="#">Facebook <i class="fa fa-facebook"></i></a></li>
    <li class="w3_dribbble"><a href="#">Dribbble <i class="fa fa-dribbble"></i></a></li>
    <li class="w3_g_plus"><a href="#">Google+ <i class="fa fa-google-plus"></i></a></li>				  
  </ul>
</nav>
</div>
<!-- general -->
<div class="general">
  <h4 class="latest-text w3_latest_text">Featured Movies</h4>
  <div class="container">
    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
      <ul id="myTab" class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Featured</a></li>
        <li role="presentation"><a href="#imdb" role="tab" id="imdb-tab" data-toggle="tab" aria-controls="imdb" aria-expanded="false">Recently Added</a></li>
      </ul>
      <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
          <div class="w3_agile_featured_movies">
            <?php for($data = 0; $data < $filmFutured->count(); $data++): ?>
              <div class="col-md-2 w3l-movie-gride-agile">
                <a href="<?php echo e(route('movies.show', $filmFutured[$data]->id)); ?>" class="hvr-shutter-out-horizontal"><img src="<?php echo e(asset($filmFutured[$data]->poster)); ?>" title="album-name" alt=" " />
                  <div class="w3l-action-icon">
                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                  </div>
                </a>
                <div class="mid-1">
                  <div class="w3l-movie-text">
                    <h6><a href="<?php echo e(route('movies.show', $filmFutured[$data]->id)); ?>"><?php echo e($filmFutured[$data]->title); ?></a></h6>							
                  </div>
                  <div class="mid-2">
                    <p><?php echo e($filmFutured[$data]->year); ?></p>
                    <div class="block-stars">
                      <ul class="w3l-ratings">
                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                            
                  
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <?php if($filmFutured[$data]->year == now()->year): ?>
                <div class="ribben two">
                  <p>NEW</p>
                </div>
                <?php endif; ?>
              </div>
            <?php endfor; ?>
            <div class="clearfix"> </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="imdb" aria-labelledby="imdb-tab">
          <div class="w3_agile_featured_movies">
            <?php for($data = 0; $data < $filmRecentAdded->count(); $data++): ?>
              <div class="col-md-2 w3l-movie-gride-agile">
                <a href="<?php echo e(route('movies.show', $filmRecentAdded[$data]->id)); ?>" class="hvr-shutter-out-horizontal"><img src="<?php echo e(asset($filmRecentAdded[$data]->poster)); ?>" title="album-name" alt=" " />
                  <div class="w3l-action-icon">
                    <i class="fa fa-play-circle" aria-hidden="true"></i>
                  </div>
                </a>
                <div class="mid-1">
                  <div class="w3l-movie-text">
                    <h6><a href="<?php echo e(route('movies.show', $filmRecentAdded[$data]->id)); ?>"><?php echo e($filmRecentAdded[$data]->title); ?></a></h6>							
                  </div>
                  <div class="mid-2">
                    <p><?php echo e($filmRecentAdded[$data]->year); ?></p>
                    <div class="block-stars">
                      <ul class="w3l-ratings">
                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                            
                  
                      </ul>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <?php if($filmRecentAdded[$data]->year == now()->year): ?>
                <div class="ribben two">
                  <p>NEW</p>
                </div>
                <?php endif; ?>
              </div>
            <?php endfor; ?>
            <div class="clearfix"> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- //general -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('template/js/easing.js')); ?>"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
<script src="<?php echo e(asset('template/js/owl.carousel.js')); ?>"></script>
<script>
	$(document).ready(function() { 
		$("#owl-demo").owlCarousel({
	 
		  autoPlay: 3000, //Set AutoPlay to 3 seconds
	 
		  items : 5,
		  itemsDesktop : [640,5],
		  itemsDesktopSmall : [414,4]
	 
		});
	 
	}); 
</script> 
<?php $__env->stopPush(); ?>
<?php echo $__env->make('templates.index', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\ASUS\laravel-kelas-xii - Copy\resources\views/components/home.blade.php ENDPATH**/ ?>