    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>İletişim</h3>
                    <p><i class="fas fa-phone"></i> +90 551 497 53 13</p>
                    <p><i class="fas fa-at"></i> info<i class="fas fa-at" style="margin: 0 2px;"></i>neselikasifler.com</p>
                    <p><i class="fas fa-map-marker-alt"></i> Kuzey Yıldızı Mah. 4081. Cad. 16/C Yenimahalle Ankara</p>
                </div>
                <div class="footer-section">
                    <h3>Çalışma Saatleri</h3>
                    <p>Pazartesi - Cuma: 07:30 - 18:00</p>
                    <p>Cumartesi: Kapalı</p>
                    <p>Pazar: Kapalı</p>
                </div>
                <div class="footer-section">
                    <h3>Hızlı Bağlantılar</h3>
                    <div class="footer-links">
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'hakkimizda' ) ) ); ?>">Hakkımızda</a>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'programlar' ) ) ); ?>">Eğitim Programları</a>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'galeri' ) ) ); ?>">Foto Galeri</a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Diğer Sayfalar</h3>
                    <div class="footer-links">
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'ev-okulu-ankara' ) ) ); ?>">Ev Okulu Ankara</a>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'iletisim' ) ) ); ?>">İletişim</a>
                        <a href="<?php echo esc_url( get_permalink( get_page_by_path( 'is-basvurusu' ) ) ); ?>">İş Başvurusu</a>
                    </div>
                </div>
                <div class="footer-section">
                    <div class="social-header">
                        <h3>Bizi Takip Edin</h3>
                        <div class="social-icons">
                            <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://instagram.com/neselikasifler_" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" title="YouTube"><i class="fab fa-youtube"></i></a>
                            <a href="https://wa.me/905514975313" title="WhatsApp" target="_blank"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Tüm hakları saklıdır.</p>
            </div>
        </div>
    </footer>

    <!-- Weekend Badge -->
    <div class="weekend-badge" onclick="openModal()">
        <i class="fas fa-palette"></i> Haftasonu Atölyeleri
    </div>

    <!-- Enrollment Badge -->
    <div class="enrollment-badge" onclick="openEnrollmentModal()">
        <i class="fas fa-graduation-cap"></i> Kayıt Bilgileri
    </div>

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
            <p>📞 <strong>Kayıt için:</strong> +90 551 497 53 13</p>
        </div>
    </div>

    <!-- Enrollment Modal -->
    <div id="enrollmentModal" class="modal image-modal">
        <div class="modal-content">
            <span class="close" onclick="closeEnrollmentModal()">&times;</span>
            <h2><i class="fas fa-graduation-cap"></i> Kayıt Bilgileri</h2>
            <div style="background: linear-gradient(135deg, var(--primary-yellow), var(--secondary-red)); height: 200px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin: 20px 0; color: white; font-size: 1.5rem; font-weight: bold;">Resim Alanı</div>
            <p><strong>2024-2025 Eğitim Yılı Kayıtları Başlamıştır!</strong></p>
            <br>
            <p>🎆 <strong>Erken Kayıt Avantajları:</strong><br>
            • %20 indirim<br>
            • Ücretsiz malzeme kiti<br>
            • Öncelik hakkı</p>
            <br>
            <p>📞 <strong>İletim:</strong> +90 551 497 53 13<br>
            📧 <strong>E-mail:</strong> info@neselikasifler.com</p>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>
</html>