<?php

namespace andyp\cpt\support\filters\transforms;

/**
 * After content has been filtered for markdown, add custom tailwind classes
 */
class tailwind {

    public $text;
    public $matches;

    public function __construct($post_type)
    {
        add_filter('cpt_'.$post_type.'_transforms', [$this, 'callback'], 20, 1 );
    }

    public function callback($text)
    {
        $this->text = $text;
        $this->match_open_tag();
        $this->array_unique();
        $this->loop_matches();
        
        return $this->text;
    }

    public function match_open_tag()
    {
        preg_match_all('/<([\w]+)/i', $this->text, $this->matches);
    }

    public function array_unique()
    {
        $this->matches[1] = array_unique($this->matches[1]);
    }

    public function loop_matches()
    {
        foreach ($this->matches[1] as $key => $match)
        {
            if (!method_exists($this, $match)){ continue; }

            $tailwind_classes = $this->$match();

            $transform = $this->matches[0][$key] . ' class="'.$tailwind_classes.'" ';

            $this->text = str_replace($this->matches[0][$key], $transform, $this->text);
        }
    }


    public function h2()
    {
        return 'text-6xl pt-24 border-t-4 border-sky mt-24 mb-12';
    }

    public function h3()
    {
        return 'text-5xl mt-24 mb-12';
    }

    public function h4()
    {
        return 'text-4xl mt-24 mb-12 font-thin';
    }

    public function hr()
    {
        return 'border-sky my-24 border-4 w-full';
    }

    public function p()
    {
        return 'text-2xl lg:w-4/5 mb-4 leading-relaxed';
    }

    public function ul()
    {
        return 'text-xl list-outside list-disc bg-ghost text-smoke mb-12 px-12 pt-12 pb-8 w-full';
    }

    public function ol()
    {
        return 'text-xl list-outside list-decimal bg-ghost text-smoke mb-12 px-12 pt-12 pb-8 w-full';
    }

    public function li()
    {
        return 'pb-1 leading-relaxed';
    }

    public function blockquote()
    {
        return 'bg-night text-mist p-12 my-12 w-full';
    }


    public function a()
    {
        return 'underline hover:bg-sky hover:text-black';
    }
}
