<?php

add_action( 'plugins_loaded', function() {
    do_action('register_andyp_plugin', [
        'title'     => 'CPT: Support ',
        'icon'      => 'account-question',
        'color'     => '#38EF7D',
        'path'      => __FILE__,
    ]);
} );