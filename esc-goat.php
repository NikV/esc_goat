<?php
/**
 * Plugin Name: esc_goat
 * Description: Escape Goat, need I say more?
 * Version: 1.0
 * Author: Nikhil Vimal
 * Author URI: nik.techvoltz.com
 * License: GPL2
 */

/**
 * Escape Goat
 *
 * In Soviet Russia, Goat Escape YOU!
 */
function esc_goat( $text ) {
	$text = strip_tags($text);
	$text = str_replace($text, "Goat", $text);
	echo $text;
}

/**
 * The bonus "Hello Goat" Part of the plugin
 *
 * @return mixed
 */
function hello_goat_get_goat() {
	//ALL the Goats
	$goats = "http://upload.wikimedia.org/wikipedia/commons/b/b2/Hausziege_04.jpg
	https://www.sciencenews.org/sites/default/files/main/blogposts/sci_Goats_Go_Inspecting_wikimedia_commons.jpg
	http://upload.wikimedia.org/wikipedia/commons/b/b5/Mountain_Goat_USFWS.jpg
	http://www.cheeseslave.com/wp-content/uploads/2009/02/cs_goat.jpg";

	// Here we split it into lines (Goats)
	$goats = explode( "\n", $goats );

	// And then randomly choose a line (Goat)
	return wptexturize( $goats[ mt_rand( 0, count( $goats ) - 1 ) ] );
}

function hello_goat() {
	$get_goat = hello_goat_get_goat();
	echo "<a href='$get_goat'><img id='dolly' alt='$get_goat' src='$get_goat' height='42' width='42'></img></a>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_goat' );

// We need some CSS to position the paragraph
function goat_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'goat_css' );

/**
 * GOAT MODE ACTIVATED
 */
function goat_mode() {

	if ( defined( 'GOAT_MODE' ) && GOAT_MODE ) {
		echo wp_oembed_get( 'https://www.youtube.com/watch?v=wfpL6_0OBuA' );
	}

}
