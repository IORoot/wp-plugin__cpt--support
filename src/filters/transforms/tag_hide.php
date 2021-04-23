<?php

namespace andyp\cpt\support\filters\transforms;

/**
 * Hide the tag:beginner tags.
 */
class tag_hide {

    public function __construct($post_type)
    {
        add_filter('cpt_'.$post_type.'_transforms', [$this, 'callback'], 40, 1 );
    }

    public function callback($text)
    {
        return preg_replace('/\" >tag/i',' hidden">tag',$text);
    }

}
