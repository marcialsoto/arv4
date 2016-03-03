<?php 
	// ACF 
	global $post;
	$banner__url = get_field('banner__url'); 
	$banner__btn_title = get_field('banner__btn_title');
	$banner__ht = get_field('banner__ht');
	$banner__ht_url = get_field('banner__ht_url');
?>

<!-- Modal -->
<div class="modal fade" id="fontPageModal" tabindex="-1" role="dialog" aria-labelledby="fontPageModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <?php if ($banner__txt) {?>
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title"><?php the_title(); ?></h4>
		</div>
		<div class="modal-body">
			<?php the_content(); ?>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save changes</button>
		</div>
	<?php }else{ ?>
		<div class="modal-body banner-only">
	        <figure>
	        	<button type="button" class="close btn btn-default" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
				<?php if ( has_post_thumbnail() ) { ?>
					<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
					<?php if ($banner__url){ ?>
						<a href="<?php echo $banner__url; ?>" title="<?php the_title(); ?>" target="_blank">
							<img src="<?php echo $url; ?>" class="img-responsive" alt="">
						</a>
					<?php }?>
				<?php } ?>
			</figure>
	      </div>
	<?php } ?>
    </div>
  </div>
</div>