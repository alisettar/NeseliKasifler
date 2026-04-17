<?php
/**
 * Template Name: İş Başvurusu
 * Template for Job Application page
 */

get_header(); ?>

    <!-- Page Header -->
    <section class="page-header job-application-header">
        <div class="container">
            <h1 class="page-title">Anaokulu İş Başvurusu</h1>
            <p class="page-subtitle">Takımımıza katılın, çocukların geleceğini şekillendirin</p>
            <?php neseli_kasifler_breadcrumb(); ?>
        </div>
    </section>

    <!-- Positions Section -->
    <section class="container">
        <div class="positions-section">
            <h2 class="section-title">Açık Pozisyonlar</h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto 2rem; font-size: 1.05rem; line-height: 1.7;">Neşeli Kaşifler Anaokulu'nda çocuk sevgisi ile dolu, deneyimli bir ekiple birlikte çalışma fırsatı sizi bekliyor. Multibem eğitim modeli çerçevesinde çocukların keşif yolculuğuna rehberlik eden öğretmenlerimiz, yıl boyunca süren çevrimiçi eğitimlerle desteklenmektedir. Sürekli mesleki gelişim imkanı sunan, sevgi dolu bir çalışma ortamına katılmak isterseniz aşağıdaki açık pozisyonlara başvurabilirsiniz.</p>
            <div class="job-positions">
                <div class="job-card" data-position="ogretmen">
                    <div class="job-icon">👩‍🏫</div>
                    <h3 class="job-title">Okul Öncesi Öğretmeni</h3>
                    <p class="job-description">2-6 yaş grubu çocuklar ile çalışacak deneyimli öğretmen aranıyor</p>
                </div>
                <div class="job-card" data-position="yardimci">
                    <div class="job-icon">👥</div>
                    <h3 class="job-title">Öğretmen Yardımcısı</h3>
                    <p class="job-description">Sınıf içi etkinliklerde destek sağlayacak yardımcı öğretmen</p>
                </div>
                <div class="job-card" data-position="mudur">
                    <div class="job-icon">👨‍💼</div>
                    <h3 class="job-title">Okul Müdürü</h3>
                    <p class="job-description">Yöneticilik deneyimi olan eğitim lideri aranıyor</p>
                </div>
                <div class="job-card" data-position="rehber">
                    <div class="job-icon">🧠</div>
                    <h3 class="job-title">Rehber Öğretmen</h3>
                    <p class="job-description">Çocuk gelişimi uzmanı rehber öğretmen pozisyonu</p>
                </div>
                <div class="job-card" data-position="temizlik">
                    <div class="job-icon">🧹</div>
                    <h3 class="job-title">Temizlik Personeli</h3>
                    <p class="job-description">Okul hijyeninden sorumlu temizlik personeli</p>
                </div>
                <div class="job-card" data-position="asci">
                    <div class="job-icon">👩‍🍳</div>
                    <h3 class="job-title">Aşçı</h3>
                    <p class="job-description">Çocuklara sağlıklı öğünler hazırlayacak aşçı</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form -->
    <section class="container">
        <div class="application-section">
            <!-- Personal Information -->
            <div class="form-section">
                <h2 class="section-title">Kişisel Bilgiler</h2>
                <form id="personal-form">
                    <div class="form-group">
                        <label for="fullname">Ad Soyad *</label>
                        <input type="text" id="fullname" name="fullname" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Telefon *</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="email">E-posta *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="address">Adres</label>
                        <textarea id="address" name="address"></textarea>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="birth-date">Doğum Tarihi</label>
                            <input type="date" id="birth-date" name="birth-date">
                        </div>
                        <div class="form-group">
                            <label for="education">Eğitim Durumu *</label>
                            <select id="education" name="education" required>
                                <option value="">Seçiniz</option>
                                <option value="lise">Lise</option>
                                <option value="onlisans">Ön Lisans</option>
                                <option value="lisans">Lisans</option>
                                <option value="yuksek-lisans">Yüksek Lisans</option>
                                <option value="doktora">Doktora</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="position">Başvurulan Pozisyon *</label>
                        <select id="position" name="position" required>
                            <option value="">Pozisyon Seçiniz</option>
                            <option value="ogretmen">Okul Öncesi Öğretmeni</option>
                            <option value="yardimci">Öğretmen Yardımcısı</option>
                            <option value="mudur">Okul Müdürü</option>
                            <option value="rehber">Rehber Öğretmen</option>
                            <option value="temizlik">Temizlik Personeli</option>
                            <option value="asci">Aşçı</option>
                        </select>
                    </div>
                </form>
            </div>

            <!-- Professional Information -->
            <div class="form-section">
                <h2 class="section-title">Mesleki Bilgiler</h2>
                <form id="professional-form">
                    <div class="form-group">
                        <label for="experience">Deneyim (Yıl)</label>
                        <input type="number" id="experience" name="experience" min="0">
                    </div>

                    <div class="form-group">
                        <label for="previous-work">Önceki İş Deneyimleri</label>
                        <textarea id="previous-work" name="previous-work" placeholder="Önceki çalıştığınız yerler ve pozisyonlarınızı belirtiniz"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="skills">Yetenekler ve Sertifikalar</label>
                        <textarea id="skills" name="skills" placeholder="Özel yetenekleriniz, sertifikalarınız, kurs ve eğitimlerinizi belirtiniz"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="languages">Yabancı Dil</label>
                        <input type="text" id="languages" name="languages" placeholder="Bildiğiniz yabancı diller ve seviyeniz">
                    </div>

                    <div class="form-group">
                        <label>CV Yükle</label>
                        <div class="file-upload">
                            <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx">
                            <label for="cv" class="file-upload-label">
                                <i class="fas fa-upload"></i> CV Dosyanızı Seçin
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="start-date">Başlayabileceğiniz Tarih</label>
                        <input type="date" id="start-date" name="start-date">
                    </div>

                    <div class="form-group">
                        <label for="motivation">Motivasyon Mektubu</label>
                        <textarea id="motivation" name="motivation" placeholder="Neden bizimle çalışmak istiyorsunuz? Çocuklarla çalışma konusundaki tutkununuz nedir?"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Requirements -->
    <section class="container">
        <div class="requirements-section">
            <h2 class="section-title">Genel Gereksinimler</h2>
            
            <div class="requirement-item">
                <div class="requirement-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <div>
                    <h4>Çocuk Sevgisi</h4>
                    <p>Çocuklarla çalışmayı seven, sabırlı ve empatik olma</p>
                </div>
            </div>

            <div class="requirement-item">
                <div class="requirement-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <h4>Takım Çalışması</h4>
                    <p>Ekip ruhu içinde çalışabilme ve iletişim becerileri</p>
                </div>
            </div>

            <div class="requirement-item">
                <div class="requirement-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <h4>Esnek Çalışma</h4>
                    <p>Çalışma saatlerine uyum sağlayabilme (07:30 - 18:00)</p>
                </div>
            </div>

            <div class="requirement-item">
                <div class="requirement-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div>
                    <h4>Güvenlik</h4>
                    <p>Adli sicil kaydının temiz olması</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits -->
    <section class="container">
        <div class="benefits-section">
            <h2 class="section-title">Çalışan Avantajları</h2>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <i class="fas fa-money-bill-wave"></i>
                    <h3>Rekabetçi Maaş</h3>
                    <p>Sektör ortalamasının üzerinde maaş ve performans primleri</p>
                </div>
                <div class="benefit-card">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>Eğitim İmkanları</h3>
                    <p>Sürekli mesleki gelişim ve eğitim programları</p>
                </div>
                <div class="benefit-card">
                    <i class="fas fa-calendar-alt"></i>
                    <h3>Esnek İzin</h3>
                    <p>Yıllık izin ve özel durumlar için esnek yaklaşım</p>
                </div>
                <div class="benefit-card">
                    <i class="fas fa-coffee"></i>
                    <h3>Sosyal Aktiviteler</h3>
                    <p>Çalışan etkinlikleri ve keyifli çalışma ortamı</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Final Form Section -->
    <section class="container">
        <div class="form-section">
            <div class="checkbox-group">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">Kişisel verilerin işlenmesi konusunda bilgilendirildim ve onaylıyorum</label>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="contact" name="contact">
                <label for="contact">Benzer pozisyonlar için iletişime geçilmesini onaylıyorum</label>
            </div>

            <button type="submit" class="submit-btn" id="submit-application">
                <i class="fas fa-paper-plane"></i> Başvuruyu Gönder
            </button>
        </div>
    </section>

<?php get_footer(); ?>
