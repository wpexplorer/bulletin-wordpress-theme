<?php
/**
* Custom password protection form
* @since 1.0
*/
function wpex_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $form = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post" id="password-protected-form" class="clearfix">
		<h2>'. __( 'Password Required','wpex' ) .'</h2>
		<p>' . __( 'To view this protected post, enter the password below:','wpex' ) . '</p>
			<input name="post_password" id="' . $label . '" type="password" size="20" />
			<input type="submit" name="Submit" value="' . esc_attr__( "Submit",'wpex' ) . '" />
		</form>';
    return $form;
}
add_filter( 'the_password_form', 'wpex_password_form' );
?>