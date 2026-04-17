<?php
/**
 * Template Name: İletişim Page
 */

get_header(); ?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1 class="page-title">Neşeli Kaşifler Anaokulu İletişim</h1>
        <p class="page-subtitle">Bizimle iletişime geçin, sorularınızı sorun</p>
        <?php neseli_kasifler_breadcrumb(); ?>
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
                    <p><a href="https://maps.app.goo.gl/6JitU4SPiRLJqdeh6" target="_blank" style="color: inherit; text-decoration: none;"><?php echo esc_html(get_theme_mod('address', 'Kuzey Yıldızı Mah. 4081. Cad. 16/C Yenimahalle, Ankara')); ?></a></p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="info-content">
                    <h4>Telefon</h4>
                    <p><a href="tel:+905514975313" style="color: inherit; text-decoration: none;"><?php echo esc_html(get_theme_mod('phone_number', '+90 551 497 53 13')); ?></a></p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-at"></i>
                </div>
                <div class="info-content">
                    <h4>E-posta</h4>
                    <p><a href="mailto:<?php echo esc_attr(get_theme_mod('email_address', 'info@neselikasifler.com')); ?>" style="color: inherit; text-decoration: none;">info<i class="fas fa-at" style="margin: 0 2px; font-size: 0.85em;"></i>neselikasifler.com</a></p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="info-content">
                    <h4>Çalışma Saatleri</h4>
                    <p>Pazartesi - Cuma: 07:00 - 18:00<br>
                        Cumartesi - Pazar: Kapalı</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">
                    <i class="fab fa-whatsapp"></i>
                </div>
                <div class="info-content">
                    <h4>WhatsApp</h4>
                    <p><a href="https://wa.me/905514975313" target="_blank" style="color: #25D366; text-decoration: none;">WhatsApp ile yazın</a></p>
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

<!-- Social Media -->
<section class="container">
    <div class="content-section" style="text-align: center; padding: 2rem 0;">
        <h2 class="section-title">Bizi Takip Edin</h2>
        <div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap; margin-top: 1rem;">
            <a href="https://www.instagram.com/neselikasifler?igsh=ZGhrdnRoYWFyZHA0&utm_source=qr" target="_blank" style="font-size: 2rem; color: #E4405F;"><i class="fab fa-instagram"></i></a>
            <a href="https://youtube.com/@neselikasifleranaokulu?si=_Unst1CZc5jX_6l-" target="_blank" style="font-size: 2rem; color: #FF0000;"><i class="fab fa-youtube"></i></a>
            <a href="https://www.facebook.com/profile.php?id=61576517904469" target="_blank" style="font-size: 2rem; color: #1877F2;"><i class="fab fa-facebook"></i></a>
            <a href="https://www.linkedin.com/in/%C3%B6zel-ne%C5%9Feli-ka%C5%9Fifler-anaokulu-0635a73b9" target="_blank" style="font-size: 2rem; color: #0A66C2;"><i class="fab fa-linkedin"></i></a>
            <a href="https://wa.me/905514975313" target="_blank" style="font-size: 2rem; color: #25D366;"><i class="fab fa-whatsapp"></i></a>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="container">
    <div class="map-section" style="padding: 0; margin-top: 2rem;">
        <div class="map-placeholder" style="margin: 0; padding: 0; border-radius: 15px; overflow: hidden; height: 500px;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3054.9225778638934!2d32.78045287651057!3d40.032507978934035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d34b19059e2cd9%3A0x1561220fc26d0c48!2zw5ZaRUwgTkXFnkVMxLAgS0HFnsSwRkxFUiBBTkFPS1VMVQ!5e0!3m2!1str!2str!4v1762678517335!5m2!1str!2str"
                width="100%" height="500" style="border:0; display: block; border-radius: 15px;" allowfullscreen="" loading="lazy"
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
                                Çocuğunuzun nüfus cüzdanı, 4 adet vesikalık fotoğraf ve velilerin kimlik fotokopileri gerekmektedir. Ayrıca varsa sağlık raporu ve aşı kartı da kayıt sırasında istenmektedir.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Yaş grupları nasıl belirleniyor?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                2-3 yaş grubu Minik Kaşifler, 3-4 yaş grubu Küçük Kaşifler, 4-6 yaş grubu Büyük Kaşifler sınıflarımıza yerleştirilir. Her yaş grubuna özel Multibem eğitim modeline dayalı programlar uygulanmaktadır.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Yemek servisi var mı?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Evet, kahvaltı, öğle yemeği ve ikindi arasında sağlıklı menüler sunulmaktadır. Özel diyet ihtiyaçları karşılanır.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Okulu ziyaret edebilir miyim?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Tabii ki! Önceden randevu alarak okulumuzu ziyaret edebilir, öğretmenlerimizle tanışabilirsiniz.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question">
                Servis hizmeti sunuyor musunuz?
                <i class="fas fa-chevron-down"></i>
            </div>
            <div class="faq-answer">
                Şu anda düzenli servis hizmetimiz bulunmamaktadır. Ancak talep yoğunluğuna göre değerlendirme yapabiliyoruz. Okulumuz Kuzey Yıldızı Mahallesi'nde, ulaşımı kolay bir konumdadır.
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
