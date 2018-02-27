<?php
/* Template name: my-account */

get_header(); ?>


<?php 
	
	// Get content width and sidebar position
	$content_class = woodmart_get_content_class();

?>

   


	<!-- <div class="site-content <?php echo esc_attr( $content_class ); ?>" role="main"> -->

		<?php /* The loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->

					<section class="start-section container-fullhd">
					<div class="lk">
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
						</div>
					</section>

					<?php woodmart_entry_meta(); ?>

				<!-- </article> #post --> 

				<?php 
					// If comments are open or we have at least one comment, load up the comment template.
					if ( woodmart_get_opt('page_comments') && (comments_open() || get_comments_number()) ) :
						comments_template();
					endif;
				 ?>

		<?php endwhile; ?>

<!-- </div><!-- .site-content -->   -->
	  
<?php// get_sidebar(); ?>

<?php get_footer(); ?>