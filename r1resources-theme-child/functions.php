<?php
/**
 * @package BuddyBoss Child
 * The parent theme functions are located at /buddyboss-theme/inc/theme/functions.php
 * Add your own functions at the bottom of this file.
 */


/****************************** THEME SETUP ******************************/

/**
 * Sets up theme for translation
 *
 * @since BuddyBoss Child 1.0.0
 */
function buddyboss_theme_child_languages()
{
  /**
   * Makes child theme available for translation.
   * Translations can be added into the /languages/ directory.
   */

  // Translate text from the PARENT theme.
  load_theme_textdomain( 'buddyboss-theme', get_stylesheet_directory() . '/languages' );

  // Translate text from the CHILD theme only.
  // Change 'buddyboss-theme' instances in all child theme files to 'buddyboss-theme-child'.
  // load_theme_textdomain( 'buddyboss-theme-child', get_stylesheet_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'buddyboss_theme_child_languages' );

/**
 * Enqueues scripts and styles for child theme front-end.
 *
 * @since Boss Child Theme  1.0.0
 */
function buddyboss_theme_child_scripts_styles()
{
  /**
   * Scripts and Styles loaded by the parent theme can be unloaded if needed
   * using wp_deregister_script or wp_deregister_style.
   *
   * See the WordPress Codex for more information about those functions:
   * http://codex.wordpress.org/Function_Reference/wp_deregister_script
   * http://codex.wordpress.org/Function_Reference/wp_deregister_style
   **/

  // Styles
  wp_enqueue_style( 'buddyboss-child-css', get_stylesheet_directory_uri().'/assets/css/custom.css', '', '1.0.0' );

  // Javascript
  wp_enqueue_script( 'buddyboss-child-js', get_stylesheet_directory_uri().'/assets/js/custom.js', '', '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'buddyboss_theme_child_scripts_styles', 9999 );


/****************************** CUSTOM FUNCTIONS ******************************/

// Add your own custom functions here


// Function to change email address
function wpb_sender_email( $original_email_address ) {
    return 'marketingmail@r1resources.com';
}
 
// Function to change sender name
function wpb_sender_name( $original_email_from ) {
    return 'R1 Companies';
}
 
// Hooking up our functions to WordPress filters 
add_filter( 'wp_mail_from', 'wpb_sender_email' );
add_filter( 'wp_mail_from_name', 'wpb_sender_name' );


//add_filter('show_admin_bar', '__return_false');
show_admin_bar(false);



// Remove default link around product entries
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

// Re-add links and check for affiliate link
function myprefix_woocommerce_template_loop_product_link_open() {
	$affiliate_link = get_post_meta( get_the_ID(), '_product_url', true );
	if ( $affiliate_link ) {
		echo '<a href="'. esc_url( $affiliate_link ) .'" class="woocommerce-LoopProduct-link" target="_blank">';
	} else {
		echo '<a href="'. get_the_permalink() .'" class="woocommerce-LoopProduct-link">';
	}
}
add_action( 'woocommerce_before_shop_loop_item', 'myprefix_woocommerce_template_loop_product_link_open', 10 );


add_action( 'woocommerce_after_shop_loop_item_title', 'wc_add_long_description' );
/**
 * WooCommerce, Add Long Description to Products on Shop Page with Character limit
 */
function wc_add_long_description() {
	global $product;

	?>
        <div class="productdescription" itemprop="description">
        <?php 
    
        // Shorten the text
          $excerpt_length = 360;  // 50 desired characters
          $excerpt_more = '';

          $description = $product->get_description();
          $text_length = strlen($description); // Get text length (characters)
    
          // If the text is more than 50 characters, append $excerpt_more
          if ($text_length > $excerpt_length) {
            $excerpt_more = '...';
          } 
            echo substr( apply_filters( 'the_content', $description ), 0,$excerpt_length ); echo $excerpt_more ?>
        </div>
	<?php
}



add_filter('woocommerce_sale_flash', 'woocommerce_custom_sale_text', 10, 3);
function woocommerce_custom_sale_text($text, $post, $_product)
{
    return '<div class="badge-overlay"><span  class="badge-bottom-right badge green">R1 Special</span></div>';
}


add_action('init','allow_category_html');

function allow_category_html() {
	if (current_user_can('unfiltered_html')) {
		// Disables Kses only for textarea saves
		foreach (array('pre_term_description', 'pre_link_description', 'pre_link_notes', 'pre_user_description') as $filter) {
			remove_filter($filter, 'wp_filter_kses');
		}
	}

	// Disables Kses only for textarea admin displays
	foreach (array('term_description', 'link_description', 'link_notes', 'user_description') as $filter) {
		remove_filter($filter, 'wp_kses_data');
	}
}

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


// Admin footer modification
  
function remove_footer_admin () 
{
    echo '<span id="footer-thankyou">Developed by <a href="https://r1companies.com" target="_blank">R1 Companies</a></span>';
}
 
add_filter('admin_footer_text', 'remove_footer_admin');

//DOCUSIGN PAGE SHORTCODE - EMK 6-23-22 //
function docusign_page_func()
{ 
  $GroupID = bp_get_group_id();
?>

  <div class="wp-block-columns">
  <div class="wp-block-column" style="flex-basis:30%">
  <div class="wp-block-stackable-button-group stk-block-button-group stk-block stk-b1c9267" data-block-id="b1c9267"><div class="stk-row stk-inner-blocks stk-block-content stk-button-group">
  <div class="wp-block-stackable-button stk-block-button stk-block stk-cf2c80b" data-block-id="cf2c80b"><style>.stk-cf2c80b,.stk-cf2c80b .stk-button{width:100% !important}.stk-cf2c80b .stk-button{background:#72bf44 !important}.stk-cf2c80b .stk-button .stk--inner-svg svg:last-child{height:28px !important;width:28px !important}.stk-cf2c80b .stk-button__inner-text{font-size:24px !important}@media screen and (max-width:1023px){.stk-cf2c80b .stk-button__inner-text{font-size:24px !important}}</style><a class="stk-link stk-button stk--hover-effect-darken" href="/docusign-redirect/?groupid=<?php echo $GroupID ?>"><span class="stk--svg-wrapper"><div class="stk--inner-svg"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-plus" class="svg-inline--fa fa-user-plus fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="32" height="32"><path fill="currentColor" d="M624 208h-64v-64c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v64h-64c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h64v64c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-64h64c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm-400 48c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg></div></span><span class="stk-button__inner-text">Add New Agent</span></a></div>
  </div></div>
  </div>

  <div class="wp-block-column" style="flex-basis:70%">
  <p><em><strong>This button will launch a DocuSign Power Form to start the contract process.</strong></em></p>
  </div>
  </div>

  <div class="wp-block-stackable-divider stk-block-divider stk-block stk-1d538d8" data-block-id="1d538d8"><style>.stk-1d538d8 hr.stk-block-divider__hr{width:100% !important}</style><hr class="stk-block-divider__hr"/></div>

  <div class="wp-block-columns">
  <div class="wp-block-column" style="flex-basis:30%">
  <div class="wp-block-stackable-button-group stk-block-button-group stk-block stk-25376b7" data-block-id="25376b7"><div class="stk-row stk-inner-blocks stk-block-content stk-button-group">
  <div class="wp-block-stackable-button stk-block-button popmake-5174 stk-block stk-9d9dd39" data-block-id="9d9dd39"><style>.stk-9d9dd39,.stk-9d9dd39 .stk-button{width:100% !important}.stk-9d9dd39 .stk-button{background:#abb8c3 !important}.stk-9d9dd39 .stk-button .stk--inner-svg svg:last-child{height:28px !important;width:28px !important}.stk-9d9dd39 .stk-button__inner-text{font-size:24px !important}@media screen and (max-width:1023px){.stk-9d9dd39 .stk-button__inner-text{font-size:24px !important}}</style><a class="stk-link stk-button stk--hover-effect-darken" href=""><span class="stk--svg-wrapper"><div class="stk--inner-svg"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-slash" class="svg-inline--fa fa-user-slash fa-w-20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="32" height="32"><path fill="currentColor" d="M633.8 458.1L362.3 248.3C412.1 230.7 448 183.8 448 128 448 57.3 390.7 0 320 0c-67.1 0-121.5 51.8-126.9 117.4L45.5 3.4C38.5-2 28.5-.8 23 6.2L3.4 31.4c-5.4 7-4.2 17 2.8 22.4l588.4 454.7c7 5.4 17 4.2 22.5-2.8l19.6-25.3c5.4-6.8 4.1-16.9-2.9-22.3zM96 422.4V464c0 26.5 21.5 48 48 48h350.2L207.4 290.3C144.2 301.3 96 356 96 422.4z"></path></svg></div></span><span class="stk-button__inner-text">Remove Agent</span></a></div>
  </div></div>
  </div>

  <div class="wp-block-column" style="flex-basis:70%">
  <p><em><strong>This button will launch a form that will email the R1 Licensing Department to remove an agent.</strong></em></p>
  </div>
  </div>

<?php
}
// REGISTER DOCUSIGN PAGE SHORTCODE //
add_shortcode('docusign-page', 'docusign_page_func');

// STATE REDIRECT SHORTCODE - EMK 1-3-22

function state_redirect_shortcode()
{
$userID = get_current_user_id();
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT `value` FROM `yjk_bp_xprofile_data` WHERE `user_id` = $userID AND `field_id` = 89";
// $sql = "SELECT `value` FROM `yjk_bp_xprofile_data` WHERE `field_id` = 89";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  $mystate = str_replace(' ', '-', $row['value']);

  return '<script type="text/javascript"> window.location = "https://r1resources.mystagingwebsite.com/product-category/continuing-education-courses/states/' . $mystate .'/";  </script>';
}
else {
  return "Error: 0 Results";
  // return $sql;
}
$conn->close();

}

// REGISTER SHORTCODE
add_shortcode('StateRedirect', 'state_redirect_shortcode');

// CLEAR COOPERATION LINK - EMK 1-24-22
function clear_cooperation_shortcode()
{ 
$user_id = get_current_user_id();
if ( bp_has_groups('group_type=clear-cooperation&user_id=' . $user_id) ) :
	while ( bp_groups() ) : bp_the_group();
?>
    <b><i>Redirecting...</i></b>
    <script type="text/javascript"> window.location = "<?php bp_group_permalink() ?>";  </script>
<?php
	endwhile;
  do_action( 'bp_after_groups_loop' );
else: 
 _e( 'You are not currently a member of any Clear Cooperation groups.<br />Please contact your broker to be included in the group.', 'buddypress' );
endif;

}

// REGISTER SHORTCODE
add_shortcode('ClearCooperationLink', 'clear_cooperation_shortcode');


// QB OFFICE LINK - EMK 1-24-22
function qb_office_shortcode()
{ 
$user_id = get_current_user_id();
if ( bp_has_groups('group_type=offices&user_id=' . $user_id) ) :
	while ( bp_groups() ) : bp_the_group();
?>
    <b><i>Redirecting...</i></b>
    <script type="text/javascript"> window.location = "<?php bp_group_permalink() ?>";  </script>
<?php
	endwhile;
  do_action( 'bp_after_groups_loop' );
else: 
 _e( 'You are not currently a member of any office groups.<br />Please contact your broker to be included in the group.', 'buddypress' );
endif;
}

// REGISTER SHORTCODE
add_shortcode('QBOfficeLink', 'qb_office_shortcode');



// QB OFFICE LINK - EMK 3-23-22 /////////////////////////////////////////////
function qb_office_url()
{ 
$user_id = get_current_user_id();
if ($user_id == 8) {
	header('Location: https://r1resources.com/groups/mike-taylors-group/');
}

if ( bp_has_groups('group_type=offices&user_id=' . $user_id) ) :
	while ( bp_groups() ) : bp_the_group();
		return bp_group_permalink();
	endwhile;
  do_action( 'bp_after_groups_loop' );
else: 
return( 'You are not currently a member of any office groups.<br />Please contact your broker to be included in the group.' );
endif;
}
// REGISTER SHORTCODE ///////////////////////////////////////////////////////
add_shortcode('qb-office-url', 'qb_office_url');

// QB OFFICE LINK - JW 4-20-23 /////////////////////////////////////////////
function qb_office_link() { 
	
	$user_id = get_current_user_id();

	if ( bp_has_groups('group_type=offices&user_id=' . $user_id) ) :
		while ( bp_groups() ) : bp_the_group();
			$name = bp_get_group_name();
			$url = bp_get_group_permalink();
			$link = "<a href='{$url}'>{$name}</a>";
		endwhile;
		return $link;
	else: 
		return( 'You are not currently a member of any office groups.<br />Please contact your broker to be included in the group.' );
	endif;

}
// REGISTER SHORTCODE ///////////////////////////////////////////////////////
add_shortcode('qb-office-link', 'qb_office_link');


// DOCUSIGN FORMS - EMK 1-26-22
function docusign_newagent_shortcode()
{ 
$userID = get_current_user_id();
$groupID = bp_get_group_id();
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT DocuSignURL FROM yjk_wpdatatable_4 WHERE UserID =$userID";
//$sql = "SELECT DocuSignURL FROM yjk_wpdatatable_4 WHERE UserID =$userID AND Group ID =$groupID";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  $docusignurl = $row['DocuSignURL'];
  return '<script type="text/javascript"> window.location = "' .$docusignurl  .'";  </script>';
  }
 else {
  //return $sql;
  return "<h2 style='color:#ed1c24'>There is no DocuSign PowerForm associated with your User ID.<br /><a href='mailto:licensing@r1resources.com?subject=DocuSign%20PowerForm%20Request'><b>Click Here</b></a> to submit a request to licensing department for your PowerForm URL.</h2>";
}
$conn->close();

}

// REGISTER SHORTCODE
add_shortcode('DocuSignNewAgent', 'docusign_newagent_shortcode'); 

// CUSTOM QB GROUP ACF FORM - EMK  2-24-22 //
function acf_qbgroup_form_func( $atts ) {
  //acf_form_head();
  $a = shortcode_atts( array(
    'field_group' => ''
  ), $atts );
 
  $uid = get_current_user_id();
  $groupID = bp_get_group_id();
  //echo $groupID;
  
  if ( ! empty ( $a['field_group'] ) && ! empty ( $uid ) ) {
    update_field('groupid', $groupID, 'group_'.$groupID );
    $options = array(
      'post_id' => 'group_'.$groupID,
      'field_groups' => array( intval( $a['field_group'] ) )
      //return' => add_query_arg( 'updated', 'true', get_permalink() )
    );
    ob_start();
    acf_form( $options );
    $form = ob_get_contents();
    ob_end_clean();
  }
    
    return $form;
}
 
add_shortcode( 'acf_qbgroup_form', 'acf_qbgroup_form_func' );

//ADDING AFC FORM HEAD
function add_acf_form_head(){
    global $post;
    
    
  if ( !empty($post) && has_shortcode( $post->post_content, 'acf_qbgroup_form' ) ) {
    
     acf_form_head();
    }
}
add_action( 'get_header', 'add_acf_form_head', 0 );

function custom_login_title( $login_title ) {
return str_replace(array( ' &lsaquo;', ' &#8212; WordPress'), array( ' &bull;', ' R1 Resources - Real People, Real Success, One Family'),$login_title );
}
add_filter( 'login_title', 'custom_login_title' );


/** Custom Groups Smart Tag for WPForms - EMK
 */
function wpf_dev_register_smarttag( $tags ) {
 
    $tags['group_id'] = 'Group ID';
    return $tags;
}
add_filter( 'wpforms_smart_tags', 'wpf_dev_register_smarttag' );
 
function wpf_dev_process_smarttag( $content, $tag ) {

    if ( 'group_id' === $tag ) {
        $group_id = bp_get_group_id();
        $content = str_replace( '{group_id}', $group_id, $content );
    }
 
    return $content;
}
add_filter( 'wpforms_smart_tag_process', 'wpf_dev_process_smarttag', 10, 2 );

// SHORTCODE FOR MARKETING ASSET APPROVAL - EMK  3-14-22 //
function marketing_asset_approval_func( $atts ) {
	$group_id = bp_get_group_id();
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM `yjk_wpdatatable_5` WHERE `group`=$group_id AND approved Is Null";

	$result = $conn->query($sql);
	
	echo "<h4>The Following Marketing Assets are Waiting for Approval.</h4>";
	echo "<table class='datatable'><th>Asset Name/File</th><th>Submitted By:</th><th>Approve?</th>";

	//if ($result->num_rows > 0) {
	 while ($row = $result->fetch_array(MYSQLI_ASSOC)){
	  $assetid = $row['assetid'];
	  $assetname = $row['assetname'];
	  $filename = $row['filename'];
	  $submittedby = $row['submittedby'];
	  $datesubmitted = $row['datesubmitted'];
	  $useremail = $row['useremail'];
?>
	<tr>
		<td><b><?php echo $assetname ?></b><br />
		<i>Click to View:</i> <?php echo $filename ?></td>
		<td><?php echo $submittedby ?><br />(on <?php echo $datesubmitted ?>)</td>
		<td>
			<button class="btn-approve asset-approve" id="btn-approved<?php echo $assetid ?>" data-datesubmitted="<?php echo $datesubmitted ?>" data-useremail="<?php echo $useremail ?>" data-assetname="<?php echo $assetname ?>" data-approved="Yes" data-assetid="<?php echo $assetid ?>">Approved</button>
			
			<button class="btn-notapproved asset-approve" id="btn-notapproved<?php echo $assetid ?>" data-datesubmitted="<?php echo $datesubmitted ?>" data-useremail="<?php echo $useremail ?>" data-assetname="<?php echo $assetname ?>" data-approved="No" data-assetid="<?php echo $assetid ?>">Not Approved</button>
		<br /><textarea class="notapprovedcomment" rows="3" style="width:100%;margin-top:10px;margin-bottom:5px;" id="notapprovedcomment<?php echo $assetid ?>" placeholder="Please enter reason(s) that this asset was not approved then press the submit button."></textarea><br /><button class="btn-submitcomment" id="notapproved-submit<?php echo $assetid ?>">Submit</button>
		<p class="approvedtext" id="approvedtext<?php echo $assetid ?>">The asset has been approved.</p>
		</td>
	</tr>
<?php
	}
$conn->close();
?>

</table>
<script>
    jQuery('.btn-submitcomment').hide();
    jQuery('.notapprovedcomment').hide();
	jQuery('.approvedtext').hide();
	
    jQuery('.asset-approve').click(function (e) {
		var assetapproved = jQuery(this).attr('data-approved');
		var assetid = jQuery(this).attr('data-assetid');
		var assetname = jQuery(this).attr('data-assetname');
		var useremail = jQuery(this).attr('data-useremail');
		var datesubmitted = jQuery(this).attr('data-datesubmitted');
	    var returnpage = '<?php echo trim('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],'/waiting-for-approval')?>';
    	//alert(returnpage);
		if (assetapproved == 'No') {
		  jQuery('#notapprovedcomment' +assetid).show();
		  jQuery('#notapproved-submit' +assetid).show();
		  jQuery('#btn-notapproved' +assetid).addClass('btn-disabled');
		  // UPDATE RECORD AND SEND NOTIFICATION
		  jQuery('#notapproved-submit' +assetid).click(function (e) {
			var notapprovedcomment = $('#notapprovedcomment' +assetid).val();
			jQuery.post("/marketing-assets-approve.php", {assetid: assetid, assetname: assetname, assetapproved: assetapproved, useremail: useremail, datesubmitted: datesubmitted, notapprovedcomment: notapprovedcomment, returnpage: returnpage});
			jQuery('#notapprovedcomment' +assetid).attr("disabled","disabled");
			jQuery('#notapproved-submit' +assetid).attr("disabled","disabled");
			jQuery('#notapproved-submit' +assetid).addClass('btn-disabled');
			jQuery('#notapproved-submit' +assetid).html('Message Sent');
			jQuery('#btn-approved' +assetid).prop("disabled",true);
			jQuery('#btn-approved' +assetid).attr("disabled","disabled");
			jQuery('#btn-approved' +assetid).addClass('btn-disabled');
			//alert ("sent");
		  });
		} else {
			jQuery('#btn-approved' +assetid).prop("disabled",true);
			jQuery('#btn-approved' +assetid).attr("disabled","disabled");
			jQuery('#btn-approved' +assetid).addClass('btn-disabled');
			jQuery('#btn-notapproved' +assetid).prop("disabled",true);
			jQuery('#btn-notapproved' +assetid).attr("disabled","disabled");
			jQuery('#btn-notapproved' +assetid).addClass('btn-disabled');
			jQuery('#approvedtext' +assetid).show();
			// UPDATE RECORD AND SEND NOTIFICATION
		   	jQuery.post("/marketing-assets-approve.php", {assetid: assetid, assetname: assetname, assetapproved: assetapproved, useremail: useremail, datesubmitted: datesubmitted, returnpage: returnpage });
		  }
});
</script>
<?php
	}
add_shortcode( 'marketing_asset_approval', 'marketing_asset_approval_func' );

// MARKETING ASSET QUERY - EMK 3-18-22
function marketing_asset_query_func( $atts )
{ 
	//$requirementsurl = $_SERVER['REQUEST_URI']."/state-marketing-requirements/";
	echo "<details id='upload-marketing-asset' class='marketing-asset-form'><summary class='marketing-asset-summary'>Submit New Asset for Approval</summary>";
	echo do_shortcode('[wpforms id=5891 title="false"]');
	echo "Please review the State Marketing Requirements</a> before submitting your asset for approval.";
	echo "</details>";
	echo "<b>My Marketing Assets <i>(Private)</i></b>";
	echo do_shortcode('[wpdatatable id=13 var1="'.bp_get_group_id().'"]');
	echo "<b>Group Marketing Assets</b>";
	echo do_shortcode('[wpdatatable id=9 var1="'.bp_get_group_id().'"]');
}
add_shortcode( 'marketing_asset_query', 'marketing_asset_query_func' );


// STATE MARKETING REQUIREMENTS - EMK 3-21-22
function state_marketing_requirements_func()
{ 
$userID = get_current_user_id();
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Value FROM yjk_bp_xprofile_data WHERE yjk_bp_xprofile_data.user_id =$userID AND yjk_bp_xprofile_data.field_id=89";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  $mystate = $row['Value'];
  //define("mystate", $row['Value']);
  }
 else {
  return $sql;
}
$sql = "SELECT * FROM `yjk_wpdatatable_6` WHERE `state` = '$mystate'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  $documenturl = $row['documenturl'];
  $requirementsintro = $row['requirementsintro'];
  }
 else {
  return $sql;
}	
$conn->close();
echo "<h4>". $mystate . " State Marketing Requirements</h4>";
//echo nl2br($requirementsintro) . "<br>";
echo  "<a target='_new' href='$documenturl'><span class='fa fa-file-pdf'></span> <i>Click to Download</i></a><br><br>";
echo "<b>Additional National/State Compliance Resources</b><br><br>";
echo  "<a target='_new' href='http://r1resources.com/wp-content/uploads/2022/03/REAL-ESTATE-MARKETING-COMPLIANCE.pdf'><span class='fa fa-file-pdf'></span> <i>Click to Download</i></a>";
}

// REGISTER SHORTCODE
add_shortcode('state_marketing_requirements', 'state_marketing_requirements_func');


// SAVE USERS STATE TO CONSTANT //
$userID = get_current_user_id();
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Value FROM yjk_bp_xprofile_data WHERE yjk_bp_xprofile_data.user_id =$userID AND yjk_bp_xprofile_data.field_id=89";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = mysqli_fetch_assoc($result);
  define("mystate", $row['Value']);
  }
 else {
  return $sql;
}


// ADD RECRUITING LINK FOR ALL USERS EXCEPT NEW MEXICO - EMK 6-17-22//

if (mystate != 'New Mexico') {

    add_filter( 'wp_nav_menu_items', 'add_recruiting_link', 10, 2 );
    function add_recruiting_link( $items, $args ) {
        if ($args->theme_location == 'buddypanel-loggedin') {
            
            $items .= '<li id="menu-item-7064" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-7064"><a class="bb-menu-item" data-balloon-pos="right" data-balloon="Recruiting" href="'. site_url('recruiting-services') .'"><i class="_mi _before buddyboss bb-icon-members" aria-hidden="true"></i><span>Recruiting Services</a></li>';
        }
        return $items;
    }
}

// LIST MY QB OFFICES WIDGET - EMK 9-30-22
function myqblist_func() {
//echo "<div class='widget'>";
echo "<h4 class='widget-title'>MY QB</h4>";
$user_id = get_current_user_id();
echo "<ul id='menu-qb-group-info' class='menu'>";
	if ( bp_has_groups('group_type=offices&user_id=' . $user_id) ) :
		while ( bp_groups() ) : bp_the_group();
?>
	<li class="menu-item menu-item-type-custom menu-item-object-custom"><i class="_mi _before buddyboss bb-icon-angle-right" aria-hidden="true"></i><span>
	<a href="<?php bp_group_permalink() ?>group-data-info/"><?php bp_group_name() ?></a><br /></span></li>
<?php
	echo "</ul>";
	endwhile;
	do_action( 'bp_after_groups_loop' );
	endif;
//echo "</div>";
}
// REGISTER SHORTCODE //
add_shortcode('my-qb-list', 'myqblist_func');

//LIST MY QB OFFICES WIDGET V2 - EMK 2-6-22
function myqblist_func_v2() {

$user_id = get_current_user_id();

	if ( bp_has_groups('group_type=offices&user_id=' . $user_id) ) :
		while ( bp_groups() ) : bp_the_group();
?>
	<div class="tile-nav-home">
		<a class="" href="<?php bp_group_permalink() ?>group-data-info/"><?php bp_group_name() ?></a>
	</div>
<?php

	endwhile;
	//do_action( 'bp_after_groups_loop' );

	else :
  		echo "";
		
	endif;

}
// REGISTER SHORTCODE //
add_shortcode('my-qb-list-v2', 'myqblist_func_v2');