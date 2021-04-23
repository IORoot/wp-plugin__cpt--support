<li class="" >
    
    <a class="flex justify-center hover:text-sky hover:fill-sky" href="<?php echo get_permalink($post);?>">
        <?php
            $icon = get_post_meta($post->ID, 'icon');
            if ($icon)
            {
                echo '<div class="w-12 pt-2 mr-4">' . $icon[0] . '</div>';
            }
        ?>

        <?php
            echo ucwords($post->post_title);
        ?>
    </a>

</li>