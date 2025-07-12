<?php get_header(); ?>

<main id="main" class="site-main" role="main">
    <section id="hero">
        <?php get_template_part('template-parts/hero-section'); ?>
    </section>

    <section id="about" class="container mx-auto px-6 py-12">
        <article>
            <?php
            while ( have_posts() ) : the_post();
                the_content();
            endwhile;
            ?>
        </article>
    </section>
</main>

<?php get_footer(); ?>
