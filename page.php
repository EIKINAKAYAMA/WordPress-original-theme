
<?php get_header(); ?>

        <div id="container__right">
            <main>
                <?php if(is_page('5')): ?>
                    <?php if(have_posts()): 
                        while(have_posts()):
                            the_post();
                    ?>
                    <div class="contents_area"><?php the_content(); ?></div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                <?php else: is_page('7')?>
                    <section>
                        <h2>お問い合わせ</h2>
                        <?php echo do_shortcode('[contact-form-7 id="108" title="コンタクトフォーム 1"]');?>
                    </section>
                <?php endif; ?>

            </main>
        </div>
    </div>

<?php get_footer(); ?>