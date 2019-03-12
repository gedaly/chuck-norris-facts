<?php

/*
Plugin Name: Chuck Norris Facts
Description: Chuck Norris once created the best WordPress plugin ever. This isn't it, but we honor him and his awesomeness. Uses the API from https://api.chucknorris.io/
Version: 1.0.0
Author: Gedaly
Author URI: https://geda.ly
License: GPLv2 or later
Text Domain: chuck-norris-facts
*/

// Plugin Github Repo: https://github.com/gedaly/chuck

/*

Chuck Norris once wrote a terms & conditions statement. No lawyers survived.

*/

function gg_chuck_admin_notice() {
    $get_quote = file_get_contents('https://api.chucknorris.io/jokes/random');

    $get_result  = json_decode($get_quote);

    $quote = $get_result->value;

    ?>
    <div class="notice notice-info is-dismissible" style="display:flex;align-items:center;">
        <img src="<?php echo plugins_url( '/img/chuck-image.jpg', __FILE__ ); ?>" height="32px" width="32px" style="display:inline-block;padding-right:10px;">
        <p><?php echo $quote ?></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'gg_chuck_admin_notice' );


function gg_chuck_getQuote($url) {
    $response = wp_remote_get( $url );
    $body = wp_remote_retrieve_body( $response );
    $body = substr($body, 1, -1);
    return $body;
}
