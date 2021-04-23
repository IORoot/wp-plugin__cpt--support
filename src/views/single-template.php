<?php 


get_header();

while ( have_posts() ) :

	the_post();

	// Used in multiple places. - word count & printing out below.
	$content = apply_filters('cpt_'.$post->post_type.'_transforms', $post->post_content);

	// -------------------------- TEMPLATE START ------------------------------
	?>

	<article class="text-night pb-40">
		
	<div class="flex flex-wrap flex-col md:flex-row">

		<?php include( __DIR__ . '/template-parts/sidemenu.php');  ?>  

		<div class="w-full md:w-3/4 xl:w-4/5 p-4 lg:p-10">

			<?php include( __DIR__ . '/template-parts/title_description.php');  ?>  

			<div class="flex py-3"> 

				<div class="w-full overflow-hidden">

					<?php include( __DIR__ . '/template-parts/back_to_top.php');  ?>  

					<?php echo $content;  ?>   

				</div>

			</div>

		</div>

	</div>

	</article>


	<?php
	// -------------------------- TEMPLATE END --------------------------------


endwhile;

get_footer();