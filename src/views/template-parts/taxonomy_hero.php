<div class="rounded-lg h-96 block my-10 bg-night">
    <div class="w-full h-full flex flex-col justify-center items-center bg-opacity-50 text-white">
        <div class="text-5xl"><?php echo ucfirst($term->name); ?></div>
        <div class="text-xl w-1/2 pt-10 text-center"><?php echo $term->description; ?></div>
        <div class="text-lg w-1/2 pt-10 text-center"><?php echo count($posts); ?> Article in the <?php echo strtolower($term->name); ?> category.</div>
    </div>
</div>