<?php
/**
 * Template Name: Top 6
 * 
 */

get_header();
?>

	<?php 
	$args = array ('post_type' => 'top6');
	$query = new WP_Query( $args );
	?>
	

	

	<section id="primary" class="content-area">
		<main id="main" class="site-main d-flex justify-content-center align-items-center">
			<div class="top6-wrapper white-body mt-4 mb-5 col-md-7 col-sm-12
			">
			
                <div class="div-image centered-flex mt-4 mb-3 col-10 p-0">
                    <div class="overlay col-12">
                        <h1 class="white-header"><?php echo get_the_title(); ?></h1>
                    </div>
                </div>

				<?php if ($query->have_posts()) : while ($query->have_posts()) : ?>
				<?php $query->the_post(); ?>

				<?php 
				$image_array = get_field('top6_thumbnail');
				$top6_thumb_url = $image_array['sizes']['medium'];

				//echo '<pre>' . var_export($image_array['sizes'], true) . '</pre>';
				?>

					    <div class="col-md-4 col-sm-6 col-xs-12 m-3">
                            <div class="hovereffect">
                                <img class="cover" src="<?php echo $top6_thumb_url ?>" alt="">
                                <div class="overlay">
                                   <ul class="p-0 pt-5">
        								<li class="page-li"><?php echo get_field('top6_name'); ?></li>
        								<li class="page-li">$<?php echo get_field('top6_price'); ?></li>
        								<li><a class="page-link" href="<?php the_permalink(); ?>">See More</a></li>
        							</ul> 
                                </div>
                            </div>
                        </div>
					    


				<?php endwhile ?>
				<?php //wp_reset_postdata(); ?>
				<?php endif ?>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();