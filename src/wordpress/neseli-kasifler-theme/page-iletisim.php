<?php
/**
 * Template Name: İletişim Page
 */

get_header(); ?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title">İLETİŞİM</h1>
        <p class="page-subtitle">Bizimle iletişime geçin, sorularınızı sorun</p>
    </div>
</section>

<!-- Contact Content -->
<section class="container">
    <div class="contact-grid">
        <!-- Contact Info -->
        <div class="contact-info">
            <h2 class="section-title">Bize Ulaşın</h2>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="info-content">
                    <h4>Adresimiz</h4>
                    <p><?php echo esc_html(get_theme_mod('address', 'Kuzey Yıldızı Mah. 4081. Cad. 16/C Yenimahalle, Ankara')); ?>
                    </p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="info-content">
                    <h4>Telefon</h4>
                    <p><?php echo esc_html(get_theme_mod('phone_number', '+90 551 497 53 13')); ?></p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-at"></i>
                </div>
                <div class="info-content">
                    <h4>E-posta</h4>
                    <p><?php echo esc_html(get_theme_mod('email_address', 'info@neselikasifler.com')); ?></p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="info-content">
                    <h4>Çalışma Saatleri</h4>
                    <p>Pazartesi - Cuma: 07:30 - 18:00<br>
                        Cumartesi: 08:00 - 14:00<br>
                        Pazar: Kapalı</p>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form">
            <h2 class="section-title">Mesaj Gönderin</h2>

            <?php
            // Contact Form 7 shortcode kullan
            if (function_exists('wpcf7_enqueue_scripts')) {
                echo do_shortcode('[contact-form-7 id="1" title="İletişim Formu"]');
            } else {
                // Fallback form
                echo '<p>İletişim formu için Contact Form 7 eklentisi gerekli.</p>';
                echo '<p>Mail: <a href="mailto:' . get_theme_mod('email_address', 'info@neselikasifler.com') . '">' . get_theme_mod('email_address', 'info@neselikasifler.com') . '</a></p>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="container">
    <div class="map-section">
        <h2 class="section-title">Konum</h2>
        <p>Yenimahalle, Ankara merkezinde kolay ulaşılabilir konumumuzda sizleri bekliyoruz.</p>
        <div class="map-placeholder">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3054.9225778638934!2d32.78045287651057!3d40.032507978934035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d34b19059e2cd9%3A0x1561220fc26d0c48!2zw5ZaRUwgTkXFnkVMxLAgS0HFnsSwRkxFUiBBTkFPS1VMVQ!5e0!3m2!1str!2str!4v1762678517335!5m2!1str!2str"
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="container">
    <div class="faq-section">
        <h2 class="section-title">Sık Sorulan Sorular</h2>

        <div class="faq-item">
            <div class="faq-question">
                Kayıt için hangi belgeler gerekli?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Çocuğunuzun nüfus cüzdanı, aşı karnesi, 4 adet vesikalık fotoğraf ve velilerin kimlik fotokopileri
                gerekmektedir.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Yaş grupları nasıl belirleniyor?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                2-3 yaş Minik Kaşifler, 3-4 yaş Küçük Kaşifler, 4-6 yaş Büyük Kaşifler sınıflarımıza yerleştirilir.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Yemek servisi var mı?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Evet, kahvaltı, öğle yemeği ve ikindi arasında sağlıklı menüler sunulmaktadır. Özel diyet ihtiyaçları
                karşılanır.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Okulu ziyaret edebilir miyim?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Tabii ki! Önceden randevu alarak okulumuzı ziyaret edebilir, öğretmenlerimizle tanışabilirsiniz.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Servis hizmeti sunuyor musunuz?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Şu anda servis hizmetimiz bulunmamaktadır. Ancak talebe göre değerlendirme yapabiliriz.
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>