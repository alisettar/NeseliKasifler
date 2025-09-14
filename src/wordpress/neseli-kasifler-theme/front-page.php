<?php
/**
 * Neşeli Kaşifler - Ana Sayfa (Front Page)
 */

get_header(); ?>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-slider">
            <!-- SVG Background ve emoji animasyonları CSS'de tanımlı -->
        </div>
    </section>

    <!-- Welcome Overlay -->
    <section class="welcome-overlay">
        <div class="container">
            <div class="hero-welcome">
                <h1 class="hero-title"><?php echo esc_html( get_theme_mod( 'hero_title', 'HOŞ GELDİNİZ' ) ); ?></h1>
                <p class="hero-subtitle"><?php echo esc_html( get_theme_mod( 'hero_subtitle', 'Çocuğu Keşfet, Alemi Keşfet' ) ); ?></p>
            </div>
        </div>
    </section>

    <!-- Action Buttons -->
    <section class="container">
        <div class="action-buttons">
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'programlar' ) ) ); ?>" class="action-btn programs">
                <i class="fas fa-graduation-cap btn-icon"></i>
                <div class="btn-title">Eğitim Programları</div>
                <div class="btn-description">Yaş gruplarına uygun özel eğitim programlarımızı keşfedin</div>
            </a>
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'galeri' ) ) ); ?>" class="action-btn gallery">
                <i class="fas fa-camera btn-icon"></i>
                <div class="btn-title">Foto Galeri</div>
                <div class="btn-description">Çocuklarımızın eğlenceli anlarına göz atın</div>
            </a>
            <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'iletisim' ) ) ); ?>" class="action-btn contact">
                <i class="fas fa-comments btn-icon"></i>
                <div class="btn-title">İletişim</div>
                <div class="btn-description">Bizimle iletişime geçin ve sorularınızı sorun</div>
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2>Neden Neşeli Kaşifler?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <i class="fas fa-heart"></i>
                    <h3>Sevgi Dolu Ortam</h3>
                    <p>Çocuklarınız kendilerini evlerinde hissedecekleri sıcak ve sevgi dolu bir ortamda büyürler</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-brain"></i>
                    <h3>Gelişim Odaklı</h3>
                    <p>Her çocuğun bireysel gelişimine odaklanan özel programlarla destekleriz</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-users"></i>
                    <h3>Deneyimli Kadro</h3>
                    <p>Alanında uzman, deneyimli ve çocuk sevgisi ile dolu öğretmenlerimiz</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Güvenli Çevre</h3>
                    <p>Çocuklarınızın güvenliği için alınan tüm önlemler ve güvenli oyun alanları</p>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
