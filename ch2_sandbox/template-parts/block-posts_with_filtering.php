<?php
/**
* Template part for displaying a Two columns.
*/
?>
<section class="block posts_with_filtering default-<?php the_sub_field( 'default_background' ); ?>">
    <div class="outer-block-wrapper"> <!-- extend with needed container -->
        <div class="inner-block-wrapper"> <!-- probably extend with row or -->
			<div class="col-md-12">
				<div class="post-filters">
					<button onclick="FWP.reset()" class="facet-reset">View All</button>
					<?php echo facetwp_display( 'facet', 'categories' ); ?>
				</div>
				
				<div class="row">
					<?php echo do_shortcode( '[facetwp template="categories_query"]' ); ?>
				</div>
				
				<?php echo do_shortcode( '[facetwp pager="true"]' ); ?>
			</div>
        </div>
    </div>
</section>