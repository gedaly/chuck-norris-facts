<?php

/*
Plugin Name: Chuck Norris Facts
Description: Chuck Norris once created the best WordPress plugin ever. This isn't it, but we honor him and his awesomeness with a random fact that is 110% totally true.
Version: 1.0.0
Author: Gedaly
Author URI: https://geda.ly
License: GPLv2 or later
Text Domain: chuck-norris-facts
*/

/*
Plugin Github Repo: https://github.com/gedaly/chuck-norris-facts

Chuck Norris once wrote a terms & conditions statement. No lawyers survived.
*/

add_action( 'admin_notices', 'gg_chuck_admin_notice' );

function gg_chuck_admin_notice() {
    ?>
    <div class="notice notice-info is-dismissible" style="display:flex;align-items:center;">
        <img src="<?php echo plugins_url( '/img/chuck-image.jpg', __FILE__ ); ?>" height="32px" width="32px" style="display:inline-block;padding-right:10px;">
        <p><?php gg_chuck_get_quote() ?></p>
    </div>
    <?php
}

function gg_chuck_get_quote() {
    $get_quote = file_get_contents('https://api.chucknorris.io/jokes/random');
    $get_result  = json_decode($get_quote);
    $quote = $get_result->value;
    echo $quote;
}
