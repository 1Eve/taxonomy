<?php get_header();?>

    <?php 
        if(have_posts()):
            while(have_posts()): the_post();
    ?>

    <article id="post-<?php the_ID()?>" <?php post_class(); ?>>
    <header>         

            <div class="card" style="width: 40vw;">
                <div class="card-body">
                    <h5 class="card-title"><?php the_title();  if(current_user_can('manage_options')){ echo ' || '; edit_post_link();} ?></h5>
                    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                    <p class="card-text"><?php the_content(); ?></p>
                    <p class="card-text"><?php echo 'Categories: '; the_category(); ?></p>
                    <p class="card-text"><?php 
                        echo 'Nutrient: '; 

                        echo customterm_get_terms($post->ID, 'nutrient');
                    
                    ?></p>

                    <p class="card-text"><?php 
                        echo 'Decription: '; 

                        echo customterm_get_terms($post->ID, 'Description');

                    ?></p>
                    <h6 href="#" class="card-link"><?php previous_post_link();?></h6>
                    <h6 href="#" class="card-link"> <?php next_post_link() ?></h6>
                </div>
            </div>
    <header>
    <?php 
        endwhile;
        endif;
    ?>
    </article>

<?php get_footer();?>