<?php
/**
 * Neşeli Kaşifler - Sayfa Template
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

    <?php if (is_page('hakkimizda')): ?>
        <!-- Hakkımızda özel içerik -->
        <section class="page-header">
            <div class="container">
                <h1 class="page-title">HAKKIMIZDA</h1>
                <p class="page-subtitle">Çocuklarınızın keşif yolculuğundaki rehberi</p>
            </div>
        </section>
        <!-- Hakkımızda içeriği buraya eklenebilir -->
    <?php else: ?>
        <!-- Normal sayfa header -->
        <section class="page-header">
            <div class="container">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <?php if ( has_excerpt() ) : ?>
                    <p class="page-subtitle"><?php the_excerpt(); ?></p>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <!-- Page Content -->
    <section class="container">
        <div class="wp-content">
            <?php the_content(); ?>
        </div>
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>