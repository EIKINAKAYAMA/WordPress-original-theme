<?php get_header(); ?>

        <div id="container__right">
            <main>
                    <?php if(have_posts()): 
                            while(have_posts()):
                                the_post();
                    ?>
                    <div class="contents_area"><?php the_content(); ?></div>
                    <?php
                            endwhile;
                        endif;
                    ?>
            </main>
        </div>
    </div>

<?php get_footer(); ?>