<?php

/*
Plugin Name: Chuck Norris Facts
Description: Chuck Norris once created the best WordPress plugin ever. This isn't it, but we honor him and his awesomeness with a random facts that are 110% totally true.
Version: 1.0.1
Author: Gedaly Guberek
Author URI: https://geda.ly
Plugin URI: https://github.com/gedaly/chuck-norris-facts
License: GPLv2 or later
Text Domain: chuck-norris-facts
*/

/*
Plugin Github Repo: https://github.com/gedaly/chuck-norris-facts

Chuck Norris once wrote a terms & conditions statement. No lawyers survived.
*/

add_action( 'admin_notices', 'gg_chuck_admin_notice' );
/**
 * Creates a notice, displays it in admin area
 * @since 1.0.0
 *
 */
function gg_chuck_admin_notice() {
    ?>
    <div class="notice notice-info is-dismissible" style="display:flex;align-items:center;">
        <img src="<?php echo esc_url(plugins_url( '/img/chuck-image.jpg', __FILE__ )); ?>" height="32px" width="32px" style="display:inline-block;padding-right:.7rem;">
        <p><?php gg_chuck_get_quote() ?></p>
    </div>
    <?php
}

/**
 * Get a random fact from the API
 * @since 1.0.0
 *
 */
function gg_chuck_get_quote() {
    $get_quote = file_get_contents('https://api.chucknorris.io/jokes/random');
    $get_result  = json_decode($get_quote);
    $quote = $get_result->value;
    esc_html_e( $quote, 'chuck-norris-facts');
}
