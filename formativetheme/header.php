<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('title'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('this-is-the-body'); ?>>
    <div class="content-wrapper">
    
    <?php if ( has_nav_menu( 'menu-1' ) ) : ?>
            <div class="bottomMenu">
                <?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>  
            </div>
		<nav id="site-navigation" class="main-navigation navbar-expand-md" aria-label="<?php esc_attr_e( 'Top Menu', 'dryrun_theme' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_class'     => 'main-menu',
					'items_wrap'     => '<ul id="%1$s" class="%2$s my-menu">%3$s</ul>',
				)
			);
			?>
			
		</nav><!-- #site-navigation -->
	<?php endif; ?>