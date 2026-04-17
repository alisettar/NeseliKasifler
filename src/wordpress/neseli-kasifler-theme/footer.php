<!-- Sticky Action Bar -->
<div class="sticky-action-bar" id="stickyActionBar">
    <div class="sticky-bar-inner">
        <!-- Çocuk illüstrasyonu - sadece desktop -->
        <div class="sticky-bar-illustration sticky-bar-child">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/child.png" alt="Child" />
        </div>

        <!-- Orta kısım: başlık + butonlar -->
        <div class="sticky-bar-content">
            <div class="sticky-bar-title">2026-2027 Eğitim Yılı Kayıtları Başladı</div>
            <div class="sticky-bar-buttons">
                <a href="javascript:void(0)" onclick="openEnrollmentModal()" class="sticky-btn sticky-btn-kayit">
                    <i class="fas fa-file-alt"></i> <span>Ön Kayıt Formu</span>
                </a>
                <a href="javascript:void(0)" onclick="openSummerModal()" class="sticky-btn sticky-btn-yaz">
                    <i class="fas fa-sun"></i> <span>Yaz Okulu</span>
                </a>
                <a href="javascript:void(0)" onclick="openOyunModal()" class="sticky-btn sticky-btn-oyun">
                    <i class="fas fa-puzzle-piece"></i> <span>Oyun Atölyeleri</span>
                </a>
                <a href="javascript:void(0)" onclick="openModal()" class="sticky-btn sticky-btn-atolye">
                    <i class="fas fa-palette"></i> <span>Haftasonu Atölyeleri</span>
                </a>
                <a href="tel:+905514975313" class="sticky-btn sticky-btn-tel sticky-btn-icon">
                    <i class="fas fa-phone"></i>
                </a>
                <a href="https://wa.me/905514975313" target="_blank" class="sticky-btn sticky-btn-wa sticky-btn-icon">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </div>
        </div>

        <!-- Uçak illüstrasyonu - sadece desktop -->
        <div class="sticky-bar-illustration sticky-bar-plane">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/plane.png" alt="Plane" />
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>İletişim</h3>
                <p><i class="fas fa-phone"></i> <a href="tel:+905514975313" style="color: inherit; text-decoration: none;">+90 551 497 53 13</a></p>
                <p><i class="fas fa-at"></i> <a href="mailto:info@neselikasifler.com" style="color: inherit; text-decoration: none;">info@neselikasifler.com</a></p>
                <p><i class="fas fa-map-marker-alt"></i> <a href="https://maps.app.goo.gl/TcdLyavwmK3P2FSX8" target="_blank" style="color: inherit; text-decoration: none;">Kuzey Yıldızı Mah. 4081. Cad. 16/C Yenimahalle Ankara</a></p>
            </div>
            <div class="footer-section">
                <h3>Çalışma Saatleri</h3>
                <p>Pazartesi - Cuma: 07:00 - 18:00</p>
                <p>Cumartesi - Pazar: Kapalı</p>
            </div>
            <div class="footer-section">
                <h3>Hızlı Bağlantılar</h3>
                <div class="footer-links">
                    <?php
                    $hakkimizda_page = get_page_by_path('hakkimizda');
                    $programlar_page = get_page_by_path('egitim-programlari');
                    $galeri_page = get_page_by_path('foto-galeri');
                    ?>
                    <a href="<?php echo esc_url($hakkimizda_page ? get_permalink($hakkimizda_page) : home_url('/hakkimizda/')); ?>">Hakkımızda</a>
                    <a href="<?php echo esc_url($programlar_page ? get_permalink($programlar_page) : home_url('/egitim-programlari/')); ?>">Eğitim Programları</a>
                    <a href="<?php echo esc_url($galeri_page ? get_permalink($galeri_page) : home_url('/foto-galeri/')); ?>">Foto Galeri</a>
                    <a href="https://maps.app.goo.gl/TcdLyavwmK3P2FSX8" target="_blank"><i class="fas fa-map-marker-alt"></i> Konum (Google Maps)</a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Diğer Sayfalar</h3>
                <div class="footer-links">
                    <?php
                    $ev_okulu_page = get_page_by_path('ev-okulu-ankara');
                    $iletisim_page = get_page_by_path('iletisim');
                    $is_basvurusu_page = get_page_by_path('is-basvurusu');
                    ?>
                    <a href="<?php echo esc_url($ev_okulu_page ? get_permalink($ev_okulu_page) : home_url('/ev-okulu-ankara/')); ?>">Ev Okulu Ankara</a>
                    <a href="<?php echo esc_url($iletisim_page ? get_permalink($iletisim_page) : home_url('/iletisim/')); ?>">İletişim</a>
                    <a href="<?php echo esc_url($is_basvurusu_page ? get_permalink($is_basvurusu_page) : home_url('/is-basvurusu/')); ?>">İş Başvurusu</a>
                </div>
            </div>
            <div class="footer-section">
                <div class="social-header">
                    <h3>Bizi Takip Edin</h3>
                    <div class="social-icons">
                        <a href="https://www.instagram.com/neselikasifler?igsh=ZGhrdnRoYWFyZHA0&utm_source=qr" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://wa.me/905514975313" title="WhatsApp" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://youtube.com/@neselikasifleranaokulu?si=_Unst1CZc5jX_6l-" title="YouTube" target="_blank"><i class="fab fa-youtube"></i></a>
                        <a href="https://www.facebook.com/profile.php?id=61576517904469" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.linkedin.com/in/%C3%B6zel-ne%C5%9Feli-ka%C5%9Fifler-anaokulu-0635a73b9" title="LinkedIn" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <!-- Dijital Kartvizit QR Kod -->
                <div class="footer-qr-code">
                    <h4>Dijital Kartvizit</h4>
                    <a href="https://www.milenyumkart.com/@Milenyum21208" target="_blank" title="Dijital Kartvizitimiz">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/qr-code.png" alt="Neşeli Kaşifler Dijital Kartvizit QR Kod" width="120" height="120">
                    </a>
                    <p class="qr-hint">Telefonunuzla tarayın</p>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tüm hakları saklıdır.</p>
        </div>
    </div>
</footer>

<!-- Weekend Modal -->
<div id="weekendModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2><i class="fas fa-palette"></i> Haftasonu Atölyeleri</h2>
        <p><strong>Cumartesi:</strong> 10:00 - 12:00</p>
        <p><strong>Pazar:</strong> 14:00 - 16:00</p>
        <br>
        <p>🎨 <strong>Sanat ve El Sanatları</strong><br>
            Çocuklarınız yaratıcılıklarını keşfedebilecekleri özel atölye çalışmaları</p>
        <br>
        <p>🔬 <strong>Bilim Deneyleri</strong><br>
            Eğlenceli deneylerle bilimi öğrenme fırsatı</p>
        <br>
        <p>📞 <strong>Kayıt için:</strong> <a href="tel:+905514975313">+90 551 497 53 13</a></p>
    </div>
</div>

<!-- Enrollment Modal -->
<?php $kayit_page = get_page_by_path('kayit'); ?>
<div id="enrollmentModal" class="modal image-modal">
    <div class="modal-content">
        <span class="close" onclick="closeEnrollmentModal()">&times;</span>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/kayit.jpg" alt="Kayıt Bilgileri" style="width: 100%; border-radius: 15px; margin: 15px 0; object-fit: contain; max-height: 40vh;">
        <p><strong>2026-2027 Eğitim Yılı Kayıtları Başladı</strong></p>
        <p style="margin-top: 0.5rem; color: #666;">Sınırlı kontenjan için hemen bizimle iletişime geçin.</p>
        <br>
        <p>🎁 <strong>Avantajlar:</strong><br>
            • %10 kardeş indirimi<br>
            • Değerler eğitimi ve Maarif odaklı eğitim programı<br>
            • Güvenli ve sevgi dolu ortam</p>
        <br>
        <div style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; margin-top: 15px;">
            <a href="tel:+905514975313" style="display: inline-flex; align-items: center; gap: 8px; background: #4ECDC4; color: white; padding: 12px 24px; border-radius: 25px; text-decoration: none; font-weight: 700;"><i class="fas fa-phone"></i> Hemen Ara</a>
            <a href="https://wa.me/905514975313" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; background: #25D366; color: white; padding: 12px 24px; border-radius: 25px; text-decoration: none; font-weight: 700;"><i class="fab fa-whatsapp"></i> WhatsApp</a>
            <a href="<?php echo esc_url($kayit_page ? get_permalink($kayit_page) : home_url('/kayit/')); ?>" style="display: inline-flex; align-items: center; gap: 8px; background: var(--secondary-red, #FF6B35); color: white; padding: 12px 24px; border-radius: 25px; text-decoration: none; font-weight: 700;"><i class="fas fa-file-alt"></i> Ön Kayıt Formu</a>
        </div>
    </div>
</div>

<!-- Summer School Modal -->
<div id="summerModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeSummerModal()">&times;</span>
        <h2><i class="fas fa-sun"></i> Yaz Okulu 2026</h2>
        <div style="background: linear-gradient(135deg, #FFD700, #FF6B35); height: 150px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 20px 0; color: white; font-size: 1.5rem; font-weight: bold;">
            Resim Alanı</div>
        <p><strong>Sınırlı Kontenjan!</strong></p>
        <p style="margin-top: 0.5rem; color: #666;">Eğlenceli ve öğretici yaz programımız için hemen iletişime geçin.</p>
        <br>
        <div style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; margin-top: 15px;">
            <a href="tel:+905514975313" style="display: inline-flex; align-items: center; gap: 8px; background: #4ECDC4; color: white; padding: 12px 24px; border-radius: 25px; text-decoration: none; font-weight: 700;"><i class="fas fa-phone"></i> Hemen Ara</a>
            <a href="https://wa.me/905514975313" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; background: #25D366; color: white; padding: 12px 24px; border-radius: 25px; text-decoration: none; font-weight: 700;"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        </div>
    </div>
</div>

<!-- Oyun Atölyeleri Modal -->
<div id="oyunModal" class="modal image-modal">
    <div class="modal-content">
        <span class="close" onclick="closeOyunModal()">&times;</span>
        <h2><i class="fas fa-puzzle-piece"></i> Oyun Atölyeleri</h2>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ingilizce-oyun.png" alt="Oyun Atölyeleri" style="width: 100%; border-radius: 15px; margin: 15px 0; object-fit: contain; max-height: 40vh;">
        <div style="display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; margin-top: 15px;">
            <a href="tel:+905514975313" style="display: inline-flex; align-items: center; gap: 8px; background: #4ECDC4; color: white; padding: 12px 24px; border-radius: 25px; text-decoration: none; font-weight: 700;"><i class="fas fa-phone"></i> Hemen Ara</a>
            <a href="https://wa.me/905514975313" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; background: #25D366; color: white; padding: 12px 24px; border-radius: 25px; text-decoration: none; font-weight: 700;"><i class="fab fa-whatsapp"></i> WhatsApp</a>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>