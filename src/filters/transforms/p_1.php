<?php

namespace andyp\cpt\support\filters\transforms;

/**
 * Filters Paragraph 1 to make it bigger
 */
class p_1 {

    public function __construct($post_type)
    {
        add_filter('cpt_'.$post_type.'_transforms', [$this, 'callback'], 30, 1 );
    }

    public function callback($text)
    {
        $needle   = '<p class="text-2xl lg:w-4/5 mb-4 leading-relaxed';
        $replace  = '<p class="text-3xl md:text-5xl my-24 leading-relaxed';

        $pos = strpos($text, $needle);
        if ($pos !== false) {
            return substr_replace($text, $replace, $pos, strlen($needle));
        }

    }

}
