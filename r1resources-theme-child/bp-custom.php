<?php

define( 'BP_DISABLE_ADMIN_BAR', true ); 

// SAVE USERS STATE TO CONSTANT //
$userID = get_current_user_id();
$conn = new mysqli('localhost',DB_USER,DB_PASSWORD,DB_NAME);
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

// GET USERS PROFILE TYPE - EMK 8-10-22
//$profile_type = bp_get_member_type($user_id,$single = true);
//define("profile_type", $profile_type);

// HIDE NEW USER EMAILS
function bp_email_newuser_notify_siteadmin( $msg, $user ) {
    // DO NOTHING...
    add_filter( 'wp_mail_content_type', 'bp_email_set_content_type' ); //add this to support html in email
    //$msg = bp_email_core_wp_get_template( $msg, $user );
    return $msg;
}

// HIDE PASSWORD CHANGE EMAILS

function wp_password_change_notification( $user ) {
    // send a copy of password change notification to the admin
    // but check to see if it's the admin whose password we're changing, and skip this
    if ( 0 !== strcasecmp( $user->user_email, get_option( 'admin_email' ) ) ) {
        /* translators: %s: user name */
        $message = '<p>' . sprintf( __( 'Password changed for user: %s', 'buddyboss' ), $user->user_login ) . '</p>';
        // The blogname option is escaped with esc_html on the way into the database in sanitize_option
        // we want to reverse this for the plain text arena of emails.
        $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);
 
        $wp_password_change_notification_email = array(
            'to'      => get_option( 'admin_email' ),
            /* translators: Password change notification email subject. %s: Site title */
            'subject' => __( '[%s] Password Changed', 'buddyboss' ),
            'message' => $message,
            'headers' => '',
        );
 
        /**
         * Filters the contents of the password change notification email sent to the site admin.
         *
         * @since BuddyPress 4.9.0
         *
         * @param array   $wp_password_change_notification_email {
         *     Used to build wp_mail().
         *
         *     @type string $to      The intended recipient - site admin email address.
         *     @type string $subject The subject of the email.
         *     @type string $message The body of the email.
         *     @type string $headers The headers of the email.
         * }
         * @param WP_User $user     User object for user whose password was changed.
         * @param string  $blogname The site title.
         */
        //$wp_password_change_notification_email = apply_filters( 'wp_password_change_notification_email', $wp_password_change_notification_email, $user, $blogname );
 
        //add_filter( 'wp_mail_content_type', 'bp_email_set_content_type' );
 
        //$wp_password_change_notification_email['message'] = bp_email_core_wp_get_template( $wp_password_change_notification_email['message'], $user );
 
        //wp_mail(
        //    $wp_password_change_notification_email['to'],
        //    wp_specialchars_decode( sprintf( $wp_password_change_notification_email['subject'], $blogname ) ),
        //    $wp_password_change_notification_email['message'],
        //    $wp_password_change_notification_email['headers']
        );
 
        //remove_filter( 'wp_mail_content_type', 'bp_email_set_content_type' );
    }
}
