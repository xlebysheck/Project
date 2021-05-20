
<?php 
add_action( 'wp_enqueue_scripts', 'g_form_js' );
function g_form_js() {
	$script_url = plugins_url( '/js/g-form.js', __FILE__ );
	wp_enqueue_script('custom-script', $script_url, array('jquery') );
}
?>
