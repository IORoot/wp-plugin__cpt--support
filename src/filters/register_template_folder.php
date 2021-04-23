<?php

namespace andyp\cpt\support\filters;


class register_template_folder
{

    public $post_type;

    public $folder;

    public $path;


    public function __construct($post_type)
    {
        $this->post_type = $post_type;
        $this->path      = 'ANDYP_CPT_'.strtoupper($this->post_type).'_PATH';

        add_filter('single_template',  [$this, 'register_template'], 99, 3);
        add_filter('template_include', [$this, 'taxonomy_template']);
    }


    public function taxonomy_template($template) {

        global $post;
        $post_type = $post->post_type;

        if ($post_type != $this->post_type){ return $template; }

        if (is_archive())
        {
            $new_template = constant($this->path) . '/src/views/archive-template.php';
            if (file_exists($new_template)) { $template = $new_template; }
        }

        if (is_tax())
        {
            $new_template = constant($this->path) . '/src/views/taxonomy-template.php';
            if (file_exists($new_template)) { $template = $new_template; }
        }

        return $template ;

    }

    /**
     * single-$post_type.php
     * 
     * This is the template for all the /cpt/my-page/ pages
     * 
     * e.g.
     * /tutorials/step-vault-1-introduction/
     * 
     */
    public function register_template($template, $type, $templates) {

        global $post;

        $folder = constant($this->path) . '/src/views/';
    
        if ( $post->post_type != $this->post_type ) {
            return $template;
        }

        if ( !file_exists( $folder . $type . '-template.php'  ) ) {
            return $template;
        }

        return $folder . $type . '-template.php';
    
    }

}