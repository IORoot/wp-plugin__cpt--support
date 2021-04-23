<?php

namespace andyp\cpt\support\cpt;

use andyp\cpt\support\register\taxonomy;
use andyp\cpt\support\register\tags;
use andyp\cpt\support\register\post_type;

class create_cpt
{

    public $singular;

    public $icon = '';

    public $category;

    public $tags;

    
    public function set_singular($singular)
    {
        $this->singular = $singular;
    }

    public function set_icon($icon)
    {
        $this->icon = $icon;
    }

    public function set_category($category)
    {
        $this->category = $category;
    }

    public function set_tags($tags)
    {
        $this->tags = $tags;
    }


    public function register()
    {
        $this->register_taxonomy();
        $this->register_tags();
        $this->setup_cpt();
        $this->register_cpt();
    }


    public function register_taxonomy()
    {
        if (!$this->category){ return; }
        $this->tax = new taxonomy;
        $this->tax->set_singular($this->singular);
        $this->tax->set_taxonomy(strtolower($this->category));
        $this->tax->register_on_init();
    }


    public function register_tags()
    {
        if (!$this->tags){ return; }
        $this->tag = new tags;
        $this->tag->set_singular($this->singular);
        $this->tag->set_taxonomy(strtolower($this->tags));
        $this->tag->register_on_init();
    }


    public function setup_cpt()
    {
        $this->cpt = new post_type;
        $this->cpt->set_svgdata_icon($this->icon);
        $this->cpt->set_singular($this->singular);

        $tax = [];
        if ($this->category){ array_push($tax, $this->category); }
        if ($this->tags){ array_push($tax, $this->tags); }
        $this->cpt->set_taxonomies($tax);
    }


    public function register_cpt()
    {
        $this->cpt->register_on_init();
    }


    public function run_cpt()
    {
        $this->cpt->register_cpt();
        
    }
}
