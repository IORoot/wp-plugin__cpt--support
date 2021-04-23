<?php

/*
 * @wordpress-plugin
 * Plugin Name:       _ANDYP - CPT - Support
 * Plugin URI:        http://londonparkour.com
 * Description:       <strong>📬CPT</strong> | Add CPT - Support
 * Version:           1.0.0
 * Author:            Andy Pearson
 * Author URI:        https://londonparkour.com
 * Domain Path:       /languages
 */

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                            CONFIGURATION                                │
// └─────────────────────────────────────────────────────────────────────────┘
$config = [

    // Name of the Root custom post type to create.
    'post_type' => 'support',

    // SVG Data URI for the wordpress sidemenu icon.
    'svgdata_icon' => 'data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMjQgMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTE5Ljc5LDE1LjQxQzIwLjc0LDEzLjI0IDIwLjc0LDEwLjc1IDE5Ljc5LDguNTlMMTcuMDUsOS44M0MxNy42NSwxMS4yMSAxNy42NSwxMi43OCAxNy4wNiwxNC4xN0wxOS43OSwxNS40MU0xNS40Miw0LjIxQzEzLjI1LDMuMjYgMTAuNzYsMy4yNiA4LjU5LDQuMjFMOS44Myw2Ljk0QzExLjIyLDYuMzUgMTIuNzksNi4zNSAxNC4xOCw2Ljk1TDE1LjQyLDQuMjFNNC4yMSw4LjU4QzMuMjYsMTAuNzYgMy4yNiwxMy4yNCA0LjIxLDE1LjQyTDYuOTUsMTQuMTdDNi4zNSwxMi43OSA2LjM1LDExLjIxIDYuOTUsOS44Mkw0LjIxLDguNThNOC41OSwxOS43OUMxMC43NiwyMC43NCAxMy4yNSwyMC43NCAxNS40MiwxOS43OEwxNC4xOCwxNy4wNUMxMi44LDE3LjY1IDExLjIyLDE3LjY1IDkuODQsMTcuMDZMOC41OSwxOS43OU0xMiwyQTEwLDEwIDAgMCwxIDIyLDEyQTEwLDEwIDAgMCwxIDEyLDIyQTEwLDEwIDAgMCwxIDIsMTJBMTAsMTAgMCAwLDEgMTIsMk0xMiw4QTQsNCAwIDAsMCA4LDEyQTQsNCAwIDAsMCAxMiwxNkE0LDQgMCAwLDAgMTYsMTJBNCw0IDAgMCwwIDEyLDhaIi8+PC9zdmc+',
    
    // SLUG of Create a Taxonomy - Category
    'category' => 'support_category',

    // SLUG of Create a Taxonomy - Tags
    'tags' => 'support_tags',
];


//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                           Register CONSTANTS                            │
//  └─────────────────────────────────────────────────────────────────────────┘
$upper = strtoupper($config['post_type']);
define( 'ANDYP_CPT_'.$upper.'_PATH', __DIR__ );
define( 'ANDYP_CPT_'.$upper.'_URL', plugins_url( '/', __FILE__ ) );
define( 'ANDYP_CPT_'.$upper.'_FILE',  __FILE__ );

//  ┌─────────────────────────────────────────────────────────────────────────┐
//  │                    Register with ANDYP Plugins                          │
//  └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/src/acf/andyp_plugin_register.php';


// ┌─────────────────────────────────────────────────────────────────────────┐
// │                         Use composer autoloader                         │
// └─────────────────────────────────────────────────────────────────────────┘
require __DIR__.'/vendor/autoload.php';

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                    Plugin Activation - once only.    		             │
// └─────────────────────────────────────────────────────────────────────────┘
new andyp\cpt\support\setup\activate($config);

// ┌─────────────────────────────────────────────────────────────────────────┐
// │                        	   Initialise    		                     │
// └─────────────────────────────────────────────────────────────────────────┘
$cpt = new andyp\cpt\support\initialise;
$cpt->set_config($config);
$cpt->run();

