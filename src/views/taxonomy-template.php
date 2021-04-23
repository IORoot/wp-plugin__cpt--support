<?php 

get_header();

$term = get_queried_object();

$page_classes = get_field('page_classes', $term);

$pb = new andyp\pagebuilder\filters\the_content;

$content = $pb->filter_the_content_in_the_main_loop(null, $term);

// -------------------------- TEMPLATE START ------------------------------
?>

    <main class="bg-white block px-10 pb-10 text-night">

        <?php 
        //If the taxonomy has something placed into the block editor, use that instead of the default header.
        if (!empty($content)){
            echo $content;
        } else {
            include( __DIR__ . '/template-parts/taxonomy_hero.php');
        }
        ?>

        <ul class="text-center text-night text-6xl">

            <?php while (have_posts()) {
                the_post();

                include( __DIR__ . '/template-parts/taxonomy_item.php');
            ?>

            <?php } ?>

        </ul>

    </main>

<?php

// -------------------------- TEMPLATE END --------------------------------

get_footer();

/**
 * Add Isotope at bottom.
 */
?>