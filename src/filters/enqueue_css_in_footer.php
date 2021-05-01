<?php

namespace andyp\cpt\support\filters;

class enqueue_css_in_footer
{

    private $path;

	public function __construct($page_type)
	{
        $this->page_type = $page_type;
        $this->path      = 'ANDYP_CPT_'.strtoupper($this->page_type).'_PATH';

        add_action( 'get_footer', [$this,'register_css'] );
	}


    /**
     * Tidy up the titles on the dashboard
     */
    public function register_css() {

        if (is_singular($this->page_type))
        {
            wp_enqueue_style( $this->page_type.'-style', constant($this->path) . '/src/css/style.css' );
        }
        
    }

}