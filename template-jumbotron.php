<?php
/**
 * The template for displaying full width pages.
 Template Name: Jumbotron
 *
 * @package bootville
 */

get_header(); ?>


	<div class="row">
		
	<div id="primary" class="col-lg-12 col-md-12">
		<main id="main" class="site-main" role="main">
<?php while ( have_posts() ) : the_post(); ?>
			<div class="jumbotron">	
				<div class="container">
					<div class="row">
							
						<div class="col-md-5 col-lg-5 col-lg-push-7">	
								<div class="img-responsive featured-jumbo-image"><?php the_post_thumbnail('jumbotron-image'); ?></div>
						</div><!-- .col -->
						
							<div class="col-md-7 col-lg-7 col-lg-pull-5">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

								<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

							<div class="entry-content">
								<?php the_content(); ?>
							</div><!-- .entry-content -->
							
							</article><!-- #post-## -->
						</div> <!-- .col -->			
					</div> <!-- .row -->
				</div> <!-- container -->
			</div><!-- .jumbotron -->	
<?php endwhile; // end of the loop. ?>
		</main><!-- #main -->
	</div><!-- #primary -->
	</div><!-- .row -->

	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="footer-widgets widget-area row">
				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'jumbotron-1' ); ?>
				</div>

				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'jumbotron-2' ); ?>
				</div>

				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'jumbotron-3' ); ?>
				</div>
			</div><!--row-->
			
		<!-- second Jumbotron template widget row -->
			<div class="footer-widgets widget-area row">
				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'jumbotron-4' ); ?>
				</div>

				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'jumbotron-5' ); ?>
				</div>

				<div class="col-lg-4 col-md-4">
					<?php dynamic_sidebar( 'jumbotron-6' ); ?>
				</div>
			</div><!--row-->			
			
	
			<div class="row">
				<div class="footer-menu">
						<div class="col-lg-12 col-md-12">
							<?php if (has_nav_menu('footer-menu', 'bootville')) { ?>
								<nav role="navigation">
								<?php wp_nav_menu(array(
								  'container'       => '',
								  'menu_class'      => 'footer-menu',
								  'theme_location'  => 'footer-menu')
								); 
								?>
							  </nav>
							<?php } ?>
						</div>
					</div><!-- .footer-menu-->
			</div><!-- .row -->	
		
		<div class="row">
			<div class="credits">
		
			<div class="col-md-6 col-lg-6 col-lg-push-6">
			<div class="copyright">
				<p class="copyright">&copy; <?php _e('Copyright', 'bootville'); ?> <?php echo date('Y'); ?> - <a href="<?php echo home_url(); ?>/" title="<?php bloginfo('name'); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
			</div>
			</div>
			
			<div class="col-md-6 col-lg-6 col-lg-pull-6">
				<div class="site-info">

					<!-- Theme credits -->
					<a href="<?php echo esc_url( __( 'http://zeaks.org/bootville-lite/', 'bootville' ) ); ?>" title="<?php esc_attr_e( 'Bootville Lite', 'bootville' ); ?>"> <?php printf( 'Bootville Lite', 'bootville' ); ?></a>
					<?php printf( 'Theme ', 'bootville' ); ?> 
					
					<!-- WordPress credits -->
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'bootville' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'bootville' ); ?>"><?php printf( __( 'Powered by %s', 'bootville' ), 'WordPress' ); ?></a>
				</div><!-- .site-info -->	
			</div>	
			</div><!-- .credits -->
		</div><!-- .row -->
		
	</footer><!-- #colophon -->
</div><!-- #wrap -->

<?php wp_footer(); ?>

</body>
</html>