<!-- Template Name: Contact Page -->




<?php

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
            <div class="container white-body p-5 mt-4">

            <div class="block">
            
                <?php

                    /* Start the Loop */
                    while ( have_posts() ) :
                        the_post();
                        
                ?>
                <div class="div-image centered-flex mb-3">
                    <div class="overlay">
                        <h2 class="pb-4 white-header"><?php the_title(); ?></h2>
                    </div>
                </div>

                <div class="about-content">
                        <?php 
                            the_content();
                        ?>
                </div>  <!-- end of about-content -->
                
                <?php

                        //get_template_part( 'template-parts/content/content', 'page' );

                    endwhile; // End of the loop.
                ?>
 
            </div> <!-- end of block -->

            </div> <!-- end of container -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
