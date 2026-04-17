<?php
/**
 * 404 - Sayfa Bulunamadı
 */

get_header(); ?>

<section class="page-header">
    <div class="container">
        <h1 class="page-title">Sayfa Bulunamadı</h1>
        <p class="page-subtitle">Aradığınız sayfa mevcut değil veya taşınmış olabilir</p>
    </div>
</section>

<section class="container">
    <div class="content-section" style="text-align: center; padding: 3rem 0;">
        <div style="font-size: 6rem; margin-bottom: 1rem;">🔍</div>
        <h2>404 - Sayfa Bulunamadı</h2>
        <p style="font-size: 1.1rem; line-height: 1.7; max-width: 600px; margin: 1rem auto 2rem;">
            Aradığınız sayfa kaldırılmış, adı değiştirilmiş veya geçici olarak kullanılamıyor olabilir.
        </p>

        <div style="display: flex; justify-content: center; gap: 15px; flex-wrap: wrap; margin-top: 2rem;">
            <a href="<?php echo esc_url( home_url('/') ); ?>" style="background: var(--blue-accent); color: white; padding: 12px 28px; border-radius: 25px; text-decoration: none; font-weight: 700;">
                <i class="fas fa-home"></i> Ana Sayfa
            </a>
            <?php
            $programlar_page = get_page_by_path('egitim-programlari');
            $iletisim_page = get_page_by_path('iletisim');
            ?>
            <a href="<?php echo esc_url($programlar_page ? get_permalink($programlar_page) : home_url('/egitim-programlari/')); ?>" style="background: var(--primary-yellow); color: var(--dark-text); padding: 12px 28px; border-radius: 25px; text-decoration: none; font-weight: 700;">
                <i class="fas fa-graduation-cap"></i> Eğitim Programları
            </a>
            <a href="<?php echo esc_url($iletisim_page ? get_permalink($iletisim_page) : home_url('/iletisim/')); ?>" style="background: var(--secondary-red); color: white; padding: 12px 28px; border-radius: 25px; text-decoration: none; font-weight: 700;">
                <i class="fas fa-phone"></i> İletişim
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
