<?php get_header(); ?>

<?php
    if (have_posts()):
        while (have_posts()): the_post() ;?>

        <?php // require 'content.php' ?>
        <?php get_template_part('content', get_post_format()) ?>
        
    <?php endwhile; ?>

    <!-- POST PAGINATION -->
    
    <?php previous_posts_link('<< OlderPosts')?>
    <?php next_posts_link(' New posts >>')?>
<?php endif; ?>



<?php get_footer(); ?>