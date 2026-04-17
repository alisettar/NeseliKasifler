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
            <h1 class="hero-title"><?php echo esc_html(get_theme_mod('hero_title', 'Mutlu Çocuklar, Keşfeden Zihinler')); ?></h1>
            <p class="hero-subtitle">
                <?php echo esc_html(get_theme_mod('hero_subtitle', 'Neşeli Kaşifler Anaokulu\'nda öğrenmek bir maceradır')); ?>
            </p>
        </div>
    </div>
</section>

<!-- Action Buttons -->
<section class="container">
    <div class="action-buttons">
        <?php 
        $programlar_page = get_page_by_path('egitim-programlari');
        $programlar_url = $programlar_page ? get_permalink($programlar_page) : home_url('/egitim-programlari/');
        $galeri_page = get_page_by_path('foto-galeri');
        $galeri_url = $galeri_page ? get_permalink($galeri_page) : home_url('/foto-galeri/');
        $iletisim_page = get_page_by_path('iletisim');
        $iletisim_url = $iletisim_page ? get_permalink($iletisim_page) : home_url('/iletisim/');
        ?>
        <a href="<?php echo esc_url($programlar_url); ?>" class="action-btn programs">
            <i class="fas fa-graduation-cap btn-icon"></i>
            <div class="btn-title">Eğitim Programları</div>
            <div class="btn-description">Yaş gruplarına uygun özel eğitim programlarımızı keşfedin</div>
        </a>
        <a href="<?php echo esc_url($galeri_url); ?>" class="action-btn gallery">
            <i class="fas fa-camera btn-icon"></i>
            <div class="btn-title">Foto Galeri</div>
            <div class="btn-description">Çocuklarımızın eğlenceli anlarına göz atın</div>
        </a>
        <a href="<?php echo esc_url($iletisim_url); ?>" class="action-btn contact">
            <i class="fas fa-comments btn-icon"></i>
            <div class="btn-title">İletişim</div>
            <div class="btn-description">Bizimle iletişime geçin ve sorularınızı sorun</div>
        </a>
    </div>
</section>

<!-- About Introduction -->
<section class="container">
    <div class="content-section" style="text-align: center;">
        <p style="font-size: 1.1rem; line-height: 1.8; max-width: 900px; margin: 0 auto;">Ankara Yenimahalle'de hizmet veren Neşeli Kaşifler Anaokulu, 2-6 yaş arası çocuklara değerler odaklı okul öncesi eğitim sunmaktadır. <a href="<?php echo esc_url($programlar_url); ?>">Multibem Erken Çocukluk Eğitim Modeli</a> ile çocuklarımız doğayı keşfeder, sanatla tanışır, kodlama öğrenir ve İngilizce-Arapça dil programlarıyla çok yönlü gelişir. Orman sınıfı, bilim deneyleri ve drama atölyeleriyle öğrenmeyi bir maceraya dönüştürüyoruz.</p>
    </div>
</section>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <h2>Neden Neşeli Kaşifler?</h2>
        <div class="features-grid">
            <?php
            $hakkimizda_page_ft = get_page_by_path('hakkimizda');
            $hakkimizda_url_ft = $hakkimizda_page_ft ? get_permalink($hakkimizda_page_ft) : home_url('/hakkimizda/');
            ?>
            <a href="<?php echo esc_url($hakkimizda_url_ft); ?>" class="feature-card" style="text-decoration: none; color: inherit;">
                <i class="fas fa-heart"></i>
                <h3>Sevgi Dolu Ortam</h3>
                <p>Çocuklarınız kendilerini evlerinde hissedecekleri sıcak ve sevgi dolu bir ortamda büyürler</p>
            </a>
            <a href="<?php echo esc_url($programlar_url); ?>" class="feature-card" style="text-decoration: none; color: inherit;">
                <i class="fas fa-brain"></i>
                <h3>Gelişim Odaklı</h3>
                <p>Her çocuğun bireysel gelişimine odaklanan özel programlarla destekleriz</p>
            </a>
            <a href="<?php echo esc_url($hakkimizda_url_ft); ?>#egitmen-kadromuz" class="feature-card" style="text-decoration: none; color: inherit;">
                <i class="fas fa-users"></i>
                <h3>Deneyimli Kadro</h3>
                <p>Alanında uzman, deneyimli ve çocuk sevgisi ile dolu öğretmenlerimiz</p>
            </a>
            <a href="<?php echo esc_url($iletisim_url); ?>" class="feature-card" style="text-decoration: none; color: inherit;">
                <i class="fas fa-shield-alt"></i>
                <h3>Güvenli Çevre</h3>
                <p>Çocuklarınızın güvenliği için alınan tüm önlemler ve güvenli oyun alanları</p>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>