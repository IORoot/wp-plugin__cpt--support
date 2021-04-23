<?php

namespace andyp\cpt\support;

class initialise
{

    private $config;

    public function run()
    {
        $this->setup_cpt();
        $this->register_cpt();
        $this->switch_on_metaboxes();
        $this->register_template_folder();
        $this->register_sidebar();
        $this->enqueue_css();
        $this->register_shortcodes();
        $this->register_transform_filters();
    }

    public function set_config($config)
    {
        $this->config = $config;
    }

    public function setup_cpt()
    {
        $this->cpt = new cpt\create_cpt;
        $this->cpt->set_singular(ucfirst($this->config['post_type']));
        $this->cpt->set_icon($this->config['svgdata_icon']);
        $this->cpt->set_category($this->config['category']);
        $this->cpt->set_tags($this->config['tags']);
    }
    
    public function register_cpt()
    {
        $this->cpt->register();
    }

    /**
     * This is only for activation.
     * Otherwise it runs on an init filter
     */
    public function run_cpt()
    {
        $this->cpt->run_cpt();
    }

    public function switch_on_metaboxes()
    {
        new acf\switch_on_metaboxes;
    }

    public function register_template_folder()
    {
        new filters\register_template_folder($this->config['post_type']);
    }

    public function register_sidebar()
    {
        new register\sidebar(ucfirst($this->config['post_type']));
    }

    public function enqueue_css()
    {
        new filters\enqueue_css_in_footer($this->config['post_type']);
    }

    public function register_shortcodes()
    {
        $sc = new shortcodes\posts;
        $sc->set_config($this->config);
        $sc->register();
    }

    public function register_transform_filters()
    {
        new filters\transforms\parsedown($this->config['post_type']);
        new filters\transforms\tailwind($this->config['post_type']);
        new filters\transforms\p_1($this->config['post_type']);
        new filters\transforms\tag_hide($this->config['post_type']);
        new filters\transforms\youtube_links_to_embeds($this->config['post_type']);
    }

}