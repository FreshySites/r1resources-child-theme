<?php 
get_header();
/*
Template Name: my-clear-cooperation
*/
$user_id = get_current_user_id();
?>

<div id="primary" class="content-area bb-grid-cell">
        <main id="main" class="site-main">

			<?php if ( have_posts() ) :

				do_action( THEME_HOOK_PREFIX . '_template_parts_content_top' );

				while ( have_posts() ) :
					the_post();

					do_action( THEME_HOOK_PREFIX . '_single_template_part_content', 'page' );

				endwhile; // End of the loop.
			else :
				get_template_part( 'template-parts/content', 'none' );
				?>

			<?php endif; ?>

            <?php

if ( bp_has_groups('search_terms=RON&user_id=' . $user_id) ) : ?>
 
  
 
    <ul id="groups-list" class="item-list">
    <?php while ( bp_groups() ) : bp_the_group(); ?>
 
        
            <div class="item-avatar">
                <a href="<?php bp_group_permalink() ?>"><?php bp_group_avatar( 'type=thumb&width=50&height=50' ) ?></a>
            </div>
 
            <div class="item">
                <div class="item-title"><a href="<?php bp_group_permalink() ?>"><?php bp_group_name() ?></a></div>
                <div class="item-meta"><span class="activity"><?php printf( __( 'active %s ago', 'buddypress' ), bp_get_group_last_active() ) ?></span></div>
 
                <div class="item-desc"><?php bp_group_description_excerpt() ?></div>
 
                <?php do_action( 'bp_directory_groups_item' ) ?>
            </div>
 
            <div class="action">
                <?php bp_group_join_button() ?>
 
                <div class="meta">
                    <?php bp_group_type() ?> / <?php bp_group_member_count() ?>
                </div>
 
                <?php do_action( 'bp_directory_groups_actions' ) ?>
            </div>
 
            <div class="clear"></div>
        
 
    <?php endwhile; ?>
    </ul>
 
    <?php do_action( 'bp_after_groups_loop' ) ?>
 
<?php else: ?>
 
    <div id="message" class="info">
        <p><?php _e( 'You are not currently a member of any Clear Cooperation groups.<br />Please contact your broker to be included in the group.', 'buddypress' ) ?></p>
    </div>
 
<?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->



<?php
get_footer();?>