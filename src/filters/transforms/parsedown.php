<?php

namespace andyp\cpt\support\filters\transforms;
/**
 * Filters content for Markdown and converts it to HTML.
 */
class parsedown {

    public function __construct($post_type)
    {
        add_filter('cpt_'.$post_type.'_transforms', [$this, 'callback'], 10, 1 );
    }

    public function callback($text)
    {
        $Parsedown = new \ParsedownToc();
        return $Parsedown->setBreaksEnabled(true)->text($text);
    }

}
