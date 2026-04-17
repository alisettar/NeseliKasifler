<?php
/**
 * Template Name: Foto Galeri
 * Template for Photo Gallery page - Dynamic from CPT
 */

get_header(); ?>

    <!-- Page Header -->
    <section class="page-header gallery-header">
        <div class="container">
            <h1 class="page-title">Neşeli Kaşifler Foto Galeri</h1>
            <p class="page-subtitle">Çocuklarımızın neşeli anları</p>
            <?php neseli_kasifler_breadcrumb(); ?>
        </div>
    </section>

    <!-- Gallery Intro -->
    <section class="container">
        <div class="content-section" style="text-align: center;">
            <p style="font-size: 1.05rem; line-height: 1.7; max-width: 800px; margin: 0 auto;">Neşeli Kaşifler Anaokulu'nda çocuklarımızın etkinlik, oyun, sanat çalışması, bahçe aktivitesi ve orman sınıfı keşiflerinden kareler. Fotoğraf ve videolarımızı kategorilere göre filtreleyerek inceleyebilirsiniz.</p>
        </div>
    </section>

    <!-- Gallery Filters (Taxonomy'den dinamik) -->
    <section class="container">
        <div class="gallery-filters">
            <button class="filter-btn active" data-filter="all">Tümü</button>
            <?php
            $galeri_terms = get_terms( array(
                'taxonomy'   => 'galeri_kategori',
                'hide_empty' => true,
                'orderby'    => 'name',
            ) );
            if ( ! is_wp_error( $galeri_terms ) && ! empty( $galeri_terms ) ) :
                foreach ( $galeri_terms as $term ) : ?>
                    <button class="filter-btn" data-filter="<?php echo esc_attr( $term->slug ); ?>">
                        <?php echo esc_html( $term->name ); ?>
                    </button>
                <?php endforeach;
            endif;
            ?>
        </div>
    </section>

    <!-- Gallery Grid (CPT'den dinamik) -->
    <section class="container">
        <div class="gallery-grid">
            <?php
            $galeri_query = new WP_Query( array(
                'post_type'      => 'galeri',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'meta_key'       => '_galeri_sira',
                'orderby'        => array(
                    'meta_value_num' => 'ASC',
                    'date'           => 'DESC',
                ),
            ) );

            if ( $galeri_query->have_posts() ) :
                while ( $galeri_query->have_posts() ) : $galeri_query->the_post();

                    // Meta veriler
                    $media_type = get_post_meta( get_the_ID(), '_galeri_media_type', true ) ?: 'foto';
                    $video_url  = get_post_meta( get_the_ID(), '_galeri_video_url', true );
                    $desc       = get_the_excerpt();

                    // Kategori (ilk term'in slug'ı)
                    $terms = get_the_terms( get_the_ID(), 'galeri_kategori' );
                    $cat_slug = '';
                    $cat_name = '';
                    if ( $terms && ! is_wp_error( $terms ) ) {
                        $cat_slug = $terms[0]->slug;
                        $cat_name = $terms[0]->name;
                    }

                    // Görsel URL
                    $thumb_url = '';
                    $full_url  = '';
                    if ( has_post_thumbnail() ) {
                        $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'medium_large' );
                        $full_url  = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                    }

                    // Video ise YouTube thumbnail kullan (öne çıkan görsel yoksa)
                    $youtube_embed = '';
                    if ( $media_type === 'video' && $video_url ) {
                        $youtube_embed = neseli_kasifler_get_youtube_embed_url( $video_url );
                        if ( ! $thumb_url ) {
                            $yt_thumb = neseli_kasifler_get_youtube_thumb( $video_url );
                            if ( $yt_thumb ) {
                                $thumb_url = $yt_thumb;
                                $full_url  = $yt_thumb;
                            }
                        }
                    }

                    // Data attributes
                    $data_attrs = sprintf(
                        'data-category="%s" data-title="%s" data-desc="%s" data-type="%s"',
                        esc_attr( $cat_slug ),
                        esc_attr( get_the_title() ),
                        esc_attr( $desc ),
                        esc_attr( $media_type )
                    );
                    if ( $media_type === 'foto' && $full_url ) {
                        $data_attrs .= sprintf( ' data-image="%s"', esc_url( $full_url ) );
                    }
                    if ( $media_type === 'video' && $youtube_embed ) {
                        $data_attrs .= sprintf( ' data-video="%s"', esc_url( $youtube_embed ) );
                        // Orientation: meta'dan veya URL'den otomatik algıla
                        $vid_orientation = get_post_meta( get_the_ID(), '_galeri_video_orientation', true ) ?: 'auto';
                        if ( $vid_orientation === 'vertical' ) {
                            $data_attrs .= ' data-orientation="vertical"';
                        } elseif ( $vid_orientation === 'horizontal' ) {
                            $data_attrs .= ' data-orientation="horizontal"';
                        } elseif ( strpos( $video_url, '/shorts/' ) !== false ) {
                            $data_attrs .= ' data-orientation="vertical"';
                        }
                    }
                    if ( $media_type === 'video' && $video_url && ! $youtube_embed ) {
                        $data_attrs .= sprintf( ' data-video-link="%s"', esc_url( $video_url ) );
                    }
            ?>
                <div class="gallery-item" <?php echo $data_attrs; ?>>
                    <div class="gallery-image">
                        <?php if ( $thumb_url ) : ?>
                            <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" loading="lazy">
                        <?php else : ?>
                            <span class="gallery-placeholder"><i class="fas fa-image"></i></span>
                        <?php endif; ?>

                        <?php if ( $media_type === 'video' ) : ?>
                            <div class="play-icon"><i class="fas fa-play"></i></div>
                        <?php else : ?>
                            <div class="play-icon"><i class="fas fa-search-plus"></i></div>
                        <?php endif; ?>
                    </div>

                    <?php if ( $cat_name ) : ?>
                        <div class="gallery-category">
                            <?php if ( $media_type === 'video' ) : ?>
                                <i class="fas fa-video"></i> 
                            <?php endif; ?>
                            <?php echo esc_html( $cat_name ); ?>
                        </div>
                    <?php endif; ?>

                    <div class="gallery-info">
                        <h3 class="gallery-title"><?php the_title(); ?></h3>
                        <?php if ( $desc ) : ?>
                            <p class="gallery-description"><?php echo esc_html( $desc ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <!-- Henüz galeri öğesi eklenmemişse bilgilendirme -->
                <div class="gallery-empty">
                    <i class="fas fa-camera" style="font-size: 3rem; color: #FFD700; margin-bottom: 1rem;"></i>
                    <h3>Galeri Hazırlanıyor</h3>
                    <p>Çok yakında çocuklarımızın neşeli anlarını burada paylaşacağız!</p>
                    <?php if ( current_user_can( 'edit_posts' ) ) : ?>
                        <p style="margin-top: 1rem;">
                            <a href="<?php echo admin_url( 'post-new.php?post_type=galeri' ); ?>" 
                               style="background: #FFD700; color: #333; padding: 10px 25px; border-radius: 25px; text-decoration: none; font-weight: 700;">
                                <i class="fas fa-plus"></i> Galeri Öğesi Ekle
                            </a>
                        </p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Statistics -->
    <section class="container">
        <div class="stats-section">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">500+</div>
                    <div class="stat-label">Mutlu Çocuk</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">Güzel Anı</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Etkinlik</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Yıllık Deneyim</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox (Fotoğraf + Video destekli) -->
    <div class="lightbox" id="lightbox">
        <div class="lightbox-content">
            <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
            <div class="lightbox-media" id="lightbox-media"></div>
            <h3 id="lightbox-title"></h3>
            <p id="lightbox-description"></p>
        </div>
    </div>

<?php get_footer(); ?>
