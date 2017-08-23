<?php

//queue up JS needed for author image if they're in the admin
if (is_admin()) {
	wp_enqueue_script('riotfest-admin-js', get_stylesheet_directory_uri() . '/js/riotfest-admin.js', 'jquery', '20170719', true);
}

function enqueue_media_uploader()
{
    wp_enqueue_media();
}

add_action("admin_enqueue_scripts", "enqueue_media_uploader");

/**
 * Return an ID of an attachment by searching the database with the file URL.
 *
 * First checks to see if the $url is pointing to a file that exists in
 * the wp-content directory. If so, then we search the database for a
 * partial match consisting of the remaining path AFTER the wp-content
 * directory. Finally, if a match is found the attachment ID will be
 * returned.
 *
 * http://frankiejarrett.com/get-an-attachment-id-by-url-in-wordpress/
 *
 * @return {int} $attachment
 */
function get_attachment_image_by_url( $url ) {

    // Split the $url into two parts with the wp-content directory as the separator.
    $parse_url  = explode( parse_url( WP_CONTENT_URL, PHP_URL_PATH ), $url );

    // Get the host of the current site and the host of the $url, ignoring www.
    $this_host = str_ireplace( 'www.', '', parse_url( home_url(), PHP_URL_HOST ) );
    $file_host = str_ireplace( 'www.', '', parse_url( $url, PHP_URL_HOST ) );

    // Return nothing if there aren't any $url parts or if the current host and $url host do not match.
    if ( !isset( $parse_url[1] ) || empty( $parse_url[1] ) || ( $this_host != $file_host ) ) {
        return;
    }

    // Now we're going to quickly search the DB for any attachment GUID with a partial path match.
    // Example: /uploads/2013/05/test-image.jpg
    global $wpdb;

    $prefix     = $wpdb->prefix;
    $attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM " . $prefix . "posts WHERE guid RLIKE %s;", $parse_url[1] ) );

    // Returns null if no attachment is found.
    return $attachment[0];
}

/*
 * Retrieve the appropriate image size
 */
function get_additional_user_meta_thumb() {

    $attachment_url = esc_url( get_the_author_meta( 'c9_user_meta_image', $post->post_author ) );

     // grabs the id from the URL using Frankie Jarretts function
    $attachment_id = get_attachment_image_by_url( $attachment_url );

    // retrieve the thumbnail size of our image
    $image_thumb = wp_get_attachment_image_src( $attachment_id, 'thumbnail' );

    // return the image thumbnail
    return $image_thumb[0];

}

function cortex_user_social_profile_fields( $user ) {
	$user_image = esc_url( get_the_author_meta( 'c9_user_meta_image', $user->ID ) );
?>
    <h3><?php _e( 'Author Bio Image', 'cortex' ); ?></h3>

    <table class="form-table">

        <tr>
            <th><label for="c9_user_meta_image"><?php _e( 'Authors Avatar', 'cortex' ); ?></label></th>
            <td>
                <!-- Outputs the image after save -->
                <?php if (!empty($user_image)) { ?><img src="<?php echo  $user_image; ?>" style="width:150px;"><br /><?php } ?>
                <!-- Outputs the text field and displays the URL of the image retrieved by the media uploader -->
                <input type="text" name="c9_user_meta_image" id="c9_user_meta_image" value="<?php echo esc_url_raw( get_the_author_meta( 'c9_user_meta_image', $user->ID ) ); ?>" class="regular-text" />
                <!-- Outputs the save button -->
                <input type='button' class="additional-user-image button-primary" value="<?php _e( 'Upload Image', 'cortex' ); ?>" id="uploadimage"/><br />
                <span class="description"><?php _e( 'Upload an image for your author bio on articles.', 'cortex' ); ?></span>
            </td>
        </tr>

    </table><!-- end form-table -->

	    <h3><?php _e( 'Social Profiles', 'cortex' ); ?></h3>

	    <table class="form-table">
	        <tr>
	            <th>
	            	<label for="c9twitter"><?php _e( 'Twitter', 'cortex' ); ?>
	            	</label>
	            </th>
	            <td>
	                <input type="text" name="c9twitter" id="c9twitter" value="<?php echo get_the_author_meta( 'c9twitter', $user->ID ); ?>" class="regular-text" />
	            </td>
	        </tr>
	        <tr>
	            <th>
	            	<label for="c9facebook"><?php _e( 'Facebook', 'cortex' ); ?>
	            	</label>
	            </th>
	            <td>
	                <input type="text" name="c9facebook" id="c9facebook" value="<?php echo get_the_author_meta( 'c9facebook', $user->ID ); ?>" class="regular-text" />
	            </td>
	        </tr>
	        <tr>
	            <th>
	            	<label for="c9google"><?php _e( 'Google+', 'cortex' ); ?>
	            	</label>
	            </th>
	            <td>
	                <input type="text" name="c9google" id="c9google" value="<?php echo get_the_author_meta( 'c9google', $user->ID ); ?>" class="regular-text" />
	            </td>
	        </tr>
	        <tr>
	            <th>
	            	<label for="c9pinterest"><?php _e( 'Pinterest', 'cortex' ); ?>
	            	</label>
	            </th>
	            <td>
	                <input type="text" name="c9pinterest" id="c9pinterest" value="<?php echo get_the_author_meta( 'c9pinterest', $user->ID ); ?>" class="regular-text" />
	            </td>
	        </tr>
	        <tr>
	            <th>
	            	<label for="c9linkedin"><?php _e( 'LinkedIn', 'cortex' ); ?>
	            	</label>
	            </th>
	            <td>
	                <input type="text" name="c9linkedin" id="c9linkedin" value="<?php echo get_the_author_meta( 'c9linkedin', $user->ID ); ?>" class="regular-text" />
	            </td>
	        </tr>
	        <tr>
	            <th>
	                <label for="c9instagram"><?php _e( 'Instagram', 'cortex' ); ?>
	                </label>
	            </th>
	            <td>
	                <input type="text" name="c9instagram" id="c9instagram" value="<?php echo get_the_author_meta( 'c9instagram', $user->ID ); ?>" class="regular-text" />
	            </td>
	        </tr>
	    </table>
	<?php }

function cortex_save_user_social_profile_fields( $user_id ) {

	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false; }

	update_user_meta( $user_id, 'c9_user_meta_image', $_POST['c9_user_meta_image'] );
	update_user_meta( $user_id, 'c9twitter', $_POST['c9twitter'] );
	update_user_meta( $user_id, 'c9facebook', $_POST['c9facebook'] );
	update_user_meta( $user_id, 'c9google', $_POST['c9google'] );
	update_user_meta( $user_id, 'c9pinterest', $_POST['c9pinterest'] );
	update_user_meta( $user_id, 'c9linkedin', $_POST['c9linkedin'] );
	update_user_meta( $user_id, 'c9instagram', $_POST['c9instagram'] );
}

add_action( 'show_user_profile', 'cortex_user_social_profile_fields' );
add_action( 'edit_user_profile', 'cortex_user_social_profile_fields' );

add_action( 'personal_options_update', 'cortex_save_user_social_profile_fields' );
add_action( 'edit_user_profile_update', 'cortex_save_user_social_profile_fields' );