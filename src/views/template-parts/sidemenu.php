<div class="w-full md:w-1/4 xl:w-1/5 bg-ghost p-4">

    <?php 
        $back = '<a href="/' .$post->post_type. '" rel="tag" class="text-center w-full block border-2 border-night text-night px-10 py-6 mb-6 rounded-xl fill-black hover:bg-night hover:text-white hover:fill-white">';
        $back .= '<svg class="w-4 h-6 inline-block align-top mr-2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"/></svg>';
        $back .= 'Back to ' . $post->post_type;
        $back .= '</a>';
        echo $back; 
    ?>

    <div class="text-xl text-sky">Classes</div>
        
    <div class="flex flex-col mb-4 ml-4">

        <?php 
            $code = "[support_posts cat=\"classes\" posts_per_page=\"50\" order=\"ASC\"]
                <a href=\"{{permalink}}\" class=\"hover:underline hover:text-sky py-1\">
                    <div class=\"flex\">
                        <div class=\"inline-block pt-1 mr-1 w-4\">{{icon}}</div>
                        <div>{{post_title}}</div>
                    </div>
                </a>
            [/support_posts]";
            echo do_shortcode($code);
        ?>
        
    </div>

    <div class="text-xl text-sky">Company</div>

    <div class="flex flex-col mb-4 ml-4">
        <?php 
            $code = "[support_posts cat=\"company\" posts_per_page=\"50\" order=\"ASC\"]
                <a href=\"{{permalink}}\" class=\"hover:underline hover:text-sky py-1\">
                    <div class=\"flex\">
                        <div class=\"inline-block pt-1 mr-1 w-4\">{{icon}}</div>
                        <div>{{post_title}}</div>
                    </div>
                </a>
            [/support_posts]";

            echo do_shortcode($code);
        ?>
    </div>

    <div class="text-xl text-sky">Website</div>

    <div class="flex flex-col mb-4 ml-4">
        <?php 
            $code = "[support_posts cat=\"website\" posts_per_page=\"50\" order=\"ASC\"]
                <a href=\"{{permalink}}\" class=\"hover:underline hover:text-sky py-1\">
                    <div class=\"flex\">
                        <div class=\"inline-block pt-1 mr-1 w-4\">{{icon}}</div>
                        <div>{{post_title}}</div>
                    </div>
                </a>
            [/support_posts]";
            echo do_shortcode($code);
        ?>
    </div>

</div>