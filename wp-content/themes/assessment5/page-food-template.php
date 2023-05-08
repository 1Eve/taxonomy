<?php 
/**
 * Template Name: Food Template
 */

get_header() ?>


<?php 
    $args = [
        'post_type'=> 'food',
        'posts_per_page'=>10
    ];

    $foods = new WP_Query($args);

    if($foods->have_posts()):
        while ($foods->have_posts()): $foods->the_post();
        ?>

            <div class="card">
            <div class="card-header">
                <?php the_title(sprintf('<h2 class="entry-title"> <a href="%s">', esc_url(get_permalink() )), '</a></h2>') ?>
            </div>
            <div class="card-body">
                <h5 class="thumbnail-img"><?php the_post_thumbnail('thumbnail') ?></h5>
                <p class="card-text"><?php the_content() ?></p>
                <p class="card-text"><?php the_category() ?></p>
                
            </div>
            </div>
<?php
endwhile;
endif;
?>
                <h6 href="#" class="card-link"><?php previous_posts_link();?></h6>
                <h6 href="#" class="card-link"> <?php next_posts_link() ?></h6>

<?php get_footer() ?>

