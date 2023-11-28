<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package BuddyBoss_Theme
 */

get_header();
?>
<style>
.single .entry-img {padding-top:0 !important;}
figure.entry-media.entry-img.bb-vw-container1 {display:none;}
.single:not(.single-post) .entry-content-wrap {padding: 0 0 0;}
.acadp img {max-width:50%;}
.list-group.acadp-margin-bottom {display:none !important;}
#comments {display:none;}
.rmp-widgets-container.rmp-wp-plugin.rmp-main-container{margin:3rem 0;}
</style>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php
			if ( have_posts() ) :

				do_action( THEME_HOOK_PREFIX . '_template_parts_content_top' );

				while ( have_posts() ) :
					the_post();

					do_action( THEME_HOOK_PREFIX . '_single_template_part_content', get_post_type() );

				endwhile; // End of the loop.

			endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<script>
jQuery('a[data-target="#acadp-report-abuse-modal"]').html("Let us know what you think about this vendor");
jQuery("h4.comments-title").html("Reviews");

</script>

<?php
get_footer();
