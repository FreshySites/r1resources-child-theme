<?php
/*
 * Template name: New Home
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package BuddyBoss_Theme
 */

get_header();
$user_id = get_current_user_id();
$profile_type = bp_get_member_type($user_id,$single = true);
?>
<style>
	#column-activity {padding-left:20px;padding-right:20px;}
	.activity-shortcode-title {background-color:#ddd;padding:10px;border:1px;border-color:#ddd;border-style:solid;border-radius:3px;}
	.members #subnav-filters {display:none;}
	.members .bp-feedback.info {display:none;}
	#members-dir-list {border-top:0;padding-top:0;}
</style>


<div id="primary" class="content-area bb-grid-cell" style="max-width:2200px;">
	<main id="main" class="site-main">

  
	<div class="wp-block-columns">
		<!-- // INFO-CALENDER COLUMN // -->
		<div class="wp-block-column" style="flex-basis:25%">
			<?php echo do_shortcode("[do_widget id='media_image-3']"); ?>
			<?php echo do_shortcode("[do_widget id='mec_mec_widget-3']"); ?>
		</div>
		<!-- // ACTIVITY COLUMN // -->
		<div id="column-activity" class="wp-block-column" style="flex-basis:50%">
			<?php //echo $user_id; ?>

			<?php 
				if ($profile_type == 'r1-business-solutions') {
					echo do_shortcode("[activity-stream title='R1 Business Solutions Activity Feed' object=groups primary_id=216 load_more=1 per_page=5]");
				}
				if ($profile_type == 'groovy-moose') {
					echo do_shortcode("[activity-stream title='Groovy Moose Activity Feed' object=groups primary_id=218]");
				}
			?>
			<?php echo do_shortcode("[activity-stream title='Activity Feed - My Groups' scope=groups load_more=1]"); ?>
			<?//php echo do_shortcode("[activity-stream title='My Mentions' user_id=$user_id load_more=1]"); ?>


			
		</div>
		<!-- // NAV COLUMN // -->
		<div class="wp-block-column" style="flex-basis:25%">
			<?php switch ($profile_type) {
				case "groovy-moose":
					echo "<div class='widget widget_nav_menu'>";
					echo do_shortcode("[do_widget id='nav_menu-10']");
					echo "</div>";
					echo "<div class='widget'>";
					echo "<h5>Group Members</h5>";
					echo do_shortcode("[profile data-view=list type='groovy-moose']");
					echo "</div>";
					break;
				case "r1-business-solutions":
					echo "<div class='widget widget_nav_menu'>";
					echo do_shortcode("[do_widget id='nav_menu-11']");
					echo "</div>";
					echo "<div class='widget'>";
					echo "<h5>Group Members</h5>";
					echo do_shortcode("[profile data-view=list type='r1-business-solutions']");
					echo "</div>";
					break;
				case "all":
					//echo do_shortcode("[do_widget id='nav_menu-5']");
					break;
				default:
					echo do_shortcode("[do_widget id='nav_menu-5']");

					echo "<div class='widget'>";
					echo "<h4 class='widget-title'>MY OFFICE</h4>";
					//echo do_shortcode("[do_widget id='nav_menu-11']");
					$user_id = get_current_user_id();
					echo "<ul id='menu-qb-group-info' class='menu'>";
					if ( bp_has_groups('group_type=offices&user_id=' . $user_id) ) :
						while ( bp_groups() ) : bp_the_group();
				?>
					<li class="menu-item menu-item-type-custom menu-item-object-custom"><i class="_mi _before buddyboss bb-icon-angle-right" aria-hidden="true"></i><span>
					<a href="<?php bp_group_permalink() ?>"><?php bp_group_name() ?></a><br /></span></li>
				<?php
							echo "</ul>";
							//$qburl = bp_get_group_permalink(bp_group_permalink());
							//echo "<a href='$qburl'>GROUP NAME</a>";
							//$qbname =  bp_get_group_name();
							//echo $qbname;
						endwhile;
						do_action( 'bp_after_groups_loop' );
					else: 
					//_e( 'You are not currently a member of any office groups.<br />Please contact your broker to be included in the group.', 'buddypress' );
					endif;
					echo "</div>";

					echo do_shortcode("[do_widget id='nav_menu-8']");
					echo do_shortcode("[do_widget id='nav_menu-3']");
					echo do_shortcode("[do_widget id='nav_menu-7']");
				}
			
			?>
			
		</div>
	</div>




	</main>
</div>

<script>
  jQuery('#members-list').removeClass('grid');
</script>

<?php
get_footer();