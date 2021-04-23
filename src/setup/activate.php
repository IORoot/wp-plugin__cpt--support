<?php

namespace andyp\cpt\support\setup;

class activate
{

    private $config;

    public function __construct($config)
    {
        $this->config = $config;
        $const  = 'ANDYP_CPT_'.strtoupper($config['post_type']).'_FILE';
        register_activation_hook( constant($const), [$this, 'flush_post_types'] );
    }

    public function flush_post_types() {

        $ns = '\\andyp\\cpt\\'.$this->config['post_type'].'\\initialise';

        $cpt = new $ns;
        $cpt->set_config($this->config);
        $cpt->setup_cpt();
        $cpt->register_cpt();
        $cpt->run_cpt();

        global $wp_rewrite;
        $wp_rewrite->flush_rules();
    }

}