<?php

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
        <div class="main-container container-fluid p-5">

            <div class="main-block pt-3">

                <?php

                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();
                        
                ?>

                <h2 class="pb-5 main-header col-12"><?php the_title(); ?></h2>

                <div class="container white-body">
                   <?php
                        the_content();
                        get_template_part( 'template-parts/content/content', 'page' );

                        endwhile; // End of the loop.
                    ?> 
                </div>

                

            </div> <!-- end of block -->

        </div> <!-- end of container -->
                
                

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
