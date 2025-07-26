<?php get_header(); ?>

<main class="main-content">
    <?php while (have_posts()) : the_post(); ?>
        
        <div class="page-content">
            <div class="container">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <div class="page-content-text">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
